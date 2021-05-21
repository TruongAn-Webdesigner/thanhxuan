$(() => {
  $(window).scroll(() => {
      var windowTop = $(window).scrollTop();
      /* cua menu */
      windowTop > 50 ? $('#menu').addClass('menuShadow') : $('#menu').removeClass('menuShadow');
  });
});
