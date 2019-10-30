<?PHP
session_start();
$empresa_iva = $_SESSION["empresaiva"];
$fechainicial=$_SESSION["fechainicial"];
$fechafinal=$_SESSION["fechafinal"];
?>
<?php

require 'conexion_facturacion.php';
//$dis=$_SESSION['distrital'];
require_once '../classes/Classes/PHPExcel.php';

$objPHPExcel = new PHPExcel();
$archivo="phpexcel";
// Set document properties




$objPHPExcel->getDefaultStyle()->getFont()->setName("Arial");
$objPHPExcel->getDefaultStyle()->getFont()->setSize("12");
//$objPHPExcel->getActiveSheet()->getStyle("A7:H7")->getFont()->setBold(true);

$boldArray = array('font' => array('bold' => true,),'alignment' => array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER));

$objPHPExcel->getActiveSheet()->getStyle('A2:P2')->applyFromArray($boldArray);
$objPHPExcel->getActiveSheet()->getStyle('A3:P3')->applyFromArray($boldArray);
$objPHPExcel->getActiveSheet()->getStyle('A4:P4')->applyFromArray($boldArray);


$objPHPExcel->getActiveSheet()->getStyle("A6")->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle("L6")->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle("A7")->getFont()->setBold(true);

$objPHPExcel->setActiveSheetIndex(0)->mergeCells('A2:P2');
$objPHPExcel->setActiveSheetIndex(0)->mergeCells('A3:P3');
$objPHPExcel->setActiveSheetIndex(0)->mergeCells('A4:P4');
$objPHPExcel->setActiveSheetIndex(0)->mergeCells('A5:P5');

$objPHPExcel->setActiveSheetIndex(0)->mergeCells('A6:E6');
$objPHPExcel->setActiveSheetIndex(0)->mergeCells('F6:K6');
$objPHPExcel->setActiveSheetIndex(0)->mergeCells('L6:M6');
$objPHPExcel->setActiveSheetIndex(0)->mergeCells('N6:P6');

$objPHPExcel->setActiveSheetIndex(0)->mergeCells('A7:E7');
$objPHPExcel->setActiveSheetIndex(0)->mergeCells('F7:P7');


$objPHPExcel->getDefaultStyle()
    ->getAlignment()
    ->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

$styleArray = array('font' => array( 'name' => 'Arial','size' => 10),
    'borders'=>array('allborders'=>array('style'=> PHPExcel_Style_Border::BORDER_THIN,'color'=>array('argb' => '000')))
);
$objPHPExcel->getActiveSheet()->getStyle('A9:P9')->applyFromArray($styleArray);
// Cambiar el nombre de hoja de cálculo
$objPHPExcel->getActiveSheet()->setTitle('Reporte Libro IVA');


$qa2 = pg_query("SELECT distinct(nombre_empresa), nombre_completo,nit_area FROM public.dosificacion a, public.sucursal b, public.empresa c where b.id_empresa=c.id_empresa and a.id_sucursal=b.id_sucursal and b.id_empresa=" . $empresa_iva);

$row1 = pg_fetch_array($qa2);



if (is_array($row1)) {
    $objPHPExcel->getActiveSheet()
        ->setCellValue('A2', 'REPORTE LIBRO IVA')
        ->setCellValue('A3', 'Periodo Fiscal:' . mes($_SESSION['mes']) . " - " . $_SESSION['anio'])
        ->setCellValue('A4', '(Expresado en Bolivianos)')
        ->setCellValue('A6', 'RAZON SOCIAL')
        ->setCellValue('F6',  trim($row1['nombre_completo']))
        ->setCellValue('L6', 'NIT')
        ->setCellValue('N6',  $row1['nit_area'])
        ->setCellValue('A7', 'DIRECCION')
        ->setCellValue('F7', 'Av. Jaimes Freyre Nº 9 Edif. IMPEXPAP II Zona Sopocachi');

}
$styleArray = array('font' => array( 'name' => 'Arial','size' => 10),
    'borders'=>array('allborders'=>array('style'=> PHPExcel_Style_Border::BORDER_THIN,'color'=>array('argb' => '000')))
);
$objPHPExcel->getActiveSheet()->getStyle('A6:P7')->applyFromArray($styleArray);
$objPHPExcel->getActiveSheet()
    ->getStyle('A9:P9')
    ->getFill()
    ->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
    ->getStartColor()->setARGB('77C469');

$objPHPExcel->getActiveSheet()
    ->getStyle('A6:E6')
    ->getFill()
    ->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
    ->getStartColor()->setARGB('E7A662');
$objPHPExcel->getActiveSheet()
    ->getStyle('L6:M6')
    ->getFill()
    ->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
    ->getStartColor()->setARGB('E7A662');
$objPHPExcel->getActiveSheet()
    ->getStyle('A7:E7')
    ->getFill()
    ->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
    ->getStartColor()->setARGB('E7A662');


// Miscellaneous glyphs, UTF-8
$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(10);
$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(15);
$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(15);
$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(25);
$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(10);
$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(40);
$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('M')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('N')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('O')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('P')->setWidth(20);
$objPHPExcel->getDefaultStyle()->getFont()->setSize("8");
$indice=9;
$objPHPExcel->getActiveSheet()
    ->setCellValue('A'.$indice, 'Nº')
    ->setCellValue('B'.$indice, 'FECHA FACTURA')
    ->setCellValue('C'.$indice, 'Nº DE FACTURA')
    ->setCellValue('D'.$indice, 'Nº DE AUTORIZACION')
    ->setCellValue('E'.$indice, 'ESTADO')
    ->setCellValue('F'.$indice, 'NIT/CI')
    ->setCellValue('G'.$indice, 'NOMBRE O RAZON SOCIAL')
    ->setCellValue('H'.$indice, 'IMPORTE TOTAL DE LA VENTA (A)')
    ->setCellValue('I'.$indice, 'IMPORTE ICE/EHD/TASAS (B)')
    ->setCellValue('J'.$indice, 'EXPORTACIONES Y OPERACIONES EXENTAS (C)')
    ->setCellValue('K'.$indice, 'VENTAS GRAVADAS A TASA CERO (D)')
    ->setCellValue('L'.$indice, 'SUBTOTAL (E=A-B-C-D)')
    ->setCellValue('M'.$indice, 'DESCUENTOS BONIFICACIONES Y REBAJAS (F)')
    ->setCellValue('N'.$indice, 'IMPORTE BASE PARA DEBITO O FISCAL (G=E-F)')
    ->setCellValue('O'.$indice, 'DEBITO FISCAL H=G*13%')
    ->setCellValue('P'.$indice, 'CODIGO DE CONTROL');



$consulta = pg_query("SELECT a.id_factura , a.fecha_factura ,a.numero_factura, a.estado_factura, a.numero_conjunta,
c.numero_autorizacion ,b.nit_carnet, b.cliente, a.codigo_control, c.id_sucursal, e.nombre_empresa
FROM public.factura a, public.cliente b, public.dosificacion c, sucursal d, empresa e
WHERE a.id_cliente=b.id_cliente
and d.id_sucursal=c.id_sucursal
and d.id_empresa=e.id_empresa
        and a.id_dosificacion= c.id_dosificacion
      and e.id_empresa=" . $empresa_iva . " and  a.fecha_factura >= '" . $fechainicial . "' and  a.fecha_factura <='" . $fechafinal . "' order by a.fechahora_aud_factura;");
$totalimporte = 0;
$totaldebito = 0;
$cont=1;
$da=10;
while($array = pg_fetch_array($consulta))
{
    $indice++;

    $numero = $cont;
    $fechafactura = $array['fecha_factura'];
    $numerofactura = $array['numero_factura'];
    $numeroautorizacion = $array['numero_autorizacion'];
    $estado = verda($array['estado_factura']);

    IF ($array['estado_factura'] == 1) {
        $nit = $array['nit_carnet'];
        $razonsocial = $array['cliente'];
        $importetotal =total($array['id_factura']);
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



    $objPHPExcel->getActiveSheet()
        ->setCellValue('A'.$indice, $numero)
        ->setCellValue('B'.$indice, $fechafactura)
        ->setCellValue('C'.$indice, $numerofactura)
        ->setCellValue('D'.$indice, ' '.$numeroautorizacion)
        ->setCellValue('E'.$indice, $estado)
        ->setCellValue('F'.$indice, ' '.$nit)
        ->setCellValue('G'.$indice, $razonsocial)
        ->setCellValue('H'.$indice, $importetotal)
        ->setCellValue('I'.$indice, "0.00")
        ->setCellValue('J'.$indice, "0.00")
        ->setCellValue('K'.$indice, "0.00")
        ->setCellValue('L'.$indice, $importetotal)
        ->setCellValue('M'.$indice, "0.00")
        ->setCellValue('N'.$indice, $importetotal)
        ->setCellValue('O'.$indice, $debito)
        ->setCellValue('P'.$indice, trim($codigocontrol));



    $cont++;

$da=$da+1;
}

$objPHPExcel->getActiveSheet()->getStyle('A9:P'.$da)->applyFromArray($styleArray);


$objPHPExcel->setActiveSheetIndex(0)->mergeCells('A'.$da.':G'.$da);
$objPHPExcel->getActiveSheet()
    ->setCellValue('A'.$da, 'TOTAL')
    ->setCellValue('H'.$da, $totalimporte)
    ->setCellValue('I'.$da, '0.00')
    ->setCellValue('J'.$da, '0.00')
    ->setCellValue('K'.$da, '0.00')
    ->setCellValue('L'.$da, $totalimporte)
    ->setCellValue('M'.$da, '0.00')
    ->setCellValue('N'.$da, $totalimporte)
    ->setCellValue('O'.$da, $totaldebito)
    ->setCellValue('P'.$da, '0');


$objPHPExcel->getActiveSheet()
    ->getStyle('A'.$da.':G'.$da)
    ->getFill()
    ->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
    ->getStartColor()->setARGB('E7A662');


$objPHPExcel->getActiveSheet()
    ->setTitle ('LIBRO IVA');

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Libro_IVA.xlsx"');
header('Cache-Control: max-age=0');

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('php://output');





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
    require 'conexion_facturacion.php';
    $qa11 = pg_query("SELECT b.descripcion_articulo, a.cantidad, b.unidad_medida, c.precio_articulo
  FROM public.cantidad_articulos_factura a, public.articulo b, public.precios_articulo c
  where b.id_articulo=c.id_articulo  and
  a.id_articulo=b.id_articulo and 
  a.id_precio_articulo=c.id_precio_articulo and
  a.id_factura=" . $id_fact . ";");

    while ($array = pg_fetch_assoc($qa11)) {
        $mult = $array['cantidad'] * $array['precio_articulo'];
        $total = $total + $mult;
    }
    $total2 = $total;
    return $total2;

}

function debito($id_fact)
{
    $total = 0;
    require 'conexion_facturacion.php';
    $qa11 = pg_query("SELECT b.descripcion_articulo, a.cantidad, b.unidad_medida, c.precio_articulo
  FROM public.cantidad_articulos_factura a, public.articulo b, public.precios_articulo c
  where b.id_articulo=c.id_articulo  and
  a.id_articulo=b.id_articulo and 
  a.id_precio_articulo=c.id_precio_articulo and
  a.id_factura=" . $id_fact . ";");

    while ($array = pg_fetch_assoc($qa11)) {
        $mult = $array['cantidad'] * $array['precio_articulo'];
        $total = $total + $mult;
    }
    $debito = $total * 0.13;
    $total2 = $debito;
    return $total2;

}

function total1($id_fact)
{

    $total = 0;

    require 'conexion_facturacion.php';
    $qa11 = pg_query("SELECT b.descripcion_articulo, a.cantidad, b.unidad_medida, c.precio_articulo
  FROM public.cantidad_articulos_factura a, public.articulo b, public.precios_articulo c
  where b.id_articulo=c.id_articulo 
  and a.id_articulo=b.id_articulo 
  and a.id_precio_articulo=c.id_precio_articulo 
  and a.id_factura=" . $id_fact . ";");

    while ($array = pg_fetch_assoc($qa11)) {
        $mult = $array['cantidad'] * $array['precio_articulo'];
        $total = $total + $mult;
    }

    return $total;

}

function debito1($id_fact)
{
    $total = 0;
    require 'conexion_facturacion.php';
    $qa11 = pg_query("SELECT b.descripcion_articulo, a.cantidad, b.unidad_medida, c.precio_articulo
  FROM public.cantidad_articulos_factura a, public.articulo b, public.precios_articulo c
  where b.id_articulo=c.id_articulo 
  and a.id_articulo=b.id_articulo 
  and a.id_precio_articulo=c.id_precio_articulo 
  and a.id_factura=" . $id_fact . ";");

    while ($array = pg_fetch_assoc($qa11)) {
        $mult = $array['cantidad'] * $array['precio_articulo'];
        $total = $total + $mult;
    }
    $debito = $total * 0.13;
    return $debito;

}

?>