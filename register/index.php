<!DOCTYPE html>
<!-- 注册 -->
<html>
  <head>
    <meta charset="utf-8">
    <title>登录</title>
    <link rel="stylesheet" href="../css/index.css" media="screen" title="no title" charset="utf-8">
    <link rel="stylesheet" href="../css/login.css" media="screen" title="no title" charset="utf-8">
    <link rel="stylesheet" href="../css/font-awesome/css/font-awesome.min.css" media="screen" title="no title" charset="utf-8">
  </head>
  <body>
    <!-- 图片层 -->
    <div class="bg" style="background-image: url(../image/bg/<?php echo rand(1,4).'.jpg';?>);">
      <!-- 模糊层 -->
      <div class="bg_div"></div>
    </div>


    <!-- 登录面板 -->
    <div class="main_div_1">
      <h1 class="title">Register</h1>
      <form class="" action="../php/register.php" method="post">
        <input type="text" class="text zhanghao" name="name" value="" placeholder="Mail/Phone"><br>
        <input type="password" class="text password" name="password" value="" placeholder="Password"><br>
        <input type="password" class="text password" name="passwordX" value="" placeholder="Repeat the password"><br>
        <input type="submit" name="submit" class="submit fa fa-check" value="✔">
      </form>
    </div>
    <!-- logo -->
    <div class="logo"><img src="../image/logo.png" alt="" srcset=""><span>黄即</span></div>


    <script src="../js/index.js"></script>
  </body>
</html>
