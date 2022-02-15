<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>发现</title>
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
    <link rel="stylesheet" href="..\css\index.css" media="screen" title="no title" charset="utf-8">
    <link rel="stylesheet" href="..\css\main.css" media="screen" title="no title" charset="utf-8">
    <link rel="stylesheet" href="..\css\usermessage.css" media="screen" title="no title" charset="utf-8">
    <link rel="stylesheet" href="..\css\font-awesome\css\font-awesome.min.css" media="screen" title="no title" charset="utf-8">
    <link rel="stylesheet" href="..\css\container.css">
  </head>
  <body>

    <?php
      include("../config/config.php");
      include("../config/verify.php");
      $message = verifyId($_GET['name']);//通过用户name获取用户信息
      $mymessage = verify($_GET['n'],$_GET['p']);//获取用户信息

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
                <input type="text" name="" id="" placeholder="搜索关键词">
              </div>
            </div>
            <div class="main_top_right">
              <img class="head" src="../image/vague_img2.php?x=20&url=head/<?php echo $mymessage{'head'} ?>" alt="" />
              <a class="name" href="../UserMessage/index.php?name=<?php echo $mymessage{'account'}.'&n='.$_GET['n'].'&p='.$_GET['p'] ?>"><?php echo $mymessage{'name'} ?></a>
              <a href="../message/index.php?<?php echo 'n='.$_GET['n'].'&p='.$_GET['p'].'&id='.$mymessage{'id'} ?>" class="main_top_right_i fa fa-bell-o" style="font-size:20px;line-height:55px;float:right;margin-right:15px;cursor:pointer;"></a>
            </div>
          </div>
        </div>

      <!-- 大标题 -->
      <!-- <div class="main_top_bg">
        12314
      </div> -->



      <!-- 动态内容区域 -->
      <div class="main_container" v-cloak>

        <div class="container">
          <div class="container_top">
            <div class="container_top_head">
              <img id="head" src="../image/head/<?php echo $message{'head'} ?>" onclick="head1(this)">
            </div>
            <div class="container_top_name">
              <a class="container_top_n"><?php echo $message{'name'} ?></a>
              <a class="container_top_sign"><?php echo $message{'sign'} ?></a>
            </div>
            <div class="container_top_li">
              <li>动态<?php echo $message{'DynamicNum'} ?></li>
              <i></i>
              <li>关注<?php echo $message{'attention'} ?></li>
              <i></i>
              <li>粉丝<?php echo $message{'fans'} ?></li>
              <a class="container_pull fa fa-paint-brush" style="font-size:25px;line-height:50px;cursor:pointer;color:#555;" v-if="mymessage" @click="MyMessageUp()"></a>
              <?php

               $uid =  $message{'id'};
               $id =  $mymessage{'id'};
              ?>
              <a href="../Message/index.php?name=<?php echo $mymessage{'account'}.'&n='.$_GET['n'].'&p='.$_GET['p'].'&id='.$mymessage{'id'} ?>">
                <button class="container_pull_button" v-if="!mymessage" @click="private('<?php echo $id ?>','<?php echo $uid ?>')" style="background:white;color:black;border:1px solid #EEE;cursor:pointer;">私信</button>
              </a>
              <button class="container_pull_button" v-if="!mymessage" @click="Attention('<?php echo $id ?>','<?php echo $uid ?>')" v-text="attention" style="cursor:pointer;"></button>

            </div>
          </div>
          <div class="container_center">
          <li><a class="container_center_li">昵&emsp;&emsp;称</a><a class="container_center_i">:</a><a class="container_center_val"><?php echo $message{'name'} ?></a></li>
            <li><a class="container_center_li">账&emsp;&emsp;号</a><a class="container_center_i">:</a><a class="container_center_val"><?php echo $message{'account'} ?></a></li>
            <li><a class="container_center_li">邮&emsp;&emsp;箱</a><a class="container_center_i">:</a><a class="container_center_val"><?php echo $message{'mail'} ?></a></li>
            <li><a class="container_center_li">电&emsp;&emsp;话</a><a class="container_center_i">:</a><a class="container_center_val"><?php echo $message{'phone'} ?></a></li>
            <li><a class="container_center_li">住&emsp;&emsp;址</a><a class="container_center_i">:</a><a class="container_center_val"><?php echo $message{'address'} ?></a></li>
            <li><a class="container_center_li">注册时间</a><a class="container_center_i">:</a><a class="container_center_val"><?php echo $message{'RegisterTime'} ?></a></li>
          </div>



        </div>

        <div class="container_none" v-if="NoneDynamic">
          没有发布动态
        </div>
        <!-- 动态方块 -->
        <div class="main_container">
          <!-- 动态方块 -->
          <div class="container_div" v-for="item in dynamiclist">
            <!-- 顶部头像部分 -->
            <div class="main_div_top">
              <img class="head container_head" :src="item.issuehead"/>
              <a class="name container_name" href="#">{{item.name}}</a><br>
              <a class="container_time">{{ "发布于"+item.IssueTime}}</a>
            </div>
            <!-- 内容 -->
            <div class="container_div_center" @click="DivHref(item.id,'<?php echo $_GET['n']?>','<?php echo $_GET['p']?>',item.uid,'<?php echo $message{'id'}?>')">{{item.essay}}</a><br>
              <div class="container_div_img">
                <img class="container_img" v-for="img in JSON.parse(item.image)" :src="'../image/vague_img2.php?x=20&url=dynamic/'+img" />
              </div>
            </div>
            <!-- 底部 -->
            <div class="container_div_bottom" @click="DivHref(item.id,'<?php echo $_GET['n']?>','<?php echo $_GET['p']?>',item.uid,'<?php echo $message{'id'}?>')">
              <a class="container_div_bottom_i fa fa-commenting">1</a>
              <a class="container_div_bottom_i fa fa-thumbs-o-up">1</a>
              <a class="container_div_bottom_i fa fa-mail-forward">1</a>
            </div>
          </div>
        </div>



      </div>

      <!-- main -->
    </div>



    <!-- 底部 -->
    <div class="main_bottom" style="position:fixed;z-index:999;">
      <div class="main_bottom_mohu"></div>
      <div class="main_bottom_div"><a href="../admin/">网站管理</a></div>
    </div>

    <!-- 图片预览 -->
    <div id="pic" v-cloak class="pic">
      <img id="img" class="pic_img" src="" alt="" onclick="off()" />
      <a class="x_pic_on fa fa-close" style="font-size:60px;" onclick="off()"></a>
    </div>
    <!-- 修改页 -->
     <div class="container_updata" v-cloak v-if="mymessagediv">
        <div class="container_updata_div" @click="">
          <form action="../php/UpdateMessage.php" method="post" enctype="multipart/form-data">
          <input type="text" name="n" id="" value="<?php echo $_GET['n']; ?>" style="display:none">
          <input type="text" name="p" id="" value="<?php echo $_GET['p']; ?>" style="display:none">
            <div class="container_updata_div_li">
              <img :src="'../image/head/'+mymessage.head" id='show' alt="" srcset="">
              <label class="fileContainer">
                  选择头像
                  <input id="file" type="file" name="file1" onchange="c()"/>
              </label>
            </div>

            <div class="container_updata_div_li">
              <img :src="'../image/bg/'+mymessage.background" id='show1' alt="" srcset="">
              <label class="fileContainer">
                  选择网站背景
                  <input id="file1" type="file" name="file2" onchange="c1()"/>
              </label>
            </div>


            <div class="container_updata_text_div">
              昵称：
              <input class="container_updata_text" type="text" name="name" placeholder="Nickname" :value="mymessage.name">
            </div>
            <div class="container_updata_text_div">
              签名：
              <input class="container_updata_text" type="text" name="sign" placeholder="Sign" :value="mymessage.sign">
            </div>
            <div class="container_updata_text_div">
              邮箱：
              <input class="container_updata_text" type="text" name="mail" placeholder="xxxxx@xx.com" :value="mymessage.mail">
            </div>
            <div class="container_updata_text_div">
              电话：
              <input class="container_updata_text" type="text" name="phone" placeholder="+86" :value="mymessage.phone">
            </div>
            <div class="container_updata_text_div">
              地址：
              <input class="container_updata_text" type="text" name="address" placeholder="xxx" :value="mymessage.address">
            </div>
            <button type="submit" class="submit">提交</button>

          </form>


        </div>
      <a class="x_pic_on fa fa-close" style="font-size:60px;" @click="abcoff()"></a>
    </div>




  </body>
    <!-- <link rel="stylesheet" href="../css/bootstrap/bootstrap.min.css">
    <script src="../css/bootstrap/jquery.min.js"></script>
    <script src="../css/bootstrap/bootstrap.min.js"></script> -->
    <script src="../js/index.js"></script>
    <script src="../css/vue.js"></script>
    <script src="../css/axios.js"></script>
    <script src="../js/container.js"></script>
    <script type="text/javascript">
      var abcd = window.location.search;
      var abcd1 = abcd.split('?name=');
      var name = abcd.match(/\?name=(\S*)\&n=/)[1];
      var n = abcd.match(/\&n=(\S*)\&p=/)[1];

      var User =new Vue({
        el:'.main',
        data:{
          dynamiclist:"",
          NoneDynamic:false,
          mymessage:false,
          attention:''

        },
        mounted:function() {
          this.AttentionSe(),
          this.DynamicList(),
          this.MyMessage(),
          this.Attention()
        },
        methods:{
          DynamicList(){
            var abcd = window.location.search
            axios({
              method:'get',
              url:'../php/MyDynamic1.php'+abcd
            }).then(function(res){
              if (res.data.length=='0') {
                User.NoneDynamic = true
              }
              User.dynamiclist = res.data
            });
          },
          MyMessageUp(){
            var abcd = window.location.search
            axios({
              method:'get',
              url:'../php/MyMessage.php'+abcd
            }).then(function(res){
              updata.mymessage = res.data
              // console.log(res.data);
              console.log(JSON.stringify(res.data));
              updata.mymessagediv = true
            });
          },
          MyMessage(){
            // alert(name);
            if(name == n){
              this.mymessage = true
            }
          },
          //点击关注事件
          Attention(a,b){
            User.AttentionSe()
            var abcd = window.location.search
            axios({
              method:'get',
              url:'../php/Fans.php'+abcd+'&I='+a+'&Y='+b
            }).then(function(res){
              User.attention = res.data;
              console.log(res.data);
            });
          },
          // 关注状态查询
          AttentionSe(){
            var abcd = window.location.search;
            axios({
              method:'get',
              url:'../php/AttentionSe.php'+abcd
            }).then(function(res){
              User.attention = res.data;
            });
          },
          // 私信
          private(a,b){
            axios({
              method:'get',
              url:'../php/private.php'+abcd+'&Aid='+a+'&Bid='+b
            }).then(function(res){
              console.log(res.data);
            });
          },
          DivHref(id,n,p,Y,I){
            window.location='../main/container.php?id='+id+'&n='+n+'&p='+p+'&Y='+Y+'&I='+I
          }
        }
      });

      var updata = new Vue({
        el:'.container_updata',
        data:{
          mymessagediv:false,
          mymessage:""
        },
        methods:{
          abcoff(){
            updata.mymessagediv = false
          }
        }
      });



      function c() {
        var r= new FileReader();
        f=document.getElementById('file').files[0];
        r.readAsDataURL(f);
        r.onload=function  (e) {
        document.getElementById('show').src=this.result;
        };
      }

      function c1() {
        var r= new FileReader();
        f=document.getElementById('file1').files[0];
        r.readAsDataURL(f);
        r.onload=function  (e) {
        document.getElementById('show1').src=this.result;
        };
      }
    </script>
</html>
