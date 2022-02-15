<?php
// 使用账号获取昵称
function user($name)
{
    // $name = $_GET['issue'];
    include('config.php');
    $con = mysqli_connect($sql{'hostname'},$sql{'user'},$sql{'password'},$sql{'database'});
    mysqli_set_charset($con,'utf8');
    $sql = "SELECT * FROM `user` WHERE `account`='$name'";
    $abc = mysqli_query($con,$sql);
    $row = mysqli_fetch_array($abc);
    $message = [
        'id' => $row['id'],
        'name'=> $row['name'],
        'head'=> $row['head'],
        'CollectList' => $row['CollectList']
    ];
    return $message;
}


// 使用id获取信息
function userId($name)
{
    // $name = $_GET['issue'];
    include('config.php');
    $con = mysqli_connect($sql{'hostname'},$sql{'user'},$sql{'password'},$sql{'database'});
    mysqli_set_charset($con,'utf8');
    $sql = "SELECT * FROM `user` WHERE `id`='$name'";
    $abc = mysqli_query($con,$sql);
    $row = mysqli_fetch_array($abc);
    $message = [
        'id' => $row['id'],
        'name'=> $row['name'],
        'head'=> $row['head'],
        'CollectList' => $row['CollectList']
    ];
    return $message;
}
?>