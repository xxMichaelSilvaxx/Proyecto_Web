<?php
include ('../objetos/objproducto.php');

$obj = new Producto;

$var = "hola";

$obj -> setNombre($var);
$re = $obj-> getNombre();

echo $re;
 ?>
