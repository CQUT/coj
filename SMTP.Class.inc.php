<?php
class stmp{ 

    private $mailcfg=array(); 
    private $error_msg=''; 

    function __construct($mailcfg){ 

        $this->mailcfg=$mailcfg; 

    } 

    public function send($mail){ 
        $mailcfg=$this->mailcfg; 
        if(!$fp = fsockopen($mailcfg['server'], $mailcfg['port'], $errno, $errstr, 30)) { 
            return $this->error("($mailcfg[server]:$mailcfg[port]) CONNECT - Unable to connect to the SMTP server, please check your \"mail_config.php\"."); 
        } 
         stream_set_blocking($fp, true); 
         $lastmessage = fgets($fp, 512); 
        if(substr($lastmessage, 0, 3) != '220') { 
            return $this->error("$mailcfg[server]:$mailcfg[port] CONNECT - $lastmessage"); 
        } 
        fputs($fp, ($mailcfg['auth'] ? 'EHLO' : 'HELO')." ".$mailcfg['auth_username']."\r\n"); 
        $lastmessage = fgets($fp, 512); 
        if(substr($lastmessage, 0, 3) != 220 && substr($lastmessage, 0, 3) != 250) { 
            return $this->error("($mailcfg[server]:$mailcfg[port]) HELO/EHLO - $lastmessage"); 
        } 
        while(1) { 
            if(substr($lastmessage, 3, 1) != '-' || empty($lastmessage)) { 
                 break; 
             } 
             $lastmessage = fgets($fp, 512); 
        } 
        if($mailcfg['auth']) { 
            fputs($fp, "AUTH LOGIN\r\n"); 
            $lastmessage = fgets($fp, 512); 
            if(substr($lastmessage, 0, 3) != 334) { 
                return $this->error("($mailcfg[server]:$mailcfg[port]) AUTH LOGIN - $lastmessage"); 
            } 
            fputs($fp, base64_encode($mailcfg['auth_username'])."\r\n"); 
            $lastmessage = fgets($fp, 512); 
            if(substr($lastmessage, 0, 3) != 334) { 
                return $this->error("($mailcfg[server]:$mailcfg[port]) USERNAME - $lastmessage"); 
            } 

            fputs($fp, base64_encode($mailcfg['auth_password'])."\r\n"); 
            $lastmessage = fgets($fp, 512); 
            if(substr($lastmessage, 0, 3) != 235) { 
                return $this->error("($mailcfg[server]:$mailcfg[port]) PASSWORD - $lastmessage"); 
            } 

            $email_from = $mailcfg['from']; 
        } 
        fputs($fp, "MAIL FROM: <".preg_replace("/.*\<(.+?)\>.*/", "\\1", $email_from).">\r\n"); 
        $lastmessage = fgets($fp, 512); 
        if(substr($lastmessage, 0, 3) != 250) { 
            fputs($fp, "MAIL FROM: <".preg_replace("/.*\<(.+?)\>.*/", "\\1", $email_from).">\r\n"); 
            $lastmessage = fgets($fp, 512); 
            if(substr($lastmessage, 0, 3) != 250) { 
                return $this->error("($mailcfg[server]:$mailcfg[port]) MAIL FROM - $lastmessage"); 
            } 
        } 

        $email_to=$mail['to']; 
        foreach(explode(',', $email_to) as $touser) { 
            $touser = trim($touser); 
            if($touser) { 
                fputs($fp, "RCPT TO: <$touser>\r\n"); 
                $lastmessage = fgets($fp, 512); 
                if(substr($lastmessage, 0, 3) != 250) { 
                    fputs($fp, "RCPT TO: <$touser>\r\n"); 
                    $lastmessage = fgets($fp, 512); 
                    return $this->error("($mailcfg[server]:$mailcfg[port]) RCPT TO - $lastmessage"); 
                } 
            } 
        } 
        fputs($fp, "DATA\r\n"); 
        $lastmessage = fgets($fp, 512); 
        if(substr($lastmessage, 0, 3) != 354) { 
            return $this->error("($mailcfg[server]:$mailcfg[port]) DATA - $lastmessage"); 
        } 
        $str="To: $email_to\r\nFrom: $email_from\r\nSubject: ".$mail['subject']."\r\n\r\n".$mail['content']."\r\n.\r\n"; 
        fputs($fp, $str); 
        fputs($fp, "QUIT\r\n"); 
        return true; 
    } 

    public function get_error(){ 
        return $this->error_msg; 
    } 

    private function error($msg){ 
        $this->error_msg.=$msg; 
        return false; 
    } 

} 
?>  
