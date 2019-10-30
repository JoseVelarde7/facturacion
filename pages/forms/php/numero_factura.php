<?php


function num_factura($sucursal)
{
    setlocale(LC_TIME, 'spanish');
    date_default_timezone_set("America/La_Paz");
    include 'conexion_facturacion.php';
    $qa1 = pg_query("SELECT * FROM public.dosificacion WHERE id_sucursal=" . $sucursal .
        " and estado_dosificacion=1 and fecha_emision  > '" . strftime(" %#d-%m-%Y") . "';");
    $qa2 = pg_query("SELECT * FROM public.factura WHERE id_sucursal=" . $sucursal);

    include 'desconectar_facturacion.php';
    if (pg_num_rows($qa2) > 0) {
        include 'conexion_facturacion.php';
        $qa3 = pg_query("SELECT id_dosificacion FROM public.factura WHERE id_factura=(select max(id_factura) from public.factura where id_sucursal=" . $sucursal . ") and id_sucursal=" . $sucursal . ";");
        // echo "SELECT id_dosificacion FROM facturacion.factura WHERE id_factura=(select max(id_factura) from facturacion.factura where id_area=" . $_SESSION["id_area"] . ") and id_area=" . $_SESSION["id_area"] . ";";
        include 'desconectar_facturacion.php';
        $row1 = pg_fetch_array($qa1);
        if (is_array($row1)) {
            $_SESSION['id_dosifi_dosificacion'] = $row1['id_dosificacion'];
        }
        $row2 = pg_fetch_array($qa3);
        if (is_array($row2)) {
            $_SESSION['id_dosifi_facturacion'] = $row2['id_dosificacion'];
        }
        if ($_SESSION['id_dosifi_dosificacion'] == $_SESSION['id_dosifi_facturacion']) {
            include 'conexion_facturacion.php';
            $qa4 = pg_query("SELECT numero_factura FROM public.factura WHERE id_factura=(select max(id_factura) from public.factura where id_sucursal=" . $sucursal . ") and id_sucursal=" . $sucursal . ";");
            include 'desconectar_facturacion.php';
            // echo "SELECT numero_factura FROM facturacion.factura WHERE WHERE id_factura=(select max(id_factura) from facturacion.factura where id_area=" . $_SESSION["id_area"] . ") and id_area=" . $_SESSION["id_area"] . ";";
            $row2 = pg_fetch_array($qa4);
            if (is_array($row2)) {
                $_SESSION['numero'] = $row2['numero_factura'];
            }
            $num = $_SESSION['numero'] + 1;
            $numero_factura = $num;
           // echo $num;

        } else {
            $num = 1;
            $numero_factura  = $num;
        //    echo $num;


        }

    } else {

        $num = 1;
        $numero_factura  = $num;
       // echo $num;
    }

    return $numero_factura ;
}
?>