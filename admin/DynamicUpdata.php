<?php
include("../config/config.php");//获取数据库文件
$id = $_GET['id'];
$text = $_GET['text'];

 $con = mysqli_connect($sql{'hostname'},$sql{'user'},$sql{'password'},$sql{'database'});
 mysqli_set_charset($con,'utf8');
 
 $user_sql = "UPDATE `dynamic` SET `essay`='$text' WHERE `id`='$id'";

 $user_query = mysqli_query($con,$user_sql);
 if ($user_query===true) {
    echo '修改成功';
 }
?>