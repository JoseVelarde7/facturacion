<?php
@session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>EBA</title>
    <!-- Favicon-->
    <link rel="shortcut icon" href="../../images/user2.png">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet"
          type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
    <!-- Bootstrap Core Css -->
    <link href="../../plugins/bootstrap/css/bootstrap.css" rel="stylesheet">
    <!-- Waves Effect Css -->
    <link href="../../plugins/node-waves/waves.css" rel="stylesheet"/>
    <!-- Animation Css -->
    <link href="../../plugins/animate-css/animate.css" rel="stylesheet"/>

    <!-- Preloader Css -->
    <link href="../../plugins/material-design-preloader/md-preloader.css" rel="stylesheet"/>

    <!-- Bootstrap Material Datetime Picker Css -->
    <link href="../../plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css"
          rel="stylesheet"/>
    <!-- Wait Me Css -->
    <link href="../../plugins/waitme/waitMe.css" rel="stylesheet"/>

    <!-- Bootstrap Select Css -->
    <link href="../../plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet"/>
    <!-- Sweet Alert Css -->
    <link href="../../plugins/sweetalert/sweetalert.css" rel="stylesheet"/>

    <!-- Custom Css -->
    <link href="../../css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="../../css/themes/all-themes.css" rel="stylesheet"/>
</head>


<body class="theme-teal">

<?PHP
$id_suc = $_GET['id_suc'];

include 'php/conexion_corba.php';
$result = pg_query("SELECT *  FROM facturacion.sucursal
  WHERE id_sucursal=" . $id_suc . ";");
include 'php/desconectar_corba.php';
$row = pg_fetch_array($result);// guardo el resultado en un array
if (is_array($row)) { // verifico q exista el array en caso positivo
    $_SESSION["nombre_sucursal"] = $row['nombre_sucursal'];
    $_SESSION["id_sucursal"] = $row['id_sucursal'];
}
?>
<!-- Page Loader -->
<?php include "cabecera.php"; ?>
<!-- #Top Bar -->
<section>
    <!-- Left Sidebar -->

    <aside id="leftsidebar" class="sidebar">
        <!-- User Info -->
        <div class="user-info">
            <br>
            <br>
            <div class="image">

            </div>
            <div class="info-container">
                <div class="name" data-toggle="dropdown" aria-haspopup="true"
                     aria-expanded="false"><?php echo $_SESSION["usuario"] ?></div>
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

                <li class="active">
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">store_mall_directory</i>
                        <span>Sucursales </span> </a>

                    <ul class="ml-menu">

                        <li>
                            <a href="../../pages/forms/nueva_sucursal.php">
                                Nueva Sucursal
                            </a>
                        </li>
                        <li class="active">
                            <a href="../../pages/forms/gestion_sucursal.php">
                                Gestionar Sucursales
                            </a>
                        </li>
                    </ul>
                </li>


                <li>
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">library_add</i>
                        <span>Dosificaciones</span> </a>

                    <ul class="ml-menu">

                        <li>
                            <a href="../../pages/forms/nueva_dosificacion.php">
                                Ingresar Nueva Dosificacion
                            </a>
                        </li>
                        <li>
                            <a href="../../pages/forms/ver_dosificaciones.php">
                                Ver las dosificaciones
                            </a>
                        </li>
                        <li>
                            <a href="../../pages/forms/pruebas_dosificacion.php">
                                Pruebas de Dosificacion
                            </a>
                        </li>

                    </ul>
                </li>
                 <li >
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="glyphicon glyphicon-list-alt"></i>
                        <span>Almacen control de Stock</span> </a>
                    <ul class="ml-menu">
                        <li>
                            <a href="../../pages/forms/nota_ingreso.php">
                               Ingreso de Productos
                            </a>
                        </li>
                        <li>
                            <a href="../../pages/forms/reporte_ingreso.php">
                                Notas de Ingreso
                            </a>
                        </li>
                          <li >
                            <a href="../../pages/forms/stock_actual.php">
                                Stock Actual
                            </a>
                        </li>
                       <!-- <li>
                            <a href="../../pages/forms/facturaciones_realizadas.php">
                             Administracion de Ingresos
                            </a>
                        </li>-->
                    </ul>
                </li>
                <li>
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">note_add</i>
                        <span>Precios y Facturacion</span> </a>

                    <ul class="ml-menu">

                        <li>
                            <a href="../../pages/forms/precio_producto.php">
                                Precio de los productos
                            </a>
                        </li>
                        <li>
                            <a href="../../pages/forms/venta_producto.php">
                                Facturar
                            </a>
                        </li>
                        <li>
                            <a href="../../pages/forms/anulacion_revisualizacion_facturas.php">
                                Anular / Visualizar Facturas
                            </a>
                        </li>
                    </ul>
                </li>


                <li>
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">offline_pin</i>
                        <span>Validaciones</span> </a>

                    <ul class="ml-menu">


                        <li>
                            <a href="../../pages/forms/validar_entrega_producto.php">
                                Validar Entregas
                            </a>
                        </li>
                        <li>
                            <a href="../../pages/forms/validar_devolucion_producto.php">

                                Validar Devoluciones
                            </a>
                        </li>


                    </ul>
                </li>

                <li>
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">library_books</i>
                        <span>Reportes</span> </a>

                    <ul class="ml-menu">

                        <li>
                            <a href="../../pages/forms/libro_iva.php">

                                Reporte Libro IVA
                            </a>
                        </li>
                        <li>
                            <a href="../../pages/forms/libro_ventas.php">

                                Reporte de Ventas
                            </a>
                        </li>
                        <li>
                            <a href="../../pages/forms/liquidaciones.php">

                                Liquidaciones
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">description</i>
                        <span>Reportes</span> </a>
                    <ul class="ml-menu">
                        <li>
                            <a href="../../pages/forms/libro_iva.php">
                                Libro IVA
                            </a>
                        </li>
                        <li>
                            <a href="../../pages/forms/libro_ventas.php">
                                Reporte de Ventas
                            </a>
                        </li>
                        <li>
                            <a href="../../pages/forms/facturaciones_realizadas.php">
                                Lista de Facturas Realizadas
                            </a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="logout.php">
                        <i class="material-icons">power_settings_new</i>
                        <span>Salir</span>
                    </a>
                </li>

            </ul>
        </div>
        <!-- #Menu -->
        <!-- Footer -->
        <?php include "pie_pagina.php"; ?>
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
                DAR DE BAJA A UNA SUCURSAL

            </h2>
        </div>
        <!-- Basic Validation -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2> <?PHP echo $_SESSION["nombre_area"];
                            ?>

                        </h2>

                    </div>
                    <div class="body">
                        <form id="sign_in" method="POST">
                            <?php
                            echo '<div class="alert alert-danger">Esta seguro de dar de baja a la esta sucursal ' . $_SESSION["nombre_sucursal"] . '
                               </div>';
                            // echo '<div><a class="btn btn-primary waves-effect" href="anulacion.php?id_fac='.$id_fac.'">Anular</a>';
                            //  echo '<a class="btn btn-primary waves-effect" href="modi_cajas.php">Cancelar</a></div>';
                            ?>

                            <div class="row clearfix">

                                <div class="col-sm-4">
                                    <div class="col-xs-12">
                                        <button class="btn btn-block bg-pink waves-effect" type="submit"
                                                name="confirma">ANULAR
                                        </button>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="col-xs-12">
                                        <A class="btn btn-block bg-red waves-effect" href="gestion_sucursal.php"
                                           type="submit" name="confirma">CANCELAR</A>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <?php


        if (isset($_POST['confirma'])) {
            include "php/conexion_corba.php";
            $qa = pg_query("UPDATE facturacion.sucursal SET estado=false WHERE id_sucursal=" . $_SESSION["id_sucursal"] . ";");
           // echo("UPDATE facturacion.sucursal SET estado=false WHERE id_sucursal=" . $_SESSION["id_sucursal"] . ";");
            include "php/desconectar_corba.php";

            echo '<div class="alert alert-success">
  <strong>LA SUCURSAL FUE DESACTIVADA CON EXITO</strong> 
</div>';
            ECHO '<meta http-equiv="Refresh" content="1;url=gestion_sucursal.php">';
        }

        ?>

    </div>
</section>
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Factura</h4>
            </div>
            <div class="modal-body">

                <?Php


                if ($_SESSION["sucursal"] == 2) {
                    echo ' <iframe src="php/ver_factura.php" width="100%" height="500" frameborder="0" allowtransparency="true"></iframe>';
                }
                echo ' <p>1. <br> 2.</p>';
                ?>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>
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