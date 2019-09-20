<?php
  include ('../includes/includes.php');

  $obj = new Producto;
  $conectar = new Conexion;

  $query = "select id, id_modelo, imagen, nombre, descripcion, color from producto where estado = '1'";
  $resultado = $conectar->call_query($query);

  $mostrar =
  "
  <section>
    <nav id='consultar'>
      <table>
        ";
        while ($row = mysqli_fetch_assoc($resultado)) {
          $mostrar .= "<tr>";
          $mostrar .= "<td rowspan=3>";
          $mostrar .= "<img style='height:140px; width:180px' src='".$row['imagen'];
          $mostrar .= "'</img>";
          $mostrar .= "</td>";
          $mostrar .= "<td>".$row['nombre']."precio:";
          $mostrar .= "<td rowspan=3><button>Agregar al carro</button></td>";
          $mostrar .= "</td>";
          $mostrar .= "</tr>";
          $mostrar .= "<tr>";
          $mostrar .= "<td>".$row['color'];
          $mostrar .= "</tr>";
          $mostrar .= "<tr>";
          $mostrar .= "<td>".$row['descripcion'];
          $mostrar .= "</tr>";
        }
      $mostrar .= "</table></nav></section>";

  echo $mostrar;
?>

<section>
  <nav>
    <button id="crear" onmousedown="cargar('crear', '../producto/crear_producto_views.php' , 'nav');">Crear</button>
    <button id="actualizar" onmousedown="cargar('actualizar', '../producto/actualizar_producto_views.php' , 'nav');">Actualizar</button>
    <button id="eliminar" onmousedown="cargar('eliminar', '../producto/eliminar_producto_views.php' , 'nav');">Eliminar</button>
    <br />
  </nav>
  <nav id="nav">
  </nav>
</section>
