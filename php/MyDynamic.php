<?php
// 获取我的动态
// 我的调用

include('../config/config.php');
include('../config/user.php');
// include('../config/verify.php');
// $message = verify($_GET['n'],$_GET['p']);
$name = $_GET['n'];
$con = mysqli_connect($sql{'hostname'}, $sql{'user'}, $sql{'password'}, $sql{'database'});
mysqli_set_charset($con, 'utf8');
$sql = "SELECT * FROM `dynamic` WHERE `issue`='$name' ORDER BY id DESC";
$abc = mysqli_query($con, $sql);
$message = [];
while ($row = mysqli_fetch_array($abc)) {
  $name = user($row['issue']);
  $message[] = [
    'id' => $row['id'],
    'name' => $name,
    'issue' => $row['issue'],
    'issuehead' => '../image/vague_img2.php?x=20&url=head/'.$row['issuehead'].'.png',
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
