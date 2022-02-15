<?php
// 用户注册页
 include("../config/config.php");
 include("../config/mysqli.php");
 $head = "../image/head/head.png";
 $con = mysqli_connect($sql{'hostname'},$sql{'user'},$sql{'password'},$sql{'database'});
 mysqli_set_charset($con,'utf8');

 $name = safe($_POST['name']);
 $password = safe($_POST['password']);
 $passwordX = safe($_POST['passwordX']);

 date_default_timezone_set('PRC'); //设置中国时区
 $data =  date('Y-m-d H:i:s');//中国标准时间
 $dataY = date("Y");
 $dataM = date("m");
 $dataD = date("d");

 if (empty($name) || empty($password) || empty($passwordX)) {
  die("<script>alert('输入完整！');history.go(-1)</script>");
 }

 if ($password != $passwordX) {
   die("<script>alert('密码不一致！');history.go(-1)</script>");
 }

 if (!ctype_alnum($name)) {
   die("<script>alert('账号必须使用数字或字母！');history.go(-1)</script>");
 }

 if (strlen($name) < 6) {
   die("<script>alert('账号至少6位数！');history.go(-1)</script>");
 }
 if (strlen($password) < 6) {
    die("<script>alert('密码至少6位数！');history.go(-1)</script>");
  }

$sql1 = "SELECT * FROM `user` WHERE `account`='$name'";
$abc1 = mysqli_query($con,$sql1);
$row1 = mysqli_fetch_array($abc1);
if(!empty($row1['account'])){
  die("<script>alert('账号已被注册');history.go(-1)</script>");
}



 $passwordMD5 = md5($_POST['password']);
 $UserHead = "../image/head/".$name.".png";
  copy($head,$UserHead);
 $sql = "INSERT INTO `user`(`name`,`account`, `password`, `head`,`background`, `mail`, `MailAudit`, `phone`,`PhoneAudit`, `address`, `RegisterTime`, `position`,`attention`,`fans`) VALUES ('$name','$name','$passwordMD5','$name.png','3.jpg','未绑定','0','未绑定','0','未填写','$data','0','0','0')";

 if($abc = mysqli_query($con,$sql)===true){
  die("<script>alert('注册成功');window.location='../index.php';</script>");
 }
die("<script>alert('注册失败');window.location='../index.php';</script>");

 ?>
