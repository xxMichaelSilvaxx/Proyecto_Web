<?php
  include ('../includes/includes.php');

  $obj = new Producto;
  $conectar = new Conexion;

  $query = "select id, modelo from modelo where estado = '1'";
  $resultado = $conectar->call_query($query);

   $guardar ="
    <form id='formulario' action='../producto/producto_data.php' method='post' enctype='multipart/form-data'>
      <section id='crear_producto'>
       <nav id='guardar'>
         <label>Codigo:</label>
         <input type='text' id='codigo' name='codigo' placeholder='codigo' required>
         <br />
         <label>Nombre:</label>
         <input type='text' id='nombre' name='nombre' placeholder='nombre' required>
         <br />
         <label>Modelo:</label>
         <select id='id_modelo' name='id_modelo'>
         <option value='0'>Seleccione</option>
         ";
         while ($row = mysqli_fetch_assoc($resultado)) {
           $guardar .= "<option id='id_modelo' value='".$row['id']."'>";
           $guardar .= $row['modelo'];
           $guardar .= "</option>";
         }

         $guardar .= "</select>
         <br />
         <label>Descripcion:</label>
         <textarea id='descripcion' class='descripcion' name='descripcion' placeholder='descripcion' minlength='50' maxlength='300'></textarea>
         <br />
         <label>Color:</label>
         <input type='text' id='color' name='color' placeholder='color' required>
         <br />
         <input type='file' name='archivo[]'>
         <br />
         <button type='submit' name='grabar' value='grabar'>Grabar</button>
         <button type='reset' >Cancelar</button>
       </nav>
     </section>
   </form>";

   echo $guardar;
 ?>
