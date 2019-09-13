<?php
class Conexion{

  // private $usuario = "root";
  // private $contrasena = "proyecto";
  // private $servidor = "localhost";
  // private $base = "DB_RETO";

  private $conexion;

  public function conectar(){
    $usuario = "root";
    $contrasena = "proyecto";
    $servidor = "localhost";
    $base = "DB_RETO";
    $conexion = mysqli_connect($servidor, $usuario, $contrasena, $base) or die ("SIN CONEXION");
    return $conexion;
  }

  public function desconectar(){
      if($this->conectar->conexion){
        mysqli_close($this->$conexion);
      }
  }
}
?>
