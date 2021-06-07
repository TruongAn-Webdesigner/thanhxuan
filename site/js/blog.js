linkCssBlog();

function linkCssBlog() {
  var linkElement = document.createElement("link");

  linkElement.rel = "stylesheet";
  linkElement.href = "css/blogindex/blogindex.css"; //Replace here

  document.head.appendChild(linkElement);
}

var loaitin = [
    {'idlt': 1, 'soluong': 4},
    {'idlt': 3, 'soluong': 4},
    {'idlt': 4, 'soluong': 4}
]

function docthem(idLT) {
    for (let i = 0; i < loaitin.length; i++) {
        if (loaitin[i]['idlt'] == idLT)  {
            var blog = getBlog(idLT, loaitin[i]['soluong']);            
            loaitin[i]['soluong'] += 4;            
            break;
        }   
    }
    
    if (blog.length < 4) {
        $('.docthem_' + idLT).hide();
    }

    for (let i = 0; i < blog.length; i++) {
        var html = createHtmlBlog(blog[i]);
        $('#lt_' + idLT).append(html);
    }

}


function getBlog(idlt, from) {
    var data = $.ajax({
        url: '?act=getBlog&idlt=' + idlt + '&from=' + from,
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
}
  
function createHtmlBlog(blog) {
    var str = `
    <div class="box-news-theo-muc-bao">
        <div class="box-news-theo-muc-img">
            <a href="<?=SITE_URL?>/?act=blogdetail&id=`+ blog.idTin +`"><img src="../`+ blog.urlHinh +`" alt="" srcset=""></a>
        </div>
        <div class="box-news-theo-muc-title">
            <a href="<?= SITE_URL ?>/?act=blogdetail&id=`+ blog.idTin +`">`+ blog.TieuDe +`</a>
            <div class="tomtat mt-1">
                <span class="text">`+ blog.TomTat +`</span>
            </div>
            <div class="mt-1">
                <span class="bottom-blog"><i class="fa fa-user" aria-hidden="true"></i>` + blog.hoten + `</span>
                <span class="bottom-blog"><i class="fa fa-calendar" aria-hidden="true"> </i>`+ blog.Ngay +`</span>                                            
            </div>
        </div>                                      
    </div>
    `;

    return str;
}