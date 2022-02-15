<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>私信</title>
  <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
  <link rel="stylesheet" href="..\css\index.css" media="screen" title="no title" charset="utf-8">
  <link rel="stylesheet" href="..\css\main.css" media="screen" title="no title" charset="utf-8">
  <link rel="stylesheet" href="..\css\message.css" media="screen" title="no title" charset="utf-8">
  <link rel="stylesheet" href="..\css\qipao.css" media="screen" title="no title" charset="utf-8">
  <link rel="stylesheet" href="..\css\font-awesome\css\font-awesome.min.css" media="screen" title="no title" charset="utf-8">
</head>

<body>
  <?php
  include("../config/config.php");
  include("../config/verify.php");
  $message = verify1($_GET['n'], $_GET['p'], $_GET['id']); //获取用户信息
  ?>
  <!-- 图片层 -->
  <div class="bg" style="background-image: url(../image/bg/<?php echo $message{'background'} ?>);">
    <!-- 模糊层 -->
    <div class="bg_div"></div>
  </div>



  <div class="main">
    <div class="main_top">
      <div class="main_top_li">
        <div class="main_top_left">
          <li><a href="../<?php echo $index{'title1_url'} . '?n=' . $_GET['n'] . '&p=' . $_GET['p'] ?>"><?php echo $index{'title1'} ?></a></li>
          <li><a href="../<?php echo $index{'title2_url'} . '?n=' . $_GET['n'] . '&p=' . $_GET['p'] ?>"><?php echo $index{'title2'} ?></a></li>
          <li><a href="../<?php echo $index{'title3_url'} . '?n=' . $_GET['n'] . '&p=' . $_GET['p'] ?>"><?php echo $index{'title4'} ?></a>
            <div class="main_top_left_pull">
              <a href="../<?php echo $index{'title3_1_url'} . '?n=' . $_GET['n'] . '&p=' . $_GET['p'] ?>"><?php echo $index{'title4_1'} ?></a>
              <a href="../<?php echo $index{'title3_2_url'} . '?n=' . $_GET['n'] . '&p=' . $_GET['p'] ?>"><?php echo $index{'title4_2'} ?></a>
              <a href="../<?php echo $index{'title3_3_url'} . '?n=' . $_GET['n'] . '&p=' . $_GET['p'] ?>"><?php echo $index{'title4_3'} ?></a>
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
          <img class="head" src="../image/head/<?php echo $message{'head'} ?>" alt="" />
          <a class="name" href="../UserMessage/index.php?name=<?php echo $message{'account'} . '&n=' . $_GET['n'] . '&p=' . $_GET['p'] ?>"><?php echo $message{'name'} ?></a>
          <a href="../message/index.php?<?php echo 'n=' . $_GET['n'] . '&p=' . $_GET['p'] . '&id=' . $message{'id'} ?>" class="main_top_right_i fa fa-bell-o" style="font-size:20px;line-height:55px;float:right;margin-right:15px;cursor:pointer;"></a>
        </div>
      </div>
    </div>

    <!-- 大标题 -->
    <div class="main_top_bg">
      Guan
    </div>


    <!-- 私信内容区域 -->
    <div class="main_message">
      <div class="main_message_left">


        <!-- 私信左侧列表方块 -->
        <div class="main_message_left_div" v-for="item in userlist" @click="GetMessage(item.chat,item.name)">
          <img class="head container_head" :src="'../image/head/'+item.head" alt="" />
          <a class="name container_name" href="#" v-text="item.name"></a><br>
          <a class="container_time" v-text="item.trail" style="display:block;width:100px;white-space: nowrap;overflow:hidden;text-overflow:ellipsis;"></a>
          <i class="container_state" v-if="item.state==0"></i>
        </div>



      </div>
      <!-- 私信右侧发信息方块 -->
      <div class="main_message_right">
        <div class="main_message_right_top" v-text="MessageName">

        </div>
        <div class="main_message_right_center" id="ShowMessage">

          <div v-for="item in Message">
            <!-- my  -->
            <div class='haoyou_right' v-if="item.mid==item.uid">
              <img class='img' :src="'../image/head/'+item.head" />
              <a class='name1' v-text="item.name"></a><br>
              <div class='qipao_right'></div>
              <a class='val' v-text="item.value"></a>
            </div>

            <!-- you -->
            <div class='haoyou_left' v-if="item.mid!==item.uid">
              <img class='img' :src="'../image/head/'+item.head" />
              <a class='name1' v-text="item.name"></a><br>
              <div class='qipao_left'></div>
              <a class='val' v-text="item.value"></a>
            </div>

          </div>

        </div>
        <!-- 发送框 -->
        <div class="main_message_right_bottom">
          <input id="text" @change="send()" type="text" class="message_text" name="name" value="" placeholder="写私信~">
          <button type="button" class="message_button fa fa-location-arrow" name="button"></button>
        </div>
      </div>
    </div>




  </div>

  <link rel="stylesheet" href="../css/font-awesome/css/font-awesome.min.css" media="screen" title="no title" charset="utf-8">
  <link rel="stylesheet" href="../css/bootstrap/bootstrap.min.css">
  <script src="../css/bootstrap/jquery.min.js"></script>
  <script src="../css/bootstrap/bootstrap.min.js"></script>
  <script src="../js/index.js"></script>
  <script src="../css/vue.js"></script>
  <script src="../css/axios.js"></script>
  <script>
    var abcd = window.location.search;
    var id = abcd.match(/id=(\S*)/)[1];
    // alert(abcd);
    var app = new Vue({
      el: '.main',
      data: {
        userlist: "",
        Message: "",
        MessageName: "",
        ChatId: ""
      },
      mounted: function() {
        this.UserList()
        this.timer = setInterval(() => {
          app.GetMessage(app.ChatId, app.MessageName); //读取消息
        }, 3000);

      },
      updated: function() {
        this.$nextTick(() => {
          // 滑动条拖到最底部
          var ele = document.getElementById('ShowMessage');
          ele.scrollTop = ele.scrollHeight;
        })

      },
      methods: {
        //获取好友消息
        GetMessage(a, b) {
          axios({
            method: 'get',
            url: 'getMessage.php' + abcd + '&chat=' + a
          }).then(function(res) {
            app.Message = res.data
            app.MessageName = b
            app.ChatId = a
          });
        },
        //获取全部私信好友
        UserList() {
          axios({
            method: 'get',
            url: 'UserList.php' + abcd
          }).then(function(res) {
            app.userlist = res.data;
            app.MessageName = res.data[0].name;
            app.ChatId = res.data[0].chat;
            app.GetMessage(res.data[0].chat, res.data[0].name);
          });
        },
        //发送消息
        send() {
          var text = document.getElementById('text').value;
          axios({
            method: 'get',
            url: 'send.php' + abcd + '&chat=' + app.ChatId + '&text=' + text + '&id=' + id
          }).then(function(res) {
            text = document.getElementById('text').value = ''; //设置为空
            app.GetMessage(app.ChatId, app.MessageName); //读取消息
          });
        },


      }
    });
  </script>


</body>

</html>