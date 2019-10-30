<?php
session_start();
//include "conexion_facturacion.php";
//include "numero_factura.php";


$array_codigos= array();
$array_articulos = array();
$array_medidas = array();
$array_cantidades= array();
$array_unidades= array();
$array_empresas= array();


$array_codigos= $_POST['codigos'];
$array_articulos = $_POST['descripcion'];
$array_medidas = $_POST['medidas'];
$array_cantidades = $_POST['cantidad'];
$array_unidades = $_POST['unidad'];
$array_empresas = $_POST['empresa'];


//print_r($array_codigos);
//print_r($array_articulos);
//print_r($array_medidas);
//print_r($array_cantidades);
//print_r($array_unidades);
//print_r($array_empresas);

For ($i = 0; $i < count($array_codigos); $i++) {

    include 'conexion_facturacion.php';
    $qa3 = pg_query("INSERT INTO public.articulo(
            codigo_articulo, descripcion_articulo, unidad_medida, 
            cantidad_representativa, unidad_representativa, id_empresa)
    VALUES ('".$array_codigos[$i]."','".$array_articulos[$i]."','" . $array_medidas[$i] . "','" . $array_cantidades[$i] . "','" . $array_unidades[$i] . "'," . $array_empresas[$i] . ");");
    include 'desconectar_facturacion.php';


}



?>
