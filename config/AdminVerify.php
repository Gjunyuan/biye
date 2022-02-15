<?php
// 判断管理员账号是否合法
// 判断是否未管理员
// 后台管理页面引用
function verify($a,$b)
{
  if (empty($a) || empty($b)) {
    die("<script>window.location='../index.php';</script>");
  }
  include('config.php');
  $con = mysqli_connect($sql{'hostname'},$sql{'user'},$sql{'password'},$sql{'database'});
  mysqli_set_charset($con,'utf8');
  $sql = "SELECT * FROM `user` WHERE `account`='$a'";
  $abc = mysqli_query($con,$sql);
  $row = mysqli_fetch_array($abc);
  if ($row['password'] != $b) {
    die("<script>window.location='index.php';</script>");
  }
  if ($row['position'] != 1) {
    die("<script>window.location='index.php';</script>");
  }
  $message = [
    'id' => $row['id'],
    'name' => $row['name'],
    'account' => $row['account'],
    'password' => $row['password'],
    'head' => $row['head'],
    'background' => $row['background'],
    'mail' => $row['mail'],
    'MailAudit' => $row['MailAudit'],
    'phone' => $row['phone'],
    'PhoneAudit' => $row['PhoneAudit'],
    'address' => $row['address'],
    'RegisterTime' => $row['RegisterTime'],
    'position' => $row['position']
  ];
  return $message;
}
 ?>
