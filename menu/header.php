<!DOCTYPE html>
<html lang='en' dir='ltr'>

<head>
  <meta charset='utf-8'>
  <title>Inicio: Zapeteria Menoscal</title>
  <link rel="icon" href="../util/pagina.png">
  <!-- <link rel='stylesheet' href='../css/principal.css'> -->
  <link rel='stylesheet' href='../css/producto.css'>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/css/select2.min.css" rel="stylesheet" />
  <link rel='stylesheet' href='../css/chosen.min.css'>
  <link rel='stylesheet' href='../css/fontawesome.min.css'>
  <link rel='stylesheet' href='../css/jquery.dataTables.min.css'>
  <link rel='stylesheet' href='../css/bootstrap.min.css'>
  <link rel='stylesheet' href='../css/style.css'>
</head>

<header>
  <nav class="navbar navbar-expand-lg">
    <a class="navbar-brand" href="../menu/index.php">Inicio</a>
    <button type="button" name="button" class="navbar-toggler" data-toggle="collapse" data-target="#contenedor_item" aria-controls="contenedor_item" aria-expanded="false" aria-label="Toggle navegacion">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="contenedor_item">
      <div class="navbar-nav">
        <a class="nav-item nav-link" href="../producto/consulta_producto_views.php"><i class="fas fa-list-alt"></i>Productos</a>
        <!-- <a class="nav-item nav-link" href="../usuario/usuario.php"><i class="fas fa-plus-square"></i>Usuarios</a> -->
        <a class="nav-item nav-link" href="../acerca/acerca_de.php"><i class="fas fa-align-justify"></i>Acerca de</a>
      </div>
    </div>

  </nav>
</header>

<script type="text/javascript">
  function cargar(id, url, contenedor) {
    $(document).ready(function() {
      $("#" + id).click(function(event) {
        $("#" + contenedor).load(url);
      });
    });
  }
</script>
