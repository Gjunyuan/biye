<?php
include("../config/config.php");//获取数据库文件
$id = $_GET['id'];

 $con = mysqli_connect($sql{'hostname'},$sql{'user'},$sql{'password'},$sql{'database'});
 mysqli_set_charset($con,'utf8');
 
 $user_sql = "DELETE FROM `dynamic` WHERE `id`='$id'";

 $user_query = mysqli_query($con,$user_sql);
 if ($user_query===true) {
    echo '删除成功';
 }
?>