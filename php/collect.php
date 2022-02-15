<?php
include('../config/config.php');
$id = $_GET['id'];//动态id
$uid = $_GET['myid'];//自己的id
$iid = 'H'.$id.'E';//用户ID
$yid = 'H'.$uid.'E';//用户ID
$con = mysqli_connect($sql{'hostname'}, $sql{'user'}, $sql{'password'}, $sql{'database'});
mysqli_set_charset($con, 'utf8');
$sql = "SELECT * FROM `user` WHERE `id`='$uid' and `CollectList` LIKE '%$iid%'";
$abc = mysqli_query($con, $sql);
$row = mysqli_fetch_array($abc);



if (mysqli_num_rows($abc)) {
    // 修改我的收藏数量与收藏列表
    $FansNumstr = $row['CollectList'];
    $str=str_replace($iid,'',$FansNumstr);
    //上传数据
    $sql_userfans = "UPDATE `user` SET `CollectList` = '$str' WHERE `user`.`id` = '$uid'";
    $abc_userfans = mysqli_query($con, $sql_userfans);

    //查询收藏数量
    $sql_fans = "SELECT * FROM `user` WHERE `id`='$uid'";
    $abc_fans = mysqli_query($con, $sql_fans);
    $row_fans = mysqli_fetch_array($abc_fans);
    //修改关注数
    $fansNum = $row_fans['collect'];
    $fansNum = $fansNum - 1;
    //上传关注数
    $sql_fansNnm = "UPDATE `user` SET `collect` = '$fansNum' WHERE `user`.`id` = '$uid'";
    $abc_fansNum = mysqli_query($con, $sql_fansNnm);

    // 返回收藏数量
    $sql_fansNum = "SELECT * FROM `user` WHERE `id`='$uid'";
    $abc_sql_fansNum = mysqli_query($con,$sql_fansNum);
    $row_fansNum = mysqli_fetch_array($abc_sql_fansNum);
    die('已取消收藏');
}else{
    $sql_str = "SELECT * FROM `user` WHERE `id`='$uid'";
    $abc_str = mysqli_query($con, $sql_str);
    $row_str = mysqli_fetch_array($abc_str);
    // 修改我的收藏数量与收藏列表
    $str = $row_str['CollectList'].$iid;
    //上传数据
    $sql_userfans = "UPDATE `user` SET `CollectList` = '$str' WHERE `user`.`id` = '$uid'";
    $abc_userfans = mysqli_query($con, $sql_userfans);

    //查询收藏数量
    $sql_fans = "SELECT * FROM `user` WHERE `id`='$uid'";
    $abc_fans = mysqli_query($con, $sql_fans);
    $row_fans = mysqli_fetch_array($abc_fans);
    //修改收藏数
    $fansNum = $row_fans['collect'];
    $fansNum = $fansNum + 1;
    //上传收藏数
    $sql_fansNnm = "UPDATE `user` SET `collect` = '$fansNum' WHERE `user`.`id` = '$uid'";
    $abc_fansNum = mysqli_query($con, $sql_fansNnm);

    // 返回收藏数量
    $sql_fansNum = "SELECT * FROM `user` WHERE `id`='$uid'";
    $abc_sql_fansNum = mysqli_query($con,$sql_fansNum);
    $row_fansNum = mysqli_fetch_array($abc_sql_fansNum);
    die('已收藏');
}
?>
