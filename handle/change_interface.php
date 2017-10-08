<?php
//连接mysql

if(isset($_POST['team'])){
	$dbhost = 'localhost';
	$dbuser = 'root';
	$dbpass = 'backto';
	$conn = mysql_connect($dbhost, $dbuser, $dbpass);
	
	if (!$conn) {
		die("不能连接数据库".mysql_error());
	}
	mysql_select_db('chengyu');
}else{
	echo("没有设置客户端参数！危险！<br />");
	echo("这是配合QT 客户端，进行实时显示的接口,请联系管理员，索要PC客户端；<br /><br />
		E-mail:   yaowen1996@hotmail.com
	");
}
 ?>
 
<?php
// 下面来进行处理，客户端发送的上分请求。来针对没队的每一关的回答的情况，来进行动态更新；
if(isset($_POST['team'])){
	 //处理客户端发送的请求；
	 $team_id =  $_POST['team'];
//	 $team_first;
//	 $team_second;
//	 $team_third;
	 
	 $team_round =  $_POST['round'];
	 $team_score =  $_POST['score'];
	 if ($team_round == 1) {
	 //这个是第一关更新程序
	 $team_time =  $_POST['time'];// 更新团队时间
	 	$sql = "UPDATE sum ".
	 	       "SET first = $team_score, time =$team_time".
	 	       " where id = $team_id";
	 	       
//	 	$sql = "UPDATE sum ".
//	 		       "SET first = $team_score".
//	 		       " where id = $team_id";
		//因为这个脚本只是负责，插入数据，不考虑数据的可信任的程度，所以不用考虑程序的安全性。
	 }
	 if ($team_round == 21) {
	 //这个是第二关更新程序
	 	$sql = "UPDATE sum ".
	 		       "SET second = $team_score".
	 		       " where id = $team_id";
	 }
	 if($team_round == 22){
	 // 这个是亲友团更新程序 
	 	$sql = "UPDATE sum ".
	 			       "SET friend = $team_score".
	 			       " where id = $team_id";
	 }
	 if ($team_round == 3) {
	 //这个是第三关更新程序
	 	$sql = "UPDATE sum ".
	 		      "SET third = $team_score".
	 		       " where id = $team_id";
	 }
	 $retval_in = mysql_query( $sql, $conn );
	 if(! $retval_in )
	 {
	   die('Could not enter data: ' . mysql_error());
	 }
	 if($team_round == 1){
	 	echo("第".$team_round."轮"." 第".$team_id."组 ". " 数据更新为：".$team_score. " 所用的时间是：".$team_time);
	 }else{
	 	echo("第".$team_round."轮"." 第".$team_id."组 ". " 数据更新为：".$team_score);
	 }
//	 echo("第".$team_round."轮"." 第".$team_id."组 ". "数据更新为：".$team_score."<br />");
}
//需要的参数是：team, round, score; 三个post 变量的定义。 
?>
 <?php
 if(isset($_POST['team'])){
	 // 关闭数据库的连接
	 mysql_close($conn);
 }
  ?>