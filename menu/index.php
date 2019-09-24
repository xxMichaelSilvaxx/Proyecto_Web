  <?php  require ("header.php")?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistema Web de Pedidos</title>
  </head>
  <body>

    <br/>
    <div class="container-fluid">
      <div class="row d-flex justify-content-center">
        <div class="col-4">
          <h1 class="text-center">
            Bienvenido a la paguina web "Zapateria Menoscal"
          </h1>
          <img src="../util/principal.jpeg" alt="" class="img-fluid"></img>
        </div>
      </div>
    </div>

    <br/>
    <br/>
    <div class="container">
		  <div class="row-fluid">

			<div class="col-md-12">
			<h2><span class="glyphicon glyphicon-edit"></span>Generar Pedido</h2>
			<hr>
			<form class="form-horizontal" role="form" id="datos_pedido">
				<div class="row">

				  <div class="col-md-3">
				  <label for="codigo" class="control-label">Codigo</label>
					 <input type="text" class="form-control input-sm" id="codigo" placeholder="Codigo">
				  </div>

          <div class="col-md-3">
				  <label for="proveedor" class="control-label">Proveedor</label>
            <?php
            require_once ("../config/db.php");
          	require_once ("../config/conexion.php");

            $query = "select id, nombre from empresa where estado = 1";
            $resultado = $con->query($query);
            while ($row = mysqli_fetch_assoc($resultado)){
              $mostrar = "<select class='proveedor form-control' name='id_empresa' id='id_empresa' required>";
              $mostrar .= "<option  value='".$row['id']."'>".$row['nombre']."</option>";
   					  $mostrar .= "</select>";
              echo $mostrar;
            }
            ?>
				  </div>

					<div class="col-md-6">
						<label for="comentarios" class="control-label">Comentarios</label>
						<input type="text" class="form-control input-sm" id="comentarios" placeholder="Comentarios o instruciones especiales">
					</div>

				</div>


				<hr>
				<div class="col-md-12">
					<div class="pull-right">
						<button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">
						 <span class="glyphicon glyphicon-plus"></span> Agregar productos
						</button>
						<button type="submit" class="btn btn-default">
						  <span class="glyphicon glyphicon-print"></span> Generar Orden
						</button>
					</div>
				</div>
			</form>
			<br><br>
		<div id="resultados" class='col-md-12'></div><!-- Carga los datos ajax -->

			<!-- Modal -->
			<div class="modal fade bs-example-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			  <div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
				  <div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel"></h4>
				  </div>
				  <div class="modal-body">
					<form class="form-horizontal">
					  <div class="form-group">
						<div class="col-sm-6">
						  <input type="text" class="form-control" id="q" placeholder="Buscar productos" onkeyup="load(1)">
						</div>
						<button type="button" class="btn btn-default" onclick="load(1)"><span class='glyphicon glyphicon-search'></span> Buscar</button>
					  </div>
					</form>
					<div id="loader" style="position: absolute;	text-align: center;	top: 55px;	width: 100%;display:none;"></div><!-- Carga gif animado -->
					<div class="outer_div" ></div><!-- Datos ajax Final -->
				  </div>
				  <div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
				  </div>
				</div>
			  </div>
			</div>

			</div>
		 </div>
	</div>

   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
	<script type="text/javascript" src="js/VentanaCentrada.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/js/select2.min.js"></script>
	<script>
		$(document).ready(function(){
			load(1);
		});

		function load(page){
			var q= $("#q").val();
			var parametros={"action":"ajax","page":page,"q":q};
			$("#loader").fadeIn('slow');
			$.ajax({
				url:'../ajax/productos_pedido.php',
				data: parametros,
				//  beforeSend: function(objeto){
				//  $('#loader').html('<img src="./img/ajax-loader.gif"> Cargando...');
			  // },
				success:function(data){
					$(".outer_div").html(data).fadeIn('slow');
					$('#loader').html('');

				}
			})
		}
	</script>

	<script>
	function agregar (id)
		{
			var precio_venta=$('#precio_venta_'+id).val();
			var cantidad=$('#cantidad_'+id).val();
			//Inicia validacion
			if (isNaN(cantidad))
			{
			alert('Esto no es un numero');
			document.getElementById('cantidad_'+id).focus();
			return false;
			}
			if (isNaN(precio_venta))
			{
			alert('Esto no es un numero');
			document.getElementById('precio_venta_'+id).focus();
			return false;
			}
			//Fin validacion
		var parametros={"id":id,"precio_venta":precio_venta,"cantidad":cantidad};
		$.ajax({
        type: "POST",
        url: "../ajax/agregar_pedido.php",
        data: parametros,
		 beforeSend: function(objeto){
			$("#resultados").html("Mensaje: Cargando...");
		  },
        success: function(datos){
		$("#resultados").html(datos);
		}
			});
		}

			function eliminar (id)
		{

			$.ajax({
        type: "GET",
        url: "../ajax/agregar_pedido.php",
        data: "id="+id,
		 beforeSend: function(objeto){
			$("#resultados").html("Mensaje: Cargando...");
		  },
        success: function(datos){
		$("#resultados").html(datos);
		}
			});

		}

		$("#datos_pedido").submit(function(){

		  var codigo = $("#codigo").val();
		  var id_empresa = $("#id_empresa").val();
		  var comentarios = $("#comentarios").val();

      $.ajax({
        type: "POST",
        ur: "../orden/pedido_data.php",
        data:{
          'acciones':"grabar",
          'codigo':codigo,
          'id_empresa': id_empresa,
          'comentarios': comentarios
        }
      });
	 	});
	</script>

  <?php  require ("footer.php")?>

  </body>
</html>
