
var img = ['1.jpg','1.jpg','2.jpg','2.jpg','2.jpg','3.jpg','1.jpg','4.jpg','2.jpg'];


// var abcd = window.location.search;
// abcd = abcd.split('?id=');
// var id = abcd[1];
// alert(id);

// outputImg();
//设置图片
// function outputImg() {
//   var abcd = "";
//   for (var i = 0; i < img.length; i++) {
//     abcd = abcd + "<img class='container_img' src='"+img[i]+"' onclick='cut("+ i +")' />";
//   }
//   document.getElementById('containerImg').innerHTML = abcd;
// }

//设置隐藏弹窗右上角

function head1(a) {
  var img = a.src;
  document.getElementById('pic').style.display= "block";
  document.getElementById('img').src= img;
}

var pic;
function cut(a) {
  document.getElementById('pic').style.display= "block";
  document.getElementById('img').src= "../image/dynamic/"+img[a];
  pic = a
}
//设置关闭弹窗右上角
function off() {
  document.getElementById('pic').style.display= "none";
}

//图片预览往左事件
function left_pic() {
  if (pic == 0) {
    pic = img.length - 1;
  }else {
    pic--;
  }
  document.getElementById('img').src= "../image/dynamic/"+img[pic];
  // alert(pic);
}
//图片预览往右事件
function right_pic() {
  if (pic == img.length-1) {
    pic = 0;
  }else {
    pic++;
  }
  document.getElementById('img').src= "../image/dynamic/"+img[pic];
}


//动态下拉框
var a = 1;
function abc(ac) {
  if (a) {
    ac.innerHTML =  "<div class='a1'></div><div class='container_pull_x'><div class='container_pull_li'>收藏</div><div class='container_pull_li'>删除</div></div>";
    a = 0;
  }else {
    ac.innerHTML =  "";
    a = 1;
  }
}