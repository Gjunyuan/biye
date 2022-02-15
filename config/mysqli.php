<?php
//链接
function mysqli($db="jywb"){
  $con = mysqli_connect('localhost','root','',$db);
  mysqli_set_charset($con,'utf8');

  if (!$con) die("链接数据库失败！");
  else return $con;
}




//链接，写入，读取，删除，操作
function query($con,$sql){
  $rs = $con -> query($sql);
  if (!$rs) die("
  sql执行失败<br>
  $sql<br>
  错误编码：{$con -> errno}<br>
  错误提示：{$con -> error}
  ");
  else return $rs;
}



function fetch($con,$sql,$one=1){
  $rs = query($con,$sql);
  if ($one==1) {
    $arr=$rs->fetch_assoc();
  }else{
    $arr = [];
    while( $row=$rs->fetch_assoc() ){
      $arr[] = $row;
    }
  }
  return $arr;
}



function redirect($url='index.php'){
  header("location:$url");
  die();
}


function alert($str,$url){
  die("<script>alert('$str');location.href='$url'</script>");
}


function safe($str){
  $arr =[
  	"<" => "&lt;" ,
  	">" => "&gt;" ,
  	" " => "&nbsp;" ,
  	"\r\n" => "<br/>" ,
    "\r\n" => "<br/>" ,
    "\r\n" => "<br/>" ,
  	"\\" => "\\\\" ,
  	"'" => "''"
  ];
  return strtr($str,$arr);
}
 ?>
