<?php
function localizararchivo($dir,&$archivo_buscar)
{
     if ( is_dir($dir) )
     {
          $d=opendir($dir);
          while( $archivo = readdir($d) )
          {
            if ( $archivo!="." AND $archivo!=".." )
            {
                 if ( is_file($dir . $archivo) )
                 {
                      if ( $archivo == $archivo_buscar  )
                      {
                           return TRUE;
                    }
                }
                if ( is_dir($dir . $archivo) )
                {
                     $r=buscar($dir . $archivo,$archivo_buscar);
                     if ( basename($r) == $archivo_buscar )
                     {
                          return $r;
                    }
                }
            }
        }
    }
    return false;
}
 ?>
