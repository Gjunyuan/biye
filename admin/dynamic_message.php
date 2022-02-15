<?php
// 获取动态所有信息 不包括评论
// 管理页调用

  $id = $_GET['id'];
  include('../config/config.php');
  $con = mysqli_connect($sql{'hostname'}, $sql{'user'}, $sql{'password'}, $sql{'database'});
  mysqli_set_charset($con, 'utf8');
  $sql = "SELECT * FROM `dynamic` WHERE `id`='$id'";
  $abc = mysqli_query($con, $sql);
  $row = mysqli_fetch_array($abc);

  if ($row['audit']==0) {
    $audit = "审核中";
  }elseif($row['audit']==1){
    $audit = "已审核";
  }
  $message = [
    'id' => $row['id'],
    'issue' => $row['issue'],
    'issuehead' => '../image/head/'.$row['issuehead'].'.png',
    'audit' => $audit,
    'AuditId' => $row['AuditId'],
    'essay' => $row['essay'],
    'image' => $row['image'],
    'IssueTime' => $row['IssueTime']
  ];
  $message = JSON_encode($message);
  echo $message;
