<?php
// 获取动态所有信息 不包括评论
// 详情页调用
function dynamic_message($id)
{
  include('../config/config.php');
  include('../config/user.php');
  $con = mysqli_connect($sql{'hostname'}, $sql{'user'}, $sql{'password'}, $sql{'database'});
  mysqli_set_charset($con, 'utf8');
  $sql = "SELECT * FROM `dynamic` WHERE `id`='$id'";
  $abc = mysqli_query($con, $sql);
  $row = mysqli_fetch_array($abc);
  $name = user($row['issue']);
  $message = [
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
  return $message;
}
?>
