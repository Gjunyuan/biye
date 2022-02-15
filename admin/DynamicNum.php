<?php
//动态数量
 include("../config/config.php");
 $con = mysqli_connect($sql{'hostname'},$sql{'user'},$sql{'password'},$sql{'database'});
 mysqli_set_charset($con,'utf8');
 $sql = "SELECT * FROM `dynamic`";
 $abc = mysqli_query($con,$sql);
 $a = 0;
 while ($row = mysqli_fetch_array($abc)) {
   $a++;
 }
echo $a;
 ?>
