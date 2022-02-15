<?php
//管理员数量
 include("../config/config.php");
 $con = mysqli_connect($sql{'hostname'},$sql{'user'},$sql{'password'},$sql{'database'});
 mysqli_set_charset($con,'utf8');
 $sql = "SELECT * FROM `user` where `position`='1'";
 $abc = mysqli_query($con,$sql);
 $a = 0;
 while ($row = mysqli_fetch_array($abc)) {
   $a++;
 }
echo $a;
// return $a;
 ?>
