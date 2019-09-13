<?php
class Conexion{

  private $usuario;
  private $contrasena;
  private $servidor;
  private $base;

  protected $conexion;

  public function conectar(){
    $usuario = "root";
    $contrasena = "Admin123*";
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

  public function call_query($query){
    return $this->conectar()->query($query);
  }
  
}
?>
