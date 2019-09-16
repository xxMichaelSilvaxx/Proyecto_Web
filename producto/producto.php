<?php
   include_once ('../conexion/conexion.php');
   include_once ('../objetos/objproducto.php');

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

   $crear =
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
     </nav>
   </section>
   ";

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


   function LLenarSelect(){
      $query = "select id, modelo from modelo where estado = '1'";
      $resultado = $conectar->call_query($query);
      return $resultado;
    }

    function img($archivo){
        if(isset($_FILES['archivo']) && $_FILES['archivo']['name'][0]){
          for($i=0;$i<count($_FILES['archivo']['name']);$i++){
            if($_FILES['archivo']['type'][$i]=='image/jpeg' || $_FILES['archivo']['type'][$i]=='image/pjpeg'
            || $_FILES['archivo']['type'][$i]=='image/gif' || $_FILES['archivo']['type'][$i]=='image/png'){
              if(file_exists($carpetaDestino) || @mkdir($carpetaDestino)){
                $origen=$_FILES['archivo']['tmp_name'][$i];
                $destino=$carpetaDestino.$_FILES['archivo']['name'][$i];
                if(@move_uploaded_file($origen, $destino)){
                  $mensaje = '<br>'.$_FILES['archivo']['name'][$i].' movido correctamente';
                }else{
                  $mensaje = '<br>No se ha podido mover el archivo: '.$_FILES['archivo']['name'][$i];
                }
              }else{
                $mensaje = '<br>No se ha podido crear la carpeta: '.$carpetaDestino;
              }
            }else{
              $mensaje = '<br>'.$_FILES['archivo']['name'][$i].' - NO es imagen jpg, png o gif';
            }
          }
      }
      return $mensaje;
    }

   if ($opcion = "crear"){
      $mostrar = $crear;
   }
   if ($opcion = "actualizar"){
      $mostrar = $actualizar;
   }
   if ($opcion = "eliminar"){
      $mostrar = "eliminar";
   }

   echo $mostrar;

?>
