<?php
  require ('../conexion/conexion.php');

  $db = conectar();

  if (isset($_POST['correo']) && isset($_POST['clave'])){
    $correo = $_POST['correo'];
    $clave = $_POST['clave'];

    $resultado = $db->query("select correo, clave from usuario where correo='$correo'");
     if ($resultado){
      if($fila = mysqli_fetch_assoc($resultado)){
        if ($fila['clave'] == $clave){
          echo '[OK];'.$fila['correo'].';../menu/index.php';
        } else{
          echo '[ERROR] Contraseña incorrecta.';
        }
      }else{
     		echo "[ERROR] Usuario no existe.";
    	}
  	}
   $db->close();
  }
?>
