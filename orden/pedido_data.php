<?php

  $query1 = "INSERT INTO cabecera_pedido (codigo, id_empresa, id_usuario, comentarios, estado)
          VALUES ('".$_POST['codigo']."', '.$_POST['id_empresa'].', '1', '.$_POST['comentario'].', '1')";

          echo $query1;


?>
