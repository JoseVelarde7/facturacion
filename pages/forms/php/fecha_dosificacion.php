<?php
@session_start();
setlocale(LC_TIME, 'spanish');
date_default_timezone_set("America/La_Paz");
include "conexion_facturacion.php";
$qa41 = pg_query("Select actividad_economica, fecha_emision, a.id_sucursal, ubicacion_sucursal from dosificacion a, sucursal b where a.id_sucursal=b.id_sucursal and a.id_sucursal=" . $_SESSION["sucursal1"] ." and fecha_emision > '" . strftime(" %#d-%m-%Y") . "' order by id_empresa");
include "desconectar_facturacion.php";


$j = 1;
$_SESSION["fecha1"]='2000-01-01';
while ($array = pg_fetch_assoc($qa41)) {
    $_SESSION['fecha' . $j] = $array['fecha_emision'];
    $j = $j + 1;
}



$fecha1 = $_SESSION["fecha1"];
$fecha11 = strtotime('-7 day', strtotime($fecha1));
$fecha11 = date('Y-m-d', $fecha11);
/*$fecha2 = $_SESSION["fecha2"];
$fecha22 = strtotime('-7 day', strtotime($fecha2));
$fecha22 = date('Y-m-j', $fecha22);
$fecha3 = $_SESSION["fecha3"];
$fecha33 = strtotime('-7 day', strtotime($fecha3));
$fecha33 = date('Y-m-j', $fecha33);
$fecha4 = $_SESSION["fecha4"];
$fecha44 = strtotime('-7 day', strtotime($fecha4));
$fecha44 = date('Y-m-j', $fecha44);*/


$fecha_actual = strftime("%#Y-%m-%d");
$fecha_control = 0;
/*$almendra_fecha = 0;
$papel_fecha = 0;
$miel_fecha = 0;*/

if ($fecha_actual > $fecha11 && $fecha_actual < $fecha1) {
    $fecha_control = 1;
}
if ($fecha_actual > $fecha1) {
    $fecha_control = 2;
}
/*
if ($fecha_actual > $fecha22 && $fecha_actual < $fecha2) {
    $almendra_fecha = 1;
}
if ($fecha_actual > $fecha2) {
    $almendra_fecha = 2;
}

if ($fecha_actual > $fecha33 && $fecha_actual < $fecha3) {
    $papel_fecha = 1;
}
if ($fecha_actual > $fecha3) {
    $papel_fecha = 2;
}


if ($fecha_actual > $fecha44 && $fecha_actual < $fecha4) {
    $miel_fecha = 1;
}
if ($fecha_actual > $fecha4) {
    $miel_fecha = 2;
}
*/
