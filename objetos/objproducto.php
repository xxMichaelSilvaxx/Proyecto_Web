<?php
class Producto
{
  private $id;
  private $id_modelo;
  private $imagen;
  private $codigo;
  public $nombre;
  private $descripcion;
  private $color;
  private $precio;
  private $estado;

  public function __construct()
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

  public function getId_modelo()
  {
    return $this->id_modelo;
  }

  public function setId_modelo($id_modelo)
  {
    $this->id_modelo = $id_modelo;
  }

  public function getImagen()
  {
    return $this->imagen;
  }

  public function setImagen($imagen)
  {
    $this->imagen = $imagen;
  }

  public function getCodigo()
  {
    return $this->codigo;
  }

  public function setCodigo($codigo)
  {
    $this->codigo = $codigo;
  }

  public function getNombre()
  {
    return $this->nombre;
  }

  public function setNombre($nombre)
  {
    $this->nombre = $nombre;
  }

  public function getDescripcion()
  {
    return $this->descripcion;
  }

  public function setDescripcion($descripcion)
  {
    $this->descripcion = $descripcion;
  }

  public function getColor()
  {
    return $this->color;
  }

  public function setColor($color)
  {
    $this->color = $color;
  }

  public function getPrecio()
  {
    return $this->precio;
  }

  public function setPrecio($precio)
  {
    $this->precio = $precio;
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
