<?php
  function verify($a,$b)
  {
    if (empty($a) || empty($b)) {
      die("<script>window.location='../index.php';</script>");
      // die("1");
    }
    include('config.php');
    $con = mysqli_connect($sql{'hostname'},$sql{'user'},$sql{'password'},$sql{'database'});
    mysqli_set_charset($con,'utf8');
    $sql = "SELECT * FROM `user` WHERE `account`='$a'";
    $abc = mysqli_query($con,$sql);
    $row = mysqli_fetch_array($abc);
    if ($row['password'] != $b) {
      die("<script>window.location='../index.php';</script>");
      // die("2");
    }
  }

 ?>
