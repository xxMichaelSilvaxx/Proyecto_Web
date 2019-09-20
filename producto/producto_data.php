<?php
  include ('../includes/includes.php');

  $obj = new Producto;
  $conectar = new Conexion;

  $obj->setId($_POST['id']);
  $obj->setId_modelo($_POST['id_modelo']);
  $obj->setNombre($_POST['nombre']);
  $obj->setCodigo($_POST['codigo']);
  $obj->setDescripcion($_POST['descripcion']);
  $obj->setColor($_POST['color']);

  $mensaje = "";

  $ubicacion='/proyectos/RETO/Proyecto_Web/img/';
  $ruta = $_SERVER['DOCUMENT_ROOT'];

  if($_POST['grabar']){
    if(isset($_FILES['archivo']) && $_FILES['archivo']['name'][0]){
      for($i=0;$i<count($_FILES['archivo']['name']);$i++){
        if($_FILES['archivo']['type'][$i]=='image/jpeg' || $_FILES['archivo']['type'][$i]=='image/pjpeg'
        || $_FILES['archivo']['type'][$i]=='image/gif' || $_FILES['archivo']['type'][$i]=='image/png'){
          if(file_exists($ruta . $ubicacion) || @mkdir($ruta . $ubicacion)){
            $origen=$_FILES['archivo']['tmp_name'][$i];
            $destino=$ruta . $ubicacion.$_FILES['archivo']['name'][$i];
            if(@move_uploaded_file($origen, $destino)){
              $mensaje = '<br>'.$_FILES['archivo']['name'][$i].' movido correctamente';
              $prueba = "../img/".$_FILES['archivo']['name'][$i];
              $obj->setImagen($prueba);
              $query = "call ps_insert_producto(
                '".$obj->getId_modelo()."',
                '".$obj->getImagen()."',
                '".$obj->getCodigo()."',
                '".$obj->getNombre()."',
                '".$obj->getDescripcion()."',
                '".$obj->getColor()."')";
              if($conectar->call_query($query)){
                $mensaje = "datos guardados correctamente";
              }
            }else{
              $mensaje = '<br>No se ha podido mover el archivo: '.$_FILES['archivo']['name'][$i];
            }
          }else{
            $mensaje = '<br>No se ha podido crear la carpeta: '.$ubicacion;
          }
        }else{
          $mensaje = '<br>'.$_FILES['archivo']['name'][$i].' - NO es imagen jpg, png o gif';
        }
      }
    }
  }

  if($_POST['actualizar']){
    echo 'hola';
  }

  echo $mensaje;
?>
