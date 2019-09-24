// function muestra_oculta(id){
//   if (document.getElementById){ //se obtiene el id
//       var el = document.getElementById(id); //se define la variable "el" igual a nuestro div
//       el.style.display = (el.style.display == 'none') ? 'block' : 'none'; //damos un atributo display:none que oculta el div
//     }
//   }
//   window.onload = function(){/*hace que se cargue la función lo que predetermina que div estará oculto hasta llamar a la función nuevamente*/
//     muestra_oculta('crear_producto');/* "contenido_a_mostrar" es el nombre que le dimos al DIV */
//   }

// $(function(){
//   var windowHeight = $(window).height();
//   var barraAltura = $('.barra').innerHeight();
//   $(window).scroll(function(){
//       var scroll = $(window).scrollTop();
//       if (scroll > windowHeight){
//           $('.barra').addClass('fixed');
//           $('body').css({'margin-top': barraAltura+'px'});
//       }else{
//           $('.barra').removeClass('fixed');
//           $('body').css({'margin-top': '0px'});
//       }
//   });
// });

function Guardar(boton, formulario, final){
  $(document).ready(function() {
    $('#' + boton).on('click', function(e){
      e.preventDefault();

       var id_modelo = $('#id_modelo').val();
       var archivo = $('#archivo').val().replace("C:\\fakepath\\", "../img/");
       var codigo = $('#codigo').val();
       var nombre = $('#nombre').val();
       var precio = $('#precio').val();
       var descripcion = $('#descripcion').val();
       var color = $('#color').val();
       console.log("jadshfkjd");
       $.ajax({
         method: "POST",
         url: "../producto/producto_data.php",
         data: {
           'acciones':"grabar",
           'id_modelo':id_modelo,
           'archivo':archivo,
           'codigo':codigo,
           'nombre':nombre,
           'precio':precio,
           'descripcion':descripcion,
           'color':color
       },
       success: function(result){
         $('#' + final).html(result);
      }
       }).done(function(msg){
         $('#' + formulario)[0].reset();
         console.log(msg);
       });
    });
  });
}

function Desabilitar(boton, formulario, final){
  $(document).ready(function() {
    $('#' + boton).on('click', function(e){
      e.preventDefault();

       var id = $('#id').val();
       $.ajax({
         method: "POST",
         url: "../producto/producto_data.php",
         data: {
           'acciones':"eliminar",
           'id':id
       },
       success: function(result){
         $('#' + final).html(result);
      }
       }).done(function(msg){
         $('#' + formulario)[0].reset();
         console.log(msg);
       });
    });
  });
}

function Actualizar(boton, formulario, final){
  $(document).ready(function() {
    $('#' + boton).on('click', function(e){
      e.preventDefault();

       var id = $('#id').val();
       var id_modelo = $('#id_modelo').val();
       var archivo = $('#archivo').val().replace("C:\\fakepath\\", "../img/");
       var codigo = $('#codigo').val();
       var nombre = $('#nombre').val();
       var precio = $('#precio').val();
       var descripcion = $('#descripcion').val();
       var color = $('#color').val();

       console.log("jajajaj" + precio);
      //  $.ajax({
      //    method: "POST",
      //    url: "../producto/producto_data.php",
      //    data: {
      //      'acciones':"actualizar",
      //      'id':id,
      //      'id_modelo':id_modelo,
      //      'archivo':archivo,
      //      'codigo':codigo,
      //      'nombre':nombre,
      //      'precio':precio,
      //      'descripcion':descripcion,
      //      'color':color
      //  },
      //  success: function(result){
      //    $('#' + final).html(result);
      // }
      //  }).done(function(msg){
      //    $('#' + formulario)[0].reset();
      //    console.log(msg);
      //  });
    });
  });
}
