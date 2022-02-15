<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>登录</title>
  <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;" name="viewport" /> <!-- <meta name="viewport" content="width=device-width, initial-scale=1" />   -->
  <link rel="stylesheet" href="css/index.css" media="screen" title="no title" charset="utf-8">
  <link rel="stylesheet" href="css/login.css" media="screen" title="no title" charset="utf-8">
</head>
<style>
  
  .submit {
    text-align: center;
  }
</style>

<body>
  <!-- 图片层 -->
  <div class="bg" style="background-image: url(image/bg/<?php echo rand(1, 4) . '.jpg'; ?>);">
    <!-- 必应每日一图 -->
    <!-- <div class="bg" style="background-image: url(<?php include('php/api/biyingimg.php'); ?>);"> -->
    <!-- <div class="bg" style="background-image:url(image/bg/1.jpg);"> -->

    <!-- 模糊层 -->
    <div class="bg_div"></div>
  </div>



  <!-- 登录面板 -->
  <div class="main_div_1" id="main">
    <h1 class="title">Login</h1>
    <!-- <form class="" action="php/login.php" method="post"> -->
    <input type="text" class="text zhanghao" name="name" value="" placeholder="Account" id="name"><br>
    <input type="password" class="text password" name="password" value="" placeholder="Password" id="pwd"><br>
    <a href="register/" class="register">Register</a><br>
    <input @click="login()" class="submit" value="✔">
    <!-- </form> -->




  </div>

  <!-- 一言 -->
  <span class="yiyan"><?php include('php/api/yiyan.php'); ?></span>

  <span class="tuyuan">
    <a class="tuyuan_name">背景来源</a>
    <a class="tuyuan_url" href="https://qzone.qq.com/">QQ空间</a>
  </span>

  <!-- logo -->
  <div class="logo"><img src="image/logo.png" alt="" srcset=""><span>黄即</span></div>


</body>
<script src="css/bootstrap/jquery.min.js"></script>
<script src="css/bootstrap/bootstrap.min.js"></script>
<script src="css/vue.js"></script>
<script src="css/axios.js"></script>
<script src="js/index.js"></script>
<script>
  var a = 1;
  var app = new Vue({
    el: '#main',
    data: {

    },
    mounted: function() {

    },
    methods: {
      //提交举报
      login() {
        var name = document.getElementById('name').value
        var pwd = document.getElementById('pwd').value
        axios({
          method: 'get',
          url: 'php/login.php?name=' + name + '&pwd=' + pwd
        }).then(function(res) {
          console.log(res.data);
          if (res.data == '100') {
            alert('登录失败，请输入完整');
          }else if(res.data == '200'){
            alert('登录失败，账号或密码错误');
          }else if(res.data == '300'){
            alert('你的账户已被锁定,暂时不能登录！');
          }else{
            // console.log('main/index.php?n='+name+'&p='+res.data);
            window.location='main/index.php?n='+name+'&p='+res.data;
          }
        });
      }
    }
  });
</script>

</html>