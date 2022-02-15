<?php
// 提交评论
 include("../config/config.php");//获取数据库文件
 include("../config/mysqli.php");
 include("../config/verify.php");//获取用户信息

 if(!isset($_GET['n']) || !isset($_GET['p'])){
    die("<script>alert('1用户信息错误！');history.go(-1)</script>");
 }
 $name = $_GET['n'];//获取用户信息
 $pwd = $_GET['p'];//获取用户信息
 $id = $_GET['id'];//获取动态id
 $text = $_POST['text'];
 if (empty($text)) {
  die("<script>alert('输入完整！');history.go(-1)</script>");
 }
 $message = verify($name,$pwd);//获取用户信息

 $con = mysqli_connect($sql{'hostname'},$sql{'user'},$sql{'password'},$sql{'database'});
 mysqli_set_charset($con,'utf8');
 $text = safe($_POST['text']);
 
 $user_sql = "SELECT * FROM `user` WHERE `account`='$name'";
 $user_query = mysqli_query($con,$user_sql);
 $user_row = mysqli_fetch_array($user_query);

 if($user_row['password'] !== $pwd){
    die("<script>alert('2用户信息错误！');self.location=document.referrer;</script>");
 }
 
 date_default_timezone_set('PRC'); //设置中国时区
 $data =  date('Y-m-d H:i:s');//中国标准时间

$head = $message{'account'};
$img_sql = "INSERT INTO `comment`(`DynamicID`, `issue`, `issuehead`, `audit`, `AuditId`, `essay`, `IssueTime`, `give`) VALUES ('$id','$name','$head','0','0','$text','$data','0')";

$img_query = mysqli_query($con,$img_sql);
if(!$img_query){
  die("<script>alert('发表失败！');self.location=document.referrer;</script>");
}else{
  $user_pl_sql = "SELECT * FROM `dynamic` WHERE `id`='$id'";
  $user_pl_query = mysqli_query($con,$user_pl_sql);
  $user_pl_row = mysqli_fetch_array($user_pl_query);
  $user_pl_num = $user_pl_row['comment'];
  $user_pl_num1 = $user_pl_num + 1;
  $img_pl_sql = "UPDATE `dynamic` SET `comment`='$user_pl_num1' WHERE `id`='$id'";
  $img_pl_query = mysqli_query($con,$img_pl_sql);
  die("<script>self.location=document.referrer;</script>");
}
?>