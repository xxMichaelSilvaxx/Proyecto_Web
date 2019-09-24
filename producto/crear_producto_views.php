<script type="text/javascript">
	$(document).ready(function(){
		$('#id_marca').val();
		recargarLista();

		$('#id_marca').change(function(){
			recargarLista();
		});
	})
</script>
<script type="text/javascript">
	function recargarLista(){
		$.ajax({
			type:"POST",
			url:"select.php",
			data:"id_marca=" + $('#id_marca').val(),
			success:function(r){
				$('#id_modelo').html(r);
			}
		});
	}
</script>

<div class="row d-flex justify-content-center">
  <div class="row">
    <div class="col-15">
      <form id="formulario" action="" method="POST" enctype="multipart/form-data">
        <section id="crear_producto" class="form-row">
          <div class="form-group col-6">
            <label for="codigo">Codigo:</label>
            <input type="text" id="codigo" name="codigo" placeholder="codigo" class="form-control">
          </div>
          <div class="form-group col-6">
            <label for="color">Color:</label>
            <input type="text" id="color" name="color" placeholder="color" class="form-control">
          </div>
        </section>
        <section class="form-row">
        <div class="form-group col-10">
          <label for="nombre">Nombre:</label>
          <input type="text" id="nombre" name="nombre" placeholder="nombre" class="form-control">
        </div>
				<div class="form-group col-2">
					<label for="precio">Precio:</label>
					<input type="text" id="precio" name="precio" placeholder="0.0" class="form-control">
				</div>
        </section>
        <section class="form-row">
          <div class="form-group col-5">
            <label for="id_marca">Marca:</label>
            <select id="id_marca" name="id_marca">
              <option value="0">Seleccione</option>
              <?php
              include('../includes/includes.php');
              $obj      = new Producto;
              $conectar = new Conexion;
              $query1     = "select id, nombre from marca where estado = '1'";
              $resultado1  = $conectar->call_query($query1);
              while ($row = mysqli_fetch_assoc($resultado1)) {
              $guardar .= "<option id='id_marca' value='".$row['id']."'>" ;
              $guardar .= $row['nombre'];
              $guardar .= "</option>" ;
              }
              echo $guardar;
              ?>
             </select>
           </div>
           <div class="form-group col-5">
             <label for="id_modelo">Modelo:</label>
             <select id="id_modelo" name="id_modelo">
             </select>
          </div>
       </section>
       <section class="form-row">
          <div class="form-group col-12">
             <label for="descripcion">Descripcion:</label>
             <textarea id="descripcion" class="form-control" name="descripcion" placeholder="descripcion" minlength="50" maxlength="300" ></textarea>
           </div>
       </section>
       <section class="form-row">
         <div class="form-group col-12">
           <label for="archivo">Imagen:</label>
           <input id="archivo" type="file" name="archivo" accept="image/*" class="form-control">
         </div>
       </section>
       <section class="form-row">
         <div class="form-group col-12">
          <button type="submit" id="grabar" value="grabar" class="btn btn-primary btn-block" onmousedown="Guardar('grabar', 'formulario', 'final')">Grabar</button>
         </div>
         <div class="form-group col-12">
            <button type="reset" class="btn btn-block">Cancelar</button>
         </div>
       </section>
     </form>
     </div>
  </div>
</div>
<div class="text-center" id="final">

</div>
