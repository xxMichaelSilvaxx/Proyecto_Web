<?php
  include ('../includes/includes.php');

  $obj = new Producto;
  $conectar = new Conexion;

  $obj->setId($_POST['id']);
  $obj->setId_modelo($_POST['id_modelo']);
  $obj->setImagen($_POST['archivo']);
  $obj->setNombre($_POST['nombre']);
  $obj->setPrecio($_POST['precio']);
  $obj->setCodigo($_POST['codigo']);
  $obj->setDescripcion($_POST['descripcion']);
  $obj->setColor($_POST['color']);

  // $sa = $_POST['archivo'];



  $query = "";
  $mensaje = "";

  $ubicacion='/proyectos/RETO/Proyecto_Web/img/';
  $ruta = $_SERVER['DOCUMENT_ROOT'];

  // function Img($ubicacion, $ruta)
  // {
    // if(isset($_FILES['archivo']) && $_FILES['archivo']['name'][0]){
    //   for($i=0;$i<count($_FILES['archivo']['name']);$i++){
    //     if($_FILES['archivo']['type'][$i]=='image/jpeg' || $_FILES['archivo']['type'][$i]=='image/pjpeg'
    //     || $_FILES['archivo']['type'][$i]=='image/gif' || $_FILES['archivo']['type'][$i]=='image/png'){
    //       if(file_exists($ruta . $ubicacion) || @mkdir($ruta . $ubicacion)){
    //         $origen=$_FILES['archivo']['tmp_name'][$i];
    //         $destino=$ruta . $ubicacion.$_FILES['archivo']['name'][$i];
    //         if(@move_uploaded_file($origen, $destino)){
    //           $mensaje .= "Correcto";
    //         }
    //       }
    //     }
    //   }
    // }
    // return $img;
  // }


  function Img($ubicacion, $ruta)
  {
    if(isset($_FILES['archivo']) && $_FILES['archivo']['name'][0]){
      for($i=0;$i<count($_FILES['archivo']['name']);$i++){
        if($_FILES['archivo']['type'][$i]=='image/jpeg' || $_FILES['archivo']['type'][$i]=='image/pjpeg'
        || $_FILES['archivo']['type'][$i]=='image/gif' || $_FILES['archivo']['type'][$i]=='image/png'){
          if(file_exists($ruta . $ubicacion) || @mkdir($ruta . $ubicacion)){
            $origen=$_FILES['archivo']['tmp_name'][$i];
            $destino=$ruta . $ubicacion.$_FILES['archivo']['name'][$i];
            if(@move_uploaded_file($origen, $destino)){
              $mensaje = "Correcto";
            }
          }
        }
      }
    }
    return $img;
  }

  if($_POST['acciones']){
    if($_POST['acciones'] == "grabar"){
       $query = "insert into producto (id_modelo, imagen, codigo, nombre, descripcion, color, precio, estado)
        values ('" . $obj->getId_modelo() . "','" . $obj->getImagen() . "','" . $obj->getCodigo() . "'
        ,'" . $obj->getNombre() . "','" . $obj->getDescripcion() . "','" . $obj->getColor() . "','" . $obj->getPrecio() . "', '1')";

        if ($conectar->call_query($query)) {
          $mensaje .= "Datos Ingresados";
        }else{
          $mensaje .= "Datos Invalidos";
        }
    }

    if($_POST['acciones'] == "eliminar"){
       $query = "update producto set estado = 0 where id =" . $obj->getId();
        if ($conectar->call_query($query)) {
          $mensaje = "Datos Actualizados";
        }else{
          $mensaje = "Datos Invalidos";
        }
    }

    if($_POST['acciones'] == "actualizar"){
          $query = "update producto set id_modelo ='" . $obj->getId_modelo() . "',imagen ='" . $obj->getImagen() . "'
          , codigo ='" . $obj->getCodigo() . "', nombre ='" . $obj->getNombre() . "', descripcion ='" . $obj->getDescripcion() . "'
          , color ='" . $obj->getColor() . "', precio ='".$obj->getPrecio()."',estado = '1' where id =" . $obj->getId();
          if ($conectar->call_query($query)) {
            $mensaje = "Datos Actualizados";
          }else{
            $mensaje = "Datos Invalidos";
          }
        }

  }

  echo $mensaje;
?>
