<html>
<head>
	<meta charset="utf-8" />
    <title>东北大学比赛榜单</title>
    <link href="css/demo.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="css/jqbar.css" />
</head>

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
mysql_query("SET NAMES UTF8");
mysql_query("set character_set_client=utf8"); 
mysql_query("set character_set_results=utf8");

$sql = 'SELECT id, name, 
               number, college,first, second, third, sum, rank
        FROM sum';
$retval = mysql_query($sql);
if (!$retval) {
	die('查不到数据'.mysql_error());
}
?>
<body>
    <div class="container">
        <div class="sixteen columns">
            <div class="row">
            </div>
        </div>
        <div class="sixteen columns ">
            <div class="ten columns">
            
                <div class="bars MT30">
                <h1 style="text-align: center;">
                    &nbsp;&nbsp;第三关 抢答数目实时统计
                	</h1>
                    <div id="bar-1">
                    </div>
                    <div id="bar-2">
                    </div>
                    <div id="bar-3">
                    </div>
                    <div id="bar-4">
                    </div>
                    <div id="bar-5">
                    </div>
                     <div id="bar-6">
                    </div>
                    <div id="bar-7">
                    </div>
                    <div id="bar-8">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="js/jquery.min.js" type="text/javascript"></script>
    <script src="js/jqbar.js" type="text/javascript"></script>
    <script type="text/javascript">

        $(document).ready(function () {
        
        <?php
        $array;
        while ($row = mysql_fetch_array($retval, MYSQL_ASSOC)) {
        	$id = $row['id'];
        	$array[$id] = $row['third'] * 3;
        }
        ?>
            $('#bar-1').jqbar({ label: '第一组', value: <?php echo("{$array[1]}");  ?> , barColor: '#D64747', orientation: 'v' });

            $('#bar-2').jqbar({ label: '第二组', barColor: '#FF681F', value: <?php echo("{$array[2]}");  ?> , orientation: 'v' });

            $('#bar-3').jqbar({ label: '第三组', barColor: '#ea805c', value: <?php echo("{$array[3]}");  ?> , orientation: 'v' });

            $('#bar-4').jqbar({ label: '第四组', barColor: '#88bbc8', value: <?php echo("{$array[4]}");  ?> , orientation: 'v' });

            $('#bar-5').jqbar({ label: '第五组', barColor: '#939393', value: <?php echo("{$array[5]}");  ?> , orientation: 'v' });

            $('#bar-6').jqbar({ label: '第六组', barColor: 'aqua', value: <?php echo("{$array[6]}");  ?> , orientation: 'v' });
            
            $('#bar-7').jqbar({ label: '第七组', barColor: 'yellow', value: <?php echo("{$array[7]}");  ?> , orientation: 'v' });
            
            $('#bar-8').jqbar({ label: '第八组', barColor: '#16e2f4', value: <?php echo("{$array[8]}");  ?> , orientation: 'v' });

        });
    </script>
</body>
</html>

<?php 
//echo("选择数据表成功!");
//查询数据表
mysql_close($conn);

?>
