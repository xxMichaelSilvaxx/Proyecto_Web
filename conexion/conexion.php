<?php
  function conectar(){
      $usuario = "root";
      $contrasena = "proyecto";
      $servidor = "localhost";
      $base = "DB_RETO";

      $conexion = mysqli_connect($servidor, $usuario, $contrasena, $base) or die ("SIN CONEXION");

      return $conexion;
    }
?>
