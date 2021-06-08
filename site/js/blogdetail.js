linkCssBlogDetail();

function linkCssBlogDetail() {
  var linkElement = document.createElement("link");

  linkElement.rel = "stylesheet";
  linkElement.href = "css/blogchitiet/blogchitiet.css"; //Replace here

  document.head.appendChild(linkElement);
}

/* url = "/thanhxuan/site/?act=comment";

function getComment(idTin){
    var data = $.ajax({
      url: '?act=comment' + idTin,
      async: false,
      method: "get",
      responseType: "json",
      success: function (response) {
        return data;
      },
      error: function () {
        alert('loi');
      }
    });
    return JSON.parse(data.responseText);
} */

$(document).ready(function () {
  $("#danglala").submit(function (e) { 
    e.preventDefault();
    var noidungcomment = document.getElementById("laynoidung").value;
    if (noidungcomment.length != '') {
      var iduser = document.getElementById("layiduser").value;
      var idtin = document.getElementById("layidtin").value;    
      var d = new Date();
      var datetime = d.getFullYear() + '-' + (d.getMonth() + 1) + '-' + d.getDate() + ' ' + d.getHours() + ':' + d.getMinutes() + ':' + d.getSeconds();    
      // 2018-12-19 18:14:23
  
      var dataComment = {    
        'noidungcomment': noidungcomment,
        'iduser': iduser,
        'idtin': idtin,
        'datetime': datetime
      }
      $.ajax({
        url: '?act=addComment' ,      
        method: "post",
        data: dataComment,
        responseType: "json",
        success: function (response) {        
          var res = JSON.parse(response);
          var html = taohtml(res);
  
          $('#box_comment').prepend(html);
        },
        error: function () {
          alert('loi');
        }
      });   
    } else {
      alert('chicken an');
    }
   
  });
});

function taohtml(data) {
  var str = `
  <div class="show-comment">
    <div class="show-comment-img"><img src="../img/women.jpg" alt=""></div>

    <div class="show-comment-infor">
        <div class="show-comment-name-time">
            <div class="name">user</div>
            <div class="time">`+ data.ngaygio +`</div>
        </div>
        <div class="show-comment-chat">`+ data.noidung +`</div>
    </div>
  </div>
  `;

  return str;
}