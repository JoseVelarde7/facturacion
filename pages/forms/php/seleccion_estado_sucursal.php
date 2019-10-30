<?php
if($estado=='t'){$estado='true'; $es="Activo";}else{ $estado='false'; $es="Inactivo";}
    echo '<option value="'.$estado.'">'.$es.'</option>';
?>
<option value="true">Activar</option>
<option value="false">Inactivar</option>