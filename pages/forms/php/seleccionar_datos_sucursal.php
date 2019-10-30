<?php

$id_sucursal = $_GET['id_suc'];

include 'conexion_facturacion.php';
$result = pg_query("select id_sucursal, b.id_empresa, direccion_sucursal, estado, ubicacion_sucursal, a.telefono, 
nombre_sucursal, situacion, nombre_empresa from sucursal a, empresa b 
where a.id_empresa=b.id_empresa and id_sucursal= ".$id_sucursal.";");
include 'desconectar_facturacion.php';

$row = pg_fetch_array($result);// guardo el resultado en un array
if (is_array($row)) { // verifico q exista el array en caso positivo
    $id_empresa = $row['id_empresa'];
    $direccion = $row['direccion_sucursal'];
    $estado = $row['estado'];
    $ubicacion = $row['ubicacion_sucursal'];
    $telefono = $row['telefono'];
    $nombre = $row['nombre_sucursal'];
    $empresa = $row['nombre_empresa'];
    $situacion = $row['situacion'];
}
 ?>