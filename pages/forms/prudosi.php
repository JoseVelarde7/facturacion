<!DOCTYPE html>
<html>
<?php
session_start();
?>
<head>

    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Nuevo Administrador</title>
    <!-- Favicon-->
    <link rel="shortcut icon" href="../../images/user1.png">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="../../plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="../../plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="../../plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Preloader Css -->
    <link href="../../plugins/material-design-preloader/md-preloader.css" rel="stylesheet" />

    <!-- Bootstrap Material Datetime Picker Css -->
    <link href="../../plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet" />
    <!-- Wait Me Css -->
    <link href="../../plugins/waitme/waitMe.css" rel="stylesheet" />

    <!-- Bootstrap Select Css -->
    <link href="../../plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />
    <!-- Sweet Alert Css -->
    <link href="../../plugins/sweetalert/sweetalert.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="../../css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="../../css/themes/all-themes.css" rel="stylesheet" />
</head>

<body class="theme-teal">
<!-- Page Loader -->
<?php include "cabecera.php";?>
<!-- #Top Bar -->
<section>
    <!-- Left Sidebar -->

    <aside id="leftsidebar" class="sidebar">
        <!-- User Info -->
        <div class="user-info">
            <br>
            <br>
            <div class="image">
            <div class="image">

            </div>
            <div class="info-container">
                <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION["usuario"] ?></div>
                <div class="email">EBA</div>

            </div>
        </div>
        <!-- #User Info -->
        <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header"><?php echo "Area : " . $_SESSION["nombre_area"] ?></li>
                    <li>
                        <a href="../../pages/forms/pagina_principal.php">
                            <i class="material-icons">home</i>
                            <span>Inicio</span>
                        </a>
                    </li>


                    <li>
                        <a href="../../pages/forms/nueva_sucursal.php">
                            <i class="material-icons">note_add</i>
                            <span>Nueva Sucursal</span>
                        </a>
                    </li>
                    <li>
                        <a href="../../pages/forms/nueva_dosificacion.php">
                            <i class="material-icons">note</i>
                            <span>Ingresar Nueva Dosificacion</span>
                        </a>
                    </li>
                    <li class="active">
                        <a href="../../pages/forms/precio_producto.php">
                            <i class="material-icons">swap_horiz</i>
                            <span>Precio de los productos</span>
                        </a>
                    </li>
                    <li>
                        <a href="../../pages/forms/venta_producto.php">
                            <i class="material-icons">note_add</i>
                            <span>Facturar</span>
                        </a>
                    </li>
                    <li>
                        <a href="logout.php">
                            <i class="material-icons">close</i>
                            <span>Salir</span>
                        </a>
                    </li>

                </ul>
            </div>
        <!-- #Menu -->
        <!-- Footer -->
       <?php include "pie_pagina.php"?>
        <!-- #Footer -->
    </aside>
    <!-- #END# Left Sidebar -->
    <!-- Right Sidebar -->

    <!-- #END# Right Sidebar -->
</section>

<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>
                FORMULARIO DE INSCRIPCION DEL NUEVO ESTUDIANTE

            </h2>
        </div>
        <!-- Basic Validation -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>INGRESE LOS DATOS DEL LA DOSIFICACION</h2>

                    </div>
                    <div class="body">
                        <form id="form_validation" method="POST" >
                            <div class="form-group form-float">

                                <div class="form-line">
                                    <input type="text" class="form-control" name="auto" required>
                                    <label class="form-label">NUMERO DE AUTORIZACION</label>
                                </div>

                            </div>
                            <div class="row clearfix">

                                <div class="col-sm-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="num_fac" required>
                                            <label class="form-label">NUMERO DE FACTURA</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="nit" required>
                                            <label class="form-label">NIT</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="emisi" required>
                                            <label class="form-label">FECHA DE EMISION </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row clearfix">

                                <div class="col-sm-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="monto" required>
                                            <label class="form-label">MONTO </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="dosifi" required>
                                            <label class="form-label">LLAVE DE DOSIFICACION </label>
                                        </div>
                                    </div>
                                </div>
                            </div>




                            <button type="submit" class="btn btn-primary waves-effect" name = "guardar">GENERAR</button>




                            <?php
                            if(isset($_POST['guardar'])) {


                                setlocale(LC_TIME, 'spanish');
                                date_default_timezone_set("America/La_Paz");

                                $auto = $_POST['auto'];
                                $num_fac = $_POST['num_fac'];
                                $nit = $_POST['nit'];
                                $emi = $_POST['emisi'];
                                $monto = $_POST['monto'];
                                $dosif = $_POST['dosifi'];


                                /*echo $auto.'<br>';
                                echo $num_fac.'<br>';
                                echo $nit.'<br>';
                                echo $emi.'<br>';
                                echo $monto.'<br>';*/

                                include 'sin/ControlCode.php';
                                try {

                                    $controlCode = new ControlCode();
                                    $count = 0;

                                    //genera codigo de control
                                    $code = $controlCode->generate($auto,//Numero de autorizacion
                                        $num_fac,//Numero de factura
                                        $nit,//Número de Identificación Tributaria o Carnet de Identidad
                                        str_replace('/', '', $emi),//fecha de transaccion de la forma AAAAMMDD
                                        $monto,//Monto de la transacción
                                        $dosif//Llave de dosificación
                                    );
                                    echo '<br/>';
                                    echo '<br/>';
                                    $_POST['codi'] = $code;

                                } catch (Exception $e) {
                                    echo "Error de generacion de codigo Contactese con el area de sistemas";
                                }

                                echo '<div class="alert alert-info"><strong> Codigo de Control :  </strong>' . $code . '</div>';


                                //set it to writable location, a place for temp generated PNG files
                                $PNG_TEMP_DIR = dirname(__FILE__) . DIRECTORY_SEPARATOR . 'temp' . DIRECTORY_SEPARATOR;

                                //html PNG location prefix
                                $PNG_WEB_DIR = 'temp/';

                                include "lib/phpqrcode/qrlib.php";

                                //ofcourse we need rights to create temp dir
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

                                    //default data

                                    QRcode::png($nit . "|" . $num_fac . "|" . $auto . "|" . strftime(" %#d/%m/%Y") . "|" . $monto . "|" . $monto . "|" . $code . "|" . "00000000" . "|0|0|0|0.00", $filename, 'H', 2, 2);

                                }


                                echo '<img src="' . $PNG_WEB_DIR . basename($filename) . '" /><hr/>';



                            }












                            ?>






                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Basic Validation -->
        <!-- Advanced Validation -->

        <!-- #END# Advanced Validation -->
        <!-- Validation Stats -->

        <!-- #END# Validation Stats -->
    </div>
</section>

<!-- Jquery Core Js -->
<script src="../../plugins/jquery/jquery.min.js"></script>

<!-- Bootstrap Core Js -->
<script src="../../plugins/bootstrap/js/bootstrap.js"></script>

<!-- Select Plugin Js -->
<script src="../../plugins/bootstrap-select/js/bootstrap-select.js"></script>

<!-- Slimscroll Plugin Js -->
<script src="../../plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

<!-- Jquery Validation Plugin Css -->
<script src="../../plugins/jquery-validation/jquery.validate.js"></script>

<!-- JQuery Steps Plugin Js -->
<script src="../../plugins/jquery-steps/jquery.steps.js"></script>

<!-- Sweet Alert Plugin Js -->
<script src="../../plugins/sweetalert/sweetalert.min.js"></script>

<!-- Waves Effect Plugin Js -->
<script src="../../plugins/node-waves/waves.js"></script>

<!-- Custom Js -->
<script src="../../js/admin.js"></script>
<script src="../../js/pages/forms/form-validation.js"></script>


</body>

</html>
<?php
