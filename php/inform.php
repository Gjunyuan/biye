<?php
// 用户注册页
 include("../config/config.php");
 include("../config/mysqli.php");
 $con = mysqli_connect($sql{'hostname'},$sql{'user'},$sql{'password'},$sql{'database'});
 mysqli_set_charset($con,'utf8');

 $id = $_GET['id'];
 $myid = $_GET['myid'];

 if (empty($id) || empty($myid)) {
  die("举报失败");
 }

$sqlSE = "SELECT * FROM `inform` WHERE `informer`='$myid' and `InformDynamic`='$id' and `state`='0'";
$abcSE = mysqli_query($con,$sqlSE);
// $rowSE = mysqli_fetch_array($abcSE);
if(mysqli_num_rows($abcSE)){
  die("你已经举报过这个动态了");
}


 $sql = "INSERT INTO `inform`(`informer`, `InformDynamic`, `InformText`) VALUES ('$myid','$id','提交了举报')";

 if($abc = mysqli_query($con,$sql)===true){
  die("举报成功");
 }
  die("举报失败");

 ?>
