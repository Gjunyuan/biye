<?php
// 管理员登录页
 include("../config/config.php");
 include("../config/mysqli.php");
 $con = mysqli_connect($sql{'hostname'},$sql{'user'},$sql{'password'},$sql{'database'});
 mysqli_set_charset($con,'utf8');
 $name = safe($_POST['name']);
 $password = safe($_POST['password']);
 date_default_timezone_set('PRC'); //设置中国时区
 $data =  date('Y-m-d H:i:s');//中国标准时间
 $dataY = date("Y");
 $dataM = date("m");
 $dataD = date("d");

 if (empty($name) || empty($password)) {
  die("<script>alert('输入完整！');history.go(-1)</script>");
 }



 $passwordMD5 = md5($_POST['password']);

 $sql = "SELECT * FROM `user` WHERE `account`='$name'";
 $abc = mysqli_query($con,$sql);
 $row = mysqli_fetch_array($abc);

 if ($row['password'] != $passwordMD5) {
   die("<script>alert('账号或密码错误！');history.go(-1)</script>");
 }

 if ($row['position'] != 1) {
   die("<script>alert('你不是管理员！');history.go(-1)</script>");
 }

 die("<script>window.location='../admin/main.php?n=$name&p=$passwordMD5';</script>");

 ?>
