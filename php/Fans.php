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
    // 修改我的关注数量与关注列表
    $FansNumstr = $row['AttentionList'];
    $str=str_replace($yid,'',$FansNumstr);
    //上传数据
    $sql_userfans = "UPDATE `user` SET `AttentionList` = '$str' WHERE `user`.`id` = '$id'";
    $abc_userfans = mysqli_query($con, $sql_userfans);

    $sql_str = "SELECT * FROM `user` WHERE `id`='$uid'";
    $abc_str = mysqli_query($con, $sql_str);
    $row_str = mysqli_fetch_array($abc_str);
    // 修改对方粉丝数量与粉丝列表
    $FansNumstr_u = $row_str['FansList'];
    $str_u=str_replace($iid,'',$FansNumstr_u);
    //上传数据
    $sql_userfans = "UPDATE `user` SET `FansList` = '$str_u' WHERE `user`.`id` = '$uid'";
    $abc_userfans = mysqli_query($con, $sql_userfans);



    //查询关注数量
    $sql_fans = "SELECT * FROM `user` WHERE `id`='$id'";
    $abc_fans = mysqli_query($con, $sql_fans);
    $row_fans = mysqli_fetch_array($abc_fans);
    //修改关注数
    $fansNum = $row_fans['attention'];
    $fansNum = $fansNum - 1;
    //上传关注数
    $sql_fansNnm = "UPDATE `user` SET `attention` = '$fansNum' WHERE `user`.`id` = '$id'";
    $abc_fansNum = mysqli_query($con, $sql_fansNnm);

    //查询对方粉丝数量
    $sql_fans_u = "SELECT * FROM `user` WHERE `id`='$uid'";
    $abc_fans_u = mysqli_query($con, $sql_fans_u);
    $row_fans_u = mysqli_fetch_array($abc_fans_u);
    //修改对方粉丝数
    $fansNum_u = $row_fans_u['fans'];
    $fansNum_u = $fansNum_u - 1;
    //上传对方粉丝数
    $sql_fansNnm_u = "UPDATE `user` SET `fans` = '$fansNum_u' WHERE `user`.`id` = '$uid'";
    $abc_fansNum_u = mysqli_query($con, $sql_fansNnm_u);

    // 返回对方粉丝数量
    $sql_fansNum = "SELECT * FROM `user` WHERE `id`='$uid'";
    $abc_sql_fansNum = mysqli_query($con,$sql_fansNum);
    $row_fansNum = mysqli_fetch_array($abc_sql_fansNum);
    die('关注');
}else{
    $sql_str = "SELECT * FROM `user` WHERE `id`='$id'";
    $abc_str = mysqli_query($con, $sql_str);
    $row_str = mysqli_fetch_array($abc_str);
    // 修改我的关注数量与关注列表
    $str = $row_str['AttentionList'].$yid;
    //上传数据
    $sql_userfans = "UPDATE `user` SET `AttentionList` = '$str' WHERE `user`.`id` = '$id'";
    $abc_userfans = mysqli_query($con, $sql_userfans);

    $sql_str_u = "SELECT * FROM `user` WHERE `id`='$uid'";
    $abc_str_u = mysqli_query($con, $sql_str_u);
    $row_str_u = mysqli_fetch_array($abc_str_u);
    // 修改对方粉丝数量与粉丝列表
    $str_u = $row_str_u['FansList'].$iid;
    //上传数据
    $sql_userfans_u = "UPDATE `user` SET `FansList` = '$str_u' WHERE `user`.`id` = '$uid'";
    $abc_userfans_u = mysqli_query($con, $sql_userfans_u);

    


    //查询关注数量
    $sql_fans = "SELECT * FROM `user` WHERE `id`='$id'";
    $abc_fans = mysqli_query($con, $sql_fans);
    $row_fans = mysqli_fetch_array($abc_fans);
    //修改关注数
    $fansNum = $row_fans['attention'];
    $fansNum = $fansNum + 1;
    //上传关注数
    $sql_fansNnm = "UPDATE `user` SET `attention` = '$fansNum' WHERE `user`.`id` = '$id'";
    $abc_fansNum = mysqli_query($con, $sql_fansNnm);

    //查询对方粉丝数量
    $sql_fans_u = "SELECT * FROM `user` WHERE `id`='$uid'";
    $abc_fans_u = mysqli_query($con, $sql_fans_u);
    $row_fans_u = mysqli_fetch_array($abc_fans_u);
    //修改对方粉丝数
    $fansNum_u = $row_fans_u['fans'];
    $fansNum_u = $fansNum_u + 1;
    //上传对方粉丝数
    $sql_fansNnm_u = "UPDATE `user` SET `fans` = '$fansNum_u' WHERE `user`.`id` = '$uid'";
    $abc_fansNum_u = mysqli_query($con, $sql_fansNnm_u);

    // 返回对方粉丝数量
    $sql_fansNum = "SELECT * FROM `user` WHERE `id`='$id'";
    $abc_sql_fansNum = mysqli_query($con,$sql_fansNum);
    $row_fansNum = mysqli_fetch_array($abc_sql_fansNum);
    die('已关注');
}
?>
