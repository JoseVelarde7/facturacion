<?PHP
session_start();


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
        $this->Cell(0, 10, strftime("%d-%b-%Y %H:%M:%S"), 0, 0, 'L');
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
$pdf->AddPage('L', 'A4');
$pdf->AliasNbPages();
$pdf->SetFont('Arial', 'B', 12);
$pdf->Ln(-15);
$pdf->Cell(275, 10, 'Resumen de Ventas', 0, 0, 'C');
$pdf->Ln(5);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(275, 8, "Del 01 - " . mes($_SESSION['mes']) . " - " . $_SESSION['anio'] . " Al " . $_SESSION["diafinal"] . " - " . mes($_SESSION['mes']) . " - " . $_SESSION['anio'], 0, 0, 'C');
$pdf->Ln(4);
$pdf->Cell(275, 8, "(Expresado en Bolivianos)", 0, 0, 'C');


include "conexion_facturacion.php";
$sucursal = pg_query("select * from sucursal where id_empresa=" . $_SESSION["empresa_iva"]);
include "desconectar_facturacion.php";

$totacantidad = 0;
$totaprecio = 0;


while ($array11 = pg_fetch_assoc($sucursal)) {


    include "conexion_facturacion.php";
    $consulta1 = pg_query("select * from empresa a, sucursal where a.id_empresa=" . $_SESSION["empresa_iva"] . "and id_sucursal=" . $array11['id_sucursal']);
    include "desconectar_facturacion.php";
    $row11 = pg_fetch_array($consulta1);
    if (is_array($row11)) {
        $nombre_empresa = $row11['nombre_empresa'];
        $nombre_completo = $row11['nombre_completo'];
        $nombre_sucursal = $row11['nombre_sucursal'];
        $direccion_sucursal = $row11['direccion_sucursal'];
    }

    $pdf->Ln(10);
    $pdf->Ln(-4);
    $pdf->SetFont('Arial', 'B', 8);
    $pdf->Cell(50, 4, utf8_decode('Entidad : '), 1, 0, 'R');
    $pdf->Cell(230, 4, utf8_decode($nombre_completo), 1, 0, 'L');
    $pdf->Ln(4);
    $pdf->Cell(50, 4, 'Programa : ', 1, 0, 'R');
    $pdf->Cell(230, 4, utf8_decode($nombre_sucursal), 1, 0, 'L');
    $pdf->Ln(4);
    $pdf->Cell(50, 4, 'Direccion : ', 1, 0, 'R');
    $pdf->Cell(230, 4, utf8_decode($direccion_sucursal), 1, 0, 'L');
    $a = 20;
    $b = 90;
    $c = 20;
    $d = 20;
    $e = 20;
    $f = 20;
    $g = 15;
    $h = 20;
    $i = 20;
    $j = 20;
    $k = 15;
    $pdf->Ln(4);
    $pdf->Cell(150, 4, '', 0, 0, 'C');
    $pdf->Cell(130, 4, 'Consumo', 1, 0, 'C');
    $pdf->Ln(4);
    $pdf->SetFillColor(153, 255, 100);
    $pdf->SetFont('Arial', 'B', 8);
    $pdf->Cell($a, 8, '', 1, 0, 'C');
    $pdf->Cell($b, 8, '', 1, 0, 'C');
    $pdf->Cell($c, 8, '', 1, 0, 'C');
    $pdf->Cell($d, 8, '', 1, 0, 'C');
    $pdf->Cell($e, 8, '', 1, 0, 'C');
    $pdf->Cell($f, 8, '', 1, 0, 'C');
    $pdf->Cell($g, 8, '', 1, 0, 'C');
    $pdf->Cell($h, 8, '', 1, 0, 'C');
    $pdf->Cell($i, 8, '', 1, 0, 'C');
    $pdf->Cell($j, 8, '', 1, 0, 'C');
    $pdf->Cell($k, 8, '', 1, 0, 'C');
    $pdf->Ln(-2);
    $pdf->Cell($a, 10, utf8_decode('Codigo'), 0, 0, 'C');
    $pdf->Cell($b, 10, nl2br('Descripcion'), 0, 0, 'C');
    $pdf->Cell($c, 10, utf8_decode('Lote'), 0, 0, 'C');
    $pdf->Cell($d, 10, utf8_decode('Unidad'), 0, 0, 'C');
    $pdf->Cell($e, 10, 'Cantidad', 0, 0, 'C');
    $pdf->Cell($f, 10, 'Precio de', 0, 0, 'C');
    $pdf->Cell($g, 10, 'Descuento', 0, 0, 'C');
    $pdf->Cell($h, 10, 'Precio', 0, 0, 'C');
    $pdf->Cell($i, 10, 'Costo', 0, 0, 'C');
    $pdf->Cell($j, 10, 'Margen', 0, 0, 'C');
    $pdf->Cell($k, 10, '%', 0, 0, 'C');
    $pdf->Ln(5);
    $pdf->Cell($a, 5, utf8_decode(''), 0, 0, 'C');
    $pdf->Cell($b, 5, nl2br(''), 0, 0, 'C');
    $pdf->Cell($c, 5, utf8_decode(''), 0, 0, 'C');
    $pdf->Cell($d, 5, utf8_decode(''), 0, 0, 'C');
    $pdf->Cell($e, 5, 'Vendida', 0, 0, 'C');
    $pdf->Cell($f, 5, ' Venta', 0, 0, 'C');
    $pdf->Cell($g, 5, '', 0, 0, 'C');
    $pdf->Cell($h, 5, ' Vendido ', 0, 0, 'C');
    $pdf->Cell($i, 5, ' ', 0, 0, 'C');
    $pdf->Cell($j, 5, 'Utilidad', 0, 0, 'C');
    $pdf->Cell($k, 5, ' ', 0, 0, 'C');





    $totalcantidad = 0;
    $totalprecio = 0;
    include "conexion_facturacion.php";
    $consulta = pg_query("select distinct(a.id_articulo), a.descripcion_articulo,a.cantidad_representativa, a.unidad_representativa, a.id_empresa
FROM  public.articulo a where a.id_empresa=" . $_SESSION['empresa_iva']);
    include "desconectar_facturacion.php";


    if (pg_num_rows($consulta) > 0) {
        $nn = 1;

        $pdf->Ln(5);
        $pdf->SetFont('Arial', '', 8);
        $pdf->Cell(280, 5, utf8_decode($nombre_sucursal." - ".$direccion_sucursal), 1, 0, 'L');
        $num = 1;

        $cont = 80;
        if ($consulta) {
            $con = 5;
            $pdf->SetFont('Arial', '', 5);
            while ($array = pg_fetch_assoc($consulta)) {


                $codigoarticulo = $array['id_articulo'];
                $descripcionarticulo = $array['descripcion_articulo'];
                $unidad = round($array['cantidad_representativa'], 2) . " " . $array['unidad_representativa'];
                $cantidad = cantidad1($array['id_articulo'],$array11['id_sucursal'], $_SESSION["fechainicial"], $_SESSION["fechafinal"]);


                if ($cantidad != 0) {
                    $precio = precio1($array['id_articulo'],$array11['id_sucursal'], $_SESSION["fechainicial"], $_SESSION["fechafinal"]);
                    $totalcantidad = sumacantidad($totalcantidad, $cantidad);

                    $totalprecio = sumaprecio($totalprecio, $precio);


                    $pdf->Ln($con);
                    $con = 5;
                    $pdf->Cell($a, 5, $codigoarticulo, 1, 0, 'R');
                    $pdf->Cell($b, 5, utf8_decode($descripcionarticulo), 1, 0, 'L');
                    $pdf->Cell($c, 5, "0", 1, 0, 'R');
                    $pdf->Cell($d, 5, $unidad, 1, 0, 'L');
                    $pdf->Cell($e, 5, number_format($cantidad, 2, '.', '.'), 1, 0, 'R');
                    $pdf->Cell($f, 5, number_format($precio, 2, ',', '.'), 1, 0, 'R');
                    $pdf->Cell($g, 5, "0", 1, 0, 'R');
                    $pdf->Cell($h, 5, number_format($precio, 2, ',', '.'), 1, 0, 'R');
                    $pdf->Cell($i, 5, "0", 1, 0, 'R');
                    $pdf->Cell($j, 5, number_format($precio, 2, ',', '.'), 1, 0, 'R');
                    $pdf->Cell($k, 5, "100,00", 1, 0, 'C');
                    $cont = $cont + 5;
                    $num = $num + 1;
                }
            }

        }

        $totacantidad = sumacantidad($totacantidad, $totalcantidad);
        $totaprecio = sumaprecio($totaprecio, $totalprecio);
        $pdf->SetFont('Arial', 'B', 7);
        $pdf->Ln(5);
        $pdf->Cell(150, 5, utf8_decode('Totales Parcial : '), 1, 0, 'R');
        $pdf->Cell($e, 5, number_format($totalcantidad, 2, '.', '.'), 1, 0, 'R');
        $pdf->Cell($f, 5, number_format($totalprecio, 2, ',', '.'), 1, 0, 'R');
        $pdf->Cell($g, 5, '0', 1, 0, 'R');
        $pdf->Cell($h, 5, number_format($totalprecio, 2, ',', '.'), 1, 0, 'R');
        $pdf->Cell($i, 5, '0', 1, 0, 'R');
        $pdf->Cell($j, 5, number_format($totalprecio, 2, ',', '.'), 1, 0, 'R');
        $pdf->Cell($k, 5, '0', 1, 0, 'R');

    }

    $pdf->Ln(3);
}
    $pdf->SetFont('Arial', 'B', 8);
    $pdf->Ln(5);
    $pdf->Cell(150, 5, utf8_decode('Totales  : '), 1, 0, 'C');
    $pdf->Cell($e, 5, number_format($totacantidad, 2, '.', '.'), 1, 0, 'R');
    $pdf->Cell($f, 5, number_format($totaprecio, 2, ',', '.'), 1, 0, 'R');
    $pdf->Cell($g, 5, '0', 1, 0, 'R');
    $pdf->Cell($h, 5, number_format($totaprecio, 2, ',', '.'), 1, 0, 'R');
    $pdf->Cell($i, 5, '0', 1, 0, 'R');
    $pdf->Cell($j, 5, number_format($totaprecio, 2, ',', '.'), 1, 0, 'R');
    $pdf->Cell($k, 5, '0', 1, 0, 'R');




function sumacantidad($total, $cantidad)
{
    $total = $total + $cantidad;
    return $total;
}

function sumaprecio($total, $precio)
{
    $total = $total + $precio;
    return $total;
}


function cantidad1($id_articulo,$id_sucursal, $fechainicial, $fechafinal)
{
    $total = 0;
    include 'conexion_facturacion.php';

    $qa11 = pg_query("SELECT sum(cantidad) 
  FROM factura a, cantidad_articulos_factura b
  WHERE a.id_factura=b.id_factura
  and a.id_sucursal=" . $id_sucursal . "
  and b.id_articulo=" . $id_articulo . "
  and a.estado_factura=1
  and  a.fecha_factura > '" . $fechainicial . "' 
  and  a.fecha_factura <'" . $fechafinal . "'");
    include 'desconectar_facturacion.php';

    if (pg_num_rows($qa11) > 0) {

        $row21 = pg_fetch_array($qa11);

        if (is_array($row21)) {
            $canti = $row21['sum'];
        }
        $total = $canti;
    } ELSE {

        $total = 0;
    }
    return $total;
}
function precio1($id_articulo,$id_sucursal, $fechainicial, $fechafinal)
{
    $total = 0;
    include 'conexion_facturacion.php';
    $qa11 = pg_query("
SELECT b.cantidad, c.precio_articulo
FROM factura a, cantidad_articulos_factura b, precios_articulo c
WHERE a.id_factura=b.id_factura
 and a.id_sucursal=" . $id_sucursal . "
and b.id_precio_articulo=c.id_precio_articulo
  and a.estado_factura=1
and b.id_articulo=" . $id_articulo . " 
and a.fecha_factura>'" . $fechainicial . "' and a.fecha_factura<'" . $fechafinal . "'");
    include 'desconectar_facturacion.php';
    $total1 = 0;
    if (pg_num_rows($qa11) > 0) {
        while ($array = pg_fetch_assoc($qa11)) {
            $mult = ($array['cantidad'] * $array['precio_articulo']);
            $total1 = $total1 + $mult;
        }
        $total = $total1;
    } ELSE {

        $total = 0;
    }
    return $total;
}


    function cantidad($id_articulo, $fechainicial, $fechafinal)
    {
        $total = 0;
        include 'conexion_facturacion.php';

        $qa11 = pg_query("SELECT sum(cantidad) 
  FROM factura a, cantidad_articulos_factura b
  WHERE a.id_factura=b.id_factura
  and b.id_articulo=" . $id_articulo . "
  and a.estado_factura=1
  and  a.fecha_factura > '" . $fechainicial . "' 
  and  a.fecha_factura <'" . $fechafinal . "'");
        include 'desconectar_facturacion.php';

        if (pg_num_rows($qa11) > 0) {

            $row21 = pg_fetch_array($qa11);

            if (is_array($row21)) {
                $canti = $row21['sum'];
            }
            $total =$canti;
        } ELSE {

            $total = 0;
        }
        return $total;
    }

    function precio($id_articulo, $fechainicial, $fechafinal)
    {
        $total = 0;
        include 'conexion_facturacion.php';
        $qa11 = pg_query("
SELECT b.cantidad, c.precio_articulo
FROM factura a, cantidad_articulos_factura b, precios_articulo c
WHERE a.id_factura=b.id_factura
and b.id_precio_articulo=c.id_precio_articulo
  and a.estado_factura=1
and b.id_articulo=" . $id_articulo . " 
and a.fecha_factura>'" . $fechainicial . "' and a.fecha_factura<'" . $fechafinal . "'");
        include 'desconectar_facturacion.php';
        $total1 = 0;
        if (pg_num_rows($qa11) > 0) {
            while ($array = pg_fetch_assoc($qa11)) {
                $mult = ($array['cantidad'] * $array['precio_articulo']);
                $total1 = $total1 + $mult;
            }
            $total =$total1;
        } ELSE {

            $total = 0;
        }
        return $total;
    }

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
$pdf->Output("Factura" . strftime("_%A %#d de %B del %Y") . ".pdf", "I");
    ?>