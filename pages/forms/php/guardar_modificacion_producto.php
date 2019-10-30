<?php
if (isset($_POST['guardar'])) {
    setlocale(LC_TIME, 'spanish');
    date_default_timezone_set("America/La_Paz");

    $estado = $_POST['estado'];

    include 'conexion_facturacion.php';
    $qa = pg_query("UPDATE public.articulo SET estado_articulo=".$estado." WHERE id_articulo=" .$id_producto. ";");
    // echo("UPDATE facturacion.sucursal SET estado=false WHERE id_sucursal=" . $_SESSION["id_sucursal"] . ";");

    include 'desconectar_facturacion.php';
    echo ' <div class="alert alert-success"><strong>Datos guardados correctamente</strong></div>';
    //  sleep(5);
   echo '<meta http-equiv="refresh" content="2;url=../../pages/forms/gestionar_productos.php">';
}


?>