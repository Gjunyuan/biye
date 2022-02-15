<?php
//判断用户信息是否合法
// 输出该用户所有信息
// 多页面引用
$a = $_GET['n'];
$b = $_GET['p'];
  include('../config/config.php');
  $con = mysqli_connect($sql{'hostname'},$sql{'user'},$sql{'password'},$sql{'database'});
  mysqli_set_charset($con,'utf8');
  $sql = "SELECT * FROM `user` WHERE `account`='$a'";
  $abc = mysqli_query($con,$sql);
  $row = mysqli_fetch_array($abc);
  if ($row['password'] != $b) {
    die("<script>window.location='../index.php';</script>");
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
    'position' => $row['position'],
    'sign' => $row['sign']
  ];
  $message = JSON_encode($message);
  echo $message;
 ?>