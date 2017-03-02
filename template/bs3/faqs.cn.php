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

  </head>

  <body>

    <div class="container">
    <?php include("template/$OJ_TEMPLATE/nav.php");?>	    
      <!-- Main component for a primary marketing message or call to action -->
      <div class="jumbotron">
        <p>
        <hr>
<center>
  <font size="+3"><?php echo $OJ_NAME?>  FAQ</font>
</center>
<hr>
<B><font color=green>Q</font>:<font color=blue>这个在线裁判系统使用什么样的编译器和编译选项?</font></B><br>
  <font color=red>A</font>:系统运行于<a href="http://www.ubuntu.com">Ubuntu</a> Linux. 使用<a href="http://gcc.gnu.org/">GNU GCC/G++</a> 作为C/C++编译器，用 <a href="http://www.oracle.com/technetwork/java/index.html">openjdk-7</a> 编译 Java. 对应的编译选项如下:<br>

<table border="1">
  <tr>
    <td>C:</td>
    <td><font color=blue>gcc Main.c -o Main  -fno-asm -O2 -Wall -lm --static -std=c99 -DONLINE_JUDGE</font></td>
  </tr>
  <tr>
    <td>C++:</td>
    <td><font color=blue>g++ Main.cc -o Main  -fno-asm -O2 -Wall -lm --static -DONLINE_JUDGE</font></td>
  </tr>
  <tr>
    <td>Java:</td>
    <td><font color="blue">javac -J-Xms32m -J-Xmx256m Main.java</font>
    <br>
    <font size="-1" color="red">*Java has 2 more seconds and 512M more memory when running and judging.</font>
    </td>
  </tr>
</table>
<font>  编译器版本为（系统可能升级编译器版本，这里直供参考）:<br>
  <font color=blue>gcc (Ubuntu 4.8.2-19ubuntu1) 4.8.2</font><br>
  <font color=blue>glibc 2.3.6</font><br>
java version "1.7.0_79"<br>
</font>
<hr>
<B><font color=green>Q</font><font color=blue>:程序怎样取得输入、进行输出?</font></B><br>
  <font color=red>A</font>:你的程序应该从标准输入 stdin('Standard Input')获取输出 并将结果输出到标准输出 stdout('Standard Output').例如,在C语言可以使用 'scanf' ，在C++可以使用'cin' 进行输入；在C使用 'printf' ，在C++使用'cout'进行输出.
用户程序不允许直接读写文件, 如果这样做可能会判为运行时错误 "<font color=green>Runtime Error</font>"。<br>
  <br>
下面是 1281题的参考答案
 C++:<br>

<pre><font color="blue">
#include &lt;iostream&gt;
using namespace std;
int main(){
    int a,b;
    while(cin >> a >> b)
        cout << a+b << endl;
	return 0;
}
</font></pre>
C:<br>
<pre><font color="blue">
#include &lt;stdio.h&gt;
int main(){
    int a,b;
    while(scanf("%d %d",&amp;a, &amp;b) != EOF)
        printf("%d\n",a+b);
	return 0;
}
</font></pre>

<br>

Java:<br>
<pre><font color="blue">
import java.util.*;
public class Main{
	public static void main(String args[]){
		Scanner cin = new Scanner(System.in);
		int a, b;
		while (cin.hasNext()){
			a = cin.nextInt(); b = cin.nextInt();
			System.out.println(a + b);
		}
	}
}</font></pre>
<hr>

<B><font color=green>Q</font><font color=blue>:为什么我的程序在自己的电脑上正常编译，而系统告诉我编译错误!</font></B><br>
<font color=red>A</font>:GCC的编译标准与VC6有些不同，更加符合c/c++标准:<br>
<ul>
  <li><font color=blue>main</font> 函数必须返回<font color=red>int, void main的函数声明会报编译错误</font>。<br> 
  <li><font color=green>i</font> 在循环外失去定义 "<font color=blue>for</font>(<font color=blue>int</font> <font color=green>i</font>=0...){...}"<br>
  <li><font color=green>itoa</font> 不是ansi标准函数.<br>
  <li><font color=green>__int64</font> 不是ANSI标准定义，只能在VC使用, 但是可以使用<font color=blue>long long</font>声明64位整数。<br>如果用了__int64,试试提交前加一句#define __int64 long long
  <li><font color=green>__int64</font> 在GNU C/C++里，有符号__int64表示范围为:-9223372036854775808 .. 9223372036854775807；类型名称为：__int64；输入方法为：scanf("%I64d",&x)；输出方法为:printf("%I64d",x)；无符号__int64表示范围为:0 .. 18446744073709551615；类型名称为：unsigned __int64；输入方法为：scanf("%I64u",&x)；输出方法为:printf("%I64u",x)。
</ul>
<hr>
<B><font color=green>Q</font><font color=blue>:系统返回信息都是什么意思?</font></B><br>
<font color=red>A</font>:详见下述:<br>
<font color=blue>Compiling</font> : 正在编译.<br>
<font color=blue>Accepted(AC)</font> : 程序通过!<br>
<font color=blue>Pending</font> : 系统忙，你的答案在排队等待.<br> 
<font color=blue>Pending Rejudge</font>: 因为数据更新或其他原因，系统将重新判你的答案.<br>
<font color="blue">Running &amp; Judging</font>: 正在运行和判断.<br>
<font color=blue>Presentation Error(PE)</font> : 答案基本正确，但是格式不对.<br>
<font color=blue>Wrong Answer(WA)</font> : 答案不对，仅仅通过样例数据的测试并不一定是正确答案，一定还有你没想到的地方.<br>
<font color=blue>Time Limit Exceeded(TLE)</font> : 运行超出时间限制，检查下是否有死循环，或者应该有更快的计算方法.<br>
<font color=blue>Memory Limit Exceeded(MLE)</font> : 超出内存限制，数据可能需要压缩，检查内存是否有泄露.<br>
<font color=blue>Output Limit Exceeded</font>: 输出超过限制，你的输出比正确答案长了两倍.<br>
<font color=blue>Runtime Error(RTE)</font> : 运行时错误，非法的内存访问，数组越界，指针漂移，调用禁用的系统函数,请点击后获得详细输出.<br>
<font color=blue>Compile Error(CE)</font> : 编译错误，请点击后获得编译器的详细输出.<br>
<hr>
<B><font color=green>Q</font><font color=blue>:如何参加在线竞赛或提交作业?</font></b><br>
<font color=red>A</font>:<a href=registerpage.php>注册</a> 一个帐号或用给定的帐号<a href=loginpage.php>登录</a>系统<font color=blue>--></font>修改昵称，“<font color=red>提交竞赛的昵称为学号姓名，组队参赛的，队员间以下划线作间隔！</font><font color=blue>提交作业的，要用学号作为登录名注册，昵称为自己的姓名！</font>”<font color=blue>--></font>点击“<font color=red><a href=contest.php>竞赛</a></font>”菜单<font color=blue>--></font>在出现的竞赛项目列表中找到准备参加的<font color=red>竞赛项目</font>并点击进入<font color=blue>--></font>在弹出的题目列表中找到要提交代码的题目并点击题目的标题<font color=blue>--></font>在弹出页面中，点击“<font color=red>提交</font>”链接<font color=blue>--></font>在新的弹出页面中的Language列表框中选择使用的语言种类<font color=red>（注意不要选错）</font><font color=blue>--></font>将代码粘贴在代码编辑框中<font color=blue>--></font>点击页面下方的“<font color=red>提交</font>”按钮即可！<br>
<br><center><B><font color=red>注册时请勿使用纯数字作为账户的邮箱(如用QQ号作为帐号名的邮箱)，否则找回密码功能会异常，如果找回密码没有收到邮件请查看是否在垃圾箱！</font></B></center>
<br><center><B><font color=red>系统具有作弊检测功能，诚信光荣！</font></B></center>
<hr>

<B><font color=green>Q</font><font color=blue>:virtual judge是什么？和普通的oj有什么区别?</font></B><br>
<font color=red>A</font>:详见下述:<br>
   所谓的Virtual Judge是区别于Online Judge而言的，OJ具有自己的题库、判题终端等等，但是VJ是没有的。VJ的工作原理是把题目用爬虫抓过来，当你用VJ的账号提交题目的时候VJ会用自己在对应的OJ上的账号来提交你的代码，并抓取判题结果呈现给用户。简单来说就是你只要注册一个账号就可以在各个OJ（当然要是VJ支持的）上提交题目了。
除此之外，VJ还有几个功能很棒：<br> 
   <font color=blue>创建比赛</font>:可以用VJ支持的那些OJ上的题目来组成一场比赛，很适合大家一起做套题，或者个人刷专题使用。<br> 
   <font color=blue>实时排名</font>:你可以按VJ说明的格式来生成一个比赛的排行榜，把这个榜和你创建的比赛挂钩之后就可以在比赛过程中实时地看到其他各个队伍的AC情况以及自己的排名。有些大型比赛的排行榜已经有人制作好了，你只需要在设置的时候直接勾选别人创建的排行榜（也就是“比赛回放”）就行了，不必再亲自制作。
<hr>

<center>
  <table width=100% border=0>
        <td align=right width=65%>
      <a href = "index.php"><font color=red><?php echo $OJ_NAME?></font></a> 
      </td>
  </table>
</center>
</div><!--end main-->
 <?php require_once 'footer.php';?>
</div><!--end wrapper-->
<center>
</center>
        </p>
    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <?php include("template/$OJ_TEMPLATE/js.php");?>	    

  </body>
</html>
