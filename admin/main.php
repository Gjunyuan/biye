<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>后台管理</title>
    <link rel="stylesheet" href="css/main.css" media="screen" title="no title" charset="utf-8">
    <link rel="stylesheet" href="../css/font-awesome/css/font-awesome.min.css" media="screen" title="no title" charset="utf-8">
    <link rel="stylesheet" href="css/overview.css" media="screen" title="no title" charset="utf-8">
    <link rel="stylesheet" href="css/UserList.css" media="screen" title="no title" charset="utf-8">
    <link rel="stylesheet" href="css/DynamicList.css" media="screen" title="no title" charset="utf-8">
    <link rel="stylesheet" href="css/inform.css" media="screen" title="no title" charset="utf-8">
  </head>
  <body>
    <?php
      include("../config/AdminVerify.php");
      $message = verify($_GET['n'],$_GET['p']);//获取用户信息
    ?>

    <div class="main_top">
      <div class="main_left_logo">
        Logo
      </div>
    </div>
    <div class="main">
      <div class="main_left">
        <div class="main_left_li">

          <div @click="qiehuan1()"><div class="main_left_li_li"><i class="main_left_li_left fa fa-pie-chart" style="line-height:45px;"></i><a>总览</a></div></div>
          <div @click="qiehuan2()"><div class="main_left_li_li"><i class="main_left_li_left fa fa-user" style="line-height:45px;"></i><a>用户列表</a></div></div>
          <div onclick="javascript:"><div class="main_left_li_li"><i class="main_left_li_left fa fa-cloud" style="line-height:45px;"></i><a>动态</a><i class="main_left_li_right fa fa-sort-desc" style="line-height:45px;"></i></div>
            <div class="main_left_li_pull">
              <li @click="qiehuan3()" class="main_left_li_pull_li"><a>全部动态</a></li>
              <li class="main_left_li_pull_li"><a>动态推荐</a></li>
              <li class="main_left_li_pull_li"><a>动态审核</a></li>
            </div>
          </div>
          <div @click="qiehuan4()"><div class="main_left_li_li"><i class="main_left_li_left fa fa-envelope-o" style="line-height:45px;"></i><a>用户举报</a></div></div>


        </div>
      </div>
      <!-- 右侧 -->
      <div class="main_right" id="right" id="html_right">
          <div class="main_top_li">
            <ul class="breadcrumb" v-html="main_top_li">
            	<li><a href="#">首页</a></li>
            	<li class="active">总览</li>
            </ul>
          </div>


        <!-- 总览 -->
        <div class="overview_main" id="div1" v-show="div1">
          <div class="overview_main_top">
            <div class="overview_main_top_user" style="background:#FFCC99;">
              <a class="">用户</a>
              <div class="hr"></div>
              <a v-text="usernum" id="UserNum"></a>
            </div>
            <div class="overview_main_top_user" style="background:#99CCFF;">
              <a class="">动态数量</a>
              <div class="hr"></div>
              <a v-text="dynamicnum"></a>
            </div>

            <div class="overview_main_top_user" style="background:#FF6666;">
              <a class="">管理员数量</a>
              <div class="hr"></div>
              <a v-text="adminnum"></a>
            </div>

            <div class="overview_main_top_user" style="background:#666666;">
              <a class="">待审核动态</a>
              <div class="hr"></div>
              <a v-text="usernum"></a>
            </div>

          </div>

          <div class="overview_main_bottom">
            <span>登录记录</span>
            <div class="table_li">
              <table class="table table-striped">
                <thead>
                    <tr class="tr">
                      <th style="text-align:center;">序号</th>
                      <th style="text-align:center;">名称</th>
                      <th style="text-align:center;">IP</th>
                      <th style="text-align:center;">登录地</th>
                      <th style="text-align:center;">坐标</th>
                      <th style="text-align:center;">登录时间</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(item,index) in loginrecord">
                      <td v-text="index+1"></td>
                      <td v-text="item.name"></td>
                      <td v-text="JSON.parse(item.value).ip"></td>
                      <td v-text="JSON.parse(item.value).address"></td>
                      <td v-text="'X='+JSON.parse(item.value).x +' Y='+ JSON.parse(item.value).y"></td>
                      <td v-text="JSON.parse(item.value).time"></td>
                    </tr>
                </tbody>
              </table>
            </div>
            
          </div>
        </div>

        <!-- 用户列表 -->
        <div class="UserList_main" id="div2" v-show="div2">
          <div class="UserList_main_top">
            <input class="UserList_main_top_text" class="text" type="text" name="name" v-on:change="UserList()" id="name" placeholder="搜索" autocomplete="off">
              <!-- <button type="button" name="button" @click="UserList()">搜索</button> -->

          </div>
          <table class="table table-striped">
            <thead>
                <tr>
                  <th style="text-align:center;">id</th>
                  <th style="text-align:center;">名称</th>
                  <th style="text-align:center;">账号</th>
                  <th style="text-align:center;">签名</th>
                  <th style="text-align:center;">邮箱</th>
                  <th style="text-align:center;">电话</th>
                  <th style="text-align:center;">地址</th>
                  <th style="text-align:center;">注册时间</th>
                  <th style="text-align:center;">职位</th>
                  <th style="text-align:center;">操作</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="item in UserList1">
                  <td style="text-align:center;" v-text="item.id"></td>
                  <td style="text-align:center;" v-text="item.name"></td>
                  <td style="text-align:center;" v-text="item.account"></td>
                  <td style="text-align:center;" v-text="item.sign"></td>
                  <td style="text-align:center;" v-text="item.mail"></td>
                  <td style="text-align:center;" v-text="item.phone"></td>
                  <td style="text-align:center;" v-text="item.address"></td>
                  <td style="text-align:center;" v-text="item.RegisterTime"></td>
                  <td style="text-align:center;" v-text="item.position"></td>
                  <td style="text-align:center;" v-text=""><button type="button" class="btn btn-default" @click="UserList_Up(item.id)">操作</button></td>
                </tr>
            </tbody>
          </table>


        </div>

        <!-- 用户详情浏览 -->
        <!-- @click='UserList_off()' -->
        <div class="User_up" v-cloak v-if="UserListUp">
          <div class="User_up_div">

            <form role="form" action="UserMessageUp.php">
              <div class="form-group">
                <label for="name">id</label>
                <input type="text" class="form-control" id="name" 
                    placeholder="请输入名称" :value="usermessage[0].id" name="id">
              </div>
              <div class="form-group">
                <label for="name">名称</label>
                <input type="text" class="form-control" id="name" 
                    placeholder="请输入名称" :value="usermessage[0].name" name="name">
              </div>
              <div class="form-group">
                <label for="name">账号</label>
                <input type="text" class="form-control" id="name" 
                    placeholder="请输入名称" :value="usermessage[0].account" name="account">
              </div>
              <div class="form-group">
                <label for="name">签名</label>
                <input type="text" class="form-control" id="name" 
                    placeholder="请输入名称" :value="usermessage[0].sign" name="sign">
              </div>
              <div class="form-group">
                <label for="name">邮箱</label>
                <input type="text" class="form-control" id="name" 
                    placeholder="请输入名称" :value="usermessage[0].mail" name="mail">
              </div>
              <div class="form-group">
                <label for="name">电话</label>
                <input type="text" class="form-control" id="name" 
                    placeholder="请输入名称" :value="usermessage[0].phone" name="phone">
              </div>
              <div class="form-group">
                <label for="name">地址</label>
                <input type="text" class="form-control" id="name" 
                    placeholder="请输入名称" :value="usermessage[0].address" name="address">
              </div>
              <div class="form-group">
                <label for="name">注册时间</label>
                <input type="text" class="form-control" id="name" 
                    placeholder="请输入名称" :value="usermessage[0].RegisterTime" name="RegisterTime">
              </div>
              <div class="form-group">
                <label for="name">职位</label>
                <input type="text" class="form-control" id="name" 
                    placeholder="请输入名称" :value="usermessage[0].position" name="position">
              </div>
              <a>普通用户=0，管理员=1，封禁=2</a><br>
              <button type="submit" class="btn btn-default">提交</button>
              <td v-text=""><button type="button" class="btn btn-default" @click="UserList_off()">关闭</button></td>
            </form>

          </div>
        </div>


        <!-- 动态列表 -->
        <div class="DynamicList_main" id="div3" v-show="div3">
          <div class="UserList_main_top"><!--引用用户列表组件-->
            <input class="UserList_main_top_text" class="text" type="text" name="name" v-on:change="DynamicList()" id="dynamic_name" placeholder="搜索关键字" autocomplete="off">
          </div>
          <div class="DynamicList_main_bottom">


            <li v-for="item in dynamiclist" >
              <div class="DynamicList_li_left" @click="Container_Up(item.id)">
                <img class="DynamicList_li_left_head" :src="item.issuehead" alt="" srcset="">
                <a class="DynamicList_li_left_name" href="#" v-text="item.issue"></a><br>
                <a class="DynamicList_li_left_time" v-text="item.IssueTime"></a>
              </div>
              <div class="DynamicList_li_right">
                <div class="DynamicList_li_right_top">
                  <a v-text="item.essay"></a>
                </div>
                <div class="DynamicList_li_right_bottom">
                  <img v-for="(img,index) in JSON.parse(item.image)" @click="DynamicImg(index,img,JSON.parse(item.image))" :src="'../image/dynamic/'+img" alt="">
                </div>
                <div class="DynamicList_bottom">
                  <a class="container_div_bottom_i fa fa-commenting" style="cursor:pointer;">1</a>
                  <a class="container_div_bottom_i fa fa-thumbs-o-up" style="cursor:pointer;">1</a>
                  <a class="container_div_bottom_i fa fa-mail-forward" style="cursor:pointer;">1</a>
                </div>
              </div>
            </li>

            <!-- 动态详情浏览 -->
            <div class="container_up" v-cloak v-if="ContainerUp">
              <div class="container_up_div">
                <div class="container_up_div_l">
                  <div class="container_up_div_top">
                    <img :src="dynamicmessage.issuehead" class="container_up_div_top_head">
                    <div class="container_up_div_top_left">
                      <a href="" class="container_up_div_top_name" v-text="dynamicmessage.issue"></a>:
                      <a href="" class="container_up_div_top_id" v-text="dynamicmessage.id"></a>:
                      <a href="" v-text="dynamicmessage.audit"></a>
                      <br>
                      <a href="" class="container_up_div_top_time" v-text="dynamicmessage.IssueTime"></a>
                    </div>
                  </div>
                  <div class="container_up_div_center">
                    <textarea id="text" class="text" name="text" rows="10" cols="138" v-text="dynamicmessage.essay"></textarea>
                  </div >
                  <div class="container_up_div_img">
                    <img v-for="(item,index) in JSON.parse(dynamicmessage.image)" :src="'../image/dynamic/'+item" :id="'img'+index" @click="DynamicAImg(index)" alt="">
                    <!-- <img src="../image/1.jpg" id="img1" alt=""> -->
                  </div>
                  <div class="container_up_div_bottom">
                    <div class="container_up_div_bottom_div">
                      <button class="updata" @click="DunamicUpdata(dynamicmessage.id)">修改</button>
                      <button class="delete" @click="DunamicDelete(dynamicmessage.id)">删除</button>
                      <button class="delete" @click="Container_off()">关闭</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>


          </div>
        </div>

        <div class="inform_main" id="div4" v-show="div4">
          <div class="inform_mian_left">
            <div class="inform_mian_left_b" v-if="UserInformUpb">未选择</div>
            <div class="inform_mian_left_b" v-if="userDynamic.issuehead==null">已被删除处理</div>
            <div v-if="UserInformUp" class="inform_mian_left_a" v-if="userDynamic.issuehead==''">
              <div class='inform_mian_left_top'>
                <img :src="'../image/head/'+userDynamic.issuehead+'.png'" class="Inform_head" alt="" srcset="">
                <div class="inform_mian_left_div">
                  <span class="Inform_name" style="font-size:20px;" v-text="userDynamic.issue"></span><br>
                  <span class="Inform_Time" v-text="userDynamic.IssueTime"></span>
                </div>
              </div>
              <span class="inform_val" v-text="userDynamic.essay"></span>
              <div class='inform_mian_left_center'>
                <img class="inform_img" alt="" v-for="(item,index) in JSON.parse(userDynamic.image)" @click="DynamicImg(index,img,JSON.parse(userDynamic.image))" :src="'../image/dynamic/'+item">
              </div>
              <div class='inform_mian_left_bottom'>
                <button type="button" class="btn btn-danger" @click="InformDelete(userDynamic.id)">删除</button>
                <button type="button" class="btn btn-success" @click="InformPass(userDynamic.id)">通过</button>
              </div>
            </div>
          </div>
          <ul class="list-group inform_mian_right">
            <div class="inform_mian_left_b" v-if="userinform==''">没有举报</div>
            <li class="inform_mian_right_li list-group-item" v-for="item in userinform" @click="UserInformList(item.informer,item.InformDynamic)"><span class="badge" style="background:#FF6666;" v-if="item.state==0">待</span>{{ item.name + ' ' + item.InformText }}</li>
          </ul>
        </div>

        <!-- 单图片预览 -->
        <div id="pic" class="pic" v-cloak v-if="dynamicaimgX">
          <img id="img" class="pic_img" :src="dynamicaimg" alt="" @click="Dynamicaout()" />
          <a class="x_pic_on fa fa-close" style="font-size:60px;" @click="Dynamicaout()"></a>
        </div>

        <!-- 图片预览 -->
        <div id="pic" class="pic" v-cloak v-if="dynamicimgX">
          <div class="left_pic">
            <a class="left_pic_on fa fa-angle-left" style="font-size:60px;" @click="DynamicImgleft()"></a>
          </div>
          <img id="img" class="pic_img" :src="dynamicimg" alt="" @click="Dynamicout()" />
          <h1 id="h1"></h1>
          <div class="right_pic">
            <a class="right_pic_on fa fa-angle-right" style="font-size:60px;" @click="DynamicImgright()"></a>
          </div>
          <a class="x_pic_on fa fa-close" style="font-size:60px;" @click="Dynamicout()"></a>
        </div>

      </div>
    </div>



    <link rel="stylesheet" href="../css/bootstrap/bootstrap.min.css">
    <script src="../js/index.js"></script>
    <script src="../css/bootstrap/jquery.min.js"></script>
    <script src="../css/bootstrap/bootstrap.min.js"></script>

    <script src="../css/vue.js"></script>
    <!-- <script src="https://unpkg.com/axios/dist/axios.min.js"></script> -->
    <script src="../css/axios.js"></script>
    <script type="text/javascript">
      var app =new Vue({
        el:'.main',
        data:{
          html_right:"",//右侧内容
          usernum:"",//用户数量
          dynamicnum:"",//动态数量
          UserList1:"",//用户列表
          adminnum:"",//管理员数量
          dynamiclist:"",//动态列表
          dynamicaimgX:false,//单图片预览
          dynamicaimg:"",
          dynamicimgX:false,
          dynamicimg:false,
          dynamicimgarr:[],
          dynamicimgarrs:"",
          ContainerUp:false,//显示动态预览修改删除
          dynamicmessage:[],//动态信息
          usermessage:[],//用户信息
          userinform:[],//用户举报列表
          userDynamic:'',//用户举报列表
          div1:true,
          div2:false,
          div3:false,
          div4:false,
          UserInformUpb:true,
          UserInformUp:false,
          main_top_li:"<li><a href='#'>首页</a></li><li class='active'>总览</li>",
          UserListUp:false,
          dycumentInform:'',
          userInform:'',
          loginrecord:''
        },
        mounted:function() {
          this.UserNum(),
          this.DynamicNum(),
          this.AdminNum(),
          this.DynamicList(),//动态列表
          this.UserInform(),//举报
          this.LoginRecord()//登录记录
        },
        methods:{
          UserNum(){//获取用户数
            axios({method:'get',url:'UserNum.php'}).then(function(res){
              app.usernum=res.data;
            });
          },
          DynamicNum(){//获取动态数
            axios({method:'get',url:'DynamicNum.php'}).then(function(res){
              app.dynamicnum=res.data;
            });
          },
          AdminNum(){//获取管理员数
            axios({method:'get',url:'AdminNum.php'}).then(function(res){
              app.adminnum=res.data;
            });
          },
          UserList(){//获取用户列表
            var name = document.getElementById('name').value;
            axios({
              method:'get',
              url:'UserSeek.php?name='+name
            }).then(function(res){
              app.UserList1 = res.data;
            });
          },
          LoginRecord(){//获取用户登录记录
            axios({
              method:'get',
              url:'LoginRecord.php'
            }).then(function(res){
              app.loginrecord = res.data;
              console.log(JSON.stringify(res.data));
            });
          },
          //修改动态
          DunamicUpdata(id){
            var aa = document.getElementById('text').value;
            axios({
              method:'get',
              url:'DynamicUpdata.php?id='+id+'&text='+aa
            }).then(function(res){
              app.Container_off();
            });
          },
          //删除动态
          DunamicDelete(id){
            var aa = document.getElementById('text').value;
            axios({
              method:'get',
              url:'DynamicDelete.php?id='+id
            }).then(function(res){
              app.Container_off();
              alert(res.data);
            });
          },
          DynamicList(){//获取动态列表
            // var name = document.getElementById('dynamic_name').value;
            axios({
              method:'get',
              url:'../php/dynamic.php'
            }).then(function(res){
              app.dynamiclist = res.data;
            });
          },
          DynamicAImg(a){//动态单图片预览
            // var b = a.src;
            var b = document.getElementById('img'+a).src;
            app.dynamicaimgX = !app.dynamicaimgX;
            app.dynamicaimg = b;
          },
          Dynamicaout(){//关闭动态单图片预览切换
            app.dynamicaimgX = !app.dynamicaimgX;
          },
          DynamicImg(a,b,c){//动态列表图片预览
            app.dynamicimgX = !app.dynamicimgX;
            app.dynamicimgarr = c;
            app.dynamicimg = '../image/dynamic/'+app.dynamicimgarr[a];
            app.dynamicimgarrs = a;
          },
          DynamicImgleft(){//动态列表图片left切换
            if (app.dynamicimgarrs == 0) {
              app.dynamicimgarrs = app.dynamicimgarr.length - 1;
            }else {
              app.dynamicimgarrs--;
            }
            app.dynamicimg = '../image/dynamic/'+app.dynamicimgarr[app.dynamicimgarrs];
          },
          DynamicImgright(){//动态列表图片right切换
            if (app.dynamicimgarrs == app.dynamicimgarr.length-1) {
              app.dynamicimgarrs = 0;
            }else {
              app.dynamicimgarrs++;
            }
            app.dynamicimg = '../image/dynamic/'+app.dynamicimgarr[app.dynamicimgarrs];
          },
          Dynamicout(){//关闭动态列表图片预览切换
            app.dynamicimgX = !app.dynamicimgX;
          },
          Container_Up(a){//显示关闭动态预览删除
            app.ContainerUp = !app.ContainerUp;
            axios({
              method:'get',
              url:'dynamic_message.php?id='+a
            }).then(function(res){
              app.dynamicmessage = res.data;
            });
          },
          Container_off(){//关闭动态预览删除
            app.ContainerUp = !app.ContainerUp;
          },
          UserList_Up(a){//显示个人信息
            app.UserListUp = !app.UserListUp;
            axios({
              method:'get',
              url:'UserMessage.php?id='+a
            }).then(function(res){
              app.usermessage = res.data;
            });
            
          },
          UserInform(){//显示举报信息
            app.UserInformUp = !app.UserInformUp;
            app.UserInformUpb = !app.UserInformUpb;
            axios({
              method:'get',
              url:'UserInform.php'
            }).then(function(res){
              app.userinform = res.data;
            });
          },
          UserInform(){//获取举报信息列表
            axios({
              method:'get',
              url:'UserInform.php'
            }).then(function(res){
              app.userinform = res.data;
            });
          },
          UserInformList(a,b){//点击举报信息列表时显示
            app.UserInformUp = true;
            app.UserInformUpb = false;
            axios({
              method:'get',
              url:'getDynamic.php?id='+b+'&uid='+a
            }).then(function(res){
              app.userDynamic = res.data;
              app.dycumentInform = b
              app.userInform = a
            });
          },
          InformDelete(a,b){//删除被举报的动态
            // app.UserInformUp = true;
            // app.UserInformUpb = false;
            axios({
              method:'get',
              url:'informDelete.php?id='+app.dycumentInform+'&uid='+app.userInform
            }).then(function(res){
              alert(res.data);
            });
          },
          InformPass(a,b){//通过被举报的动态
            axios({
              method:'get',
              url:'InformPass.php?id='+app.dycumentInform+'&uid='+app.userInform
            }).then(function(res){
              alert(res.data);
            });
          },
          qiehuan1(){//切换总览
            app.div1 = true;
            app.div2 = false;
            app.div3 = false;
            app.div4 = false;
            app.main_top_li = "<li><a href='#'>首页</a></li><li class='active'>总览</li>"
          },
          UserList_off(){//关闭动态预览删除
            app.UserListUp = !app.UserListUp;
          },
          qiehuan2(){//切换用户列表
            app.div1 = false;
            app.div2 = true;
            app.div3 = false;
            app.div4 = false;
            this.UserList();
            app.main_top_li = "<li><a href='#'>首页</a></li><li class='active'>用户列表</li>"
          },
          qiehuan3(){//切换动态列表
            app.div1 = false;
            app.div2 = false;
            app.div3 = true;
            app.div4 = false;
            app.main_top_li = "<li><a href='#'>首页</a></li><li><a href='#'>动态列表</a></li><li class='active'>全部动态</li>"
          },
          qiehuan4(){//切换用户举报
            app.div1 = false;
            app.div2 = false;
            app.div3 = false;
            app.div4 = true;
            app.main_top_li = "<li><a href='#'>首页</a></li><li class='active'>用户举报</li>"
          }
        }
      });
    </script>
  </body>
</html>
