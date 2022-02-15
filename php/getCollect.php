<?php
// 获取所有动态
// 首页调用

include('../config/config.php');
include('../config/verify.php');
include('../config/user.php');
$MyMessage = verifyName($_GET['n']);
$collect = $MyMessage{'CollectList'};//获取收藏列表
$CollectArr = explode( "H",$collect);
$CollectArr1 =implode($CollectArr);
$CollectArr2 = explode( "E",$CollectArr1);
$con = mysqli_connect($sql{'hostname'}, $sql{'user'}, $sql{'password'}, $sql{'database'});
mysqli_set_charset($con, 'utf8');
$sql = "SELECT * FROM `dynamic` ORDER BY id DESC";
$abc = mysqli_query($con, $sql);

$message = [];
// die($CollectArr);

while ($row = mysqli_fetch_array($abc)) {

    if(in_array($row['id'],$CollectArr2)) {
        $name = user($row['issue']);
        $message[] = [
        'id' => $row['id'],
        'name' => $name{'name'},
        'uid' => $name{'id'},
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
  
}

$message = JSON_encode($message); //转换为json字符串
echo $message;
