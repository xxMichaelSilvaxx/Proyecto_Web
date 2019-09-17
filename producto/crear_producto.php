<?php
  include ('../includes/includes.php');

  $obj = new Producto;
  $conectar = new Conexion;

  $query = "select id, modelo from modelo where estado = '1'";
  $resultado = $conectar->call_query($query);

   $crear ="<section>
     <nav id='guardar'>
       <label>Codigo:</label>
       <input type='text' id='codigo' placeholder='codigo' required>
       <br />
       <label>Nombre:</label>
       <input type='text' id='nombre' placeholder='nombre' required>
       <br />
       <label>Modelo:</label>
       <select id='modelo'>
       <option value='0'>Seleccione</option>
       ";
       while ($row = mysqli_fetch_assoc($resultado)) {
         $crear .= "<option value='".$row['id']."'>";
         $crear .= $row['modelo'];
         $crear .= "</option>";
       }

       $crear .= "</select>
       <br />
       <label>Descripcion:</label>
       <input type='textarea' id='descripcion' placeholder='descripcion'>
       <br />
       <label>Color:</label>
       <input type='text' id='color' placeholder='color' required>
       <button>Guardar</button>
     </nav>
   </section>";

   echo $crear;
 ?>
