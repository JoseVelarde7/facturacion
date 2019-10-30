<?php

include 'conexion_facturacion.php';
$qa2 =    pg_query("SELECT articulo.id_articulo, articulo.descripcion_articulo, articulo.codigo_articulo
FROM public.articulo
WHERE  articulo.estado_articulo=true ORDER BY articulo.descripcion_articulo ");

include 'desconectar_facturacion.php';
echo '<datalist id="productos" width="80px">';
//echo '<option value="0">-- Escoja el producto --</option>';
while($row11 = pg_fetch_array($qa2))
{
    echo '<option width="200px" value="'. $row11['codigo_articulo']." | ".$row11['descripcion_articulo'].'"></option>';
}
echo '</datalist>';
?>