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
  var arrId = ['calo_tuoi', 'calo_chieucao', 'calo_cannang', 'calo_vandong']
  var gioitinh = $('input[name=calo_optradio]:checked', '#tinhcalo').val();
  var valById = getValueById(arrId);

  var H = cmToInches(valById.calo_chieucao);
  var W = kgToLbs(valById.calo_cannang);

  var BMR = countBMR(gioitinh, W, H, valById.calo_tuoi);

  var TDEE = BMR * parseFloat(valById.calo_vandong);
  console.log(TDEE);
});

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
