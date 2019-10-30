<?php

include 'conexion_facturacion.php';


$qa2 =    pg_query(" SELECT * FROM public.empresa");


//AND NOT '(SUBSIDIO)'=RIGHT(articulo.descripcion_articulo,10) AND NOT '(SUBISIDIO)'=RIGHT(articulo.descripcion_articulo,11) AND NOT '(SUBSIDIO UNIVERSAL)'=RIGHT(articulo.descripcion_articulo,20) AND NOT '( SUBSIDIO)'=RIGHT(articulo.descripcion_articulo,11)
include 'desconectar_facturacion.php';
echo '<option value="0">-- Todas las Empresas --</option>';
while($row11 = pg_fetch_array($qa2))
{

    echo '<option value="'.$row11['id_empresa'].'">'.$row11['nombre_empresa'].'</option>';
}

?>