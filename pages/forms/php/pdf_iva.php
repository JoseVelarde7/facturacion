<?PHP
session_start();
$empresa_iva = $_SESSION["empresaiva"];
$fechainicial=$_SESSION["fechainicial"];
$fechafinal=$_SESSION["fechafinal"];
?>
<?php
require('../classes/fpdf/fpdf.php');
setlocale(LC_TIME, 'spanish');
date_default_timezone_set("America/La_Paz");

class PDF extends FPDF
{
    function Footer()
    {
        $this->SetY(-10);
        $this->SetFont('Arial', 'I', '6');
        $this->Cell(0, 10, strftime("%#d-%b-%Y %H:%M:%S"), 0, 0, 'L');
        $this->Cell(0, 10, utf8_decode('Página ') . $this->PageNo() . ' de {nb}', 0, 0, 'R');
        $this->Line(5, 202, 290, 202);


    }

    function Header()
    {
        $this->Image('../../../images/user2.png', 10, 8, 33);
        $this->Ln(15);

    }
}

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage('L', 'A4');
$pdf->SetTitle("Libro IVA");

include 'conexion_facturacion.php';
$qa1 = pg_query("SELECT nombre_empresa, nombre_completo, nombre_sucursal, direccion_sucursal,nit_area, a.id_sucursal FROM public.dosificacion a, public.sucursal b, public.empresa c where b.id_empresa=c.id_empresa and a.id_sucursal=b.id_sucursal and b.id_empresa=" . $empresa_iva);
include 'desconectar_facturacion.php';
include 'conexion_facturacion.php';
$qa2 = pg_query("SELECT nombre_empresa, nombre_completo, nombre_sucursal, direccion_sucursal,nit_area, a.id_sucursal FROM public.dosificacion a, public.sucursal b, public.empresa c where b.id_empresa=c.id_empresa and a.id_sucursal=b.id_sucursal and b.id_empresa=" . $empresa_iva);
include 'desconectar_facturacion.php';


while ($array = pg_fetch_assoc($qa1)) {

    $row1 = pg_fetch_array($qa2);




//$pdf=new FPDF(‘L’,’cm’,’mcarta’);
    $pdf->Ln(-15);

    $pdf->SetFont('Arial', 'B', 12);

    $pdf->Cell(275, 10, 'Libro de Ventas', 0, 0, 'C');


    if (is_array($row1)) {


        $pdf->Ln(5);
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(275, 8, "Periodo Fiscal : " . mes($_SESSION['mes']) . " - " . $_SESSION['anio'], 0, 0, 'C');
        $pdf->Ln(4);
        $pdf->Cell(275, 8, "(Expresado en Bolivianos)", 0, 0, 'C');
        $pdf->Ln(10);


        $pdf->Ln(-2);
        $pdf->SetFont('Arial', 'B', 8);
        $pdf->Cell(50, 5, utf8_decode('RAZON SOCIAL: '), 1, 0, 'R');
        $pdf->Cell(150, 5, trim($row1['nombre_completo'])." - ".trim($row1['nombre_sucursal']), 1, 0, 'C');

        $pdf->Cell(20, 5, " NIT :", 1, 0, 'R');
        $pdf->Cell(59, 5, $row1['nit_area'], 1, 0, 'C');
        $pdf->Ln(5);
        $pdf->Cell(50, 5, 'DIRECCION : ', 1, 0, 'R');
        $pdf->Cell(229, 5, $row1['direccion_sucursal'], 1, 0, 'C');
    }

    $a = 3;
    $b = 15;
    $c = 8;
    $d = 20;
    $e = 5;
    $f = 20;
    $g = 78;
    $h = 15;
    $i = 12;
    $j = 16;
    $k = 12;
    $l = 15;
    $m = 15;
    $n = 15;
    $o = 15;
    $p = 15;
    $pdf->Ln(5);
    $pdf->SetFillColor(153, 255, 100);
    $pdf->SetFont('Arial', 'B', 5);
    $pdf->Cell($a, 13, '', 1, 0, 'C');
    $pdf->Cell($b, 13, '', 1, 0, 'C');
    $pdf->Cell($c, 13, '', 1, 0, 'C');
    $pdf->Cell($d, 13, '', 1, 0, 'C');
    $pdf->Cell($e, 13, '', 1, 0, 'C');
    $pdf->Cell($f, 13, '', 1, 0, 'C');
    $pdf->Cell($g, 13, '', 1, 0, 'C');
    $pdf->Cell($h, 13, '', 1, 0, 'C');
    $pdf->Cell($i, 13, '', 1, 0, 'C');
    $pdf->Cell($j, 13, '', 1, 0, 'C');
    $pdf->Cell($k, 13, '', 1, 0, 'C');
    $pdf->Cell($l, 13, '', 1, 0, 'C');
    $pdf->Cell($m, 13, '', 1, 0, 'C');
    $pdf->Cell($n, 13, '', 1, 0, 'C');
    $pdf->Cell($o, 13, '', 1, 0, 'C');
    $pdf->Cell($p, 13, '', 1, 0, 'C');
    $pdf->Ln(-2);
    $pdf->Cell($a, 10, utf8_decode('Nº'), 0, 0, 'C');
    $pdf->Cell($b, 10, nl2br('FECHA'), 0, 0, 'C');
    $pdf->Cell($c, 10, utf8_decode('Nº DE '), 0, 0, 'C');
    $pdf->Cell($d, 10, utf8_decode('Nº DE '), 0, 0, 'C');
    $pdf->Cell($e, 10, 'ES', 0, 0, 'C');
    $pdf->Cell($f, 10, 'NIT/ CI', 0, 0, 'C');
    $pdf->Cell($g, 10, 'NOMBRE O RAZON ', 0, 0, 'C');
    $pdf->Cell($h, 10, 'IMPORTE', 0, 0, 'C');
    $pdf->Cell($i, 10, 'IMPORTE', 0, 0, 'C');
    $pdf->Cell($j, 10, 'EXPORTACIONES', 0, 0, 'C');
    $pdf->Cell($k, 10, 'VENTAS  ', 0, 0, 'C');
    $pdf->Cell($l, 10, 'SUBTOTAL', 0, 0, 'C');
    $pdf->Cell($m, 10, 'DESCUENTOS, ', 0, 0, 'C');
    $pdf->Cell($n, 10, 'IMPORTE  ', 0, 0, 'C');
    $pdf->Cell($o, 10, 'DEBITO ', 0, 0, 'C');
    $pdf->Cell($p, 10, 'CODIGO DE', 0, 0, 'C');


    $pdf->Ln(5);
    $pdf->Cell($a, 5, utf8_decode(''), 0, 0, 'C');
    $pdf->Cell($b, 5, nl2br('FACTURA'), 0, 0, 'C');
    $pdf->Cell($c, 5, utf8_decode('FACTURA'), 0, 0, 'C');
    $pdf->Cell($d, 5, utf8_decode('AUTORIZACION'), 0, 0, 'C');
    $pdf->Cell($e, 5, 'TA', 0, 0, 'C');
    $pdf->Cell($f, 5, ' CLIENTE', 0, 0, 'C');
    $pdf->Cell($g, 5, 'SOCIAL', 0, 0, 'C');
    $pdf->Cell($h, 5, ' TOTAL DE LA ', 0, 0, 'C');
    $pdf->Cell($i, 5, ' ICE/IEHD/', 0, 0, 'C');
    $pdf->Cell($j, 5, 'Y OPERACIONES', 0, 0, 'C');
    $pdf->Cell($k, 5, 'GRAVADAS', 0, 0, 'C');
    $pdf->Cell($l, 5, '(E=A-B-C-D)', 0, 0, 'C');
    $pdf->Cell($m, 5, 'BONIFIACIO- ', 0, 0, 'C');
    $pdf->Cell($n, 5, 'BASE PARA ', 0, 0, 'C');
    $pdf->Cell($o, 5, 'FISCAL', 0, 0, 'C');
    $pdf->Cell($p, 5, 'CONTROL', 0, 0, 'C');


    $pdf->Ln(2);
    $pdf->Cell($a, 5, utf8_decode(''), 0, 0, 'C');
    $pdf->Cell($b, 5, nl2br(' '), 0, 0, 'C');
    $pdf->Cell($c, 5, utf8_decode(''), 0, 0, 'C');
    $pdf->Cell($d, 5, utf8_decode(''), 0, 0, 'C');
    $pdf->Cell($e, 5, 'DO', 0, 0, 'C');
    $pdf->Cell($f, 5, '', 0, 0, 'C');
    $pdf->Cell($g, 5, '', 0, 0, 'C');
    $pdf->Cell($h, 5, 'VENTA', 0, 0, 'C');
    $pdf->Cell($i, 5, 'TASAS', 0, 0, 'C');
    $pdf->Cell($j, 5, ' EXENTAS', 0, 0, 'C');
    $pdf->Cell($k, 5, 'A TASA CERO', 0, 0, 'C');
    $pdf->Cell($l, 5, '', 0, 0, 'C');
    $pdf->Cell($m, 5, 'NES Y REBAJAS', 0, 0, 'C');
    $pdf->Cell($n, 5, 'DEBITO FISCAL', 0, 0, 'C');
    $pdf->Cell($o, 5, 'H=G*13%', 0, 0, 'C');
    $pdf->Cell($p, 5, '', 0, 0, 'C');


    $pdf->Ln(2);
    $pdf->Cell($a, 5, utf8_decode(''), 0, 0, 'C');
    $pdf->Cell($b, 5, nl2br(' '), 0, 0, 'C');
    $pdf->Cell($c, 5, utf8_decode(''), 0, 0, 'C');
    $pdf->Cell($d, 5, utf8_decode(''), 0, 0, 'C');
    $pdf->Cell($e, 5, '', 0, 0, 'C');
    $pdf->Cell($f, 5, '', 0, 0, 'C');
    $pdf->Cell($g, 5, '', 0, 0, 'C');
    $pdf->Cell($h, 5, '(A)', 0, 0, 'C');
    $pdf->Cell($i, 5, '(B)', 0, 0, 'C');
    $pdf->Cell($j, 5, '(C)', 0, 0, 'C');
    $pdf->Cell($k, 5, '(D)', 0, 0, 'C');
    $pdf->Cell($l, 5, '', 0, 0, 'C');
    $pdf->Cell($m, 5, '(F)', 0, 0, 'C');
    $pdf->Cell($n, 5, '(G=E-F)', 0, 0, 'C');
    $pdf->Cell($o, 5, '', 0, 0, 'C');
    $pdf->Cell($p, 5, '', 0, 0, 'C');

    include "conexion_facturacion.php";
    $consulta = pg_query("SELECT a.id_factura , a.fecha_factura ,a.numero_factura, a.estado_factura, a.numero_conjunta,
c.numero_autorizacion ,b.nit_carnet, b.cliente, a.codigo_control 
FROM public.factura a, public.cliente b, public.dosificacion c
WHERE a.id_cliente=b.id_cliente
        and a.id_dosificacion= c.id_dosificacion
        and a.id_sucursal=" . $array['id_sucursal'] . " and  a.fecha_factura > '" . $fechainicial . "' and  a.fecha_factura <'" . $fechafinal . "' order by a.fechahora_aud_factura;");
    include "desconectar_facturacion.php";


    $num = 1;
    $totalimporte = 0;
    $totaldebito = 0;
    $cont = 80;


    if ($consulta) {
        $con = 6;
        $pdf->SetFont('Arial', '', 5);
        while ($array = pg_fetch_assoc($consulta)) {
            $numero = $num;
            $fechafactura = $array['fecha_factura'];
            $numerofactura = $array['numero_factura'];
            $numeroautorizacion = $array['numero_autorizacion'];
            $estado = verda($array['estado_factura']);

            IF ($array['estado_factura'] == 1) {
                $nit = $array['nit_carnet'];
                $razonsocial = $array['cliente'];
                $importetotal = total($array['id_factura']);
                $codigocontrol = $array['codigo_control'];
                $debito = debito($array['id_factura']);

                $totalimporte = $totalimporte + total1($array['id_factura']);
                $totaldebito = $totaldebito + debito1($array['id_factura']);


            } ELSE {
                $nit = 0;
                $razonsocial = "FACTURA ANULADA";
                $importetotal = "0.00";
                $codigocontrol = 0;
                $debito = "0.00";
            }
            $pdf->Ln($con);
            $con = 5;

            $pdf->Cell($a, 5, $numero, 1, 0, 'C');
            $pdf->Cell($b, 5, $fechafactura, 1, 0, 'C');
            $pdf->Cell($c, 5, $numerofactura, 1, 0, 'L');
            $pdf->Cell($d, 5, $numeroautorizacion, 1, 0, 'L');
            $pdf->Cell($e, 5, $estado, 1, 0, 'C');
            $pdf->Cell($f, 5, $nit, 1, 0, 'L');
            $pdf->Cell($g, 5, utf8_decode($razonsocial), 1, 0, 'L');
            $pdf->Cell($h, 5, $importetotal, 1, 0, 'R');
            $pdf->Cell($i, 5, "0.00", 1, 0, 'C');
            $pdf->Cell($j, 5, "0.00", 1, 0, 'C');
            $pdf->Cell($k, 5, "0.00", 1, 0, 'C');
            $pdf->Cell($l, 5, $importetotal, 1, 0, 'R');
            $pdf->Cell($m, 5, "0.00", 1, 0, 'C');
            $pdf->Cell($n, 5, $importetotal, 1, 0, 'R');
            $pdf->Cell($o, 5, $debito, 1, 0, 'R');
            $pdf->Cell($p, 5, $codigocontrol, 1, 0, 'L');

            $cont = $cont + 5;

            $num = $num + 1;
        }
    }

    $pdf->SetFont('Arial', 'B', 6);
    $pdf->Ln(5);
    $pdf->Cell(149, 5, "TOTALES : ", 1, 0, 'R');
    $pdf->Cell($h, 5, number_format($totalimporte, 2, ',', '.'), 1, 0, 'C');
    $pdf->Cell($i, 5, '0.00', 1, 0, 'C');
    $pdf->Cell($j, 5, '0.00', 1, 0, 'C');
    $pdf->Cell($k, 5, '0.00', 1, 0, 'C');
    $pdf->Cell($l, 5, number_format($totalimporte, 2, ',', '.'), 1, 0, 'C');
    $pdf->Cell($m, 5, '0.00', 1, 0, 'C');
    $pdf->Cell($n, 5, number_format($totalimporte, 2, ',', '.'), 1, 0, 'C');
    $pdf->Cell($o, 5, number_format($totaldebito, 2, ',', '.'), 1, 0, 'C');
    $pdf->Cell($p, 5, '0.00', 1, 0, 'C');


    if(pg_num_rows($consulta)>0) {
        $pdf->AddPage('L', 'A4');
    }
}


$pdf->Output("Factura" . strftime("_%A %#d de %B del %Y") . ".pdf", "I");


function mes($x)
{ // esta función regresa un subfijo para la cifra
    if ($x == 1) {
        $den = "ENERO";
    }
    if ($x == 2) {
        $den = "FEBRERO";
    }
    if ($x == 3) {
        $den = "MARZO";
    }
    if ($x == 4) {
        $den = "ABRIL";
    }
    if ($x == 5) {
        $den = "MAYO";
    }
    if ($x == 6) {
        $den = "JUNIO";
    }
    if ($x == 7) {
        $den = "JULIO";
    }
    if ($x == 8) {
        $den = "AGOSTO";
    }
    if ($x == 9) {
        $den = "SEPTIEMBRE";
    }
    if ($x == 10) {
        $den = "OCTUBRE";
    }
    if ($x == 11) {
        $den = "NOVIEMBRE";
    }
    if ($x == 12) {
        $den = "DICIEMBRE";
    }
    return $den;
}

function verda($estado)
{
    if ($estado == 1) {
        $veren = "V";
    } else {
        $veren = "A";
    }

    return $veren;
}

function total($id_fact)
{
    $total = 0;
    include 'conexion_facturacion.php';
    $qa11 = pg_query("SELECT b.descripcion_articulo, a.cantidad, b.unidad_medida, c.precio_articulo
  FROM public.cantidad_articulos_factura a, public.articulo b, public.precios_articulo c
  where b.id_articulo=c.id_articulo  and
  a.id_articulo=b.id_articulo and 
  a.id_precio_articulo=c.id_precio_articulo and
  a.id_factura=" . $id_fact . ";");
    include 'desconectar_facturacion.php';
    while ($array = pg_fetch_assoc($qa11)) {
        $mult = $array['cantidad'] * $array['precio_articulo'];
        $total = $total + $mult;
    }
    $total2 = number_format($total, 2, ',', '.');
    return $total2;

}

function debito($id_fact)
{
    $total = 0;
    include 'conexion_facturacion.php';
    $qa11 = pg_query("SELECT b.descripcion_articulo, a.cantidad, b.unidad_medida, c.precio_articulo
  FROM public.cantidad_articulos_factura a, public.articulo b, public.precios_articulo c
  where b.id_articulo=c.id_articulo  and
  a.id_articulo=b.id_articulo and 
  a.id_precio_articulo=c.id_precio_articulo and
  a.id_factura=" . $id_fact . ";");
    include 'desconectar_facturacion.php';
    while ($array = pg_fetch_assoc($qa11)) {
        $mult = $array['cantidad'] * $array['precio_articulo'];
        $total = $total + $mult;
    }
    $debito = $total * 0.13;
    $total2 = number_format($debito, 2, ',', '.');
    return $total2;

}

function total1($id_fact)
{

    $total = 0;

    include 'conexion_facturacion.php';
    $qa11 = pg_query("SELECT b.descripcion_articulo, a.cantidad, b.unidad_medida, c.precio_articulo
  FROM public.cantidad_articulos_factura a, public.articulo b, public.precios_articulo c
  where b.id_articulo=c.id_articulo 
  and a.id_articulo=b.id_articulo 
  and a.id_precio_articulo=c.id_precio_articulo 
  and a.id_factura=" . $id_fact . ";");
    include 'desconectar_facturacion.php';
    while ($array = pg_fetch_assoc($qa11)) {
        $mult = $array['cantidad'] * $array['precio_articulo'];
        $total = $total + $mult;
    }

    return $total;

}

function debito1($id_fact)
{
    $total = 0;
    include 'conexion_facturacion.php';
    $qa11 = pg_query("SELECT b.descripcion_articulo, a.cantidad, b.unidad_medida, c.precio_articulo
  FROM public.cantidad_articulos_factura a, public.articulo b, public.precios_articulo c
  where b.id_articulo=c.id_articulo 
  and a.id_articulo=b.id_articulo 
  and a.id_precio_articulo=c.id_precio_articulo 
  and a.id_factura=" . $id_fact . ";");
    include 'desconectar_facturacion.php';
    while ($array = pg_fetch_assoc($qa11)) {
        $mult = $array['cantidad'] * $array['precio_articulo'];
        $total = $total + $mult;
    }
    $debito = $total * 0.13;
    return $debito;

}
