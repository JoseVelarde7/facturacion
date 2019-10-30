<?PHP
setlocale(LC_TIME, 'spanish');
date_default_timezone_set("America/La_Paz");
session_start();

if (isset($_SESSION['num_conjunta'])) {

    $numero_conjunta = $_SESSION['num_conjunta'];

    include 'conexion_facturacion.php';
    $qa1 = pg_query("select count(id_factura) from public.factura where estado_factura=1 and numero_conjunta=" . $numero_conjunta . " ;");
    include 'desconectar_facturacion.php';
    $row2 = pg_fetch_array($qa1);

    if (is_array($row2)) {
        $_SESSION['cantidad_facturas'] = $row2['count'];
    }

    include 'conexion_facturacion.php';
    $qa1 = pg_query("select id_factura, id_cliente from public.factura where  estado_factura=1 and numero_conjunta=" . $numero_conjunta . " ;");
//echo ("select id_factura, id_cliente from public.factura where numero_conjunta=".$numero_conjunta." ;");
    include 'desconectar_facturacion.php';
    $i = 1;
    while ($row13 = pg_fetch_array($qa1)) {
        $_SESSION["id_factura" . $i] = $row13['id_factura'];
        $_SESSION["cliente"] = $row13['id_cliente'];
        $i = $i + 1;
    }

    include 'conexion_facturacion.php';
    $qa1 = pg_query("select * from cliente where id_cliente=" . $_SESSION["cliente"] . " ;");
    include 'desconectar_facturacion.php';
    $row2 = pg_fetch_array($qa1);

    if (is_array($row2)) {
        $_SESSION['razon_social'] = $row2['cliente'];
        $_SESSION['nit_carnet'] = $row2['nit_carnet'];
    }


    include 'conexion_facturacion.php';
    $qa1 = pg_query("select * from public.factura a, public.dosificacion b, public.sucursal c 
where a.id_sucursal=c.id_sucursal and a.id_dosificacion=b.id_dosificacion and a.id_factura=" . $_SESSION["id_factura1"] . " ;");
    include 'desconectar_facturacion.php';
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
        $_SESSION['id_empresa'] = $row2['id_empresa'];

    }

    $totalpagar = totalempresa($_SESSION['id_factura1']);


//ofcourse we need rights to create temp dir


    $PNG_TEMP_DIR = dirname(__FILE__) . DIRECTORY_SEPARATOR . 'temp' . DIRECTORY_SEPARATOR;
//html PNG location prefix
    $PNG_WEB_DIR = 'temp/';
    include "../classes/lib/phpqrcode/qrlib.php";
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
        QRcode::png($_REQUEST['data'], $filename, $errorCorrectionLevel, $matrixPointSize, 2);

    } else {

        QRcode::png($_SESSION['nit_area'] . "|" . $_SESSION["numero_factura"] . "|" . $_SESSION["numero_autorizacion"] . "|" . strftime("%d/%m/%Y") . "|" . $totalpagar . "|" . $totalpagar . "|" . trim($_SESSION['codigo_control']) . "|" . $_SESSION['nit_carnet'] . "|0|0|0|0.00", $filename, 'H', 2, 2);
    }


//QRcode::png($_SESSION['nit_area'] . "|" . $_SESSION["numero_factura"] . "|" . $_SESSION["numero_autorizacion"] . "|" . strftime("%d/%m/%Y") . "|" . $totalpagar . "|" . $totalpagar . "|" . trim($_SESSION['codigo_control']) . "|" . $_SESSION['nit_carnet'] . "|0|0|0|0.00", $filename, 'H', 2, 2);

//select a.id_sucursal, id_dosificacion, codigo_control, numero_factura, direccion_sucursal, ubicacion_sucursal, telefono from public.sucursal a, public.factura b where a.id_sucursal=b.id_sucursal and b.id_factura=130


    ?>
    <?php
    require('../classes/fpdf/fpdf.php');

    class PDF extends FPDF
    {
        function Footer()
        {
            $this->SetY(-10);

            $this->SetFont('Arial', 'I', '6');
            $this->Cell(0, 6, strftime("%d-%b-%Y %H:%M:%S") . " " . $_SESSION["usuario"], 0, 0, 'L');
            $this->Cell(0, 6, utf8_decode('Página ') . $this->PageNo() . ' de {nb}', 0, 0, 'R');

            $this->Line(5, 271, 210, 271);

        }

    }

    $pdf = new PDF();
    $pdf->SetTitle('Factura SEDEM');

    $pdf->AddPage('P', 'Letter');
    $pdf->AliasNbPages();

    $pdf->Ln(9);
    $pdf->SetFont('Arial', 'B', 6);

    $pdf->Cell(60, 1, utf8_decode( empresa($_SESSION['id_empresa'])), 0, 0, 'C');
    $pdf->Ln(3);
    $pdf->SetFont('Arial', 'B', 6);

    $pdf->Cell(60, 1, $_SESSION['ubicacion_sucursal'], 0, 0, 'C');
    $pdf->Ln(3);
    $pdf->SetFont('Arial', 'B', 6);

    $pdf->Cell(60, 1, utf8_decode($_SESSION['nombre_sucursal']),0, 0, 'C');
    $pdf->Ln(3);
    $pdf->SetFont('Arial', 'B', 6);

    $pdf->Cell(60, 1, $_SESSION['direccion_sucursal'], 0, 0, 'C');

    $pdf->Ln(3);
    $pdf->SetFont('Arial', 'B', 6);

    $pdf->Cell(60, 1, "Telefono : " . $_SESSION['telefono'],0, 0, 'C');


    $pdf->Ln(-25);
    $pdf->SetFont('Arial', 'B', 6);
    $pdf->Cell(135, 10, '', 0);
    $pdf->Cell(60, 14, " ", 0);

    $pdf->Ln(-5);
    $pdf->SetFont('Arial', 'B', 6);
    $pdf->Cell(140, 10, '', 0);
    $pdf->Cell(60, 20, "NIT                                     : " . $_SESSION['nit_area'], 0);
    $pdf->Ln(3);
    $pdf->SetFont('Arial', 'B', 6);
    $pdf->Cell(140, 10, '', 0);
    $pdf->Cell(60, 20, "FACTURA Nro                  : " . $_SESSION['numero_factura'], 0);
    $pdf->Ln(3);
    $pdf->SetFont('Arial', 'B', 6);
    $pdf->Cell(140, 10, '', 0);
    $pdf->Cell(60, 20, "AUTORIZACION Nro        : " . $_SESSION['numero_autorizacion'], 0);
    $pdf->Image('../../../images/user2.png', 19, 5, 30);


    $pdf->Ln(1);
    if ($_SESSION['estado_factura'] == 1) {
        $pdf->Ln(10);
        $pdf->SetFont('Arial', 'B', 6);
        $pdf->Cell(140, 2, '', 0);
        $pdf->Cell(50, 5, 'ORIGINAL  ', 0, 0, 'C');
    } else {


        $pdf->Ln(10);
        $pdf->SetFont('Arial', 'B', 6);
        $pdf->Cell(155, 2, '', 0);
        $pdf->Cell(50, 5, 'ANULADO  ', 0, 0, 'C');

    }
    $pdf->Ln(-3);
    $pdf->SetFont('Arial', 'B', 6);
    $pdf->Cell(130, 2, '', 0);
    $pdf->Cell(70, 20, 'Actividad Economica : ' . trim($_SESSION['actividad_economica']), 0, 0, 'C');

    $pdf->Ln(15);
    if($_SESSION['cantidad_facturas']>1) {
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Ln(5);
        $pdf->Cell(197, 5, '(CANTIDAD DE FACTURAS: ' . $_SESSION['cantidad_facturas'] . ')', 0, 0, 'C');
        $pdf->Ln(-12);
    }
    if($_SESSION['cantidad_facturas']>1) {
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(197, 1, '', 0, 0, 'C');
        $pdf->Ln(2);
        $pdf->Cell(197, 10, 'FACTURA CONJUNTA', 0, 0, 'C');
    }else{
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(197, 1, '', 0, 0, 'C');
        $pdf->Ln(2);
        $pdf->Cell(197, 10, 'FACTURA ', 0, 0, 'C');
    }
    $pdf->Ln(15);
    $pdf->SetFont('Arial', 'B', 7);
    $pdf->Cell(125, 4, 'Lugar y  Fecha  :  La Paz ' . strftime(" %#d de %B del %Y"), 0);
    $pdf->Ln(4);
    $pdf->SetFont('Arial', 'B', 7);
    $pdf->Cell(125, 4, utf8_decode('Razon Social  :  ' . $_SESSION['razon_social']), 0);
    $pdf->Cell(50, 4, 'NIT/CI  :    ' . $_SESSION['nit_carnet'], 0);


    if($_SESSION['cantidad_facturas']>1) {
        $pdf->Ln(3);
        $pdf->SetFont('Arial', 'B', 8);
        $pdf->Line(5, 50, 95, 50);
        $pdf->Cell(197, 5, 'FACTURA 1 DE ' . $_SESSION['cantidad_facturas'], 0, 0, 'C');
        $pdf->Line(122, 50, 210, 50);
    }



    include 'conexion_facturacion.php';
    $qa10 = pg_query("SELECT b.descripcion_articulo, a.cantidad, b.unidad_medida, c.precio_articulo
FROM public.cantidad_articulos_factura a, public.articulo b, public.precios_articulo c
where b.id_articulo=c.id_articulo and
  c.estado_precio_articulo=true and
  a.id_articulo=b.id_articulo and
  a.id_precio_articulo=c.id_precio_articulo and
  a.id_factura=" . $_SESSION['id_factura1'] . ";");
    include 'desconectar_facturacion.php';

//$row9 = pg_fetch_array($qa9);


    $pdf->Ln(5);
    $pdf->SetFillColor(153, 255, 100);

    $pdf->Cell(85, 3, 'CONCEPTO', 1, 0, 'C');
    $pdf->Cell(9, 3, 'CANT.', 1, 0, 'C');
    $pdf->Cell(15, 3, 'UNIDAD', 1, 0, 'C');
    $pdf->Cell(20, 3, 'PRECIO UNI.', 1, 0, 'C');
    $pdf->Cell(20, 3, 'SUBTOTAL', 1, 0, 'C');
    $pdf->Cell(20, 3, 'DESCUENTO', 1, 0, 'C');
    $pdf->Cell(25, 3, 'IMPORTE TOTAL', 1, 0, 'C');


    $cont = 60;
    if($_SESSION['cantidad_facturas']==1) {

        $cont = 65;
    }
    if ($qa10) {
        $con = 3;
        $pdf->SetFont('Arial', '', 5);
        while ($array = pg_fetch_assoc($qa10)) {

            $descripcion = $array['descripcion_articulo'];
            $cantidad = number_format($array['cantidad'], 0, '.', '.');
            $medida = $array['unidad_medida'];
            $precio = number_format($array['precio_articulo'], 2, ',', '.');
            $subtotal = number_format($array['precio_articulo'] * $array['cantidad'], 2, ',', '.');
            $descuento = "";
            $impotetotal = number_format($array['precio_articulo'] * $array['cantidad'], 2, ',', '.');
            $pdf->Ln($con);
            $con = 3;
            $pdf->Cell(85, 3, utf8_decode($descripcion), 1, 0);
            $pdf->Cell(9, 3, $cantidad, 1, 0, 'C');
            $pdf->Cell(15, 3, $medida, 1, 0, 'C');
            $pdf->Cell(20, 3, $precio, 1, 0, 'C');
            $pdf->Cell(20, 3, $subtotal, 1, 0, 'C');
            $pdf->Cell(20, 3, $descuento, 1, 0, 'C');
            $pdf->Cell(25, 3, $impotetotal, 1, 0, 'C');
            $cont = $cont + 3;

        }
    }
    $cont1 = $cont;
    $pdf->SetFont('Arial', 'B', 5);
    $pdf->Ln(3);

    $pdf->Cell(149, 3, '  SON:    ' . isset($totalpagar) ? numtoletras($totalpagar) : '', 1, 0);
    $pdf->Cell(20, 3, "TOTAL BS.", 1, 0, 'C');
    $pdf->Cell(25, 3, number_format($totalpagar, 2, ',', '.'), 1, 0, 'C');
    $pdf->Ln(8);
    $pdf->SetFont('Arial', 'B', 7);
    $pdf->Cell(1, 5, '', 0);
    $pdf->Cell(125, 2, '  CODIGO DE CONTROL :   ' . $_SESSION['codigo_control'], 0, 0);
    $pdf->Ln(4);
    $pdf->SetFont('Arial', 'B', 7);
    $pdf->Cell(1, 5, '', 0);
    $pdf->Cell(125, 2, '  Fecha Limite de Emision :   ' . $_SESSION['fecha_emision'], 0, 0);


    $pdf->Image($PNG_WEB_DIR . basename($filename), 175, $cont, 24, 24);

    $totalfactura = 0;
    $pdf->Ln(16);

    $cont1 = $cont1 + 24;
    $cont2 = $cont;
    $cont3 = $cont;





    for ($j = 2; $j <= $_SESSION['cantidad_facturas']; $j++) {

        $totalfactura = $totalfactura + $totalpagar;


        if ($j == 3) {
            $cont1 = $cont + $cont2+6;
            $cont3 = $cont + $cont2-18
        }
 if ($j == 4) {
            $cont1 = $cont + $cont2+58;
            $cont3 = $cont + $cont2+35;
        }

        
        $pdf->Ln(-2);
        $pdf->SetFont('Arial', 'B', 8);
        $pdf->Line(5, $cont1, 95, $cont1);
        $pdf->Cell(197, 5, 'FACTURA ' . $j . ' DE ' . $_SESSION['cantidad_facturas'].'-'.$cont1.'-'.$cont2.'-'.'-'.$cont1, 0, 0, 'C');
        $pdf->Line(122, $cont1, 210, $cont1);


        $pdf->Ln(8);
        include 'conexion_facturacion.php';
        $qa1 = pg_query("select * from public.factura a, public.dosificacion b, public.sucursal c 
where a.id_sucursal=c.id_sucursal and a.id_dosificacion=b.id_dosificacion and a.id_factura=" . $_SESSION["id_factura" . $j] . " ;");
        include 'desconectar_facturacion.php';
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

        $totalpagar = totalempresa($_SESSION['id_factura' . $j]);

        $pdf->Ln(-3);
        $pdf->SetFont('Arial', 'B', 6);
        $pdf->Cell(70, 1, utf8_decode( empresa($_SESSION['id_empresa'])), 0, 0, 'C');
        $pdf->Ln(2);
        $pdf->SetFont('Arial', 'B', 6);
        $pdf->Cell(3, 10, '', 0);
        $pdf->Cell(60, 1, $_SESSION['ubicacion_sucursal'], 0, 0, 'C');
        $pdf->Ln(3);
        $pdf->SetFont('Arial', 'B', 6);
        $pdf->Cell(3, 10, '', 0);
        $pdf->Cell(60, 1, utf8_decode($_SESSION['nombre_sucursal']), 0, 0, 'C');
        $pdf->Ln(3);
        $pdf->SetFont('Arial', 'B', 6);
        $pdf->Cell(3, 10, '', 0);
        $pdf->Cell(60, 1, $_SESSION['direccion_sucursal'], 0, 0, 'C');

        $pdf->Ln(3);
        $pdf->SetFont('Arial', 'B', 6);
        $pdf->Cell(3, 10, '', 0);
        $pdf->Cell(60, 1, "Telefono : " . $_SESSION['telefono'], 0, 0, 'C');


        $pdf->Ln(-11);
        $pdf->SetFont('Arial', 'B', 6);
        $pdf->Cell(135, 10, '', 0);
        $pdf->Cell(60, 14, " ", 0);

        $pdf->Ln(-7);
        $pdf->SetFont('Arial', 'B', 6);
        $pdf->Cell(140, 10, '', 0);
        $pdf->Cell(60, 20, "NIT                                     : " . $_SESSION['nit_area'], 0);
        $pdf->Ln(3);
        $pdf->SetFont('Arial', 'B', 6);
        $pdf->Cell(140, 10, '', 0);
        $pdf->Cell(60, 20, "FACTURA Nro                  : " . $_SESSION['numero_factura'], 0);
        $pdf->Ln(3);
        $pdf->SetFont('Arial', 'B', 6);
        $pdf->Cell(140, 10, '', 0);
        $pdf->Cell(60, 20, "AUTORIZACION Nro        : " . $_SESSION['numero_autorizacion'], 0);
        $pdf->Ln(1);
        if ($_SESSION['estado_factura'] == 1) {
            $pdf->Ln(10);
            $pdf->SetFont('Arial', 'B', 6);
            $pdf->Cell(140, 2, '', 0);
            $pdf->Cell(50, 5, 'ORIGINAL  ', 0, 0, 'C');
        } else {


            $pdf->Ln(10);
            $pdf->SetFont('Arial', 'B', 6);
            $pdf->Cell(155, 2, '', 0);
            $pdf->Cell(50, 5, 'ANULADO  ', 1, 0, 'C');

        }
        $pdf->Ln(2);
        $pdf->SetFont('Arial', 'B', 6);
        $pdf->Cell(124, 2, '', 0);
        $pdf->Cell(70, 5, 'Actividad Economica : ' . trim($_SESSION['actividad_economica']), 0, 0, 'C');

        include 'conexion_facturacion.php';
        $qa10 = pg_query("SELECT b.descripcion_articulo, a.cantidad, b.unidad_medida, c.precio_articulo
FROM public.cantidad_articulos_factura a, public.articulo b, public.precios_articulo c
where b.id_articulo=c.id_articulo and
  c.estado_precio_articulo=true and
  a.id_articulo=b.id_articulo and
  a.id_precio_articulo=c.id_precio_articulo and
  a.id_factura=" . $_SESSION['id_factura' . $j] . ";");
        include 'desconectar_facturacion.php';

//$row9 = pg_fetch_array($qa9);


        $pdf->Ln(4);
        $pdf->SetFillColor(153, 255, 100);

        $pdf->Cell(85, 3, 'CONCEPTO', 1, 0, 'C');
        $pdf->Cell(9, 3, 'CANT.', 1, 0, 'C');
        $pdf->Cell(15, 3, 'UNIDAD', 1, 0, 'C');
        $pdf->Cell(20, 3, 'PRECIO UNI.', 1, 0, 'C');
        $pdf->Cell(20, 3, 'SUBTOTAL', 1, 0, 'C');
        $pdf->Cell(20, 3, 'DESCUENTO', 1, 0, 'C');
        $pdf->Cell(25, 3, 'IMPORTE TOTAL', 1, 0, 'C');


        $cont = 67;
        if ($qa10) {
            $con = 3;
            $pdf->SetFont('Arial', '', 5);
            while ($array = pg_fetch_assoc($qa10)) {

                $descripcion = $array['descripcion_articulo'];
                $cantidad = number_format($array['cantidad'], 0, '.', '.');
                $medida = $array['unidad_medida'];
                $precio = number_format($array['precio_articulo'], 2, ',', '.');
                $subtotal = number_format($array['precio_articulo'] * $array['cantidad'], 2, ',', '.');
                $descuento = "";
                $impotetotal = number_format($array['precio_articulo'] * $array['cantidad'], 2, ',', '.');
                $pdf->Ln($con);
                $con = 3;
                $pdf->Cell(85, 3, utf8_decode($descripcion), 1, 0);
                $pdf->Cell(9,3, $cantidad, 1, 0, 'C');
                $pdf->Cell(15, 3, $medida, 1, 0, 'C');
                $pdf->Cell(20, 3, $precio, 1, 0, 'C');
                $pdf->Cell(20, 3, $subtotal, 1, 0, 'C');
                $pdf->Cell(20, 3, $descuento, 1, 0, 'C');
                $pdf->Cell(25, 3, $impotetotal, 1, 0, 'C');
                $cont = $cont + 3;

            }
        }
        $cont1 = $cont;

        $pdf->SetFont('Arial', 'B', 5);
        $pdf->Ln(3);
        $pdf->Cell(149, 3, '  SON:    ' . isset($totalpagar) ? numtoletras($totalpagar) : '', 1, 0);
        $pdf->Cell(20, 3, "TOTAL BS.", 1, 0, 'C');
        $pdf->Cell(25, 3, number_format($totalpagar, 2, ',', '.'), 1, 0, 'C');
        $pdf->Ln(8);
        $pdf->SetFont('Arial', 'B', 7);
        $pdf->Cell(1, 5, '', 0);
        $pdf->Cell(125, 2, '  CODIGO DE CONTROL :   ' . $_SESSION['codigo_control'], 0, 0);
        $pdf->Ln(4);
        $pdf->SetFont('Arial', 'B', 7);
        $pdf->Cell(1, 5, '', 0);
        $pdf->Cell(125, 2, '  Fecha Limite de Emision :   ' . $_SESSION['fecha_emision'], 0, 0);

        if($j==2) {

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

                QRcode::png($_SESSION['nit_area'] . "|" . $_SESSION["numero_factura"] . "|" . $_SESSION["numero_autorizacion"] . "|" . strftime("%d/%m/%Y") . "|" . $totalpagar . "|" . $totalpagar . "|" . trim($_SESSION['codigo_control']) . "|" . $_SESSION['nit_carnet'] . "|0|0|0|0.00", $filename, 'H', 2, 2);
            }

        }
        if($j==3){
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

                QRcode::png($_SESSION['nit_area'] . "|" . $_SESSION["numero_factura"] . "|" . $_SESSION["numero_autorizacion"] . "|" . strftime("%d/%m/%Y") . "|" . $totalpagar . "|" . $totalpagar . "|" . trim($_SESSION['codigo_control']) . "|" . $_SESSION['nit_carnet'] . "|0|0|0|0.00", $filename, 'H', 2, 2);
            }
        }
        if($j==4){
            $PNG_TEMP_DIR = dirname(__FILE__) . DIRECTORY_SEPARATOR . 'temp' . DIRECTORY_SEPARATOR;
//html PNG location prefix
            $PNG_WEB_DIR = 'temp/';

            if (!file_exists($PNG_TEMP_DIR))
                mkdir($PNG_TEMP_DIR);
            $filename = $PNG_TEMP_DIR . 'test3.png';
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
                $filename = $PNG_TEMP_DIR . 'test3' . md5($_REQUEST['data'] . '|' . $errorCorrectionLevel . '|' . $matrixPointSize) . '.png';
                QRcode::png($_REQUEST['data'], $filename, $errorCorrectionLevel, $matrixPointSize, 2);

            } else {

                QRcode::png($_SESSION['nit_area'] . "|" . $_SESSION["numero_factura"] . "|" . $_SESSION["numero_autorizacion"] . "|" . strftime("%d/%m/%Y") . "|" . $totalpagar . "|" . $totalpagar . "|" . trim($_SESSION['codigo_control']) . "|" . $_SESSION['nit_carnet'] . "|0|0|0|0.00", $filename, 'H', 2, 2);
            }
        }

        $pdf->Image($PNG_WEB_DIR.basename($filename), 175, ($cont3+$cont-18), 24, 24);
        $pdf->Ln(15);
    }



    $totalfactura = $totalfactura + $totalpagar;
    if($_SESSION['cantidad_facturas'] >1) {
        $pdf->SetFont('Arial', 'B', 5);
        $pdf->Ln(3);
        $pdf->Cell(149, 4, 'IMPORTE TOTAL A PAGAR', 1, 0);
        $pdf->Cell(20, 4, "Bolivianos", 1, 0, 'C');
        $pdf->Cell(25, 4, number_format($totalfactura, 2, ',', '.'), 1, 0, 'C');
        $pdf->Ln(4);
        $pdf->Cell(194, 4, '  SON:    ' . isset($totalfactura) ? numtoletras($totalfactura) : '', 1, 0);
        $pdf->Ln();
    }
    $pdf->SetFont('Arial', 'B', 6);
    $pdf->Cell(190, 3, '"ESTA FACTURA CONTRIBUYE AL DESARROLLO DEL PAIS, EL USO ILICITO 
DE ESTA SERA SANCIONADO DE ACUERDO A LA LEY"', 0, 0, 'C');
    $pdf->Ln(3);
    $pdf->SetFont('Arial', 'B', 6);
    $pdf->Cell(190, 3, utf8_decode(leyenda($_SESSION['leyenda_factura'])), 0, 0, 'C');
    $pdf->Output("Factura" . strftime("_%A %#d de %B del %Y") . ".pdf", "I");
}

function empresa($id_empresa){
    if($id_empresa==1){$empresa="EMPRESA PÚBLICA LÁCTEOS DE BOLIVIA";}
    if($id_empresa==2){$empresa="EMPRESA BOLIVIANA DE ALMENDRAS Y DERIVADOS";}
    if($id_empresa==3){$empresa="EMPRESA PÚBLICA PRODUCTICA PAPELES DE BOLIVIA";}
     if($id_empresa==4){$empresa="EMPRESA PÚBLICA PRODUCTICA DE MIEL";}
    return $empresa;
}
function totalempresa($id_factura)
{
    include 'conexion_facturacion.php';
    $qa1 = pg_query("SELECT a.cantidad, c.precio_articulo
FROM public.cantidad_articulos_factura a, public.articulo b, public.precios_articulo c
where b.id_articulo=c.id_articulo and
  c.estado_precio_articulo=true and
  a.id_articulo=b.id_articulo and
  a.id_precio_articulo=c.id_precio_articulo and
  a.id_factura=" . $id_factura . ";");
    include 'desconectar_facturacion.php';

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
        $ley = "Ley N° 453: El proveedor de productos debe habilitar medios e instrumentos para efectuar consultas y reclamaciones.";
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
        $ley = "Ley N� 453: Los servicios deben suministrarse en condiciones de inocuidad, calidad y seguridad.";
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