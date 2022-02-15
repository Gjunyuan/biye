<?php
// 发布动态
 include("../config/config.php");//获取数据库文件
 include("../config/mysqli.php");
 include("../config/verify.php");//获取用户信息

// die($File['file1']['name']);
// die($_POST['p']);
 if(!isset($_POST['n']) || !isset($_POST['p'])){
    die("<script>alert('用户信息错误！');history.go(-1)</script>");
 }
 $name = $_POST['n'];//获取用户信息
 $pwd = $_POST['p'];//获取用户信息


// die($_FILES['file1']['name']);
 $name1 = $_POST['name'];//获取昵称
 $sign = $_POST['sign'];//获取签名
 $mail = $_POST['mail'];//获取邮箱
 $phone = $_POST['phone'];//获取电话
 $address = $_POST['address'];//获取地址

 $message = verify($name,$pwd);//获取用户信息
 $id = $message{'id'};
 $con = mysqli_connect($sql{'hostname'},$sql{'user'},$sql{'password'},$sql{'database'});
 mysqli_set_charset($con,'utf8');

 $user_sql = "SELECT * FROM `user` WHERE `account`='$name'";
 $user_query = mysqli_query($con,$user_sql);
 $user_row = mysqli_fetch_array($user_query);

 if($user_row['password'] !== $pwd){
    die("<script>alert('用户信息错误！');history.go(-1)</script>");
 }

$File = $_FILES;//获取文件名称
$bg = "../image/bg/";//文件上传后位置（加文件名）
$hd = "../image/head/";//文件上传后位置（加文件名）
$head = "";
$background= "";
// $img_sql = "INSERT INTO `user`(`name`, `head`, `background`, `mail`, `phone`, `address`, `sign`) VALUES ('$name1','$head','$background','$mail','$phone','$address','$sign') where `id`='$id'";
$img_sql = "";
if ($_FILES['file1']['name']!=="") {
    $FileTmp = $_FILES['file1']['tmp_name'];
    $FileName = $_FILES['file1']['name'];
    $FileList1 = $hd.$name.'.png';
    move_uploaded_file($FileTmp,$FileList1);//将文件移动到新的位置（上传后的位置）
    $head = $name.'.png';
    $img_sql = "UPDATE `user` SET `name`='$name1',`head`='$head',`mail`='$mail',`phone`='$phone',`address`='$address',`sign`='$sign' WHERE `id`='$id'";
    $img_query = mysqli_query($con,$img_sql);
    if(!$img_query){
        die("<script>alert('更改失败！');self.location=document.referrer;</script>");
    }else{
        die("<script>alert('更改成功！');self.location=document.referrer;;</script>");
    }
}
if ($_FILES['file2']['name']!=="") {
    $FileTmp = $_FILES['file2']['tmp_name'];
    $FileName = $_FILES['file2']['name'];
    $FileList1 = $bg.$name.'.png';
    move_uploaded_file($FileTmp,$FileList1);//将文件移动到新的位置（上传后的位置）
    $background = $name.'.png';
    $img_sql = "UPDATE `user` SET `name`='$name1',`background`='$background',`mail`='$mail',`phone`='$phone',`address`='$address',`sign`='$sign' WHERE `id`='$id'";
    $img_query = mysqli_query($con,$img_sql);
    if(!$img_query){
        die("<script>alert('更改失败！');self.location=document.referrer;</script>");
    }else{
        die("<script>alert('更改成功！');self.location=document.referrer;;</script>");
    }
}


if ($head=="" && $background=="" ) {
    $img_sql = "UPDATE `user` SET `name`='$name1',`mail`='$mail',`phone`='$phone',`address`='$address',`sign`='$sign' WHERE `id`='$id'";
    $img_query = mysqli_query($con,$img_sql);
    if(!$img_query){
        die("<script>alert('更改失败！');self.location=document.referrer;</script>");
    }else{
        die("<script>alert('更改成功！');self.location=document.referrer;;</script>");
    }
}
?>
