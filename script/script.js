// function ocultar(id){
//   if (document.getElementById){
//       var page = document.getElementById(id);
//       page.style.display = (page.style.display == 'none') ? 'block' : 'none';
//     }
//   }
//   window.onload = function(){
//   ocultar('contenido');
// }

$(function(){
  var windowHeight = $(window).height();//tamaño de la ventana
  var barraAltura = $('.barra').innerHeight();//altura de la barra
  $(window).scroll(function(){
      var scroll = $(window).scrollTop();
      if (scroll > windowHeight){
          $('.barra').addClass('fixed');
          $('body').css({'margin-top': barraAltura+'px'});
      }else{
          $('.barra').removeClass('fixed');
          $('body').css({'margin-top': '0px'});
      }
  });
});
