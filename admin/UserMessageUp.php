<?php
 include("../config/config.php");
 include("../config/mysqli.php");
 $con = mysqli_connect($sql{'hostname'},$sql{'user'},$sql{'password'},$sql{'database'});
 mysqli_set_charset($con,'utf8');

$id = $_GET['id'];
$name = $_GET['name'];
$account = $_GET['account'];
$sign = $_GET['sign'];
$mail = $_GET['mail'];
$phone = $_GET['phone'];
$address = $_GET['address'];
$RegisterTime = $_GET['RegisterTime'];
$position = $_GET['position'];


$sql = "UPDATE `user` SET `name`='$name',`account`='$account',`mail`='$mail',`phone`='$phone',`address`='$address',`RegisterTime`='$RegisterTime',`position`='$position',`sign`='$sign' WHERE `id`= '$id'";
$abc = mysqli_query($con,$sql);
if (!$abc) {
    die("<script>alert('修改失败！');history.go(-1)</script>");
}
die("<script>alert('修改成功！');history.go(-1)</script>");
?>