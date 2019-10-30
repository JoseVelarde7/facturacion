<?php
session_start();
$arti = $_GET['producto'];

$porcione = explode(" | ", $arti);
// $articulo=$porcione[1];
$articulo=$porcione[0];

//$conexion = new mysqli('servidor','usuario','password','basedatos',3306);
// include "conexion_facturacion.php";
// $result = pg_query("SELECT a.id_articulo, a.descripcion_articulo, p.precio_articulo ,p.id_sucursal, s.cantidad
// FROM precios_articulo p, articulo a, stock s
// WHERE  a.id_articulo=p.id_articulo
// and a.id_articulo=s.id_articulo
// and p.estado_precio_articulo=true
// and p.id_sucursal=".$_SESSION['sucursal1']."
//  and a.descripcion_articulo='".$articulo."'" );
include "conexion_facturacion.php";
$result = pg_query("SELECT a.id_articulo, a.descripcion_articulo, p.precio_articulo ,p.id_sucursal, s.cantidad
FROM precios_articulo p, articulo a, stock s
WHERE  a.id_articulo=p.id_articulo
and a.id_articulo=s.id_articulo
and p.estado_precio_articulo=true
and p.id_sucursal=".$_SESSION['sucursal1']."
 and a.codigo_articulo='".$articulo."'" );

include "desconectar_facturacion.php";
$emparray = array();
$respuesta=new stdClass();

while($row =pg_fetch_assoc($result))
{
    $emparray[] = $row;
    $respuesta->precio=$row['precio_articulo'];
	$respuesta->stock=$row['cantidad'];

}
echo json_encode($respuesta);
