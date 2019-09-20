// function muestra_oculta(id){
//   if (document.getElementById){ //se obtiene el id
//       var el = document.getElementById(id); //se define la variable "el" igual a nuestro div
//       el.style.display = (el.style.display == 'none') ? 'block' : 'none'; //damos un atributo display:none que oculta el div
//     }
//   }
//   window.onload = function(){/*hace que se cargue la función lo que predetermina que div estará oculto hasta llamar a la función nuevamente*/
//     muestra_oculta('crear_producto');/* "contenido_a_mostrar" es el nombre que le dimos al DIV */
//   }

$(function(){
  var windowHeight = $(window).height();
  var barraAltura = $('.barra').innerHeight();
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
