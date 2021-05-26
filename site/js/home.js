var checkSelect = true;

linkCssHome();

function linkCssHome() {
  var linkElement = document.createElement("link");

  linkElement.rel = "stylesheet";
  linkElement.href = "css/home/home.css"; //Replace here

  document.head.appendChild(linkElement);
}

$('#tinhcalo').submit(function (e) {
  e.preventDefault();
  var arrId = ['cl_tuoi', 'cl_chieucao', 'cl_cannang', 'cl_Vandong']
  var gioitinh = $('input[name=cl_gioitinh]:checked', '#tinhcalo').val();
  var valById = getValueById(arrId);

  // check du lieu
  var H = cmToInches(valById.cl_chieucao);
  var W = kgToLbs(valById.cl_cannang);

  var BMR = countBMR(gioitinh, W, H, valById.cl_tuoi);

  var TDEE = Math.round(BMR * parseFloat(valById.cl_Vandong));

  var html = makeResultHtmlCalo(TDEE);

  if ($('#cl_result').length == 1)
  {
    $('.tdee').html(TDEE);

    var dt = xuliTDEE(TDEE);
    for (const [key, value] of Object.entries(dt))
    {
      $('.' + key).html(value);
    }
  }
  else
  {
    $('.cl_about').slideUp(function() {
      $('#box_calo').append(html);
    });
  }
});

function xuliTDEE(TDEE) {
  var tdDown1 = TDEE * 86/100;
  var tdDown2 = TDEE * 72/100;
  var tdDown3 = TDEE * 45/100;
  var tdUp1 = TDEE * 114/100;
  var tdUp2 = TDEE * 128/100;
  var tdUp3 = TDEE * 155/100;

  return {
    "tdDown1": Math.round(tdDown1),
    "tdDown2": Math.round(tdDown2),
    "tdDown3": Math.round(tdDown3),
    "tdUp1": Math.round(tdUp1),
    "tdUp2": Math.round(tdUp2),
    "tdUp3": Math.round(tdUp3)
  }
}

function makeResultHtmlCalo(TDEE) {
  var dt = xuliTDEE(TDEE);

  var str = `
    <div id="cl_result" class="mt-Down50">
      <div class="calo-about-title">Lượng Calories cơ thể cần trong ngày</div>
      <button class="button-tdee"><span class="tdee">`+ TDEE +`</span> Calories/ngày</button>
      <table border=1 class="w-90 mx-auto">
        <tr>
          <td colspan="2">Giữ cân</td>
          <td colspan="2" class=""><span class="tdee">`+ TDEE +`</span> Calories/ngày</td>
        </tr>
        <tr col="4">
          <td colspan="2">Giảm cân</td>
          <td colspan="2">Tăng cân</td>
        </tr>
        <tr>
          <td>Giảm cân nhẹ (0.25kg/tuần)</td>
          <td><span class="tdDown1">`+ dt.tdDown1 +` </span><br>Calories/ngày(86%)</td>
          <td>Tăng cân nhẹ(0.25kg/tuần)</td>
          <td><span class="tdUp1">`+ dt.tdUp1 +` </span><br>Calories/ngày(114%)</td>
        </tr>
        <tr>
          <td>Giảm cân(0.5kg/tuần)</td>
          <td><span class="tdDown2">`+ dt.tdDown2 +` </span><br>Calories/ngày(72%)</td>
          <td>Tăng cân(0.5kg/tuần)</td>
          <td><span class="tdUp2">`+ dt.tdUp2 +` </span><br>Calories/ngày(128%)</td>
        </tr>
        <tr>
          <td>Giảm cân nhiều(1kg/tuần)</td>
          <td><span class="tdDown3">`+ dt.tdDown3 +` </span><br>Calories/ngày(45%)</td>
          <td>Tăng cân nhiều(1kg/tuần)</td>
          <td><span class="tdUp3">`+ dt.tdUp3 +` </span><br>Calories/ngày(155%)</td>
        </tr>
      </table>
    </div>
  `;
  return str;
}

function countBMR(gioitinh, W, H, A) {
  var BMR;
  if (gioitinh == 1) { // nu
    BMR = 10*W + 6.25*H - 5*A - 161;
  }
  if (gioitinh == 0) { // nam
    BMR = 10*W + 6.25*H - 5*A + 5;
  }
  return Math.round(BMR); // BMR là công thức để tính tỷ lệ trao đổi chất cơ bản.
}

function cmToInches(H) {
  var toInch = H * 0.393700787;
  return toInch
}

function kgToLbs(W) {
  var toLb = W * 2.20462262;
  return toLb
}

$('#selectCount').change(function (e) {
  e.preventDefault();
  if (checkSelect == true) {
    checkSelect = false;

    var option = $('#selectCount').val();
    var check = $('#' + option).hasClass('show');

    if (check == false)
    {
      $('#' + option).removeClass('opacity-0');
      $('#' + option).addClass('z-index-1 opacity_fadeIn');

      var divDangShow = $('.mainCount').children('div .show');

      divDangShow.addClass('opacity_fadeOut opacity-0');
      divDangShow.removeClass('show');

      setTimeout(function() {
        $('#' + option).removeClass('z-index-1 opacity_fadeIn');
        $('#' + option).addClass('show z-index-2 opacity-1');
        divDangShow.removeClass('opacity_fadeOut z-index-2 opacity-1');
      }, 1200)
    }

    setTimeout(function() {
      checkSelect = true;
    }, 1200);
  }
});
