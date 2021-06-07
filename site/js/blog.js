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
            var blog = getBlog(idLT, loaitin[i]['soluong'], loaitin[i]['soluong'] + 4);
            loaitin[i]['soluong']++;
            break;
        }   
    }
}


function getBlog(idlt, from, to) {
    var data = $.ajax({
        url: '?act=getBlog&idlt=' + idlt + '&from=' + from + '&to=' + to,
        async: false,
        method: "get",
        responseType: "json",
        success: function (response) {
            console.log(response);
            return data;
        },
        error: function () {
            alert('loi');
        }
    });
  
    return data;
}
  