<?php
// 获取评论
 include("../config/config.php");//获取数据库文件
 include('../config/user.php');

 if(!isset($_GET['id'])){
    die("<script>alert('用户信息错误！');history.go(-1)</script>");
 }
 $id = $_GET['id'];//获取动态id

 $con = mysqli_connect($sql{'hostname'},$sql{'user'},$sql{'password'},$sql{'database'});
 mysqli_set_charset($con,'utf8');
 
 $user_sql = "SELECT * FROM `comment` WHERE `DynamicID`='$id' ORDER BY give desc";

 $user_query = mysqli_query($con,$user_sql);

 $message = [];
 while($row=mysqli_fetch_assoc($user_query)){
      $name = user($row['issue']);
    $message[] = [
        'id' => $row['id'],
        'name' => $name,
        'give' => $row['give'],
        'essay' => $row['essay'],
        'image' => $row['image'],
        'issue' => $row['issue'],
        'audit' => $row['audit'],
        'AuditId' => $row['AuditId'],
        'DynamicID' => $row['DynamicID'],
        'IssueTime' => $row['IssueTime'],
        'issuehead' => '../image/vague_img2.php?x=20&url=head/'.$row['issuehead'].'.png'
    ];
 }
 $message = JSON_encode($message);
 echo $message;
//  var_dump($message)
?>