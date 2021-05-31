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
    option += '<option value=" ' + data_food[i]['id'] +' ">' + data_food[i]['ten'] + '</option>';
  }

  var str =
  `
  <tr data-row-id="`+ soluong + `">
    <td>
      <select onchange="reSelect(` + soluong + `)" class="select" data-select-id="`+ soluong + `">
        ` + option + `
      </select>
    </td>
    <td>
      <input type="number" onkeyup="reGram(` + soluong + `)" class="input_thucdon ip_g" id="id_g_`+ soluong + `" placeholder="Gram">
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
  var g = $('#id_g_'+ num).val();
  var food = $("select[data-select-id='"+ num +"']").val();

  var dataItem = getDataMenu(g, food);
  var menu = reCountTong(num, dataItem);
  console.log(menu);
  var total = getTotal(menu);

  innerHtml(num, dataItem, total);
}

function getDataMenu(g, food) {
  for(let i = 0; i < data_food.length; i++) {
    if (parseInt(data_food[i]['id']) == parseInt(food)) {
      var protein = (g * data_food[i]['protein']).toFixed(2);
      var fat = (g * data_food[i]['fat']).toFixed(2);
      var carb = (g * data_food[i]['carb']).toFixed(2);
      var calo = Math.round(g * data_food[i]['calo']);
      break;
    }
  }

  return {protein, fat, carb, calo};
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
