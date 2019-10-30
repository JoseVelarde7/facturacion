<?php
if (isset($_POST['guardar'])) {
    setlocale(LC_TIME, 'spanish');
    date_default_timezone_set("America/La_Paz");

    $direccion = $_POST['direccion'];
    $ubicacion = $_POST['ubicacion'];

    $telefono = $_POST['telefono'];

    $nombre = $_POST['nombre'];
    $empresa = $_POST['empresa'];
    $estado = $_POST['estado'];
    $situacion = $_POST['situacion'];

    include 'conexion_facturacion.php';
    $qa3 = pg_query("UPDATE public.sucursal
   SET direccion_sucursal='".$direccion."', estado=".$estado.", 
       ubicacion_sucursal='".$ubicacion."', telefono='".$telefono."', nombre_sucursal='".$nombre."',situacion=".$situacion." WHERE id_sucursal=" . $id_sucursal);
    include 'desconectar_facturacion.php';
    echo ' <div class="alert alert-success"><strong>Datos guardados correctamente</strong></div>';
    //  sleep(5);
   echo '<meta http-equiv="refresh" content="2;url=../../pages/forms/gestionar_sucursales.php">';
}


?>