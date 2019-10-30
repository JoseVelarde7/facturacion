<?php




//$_SESSION['num_conjunta']=$_GET['id_fac'];

$_SESSION['num_conjunta'] = 50;
$numero_conjunta = $_SESSION['num_conjunta'];

include 'php/conexion_facturacion.php';
$qa1 = pg_query("select count(id_factura) from public.factura where numero_conjunta=" . $numero_conjunta . " ;");
include 'php/desconectar_facturacion.php';
$row2 = pg_fetch_array($qa1);

if (is_array($row2)) {
    $_SESSION['cantidad_facturas'] = $row2['count'];
}
include 'php/conexion_facturacion.php';
$qa1 = pg_query("select id_factura, id_cliente from public.factura where numero_conjunta=" . $numero_conjunta . " ;");
//echo ("select id_factura, id_cliente from public.factura where numero_conjunta=".$numero_conjunta." ;");
include 'php/desconectar_facturacion.php';
$i = 1;
while ($row13 = pg_fetch_array($qa1)) {
    $_SESSION["id_factura" . $i] = $row13['id_factura'];
    $_SESSION["cliente"] = $row13['id_cliente'];
    $i = $i + 1;
}

include 'php/conexion_facturacion.php';
$qa1 = pg_query("select * from cliente where id_cliente=" . $_SESSION["cliente"] . " ;");
include 'php/desconectar_facturacion.php';
$row2 = pg_fetch_array($qa1);

if (is_array($row2)) {
    $_SESSION['razon_social'] = $row2['cliente'];
    $_SESSION['nit_carnet'] = $row2['nit_carnet'];
}


include 'php/conexion_facturacion.php';
$qa1 = pg_query("select * from public.factura a, public.dosificacion b, public.sucursal c 
where a.id_sucursal=c.id_sucursal and a.id_dosificacion=b.id_dosificacion and a.id_factura=" . $_SESSION["id_factura1"] . " ;");
include 'php/desconectar_facturacion.php';
$row2 = pg_fetch_array($qa1);

if (is_array($row2)) {

    $_SESSION['codigo_control'] = $row2['codigo_control'];
    $_SESSION['numero_factura'] = $row2['numero_factura'];
    $_SESSION['estado_factura'] = $row2['estado_factura'];
    $_SESSION['numero_autorizacion'] = $row2['numero_autorizacion'];
    $_SESSION['fecha_emision'] = $row2['fecha_emision'];
    $_SESSION['actividad_economica'] = $row2['actividad_economica'];
    $_SESSION['nit_area'] = $row2['nit_area'];
    $_SESSION['direccion_sucursal'] = $row2['direccion_sucursal'];
    $_SESSION['ubicacion_sucursal'] = $row2['ubicacion_sucursal'];
    $_SESSION['nombre_sucursal'] = $row2['nombre_sucursal'];
    $_SESSION['telefono'] = $row2['telefono'];
    $_SESSION['fecha_factura'] = $row2['fecha_factura'];
    $_SESSION['leyenda_factura'] = $row2['leyenda_factura'];

}

$totalpagar = totalempresa($_SESSION['id_factura1']);


//ofcourse we need rights to create temp dir


$PNG_TEMP_DIR = dirname(__FILE__) . DIRECTORY_SEPARATOR . 'temp' . DIRECTORY_SEPARATOR;
//html PNG location prefix
$PNG_WEB_DIR = 'temp/';
include "classes/lib/phpqrcode/qrlib.php";
if (!file_exists($PNG_TEMP_DIR))
    mkdir($PNG_TEMP_DIR);
$filename = $PNG_TEMP_DIR . 'test.png';
//processing form input
//remember to sanitize user input in real-life solution !!!
$errorCorrectionLevel = 'L';
if (isset($_REQUEST['level']) && in_array($_REQUEST['level'], array('L', 'M', 'Q', 'H')))
    $errorCorrectionLevel = $_REQUEST['level'];
$matrixPointSize = 4;
if (isset($_REQUEST['size']))
    $matrixPointSize = min(max((int)$_REQUEST['size'], 1), 10);
if (isset($_REQUEST['data'])) {
    //it's very important!
    if (trim($_REQUEST['data']) == '')
        die('data cannot be empty! <a href="?">back</a>');

    // user data
    $filename = $PNG_TEMP_DIR . 'test' . md5($_REQUEST['data'] . '|' . $errorCorrectionLevel . '|' . $matrixPointSize) . '.png';
    QRcode::png($_REQUEST['data'], $filename, $errorCorrectionLevel, $matrixPointSize, 1);

} else {

    QRcode::png($_SESSION['nit_area'] . "|" . $_SESSION["numero_factura"] . "|" . $_SESSION["numero_autorizacion"] . "|" . $_SESSION['fecha_factura'] . "|" . $totalpagar . "|" . $totalpagar . "|" . trim($_SESSION['codigo_control']) . "|" . $_SESSION['nit_carnet'] . "|0|0|0|0.00", $filename, 'L', 3, 3);
}


?>

    <html>
    <head>


        <meta charset="UTF-8">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

        <link rel="stylesheet" type="text/css" href="CSS.css">
        <style type="text/css">
            body {
                width: 200px;
                /* font-size: large;*/
            }

            div {
                width: 250px;
                /*   font-size: large;*/
            }

            tfoot {
                padding-top: 5px;
            }

            .css-content_center {
                text-align: center;
            }

            .css-header_table {
                ¡ border: 1px solid #000;
                */ border-top: 1px solid;
                border-bottom: 1px solid;
            }

            .css-footer_table {
                /*border: 1px solid #000;*/
                border-top: 1px solid;
            }

            .css-info_table {
                width: 89%;
            }

            .css-info_table td {
                padding-right: 2px;
                padding-left: 2px;
            }

            .css-info_table1 {
                width: 60%;

            }

            .css-info_table1 td {
                padding-right: 0px;
                padding-left: 7px;
            }

            .css-info_table2 {
                width: 100%;
            }

            .css-info_table2 td {
                padding-right: 10px;
                padding-left: 7px;
            }

            .css-info_table3 {
                width: 122%;
            }

            .css-info_table3 td {
                padding-right: 10px;
                padding-left: 7px;
            }

        </style>
        <!- - Bootstrap Core Css - - >
        <link href="../../plugins/bootstrap/css/bootstrap.css" rel="stylesheet">
    </head>

    <body>
    <!--<div class="css-content_center">
        <img src="../../images/user1.png" alt="SEDEM" height="50" width="125">
    </div>-->
    <div class="css-content_center">
        <h4 class="css-content_center">SEDEM</h4>
    </div>
    <div class="css-content_center">
        <h4 class="css-content_center">FACTURA CONJUNTA</h4>
    </div>

    <div class="css-content_center">
        <FONT SIZE=2 class="css-content_center">(CANTIDAD DE FACTURAS: <?php echo $_SESSION['cantidad_facturas']?>)</FONT>
    </div>


    <div class="css-content_center">
        <FONT SIZE=1><?php echo "Ubicacion : " . $_SESSION['ubicacion_sucursal'] ?></FONT>
    </div>
    <div class="css-content_center">
        <FONT SIZE=1><?php echo "CASA MATRIZ" ?></FONT>
    </div>
    <div class="css-content_center">
        <FONT SIZE=1><?php echo "Direccion : " . $_SESSION['direccion_sucursal'] ?></FONT>
    </div>
    <div class="css-content_center">
        <FONT SIZE=1><?php echo "Telefono : " . $_SESSION['telefono'] ?></FONT>
    </div>

    <div class="css-content_center">
        <FONT SIZE=1>Original</FONT>
    </div>

    <div class="css-content_center">
        <FONT SIZE=1>---------------------------------------------------------------------------</FONT>
    </div>
    <div class="css-content_center">
        <table class="css-info_table">
            <tbody>
            <tr>
                <td align="right"><FONT SIZE=1>NIT: </FONT></td>
                <td align="left"><FONT SIZE=1><?php echo $_SESSION['nit_area'] ?></FONT></td>
            </tr>
            <tr>
                <td align="right"><FONT SIZE=1>FACTURA No.: </FONT></td>
                <td align="left"><FONT SIZE=1><?php echo $_SESSION['numero_factura'] ?></FONT></td>
            </tr>
            <tr>
                <td align="right"><FONT SIZE=1>AUTORIZACION No.: </FONT></td>
                <td align="left"><FONT SIZE=1><?php echo $_SESSION['numero_autorizacion'] ?></FONT></td>
            </tr>
            </tbody>
        </table>

    </div>
    <div class="css-content_center">
        <!--  <FONT SIZE=1>- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - </FONT>-->
        <!--  <FONT SIZE=1>- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - </FONT>-->
        <FONT SIZE=1>---------------------------------------------------------------------------</FONT>
    </div>


    <div class="css-content_center">

        <FONT SIZE=1>Actividad Economica</FONT>
    </div>
    <div class="css-content_center">
        <FONT SIZE=1><?php echo $_SESSION['actividad_economica'] ?></FONT>
    </div>
    <div class="css-content_center">
        <!--  <FONT SIZE=1>- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - </FONT>-->
        <!--  <FONT SIZE=1>- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - </FONT>-->
        <FONT SIZE=1>---------------------------------------------------------------------------</FONT>
    </div>
    <div class="css-content_center">
        <table class="css-info_table1">
            <tbody>
            <tr>
                <td align="center"><FONT SIZE=1>FECHA : </FONT></td>
                <td align="left"><FONT SIZE=1><?php echo $_SESSION['fecha_factura'] ?></FONT></td>
            </tr>
            <tr>
                <td align="center"><FONT SIZE=1>NIT / CI : </FONT></td>
                <td align="left"><FONT SIZE=1><?php echo $_SESSION['nit_carnet'] ?></FONT></td>
            </tr>
            <tr>
                <td align="center"><FONT SIZE=1>SEÑOR (ES) : </FONT></td>
                <td align="left"><FONT SIZE=1><?php echo $_SESSION['razon_social'] ?></FONT></td>
            </tr>
            </tbody>
        </table>
    </div>
    <div class="css-content_center">
        <FONT SIZE=1>---------------------------------------------------------------------------</FONT>
    </div>
    <div class="css-content_center">
        <FONT SIZE=1><strong>FACTURA 1 DE <?PHP ECHO $_SESSION['cantidad_facturas'] ?></strong></FONT>
    </div>
    <div class="css-content_center">
        <FONT SIZE=1>---------------------------------------------------------------------------</FONT>
    </div>
    <?php
    include 'php/conexion_facturacion.php';
    $qa10 = pg_query("SELECT b.descripcion_articulo, a.cantidad, b.unidad_medida, c.precio_articulo
FROM public.cantidad_articulos_factura a, public.articulo b, public.precios_articulo c
where b.id_articulo=c.id_articulo and
c.estado_precio_articulo=true and
a.id_articulo=b.id_articulo and
a.id_precio_articulo=c.id_precio_articulo and
a.id_factura=" . $_SESSION['id_factura1'] . ";");
    include 'php/desconectar_facturacion.php';
    ?>

    <div class="css-content_center">
        <table class="css-info_table1">
            <thead>
            <tr>
                <td align="center"><FONT SIZE=1><B>DESCRIPCION</FONT></B></td>
                <td align="center"><FONT SIZE=1><B>CANTIDAD</FONT></B></td>
                <td align="center"><FONT SIZE=1><B>PRECIO/U</FONT></B></td>
                <td align="center"><FONT SIZE=1><B>IMPORTE</FONT></B></td>
            </tr>
            </thead>

            <?PHP
            while ($array = pg_fetch_assoc($qa10)) {
                $descripcion = "-".$array['descripcion_articulo'];
                $cantidad = number_format($array['cantidad'], 0, '.', '.');
                $medida = $array['unidad_medida'];
                $precio = number_format($array['precio_articulo'], 2, ',', '.');
                $subtotal = number_format($array['precio_articulo'] * $array['cantidad'], 2, ',', '.');
                $descuento = "";
                $impotetotal = number_format($array['precio_articulo'] * $array['cantidad'], 2, ',', '.');

                echo '<tbody class="table">';
                echo '<tr><td align="left"><FONT SIZE=1><small>' . $descripcion . '</small></FONT></td>
                  <td align="center"><FONT SIZE=1>' . $cantidad . '</FONT></td>
                  <td align="center"><FONT SIZE=1>' . $precio . '</FONT></td>
                  <td align="center"><FONT SIZE=1>' . $impotetotal . '</FONT></td></tr>';


            }


            ?>
            <tr>
                <td align="left"><FONT SIZE=1></FONT></td>
                <td align="center"><FONT SIZE=1>TOTAL</FONT></td>
                <td align="center"><FONT SIZE=1> BS </FONT></td>
                <td align="center"><FONT SIZE=1><?php echo number_format($totalpagar, 2, ',', '.') ?></FONT></td>
            </tr>
            <tbody>
        </table>

        <div class="css-content_center">
            <table class="css-info_table2">
                <tbody>
                <tr>
                    <td align="left"><FONT SIZE=1><small><?php echo numtoletras($totalpagar) ?></small></FONT></td>
                </tr>
                <tr>
                    <td align="left"><FONT
                            SIZE=1><?php echo "CODIGO DE CONTROL : " . $_SESSION['codigo_control'] ?></FONT></td>
                </tr>
                <tr>
                    <td align="left"><FONT
                            SIZE=1><?php echo "FECHA LIMITE DE EMISION : " . $_SESSION['fecha_emision'] ?></FONT></td>
                </tr>
                <tr>
                    <td align="center"><?php echo '<img src="' . $PNG_WEB_DIR . basename($filename) . '" />'; ?></td>
                </tr>
                <tr>
                    <td align="center"><FONT SIZE=1><i><?php echo(leyenda($_SESSION['leyenda_factura'])) ?></i></FONT></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>


    <?php
    $totalpagar = totalempresa($_SESSION['id_factura1']);
    $totalfactura = 0;
    for ($j = 2; $j <= $_SESSION['cantidad_facturas']; $j++) {

        $totalfactura = $totalfactura + $totalpagar;
        $totalpagar = totalempresa($_SESSION['id_factura' . $j]);

        echo '<div class="css-content_center">
    <FONT SIZE=1>---------------------------------------------------------------------------</FONT>
</div>
<div class="css-content_center">
    <FONT SIZE=1><b>FACTURA ' . $j . ' DE  ' . $_SESSION['cantidad_facturas'] . '</b></FONT>
    </div>
    <div class="css-content_center">
        <FONT SIZE=1>---------------------------------------------------------------------------</FONT>
    </div>';

        include 'php/conexion_facturacion.php';
        $qa1 = pg_query("select * from public.factura a, public.dosificacion b, public.sucursal c 
where a.id_sucursal=c.id_sucursal and a.id_dosificacion=b.id_dosificacion and a.id_factura=" . $_SESSION["id_factura" . $j] . " ;");
        include 'php/desconectar_facturacion.php';
        $row2 = pg_fetch_array($qa1);

        if (is_array($row2)) {

            $_SESSION['codigo_control'] = $row2['codigo_control'];
            $_SESSION['numero_factura'] = $row2['numero_factura'];
            $_SESSION['estado_factura'] = $row2['estado_factura'];
            $_SESSION['numero_autorizacion'] = $row2['numero_autorizacion'];
            $_SESSION['fecha_emision'] = $row2['fecha_emision'];
            $_SESSION['actividad_economica'] = $row2['actividad_economica'];
            $_SESSION['nit_area'] = $row2['nit_area'];
            $_SESSION['direccion_sucursal'] = $row2['direccion_sucursal'];
            $_SESSION['ubicacion_sucursal'] = $row2['ubicacion_sucursal'];
            $_SESSION['nombre_sucursal'] = $row2['nombre_sucursal'];
            $_SESSION['telefono'] = $row2['telefono'];
            $_SESSION['leyenda_factura'] = $row2['leyenda_factura'];

        }


        ?>

        <div class="css-content_center">
            <FONT SIZE=1><?php echo "Ubicacion : " . $_SESSION['ubicacion_sucursal'] ?></FONT>
        </div>
        <div class="css-content_center">
            <FONT SIZE=1><?php echo "CASA MATRIZ" ?></FONT>
        </div>
        <div class="css-content_center">
            <FONT SIZE=1><?php echo "Direccion : " . $_SESSION['direccion_sucursal'] ?></FONT>
        </div>
        <div class="css-content_center">
            <FONT SIZE=1><?php echo "Telefono : " . $_SESSION['telefono'] ?></FONT>
        </div>

        <div class="css-content_center">
            <FONT SIZE=1>Original</FONT>
        </div>

        <div class="css-content_center">
            <FONT SIZE=1>---------------------------------------------------------------------------</FONT>
        </div>
        <div class="css-content_center">
            <table class="css-info_table">
                <tbody>
                <tr>
                    <td align="right"><FONT SIZE=1>NIT: </FONT></td>
                    <td align="left"><FONT SIZE=1><?php echo $_SESSION['nit_area'] ?></FONT></td>
                </tr>
                <tr>
                    <td align="right"><FONT SIZE=1>FACTURA No.: </FONT></td>
                    <td align="left"><FONT SIZE=1><?php echo $_SESSION['numero_factura'] ?></FONT></td>
                </tr>
                <tr>
                    <td align="right"><FONT SIZE=1>AUTORIZACION No.: </FONT></td>
                    <td align="left"><FONT SIZE=1><?php echo $_SESSION['numero_autorizacion'] ?></FONT></td>
                </tr>
                </tbody>
            </table>

        </div>
        <div class="css-content_center">
            <!--  <FONT SIZE=1>- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - </FONT>-->
            <!--  <FONT SIZE=1>- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - </FONT>-->
            <FONT SIZE=1>---------------------------------------------------------------------------</FONT>
        </div>

        <div class="css-content_center">

            <FONT SIZE=1>Actividad Economica</FONT>
        </div>
        <div class="css-content_center">
            <FONT SIZE=1><?php echo $_SESSION['actividad_economica'] ?></FONT>
        </div>
        <div class="css-content_center">
            <!--  <FONT SIZE=1>- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - </FONT>-->
            <!--  <FONT SIZE=1>- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - </FONT>-->
            <FONT SIZE=1>---------------------------------------------------------------------------</FONT>
        </div>

        <?php
        include 'php/conexion_facturacion.php';
        $qa10 = pg_query("SELECT b.descripcion_articulo, a.cantidad, b.unidad_medida, c.precio_articulo
FROM public.cantidad_articulos_factura a, public.articulo b, public.precios_articulo c
where b.id_articulo=c.id_articulo and
c.estado_precio_articulo=true and
a.id_articulo=b.id_articulo and
a.id_precio_articulo=c.id_precio_articulo and
a.id_factura=" . $_SESSION['id_factura' . $j] . ";");
        include 'php/desconectar_facturacion.php';
        ?>

        <div class="css-content_center">
            <table class="css-info_table1">
                <thead>
                <tr>
                    <td align="center"><FONT SIZE=1><B>DESCRIPCION</B></FONT></td>
                    <td align="center"><FONT SIZE=1><B>CANTIDAD</B></FONT></td>
                    <td align="center"><FONT SIZE=1><B>PRECIO/U</B></FONT></td>
                    <td align="center"><FONT SIZE=1><B>IMPORTE</B></FONT></td>
                </tr>
                </thead>

                <?PHP
                while ($array = pg_fetch_assoc($qa10)) {
                    $descripcion = "-".$array['descripcion_articulo'];
                    $cantidad = number_format($array['cantidad'], 0, '.', '.');
                    $medida = $array['unidad_medida'];
                    $precio = number_format($array['precio_articulo'], 2, ',', '.');
                    $subtotal = number_format($array['precio_articulo'] * $array['cantidad'], 2, ',', '.');
                    $descuento = "";
                    $impotetotal = number_format($array['precio_articulo'] * $array['cantidad'], 2, ',', '.');

                    echo '<tbody class="table">';
                    echo '<tr><td align="left"><FONT SIZE=1><small>' .$descripcion . '</small></FONT></td>
                  <td align="center"><FONT SIZE=1>' . $cantidad . '</FONT></td>
                  <td align="center"><FONT SIZE=1>' . $precio . '</FONT></td>
                  <td align="center"><FONT SIZE=1>' . $impotetotal . '</FONT></td></tr>';
                }

                if ($j == 2) {

                    $PNG_TEMP_DIR = dirname(__FILE__) . DIRECTORY_SEPARATOR . 'temp' . DIRECTORY_SEPARATOR;
                    $PNG_WEB_DIR = 'temp/';
                    if (!file_exists($PNG_TEMP_DIR))
                        mkdir($PNG_TEMP_DIR);
                    $filename = $PNG_TEMP_DIR . 'test1.png';
                    $errorCorrectionLevel = 'L';
                    if (isset($_REQUEST['level']) && in_array($_REQUEST['level'], array('L', 'M', 'Q', 'H')))
                        $errorCorrectionLevel = $_REQUEST['level'];
                    $matrixPointSize = 4;
                    if (isset($_REQUEST['size']))
                        $matrixPointSize = min(max((int)$_REQUEST['size'], 1), 10);
                    if (isset($_REQUEST['data'])) {
                        //it's very important!
                        if (trim($_REQUEST['data']) == '')
                            die('data cannot be empty! <a href="?">back</a>');

                        // user data
                        $filename = $PNG_TEMP_DIR . 'test1' . md5($_REQUEST['data'] . '|' . $errorCorrectionLevel . '|' . $matrixPointSize) . '.png';
                        QRcode::png($_REQUEST['data'], $filename, $errorCorrectionLevel, $matrixPointSize, 2);

                    } else {

                        QRcode::png($_SESSION['nit_area'] . "|" . $_SESSION["numero_factura"] . "|" . $_SESSION["numero_autorizacion"] . "|" . $_SESSION['fecha_factura'] . "|" . $totalpagar . "|" . $totalpagar . "|" . trim($_SESSION['codigo_control']) . "|" . $_SESSION['nit_carnet'] . "|0|0|0|0.00", $filename, 'L', 3, 3);
                    }

                }
                if ($j == 3) {
                    $PNG_TEMP_DIR = dirname(__FILE__) . DIRECTORY_SEPARATOR . 'temp' . DIRECTORY_SEPARATOR;
//html PNG location prefix
                    $PNG_WEB_DIR = 'temp/';

                    if (!file_exists($PNG_TEMP_DIR))
                        mkdir($PNG_TEMP_DIR);
                    $filename = $PNG_TEMP_DIR . 'test2.png';
//processing form input
//remember to sanitize user input in real-life solution !!!
                    $errorCorrectionLevel = 'L';
                    if (isset($_REQUEST['level']) && in_array($_REQUEST['level'], array('L', 'M', 'Q', 'H')))
                        $errorCorrectionLevel = $_REQUEST['level'];
                    $matrixPointSize = 4;
                    if (isset($_REQUEST['size']))
                        $matrixPointSize = min(max((int)$_REQUEST['size'], 1), 10);
                    if (isset($_REQUEST['data'])) {
                        //it's very important!
                        if (trim($_REQUEST['data']) == '')
                            die('data cannot be empty! <a href="?">back</a>');

                        // user data
                        $filename = $PNG_TEMP_DIR . 'test2' . md5($_REQUEST['data'] . '|' . $errorCorrectionLevel . '|' . $matrixPointSize) . '.png';
                        QRcode::png($_REQUEST['data'], $filename, $errorCorrectionLevel, $matrixPointSize, 2);

                    } else {

                        QRcode::png($_SESSION['nit_area'] . "|" . $_SESSION["numero_factura"] . "|" . $_SESSION["numero_autorizacion"] . "|" . $_SESSION['fecha_factura'] . "|" . $totalpagar . "|" . $totalpagar . "|" . trim($_SESSION['codigo_control']) . "|" . $_SESSION['nit_carnet'] . "|0|0|0|0.00", $filename, 'L', 3, 3);
                    }
                }
                ?>
                <tr>
                    <td align="left"><FONT SIZE=1></FONT></td>
                    <td align="center"><FONT SIZE=1>TOTAL</FONT></td>
                    <td align="center"><FONT SIZE=1> BS </FONT></td>
                    <td align="center"><FONT SIZE=1><small><?php echo number_format($totalpagar, 2, ',', '.') ?></small></FONT></td>
                </tr>
                <tbody>
            </table>

            <div class="css-content_center">
                <table class="css-info_table2">
                    <tbody>
                    <tr>
                        <td align="left"><FONT SIZE=1><small><?php echo numtoletras($totalpagar) ?></small></FONT></td>
                    </tr>
                    <tr>
                        <td align="left"><FONT
                                SIZE=1><?php echo "CODIGO DE CONTROL : " . $_SESSION['codigo_control'] ?></FONT></td>
                    </tr>
                    <tr>
                        <td align="left"><FONT
                                SIZE=1><?php echo "FECHA LIMITE DE EMISION : " . $_SESSION['fecha_emision'] ?></FONT>
                        </td>
                    </tr>
                    <tr>
                        <td align="center"><?php echo '<img src="' . $PNG_WEB_DIR . basename($filename) . '" />'; ?></td>
                    </tr>


                    <tr>
                        <td align="center"><FONT SIZE=1><i><?php echo(leyenda($_SESSION['leyenda_factura'])) ?></i></FONT></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>


        <?php

    }
    $totalfactura = $totalfactura + $totalpagar;
    ?>
    <div class="css-content_center">

        <FONT SIZE=1>---------------------------------------------------------------------------</FONT>
    </div>
    <table class="css-info_table3">

        <tr>
            <td align="left"><FONT SIZE=1><b>IMPORTE TOTAL</b></FONT></td>
            <td align="center"><FONT SIZE=1></FONT></td>
            <td align="right"><FONT SIZE=1><b> BS </b></FONT></td>
            <td align="right"><FONT SIZE=1><b><?php echo number_format($totalfactura, 2, ',', '.') ?></b></FONT></td>
        </tr>
        <tr>


            <td colspan="4" align="left"><FONT SIZE=1><b><small><?php echo numtoletras($totalfactura) ?></small></b></FONT></td>
        </tr>
    </table>
    <div class="css-content_center">

        <FONT SIZE=1>---------------------------------------------------------------------------</FONT>
    </div>

    <div class="css-content_center">
        <FONT SIZE=1><i>"ESTA FACTURA CONTRIBUYE AL DESARROLLO DE PAIS. EL USO ILICITO DE ESTA SERA SANCIONADO DE ACUERDO A
            LEY"</i></FONT>
    </div>
    </body>

    </html>

<?php
function totalempresa($id_factura)
{
    include 'php/conexion_facturacion.php';
    $qa1 = pg_query("SELECT a.cantidad, c.precio_articulo
FROM public.cantidad_articulos_factura a, public.articulo b, public.precios_articulo c
where b.id_articulo=c.id_articulo and
  c.estado_precio_articulo=true and
  a.id_articulo=b.id_articulo and
  a.id_precio_articulo=c.id_precio_articulo and
  a.id_factura=" . $id_factura . ";");
    include 'php/desconectar_facturacion.php';

    $total = 0;
    while ($row13 = pg_fetch_array($qa1)) {
        $total = $total + ($row13['cantidad'] * $row13['precio_articulo']);

    }
    return $total;
}
function leyenda($leyenda)
{
    if ($leyenda == 1) {
        $ley = "Ley N° 453: Si se te ha vulnerado algún derecho puedes exigir la reposición o restauración.";
    }
    if ($leyenda == 2) {
        $ley = "Ley N° Ley N° 453: El proveedor deberá dar cumplimiento a las condiciones ofertadas.";
    }
    if ($leyenda == 3) {
        $ley = "Ley N° 453: Están prohibidas las prácticas comerciales abusivas, tienes derecho a denunciarlas.";
    }
    if ($leyenda == 4) {
        $ley = "Ley N° 453: Tienes derecho a recibir información que te proteja de la publicidad engañosa.";
    }
    if ($leyenda == 5) {
        $ley = "Ley N° 453: Puedes acceder a la reclamación cuando tus derechos han sido vulnerados.";
    }
    if ($leyenda == 6) {
        $ley = "Ley N° 453: Los contratos de adhesión deben redactarse en términos claros, comprensibles, legibles y deben informar todas las facilidades y limitaciones.";
    }
    if ($leyenda == 7) {
        $ley = "Ley N° 453: Se debe promover el consumo solidario, justo, en  armonía con la Madre Tierra y precautelando el hábitat, en el marco del Vivir Bien.";
    }
    if ($leyenda == 8) {
        $ley = "Ley N° 453: El proveedor de productós debe habilitar medios e instrumentos para efectuar consultas y reclamaciones.";
    }
    if ($leyenda == 9) {
        $ley = "Ley N° 453: El proveedor debe brindar atención sin discriminación, con respeto, calidez y cordialidad a los usuarios y consumidores.";
    }
    if ($leyenda == 10) {
        $ley = "Ley N° 453: Los productos deben suministrarse en condiciones de inocuidad, calidad y seguridad.";
    }
    if ($leyenda == 11) {
        $ley = "Ley N° 453: Está prohibido importar, distribuir o comercializar productos expirados o prontos a expirar.";
    }
    if ($leyenda == 12) {
        $ley = "Ley N° 453: Está prohibido importar, distribuir o comercializar productos prohibidos o retirados en el país de origen por atentar a la integridad física y a la salud.";
    }
    if ($leyenda == 13) {
        $ley = "Ley N° 453: Tienes derecho a recibir información sobre las características y contenidos de los productos que consumes.";
    }
    if ($leyenda == 14) {
        $ley = "Ley N° 453: Tienes derecho a un trato equitativo sin discriminación en la oferta de productos.";
    }
    if ($leyenda == 15) {
        $ley = "Ley N° 453: El proveedor deberá entregar el producto en las modalidades y términos ofertados o convenidos.";
    }
    if ($leyenda == 16) {
        $ley = "Ley N° 453: En caso de incumplimiento a lo ofertado o convenido, el proveedor debe reparar o sustituir el producto.";
    }
    if ($leyenda == 17) {
        $ley = "Ley N° 453: Los alimentos declarados de primera necesidad deben ser suministrados de manera adecuada, oportuna, continua y a precio justo.";
    }
    return $ley;
}
function numtoletras($xcifra)
{
    $xarray = array(0 => "Cero",
        1 => "UN", "DOS", "TRES", "CUATRO", "CINCO", "SEIS", "SIETE", "OCHO", "NUEVE",
        "DIEZ", "ONCE", "DOCE", "TRECE", "CATORCE", "QUINCE", "DIECISEIS", "DIECISIETE", "DIECIOCHO", "DIECINUEVE",
        "VEINTI", 30 => "TREINTA", 40 => "CUARENTA", 50 => "CINCUENTA", 60 => "SESENTA", 70 => "SETENTA", 80 => "OCHENTA", 90 => "NOVENTA",
        100 => "CIENTO", 200 => "DOSCIENTOS", 300 => "TRESCIENTOS", 400 => "CUATROCIENTOS", 500 => "QUINIENTOS", 600 => "SEISCIENTOS", 700 => "SETECIENTOS", 800 => "OCHOCIENTOS", 900 => "NOVECIENTOS"
    );
//
    $xcifra = trim($xcifra);
    $xlength = strlen($xcifra);
    $xpos_punto = strpos($xcifra, ".");
    $xaux_int = $xcifra;
    $xdecimales = "00";
    if (!($xpos_punto === false)) {
        if ($xpos_punto == 0) {
            $xcifra = "0" . $xcifra;
            $xpos_punto = strpos($xcifra, ".");
        }
        $xaux_int = substr($xcifra, 0, $xpos_punto); // obtengo el entero de la cifra a covertir
        $xdecimales = substr($xcifra . "00", $xpos_punto + 1, 2); // obtengo los valores decimales
    }

    $XAUX = str_pad($xaux_int, 18, " ", STR_PAD_LEFT); // ajusto la longitud de la cifra, para que sea divisible por centenas de miles (grupos de 6)
    $xcadena = "";
    for ($xz = 0; $xz < 3; $xz++) {
        $xaux = substr($XAUX, $xz * 6, 6);
        $xi = 0;
        $xlimite = 6; // inicializo el contador de centenas xi y establezco el límite a 6 dígitos en la parte entera
        $xexit = true; // bandera para controlar el ciclo del While
        while ($xexit) {
            if ($xi == $xlimite) { // si ya llegó al límite máximo de enteros
                break; // termina el ciclo
            }

            $x3digitos = ($xlimite - $xi) * -1; // comienzo con los tres primeros digitos de la cifra, comenzando por la izquierda
            $xaux = substr($xaux, $x3digitos, abs($x3digitos)); // obtengo la centena (los tres dígitos)
            for ($xy = 1; $xy < 4; $xy++) { // ciclo para revisar centenas, decenas y unidades, en ese orden
                switch ($xy) {
                    case 1: // checa las centenas
                        if (substr($xaux, 0, 3) < 100) { // si el grupo de tres dígitos es menor a una centena ( < 99) no hace nada y pasa a revisar las decenas

                        } else {
                            $key = (int)substr($xaux, 0, 3);
                            if (TRUE === array_key_exists($key, $xarray)) {  // busco si la centena es número redondo (100, 200, 300, 400, etc..)
                                $xseek = $xarray[$key];
                                $xsub = subfijo($xaux); // devuelve el subfijo correspondiente (Millón, Millones, Mil o nada)
                                if (substr($xaux, 0, 3) == 100)
                                    $xcadena = " " . $xcadena . " CIEN " . $xsub;
                                else
                                    $xcadena = " " . $xcadena . " " . $xseek . " " . $xsub;
                                $xy = 3; // la centena fue redonda, entonces termino el ciclo del for y ya no reviso decenas ni unidades
                            } else { // entra aquí si la centena no fue numero redondo (101, 253, 120, 980, etc.)
                                $key = (int)substr($xaux, 0, 1) * 100;
                                $xseek = $xarray[$key]; // toma el primer caracter de la centena y lo multiplica por cien y lo busca en el arreglo (para que busque 100,200,300, etc)
                                $xcadena = " " . $xcadena . " " . $xseek;
                            } // ENDIF ($xseek)
                        } // ENDIF (substr($xaux, 0, 3) < 100)
                        break;
                    case 2: // checa las decenas (con la misma lógica que las centenas)
                        if (substr($xaux, 1, 2) < 10) {

                        } else {
                            $key = (int)substr($xaux, 1, 2);
                            if (TRUE === array_key_exists($key, $xarray)) {
                                $xseek = $xarray[$key];
                                $xsub = subfijo($xaux);
                                if (substr($xaux, 1, 2) == 20)
                                    $xcadena = " " . $xcadena . " VEINTE " . $xsub;
                                else
                                    $xcadena = " " . $xcadena . " " . $xseek . " " . $xsub;
                                $xy = 3;
                            } else {
                                $key = (int)substr($xaux, 1, 1) * 10;
                                $xseek = $xarray[$key];
                                if (20 == substr($xaux, 1, 1) * 10)
                                    $xcadena = " " . $xcadena . " " . $xseek;
                                else
                                    $xcadena = " " . $xcadena . " " . $xseek . " Y ";
                            } // ENDIF ($xseek)
                        } // ENDIF (substr($xaux, 1, 2) < 10)
                        break;
                    case 3: // checa las unidades
                        if (substr($xaux, 2, 1) < 1) { // si la unidad es cero, ya no hace nada

                        } else {
                            $key = (int)substr($xaux, 2, 1);
                            $xseek = $xarray[$key]; // obtengo directamente el valor de la unidad (del uno al nueve)
                            $xsub = subfijo($xaux);
                            $xcadena = " " . $xcadena . " " . $xseek . " " . $xsub;
                        } // ENDIF (substr($xaux, 2, 1) < 1)
                        break;
                } // END SWITCH
            } // END FOR
            $xi = $xi + 3;
        } // ENDDO

        if (substr(trim($xcadena), -5, 5) == "ILLON") // si la cadena obtenida termina en MILLON o BILLON, entonces le agrega al final la conjuncion DE
            $xcadena .= " DE";

        if (substr(trim($xcadena), -7, 7) == "ILLONES") // si la cadena obtenida en MILLONES o BILLONES, entoncea le agrega al final la conjuncion DE
            $xcadena .= " DE";

        // ----------- esta línea la puedes cambiar de acuerdo a tus necesidades o a tu país -------
        if (trim($xaux) != "") {
            switch ($xz) {
                case 0:
                    if (trim(substr($XAUX, $xz * 6, 6)) == "1")
                        $xcadena .= "UN BILLON ";
                    else
                        $xcadena .= " BILLONES ";
                    break;
                case 1:
                    if (trim(substr($XAUX, $xz * 6, 6)) == "1")
                        $xcadena .= "UN MILLON ";
                    else
                        $xcadena .= " MILLONES ";
                    break;
                case 2:
                    if ($xcifra < 1) {
                        $xcadena = " $xdecimales/100 Bolivianos.";
                    }
                    if ($xcifra >= 1 && $xcifra < 2) {
                        $xcadena = " $xdecimales/100 Bolivianos. ";
                    }
                    if ($xcifra >= 2) {
                        $xcadena .= "  $xdecimales/100 Bolivianos "; //
                    }
                    break;
            } // endswitch ($xz)
        } // ENDIF (trim($xaux) != "")
        // ------------------      en este caso, para México se usa esta leyenda     ----------------
        $xcadena = str_replace("VEINTI ", "VEINTI", $xcadena); // quito el espacio para el VEINTI, para que quede: VEINTICUATRO, VEINTIUN, VEINTIDOS, etc
        $xcadena = str_replace("  ", " ", $xcadena); // quito espacios dobles
        $xcadena = str_replace("UN UN", "UN", $xcadena); // quito la duplicidad
        $xcadena = str_replace("  ", " ", $xcadena); // quito espacios dobles
        $xcadena = str_replace("BILLON DE MILLONES", "BILLON DE", $xcadena); // corrigo la leyenda
        $xcadena = str_replace("BILLONES DE MILLONES", "BILLONES DE", $xcadena); // corrigo la leyenda
        $xcadena = str_replace("DE UN", "UN", $xcadena); // corrigo la leyenda
    } // ENDFOR ($xz)
    return trim('SON : ' . $xcadena);
}
function subfijo($xx)
{ // esta función regresa un subfijo para la cifra
    $xx = trim($xx);
    $xstrlen = strlen($xx);
    if ($xstrlen == 1 || $xstrlen == 2 || $xstrlen == 3)
        $xsub = "";
    //
    if ($xstrlen == 4 || $xstrlen == 5 || $xstrlen == 6)
        $xsub = "MIL";
    //
    return $xsub;
}
?>