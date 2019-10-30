<?php
if($situacion=='t'){$situacion='true'; $es="No Asignado";}else{$situacion='false'; $es="Asignado";}
    echo '<option value="'.$situacion.'">'.$es.'</option>';
?>
<option value="true">No asignado</option>
<option value="false">Asignado</option>