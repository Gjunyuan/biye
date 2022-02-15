
<?php
 include("../config/config.php");
 include("../config/mysqli.php");
 include("../config/verify.php");
 $con = mysqli_connect($sql{'hostname'},$sql{'user'},$sql{'password'},$sql{'database'});
 mysqli_set_charset($con,'utf8');
 $sql = "SELECT * FROM inform WHERE 1";

 $abc = mysqli_query($con,$sql);
 $ab = [];
 while ($row = mysqli_fetch_assoc($abc)) {
     $id = $row['informer'];
    $message = verifyIdA($id);
    $ab[] = [
      'id' => $row['id'],
     'informer' => $row['informer'],
     'name' => $message{'name'},
     'InformDynamic' => $row['InformDynamic'],
     'InformText' => $row['InformText'],
     'state' => $row['state']
    ];

  }

  $ac = JSON_encode($ab,true);
  echo $ac;
 ?>



