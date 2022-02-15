<?php
include('../config/config.php');
include('../config/verify.php');
$message = verify_s($_GET['n'],$_GET['p'],$_GET['I']);
$id = $_GET['I'];//自己的id和对方的id
$uid = $_GET['Y'];
$iid = 'H'.$id.'E';//用户ID
$yid = 'H'.$uid.'E';//用户ID
$con = mysqli_connect($sql{'hostname'}, $sql{'user'}, $sql{'password'}, $sql{'database'});
mysqli_set_charset($con, 'utf8');
$sql = "SELECT * FROM `user` WHERE `id`='$id' and `AttentionList` LIKE '%$yid%'";
$abc = mysqli_query($con, $sql);
$row = mysqli_fetch_array($abc);

if (mysqli_num_rows($abc)) { 
    $attentionSe = '已关注';
}else{
    $attentionSe = '关注';
}

echo $attentionSe;

?>



