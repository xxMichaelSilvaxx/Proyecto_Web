<?php
  include_once ('../conexion/conexion.php');

  $conectar = new Conexion;

  if (isset($_POST['correo']) && isset($_POST['clave'])){
    $correo = $_POST['correo'];
    $clave = $_POST['clave'];
    $query = "select correo, clave from usuario where correo='$correo'";

    $resultado = $conectar->call_query($query);
     if ($resultado){
      if($fila = mysqli_fetch_assoc($resultado)){
        if ($fila['clave'] == $clave){
          echo '[OK];'.$fila['correo'].';../menu/principal.html';
        } else{
          echo '[ERROR] Contraseña incorrecta.';
        }
      }else{
     		echo "[ERROR] Usuario no existe.";
    	}
  	}
   $conectar->conectar()->close();
  }
?>
