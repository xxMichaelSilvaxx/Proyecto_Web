<?php
  include ('../includes/includes.php');

  $obj = new Producto;
  $conectar = new Conexion;

  $query = "select id, id_modelo, imagen, nombre, descripcion, color from producto where estado = '1'";
  $resultado = $conectar->call_query($query);

  $mostrar =
  "
  <section>
    <nav id='consultar' class='consultar'>
      <table>
        ";
        while ($row = mysqli_fetch_assoc($resultado)) {
          $mostrar .= "<tr>";
          $mostrar .= "<td rowspan=3>";
          $var = is_file($row['imagen']);
          if ($var == true) {
            $mostrar .= "<img class='img_producto' src='".$row['imagen']."'alt='".$row['nombre']."'title='".$row['id']."'>";
          }else{
            $mostrar .= "<img class='img_producto' src='../img/error.png' alt='".$row['nombre']."'title='".$row['id']."'>";
          }
          $mostrar .= "</img>";
          $mostrar .= "</td>";
          $mostrar .= "<td>Nombre: ".$row['nombre']."</td>";
          $mostrar .= "<td>Precio: </td>";
          $mostrar .= "</tr>";
          $mostrar .= "<tr>";
          $mostrar .= "<td colspan=2 class='td_producto'>Color: ".$row['color'];
          $mostrar .= "</tr>";
          $mostrar .= "<tr>";
          $mostrar .= "<td colspan=2 class='td_producto'>Descripcion:".$row['descripcion'];
          $mostrar .= "</tr>";
        }
      $mostrar .= "</table></nav></section>";

  echo $mostrar;
?>
