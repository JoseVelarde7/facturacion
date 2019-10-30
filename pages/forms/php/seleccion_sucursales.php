<?php

$id_empresa=$_POST['id_empresa'];
$_SESSION['id_empresa_precio']=$id_empresa;
include 'conexion_facturacion.php';
$qa2 =    pg_query(" select * from public.sucursal where id_empresa=".$id_empresa);
//AND NOT '(SUBSIDIO)'=RIGHT(articulo.descripcion_articulo,10) AND NOT '(SUBISIDIO)'=RIGHT(articulo.descripcion_articulo,11) AND NOT '(SUBSIDIO UNIVERSAL)'=RIGHT(articulo.descripcion_articulo,20) AND NOT '( SUBSIDIO)'=RIGHT(articulo.descripcion_articulo,11)
include 'desconectar_facturacion.php';
echo '<option value="0">-- Selecciona la sucursal para asignar los precios --</option>';
while($row11 = pg_fetch_array($qa2))
{
    echo '<option value="'.$row11['id_sucursal'].'">'.$row11['nombre_sucursal']." ".$row11['direccion_sucursal'].'</option>';
}
?>