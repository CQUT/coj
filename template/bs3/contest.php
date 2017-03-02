<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title><?php echo $OJ_NAME?></title>  
    <?php include("template/$OJ_TEMPLATE/css.php");?>	    


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="http://cdn.bootcss.com/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="container">
    <?php include("template/$OJ_TEMPLATE/nav.php");?>	    
      <!-- Main component for a primary marketing message or call to action -->
      <div class="jumbotron">
<center>
<div>
<h3>Contest<?php echo $view_cid?> - <?php echo $view_title ?></h3>
<p><?php echo $view_description?></p>
<br>开始时间: <font color=#993399><?php echo $view_start_time?></font>
&nbsp;&nbsp;&nbsp;&nbsp;结束时间: <font color=#993399><?php echo $view_end_time?></font>
&nbsp;&nbsp;&nbsp;&nbsp;当前时间: <font color=#993399><span id=nowdate > <?php echo date("Y-m-d H:i:s")?></span></font>
&nbsp;&nbsp;&nbsp;&nbsp;状态:<?php
if ($now>$end_time)
echo "<span class=red>已经结束</span>";
else if ($now<$start_time)
echo "<span class=red>还未开始</span>";
else
echo "<span class=red>正在进行</span>";
?>&nbsp;&nbsp;
&nbsp;&nbsp;竞赛性质:<?php
if ($view_private=='0')
echo "<span class=blue>公开</font>";
else
echo "<span class=red>私有</font></span>";
?>
<br>
[<a href='status.php?cid=<?php echo $view_cid?>'>状态</a>]     &nbsp;&nbsp;&nbsp;&nbsp;
[<a href='contestrank.php?cid=<?php echo $view_cid?>'>排名</a>]&nbsp;&nbsp;&nbsp;&nbsp;
[<a href='conteststatistics.php?cid=<?php echo $view_cid?>'>统计</a>]
</div>
<table id='problemset' class='table table-striped'  width='90%'>
<thead>
<tr align=center class='toprow'>
<td width='5'>
<td style="cursor:hand" onclick="sortTable('problemset', 1, 'int');" ><?php echo $MSG_PROBLEM_ID?>
<td width='50%'><?php echo $MSG_TITLE?></td>
<td width='20%'><?php echo $MSG_SOURCE?></td>
<td style="cursor:hand" onclick="sortTable('problemset', 4, 'int');" width='5%'><?php echo $MSG_AC?></td>
<td style="cursor:hand" onclick="sortTable('problemset', 5, 'int');" width='5%'><?php echo $MSG_SUBMIT?></td>
</tr>
</thead>
<tbody>
<?php
$cnt=0;
foreach($view_problemset as $row){
if ($cnt)
echo "<tr class='oddrow'>";
else
echo "<tr class='evenrow'>";
foreach($row as $table_cell){
echo "<td>";
echo "\t".$table_cell;
echo "</td>";
}
echo "</tr>";
$cnt=1-$cnt;
}
?>
</tbody>
</table></center>
      </div>

 <?php require 'footer.php';?>
    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <?php include("template/$OJ_TEMPLATE/js.php");?>	    
<script src="include/sortTable.js"></script>
<script>
var diff=new Date("<?php echo date("Y/m/d H:i:s")?>").getTime()-new Date().getTime();
//alert(diff);
function clock()
{
var x,h,m,s,n,xingqi,y,mon,d;
var x = new Date(new Date().getTime()+diff);
y = x.getYear()+1900;
if (y>3000) y-=1900;
mon = x.getMonth()+1;
d = x.getDate();
xingqi = x.getDay();
h=x.getHours();
m=x.getMinutes();
s=x.getSeconds();
n=y+"-"+mon+"-"+d+" "+(h>=10?h:"0"+h)+":"+(m>=10?m:"0"+m)+":"+(s>=10?s:"0"+s);
//alert(n);
document.getElementById('nowdate').innerHTML=n;
setTimeout("clock()",1000);
}
clock();
</script>
  </body>
</html>
