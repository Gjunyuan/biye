
<?php
 include("../config/config.php");
 include("../config/mysqli.php");
 $con = mysqli_connect($sql{'hostname'},$sql{'user'},$sql{'password'},$sql{'database'});
 mysqli_set_charset($con,'utf8');


 if (isset($_GET['name'])) {
  $name = safe($_GET['name']);
  $sql = "SELECT * FROM user WHERE name LIKE '%$name%' or account LIKE '%$name%'";
 }else {
  $sql = "SELECT * FROM user";
 } 
 
 $abc = mysqli_query($con,$sql);
 $ab = [];
 while ($row = mysqli_fetch_assoc($abc)) {

   $position = "普通用户";
   if ($row['position']==1) {$position = "管理员";}
   if ($row['position']==2) {$position = "锁定用户";}

    $ab[] = [
      'id' => $row['id'],
     'name' => $row['name'],
     'account' => $row['account'],
     'password' => $row['password'],
     'head' => $row['head'],
     'background' => $row['background'],
     'mail' => $row['mail'],
     'MailAudit' => $row['MailAudit'],
     'phone' => $row['phone'],
     'PhoneAudit' => $row['PhoneAudit'],
     'address' => $row['address'],
     'RegisterTime' => $row['RegisterTime'],
     'sign' => $row['sign'],
     'position' => $position
    ];

  }

  $ac = JSON_encode($ab,true);
  echo $ac;
 ?>



