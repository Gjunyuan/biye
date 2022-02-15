<?php

include('../config/config.php');
include('../config/verify.php');
include('../config/user.php');
$message1 = verify($_GET['n'],$_GET['p']);//获取用户信息
if(!isset($_GET['chat'])){
  die("<script>alert('用户信息错误！');history.go(-1)</script>");
}
$chat = $_GET['chat'];
$con = mysqli_connect($sql{'hostname'}, $sql{'user'}, $sql{'password'}, $sql{'database'});
mysqli_set_charset($con, 'utf8');

$sql1 = "CREATE TABLE if not EXISTS `$chat`(	`id` int AUTO_INCREMENT,`uid` text not null,`value` text not null,`Time` text not null,PRIMARY key(`id`))ENGINE=INNODB DEFAULT charset=`utf8`";
$abc1 = mysqli_query($con, $sql1);

$sql = "SELECT * FROM `$chat`";
$abc = mysqli_query($con, $sql);
$message = [];
while ($row = mysqli_fetch_array($abc)) {
  $name = userId($row['uid']);
  $message[] = [
    'id' => $row['id'],
    'mid' => $message1{'id'},
    'uid' => $row['uid'],
    'name' => $name{'name'},
    'head' => $name{'head'},
    'value' => $row['value'],
    'Time' => $row['Time']
  ];
}

$message = JSON_encode($message); //转换为json字符串
echo $message;
?>
