<?php

$empresa =
"
<label>Nombre:</label>
<input type='text' placeholder='nombre' required>
<label>Codigo:</label>
<input type='text' placeholder='codigo' required>
<label>Modelo:</label>
<select>
  <option>seleccione</option>
</select>
<label>Descripcion:</label>
<input type='textarea' placeholder='descripcion'>
<label>Color:</label>
<input type='text' placeholder='color' required>
<input type='file' name='imagen' enctype='multipart/form-data' accept='image/*'/>
<button>guardar</button>
<button>cancelar</button>
";

echo $empresa;
?>
