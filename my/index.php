<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>我的动态</title>
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
    <link rel="stylesheet" href="..\css\index.css" media="screen" title="no title" charset="utf-8">
    <link rel="stylesheet" href="..\css\main.css" media="screen" title="no title" charset="utf-8">
    <link rel="stylesheet" href="..\css\font-awesome\css\font-awesome.min.css" media="screen" title="no title" charset="utf-8">



  </head>
  <body>

    <?php
      include("../config/config.php");
      include("../config/verify.php");
      $message = verify($_GET['n'],$_GET['p']);
     ?>
    <!-- 图片层 -->
    <div class="bg" style="background-image: url(../image/vague_img2.php?x=2&url=bg/<?php echo $message{'background'} ?>);">
      <!-- 模糊层 -->
      <div class="bg_div"></div>
    </div>


    <div class="main">
      <div class="main_top">
          <div class="main_top_li">
            <div class="main_top_left">
              <li><a href="../<?php echo $index{'title1_url'}.'?n='.$_GET['n'].'&p='.$_GET['p'] ?>"><?php echo $index{'title1'} ?></a></li>
              <li><a href="../<?php echo $index{'title2_url'}.'?n='.$_GET['n'].'&p='.$_GET['p'] ?>"><?php echo $index{'title2'} ?></a></li>
              <li><a href="../<?php echo $index{'title3_url'}.'?n='.$_GET['n'].'&p='.$_GET['p'] ?>"><?php echo $index{'title4'} ?></a>
                <div class="main_top_left_pull">
                  <a href="../<?php echo $index{'title3_1_url'}.'?n='.$_GET['n'].'&p='.$_GET['p'] ?>"><?php echo $index{'title4_1'} ?></a>
                  <a href="../<?php echo $index{'title3_2_url'}.'?n='.$_GET['n'].'&p='.$_GET['p'] ?>"><?php echo $index{'title4_2'} ?></a>
                  <a href="../<?php echo $index{'title3_3_url'}.'?n='.$_GET['n'].'&p='.$_GET['p'] ?>"><?php echo $index{'title4_3'} ?></a>
                </div>
              </li>

            </div>
            <div class="main_top_centar">
              <div class="main_top_centar_text">
                <i class="fa fa-search"></i>
                <input type="text" name="" id="select1" placeholder="搜索我的动态" @change="select1()">
              </div>
            </div>
            <div class="main_top_right">
              <img class="head" src="../image/vague_img2.php?x=20&url=head/<?php echo $message{'head'} ?>" alt="" />
              <a class="name" href="../UserMessage/index.php?name=<?php echo $message{'account'}.'&n='.$_GET['n'].'&p='.$_GET['p'] ?>"><?php echo $message{'name'} ?></a>
              <a href="../message/index.php?<?php echo 'n='.$_GET['n'].'&p='.$_GET['p'].'&id='.$message{'id'} ?>" class="main_top_right_i fa fa-bell-o" style="font-size:20px;line-height:55px;float:right;margin-right:15px;cursor:pointer;"></a>
            </div>
          </div>
        </div>

      <!-- 大标题 -->
      <div class="main_top_bg">
        <?php echo $title{'title4'} ?>
      </div>

      <!-- 动态内容区域 -->
      <div class="main_container" v-cloak>
        <div class="container_none" v-if="NoneDynamic">
          您没有发布动态
        </div>
        <!-- 动态方块 -->
         <div class="main_container">
          <!-- 动态方块 -->
          <div class="container_div" v-for="item in dynamiclist">
            <!-- 顶部头像部分 -->
            <div class="main_div_top" >
              <img class="head container_head" :src="item.issuehead"/>
              <a class="name container_name" @click="MessageUrl(item.issue,'<?php echo $_GET['n']?>','<?php echo $_GET['p']?>')">{{item.issue}}</a><br>
              <a class="container_time">{{ "发布于"+item.IssueTime}}</a>
              <div class="btn-group" style="float:right;margin-top:-15px;">
              	<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" style="border:0;">
              		操作 <span class="caret"></span>
              	</button>
              	<ul class="dropdown-menu" role="menu">
              		<li><a @click="DeleteDynamicList(item.id)">删除</a></li>
              	</ul>
              </div>
            </div>
            <!-- 内容 -->
            <div class="container_div_center" @click="DivHref(item.id,'<?php echo $_GET['n']?>','<?php echo $_GET['p']?>',item.uid,'<?php echo $message{'id'}?>')">{{item.essay}}</a><br>
              <div class="container_div_img">
                <img class="container_img" v-for="img in JSON.parse(item.image)" :src="'../image/vague_img2.php?x=20&url=dynamic/'+img" />
              </div>
            </div>
            <!-- 底部 -->
            <div class="container_div_bottom" @click="DivHref(item.id,'<?php echo $_GET['n']?>','<?php echo $_GET['p']?>',item.uid,'<?php echo $message{'id'}?>')" >
              <a class="container_div_bottom_i fa fa-commenting">1</a>
              <a class="container_div_bottom_i fa fa-thumbs-o-up">1</a>
              <a class="container_div_bottom_i fa fa-mail-forward">1</a>
            </div>
          </div>


        </div>
      </div>



    <!-- main -->
    </div>

    <link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="../css/vue.js"></script>
    <script src="../css/axios.js"></script>
    <script src="../js/main.js" charset="utf-8"></script>
    <script src="../js/index.js"></script>

  </body>
</html>
