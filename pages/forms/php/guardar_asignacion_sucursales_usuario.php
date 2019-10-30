<?php
if (count($_POST) > 0) {
    $usuario = $_POST['usuario'];
    $sucursal_lacteosbol = $_POST['sucursal_lacteosbol'];
    // $sucursal_eba = $_POST['sucursal_eba'];
    // $sucursal_papelbol = $_POST['sucursal_papelbol'];
    // $sucursal_promiel = $_POST['sucursal_promiel'];

    include 'conexion_facturacion.php';
    $qa3 = pg_query("INSERT INTO public.sucursales_usuario(
                    id_usuario, id_sucursal)
                    VALUES (" . $usuario . "," . $sucursal_lacteosbol  . ")");
    $qa31 = pg_query(" UPDATE public.sucursal SET situacion=false WHERE id_sucursal=" . $sucursal_lacteosbol);
    // $qa4 = pg_query("INSERT INTO public.sucursales_usuario(id_usuario, id_sucursal)
    //                 VALUES (" . $usuario . "," . $sucursal_eba  . ")");
    // $qa32 = pg_query(" UPDATE public.sucursal SET situacion=false WHERE id_sucursal=" . $sucursal_eba);
    // $qa5 = pg_query("INSERT INTO public.sucursales_usuario(id_usuario, id_sucursal)
    //                 VALUES (" . $usuario . "," . $sucursal_papelbol  . ")");
    // $qa33 = pg_query(" UPDATE public.sucursal SET situacion=false WHERE id_sucursal=" . $sucursal_papelbol);

    //    $qa5 = pg_query("INSERT INTO public.sucursales_usuario(id_usuario, id_sucursal)
    //                 VALUES (" . $usuario . "," . $sucursal_promiel  . ")");
    // $qa33 = pg_query(" UPDATE public.sucursal SET situacion=false WHERE id_sucursal=" . $sucursal_promiel);

    include 'desconectar_facturacion.php';
    echo ' <div class="alert alert-success"><strong>Datos guardados correctamente</strong></div>';
    echo '<meta http-equiv="refresh" content="2;url=../../pages/forms/asignar_sucursales_usuario.php">';
}
?>