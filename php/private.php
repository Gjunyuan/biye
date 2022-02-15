<?php
include('../config/config.php');
include('../config/verify.php');
include('../config/user.php');
$message1 = verify($_GET['n'],$_GET['p']);//获取用户信息
// if(!isset($_GET['n']) and !isset($_GET['id'])){
//   die("用户信息错误！");
// }

date_default_timezone_set('PRC'); //设置中国时区
$data =  date('Y-m-d H:i:s');//中国标准时间

$Aid = $_GET['Aid'];
$Bid = $_GET['Bid'];
$chat = time().$Aid;
$con = mysqli_connect($sql{'hostname'}, $sql{'user'}, $sql{'password'}, $sql{'database'});
mysqli_set_charset($con, 'utf8');
$sql1 = "SELECT * FROM `private` where `Aid`='$Aid' or `Bid`='$Aid'";
$abc1 = mysqli_query($con, $sql1);
$row = mysqli_fetch_array($abc1);
$a = 0;
if ($row['Aid']==$Aid) {
  if ($row['Bid']==$Bid) {
    $a = 1;
  }
}elseif ($row['Bid']==$Aid) {
  if ($row['Aid']==$Bid) {
    $a = 1;
  }
}
if (!$a) {
  $sql = "INSERT INTO `private`(`Aid`, `Bid`, `chat`, `state`, `CreateTime`) VALUES ('$Aid','$Bid','$chat','0','$data')";
  $abc = mysqli_query($con, $sql);
}
echo '1';



?>
