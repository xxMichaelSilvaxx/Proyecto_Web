<?php
$carpetaDestino='img/';

  if(isset($_FILES['archivo']) && $_FILES['archivo']['name'][0]){
    for($i=0;$i<count($_FILES['archivo']['name']);$i++){
      if($_FILES['archivo']['type'][$i]=='image/jpeg' || $_FILES['archivo']['type'][$i]=='image/pjpeg'
      || $_FILES['archivo']['type'][$i]=='image/gif' || $_FILES['archivo']['type'][$i]=='image/png'){
        if(file_exists($carpetaDestino) || @mkdir($carpetaDestino)){
          $origen=$_FILES['archivo']['tmp_name'][$i];
          $destino=$carpetaDestino.$_FILES['archivo']['name'][$i];
          if(@move_uploaded_file($origen, $destino)){
            // echo '<br>'.$_FILES['archivo']['name'][$i].' movido correctamente';
            var_dump(__FILE__.$carpetaDestino.$_FILES['archivo']['name'][$i]);
          }else{
            echo '<br>No se ha podido mover el archivo: '.$_FILES['archivo']['name'][$i];
          }
        }else{
          echo '<br>No se ha podido crear la carpeta: '.$carpetaDestino;
        }
      }else{
        echo '<br>'.$_FILES['archivo']['name'][$i].' - NO es imagen jpg, png o gif';
      }
    }
}
?>
