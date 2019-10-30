<?php
setlocale(LC_TIME, 'spanish');
date_default_timezone_set("America/La_Paz");
$numero_autorizacion = $_POST['numero_autorizacion'];
$fecha_emision = $_POST['fecha_emision'];
$llave_dosificacion = $_POST['llave_dosificacion'];
$leyenda = $_POST['leyenda'];
$actividad_economica = $_POST['actividad_economica'];
$nit = $_POST['numero_nit'];
$fecha_actualizada = strftime("%Y-%m-%#d %X");
$estado_dosificacion = 1;
$sucursal = $_POST['sucursal'];


if (isset($_POST['guardar'])) {
    $res = dosificacion($numero_autorizacion, $fecha_emision, $llave_dosificacion, $leyenda, $actividad_economica, $nit, $fecha_actualizada, $estado_dosificacion, $sucursal);
}
function dosificacion($numero_autorizacion, $fecha_emision, $llave_dosificacion, $leyenda, $actividad_economica, $nit_area, $fecha_actualizada, $estado_dosificacion, $sucursal)
{
    if (count($_POST) > 0) {

        include 'conexion_facturacion.php';
        $qa3 = pg_query("INSERT INTO public.dosificacion(numero_autorizacion, fecha_emision, llave_dosificacion,leyenda_factura, actividad_economica, nit_area, fecha_actualizada,estado_dosificacion, id_sucursal)
                          VALUES ('" . $numero_autorizacion . "','" . $fecha_emision . "','" . $llave_dosificacion . "'," . $leyenda . ",'" . $actividad_economica . "','" . $nit_area . "','" . $fecha_actualizada . "'," . $estado_dosificacion . "," . $sucursal . ")");
        include 'desconectar_facturacion.php';
        echo ' <div class="alert alert-success"><strong>Datos guardados correctamente</strong></div>';

       // echo '<meta http-equiv="refresh" content="2;url=../../pages/forms/nueva_dosificacion.php">';
    } else {

    }


}


?>