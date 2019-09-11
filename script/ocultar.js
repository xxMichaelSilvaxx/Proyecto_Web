function ocultar(id){
  if (document.getElementById){
      var page = document.getElementById(id);
      page.style.display = (page.style.display == 'none') ? 'block' : 'none';
    }
  }
  window.onload = function(){
  ocultar('contenido');
}
