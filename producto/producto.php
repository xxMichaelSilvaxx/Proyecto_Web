<?php

$producto =
"
<nav id='guardar_img'>
<label>Nombre:</label>
<input type='text' placeholder='nombre' required>
<br/>
<label>Codigo:</label>
<input type='text' placeholder='codigo' required>
<br/>
<label>Modelo:</label>
<select>
  <option>seleccione</option>
</select>
<br/>
<label>Descripcion:</label>
<input type='textarea' placeholder='descripcion'>
<br/>
<label>Color:</label>
<input type='text' placeholder='color' required>
<br/>
<div class='acciones'>
<form enctype='multipart/form-data' action='../producto/img.php' method='POST'>
<input type='hidden' name='MAX_FILE_SIZE' value='200000' />
<input name='uploadedfile' type='file' />
<input type='submit' value='Subir archivo' />
</form>
</div>
</nav>
";
echo $producto;
?>
