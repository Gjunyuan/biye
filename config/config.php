<?php
header("Content-Type: text/html; charset=utf-8");
$sql = [
  'hostname' => 'localhost',
  'user' => 'root',
  'password' => '',
  'database' => 'biye'
];
$index = [
  'title1' => '发现',
  'title2' => '动态',
  'title3' => '搜索',
  'title4' => '我的',
  'title4_1' => '我的动态',
  'title4_2' => '我的关注',
  'title4_3' => '我的收藏',
  'title1_url' => 'main/index.php',
  'title2_url' => 'dynamic/index.php',
  'title3_url' => 'my/index.php',
  'title3_1_url' => 'my/index.php',
  'title3_2_url' => 'MyAttention/index.php',
  'title3_3_url' => 'collect/index.php',
  'bottom_admin' => "管理员登录",
  'bottom_url' => '../admin'
];
$title = [
  'title1' => "Guan",
  'title2' => "我的关注",
  'title3' => "搜索",
  'title4' => "我的动态"
];

 ?>
