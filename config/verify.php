<?php
//判断用户信息是否合法
// 输出该用户所有信息
// 多页面引用
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
    die("<script>window.location='../index.php';</script>");
  }
  if ($row['position'] == '2') {
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
  return $message;
}



function verify1($a,$b,$id)
{
  if (empty($a) || empty($b) || empty($id)) {
    die("<script>window.location='../index.php';</script>");
  }
  include('config.php');
  $con = mysqli_connect($sql{'hostname'},$sql{'user'},$sql{'password'},$sql{'database'});
  mysqli_set_charset($con,'utf8');
  $sql = "SELECT * FROM `user` WHERE `account`='$a'";
  $abc = mysqli_query($con,$sql);
  $row = mysqli_fetch_array($abc);
  if ($row['password'] != $b || $row['id'] != $id) {
    die("<script>window.location='../index.php';</script>");
  }
  if ($row['position'] == '2') {
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
  return $message;
}





//根据账号获取动态信息
function verifyId($name)
{
  include('config.php');
  $con = mysqli_connect($sql{'hostname'},$sql{'user'},$sql{'password'},$sql{'database'});
  mysqli_set_charset($con,'utf8');
  $sql = "SELECT * FROM `user` WHERE `account`='$name'";
  $abc = mysqli_query($con,$sql);
  $row = mysqli_fetch_array($abc);
  $account = $row['account'];
  $sqlq = "SELECT * FROM `dynamic` WHERE `issue`='$account'";
  $result = $con->query($sqlq);
  $DynamicNum = $result->num_rows;
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
    'sign' => $row['sign'],
    'fans' => $row['fans'],
    'attention' => $row['attention'],
    'DynamicNum' => $DynamicNum
  ];
  return $message;
}



//根据账号获取信息
function verifyName($name)
{
  include('config.php');
  $con = mysqli_connect($sql{'hostname'},$sql{'user'},$sql{'password'},$sql{'database'});
  mysqli_set_charset($con,'utf8');
  $sql = "SELECT * FROM `user` WHERE `account`='$name'";
  $result = $con->query($sql);
  $row = mysqli_fetch_array($result);
  $message = [
    'id' => $row['id'],
    'CollectList' => $row['CollectList'],
    'AttentionList' => $row['AttentionList']
  ];
  return $message;
}


//根据id获取信息
function verifyIdA($id)
{
  include('config.php');
  $con = mysqli_connect($sql{'hostname'},$sql{'user'},$sql{'password'},$sql{'database'});
  mysqli_set_charset($con,'utf8');
  $sql = "SELECT * FROM `user` WHERE `id`='$id'";
  $result = $con->query($sql);
  $row = mysqli_fetch_array($result);
  $message = [
    'id' => $row['id'],
    'name' => $row['name']
  ];
  return $message;
}



function verify_s($a,$b,$c)
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
  if ($row['account'] != $a || $row['password'] != $b || $row['id'] != $c ) {
    return '信息错误';
    die("<script>window.location='../index.php';</script>");
  }
}
 ?>