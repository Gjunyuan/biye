<?php
// 发布动态
 include("../config/config.php");//获取数据库文件
 include("../config/mysqli.php");
 include("../config/verify.php");//获取用户信息

 if(!isset($_GET['n']) || !isset($_GET['p'])){
    die("<script>alert('用户信息错误！');history.go(-1)</script>");
 }
 $name = $_GET['n'];//获取用户信息
 $pwd = $_GET['p'];//获取用户信息
 $message = verify($name,$pwd);//获取用户信息

 $con = mysqli_connect($sql{'hostname'},$sql{'user'},$sql{'password'},$sql{'database'});
 mysqli_set_charset($con,'utf8');
 $text = safe($_POST['text']);
 
 $user_sql = "SELECT * FROM `user` WHERE `account`='$name'";
 $user_query = mysqli_query($con,$user_sql);
 $user_row = mysqli_fetch_array($user_query);

 if($user_row['password'] !== $pwd){
    die("<script>alert('用户信息错误！');history.go(-1)</script>");
 }
 

 date_default_timezone_set('PRC'); //设置中国时区
 $data =  date('Y-m-d H:i:s');//中国标准时间
 $dataY = date("Y");
 $dataM = date("m");
 $dataD = date("d");
$image = [];
$File = $_FILES;//获取文件名称
for ($i=1; $i < 10; $i++) { 
    $FileList = "../image/dynamic/";//文件上传后位置（加文件名）
    if ($File['file'.$i]['name']!=="") {
        $FileTmp = $File['file'.$i]['tmp_name'];
        $FileName = $File['file'.$i]['name'];
        $timename = time().$i.'.'.substr(strrchr($FileName, '.'), 1); //将文件名设置成时间戳加$i加文件后缀名
        $FileList1 = $FileList.$timename;
        move_uploaded_file($FileTmp,$FileList1);//将文件移动到新的位置（上传后的位置）
        $image[] = $timename;
    }
}


$image1 = JSON_encode($image);//转换为json字符串
$head = $message{'account'};
$img_sql = "INSERT INTO `dynamic`(`issue`, `issuehead`, `audit`, `essay`, `image`, `IssueTime`) VALUES ('$name','$head','0','$text','$image1','$data')";
$img_query = mysqli_query($con,$img_sql);
if(!$img_query){
  die("<script>alert('发布失败！');history.go(-2)</script>");
}else{
  die("<script>alert('发布成功！');history.go(-2);</script>");
}
?>