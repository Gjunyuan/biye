<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>发现</title>
  <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
  <link rel="stylesheet" href="..\css\index.css" media="screen" title="no title" charset="utf-8">
  <link rel="stylesheet" href="..\css\main.css" media="screen" title="no title" charset="utf-8">
  <link rel="stylesheet" href="..\css\font-awesome\css\font-awesome.min.css" media="screen" title="no title"
    charset="utf-8">
</head>
<style>
  @media all and (min-width:240px) and (max-width:1080px){
  .container_div{
    width: 96%;
    margin: auto;
  }
  .main_container{
    width: 100%;
    /* background:red; */
  }
  .container_div{
    width: 100%;
  }
  #publish_text{
    width: 96%;
    height: 100px;
  }
}

</style>
<body>

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
                <input type="text" name="" id="" placeholder="搜索关键词">
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
      <?php echo $title{'title1'} ?>
    </div>


    <!-- 动态内容区域 -->
    <div class="main_container">


      <!-- 动态方块 -->
      <div class="container_div" style="height:460px;">
        <h1>发表动态</h1>
        <form action="upImg.php?n=<?php echo $_GET['n']; ?>&p=<?php echo $_GET['p']; ?>" method="post" name="form1" enctype="multipart/form-data">
          <textarea name="text" id="publish_text"></textarea>
          <h6>上传图片:</h6>
          <div class="publish_img" id="fileimg">
            <!-- <a>{{ item }}</a> -->
            <!-- <img :src="item" alt="" srcset="" id="pic1">  v-for="item in publish_img" -->
            <img alt="" srcset="" id="pic1">
            <img alt="" srcset="" id="pic2">
            <img alt="" srcset="" id="pic3">
            <img alt="" srcset="" id="pic4">
            <img alt="" srcset="" id="pic5">
            <img alt="" srcset="" id="pic6">
            <img alt="" srcset="" id="pic7">
            <img alt="" srcset="" id="pic8">
            <img alt="" srcset="" id="pic9">
          </div>
          <div class="filediv" id="file1" v-show="filediv == 1"><input type="file" name="file1" id="FileImg1" accept="image/png,image/gif,image/jpeg" @change="intdiv('1')">选择</div>
          <div class="filediv" id="file2" v-show="filediv == 2"><input type="file" name="file2" id="FileImg2" accept="image/png,image/gif,image/jpeg" @change="intdiv('2')">选择</div>
          <div class="filediv" id="file3" v-show="filediv == 3"><input type="file" name="file3" id="FileImg3" accept="image/png,image/gif,image/jpeg" @change="intdiv('3')">选择</div>
          <div class="filediv" id="file4" v-show="filediv == 4"><input type="file" name="file4" id="FileImg4" accept="image/png,image/gif,image/jpeg" @change="intdiv('4')">选择</div>
          <div class="filediv" id="file5" v-show="filediv == 5"><input type="file" name="file5" id="FileImg5" accept="image/png,image/gif,image/jpeg" @change="intdiv('5')">选择</div>
          <div class="filediv" id="file6" v-show="filediv == 6"><input type="file" name="file6" id="FileImg6" accept="image/png,image/gif,image/jpeg" @change="intdiv('6')">选择</div>
          <div class="filediv" id="file7" v-show="filediv == 7"><input type="file" name="file7" id="FileImg7" accept="image/png,image/gif,image/jpeg" @change="intdiv('7')">选择</div>
          <div class="filediv" id="file8" v-show="filediv == 8"><input type="file" name="file8" id="FileImg8" accept="image/png,image/gif,image/jpeg" @change="intdiv('8')">选择</div>
          <div class="filediv" id="file9" v-show="filediv == 9"><input type="file" name="file9" id="FileImg9" accept="image/png,image/gif,image/jpeg" @change="intdiv('9')">选择</div>
          <br><div class="filediv"><input type="submit" value="上传" class="filediv">提交</div>
        </form>
      </div>
      <!-- <div class="container_none">
          您关注的人没有发布动态
        </div> -->



    </div>





    <!-- 底部 -->
    <div class="main_bottom">
      <div class="main_bottom_mohu"></div>
      <div class="main_bottom_div"><a href="../admin/">网站管理</a></div>
    </div>
    <!-- main -->
  </div>




  <script src="../css/vue.js"></script>
  <script src="../js/index.js"></script>
  <!-- <script src="../css/axios.js"></script> -->
  <script src="../css/axios.js"></script>
  <!-- <script src="https://unpkg.com/axios/dist/axios.min.js"></script> -->

  <script type="text/javascript">
      var app =new Vue({
        el:'.main',
        data:{
          publish_img:[],
          publish_div:0,
          filediv:1
        },
        mounted:function() {


        },
        methods:{
          intdiv(e){
            switch (e) {
              case '1':
                  var diva = document.form1.file1.value;
                  this.filediv = 2;
                break;
              case '2':
                  var diva = document.form1.file2.value;
                  this.filediv = 3;
                break;
              case '3':
                  var diva = document.form1.file3.value;
                  this.filediv = 4;
                break;
              case '4':
                  var diva = document.form1.file4.value;
                  this.filediv = 5;
                break;
              case '5':
                  var diva = document.form1.file5.value;
                  this.filediv = 6;
                break;
              case '6':
                  var diva = document.form1.file6.value;
                  this.filediv = 7;
                break;
              case '7':
                  var diva = document.form1.file7.value;
                  this.filediv = 8;
                break;
              case '8':
                  var diva = document.form1.file8.value;
                  this.filediv = 9;
                break;
              case '9':
                  var diva = document.form1.file9.value;
                  this.filediv = 0;
            }

            c(e);
            // app.publish_img.push(c(e));
            // console.log(this.publish_img.push(window.c(e)));
          }



        }
      });



      function c(a) {
        var r= new FileReader();
        f=document.getElementById('FileImg'+a).files[0];
        r.readAsDataURL(f);
        r.onload=function  (e) {
          document.getElementById('pic'+a).src=this.result;
          document.getElementById('pic'+a).style.display="block";
        };
      }
    </script>


</body>

</html>
