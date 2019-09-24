<?php
include('../includes/includes.php');
$conectar = new Conexion;

$query2     = "select id, modelo from modelo where estado = '1' and id_marca =".$_POST['id_marca'];
$resultado2  = $conectar->call_query($query2);

while ($row = mysqli_fetch_assoc($resultado2)) {
$guardar .= "<option id='id_modelo' value='".$row['id']."'>" ;
$guardar .= $row['modelo'];
$guardar .= "</option>" ;
}
echo $guardar;
?>
