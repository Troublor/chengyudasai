<?php
/**
 * Created by PhpStorm.
 * User: troub
 * Date: 2017/5/11
 * Time: 23:44
 */

if (isset($_POST['ask'])){

    try{
        $db=new PDO("mysql:host=localhost;dbname=chengyu","root","backto");
    }catch(PDOException $e){
        echo json_encode(array('error'=>"database: connection failure<br>"));
        exit(1);
    }

    $ask=$_POST['ask'];
    if ($ask=="rank"){
        //计算总分
        $q="SELECT * FROM `sum` WHERE `eliminate`='0'";
        foreach ($db->query($q) as $row){
            $totalPoint=$row['part1']+$row['part2']+$row['extrapart']+$row['part3']+$row['part4'];
            $q="UPDATE `sum` SET `sum`='$totalPoint' WHERE `id`='{$row['id']}'";
            $db->exec($q);
        }
        $q="SELECT * FROM `sum` WHERE `eliminate`='0' ORDER BY `sum` DESC ";
        $html="";
        $medal=0;
        foreach ($db->query($q) as $row){
            $medal++;
            $img="";
            if ($medal==1){
                $img.="<img src='img/gold_medal.png'>";
            }elseif($medal==2){
                $img.="<img src='img/silver_medal.png'>";
            }elseif($medal==3){
                $img.="<img src='img/bronze_medal.png'>";
            }
            $group="";
            if ($row['name']=="group1"){
                $group="第一组";
            }elseif ($row['name']=="group2"){
                $group="第二组";
            }elseif ($row['name']=="group3"){
                $group="第三组";
            }elseif ($row['name']=="group4"){
                $group="第四组";
            }elseif ($row['name']=="group5"){
                $group="第五组";
            }elseif ($row['name']=="group6"){
                $group="第六组";
            }elseif ($row['name']=="group7"){
                $group="第七组";
            }elseif ($row['name']=="group8"){
                $group="第八组";
            }elseif ($row['name']=="group9"){
                $group="第九组";
            }elseif ($row['name']=="group10"){
                $group="第十组";
            }elseif ($row['name']=="group11"){
                $group="第十一组";
            }elseif ($row['name']=="group12"){
                $group="第十二组";
            }
            $html.="<tr><td>{$group}</td><td>{$row['part1']}</td><td>{$row['part2']}</td><td>{$row['extrapart']}</td><td>{$row['part3']}</td><td>{$row['part4']}</td><td>{$row['sum']}{$img}</td></tr>";
        }
        echo json_encode(array('rankBody'=>$html));
    }
}