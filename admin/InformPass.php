<?php
include("../config/config.php");//获取数据库文件
$id = $_GET['id']; //动态的id
$Aid = '1';
$Bid = $_GET['uid'];//举报用户的id

 $con = mysqli_connect($sql{'hostname'},$sql{'user'},$sql{'password'},$sql{'database'});
 mysqli_set_charset($con,'utf8');
 

//  查询有没有对应的聊天表单
 $sql1 = "SELECT * FROM `private` where `Aid`='1' and `Bid`='$Bid' or `Aid`='$Bid' and `Bid`='1'";
 $abc1 = mysqli_query($con, $sql1);
 $row = mysqli_fetch_array($abc1);
 $a = 0;//默认为0 就是没有
 if ($row['Aid']==$Aid) {
   if ($row['Bid']==$Bid) {
     $a = 1;
   }
 }
 if ($row['Bid']==$Aid) {
   if ($row['Aid']==$Bid) {
     $a = 1;
   }
 }

date_default_timezone_set('PRC'); //设置中国时区
 $data =  date('Y-m-d H:i:s');//中国标准时间
if (!$a) {
  $chat = '1-'.$Bid;
  $sql = "INSERT INTO `private`(`Aid`, `Bid`, `chat`, `state`, `CreateTime`) VALUES ('1','$Bid','$chat','1','$data')";
  $abc = mysqli_query($con, $sql);
  $sql4 = "CREATE TABLE if not EXISTS `$chat`(	`id` int AUTO_INCREMENT,`uid` text not null,`value` text not null,`Time` text not null,PRIMARY key(`id`))ENGINE=INNODB DEFAULT charset=`utf8`";
  $abc4 = mysqli_query($con, $sql4);
  $sql3 = "INSERT INTO `$chat`(`uid`, `value`, `Time`) VALUES ('1','您的举报我们已经查看，并不存在任何违规内容','$data')";
  $abc3 = mysqli_query($con, $sql3);
}else {
  $sqls = "SELECT * FROM `private` where `Aid`='1' and `Bid`='$Bid' or `Aid`='$Bid' and `Bid`='1'";
  $abcs = mysqli_query($con, $sqls);
  $rows = mysqli_fetch_array($abcs);
  $chat1 = $rows['chat'];
  $sql2 = "INSERT INTO `$chat1`(`uid`, `value`, `Time`) VALUES ('1','您的举报我们已经查看，并不存在任何违规内容','$data')";
  $abc2 = mysqli_query($con, $sql2);
}

 $Inform_sql = "UPDATE `inform` SET `state`='1' WHERE `InformDynamic`='$id' and `informer`='$Bid'";
 $Inform_query = mysqli_query($con,$Inform_sql);
 if ($Inform_query===true) {
    echo '已回复';
 }
?>