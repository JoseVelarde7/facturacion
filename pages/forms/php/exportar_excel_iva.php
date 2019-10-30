<?php
@session_start();
if (PHP_SAPI == 'cli')
    die('Este ejemplo sólo se puede ejecutar desde un navegador Web');
/** Incluye PHPExcel */
require_once dirname(__FILE__) . '../../classes/Classes/PHPExcel.php';
// Crear nuevo objeto PHPExcel
$objPHPExcel = new PHPExcel();

// Propiedades del documento
$objPHPExcel->getProperties()->setCreator("SEDEM")
    ->setLastModifiedBy("SEDEM")
    ->setTitle("Office 2010 XLSX Documento de prueba")
    ->setSubject("Office 2010 XLSX Documento de prueba")
    ->setDescription("Documento de prueba para Office 2010 XLSX, generado usando clases de PHP.")
    ->setKeywords("office 2010 openxml php")
    ->setCategory("Archivo Libro IVA");

include "conexion_facturacion.php";
/*
$consulta1="select MAX(fec_fac)from factura WHERE fec_fac>'".$_SESSION['fecha_inicial']."' and fec_fac<'".$_SESSION['fecha_fin']."';";

$query = mysql_query($consulta, $conexion);
include  "desconectar.php";

$row1 = mysql_fetch_array($consulta1);// guardo el resultado en un array
if (is_array($row1)) { // verifico q exista el array en caso positivo
    $_SESSION["fechamaxima"] = $row1['fec_fac'];
}
include "conexion.php";
$consulta2="select MIN(fec_fac) from factura WHERE fec_fac>'".$_SESSION['fecha_inicial']."' and fec_fac<'".$_SESSION['fecha_fin']."';";
$query = mysql_query($consulta, $conexion);
include  "desconectar.php";
$row2 = mysql_fetch_array($consulta2);// guardo el resultado en un array
if (is_array($row2)) { // verifico q exista el array en caso positivo
    $_SESSION["fechaminima"] = $row2['fec_fac'];
}
*/
// Combino las celdas desde A1 hasta E1
$objPHPExcel->setActiveSheetIndex(0)->mergeCells('A1:I1');

$objPHPExcel->setActiveSheetIndex(0)
    ->setCellValue('A1', 'LIBRO IVA ')
 //   ->setCellValue('D2', 'Fecha Minima')
    //->setCellValue('E2', 'dasdsadsad')
   // ->setCellValue('H2', 'fecha Maxima')
   // ->setCellValue('I2',  $_SESSION["fechamaxima"])
    ->setCellValue('A3', 'Nro')
    ->setCellValue('B3', 'APELLIDO PATERNO')
    ->setCellValue('C3', 'APELLIDO MATERNO')
    ->setCellValue('D3', 'NOMBRES')
    ->setCellValue('E3', 'LIBRO')
    ->setCellValue('F3', 'PENSION');

// Fuente de la primera fila en negrita
$boldArray = array('font' => array('bold' => true,),'alignment' => array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER));

$objPHPExcel->getActiveSheet()->getStyle('A1:J3')->applyFromArray($boldArray);
//Ancho de las columnas
$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(8);
$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(30);
$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(30);
$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(40);
$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(20);
//$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(15);

	$cel=4;//Numero de fila donde empezara a crear  el reporte
$numero=0;
include 'conexion_facturacion.php';
$qa3 = pg_query ("select * from articulo where id_empresa=2");

include 'desconectar_facturacion.php';

while ($row13 = pg_fetch_assoc($qa3)) {
    $paterno = "dsadsad";
    $materno = "dsadsad";
    $nombre = "dsadsad";
    $libro = "dsadsad";
    $pension = "dsadsad";


    $a = "A" . $cel;
    $b = "B" . $cel;
    $c = "C" . $cel;
    $d = "D" . $cel;
    $e = "E" . $cel;
    $f = "F" . $cel;

    // Agregar datos
    $objPHPExcel->setActiveSheetIndex(0)
        ->setCellValue($a, $numero += 1)
        ->setCellValue($b, $paterno)
        ->setCellValue($c, $materno)
        ->setCellValue($d, $nombre)
        ->setCellValue($e, $libro)
        ->setCellValue($f, $pension);


    $cel += 1;
}
$objPHPExcel->setActiveSheetIndex(0)
    ->setCellValue('D'.$cel, 'TOTAL')
      ->setCellValue('E'.$cel, '=SUM(E4:E'.($cel-1).')')
    ->setCellValue('F'.$cel, '=SUM(F4:F'.($cel-1).')');

/*Fin extracion de datos MYSQL*/
$rango="A3:$f";
$styleArray = array('font' => array( 'name' => 'Arial','size' => 10),
    'borders'=>array('allborders'=>array('style'=> PHPExcel_Style_Border::BORDER_THIN,'color'=>array('argb' => 'FFF')))
);
$objPHPExcel->getActiveSheet()->getStyle($rango)->applyFromArray($styleArray);
// Cambiar el nombre de hoja de cálculo
$objPHPExcel->getActiveSheet()->setTitle('Reporte Libro IVA');

$rango="D".$cel.":F".$cel;
$styleArray = array('font' => array( 'name' => 'Arial','size' => 10),
    'borders'=>array('allborders'=>array('style'=> PHPExcel_Style_Border::BORDER_THIN,'color'=>array('argb' => 'FFF')))
);
// Establecer índice de hoja activa a la primera hoja , por lo que Excel abre esto como la primera hoja
$objPHPExcel->setActiveSheetIndex(0);


// Redirigir la salida al navegador web de un cliente ( Excel5 )
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="reporte.xls"');
header('Cache-Control: max-age=0');
// Si usted está sirviendo a IE 9 , a continuación, puede ser necesaria la siguiente
header('Cache-Control: max-age=1');

// Si usted está sirviendo a IE a través de SSL , a continuación, puede ser necesaria la siguiente
header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
header ('Pragma: public'); // HTTP/1.0

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
$objWriter->save('php://output');
exit;

