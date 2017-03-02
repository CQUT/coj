<?php
require('./SMTP.Class.inc.php');
$mailcfg['server'] = 'smtp.exmail.qq.com'; 

        $mailcfg['port'] = '465'; 

        $mailcfg['auth'] = 1; 
        $mailcfg['from'] = 'test <test@163.com>'; 

        $mailcfg['auth_username'] = 'acm@crazyforcode.org'; 

        $mailcfg['auth_password'] = 'COJ_pwd_1';     
        $stmp=new stmp($mailcfg); 
        $mail=array('to'=>'1066182747@qq.com','subject'=>'测试标题','content'=>'邮件内容<a href="http://www.phpobject.net">PHP面向对象</a>'); 
        if(!$stmp->send($mail)){ 
            echo $stmp->get_error(); 
        }else{ 
            echo 'mail succ!'; 
        } 
?> 
