<?php
$id_usuario=array();
$usuario=array();
include 'conexion_facturacion.php';

$qa2 =    pg_query("select id_usuario, usuario from public.usuario where id_rol=2 ");
include 'desconectar_facturacion.php';
$i=0;
while ($row13 = pg_fetch_array($qa2)) {
    $id_usuario[$i]=$row13['id_usuario'];
    $usuario[$i]=$row13['usuario'];
    $i=$i+1;
}


echo '<option value="0">-- Selecciona un Usuario --</option>';
for($i=0;$i<count($usuario);$i++) {

    include 'conexion_facturacion.php';
    $qa3 = pg_query("SELECT distinct(b.id_usuario)
FROM public.sucursales_usuario b where b.id_usuario=".$id_usuario[$i]);
    include 'desconectar_facturacion.php';

    if (pg_num_rows($qa3) > 0) {


    }else {
        echo '<option value="' . $id_usuario[$i]. '">' . $usuario[$i] . '</option>';
    }
}
?>