<?php
$id_producto = $_GET['id_pro'];

include 'conexion_facturacion.php';
$result = pg_query("select * from articulo where id_articulo= ".$id_producto.";");
include 'desconectar_facturacion.php';

$row = pg_fetch_array($result);// guardo el resultado en un array
if (is_array($row)) { // verifico q exista el array en caso positivo
    $codigo = $row['codigo_articulo'];
    $descripcion = $row['descripcion_articulo'];
    $medida = $row['unidad_medida'];
    $cantidad = $row['cantidad_representativa'];
    $unidad = $row['unidad_representativa'];
    $estado = $row['estado_articulo'];

}
?>