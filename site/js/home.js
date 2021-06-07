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
  var arrId = ['cl_tuoi', 'cl_chieucao', 'cl_cannang', 'cl_Vandong'];
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



$('#form_bmi').submit(function (e) {
  e.preventDefault();
  var arrId = ['bmi_chieucao', 'bmi_cannang'];
  var valById = getValueById(arrId);

  var met = valById.bmi_chieucao / 100;
  var BMI = valById.bmi_cannang / (met * met);
  var data = getMoTaBMI(BMI);
  BMI = BMI.toFixed(2);

  if ($('#result_bmi').length == 1)
  {
    $('._bmi').html(BMI);
    $('.type_bmi').html(data.type);
    $('.mota_bmi').html(data.str);
  }
  else
  {
    var html = makeResultHtmlBMI(BMI, data.type, data.str);
    showResult('.bmi_about', '#box_bmi', html);
  }
});

function getMoTaBMI(bmi) { // nguồn https://thegioidiengiai.com/cach-tinh-bmi-nu
  var str;
  var type;
  if (bmi < 18.5) {
    type = 'Gầy';
    str = 'Chỉ số BMI đang ở mức thấp. Cần cố gắng bổ sung đầy đủ chất dinh dưỡng, nước và tập thể dục đều đặn để đạt mức bình thường.';
  }

  if (bmi > 18.5 && bmi < 24.9) {
    type = 'Bình thường';
    str = 'Chỉ số BMI nằm trong phạm vi bình thường. Cố gắng duy trì nhé !';
  }

  if (bmi >= 24.9 && bmi < 29.9) {
    type = 'Hơi béo';
    str = 'Bạn đang hơi béo! Hãy tập thể dục nhiều hơn và cắt giảm các thực phẩm có đường và chất béo.';
  }

  if (bmi >= 29.9 && bmi < 34.9) {
    type = 'Béo phì cấp độ 1 !';
    str = 'Nguy cơ phát triển bệnh cao. Hãy chuẩn bị hành trang và kiến thức để giảm cân sớm nhất có thể.';
  }

  if (bmi >= 34.9 && bmi < 39.9) {
    type = 'Béo phì cấp độ 2 !';
    str = 'Nguy cơ phát triển bệnh RẤT CAO. Hãy chuẩn bị hành trang và kiến thức để giảm cân sớm nhất có thể.';
  }

  if (bmi >= 39.9) {
    type = 'Béo phì cấp độ 3 !';
    str = 'Nguy cơ phát triển bệnh ở mức NGUY HIỂM. Hãy chuẩn bị hành trang và kiến thức để giảm cân sớm nhất có thể.';
  }

  return {
    'type': type,
    'str': str
  }
}

function makeResultHtmlBMI(bmi, type, mota) {
  var str =
  `
    <div id="result_bmi" class="mt-d50">
      <h3>Chỉ số BMI</h3>
      <h1 class="_bmi">`+ bmi +`</h1>
      <div class="mt-2">
        <div class="type_bmi"><h3>`+ type +`</h3></div>
        <div class="mota_bmi">`+ mota +`</div>
      </div>
    </div>
  `;

  return str;
}

function showResult(slideUpClass, idAppend, html) {
  $(slideUpClass).slideUp(function() {
    $(idAppend).append(html);
  });
}

$('#form_mo').submit(function (e) { // https://www.thehinhvip.com/2019/05/body-fat-la-gi.html
  e.preventDefault();
  var arrId = ['mo_chieucao', 'mo_chuvico', 'mo_vongeo', 'mo_vonghong']
  var gioitinh = $('input[name=mo_gioitinh]:checked', '#form_mo').val();
  var valById = getValueById(arrId);

  var bodyFat = countBodyFat(gioitinh, valById);

  if ($('#result_bodyfat').length == 1)
  {
    $('._bodyfat').html(bodyFat + ' %');
  }
  else
  {
    var html = makeResultHtmlBodyFat(bodyFat);
    showResult('#about_bodyFat', '#result_bodyFat', html);
  }
});

function countBodyFat(gioitinh, data) {
  var bodyFat;
  if (gioitinh == 0) {
    bodyFat = 495/(1.0324 - 0.19077 * log(10, (data.mo_vongeo - data.mo_chuvico)) + 0.15456 * log(10, data.mo_chieucao)) - 450;
  }

  if (gioitinh == 1) {
    var nu = parseInt(data.mo_vongeo) + parseInt(data.mo_vonghong) - parseInt(data.mo_chuvico);
    bodyFat = 495/(1.29579 - 0.35004 * log(10, nu) + 0.221 * log(10, data.mo_chieucao)) - 450;
  }

  return bodyFat.toFixed(2);
}

function log(base, number) {
  return Math.log(number) / Math.log(base);
}


var rad = document.form_mo.mo_gioitinh;
var prev = null;
for(var i = 0; i < rad.length; i++) {
    rad[i].onclick = function () {
        if(this !== prev) {
            prev = this;
        }
        if (this.value == 0) {
          $('#mo_vonghong').val('');
          $('#mo_vonghong').attr("disabled", true);
        }
        if (this.value == 1) {
          $('#mo_vonghong').attr("disabled", false);
        }
    };
}

function innerNumberSlide(num) {
  document.getElementById("slide_number").innerHTML = "0" + num;
}

function makeResultHtmlBodyFat(bodyfat) {
  var str =
  `
    <div id="result_bodyfat" class="mt-d50">
      <h3>Tỉ lệ Body Fat</h3>
      <h1 class="_bodyfat">` + bodyfat + ` %</h1>
    </div>
  `;

  return str;
}

/* animation */
$(() => {
  $(window).scroll(() => {
      var windowTop = $(window).scrollTop();
      if(windowTop > 450){
        $('#icon1').addClass('instagram');
        $('#icon2').addClass('twitter');
        $('#icon3').addClass('facebook');
        $('#icon4').addClass('pinterest');
      }
      else{
        $('#icon1').removeClass('instagram');
        $('#icon2').removeClass('twitter');
        $('#icon3').removeClass('facebook');
        $('#icon4').removeClass('pinterest');
      }
    });
  });
/* animation */