<?php
session_start();
echo "entro";
//include "conexion_facturacion.php";
//include "numero_factura.php";
$array_direccion= array();
$array_ubicacion = array();
$array_telefono = array();
$array_nombre= array();
$array_empresas= array();
$array_empresas= array();


$array_direccion= $_POST['direccion'];
$array_ubicacion = $_POST['ubicacion'];
$array_telefono = $_POST['telefono'];
$array_nombre = $_POST['nombre'];
$array_empresas = $_POST['empresa'];



//print_r($array_direccion);
//print_r($array_ubicacion);
//print_r($array_telefono);
//print_r($array_nombre);
//print_r($array_empresas);


For ($i = 0; $i < count($array_nombre); $i++) {

/*
    echo ("INSERT INTO public.sucursal(
             id_empresa, direccion_sucursal, ubicacion_sucursal, 
            telefono, nombre_sucursal)
    VALUES (".$array_empresas[$i].",'".$array_direccion[$i]."','" . $array_ubicacion[$i] . "','" . $array_telefono[$i] . "','" . $array_nombre[$i] . "');");*/

    include 'conexion_facturacion.php';
    $qa3 = pg_query("INSERT INTO public.sucursal(
             id_empresa, direccion_sucursal, ubicacion_sucursal, 
            telefono, nombre_sucursal)
    VALUES (".$array_empresas[$i].",'".$array_direccion[$i]."','" . $array_ubicacion[$i] . "','" . $array_telefono[$i] . "','" . $array_nombre[$i] . "');");
    include 'desconectar_facturacion.php';


}



?>
