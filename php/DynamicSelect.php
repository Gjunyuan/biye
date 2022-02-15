<?php
// 获取所有动态
// 首页调用
$text = $_GET['text'];
include('../config/config.php');
include('../config/user.php');

$con = mysqli_connect($sql{'hostname'}, $sql{'user'}, $sql{'password'}, $sql{'database'});
mysqli_set_charset($con, 'utf8');
// die($_GET['n']);
if(!isset($_GET['n'])){
  $sql = "SELECT * FROM `dynamic` where `issue` LIKE '%$text%' or `essay` LIKE '%$text%'";
}else{
  $n = $_GET['n'];
  $sql = "SELECT * FROM `dynamic` where `issue`='$n' and `essay` LIKE '%$text%'";
}

$abc = mysqli_query($con, $sql);
$message = [];
while ($row = mysqli_fetch_array($abc)) {
  $name = user($row['issue']);
  $message[] = [
    'id' => $row['id'],
    'name' => $name{'name'},
    'uid' => $name{'id'},
    'issue' => $row['issue'],
    'issuehead' => '../image/head/'.$row['issuehead'].'.png',
    'audit' => $row['audit'],
    'AuditId' => $row['AuditId'],
    'essay' => $row['essay'],
    'image' => $row['image'],
    'IssueTime' => $row['IssueTime'],
    'give' => $row['give'],
    'comment' => $row['comment'],
    'transmit' => $row['transmit']
  ];
}

$message = JSON_encode($message); //转换为json字符串
echo $message;
