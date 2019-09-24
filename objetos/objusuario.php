<?php
class Usuario
{
  private $id;
  private $id_ciudad;
  private $cedula;
  private $nombres;
  private $apellidos;
  private $fecha_nacimiento;
  private $direccion;
  private $correo;
  private $celular;
  private $genero;
  private $clave;
  private $estado;

  function __construct()
  {

  }

  public function getId()
  {
    return $this->id;
  }

  public function setId($id)
  {
    $this->id = $id;
  }

  public function getId_ciudad()
  {
    return $this->id_ciudad;
  }

  public function setId_ciudad($id_ciudad)
  {
    $this->id_ciudad = $id_ciudad;
  }

  public function getCedula()
  {
    return $this->cedula;
  }

  public function setCedula($cedula)
  {
    $this->cedula = $cedula;
  }

  public function getNombres()
  {
    return $this->nombres;
  }

  public function setNombres($nombres)
  {
    $this->nombres = $nombres;
  }

  public function getApellidos()
  {
    return $this->apellidos;
  }

  public function setApellidos($apellidos)
  {
    $this->apellidos = $apellidos;
  }

  public function getFecha_nacimiento()
  {
    return $this->fecha_nacimiento;
  }

  public function setFecha_nacimiento($fecha_nacimiento)
  {
    $this->fecha_nacimiento = $fecha_nacimiento;
  }

  public function getDireccion()
  {
    return $this->direccion;
  }

  public function setDireccion($direccion)
  {
    $this->direccion = $direccion;
  }

  public function getCorreo()
  {
    return $this->correo;
  }

  public function setCorreo($correo)
  {
    $this->correo = $correo;
  }

  public function getCelular()
  {
    return $this->celular;
  }

  public function setCelular($celular)
  {
    $this->celular = $celular;
  }

  public function getGenero()
  {
    return $this->genero;
  }

  public function setGenero($genero)
  {
    $this->genero = $genero;
  }

  public function getClave()
  {
    return $this->clave;
  }

  public function setClave($clave)
  {
    $this->clave = $clave;
  }

  public function getEstado()
  {
    return $this->estado;
  }

  public function setEstado($estado)
  {
    $this->estado = $estado;
  }

}
?>
