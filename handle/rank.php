<html>
<head>
<meta charset="utf-8" />
<meta name="author" content="徐耀文" />
<meta name="description" content="成语大赛排行榜" />
<?php
header("content-type:text/html; charset=utf-8");
?>
<?php

$dbhost = 'localhost';
$dbuser = 'root';
$dbpass =  'backto';
$conn = mysql_connect($dbhost, $dbuser, $dbpass);

if (!$conn) {
	die("不能连接数据库".mysql_error());
}

//echo "连接数据库成功!<br>";


// 连接数据库
mysql_select_db('chengyu');

?>

<?php 

// 下面这个脚本的代码段使用来进行总分计算的脚本；

$sqlsum = 'SELECT id, name, 
               number, college,first, second, third, sum, rank, friend 
               ,time FROM sum order by first DESC,time , id';

// 这个排行榜实现的是，谁答对的题目多，用的时间少，并且序号小的排在前面；
$return = mysql_query($sqlsum);
if (!$return) {
	die('计算总分失败! '.mysql_error());
}

$count1 = 0;

while ($rowround1 = mysql_fetch_array($return, MYSQL_ASSOC)) {
	$count1++;
	$id = $rowround1['id'];
	if ($count1 == 1) {
		$update1= "UPDATE sum ".
		       "SET sum = 30".
		       " where id = $id";
		mysql_query($update1);
	}
	if ($count1 == 2) {
		$update1= "UPDATE sum ".
		       "SET sum = 28".
		       " where id = $id";
		mysql_query($update1);
	}
	if ($count1 == 3) {
		$update1= "UPDATE sum ".
		       "SET sum = 26".
		       " where id = $id";
		mysql_query($update1);
	}
	if ($count1 >=4 && $count1<= 5) {
		$update1= "UPDATE sum ".
		       "SET sum = 24".
		       " where id = $id";
		mysql_query($update1);
	}
	if ($count1 >=6 && $count1<= 8) {
		$update1= "UPDATE sum ".
		       "SET sum = 22".
		       " where id = $id";
		mysql_query($update1);
	}
}

// 这个程序只是利用原始数据，来进行更新。使用原始数据，来进行更新。只修改数据库之中的sum 字段；
// 分数制
// 30 28 26 2424 22 22 22
//
// 10
//
//5
//
//5

$resultsum = 'SELECT id, second, third, 
               sum ,friend 
        FROM sum ';

$ret = mysql_query($resultsum);
if (!$ret) {
	die('计算总分失败'.mysql_error());
}
while ($rowround2 = mysql_fetch_array($ret, MYSQL_ASSOC)) {
	$id = $rowround2['id'];
	$finishsum = $rowround2['sum'] + $rowround2['second']*10+ $rowround2['third']*5 +$rowround2['friend']*5 ;
	  $update1= "UPDATE sum ".
	         "SET sum = $finishsum".
	         " where id = $id";
	  mysql_query($update1);
}

 ?>






<?php
// 下面用来显示数据的表格呈现
mysql_query("SET NAMES UTF8");
mysql_query("set character_set_client=utf8"); 
mysql_query("set character_set_results=utf8");

$sql = 'SELECT id, name, 
               number, college,first, second, third, sum, rank, friend 
               ,time FROM sum order by sum DESC';
$retval = mysql_query($sql);
if (!$retval) {
	die('查不到数据'.mysql_error());
}
?>

<title>成语大赛，排行榜</title>
</head>
<link rel="stylesheet" type="text/css" href="css/table.css">
<link rel="stylesheet" href="./css/bootstrap.min.css" />
<script src="./js/jquery.min.js" type="text/javascript"></script>
<script src="./js/bootstrap.min.js" type="text/javascript"></script>
<body>

<h1>正在维护中</h1>


<!-- 排行榜模块 -->
<div id="rank">
<!-- 标题 -->
<h2 style="text-align: center;">队伍数据记录</h2>
<!-- 队伍名次表格呈现 -->
<div class="table-responsive">
<table class="bordered ">
    <thead>
    <tr>
        <th>排名</th>        
        <th>队名</th>
        <!--<th>学院</th>-->
        <th>第一关</th>
        <th>第二关</th>
        <th>亲友团</th>
        <th>第三关</th>
        <th>综合分数</th>
        <th>队号</th>
    </tr>
    </thead>
    
    <?php  
    $count =1;
    $rankindex = 0;
    while ($row = mysql_fetch_array($retval, MYSQL_ASSOC)) {
    $rankindex++;
    $id = $row['id'];
    $first = $row['first']* 10;
    $second = $row['second']* 10;
    $third = $row['third']* 10;
    $friend =  $row['friend'];
    $sum  =  $row['sum'];
    // 重新更新数据
    $sql2 = "UPDATE sum ".
           "SET rank = $rankindex".
           " where id = $id";
           
    $retval_in = mysql_query( $sql2, $conn );
    if(! $retval_in )
    {
      die('Could not enter data: ' . mysql_error());
    }
    	if ($count <=3) {
    		echo("<tr id='index".$count."'>");
    		echo('<td>'."$rankindex ".'</td>');
    		echo('<td>'."{$row['name']} ".'</td>');
    		echo('<td>'."$first".'</td>');
    		echo('<td>'."$second ".'</td>');
    		echo('<td>'."".$friend.'</td>');
    		echo('<td>'."$third".'</td>');
    		echo('<td>'."$sum".'</td>');
    		echo('<td>'."{$row['id']} ".'</td>');
    		echo("</tr>");
    	}else {
    		echo("<tr>");
    		echo('<td>'."$rankindex".'</td>');
    		echo('<td>'."{$row['name']} ".'</td>');
    		echo('<td>'."$first".'</td>');
    		echo('<td>'."$second ".'</td>');
    		echo('<td>'."".$friend.'</td>');
    		echo('<td>'."$third ".'</td>');
    		echo('<td>'."$sum ".'</td>');
    		
    		echo('<td>'."{$row['id']} ".'</td>');
    		echo("</tr>");
    	}
    	$count++;
    }
    ?>
            
</table>

</div>
<br />

</div>

</body>
</html>

<?php 
mysql_close($conn);

?>
