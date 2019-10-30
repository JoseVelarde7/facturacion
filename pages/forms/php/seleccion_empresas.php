<?php

include 'conexion_facturacion.php';


$qa2 =    pg_query(" SELECT * FROM public.empresa");


include 'desconectar_facturacion.php';
// echo '<option value="0">-- Selecciona Empresa --</option>';
while($row11 = pg_fetch_array($qa2))
{

    echo '<option value="'.$row11['id_empresa'].'">'.$row11['nombre_empresa'].'</option>';
}

?>