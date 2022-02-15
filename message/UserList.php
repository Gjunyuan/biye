<?php
// 获取消息列表
// 私信页调用

include('../config/config.php');
include('../config/verify.php');
include('../config/user.php');
$message1 = verify($_GET['n'],$_GET['p']);//获取用户信息
if(!isset($_GET['id'])){
  die("<script>alert('用户信息错误！');history.go(-1)</script>");
}
$id = $_GET['id'];//获取id


$con = mysqli_connect($sql{'hostname'}, $sql{'user'}, $sql{'password'}, $sql{'database'});
mysqli_set_charset($con, 'utf8');
$sql = "SELECT * FROM `private` where `Aid`='$id' or `Bid`='$id'";
$abc = mysqli_query($con, $sql);
$message = [];
while ($row = mysqli_fetch_array($abc)) {
  if ($row['Aid']==$id) {
    $name = userId($row['Bid']);
  }else{
    $name = userId($row['Aid']);
  }
  $message[] = [
    'id' => $name{'id'},
    'name' => $name{'name'},
    'head' => $name{'head'},
    'state' => $row['state'],
    'trail' => $row['trail'],
    'chat' => $row['chat']
  ];
}

$message = JSON_encode($message); //转换为json字符串
echo $message;
