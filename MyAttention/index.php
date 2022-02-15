<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>我的收藏</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;" name="viewport" />    <!-- <meta name="viewport" content="width=device-width, initial-scale=1" />   -->
    <link rel="stylesheet" href="..\css\index.css" media="screen" title="no title" charset="utf-8">
    <link rel="stylesheet" href="..\css\main.css" media="screen" title="no title" charset="utf-8">
    <link rel="stylesheet" href="..\css\font-awesome\css\font-awesome.min.css" media="screen" title="no title" charset="utf-8">
  </head>
  <body>
    <style>
        @media all and (min-width:240px) and (max-width:960px){
          .container_div{
            width: 96%;
            margin: auto;
          }
          .main_container{
            width: 100%;
          }
          .container_div_img{
            width: 195px;
          }
          .container_img{
            width: 60px;
            height:60px;
          }
        }

    </style>
    <?php
      include("../config/config.php");
      include("../config/verify.php");
      $message = verify($_GET['n'],$_GET['p']);//获取用户信息
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
              <input type="text" name="text" placeholder="搜索我的收藏" id="select1" @change="select1()">
            </div>
          </div>
          <div class="main_top_right">
            <img class="head" src="../image/vague_img2.php?x=20&url=head/<?php echo $message{'head'} ?>" alt="" />
            <a class="name" href="../UserMessage/index.php?name=<?php echo $message{'account'}.'&n='.$_GET['n'].'&p='.$_GET['p'] ?>"><?php echo $message{'name'} ?></a>
            <a href="../message/index.php?<?php echo 'n='.$_GET['n'].'&p='.$_GET['p'] ?>" class="main_top_right_i fa fa-bell-o" style="font-size:20px;line-height:55px;float:right;margin-right:15px;cursor:pointer;"></a>
          </div>
        </div>
      </div>

      <!-- 大标题 -->
      <div class="main_top_bg">
        我的关注
      </div>




          <!-- 动态内容区域 -->
        <div class="main_container">

          <div class="main_container_left">
            <div class="container_none" v-if="NoneDynamic">
              这里什么都没有哦~
            </div>
              <!-- 动态方块 -->
            <div class="container_div" v-for="item in dynamiclist">
              <!-- 顶部头像部分 -->
              <div class="main_div_top">
                <img class="head container_head" :src="item.issuehead"/>
                <a class="name container_name" @click="MessageUrl(item.issue,'<?php echo $_GET['n']?>','<?php echo $_GET['p']?>',item.uid,'<?php echo $message{'id'}?>')" v-text="item.name"></a><br>
                <span class="container_time" v-text="'发布于'+item.IssueTime"></span>
                <div class="btn-group" style="float:right;margin-top:-15px;">
                	<button type="button" class="btn btn-default dropdown-toggle"
                			data-toggle="dropdown" style="border:0;">
                		<span class="glyphicon glyphicon-chevron-down" style="color: #666;"></span>
                	</button>
                	<ul class="dropdown-menu" role="menu">
                    <li><a @click="collect(item.id,'<?php echo $message{'id'}?>')">收藏/取消收藏</a></li>
                		<li><a @click="inform(item.id,'<?php echo $message{'id'}?>')">举报</a></li>
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
              <div class="container_div_bottom" @click="DivHref(item.id,'<?php echo $_GET['n']?>','<?php echo $_GET['p']?>',item.uid,'<?php echo $message{'id'}?>')">
                <a class="container_div_bottom_i fa fa-commenting" v-text="item.comment"></a>
                <a class="container_div_bottom_i fa fa-thumbs-o-up" v-text="item.give"></a>
                <a class="container_div_bottom_i fa fa-mail-forward" v-text="item.transmit"></a>
              </div>
            </div>
          </div>
          <!-- 动态右侧 -->
          <div class="main_container_right">
            <div class="main_container_right_div"></div>
          </div>
      </div>


      <!-- main -->
    </div>

    <!-- 底部 -->
    <div class="main_bottom">
      <div class="main_bottom_mohu"></div>
      <div class="main_bottom_div"><a href="<?php echo $index{'bottom_url'} ?>"><?php echo $index{'bottom_admin'} ?></a></div>
    </div>

  </body>
  <link rel="stylesheet" href="../css/bootstrap/bootstrap.min.css">
    <script src="../js/index.js"></script>
  <script src="../css/bootstrap/jquery.min.js"></script>
  <script src="../css/bootstrap/bootstrap.min.js"></script>
  <script src="../css/vue.js"></script>
    <script src="../css/axios.js"></script>
    <script>
      var abcd = window.location.search;
      var a = 1;
      var app =new Vue({
        el:'.main',
        data:{
          dynamiclist:"",
          NoneDynamic:false
        },
        mounted:function() {
          this.DynamicList()
        },
        methods:{
          //获取全部动态
          DynamicList(){
            axios({
              method:'get',
              url:'../php/getAttention.php'+abcd
            }).then(function(res){
              if (res.data.length == '0') {
                app.NoneDynamic = true
                app.dynamiclist = ""
              }else{
                app.NoneDynamic = false
                app.dynamiclist = res.data
              }
            });
          },
          // 收藏搜索
          select1(){
            var c = document.getElementById("select1").value;
            axios({
              method:'get',
              url:'../php/DynamicSelect.php?text='+c
            }).then(function(res){
              if (res.data.length == '0') {
                app.NoneDynamic = true
                app.dynamiclist = ""
              }else{
                app.NoneDynamic = false
                app.dynamiclist = res.data
              }
            });
          },
          //动态下拉框
          abc(id,myid) {
            if (a) {
              document.getElementById("abc"+id).innerHTML =  "<div class='a1'></div><div class='container_pull_x'><div class='container_pull_li' @click='inform("+id+","+myid+")'>举报"+myid+"</div></div>";
              a = 0;
            }else {
              document.getElementById("abc"+id).innerHTML =  "";
              a = 1;
            }
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
          //链接个人信息页
          MessageUrl(name,n,p,y,i){
            window.location='../UserMessage/index.php?name='+name+'&n='+n+'&p='+p+'&Y='+y+'&I='+i
          },
          //链接个人信息页
          DivHref(id,n,p,Y,I){
            window.location='../main/container.php?id='+id+'&n='+n+'&p='+p+'&Y='+Y+'&I='+I
          }
        }
      });
    </script>
</html>
