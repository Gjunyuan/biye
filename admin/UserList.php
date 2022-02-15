<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="css/UserList.css" media="screen" title="no title" charset="utf-8">
  </head>
  <body>
    <div class="UserList_main">
      <div class="UserList_main_top">
        <form action="UserSeek.php" method="post">
          <input class="UserList_main_top_text" class="text" type="text" name="name" v-on:keyup="UserList()" id="name" placeholder="搜索">
          <button type="button" name="button" @click="UserList()">搜索</button>
        </form>
      </div>
      <div class="UserList_main_bottom" v-html="UserList">

      </div>
    </div>
  </body>


  <script src="../css/vue.js"></script>
  <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
  <script type="text/javascript">
    var app = new Vue({
      el:'.UserList_main',
      data:{
        UserList:"123"
      },
      mounted:function() {
        this.UserList()
      },
      methods:{
        UserList(){
          var name = document.getElementById('name').value;
          console.log(name);
          // axios({
          //   method:'get',
          //   url:'UserSeek.php?='+name
          // }).then(function(res){
          //   console.log(a);
          //   app.User_List=res.data;
          // });
        }
      }
    });
  </script>
</html>
