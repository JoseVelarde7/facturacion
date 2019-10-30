<?php


    include 'conexion_facturacion.php';
    $qa = pg_query("SELECT * from public.sucursal where id_sucursal=".$_SESSION['id_sucursal']);
    include 'desconectar_facturacion.php';
    $row1 = pg_fetch_array($qa);
    if (is_array($row1)) {
        $_SESSION["id_empresa"] = $row1['id_empresa'];
    }
    include 'conexion_facturacion.php';
    $qa2 = pg_query("select * from articulo where estado_articulo=true and id_empresa=".$_SESSION["id_empresa"]);
    include 'desconectar_facturacion.php';
    $i = 0;

    while ($row11 = pg_fetch_array($qa2)) {
        $array_productos[$i] = $row11['id_articulo'];
        $i = $i + 1;
    }

    if (count($_POST) > 0) {
        include 'conexion_facturacion.php';
        $qa4 = pg_query("select * from public.precios_articulo where id_sucursal=".$_SESSION['id_sucursal']." ;");
        include 'desconectar_facturacion.php';
        if (pg_num_rows($qa4) > 0) {
            include 'conexion_facturacion.php';
            for ($j = 0; $j < $i; $j++) {
                $precio=$_POST["$array_productos[$j]"];

                $qa2 = pg_query("update public.precios_articulo set estado_precio_articulo='false' where id_articulo='" . $array_productos[$j] . "' and estado_precio_articulo='true' and id_sucursal=".$_SESSION['id_sucursal'].";");
                $qa3 = pg_query("INSERT INTO public.precios_articulo(
            id_articulo, id_usuario, 
            precio_articulo, estado_precio_articulo, id_sucursal)
                          VALUES (" .  $array_productos[$j] . "," . $_SESSION["id_usuario"] . "," . $precio . ",'true',".  $_SESSION['id_sucursal'].")");


            }
            include 'desconectar_facturacion.php';
        } else {
            include 'conexion_facturacion.php';
            for ($j = 0; $j < $i; $j++) {

                $precio=$_POST["$array_productos[$j]"];



                $qa3 = pg_query("INSERT INTO public.precios_articulo(
            id_articulo, id_usuario, 
            precio_articulo, estado_precio_articulo, id_sucursal)
                          VALUES (" .  $array_productos[$j] . "," . $_SESSION["id_usuario"] . "," . $precio . ",'true',".  $_SESSION['id_sucursal'].")");


            } include 'desconectar_facturacion.php';
        }

        echo ' <div class="alert alert-success"><strong>Los '.$i.' datos fueron guardados correctamente</strong></div>';
        // sleep(5);
      //    echo '<meta http-equiv="refresh" content="0;url=../forms/actualizar_precios.php">';
    } else {
        echo ' <div class="alert alert-danger"><strong>Error de ingreso intente de nuevo</strong></div>';
        //    sleep(5);
     //   echo '<meta http-equiv="refresh" content="0;url=../forms/actualizar_precios.php">';
    }















?>