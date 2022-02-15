<?php
error_reporting(E_ALL & ~E_NOTICE);
// 用户登录页
include("../config/config.php");
include("../config/mysqli.php");
$con = mysqli_connect($sql{'hostname'}, $sql{'user'}, $sql{'password'}, $sql{'database'});
mysqli_set_charset($con, 'utf8');

if (empty($_GET['name']) || empty($_GET['pwd'])) {
  die('001');
}
$name = safe($_GET['name']);
$password = safe($_GET['pwd']);
date_default_timezone_set('PRC'); //设置中国时区
$data =  date('Y-m-d H:i:s'); //中国标准时间
$dataY = date("Y");
$dataM = date("m");
$dataD = date("d");





$passwordMD5 = md5($_GET['pwd']);
$sql = "SELECT * FROM `user` WHERE `account`='$name'";
$abc = mysqli_query($con, $sql);
$row = mysqli_fetch_array($abc);

if ($row['password'] != $passwordMD5) {
  die('200');
}
if ($row['position'] == '2') {
  die('300');
}


//判断网络连接是否正常
$http =  get_http_code("http://www.junyuan.ml/");
if ($http==200) {
  $record_url = file_get_contents("http://www.junyuan.ml/php/api/ip.php");
  $record_url = addcslashes($record_url, "\\");
} else {
  $record_url = [
    'ip' => '172.0.0.1',
    'address' => "无联网登录",
    'x' => '0',
    'y' => '0',
    'time' => $data
  ];
  $record_url = json_encode($record_url);
  $record_url = addcslashes($record_url, "\\");
}

$record_sql = "INSERT INTO `record`(`uid`, `value`) VALUES ('$name','$record_url')";
$record_abc = mysqli_query($con, $record_sql);
die($passwordMD5);


function get_http_code($url) {
  $curl = curl_init();
  curl_setopt($curl, CURLOPT_URL, $url);
  curl_setopt($curl, CURLOPT_HEADER, 1);
  curl_setopt($curl, CURLOPT_NOBODY, true);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
  $data = curl_exec($curl);
  $return = curl_getinfo($curl, CURLINFO_HTTP_CODE);
  curl_close($curl);
  return $return;
}