<?php
  require ('../conexion/conexion.php');

  $db = conectar();

  if (isset($_POST['usuario']) && isset($_POST['clave'])){
    $usuario = $_POST['usuario'];
    $clave = $_POST['clave'];

    $resultado = $db->query("select clave, usuario from inicio_session where usuario='$usuario'");
     if ($resultado){
      if($fila = mysqli_fetch_assoc($resultado)){
        if ($fila['clave'] == $clave){
          echo '[OK];'.$fila['usuario'].';../menu/index.html';
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
