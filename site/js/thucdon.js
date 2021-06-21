    linkCssthucDon();

function linkCssthucDon() {
    var linkElement = document.createElement("link");

    linkElement.rel = "stylesheet";
    linkElement.href = "css/thucdon/thucdon.css"; //Replace here

    document.head.appendChild(linkElement);
}

var soluong = 1;
var apiThucPham = '?act=getAllFood';
var tong = [];
var data_food = getAllThucPham();
newThucPham();

function newThucPham() {
    var col = newCol(soluong, data_food);

    $('#body_thucdon_1').append(col);
    soluong++;
}

$('.click_up_thucdon_1').click(function (e) {
    e.preventDefault();

    var col = newCol(soluong, data_food);

    $('#body_thucdon_1').append(col);
    soluong++;
});

function newCol(soluong, data_food) {
    var option = '';

    for (let i = 0; i < data_food.length; i++) {
        option += '<option value="' + data_food[i]['id'] + '">' + data_food[i]['ten'] + '</option>';
    }

    var str =
        `
  <tr data-row-id="`+ soluong + `">
    <td>
      <select onchange="reSelect(` + soluong + `)" class="select" data-select-id="` + soluong + `">
        ` + option + `
      </select>
    </td>
    <td>
      <input type="number" onkeyup="reGram(` + soluong + `)" class="input_thucdon ip_g" id="id_g_` + soluong + `" placeholder="Gram">
    </td>
    <td class="protein_`+ soluong + `">...</td>
    <td class="fat_`+ soluong + `">...</td>
    <td class="carb_`+ soluong + `">...</td>
    <td class="calo_`+ soluong + `">...</td>
    <td class="down"><button onclick="downRow(` + soluong + `)"><i class="fa fa-trash-o" aria-hidden="true"></i></button></td>
  </tr>
  `;

    return str;
}

function downRow(thutu) {
    var tr = $("[data-row-id=" + thutu + "]");

    console.log(tr);
    tr.remove();
}

$('.removeAllRow').click(function (e) {
    e.preventDefault();
    $('#body_thucdon_1 tr').remove();
});

function getAllThucPham() {
    var data = $.ajax({
        url: '?act=getAllFood',
        async: false,
        method: "get",
        responseType: "json",
        success: function (response) {
            return data
        },
        error: function () {
            alert('loi');
        }
    });

    return JSON.parse(data.responseText);
}


function reGram(num) {
    var g = $('#id_g_' + num).val();
    var food = $("select[data-select-id='" + num + "']").val();

    var dataItem = getDataMenu(g, food);
    var menu = reCountTong(num, dataItem);
    var total = getTotal(menu);

    innerHtml(num, dataItem, total);
}

function getDataMenu(g, food) {
    for (let i = 0; i < data_food.length; i++) {
        if (parseInt(data_food[i]['id']) == parseInt(food)) {
            var protein = (g * data_food[i]['protein']).toFixed(2);
            var fat = (g * data_food[i]['fat']).toFixed(2);
            var carb = (g * data_food[i]['carb']).toFixed(2);
            var calo = Math.round(g * data_food[i]['calo']);
            break;
        }
    }

    return { protein, fat, carb, calo };
}

function reSelect(num) {
    reGram(num);
}

function innerHtml(num, dataMenu, total) {
    $('.protein_' + num).html(dataMenu.protein);
    $('.fat_' + num).html(dataMenu.fat);
    $('.carb_' + num).html(dataMenu.carb);
    $('.calo_' + num).html(dataMenu.calo);

    $('.protein_total').html(total.protein);
    $('.fat_total').html(total.fat);
    $('.carb_total').html(total.carb);
    $('.calo_total').html(total.calo);
}

function reCountTong(num, dataMenu) {
    if (tong.length > 0) {
        for (var i = 0; i < tong.length; i++) {
            if (parseInt(num) == parseInt(tong[i]['id'])) {
                tong[i]['protein'] = dataMenu.protein;
                tong[i]['fat'] = dataMenu.fat;
                tong[i]['carb'] = dataMenu.carb;
                tong[i]['calo'] = dataMenu.calo;
                break;
            }
            if (i == tong.length - 1) {
                var data = {
                    'id': num,
                    'protein': dataMenu.protein,
                    'fat': dataMenu.fat,
                    'carb': dataMenu.carb,
                    'calo': dataMenu.calo
                }
                tong.push(data);
                break;
            }
        }
    } else {
        var data = {
            'id': num,
            'protein': dataMenu.protein,
            'fat': dataMenu.fat,
            'carb': dataMenu.carb,
            'calo': dataMenu.calo
        }
        tong.push(data);
    }

    return tong;
}

function getTotal(menu) {
    var protein = 0;
    var fat = 0;
    var carb = 0;
    var calo = 0;
    for (let i = 0; i < menu.length; i++) {
        protein += parseFloat(menu[i]['protein']);
        fat += parseFloat(menu[i]['fat']);
        carb += parseFloat(menu[i]['carb']);
        calo += parseFloat(menu[i]['calo']);
    }

    var array = {
        'protein': (protein).toFixed(2),
        'fat': (fat).toFixed(2),
        'carb': (carb).toFixed(2),
        'calo': Math.round(calo),
    }

    return array;
}


$('#exportExcelButton').click(function (e) { 
    e.preventDefault();
    exportExcel('thucdon_1|result', '', 'thucdon');
});

function exportExcel(tableNames, headerbdColor, filename) {    
    if (tableNames.trim() === "") {
        alert(' Không có bảng được cung cấp');
        return;
    }

    if (headerbdColor.trim() === "") {
        headerbdColor = "#87AFC6";
    }

    if (filename.trim() === "") {
        filename = "ExportData";
    }

    var export_data = "";
    var arrTableNames = tableNames.split("|");
    if (arrTableNames.length > 0) {
        //duyệt từng bảng
        for (var i = 0; i < arrTableNames.length; i++) {
            export_data += "<table border='2px'><tr bgcolor='" + headerbdColor + "'>";            
            var objectTable = document.getElementById(arrTableNames[i]);//Lấy id bảng thứ i
            
            if (objectTable === undefined) {
                alert('Bảng không tìm thấy');
                return;
            }            
            for (var j = 0; j < objectTable.rows.length; j++) {
                if (i == 0) { // bảng 1 lấy theo cột     
                    var objCells = objectTable.rows.item(j).cells;
    
                    for (var c = 0; c < objCells.length; c++) {
                        if (c == 0 && j != 0) { // bắt đầu hàng
                            export_data += "<tr>";
                        }

                        if (j == 0) { // header
                            if (c != 6) {
                                export_data += "<th>";
                                export_data += objCells.item(c).innerHTML;  
                                export_data += "</th>";                      
                            }
                        } 
                        else { // body
                            if (c != 6) {
                                export_data += "<td>";
                                if (c == 0) {
                                    var optionSelected = $("[data-select-id="+ j +"] option:selected").text();                                
                                    export_data += optionSelected;
                                } else if (c == 1) {
                                    var gram = $("#id_g_" + j).val(); 
                                    export_data += gram;
                                } else {
                                    export_data += objCells.item(c).innerHTML;        
                                }                            
                                export_data += "</td>";            
                            }
                        }
                        
                        if (c == 5) {
                            export_data += "</tr>";
                        }
                        
                    }
                } else { // bảng 2 lấy theo hàng           
                    export_data += objectTable.rows[j].innerHTML  + "</tr>";     
                }
            }        
            export_data += "</table>";            
        }

        // kiểm tra trình duyệt Là IE thì

        if (window.navigator.userAgent.indexOf("MSIE") > 0 || !!window.navigator.userAgent.match(/Trient.*rv\:11\./)) {
            exportIF.document.open("txt/html", "replace");
            exportIF.document.write(export_data);
            exportIF.document.close();
            exportIF.focus();
            sa = exportIF.document.execCommand("SaveAs", true, filename + ".xsl");
        } else { //các trình duyệt khác
            sa = window.open("data:application/vnd.ms-excel," + encodeURIComponent(export_data))
        }
    }
}



function doCapture() {
    window.scrollTo(0, 0);
 
    html2canvas(document.getElementById("_menu_")).then(function (canvas) {
 
        // Create an AJAX object
        var ajax = new XMLHttpRequest();
 
        // Setting method, server file name, and asynchronous
        ajax.open("POST", "controllers/save-capture.php", true);
 
        // Setting headers for POST method
        ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
 
        // Sending image data to server
        ajax.send("image=" + canvas.toDataURL("image/jpeg", 0.9));
 
        // Receiving response from server
        // This function will be called multiple times
        ajax.onreadystatechange = function () {
 
            // Check when the requested is completed
            if (this.readyState == 4 && this.status == 200) {
 
                // Displaying response from server
                console.log(this.responseText);
            }
        };
    });
}

function downloadtable() {

    var node = document.getElementById('_menu_');

    domtoimage.toPng(node)
        .then(function (dataUrl) {
            var img = new Image();
            img.src = dataUrl;
            downloadURI(dataUrl, "thuc-don.png")
        })
        .catch(function (error) {
            console.error('oops, something went wrong!', error);
        });

}



function downloadURI(uri, name) {
    var link = document.createElement("a");
    link.download = name;
    link.href = uri;
    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);
    delete link;
}