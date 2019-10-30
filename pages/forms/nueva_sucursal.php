<!DOCTYPE html>
<html>
<?php
@session_start();
?>
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>EBA</title>

    <!-- Favicon-->
    <link rel="shortcut icon" href="../../images/user1.png">

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

    <!-- Colorpicker Css -->
    <link href="../../plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.css" rel="stylesheet"/>

    <!-- Dropzone Css -->
    <link href="../../plugins/dropzone/dropzone.css" rel="stylesheet">

    <!-- Multi Select Css -->
    <link href="../../plugins/multi-select/css/multi-select.css" rel="stylesheet">

    <!-- Bootstrap Spinner Css -->
    <link href="../../plugins/jquery-spinner/css/bootstrap-spinner.css" rel="stylesheet">

    <!-- Bootstrap Tagsinput Css -->
    <link href="../../plugins/bootstrap-tagsinput/bootstrap-tagsinput.css" rel="stylesheet">

    <!-- Bootstrap Select Css -->
    <link href="../../plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet"/>

    <!-- noUISlider Css -->
    <link href="../../plugins/nouislider/nouislider.min.css" rel="stylesheet"/>

    <!-- Custom Css -->
    <link href="../../css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="../../css/themes/all-themes.css" rel="stylesheet"/>
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
                <?php
                if($_SESSION["funcion"]==2){
                    ?>

                    <li>
                        <a href="../../pages/forms/venta_productos.php">
                            <i class="material-icons">library_add</i>
                            <span>Facturar</span>
                        </a>
                    </li>
                    <li>
                        <a href="../../pages/forms/revisualizacion_facturas.php">
                            <i class="material-icons">description</i>
                            <span>Anular y Revisualizar</span>
                        </a>
                    </li>
                <?php  }else{ ?>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">person</i>
                            <span>Administrar Usuarios</span> </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="../../pages/forms/nuevo_usuario.php">
                                    Nuevo Usuario
                                </a>
                            </li>
                            <li>
                                <a href="../../pages/forms/gestionar_usuarios.php">
                                    Gestionar Usuarios
                                </a>
                            </li>
                            <li>
                                <a href="../../pages/forms/asignar_sucursales_usuario.php">
                                    Asignar Sucursales a Usuarios
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="active">
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">store_mall_directory</i>
                            <span>Sucursales </span> </a>

                        <ul class="ml-menu">

                            <li class="active">
                                <a href="../../pages/forms/nuevas_sucursales.php">
                                    Nueva Sucursal
                                </a>
                            </li>
                            <li>
                                <a href="../../pages/forms/gestionar_sucursales.php">
                                    Gestionar Sucursales
                                </a>
                            </li>
                        </ul>
                    </li>


                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">monetization_on</i>
                            <span>Precios y Productos</span> </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="../../pages/forms/nuevos_productos.php">
                                    Registrar Nuevo Producto
                                </a>
                            </li>
                            <li>
                                <a href="../../pages/forms/gestionar_productos.php">
                                    Gestionar Productos
                                </a>
                            </li>
                            <li>
                                <a href="../../pages/forms/actualizar_precios.php">
                                    Gestionar Precios por Producto
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
                <?php  } ?>
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
            <h2>INGRESO DE SUCURSALES PARA LA EMPRESA</h2>
        </div>
        <!-- Color Pickers -->

        <!-- #END# Color Pickers -->
        <!-- File Upload | Drag & Drop OR With Click & Choose -->

        <!-- #END# File Upload | Drag & Drop OR With Click & Choose -->
        <!-- Masked Input -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                   <div class="header">
                        <h2>
                            HAGA CLICK EN EL BOTON PARA AGREGAR SUCURSALES
                        </h2>

                    </div>


                    <div class="body">


                        <form id="sign_in" method="POST">

                            <div class="col-sm-12">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <?php if(count($_POST)>0) { include "php/conexion_nueva_sucursal.php"; }?>
                                    </div>
                                </div>

                            </div>
                            <div class="row clearfix">

                                <div class="col-sm-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <a href="#" class="btn btn-warning btn-lg waves-effect" type="submit" onclick="AgregarCampos();">AGREGAR SUCURSALES PARA ESTA EMPRESA</a>

                                        </div>
                                    </div>

                                </div>

                                <div class="col-sm-12">
                                    <div class="form-group form-float">
                                        <div class="form-line focused">
                                            <input type="text" class="form-control" name="sucursal1" value="CASA MATRIZ" required>
                                            <label class="form-label">INGRESE EL NOMBRE DE LA CAZA MATRIZ </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                           <h5> INGRESE EL NOMBRE DE LAS SUCURSALES QUE PERTENECEN ESTA EMPRESA</h5>
                                            </div>
                                        </div>
                                    </div>
                                <div class="col-sm-12">
                                    <div class="form-group form-float">
                                        <div class="form-line focused">
                                            <input type="text" class="form-control" name="sucursal2" value="SUCURSAL 1" required>
                                            <label class="form-label">INGRESE EL NOMBRE DE LA SUCURSAL 1 </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <div id="campos">
                                        </div>
                                    </div>

                                </div>



                                <div class="col-sm-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <button class="btn btn-primary waves-effect" type="submit" name="guardar">GUARDAR
                                                DATOS
                                            </button>
                                        </div>
                                    </div>

                                </div>











                                </div>

                        </form>

                    </div>


                </div>
            </div>
        </div>
        <!-- #END# Masked Input -->
        <!-- Input Group -->

        <!-- #END# Input Group -->
        <!-- Multi Select -->

        <!-- #END# Multi Select -->


        <!-- Advanced Select -->

        <!-- #END# Advanced Select -->
        <!-- Input Slider -->

        <!-- #END# Input Slider -->
    </div>

    <script type="text/javascript">
        var neinput = 2;
        function AgregarCampos(){
            neinput++;
            campo = '<div class="form-group form-float"> <div class="form-line focused"><input type="text" class="form-control" id="campo' + neinput + '"&nbsp; name="sucursal' + neinput + '"&nbsp; value="SUCURSAL ' + (neinput-1) + '"&nbsp; /><label class="form-label">INGRESE NOMBRE DE LA SUCULSAL   ' + neinput + '</label></div></div>';
            $("#campos").append(campo);

        }

    </script>
</section>

<!-- Jquery Core Js -->
<script src="../../plugins/jquery/jquery.min.js"></script>

<!-- Bootstrap Core Js -->
<script src="../../plugins/bootstrap/js/bootstrap.js"></script>

<!-- Select Plugin Js -->
<script src="../../plugins/bootstrap-select/js/bootstrap-select.js"></script>

<!-- Slimscroll Plugin Js -->
<script src="../../plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

<!-- Bootstrap Colorpicker Js -->
<script src="../../plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>

<!-- Dropzone Plugin Js -->
<script src="../../plugins/dropzone/dropzone.js"></script>

<!-- Input Mask Plugin Js -->
<script src="../../plugins/jquery-inputmask/jquery.inputmask.bundle.js"></script>

<!-- Multi Select Plugin Js -->
<script src="../../plugins/multi-select/js/jquery.multi-select.js"></script>

<!-- Jquery Spinner Plugin Js -->
<script src="../../plugins/jquery-spinner/js/jquery.spinner.js"></script>

<!-- Bootstrap Tags Input Plugin Js -->
<script src="../../plugins/bootstrap-tagsinput/bootstrap-tagsinput.js"></script>

<!-- noUISlider Plugin Js -->
<script src="../../plugins/nouislider/nouislider.js"></script>

<!-- Waves Effect Plugin Js -->
<script src="../../plugins/node-waves/waves.js"></script>

<!-- Custom Js -->
<script src="../../js/admin.js"></script>
<script src="../../js/pages/forms/advanced-form-elements.js"></script>

</body>

</html>

