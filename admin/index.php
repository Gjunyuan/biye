<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>管理员登录</title>
    <link rel="stylesheet" href="../css/index.css" media="screen" title="no title" charset="utf-8">
    <link rel="stylesheet" href="../css/login.css" media="screen" title="no title" charset="utf-8">
    <link rel="stylesheet" href="../css/font-awesome/css/font-awesome.min.css" media="screen" title="no title" charset="utf-8">
  </head>
  <body>
    <!-- 图片层 -->
    <div class="bg">
      <!-- 模糊层 -->
      <div class="bg_div"></div>
    </div>


    <!-- 登录面板 -->
    <div class="main_div_1">
      <h1 class="title">AdminLogin</h1>
      <form class="" action="../php/AdminLogin.php" method="post">
        <input type="text" class="text zhanghao" name="name" value="" placeholder="Account"><br>
        <input type="password" class="text password" name="password" value="" placeholder="Password"><br>
        <input type="submit" name="submit" class="submit fa fa-check" value="✔">
      </form>
    </div>


    <script src="../js/index.js"></script>
  </body>
</html>
