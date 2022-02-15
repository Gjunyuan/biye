<?php
include('../config/config.php');
include('../config/verify.php');
$message = verify($_GET['n'],$_GET['p']);
$uid = $message{'id'};
$id = $_GET['id'];//动态ID
// $uid = $_GET['uid'];//用户ID
$Sid = 'H'.$uid.'E';//用户ID
$con = mysqli_connect($sql{'hostname'}, $sql{'user'}, $sql{'password'}, $sql{'database'});
mysqli_set_charset($con, 'utf8');

$sql = "SELECT * FROM `dynamic` WHERE `id`='$id' and `UserGive` LIKE '%$Sid%'";
$abc = mysqli_query($con, $sql);
$row = mysqli_fetch_array($abc);
if (mysqli_num_rows($abc)) {
  //获取点赞数据并删除取消点赞者
  $GiveNumstr = $row['UserGive'];
  $str=str_replace($Sid,'',$GiveNumstr);
  //上传数据
  $sql_usergive = "UPDATE `dynamic` SET `UserGive` = '$str' WHERE `dynamic`.`id` = '$id'";
  $abc_usergive = mysqli_query($con, $sql_usergive);
  //查询点赞数量
  $sql_give = "SELECT * FROM `dynamic` WHERE `id`='$id'";
  $abc_give = mysqli_query($con, $sql_give);
  $row_give = mysqli_fetch_array($abc_give);
  //修改点赞数
  $giveNum = $row_give['give'];
  $giveNum = $giveNum - 1;
  //上传点赞数
  $sql_giveNnm = "UPDATE `dynamic` SET `give` = '$giveNum' WHERE `dynamic`.`id` = '$id'";
  $abc_giveNum = mysqli_query($con, $sql_giveNnm);


  // 返回点赞数量
  $sql_giveNum = "SELECT * FROM `dynamic` WHERE `id`='$id'";
  $abc_sql_giveNum = mysqli_query($con,$sql_giveNum);
  $row_giveNum = mysqli_fetch_array($abc_sql_giveNum);
  echo $row_giveNum['give'];
}else{
  $sql_str = "SELECT * FROM `dynamic` WHERE `id`='$id'";
  $abc_str = mysqli_query($con, $sql_str);
  $row_str = mysqli_fetch_array($abc_str);
  //获取点赞数据并添加点赞者
  $stri = $row_str['UserGive'].$Sid;
  // die($row_str['UserGive']);
  //上传数据
  $sql_usergive = "UPDATE `dynamic` SET `UserGive` = '$stri' WHERE `dynamic`.`id` = '$id'";
  $abc_usergive = mysqli_query($con, $sql_usergive);
  //查询点赞数量
  $sql_give = "SELECT * FROM `dynamic` WHERE `id`='$id'";
  $abc_give = mysqli_query($con, $sql_give);
  $row_give = mysqli_fetch_array($abc_give);
  //修改点赞数
  $giveNum = $row_give['give'];
  $giveNum = $giveNum + 1;
  //上传点赞数
  $sql_giveNnm = "UPDATE `dynamic` SET `give` = '$giveNum' WHERE `dynamic`.`id` = '$id'";
  $abc_giveNum = mysqli_query($con, $sql_giveNnm);

  // 返回点赞数量
  $sql_giveNum = "SELECT * FROM `dynamic` WHERE `id`='$id'";
  $abc_sql_giveNum = mysqli_query($con,$sql_giveNum);
  $row_giveNum = mysqli_fetch_array($abc_sql_giveNum);
  echo $row_giveNum['give'];
}
