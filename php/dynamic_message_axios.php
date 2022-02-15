<?php
//获取动态所有图片
// 详情页调用
  $id = $_GET['id'];
  include('../config/config.php');
  $con = mysqli_connect($sql{'hostname'}, $sql{'user'}, $sql{'password'}, $sql{'database'});
  mysqli_set_charset($con, 'utf8');
  $sql = "SELECT * FROM `dynamic` WHERE `id`='$id'";
  $abc = mysqli_query($con, $sql);
  $row = mysqli_fetch_array($abc);
  echo $row['image'];
?>
