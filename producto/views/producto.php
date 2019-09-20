<?php
  include ('../includes/includes.php');

  $objproducto = new Producto;
  $conectar = new Conexion;
  $query;
  $resultado;
  $mostrar;
  $mensaje;
  $crear;
  $actualizar;
  $eliminar;
  $carpetaDestino='img/';

    function crear_producto(){
      $query = "call ps_insert_producto(?, ?, ?, ?, ?, ?)";
      $resultado = $conectar->call_query($query);
      $resultado->bindParam(1, $objproducto-> getId_modelo(), PDO::PARAM_INT);
      $resultado->bindParam(2, $objproducto->getImagen(), PDO::PARAM_STR);
      $resultado->bindParam(3, $objproducto->getCodigo(), PDO::PARAM_STR);
      $resultado->bindParam(4, $objproducto->getNombre(), PDO::PARAM_STR);
      $resultado->bindParam(5, $objproducto->getDescripcion(), PDO::PARAM_STR);
      $resultado->bindParam(6, $objproducto->getColor(), PDO::PARAM_STR);
      $resultado->execute();
      return $resultado;
    }


   $actualizar =
   "
   <section>
     <nav id='guardar'>
       <label>Codigo:</label>
       <input type='text' id='codigo' placeholder='codigo' required>
       <br />
       <label>Nombre:</label>
       <input type='text' id='nombre' placeholder='nombre' required>
       <br />
       <label>Modelo:</label>
       <select id='modelo'>
       </select>
       <br />
       <label>Descripcion:</label>
       <input type='textarea' id='descripcion' placeholder='descripcion'>
       <br />
       <label>Color:</label>
       <input type='text' id='color' placeholder='color' required>
       <button>Eliminar</button>
     </nav>
   </section>
   ";


  $opcion = $_POST['crear'];
   if ($opcion = "crear"){
      $mostrar = $crear;
   }
   if ($opcion = "actualizar"){
      $mostrar = $actualizar;
   }
   if ($opcion = "eliminar"){
      $mostrar = "eliminar";
   }

   echo $actualizar;

?>
