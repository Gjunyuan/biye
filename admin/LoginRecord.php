
<?php
 include("../config/config.php");
 include("../config/mysqli.php");
 $con = mysqli_connect($sql{'hostname'},$sql{'user'},$sql{'password'},$sql{'database'});
 mysqli_set_charset($con,'utf8');

 $sql = "SELECT * FROM record ORDER BY id DESC limit 30";
 
 $abc = mysqli_query($con,$sql);
 
 $ab = [];
 while ($row = mysqli_fetch_assoc($abc)) {
   $value =  $row['value'];
    $ab[] = [
     'id' => $row['id'],
     'name' => $row['uid'],
     'value' => $value
    ];

  }
  $ab = JSON_encode($ab,true);
  echo $ab;
 ?>



