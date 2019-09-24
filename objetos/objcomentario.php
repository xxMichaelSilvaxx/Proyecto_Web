<?php
  class Comentarios
  {
    private $id;
    private $comentario;
    private $valoracion;
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

    public function getComentario()
    {
      return $this->comentario;
    }

    public function setComentario($comentario)
    {
      $this->comentario = $comentario;
    }

    public function getValoracion()
    {
      return $this->valoracion;
    }

    public function setValoracion($valoracion)
    {
      $this->valoracion = $valoracion;
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
