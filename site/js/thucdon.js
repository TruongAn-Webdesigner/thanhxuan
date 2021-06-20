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
    exportExcel('thucdon_1|result', '', '');
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

            //duyệt từng dòng Lấy dữ liệu lưu vào export_data                        
            for (var j = 0; j < objectTable.rows.length; j++) {                    
                if (i == 0) {
                    for (var n = 0; n < objectTable.rows[j].cells.length; n++) { 
                        if (j = 0) {
                            if (n != 6) {
                                // console.log(objectTable.rows[j].cells[n]);
                                export_data += "<th>" + objectTable.rows[j].cells[n].innerHTML+ "</th>";
        
                                if (n == 5) {
                                    export_data += "</tr>";
                                }
                                
                            }    
                        } 
                        else if (j > 0){
                            if (n == 0) { // kể từ hàng thứ 2 n = 0 và 1 sẽ lấy db khác nhau
                                // $( "#myselect option:selected" ).text();
                                console.log(objectTable.rows[j].cells[n]);
                                export_data += 0;
                            }
                        }                              
                        
                        
                        // if (bien == j) {
                        //     bien = -1;
                        //     console.log(objectTable.rows[j].cells[n]);
                        // }
                        // if (n == objectTable.rows[j].cells.length - 1) {
                        //     bien = j + 1;
                        // }
    
                    }
                } 
                else {                        
                    export_data += objectTable.rows[j].innerHTML + "</tr>";                        
                }
                
                // console.log(objectTable.rows[j].cells[1].innerHTML);

                // var select = objectTable.rows[j].cells[0].getElementsByClassName('select')[0];
                // console.log(select.options[select.selectedIndex]);
            }

            export_data += "</table>";
        }

        // kiểm tra trình duyệt Là IE thì
        // if (window.navigator.userAgent.indexOf("MSIE") > 0 || !!window.navigator.userAgent.match(/Trient.*rv\:11\./)) {
        //     exportIF.document.open("txt/html", "replace");
        //     exportIF.document.write(export_data);
        //     exportIF.document.close();
        //     exportIF.focus();
        //     sa = exportIF.document.execCommand("SaveAs", true, filename + ".xsl");
        // } else { //các trình duyệt khác
        //     sa = window.open("data:application/vnd.ms-excel," + encodeURIComponent(export_data))
        // }
    }

}