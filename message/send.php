<?php
include('../config/config.php');
include('../config/verify.php');
include('../config/user.php');
$message1 = verify($_GET['n'],$_GET['p']);//获取用户信息

if(!isset($_GET['chat']) and !isset($_GET['id'])){
  die("<script>alert('用户信息错误！');history.go(-1)</script>");
}

date_default_timezone_set('PRC'); //设置中国时区
$data =  date('Y-m-d H:i:s');//中国标准时间

// $id = $_GET['id'];
$chat = $_GET['chat'];
$text = $_GET['text'];
$con = mysqli_connect($sql{'hostname'}, $sql{'user'}, $sql{'password'}, $sql{'database'});
mysqli_set_charset($con, 'utf8');
$id = $message1{'id'};
$sql = "INSERT INTO `$chat`(`uid`, `value`, `Time`) VALUES ('$id','$text','$data')";
$abc = mysqli_query($con, $sql);

$sql1 = "UPDATE `private` SET `trail`='$text' WHERE `chat`='$chat'";
$abc1 = mysqli_query($con, $sql1);

echo '1';

?>
