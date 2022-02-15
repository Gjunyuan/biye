<?php
// 删除我的动态

include('../config/config.php');
include('../config/user.php');
include('../config/verify.php');
$id= $_GET['id'];

if(!isset($_GET['n']) || !isset($_GET['p'])){
   die("<script>alert('用户信息错误！');history.go(-1)</script>");
}

$con = mysqli_connect($sql{'hostname'}, $sql{'user'}, $sql{'password'}, $sql{'database'});
mysqli_set_charset($con, 'utf8');
$sql = "DELETE FROM `dynamic` WHERE `id`='$id'";
$abc = mysqli_query($con, $sql);
if ($abc===true) {
  echo "删除成功$id";
}else {
  echo "删除失败$id";
}
