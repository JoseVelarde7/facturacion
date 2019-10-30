<?php

include 'conexion_facturacion.php';

$codigo= $_GET['codigo'];
//echo $codigo;
$qa2 =    pg_query(" SELECT count(codigo_articulo) FROM public.articulo WHERE codigo_articulo= '". $codigo."'");
	//cc
//$rows = pg_num_rows($qa2);
$rows = pg_fetch_array($qa2);
echo $rows['count'];


include 'desconectar_facturacion.php';
//echo '<option value="0">-- Selecciona Empresa --</option>';


?>