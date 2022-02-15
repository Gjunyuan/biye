

var abcd = window.location.search;
var abcd1 = abcd.split('?n=');
var abcd2 = abcd1[1].split('\&p=');

var MyMessage =new Vue({
  el:'.main',
  data:{
    dynamiclist:"",
    NoneDynamic:false
  },
  mounted:function() {
    this.DynamicList()
  },
  methods:{
    DynamicList(){
      // alert(abcd2[0]);
      axios({
        method:'get',
        url:'../php/MyDynamic.php'+abcd
      }).then(function(res){
        if (res.data.length=='0') {
          MyMessage.NoneDynamic = true
        }
        MyMessage.dynamiclist = res.data;
      });
    },
    // 我的动态搜索
    select1(){
      var c = document.getElementById("select1").value;
      axios({
        method:'get',
        url:'../php/DynamicSelect.php?text='+c+'&n='+abcd2[0]
      }).then(function(res){
        if (res.data.length=='0') {
          MyMessage.NoneDynamic = true
          MyMessage.dynamiclist = ""
        }else{
          MyMessage.NoneDynamic = false
          MyMessage.dynamiclist = res.data
        }
        console.log(res.data);
      });
    },
    MessageUrl(name,n,p){
      window.location='../UserMessage/index.php?name='+name+'&n='+n+'&p='+p;
    },
    DivHref(id,n,p,Y,I){
      window.location='../main/container.php?id='+id+'&n='+n+'&p='+p+'&Y='+Y+'&I='+I
    },
    DeleteDynamicList(id){
      axios({method:'get',url:'../php/MyDynamicDelete.php'+abcd+'&id='+id}).then(function(res){
        alert(res.data);
        location.replace(location.href);
      });
    },
  }
});


$(function () {
	$("[data-toggle='popover']").popover();
});

//截取两个字符串之间的内容
function subStringMulti(text, begin, end) {
  var regex;
  if (end == '\\n')
      regex = new RegExp(begin + '(.+)', "g");
  else
      regex = new RegExp(begin + '([\\s\\S]+?)' + end, "g");
  try {
      var result;
      var blocks = [];
      while ((result = regex.exec(text)) != null) {
          blocks.push(result[1].trim());
      }
      return blocks;
      // return text.match(regex);
  } catch (err) {
      return null;
  }
};
