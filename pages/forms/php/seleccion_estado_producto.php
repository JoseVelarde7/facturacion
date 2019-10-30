<?php
if($estado=='t'){$es="Activo";}else{$es="Inactivo";}
    echo '<option value="'.$estado.'">'.$es.'</option>';
?>
<option value="true">Activar</option>
<option value="false">Inactivar</option>