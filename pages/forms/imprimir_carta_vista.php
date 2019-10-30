<?php
session_start();
setlocale(LC_TIME, 'spanish');
date_default_timezone_set("America/La_Paz");
//$_SESSION['num_conjunta'] = 50;

$_SESSION['num_conjunta']=$_GET['id_fac'];
$numero_conjunta = $_SESSION['num_conjunta'];

include 'php/conexion_facturacion.php';
$qa1 = pg_query("select count(id_factura) from public.factura where  numero_conjunta=" . $numero_conjunta . " ;");
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
    $idcliente = $row13['id_cliente'];
    $i = $i + 1;
}

include 'php/conexion_facturacion.php';
$qa1 = pg_query("select * from cliente where id_cliente=" .  $idcliente . " ;");
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
    $_SESSION['id_empresa'] = $row2['id_empresa'];

}

$totalpagar = totalempresa($_SESSION['id_factura1']);
$date = date_create($_SESSION['fecha_factura']);

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

    QRcode::png($_SESSION['nit_area'] . "|" . $_SESSION["numero_factura"] . "|" . $_SESSION["numero_autorizacion"] . "|" . $_SESSION['fecha_factura'] . "|" . $totalpagar . "|" . $totalpagar . "|" . trim($_SESSION['codigo_control']) . "|" . $_SESSION['nit_carnet'] . "|0|0|0|0.00", $filename, 'L', 2.5, 2.5);
}


?>

    <html>
    <head>


        <meta charset="UTF-8">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <link rel="shortcut icon" href="../../images/user1.png">

        <link rel="stylesheet" type="text/css" href="CSS.css">
        <title>Factura </title>
        <style type="text/css" media="print">
            @page {size: portrait;}
            @page rotada{size: letter;}

           @page  {margin: 25;}




        </style>
  <style media="all">

p {
  font: monospace 150%;
  /* el orden no es correcto */
}

        .css-title{
            font-weight: bolder;
            font-size: 1.5em;
        }
        
        .css-business_data div {
            padding: 5px;
        }

        .css-user_data_panel, .css-business_data_panel {
            padding-left: 20px;
            padding-right: 20px;
        }

        .css-invoice_data {
            margin-left: auto;
            margin-right: auto;
            border: 1px solid #000000;
        }

        .css-invoice_data td {
            padding-left: 5px;
            padding-right: 5px;
        }

        .css-logo{
            max-width: 300px;
            max-height: 100px;
        }

        .table > tbody > tr > td,
        .table > tbody > tr > th,
        .table > tfoot > tr > td,
        .table > tfoot > tr > th,
        .table > thead > tr > td,
        .table > thead > tr > th{
            padding: 0;
        }
div.hprint {
position: fixed;
height: 5px;
display:block;
}
div.fprint {
position: fixed;
height: 25px;
margin-top: 20px;
display:block;
bottom: 0;
left: 0;
}

 
    </style>
     
        <link href="../../plugins/bootstrap/css/bootstrap.css" rel="stylesheet">


        <script type="text/javascript">
           function imprimir() {
                if (window.print) {
                    window.print();
 

                } else {
                    alert("La función de impresion no esta soportada por su navegador.");
                }
            }



        </script>
    </head>





<body onload="imprimir();">
    <div class="">
        <section id="" style="background-color: white; ">
    <div class="row">
    <div class="col-xs-4" align="center">
        <p class="size-h2"><img src="../../images/user3.png" class="css-logo"></p>
           <FONT SIZE=2><?php echo empresa($_SESSION['id_empresa']) ?></FONT><br>
        <FONT SIZE=2 ><?php echo  $_SESSION['nombre_sucursal']  ?></FONT><br>
         <FONT SIZE=1 ><?php echo "Direccion : " . $_SESSION['direccion_sucursal'] ?></FONT><br>
         <FONT SIZE=1 ><?php echo "Telefono : " . $_SESSION['telefono'] ?></FONT><br>
    </div>
<div class="col-xs-3" align="center">
   <br>
</div>

    <div class="col-xs-5 css-business_data_panel text-center ">
        <div class="css-business_data text-right">
            <div>
                <table class="css-invoice_data">
                    <tbody>
                 
                        <tr>
                            <td><FONT SIZE=2 ><b>NIT:</b></FONT></td>
                            <td align="left"><FONT SIZE=2 ><?php echo $_SESSION['nit_area'] ?></FONT></td>
                        </tr>
                        <tr>
                            <td><FONT SIZE=2 ><b>FACTURA No.:</b></FONT></td>
                            <td align="left"><FONT SIZE=2 ><?php echo $_SESSION['numero_factura'] ?></FONT></td>
                        </tr>
                        <tr>
                            <td><FONT SIZE=2 ><b>AUTORIZACION No.:</b></FONT></td>
                            <td align="left"><FONT SIZE=2 ><?php echo $_SESSION['numero_autorizacion'] ?></FONT></td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
        <?php if($_SESSION['estado_factura']==1){?>
<FONT SIZE=2 ><b>ORIGINAL</b></FONT><br>
            <?php
        }else{
?>
<FONT SIZE=2 ><b>ANULADA</b></FONT><br>
<?php
        }?>
            
             
            <FONT SIZE=2 ><b>Actividad Económica : </b><?php echo $_SESSION['actividad_economica'] ?></FONT> </div>
</div>

<?php
$contador1=22;
$contador2=17;

$contador_productos=0;
$contador_factura1=0;
$contador_factura2=0;
$contador_factura3=0;
$contador_factura4=0;

 if($_SESSION['cantidad_facturas'] >1){ ?>



        <div class="row">
            <div class="col-lg-12">
                <p class="css-title text-center">FACTURA CONJUNTA</p>
                  <p class="css-title text-center"><FONT SIZE=2 > (CANTIDAD DE FACTURAS: <?php echo $_SESSION['cantidad_facturas']?>)</FONT></p>
            </div>
        </div>
<?php }else{?>
          <div class="row">
            <div class="col-lg-12">
                <p class="css-title text-center">FACTURA</p>
            </div>
        </div>
<?php }?>


            <div class="row css-user_data_panel">
                <div class="col-xs-6 css-pdf_left">
                    <FONT SIZE=2 > <b>Lugar y Fecha: </b>La Paz, <?php echo " ".date_format($date, 'd') . " " . meses(date_format($date, 'm')) . " " . date_format($date, 'Y') ?></FONT><br>
                     <FONT SIZE=2 ><b>Señor(a):</b> <?php echo $_SESSION['razon_social'] ?></FONT>
                 </div>
            <div class="col-xs-6 text-right css-pdf_right">
                    <FONT SIZE=2 ><b>NIT/CI: </b><?php echo $_SESSION['nit_carnet'] ?><FONT SIZE=2>
            </div>
            

<?php if($_SESSION['cantidad_facturas'] >1) { ?>
        <div class="col-xs-12 css-pdf_left">
            <FONT SIZE=1> <p class="css-title text-center">FACTURA 1 DE <?PHP ECHO $_SESSION['cantidad_facturas'] ?></p></FONT>
        </div>
      
       <?php }
    include 'php/conexion_facturacion.php';
    $qa10 = pg_query("SELECT b.descripcion_articulo, a.cantidad, b.unidad_medida, c.precio_articulo
FROM public.cantidad_articulos_factura a, public.articulo b, public.precios_articulo c
where b.id_articulo=c.id_articulo and
a.id_articulo=b.id_articulo and
a.id_precio_articulo=c.id_precio_articulo and
a.id_factura=" . $_SESSION['id_factura1'] . ";");
    include 'php/desconectar_facturacion.php';
    ?>
            <table class="" border="1">
                <thead>
                        <tr class="">
                                <th class="text-center" WIDTH="450"><FONT SIZE=2>CONCEPTO</FONT></th>
                                <th class="text-center"><FONT SIZE=2>CANTIDAD</FONT></th>
                                <th class="text-center"><FONT SIZE=2>UNIDAD</FONT></th>
                                <th class="text-center"><FONT SIZE=2>PRECIO UNI.</FONT></th>
                                 <th class="text-center"><FONT SIZE=2>SUBTOTAL</FONT></th>
                                  <th class="text-center"><FONT SIZE=2>DESCUENTO</FONT></th>
                                   <th class="text-center"><FONT SIZE=2>IMPORTE TOTAL</FONT></th>

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
                  <td align="center"><FONT SIZE=1>' . $medida . '</FONT></td>
                  <td align="center"><FONT SIZE=1>' . $precio . '</FONT></td>
                  <td align="center"><FONT SIZE=1>' . $subtotal . '</FONT></td>
                  <td align="center"><FONT SIZE=1>' . $descuento . '</FONT></td>
                  <td align="center"><FONT SIZE=1>' . $impotetotal . '</FONT></td>
                  </tr>';
            $contador_productos=$contador_productos+1;
            }

            $contador_factura1=$contador_productos+$contador1;
            ?>
     <tr>
               <td align="left" colspan="4"><FONT SIZE=2><?php echo numtoletras($totalpagar) ?></FONT></td>
                <td align="center"><FONT SIZE=1></FONT></td>
                <td align="center"><FONT SIZE=2> TOTAL BS </FONT></td>
                <td align="center"><FONT SIZE=2><?php echo number_format($totalpagar, 2, ',', '.') ?></FONT></td>
            </tr>
            <tbody>

            </table>
            <br>
<div class="row">
    <div class="col-xs-8 css-pdf_left">
        <FONT SIZE=2><b>Código de control: </b><?php echo $_SESSION['codigo_control'] ?></FONT><BR>
        <FONT SIZE=2><b>Fecha límite de emisión: </b><?php echo $_SESSION['fecha_emision'] ?></FONT>
    </div>
    <div class="col-xs-4 invoice-sum text-right css-pdf_right">
        <br>
        <?php echo '<img src="' . $PNG_WEB_DIR . basename($filename) . '" />'; ?>
    </div>
</div>
<div class="row">
    <div class="col-lg-12 text-center"><strong style="font-size: 12px">"ESTA FACTURA CONTRIBUYE AL DESARROLLO DEL PAIS. EL USO ILICÍTO DE ESTA SERÁ SANCIONADO DE ACUERDO A LEY"</strong></div>
<div class="col-lg-12 text-center">

<FONT SIZE=2><?php echo(leyenda($_SESSION['leyenda_factura'])) ?></FONT>
</div>
</div>
</section>
</div>




<?php

if($contador_productos>5)
{
        $dd=22+$contador_productos;
    for($t=1;$t<(54-$dd);$t++)
    {
        echo '<br>';
    }
}

?>

















































































    <?php
    $totalpagar = totalempresa($_SESSION['id_factura1']);

    $totalfactura = 0;

    for ($j = 2; $j <= $_SESSION['cantidad_facturas']; $j++) {


        $contador_productos=0;

        $totalfactura = $totalfactura + $totalpagar;
        $totalpagar = totalempresa($_SESSION['id_factura' . $j]);

        echo ' <div class="col-xs-12 css-pdf_left">
            <FONT SIZE=1> <p class="css-title text-center">FACTURA '.$j.' DE  '.$_SESSION["cantidad_facturas"].'</p></FONT>
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
            $_SESSION['id_empresa'] = $row2['id_empresa'];

        }

        ?>








<div class="">
        <section id="" style="background-color: white; ">
    <div class="row">
    <div class="col-xs-4" align="center">
      
           <FONT SIZE=2><?php echo empresa($_SESSION['id_empresa']) ?></FONT><br>
        <FONT SIZE=2 ><?php echo  $_SESSION['nombre_sucursal']  ?></FONT><br>
         <FONT SIZE=1 ><?php echo "Direccion : " . $_SESSION['direccion_sucursal'] ?></FONT><br>
         <FONT SIZE=1 ><?php echo "Telefono : " . $_SESSION['telefono'] ?></FONT><br>
    </div>
<div class="col-xs-3" align="center">
   <br>
</div>

    <div class="col-xs-5 css-business_data_panel text-center ">
        <div class="css-business_data text-right">
            <div>
                <table class="css-invoice_data">
                    <tbody>
                 
                        <tr>
                            <td><FONT SIZE=2 ><b>NIT:</b></FONT></td>
                            <td align="left"><FONT SIZE=2 ><?php echo $_SESSION['nit_area'] ?></FONT></td>
                        </tr>
                        <tr>
                            <td><FONT SIZE=2 ><b>FACTURA No.:</b></FONT></td>
                            <td align="left"><FONT SIZE=2 ><?php echo $_SESSION['numero_factura'] ?></FONT></td>
                        </tr>
                        <tr>
                            <td><FONT SIZE=2 ><b>AUTORIZACION No.:</b></FONT></td>
                            <td align="left"><FONT SIZE=2 ><?php echo $_SESSION['numero_autorizacion'] ?></FONT></td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
            <FONT SIZE=2 ><b>ORIGINAL</b></FONT><br>
            <FONT SIZE=2 ><b>Actividad Económica : </b><?php echo $_SESSION['actividad_economica'] ?></FONT> </div>
</div>




            <div class="row css-user_data_panel">
                <div class="col-xs-6 css-pdf_left">
                     <FONT SIZE=2 > <b>Lugar y Fecha: </b>La Paz, <?php echo " ".date_format($date, 'd') . " " . meses(date_format($date, 'm')) . " " . date_format($date, 'Y') ?></FONT><br>
                     <FONT SIZE=2 ><b>Señor(a):</b> <?php echo $_SESSION['razon_social'] ?></FONT>
                 </div>
            <div class="col-xs-6 text-right css-pdf_right">
                    <FONT SIZE=2 ><b>NIT/CI: </b><?php echo $_SESSION['nit_carnet'] ?><FONT SIZE=2>
            </div>
            

<?php if($_SESSION['cantidad_facturas'] >1) { ?>
        <div class="col-xs-12 css-pdf_left">
         
        </div>
      
       <?php }
       
    include 'php/conexion_facturacion.php';
    $qa10 = pg_query("SELECT b.descripcion_articulo, a.cantidad, b.unidad_medida, c.precio_articulo
FROM public.cantidad_articulos_factura a, public.articulo b, public.precios_articulo c
where b.id_articulo=c.id_articulo and
a.id_articulo=b.id_articulo and
a.id_precio_articulo=c.id_precio_articulo and
a.id_factura=" . $_SESSION['id_factura' . $j] . ";");
    include 'php/desconectar_facturacion.php';
    ?>
            <table class="" border="1">
                <thead>
                        <tr class="">
                                <th class="text-center" WIDTH="450"><FONT SIZE=2>CONCEPTO</FONT></th>
                                <th class="text-center"><FONT SIZE=2>CANTIDAD</FONT></th>
                                <th class="text-center"><FONT SIZE=2>UNIDAD</FONT></th>
                                <th class="text-center"><FONT SIZE=2>PRECIO UNI.</FONT></th>
                                 <th class="text-center"><FONT SIZE=2>SUBTOTAL</FONT></th>
                                  <th class="text-center"><FONT SIZE=2>DESCUENTO</FONT></th>
                                   <th class="text-center"><FONT SIZE=2>IMPORTE TOTAL</FONT></th>

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
                  <td align="center"><FONT SIZE=1>' . $medida . '</FONT></td>
                  <td align="center"><FONT SIZE=1>' . $precio . '</FONT></td>
                  <td align="center"><FONT SIZE=1>' . $subtotal . '</FONT></td>
                  <td align="center"><FONT SIZE=1>' . $descuento . '</FONT></td>
                  <td align="center"><FONT SIZE=1>' . $impotetotal . '</FONT></td>
                  </tr>';
                  $contador_productos=$contador_productos+1;
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
                        QRcode::png($_SESSION['nit_area'] . "|" . $_SESSION["numero_factura"] . "|" . $_SESSION["numero_autorizacion"] . "|" . $_SESSION['fecha_factura'] . "|" . $totalpagar . "|" . $totalpagar . "|" . trim($_SESSION['codigo_control']) . "|" . $_SESSION['nit_carnet'] . "|0|0|0|0.00", $filename, 'L', 2.5, 2.5);
                    }
                }
                if ($j == 3) {
                    $PNG_TEMP_DIR = dirname(__FILE__) . DIRECTORY_SEPARATOR . 'temp' . DIRECTORY_SEPARATOR;
                    $PNG_WEB_DIR = 'temp/';
                    if (!file_exists($PNG_TEMP_DIR))
                    mkdir($PNG_TEMP_DIR);
                    $filename = $PNG_TEMP_DIR . 'test2.png';
                    $errorCorrectionLevel = 'L';
                    if (isset($_REQUEST['level']) && in_array($_REQUEST['level'], array('L', 'M', 'Q', 'H')))
                    $errorCorrectionLevel = $_REQUEST['level'];
                    $matrixPointSize = 4;
                    if (isset($_REQUEST['size']))
                    $matrixPointSize = min(max((int)$_REQUEST['size'], 1), 10);
                    if (isset($_REQUEST['data'])) {
               
                        if (trim($_REQUEST['data']) == '')
                            die('data cannot be empty! <a href="?">back</a>');

                    $filename = $PNG_TEMP_DIR . 'test2' . md5($_REQUEST['data'] . '|' . $errorCorrectionLevel . '|' . $matrixPointSize) . '.png';
                        QRcode::png($_REQUEST['data'], $filename, $errorCorrectionLevel, $matrixPointSize, 2);

                    } else {

                        QRcode::png($_SESSION['nit_area'] . "|" . $_SESSION["numero_factura"] . "|" . $_SESSION["numero_autorizacion"] . "|" . $_SESSION['fecha_factura'] . "|" . $totalpagar . "|" . $totalpagar . "|" . trim($_SESSION['codigo_control']) . "|" . $_SESSION['nit_carnet'] . "|0|0|0|0.00", $filename, 'L', 2.5, 2.5);
                    }
                }

                if ($j == 4) {
                    $PNG_TEMP_DIR = dirname(__FILE__) . DIRECTORY_SEPARATOR . 'temp' . DIRECTORY_SEPARATOR;

                    $PNG_WEB_DIR = 'temp/';

                    if (!file_exists($PNG_TEMP_DIR))
                        mkdir($PNG_TEMP_DIR);
                    $filename = $PNG_TEMP_DIR . 'test3.png';

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

                        $filename = $PNG_TEMP_DIR . 'test3' . md5($_REQUEST['data'] . '|' . $errorCorrectionLevel . '|' . $matrixPointSize) . '.png';
                        QRcode::png($_REQUEST['data'], $filename, $errorCorrectionLevel, $matrixPointSize, 2);

                    } else {

                        QRcode::png($_SESSION['nit_area'] . "|" . $_SESSION["numero_factura"] . "|" . $_SESSION["numero_autorizacion"] . "|" . $_SESSION['fecha_factura'] . "|" . $totalpagar . "|" . $totalpagar . "|" . trim($_SESSION['codigo_control']) . "|" . $_SESSION['nit_carnet'] . "|0|0|0|0.00", $filename, 'L', 2.5,2.5);
                    }
                }
            }
            if($j==2){$contador_factura2=17+$contador_productos;}
            if($j==3){$contador_factura3=17+$contador_productos;}
            if($j==4){$contador_factura4=17+$contador_productos;}
            ?>
     <tr>
               <td align="left" colspan="4"><FONT SIZE=2><?php echo numtoletras($totalpagar) ?></FONT></td>
                <td align="center"><FONT SIZE=1></FONT></td>
                <td align="center"><FONT SIZE=2> TOTAL BS </FONT></td>
                <td align="center"><FONT SIZE=2><?php echo number_format($totalpagar, 2, ',', '.') ?></FONT></td>
            </tr>
            <tbody>

            </table>
<div class="row">
<div class="col-xs-8 css-pdf_left">
<FONT SIZE=2><b>Código de control: </b><?php echo $_SESSION['codigo_control'] ?></FONT><BR>
<FONT SIZE=2><b>Fecha límite de emisión: </b><?php echo $_SESSION['fecha_emision'] ?></FONT>
</div>
<div class="col-xs-4 invoice-sum text-right css-pdf_right">
    <br>
<?php echo '<img src="' . $PNG_WEB_DIR . basename($filename) . '" />'; ?>
</div>
</div>
<div class="row">
<div class="col-lg-12 text-center">
<FONT SIZE=2><b><?php echo(leyenda($_SESSION['leyenda_factura'])) ?></b></FONT>
</div>
</div>


<?php 

if($_SESSION['cantidad_facturas']==3){
    if($j==2){
$aux1=$contador_factura1+$contador_factura2;
    if($aux1>40)
    {
        $dd=$contador_factura1+$contador_factura2;
        for($t=1;$t<(54-$dd);$t++)
         {
             echo '<br>';
         }
    }
}
}

if($_SESSION['cantidad_facturas']==4){
    if($j==2){
$aux1=$contador_factura1+$contador_factura2;
    if($aux1>40)
    {
        $dd=$contador_factura1+$contador_factura2;
        for($t=1;$t<(54-$dd);$t++)
         {
             echo '<br>';
         }
    }
}
}


?>






        <?php
            }
            $totalfactura = $totalfactura + $totalpagar;
 
if($_SESSION['cantidad_facturas']>1) {

 ?>


 <table class="" border="1">
                <thead>
                        <tr class="">
                     <th class="text-center" WIDTH="800"><FONT SIZE=2>IMPORTE TOTAL</FONT></th>
                     <th class="text-center" WIDTH="100"><FONT SIZE=2>BS </FONT></th>
                     <th class="text-center" WIDTH="100"><FONT SIZE=2><?php echo number_format($totalfactura, 2, ',', '.') ?></FONT></th>
                              

                        </tr>
                         <tr>


                <th colspan="4" align="left"><FONT SIZE=2><b><small><?php echo numtoletras($totalfactura) ?></small></b></FONT></th>
            </tr>
                </thead>




            </table>




<?php 
}
if($_SESSION['cantidad_facturas']==2){
$aux1=$contador_factura1+$contador_factura2;

    if($aux1>40)
    {
        $dd=$contador_factura1+$contador_factura2+5;
        for($t=1;$t<(54-$dd);$t++)
         {
             echo '<br>';
         }
    }
}


?>


</section>
</div>

 
</body>
 <div class="fprint">
        <h5><?php  echo  $_SESSION['usuario']  ?></h5>
    </div>

    </html>

<?php



function meses($mes)
{
    if ($mes == '01') {
        $m = "de Enero de";
    }
    if ($mes == '02') {
        $m = "de Febrero de";
    }
    if ($mes == '03') {
        $m = "de Marzo de";
    }
    if ($mes == '04') {
        $m = "de Abril de";
    }
    if ($mes == '05') {
        $m = "de Mayo de";
    }
    if ($mes == '06') {
        $m = "de Junio de";
    }
    if ($mes == '07') {
        $m = "de Julio de";
    }
    if ($mes == '08') {
        $m = "de Agosto de";
    }
    if ($mes == '09') {
        $m = "de Septiembre de";
    }
    if ($mes == '10') {
        $m = "de Octubre de";
    }
    if ($mes == '11') {
        $m = "de Noviembre de";
    }
    if ($mes == '12') {
        $m = "de Diciembre de";
    }
    return $m;
}


function empresa($id_empresa){
    if($id_empresa==3){$empresa="EMPRESA PUBLICA PRODUCTIVA LACTEOS DE BOLIVIA - LACTEOSBOL";}
    if($id_empresa==2){$empresa="EMPRESA BOLIVIANA DE ALMENDRA Y DERIVADOS - EBA";}
    if($id_empresa==1){$empresa="EMPRESA BOLIVIANA DE ALIMENTOS Y DERIVADOS - EBA";}
     if($id_empresa==4){$empresa="EMPRESA PUBLICA PRODUCTIVA APICOLA - PROMIEL";}
    return $empresa;
}


function totalempresa($id_factura)
{
    include 'php/conexion_facturacion.php';
    $qa1 = pg_query("SELECT a.cantidad, c.precio_articulo
FROM public.cantidad_articulos_factura a, public.articulo b, public.precios_articulo c
where b.id_articulo=c.id_articulo and
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
 if ($leyenda == 18) {
        $ley = "Ley N° 453: Los servicios deben suministrarse en condiciones de inocuidad, calidad y seguridad.";
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