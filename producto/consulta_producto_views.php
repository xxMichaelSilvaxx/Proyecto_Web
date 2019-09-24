<?php  require ("../menu/header.php")?>

<nav class="row d-flex justify-content-center mt-3  mb-5">
  <button id="crear" onmousedown="cargar('crear', '../producto/crear_producto_views.php' , 'nav');">Crear</button>
  <button id="actualizar" onmousedown="cargar('actualizar', '../producto/actualizar_producto_views.php' , 'nav');">Actualizar</button>
  <button id="eliminar" onmousedown="cargar('eliminar', '../producto/eliminar_producto_views.php' , 'nav');">Eliminar</button>
</nav>
<nav id="nav" class="mt-3  mb-5">
</nav>

<?php
  include ('../includes/includes.php');

  $obj = new Producto;
  $conectar = new Conexion;


  $query = "select id, imagen, codigo, nombre,
            descripcion, precio, color from producto
            where estado = '1'";

  $resultado = $conectar->call_query($query);

  $mostrar =
  "
  <section class='mt-3  mb-5'>
    <nav id='consultar' class='row justify-content-center'>
      <table class='tabla_productos'>
        ";
        while ($row = mysqli_fetch_assoc($resultado)) {
          $mostrar .= "<tr>";
          $mostrar .= "<td rowspan=3>";
          $var = is_file($row['imagen']);
          if ($var == true) {
              $mostrar .= "<img width='400' height='200' class='img_producto' src='".$row['imagen']."'alt='".$row['nombre']."' title='".$row['id']."'>";
          }else{
            $mostrar .= "<img width='400' height='200' class='img_producto' src='../util/error.png' alt='".$row['nombre']."'title='".$row['id']."'>";
          }
          $mostrar .= "</img>";
          $mostrar .= "</td>";
          $mostrar .= "<td>Nombre: ".$row['nombre']."</td>";
          $mostrar .= "<td>Precio: ".$row['precio']."</td>";
          $mostrar .= "</tr>";
          $mostrar .= "<tr>";
          $mostrar .= "<td colspan=2>Color: ".$row['color'];
          $mostrar .= "</tr>";
          $mostrar .= "<tr>";
          $mostrar .= "<td colspan=2>Descripcion:".$row['descripcion'];
          $mostrar .= "</tr>";
        }
      $mostrar .= "</table></nav></section>";

  echo $mostrar;
?>

<?php  require ("../menu/footer.php")?>

<!-- $query = "select modelo.modelo, marca.nombre, producto.imagen, producto.codigo, producto.nombre,
          producto.descripcion, producto.color,
          talla.numero, stock.cantidad from producto
          inner join stock on stock.id_producto = producto.id
          inner join modelo on modelo.id = producto.id_modelo
          inner join marca on marca.id = modelo.id_marca
          inner join talla on talla.id = stock.id_talla where producto.estado = '1'"; -->
