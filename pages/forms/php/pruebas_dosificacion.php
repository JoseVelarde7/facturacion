<?php
if (isset($_POST['guardar'])) {
    setlocale(LC_TIME, 'spanish');
    date_default_timezone_set("America/La_Paz");
    $auto = $_POST['numero_autorizacion'];
    $num_fac = $_POST['numero_factura'];
    $nit = $_POST['nit'];
    $emi = $_POST['fecha_emision'];
    $monto = $_POST['monto'];
    $dosif = $_POST['llave_dosificacion'];
    include 'classes/sin/ControlCode.php';
    try {
        $controlCode = new ControlCode();
        $count = 0;
        $code = $controlCode->generate($auto,
            $num_fac,
            $nit,
            str_replace('/', '', $emi),
            $monto,
            $dosif
        );

        $_SESSION['codigo_control'] = $code;

    } catch (Exception $e) {
        echo "Error de generacion de codigo Contactese con el area de sistemas";
    }
    echo '<div class="alert alert-warning"><strong> Codigo de Control :  </strong>' . $code . '</div>';



    $PNG_TEMP_DIR = dirname(__FILE__) . DIRECTORY_SEPARATOR . 'temp' . DIRECTORY_SEPARATOR;
    $PNG_WEB_DIR = 'temp/';
    include "classes/lib/phpqrcode/qrlib.php";
    if (!file_exists($PNG_TEMP_DIR))
        mkdir($PNG_TEMP_DIR);
    $filename = $PNG_TEMP_DIR . 'test.png';
    $errorCorrectionLevel = 'L';
    if (isset($_REQUEST['level']) && in_array($_REQUEST['level'], array('L', 'M', 'Q', 'H')))
        $errorCorrectionLevel = $_REQUEST['level'];
    $matrixPointSize = 4;
    if (isset($_REQUEST['size']))
        $matrixPointSize = min(max((int)$_REQUEST['size'], 1), 10);
    if (isset($_REQUEST['data'])) {
        if (trim($_REQUEST['data']) == '')
            die('data cannot be empty! <a href="?">back</a>');
        $filename = $PNG_TEMP_DIR . 'test' . md5($_REQUEST['data'] . '|' . $errorCorrectionLevel . '|' . $matrixPointSize) . '.png';
        QRcode::png($_REQUEST['data'], $filename, $errorCorrectionLevel, $matrixPointSize, 2);
    } else {
        QRcode::png($nit . "|" . $num_fac . "|" . $auto . "|" . strftime(" %#d/%m/%Y") . "|" . $monto . "|" . $monto . "|" . $_SESSION['codigo_control']  . "|" . "00000000" . "|0|0|0|0.00", $filename, 'H', 2, 2);
    }
    echo '<img src="' . $PNG_WEB_DIR . basename($filename) . '" /><hr/>';
}

?>
