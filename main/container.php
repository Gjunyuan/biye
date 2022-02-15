<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>详情页</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;" name="viewport" />    <!-- <meta name="viewport" content="width=device-width, initial-scale=1" />   -->
    <link rel="stylesheet" href="..\css\index.css" media="screen" title="no title" charset="utf-8">
    <link rel="stylesheet" href="..\css\main.css" media="screen" title="no title" charset="utf-8">
    <link rel="stylesheet" href="..\css\container.css" media="screen" title="no title" charset="utf-8">
    <link rel="stylesheet" href="..\css\font-awesome\css\font-awesome.min.css" media="screen" title="no title" charset="utf-8">
  </head>
  <body>
  <style>
    @media all and (min-width:240px) and (max-width:1080px){
      .container_div,
      .container_comment,
      .main_container,
      .comment{
        width: 96%;
        margin: auto;
      }
      .container_div{
        margin-bottom:10px;

      }
      .container_div_img{
        width: 195px;
      }
      .container_img{
        width: 60px;
        height:60px;
      }
      .text{
        width: 90%;
        height:100px
      }
    }

    </style>
    <?php
      include("../config/config.php");
      include("../config/verify.php");
      $message = verify($_GET['n'],$_GET['p']);//获取用户信息
      include("../php/dynamic_message.php");
      $dynamic_message = dynamic_message($_GET['id']);//获取用户信息

      if (empty($_GET['Y']) || empty($_GET['I']) || empty($_GET['n']) || empty($_GET['p']) || empty($_GET['id'])) {
        die("<script>window.location='../index.php';</script>");
      }
     ?>
    <!-- 图片层 -->
    <div class="bg" style="background-image: url(../image/vague_img2.php?x=2&url=bg/<?php echo $message{'background'} ?>);">
      <!-- 模糊层 -->
      <div class="bg_div"></div>
    </div>

    <div class="main">

      <!-- 大标题 -->
      <div class="main_top_bg main_top_bg_1" @click="href('../main/index.php')">
        <?php echo $dynamic_message{'name'}; ?>
      </div>


      <!-- 动态内容区域 -->
      <div class="main_container main_container">

        <!-- 动态方块 -->
        <div class="container_div" style="cursor:auto;">
          <!-- 顶部头像部分 -->
          <div class="main_div_top">
            <img class="head container_head" src="<?php echo $dynamic_message{'issuehead'}; ?>" alt="" />
            <a class="name container_name" href="../UserMessage/index.php?name=<?php echo $dynamic_message{'issue'}.'&n='.$_GET['n'].'&p='.$_GET['p'].'&Y='.$_GET['Y'].'&I='.$_GET['I'] ?>"><?php echo $dynamic_message{'name'}; ?></a><br>
            <span class="container_time">发布于<?php echo $dynamic_message{'IssueTime'}; ?></span>
            <div class="btn-group" style="float:right;margin-top:-15px;">
              <button type="button" class="btn btn-default dropdown-toggle"
                  data-toggle="dropdown" style="border:0;">
                
                  <span class="glyphicon glyphicon-chevron-down"></span>
              </button>
              <ul class="dropdown-menu" role="menu">
                <li><a @click="collect('<?php echo $dynamic_message{'id'}; ?>','<?php echo $message{'id'}; ?>')">收藏</a></li>
                <li><a @click="inform('<?php echo $dynamic_message{'id'}; ?>','<?php echo $message{'id'}; ?>')">举报</a></li>
              </ul>
            </div>
          </div>
          <!-- 内容 -->
          <div class="container_div_center">
            <span class="container_val_1"><?php echo $dynamic_message{'essay'}; ?></span><br>

            <!-- id="containerImg" -->
            <div class="container_div_img">
              <?php
              $img = JSON_decode($dynamic_message{'image'});
              for ($i=0; $i < count($img); $i++) {
                echo "<img class='container_img' src='../image/vague_img2.php?x=20&url=dynamic/".$img[$i]."' onclick='cut(". $i .")' />";
              }

              ?>
              <!-- <img class="container_img" src="../image/head/junyuan.png" onclick="cut('1')" alt="" />-->
            </div>
          </div>
          <!-- 底部 -->
          <div class="container_div_bottom">
            <a class="container_div_bottom_i fa fa-commenting" style="cursor:pointer;"><?php echo $dynamic_message{'comment'}?></a>
            <a class="container_div_bottom_i fa fa-thumbs-o-up" style="cursor:pointer;" id="give" @click="DynamicGive()"><?php echo $dynamic_message{'give'}?></a>
            <a class="container_div_bottom_i fa fa-mail-forward" style="cursor:pointer;"><?php echo $dynamic_message{'transmit'}?></a>
          </div>
        </div>


        <!-- 发表评论方块 -->
        <div class="container_comment">
          <h2>发表评论</h2>
          <form class="" action="../php/SetComment.php?n=<?php echo $_GET['n'] ?>&p=<?php echo $_GET['p'] ?>&id=<?php echo $_GET['id'] ?>" method="post">
            <textarea class="text" name="text" rows="10" cols="138"></textarea>
            <button class="submit" type="submit" name="button">发送</button>
          </form>
        </div>


        <!-- 评论大方块 -->
        <div class="comment">


          <!-- 评论方块 -->
          <div class="comment_div" v-for="(item,index) in message">
            <div class="comment_div_top">
              <img class="head container_head" :src="item.issuehead" alt="" />
              <a class="name container_name" href="#" v-text="item.name.name"></a><br>
              <span class="container_time" v-text="'发布于'+item.IssueTime"></span>
              <a class="comment_div_top_i fa fa-thumbs-o-up" style="cursor:pointer;" v-text="item.give" :id="'give'+index" @click="CommentGive(item.id,index)"></a>
            </div>
            <div class="comment_div_center">
              <span class="comment_div_center_val" v-text="item.essay"></span>
            </div>
          </div>


        </div>
      </div>

      <!-- 底部 -->
      <div class="main_bottom">
          <div class="main_bottom_mohu"></div>
          <div class="main_bottom_div"><a href="<?php echo $index{'bottom_url'} ?>"><?php echo $index{'bottom_admin'} ?></a></div>
      </div>
      <!-- main -->
    </div>
    <!-- 图片预览 -->
    <div id="pic" class="pic">
      <div class="left_pic">
        <a class="left_pic_on fa fa-angle-left" style="font-size:60px;" onclick="left_pic()"></a>
      </div>
      <img id="img" class="pic_img" src="../image/dynamic/1.jpg" alt="" onclick="off()" />
      <h1 id="h1"></h1>
      <div class="right_pic">
        <a class="right_pic_on fa fa-angle-right" style="font-size:60px;" onclick="right_pic()"></a>
      </div>
      <a class="x_pic_on fa fa-compress" style="font-size:40px;text-decoration: none;" onclick="off()"></a>
      <!-- <a class="x_pic_on glyphicon glyphicon-resize-small" style="font-size:60px;" onclick="off()"></a> 	 -->
    </div>


    <link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="../css/vue.js"></script>
    <script src="../css/axios.js"></script>
    <script src="../js/container.js" charset="utf-8"></script>
    <script src="../js/index.js"></script>
    <script type="text/javascript">

      var abcd = window.location.search;
      var abcd1 = abcd.split('?id=');
      var id = abcd1[1].split('\&n=');
      // id[0]
      var name = abcd.match(/\&n=(\S*)\&p=/)[1];
      var pwd = abcd.match(/\&p=(\S*)/)[1];

      var app =new Vue({
        el:'.main',
        data:{
          message:[]
          // give:"";
        },
        mounted:function() {
          this.DynamicList(),
          this.getComment()
        },
        methods:{
          DynamicList(){//获取动态的图片
            axios({
              method:'get',
              url:'../php/dynamic_message_axios.php?id='+id[0]
            }).then(function(res){
              app.dynamiclist = res.data;
              img = res.data;
            });
          },
          DynamicGive(ab){//提交取消点赞
            axios({
              method:'get',
              url:'../php/give.php'+abcd
            }).then(function(res){
              document.getElementById("give").innerHTML = res.data;
            });
          },
          CommentGive(id,ab){//提交取消评论点赞
            axios({
              method:'get',
              url:'../php/comment_give.php?id='+id+'\&n='+name+'\&p='+pwd
            }).then(function(res){
              document.getElementById("give"+ab).innerHTML = res.data;
            });
          },
          getComment(){//获取评论
            axios({
              method:'get',
              url:'../php/getComment.php?id='+id[0]
            }).then(function(res){
              app.message = res.data;
              console.log(res.data);
            });
          },
          //提交举报
          inform(id,myid){
            axios({
              method:'get',
              url:'../php/inform.php?id='+id+'&myid='+myid
            }).then(function(res){
              alert(res.data);
            });
          },
          //收藏
          collect(id,myid){
            axios({
              method:'get',
              url:'../php/collect.php?id='+id+'&myid='+myid
            }).then(function(res){
              alert(res.data);
            });
          },
          href(a){
            var abcd = window.location.search;
            window.location.href = a+abcd;
          }

        }
      });

    </script>

  </body>
</html>
