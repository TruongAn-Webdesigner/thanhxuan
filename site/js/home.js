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
