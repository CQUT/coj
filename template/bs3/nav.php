<?php 
	$url=basename($_SERVER['REQUEST_URI']);
	$dir=basename(getcwd());
	if($dir=="discuss3") $path_fix="../";
	else $path_fix="";
?>
      <!-- Static navbar -->
      <nav class="navbar navbar-default" role="navigation" >
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
          </div>
	    <img src="../image/coj.png" width="50px" height="50px" style="position:absolute;"/>
            <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav" style="margin-left:50px">
	      <?php $ACTIVE="class='active'"?>
              <link rel="shortcut icon" href="vj/ico/coj.ico" />
             <!-- <li><IMG src="vj/ico/coj.ico"></li>  -->
              <li <?php if ($url=="index.php") echo " $ACTIVE";?>><a href="<?php echo $path_fix?>index.php"><?php echo "首页"?></a></li>
              <li <?php if ($url=="problemset.php" || $url == 'problem.php') echo " $ACTIVE";?>><a href="<?php echo $path_fix?>problemset.php"><?php echo "题目"?></a></li>
              <li <?php if ($url=="status.php") echo " $ACTIVE";?>><a href="<?php echo $path_fix?>status.php"><?php echo $MSG_STATUS?></a></li>
              <li <?php if ($url=="ranklist.php") echo " $ACTIVE";?>><a href="<?php echo $path_fix?>ranklist.php"><?php echo $MSG_RANKLIST?></a></li>
              <li <?php if ($url=="contest.php") echo " $ACTIVE";?>><a href="<?php echo $path_fix?>contest.php"><?php echo "竞赛"?></a></li>
              <li <?php if ($url=="recent-contest.php") echo " $ACTIVE";?>><a href="<?php echo $path_fix?>recent-contest.php"><?php echo "联赛"?></a></li>
              <li <?php if ($url=="teaching.php") echo " $ACTIVE";?>><a href="<?php echo $path_fix?>teaching.php"><?php echo "教学"?></a></li>
              <li <?php if ($url=="homework.php") echo " $ACTIVE";?>><a href="<?php echo $path_fix?>homework.php"><?php echo "作业"?></a></li>
              <li <?php if ($url=="introduction.php") echo " $ACTIVE";?>><a href="<?php echo $path_fix?>introduction.php">简介</a></li>
              <li <?php if ($url=="faqs.cn.php") echo " $ACTIVE";?>><a href="<?php echo $path_fix?>faqs.cn.php">帮助</a></li>
<?php if(isset($_GET['cid'])){
	$cid=intval($_GET['cid']);
?>
	      <li><a>[</a></li>
              <li class="active" ><a href="<?php echo $path_fix?>contest.php?cid=<?php echo $cid?>">
			<?php echo $MSG_PROBLEMS?>
	      </a></li>
               <li  class="active" ><a href="<?php echo $path_fix?>status.php?cid=<?php echo $cid?>">
			<?php echo $MSG_STATUS?>
	      </a></li>
              <li  class="active" ><a href="<?php echo $path_fix?>contestrank.php?cid=<?php echo $cid?>">
			<?php echo $MSG_RANKLIST?>
	      </a></li>
              <li  class="active" ><a href="<?php echo $path_fix?>conteststatistics.php?cid=<?php echo $cid?>">
			<?php echo $MSG_STATISTICS?>
	      </a></li>
	      <li><a>]</a></li>
      
<?php }?>
            </ul>
	    <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span id="profile">Login</span><span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
<script src="<?php echo $path_fix."template/$OJ_TEMPLATE/profile.php?".rand();?>" ></script>
	    </ul>   
      <li><a  class="navbar-brand" href="/vj">CVOJ</a></li>

    <!--  <li><a  class="navbar-brand" href="/vjudge/problem/toListProblem.action">Virtual Judge</a></li>
      <li><a href="/vjudge/problem/status.action">V状态</a></li>
      <li><a href="/vjudge/contest/toListContest.action">V竞赛</a></li>
      <li><a href="/vjudge/contest/toAddContest.action">V添加竞赛</a></li>   
    -->
	    </li>
            </ul>

          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </nav>


