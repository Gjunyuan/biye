<?php
  include('../config/config.php');
  $con = mysqli_connect($sql{'hostname'},$sql{'user'},$sql{'password'},$sql{'database'});
  mysqli_set_charset($con,'utf8');
  $id = $_GET['id'];
  $sqlq = "SELECT * FROM `dynamic` WHERE `id`='$id'";
  $result = $con->query($sqlq);
  $row = mysqli_fetch_array($result);
  $message = [
    'id' => $row['id'],//id
    'issue' => $row['issue'],//发布者 
    'issuehead' => $row['issuehead'],//发布者头像
    'audit' => $row['audit'],//审核状态
    'AuditId' => $row['AuditId'],//审核者id  
    'essay' => $row['essay'],//文章 
    'image' => $row['image'],//图片
    'IssueTime' => $row['IssueTime'],//发布时间
    'give' => $row['give'],//点赞
    'UserGive' => $row['UserGive'],//点赞用户
    'comment' => $row['comment'],   //评论 
    'transmit' => $row['transmit']//转发
  ];
  $message = JSON_encode($message);
  echo $message;
?>