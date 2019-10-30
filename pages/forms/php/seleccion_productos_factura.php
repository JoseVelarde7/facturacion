<?php
echo "sdasdsadsa";
include 'conexion_facturacion.php';
$qa2 =    pg_query("SELECT a.id_articulo, a.descripcion_articulo, p.precio_articulo ,p.id_sucursal, a.codigo_articulo  
FROM public.precios_articulo p, public.articulo a , stock s
WHERE a.id_articulo=p.id_articulo 
and s.id_articulo=a.id_articulo
and s.id_area=".$_SESSION["id_area"]."
and p.estado_precio_articulo=true 
and a.estado_articulo=true 
and s.cantidad>0
and a.estado_articulo=true
and(p.id_sucursal=".$_SESSION['sucursal1'].") ORDER BY a.descripcion_articulo");





//AND NOT '(SUBSIDIO)'=RIGHT(articulo.descripcion_articulo,10) AND NOT '(SUBISIDIO)'=RIGHT(articulo.descripcion_articulo,11) AND NOT '(SUBSIDIO UNIVERSAL)'=RIGHT(articulo.descripcion_articulo,20) AND NOT '( SUBSIDIO)'=RIGHT(articulo.descripcion_articulo,11)
include 'desconectar_facturacion.php';
echo '<datalist id="productos" width="80px">';
//echo '<option value="0">-- Escoja el producto --</option>';
while($row11 = pg_fetch_array($qa2))
{
    echo '<option width="200px" value="' . $row11['codigo_articulo']." | ".$row11['descripcion_articulo'].'"></option>';
}
echo '</datalist>';
?>