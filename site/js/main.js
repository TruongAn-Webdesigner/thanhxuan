$(() => {
  $(window).scroll(() => {
      var windowTop = $(window).scrollTop();
      /* cua menu */
      windowTop > 50 ? $('#menu').addClass('menuShadow') : $('#menu').removeClass('menuShadow');
  });
});

function getValueById(arr) {
  var Ob = {};
  var bien;
  for (let i = 0; i < arr.length; i++) {
    key = arr[i];
    console.log();
    bien = $('#'+ key).val();
    Ob[key] = bien;
  }
  return Ob;
}
