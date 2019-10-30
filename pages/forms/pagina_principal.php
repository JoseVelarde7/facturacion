<!DOCTYPE html>
<html>
<?php
@session_start();
$_SESSION['ingresoo']=1;
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>FACTURACION</title>
    <!-- Favicon-->
    <!--<link rel="shortcut icon" href="../../images/user1.png">-->
    <!-- Google Fonts -->


    <link href="../../plugins/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="../../plugins/node-waves/waves.css" rel="stylesheet"/>
    <link href="../../css/style.css" rel="stylesheet">
    <link href="../../css/themes/all-themes.css" rel="stylesheet"/>



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
    <!-- Morris Chart Css-->
    <link href="../../plugins/morrisjs/morris.css" rel="stylesheet"/>
    <!-- Custom Css -->
    <link href="../../css/style.css" rel="stylesheet">
    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="../../css/themes/all-themes.css" rel="stylesheet"/>
    <style type="text/css">
        a:link {
            text-decoration: none;
        }
    </style>
</head>


<body class="theme-teal">
<!-- Page Loader -->
<?php include "cabecera.php"; ?>
<!-- #Top Bar -->
<section>
    <!-- Left Sidebar -->
    <aside id="leftsidebar" class="sidebar">
        <!-- User Info -->
        <!--<div class="user-info">
            <br>
            <br>
            <div class="image">
            </div>
            <div class="info-container">
                <div class="name" data-toggle="dropdown" aria-haspopup="true"
                     aria-expanded="false"><?php echo $_SESSION["usuario"] ?></div>
                <div class="email">EBA</div>
            </div>
        </div>-->
        <!-- #User Info -->
        <!-- Menu -->
        <div class="menu" style="background-color: #71B1D1">
            <ul class="list">
                <!--<li class="header"><?php echo "Area : " . $_SESSION["nombre_area"] ?></li>-->
                <li>
                    <a style="color: white;" href="../../pages/forms/pagina_principal.php">
                        <i class="glyphicon glyphicon-home"></i>
                        <span style="color: white;">Inicio</span>
                    </a>
                </li>
       <?php
          if($_SESSION["funcion"]==2){
                ?>

              <li>
                  <a style="color: white;" href="../../pages/forms/venta_productos.php">
                      <i class="glyphicon glyphicon-paste"></i>
                      <span style="color: white;">Facturar</span>
                  </a>
              </li>
              <li>
                  <a style="color: white;" href="../../pages/forms/revisualizacion_facturas.php">
                      <i class="glyphicon glyphicon-eye-open"></i>
                      <span style="color: white;">Anular y Revisualizar</span>
                  </a>
              </li>
             <!--<li>
                  <a href="../../pages/forms/ventas_dia.php">
                      <i class="glyphicon glyphicon-list-alt"></i>
                      <span>Ventas del dia</span>
                  </a>
              </li>
            <li>
                  <a href="../../pages/forms/stock_actual_areas.php">
                      <i class="glyphicon glyphicon-list-alt"></i>
                      <span>Stock Actual</span>
                  </a>
              </li>-->



            <?php  }else{ ?>
                <!--<li>
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="glyphicon glyphicon-user"></i>
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
                     <li>
                          <a href="javascript:void(0);" class="menu-toggle">
                              <i class="glyphicon glyphicon-unchecked"></i>
                              <span>Sucursales </span> </a>

                          <ul class="ml-menu">

                              <li>
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
                        <i class="glyphicon glyphicon-usd"></i>
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
                </li>-->

                <li>
                    <a style="color: white;" href="javascript:void(0);" class="menu-toggle">
                        <i class="glyphicon glyphicon-transfer"></i>
                        <span style="color: white;">Dosificaciones</span> </a>
                    <ul class="ml-menu">
                        <li>
                            <a style="color: white;" href="../../pages/forms/nueva_dosificacion.php">
                                Ingresar Nueva Dosificacion
                            </a>
                        </li>
                        <li>
                            <a style="color: white;" href="../../pages/forms/ver_dosificaciones.php">
                                Ver las dosificaciones
                            </a>
                        </li>
                        <li>
                            <a style="color: white;" href="../../pages/forms/pruebas_dosificacion.php">
                                Pruebas de Dosificacion
                            </a>
                        </li>
                    </ul>
                </li>


                 <!--<li>
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
                          <li>
                            <a href="../../pages/forms/stock_actual.php">
                                Stock Actual
                            </a>
                        </li>
                        <li>
                            <a href="../../pages/forms/facturaciones_realizadas.php">
                             Administracion de Ingresos
                            </a>
                        </li>
                    </ul>
                </li>-->

                <li>
                    <a style="color: white;" href="javascript:void(0);" class="menu-toggle">
                        <i class="glyphicon glyphicon-list-alt"></i>
                        <span style="color: white;">Reportes</span> </a>
                    <ul class="ml-menu">
                        <li>
                            <a style="color: white;" href="../../pages/forms/libro_iva.php">
                               Libro IVA
                            </a>
                        </li>
                        <li>
                            <a style="color: white;" href="../../pages/forms/libro_ventas.php">
                                Reporte de Ventas
                            </a>
                        </li>
                        <li>
                            <a style="color: white;" href="../../pages/forms/facturaciones_realizadas.php">
                             Lista de Facturas Realizadas
                            </a>
                        </li>
                    </ul>
                </li>
          <?php  } ?>
                <li>
                    <a style="color: white;" href="http://localhost:8000/inicio">
                        <i class="glyphicon glyphicon-arrow-left"></i>
                        <span style="color: white;">Regresar</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- #Menu -->
        <!-- Footer -->
        <!--<?php include "pie_pagina.php"; ?>-->
        <!-- #Footer -->
    </aside>
    <!-- #END# Left Sidebar -->
    <!-- Right Sidebar -->
    <!-- #END# Right Sidebar -->
</section>
<section class="content">
    <div class="container-fluid">
        <!-- <div class="block-header">
             <h2>OPCIONES PRINCIPALES DEL SISTEMA</h2>
         </div>-->

        <!-- Widgets -->
        <div class="row clearfix">
            <?php
            if($_SESSION["funcion"]==2) {
                ?>
                <a class="col-lg-3 col-md-3 col-sm-6 col-xs-12" href="venta_productos.php">
                    <div class="info-box bg-light-blue hover-expand-effect hover-zoom-effect">
                        <!--<div class="icon">
                            <i class="glyphicon glyphicon-paste"></i>
                        </div>-->
                        <div class="content">
                            <div class="text">Facturar</div>
                            <div class="text" data-to="SEDEM" data-speed="15"
                                 data-fresh-interval="20">Ingreso
                            </div>
                        </div>
                    </div>
                </a>
                <a class="col-lg-3 col-md-3 col-sm-6 col-xs-12" href="revisualizacion_facturas.php">
                    <div class="info-box bg-amber hover-expand-effect hover-zoom-effect">
                        <!--<div class="icon">
                            <i class="glyphicon glyphicon-eye-open"></i>
                        </div>-->

                        <div class="content">
                            <div class="text">Revisualizar</div>
                            <div class="text" data-to="SEDEM" data-speed="15"
                                 data-fresh-interval="20">Ver
                            </div>
                        </div>
                    </div>
                </a>


                <?php
            }else {
                ?>
                <!--<a class="col-lg-3 col-md-3 col-sm-6 col-xs-12" href="nuevo_usuario.php">
                    <div class="info-box bg-orange hover-expand-effect hover-zoom-effect">
                        <div class="icon">
                            <i class="glyphicon glyphicon-user"></i>

                        </div>

                        <div class="content">
                            <div class="text">Usuario</div>
                            <div class="text" data-to="SEDEM" data-speed="15"
                                 data-fresh-interval="20">Ingreso
                            </div>
                        </div>
                    </div>
                </a>
                <a class="col-lg-3 col-md-3 col-sm-6 col-xs-12" href="gestionar_usuarios.php">
                    <div class="info-box bg-orange hover-expand-effect hover-zoom-effect">
                        <div class="icon">
                            <i class="glyphicon glyphicon-user"></i>

                        </div>

                        <div class="content">
                            <div class="text">Usuario</div>
                            <div class="text" data-to="SEDEM" data-speed="15"
                                 data-fresh-interval="20">Modificar
                            </div>
                        </div>
                    </div>
                </a>

                <a class="col-lg-3 col-md-3 col-sm-6 col-xs-12" href="nuevas_sucursales.php">
                    <div class="info-box bg-pink hover-expand-effect hover-zoom-effect">
                        <div class="icon">
                            <i class="  glyphicon glyphicon-modal-window"></i>

                        </div>

                        <div class="content">
                            <div class="text">Nueva Sucursal</div>
                            <div class="text" data-to="SEDEM" data-speed="15"
                                 data-fresh-interval="20">Ingreso
                            </div>
                        </div>
                    </div>
                </a>


                <a class="col-lg-3 col-md-3 col-sm-6 col-xs-12" href="gestionar_productos.php">
                    <div class="info-box bg-pink hover-expand-effect hover-zoom-effect">
                        <div class="icon">
                            <i class="  glyphicon glyphicon-modal-window"></i>

                        </div>

                        <div class="content">
                            <div class="text">Sucursal</div>
                            <div class="text" data-to="SEDEM" data-speed="15"
                                 data-fresh-interval="20">Gestionar
                            </div>
                        </div>
                    </div>
                </a>
                <a class="col-lg-3 col-md-3 col-sm-6 col-xs-12" href="nuevos_productos.php">
                    <div class="info-box bg-pink hover-expand-effect hover-zoom-effect">
                        <div class="icon">
                            <i class="glyphicon glyphicon-apple"></i>

                        </div>

                        <div class="content">
                            <div class="text">Articulo</div>
                            <div class="text" data-to="SEDEM" data-speed="15"
                                 data-fresh-interval="20">ingreso
                            </div>
                        </div>
                    </div>
                </a>
                <a class="col-lg-3 col-md-3 col-sm-6 col-xs-12" href="gestionar_productos.php">
                    <div class="info-box bg-pink hover-expand-effect hover-zoom-effect">
                        <div class="icon">
                            <i class="glyphicon glyphicon-apple"></i>

                        </div>

                        <div class="content">
                            <div class="text">Articulo</div>
                            <div class="text" data-to="SEDEM" data-speed="15"
                                 data-fresh-interval="20">Modificacion
                            </div>
                        </div>
                    </div>
                </a>

                <a class="col-lg-3 col-md-3 col-sm-6 col-xs-12" href="actualizar_precios.php">
                    <div class="info-box bg-brown hover-expand-effect hover-zoom-effect">
                        <div class="icon">
                            <i class="glyphicon glyphicon-transfer"></i>

                        </div>

                        <div class="content">
                            <div class="text">Precios</div>
                            <div class="text" data-to="SEDEM" data-speed="15"
                                 data-fresh-interval="20">Ingreso
                            </div>
                        </div>
                    </div>
                </a>-->


                <a class="col-lg-3 col-md-3 col-sm-6 col-xs-12" href="nueva_dosificacion.php">
                    <div class="info-box bg-red hover-expand-effect hover-zoom-effect">
                        <!--<div class="icon">
                            <i class="glyphicon glyphicon-copy"></i>
                        </div>-->
                        <div class="content">
                            <div class="text">Dosificacion</div>
                            <div class="text" data-from="0" data-to="243" data-speed="1000" data-fresh-interval="20">
                                Ingreso
                            </div>
                        </div>
                    </div>
                </a>
                <a class="col-lg-3 col-md-3 col-sm-6 col-xs-12" href="ver_dosificaciones.php">
                    <div class="info-box bg-deep-orange hover-expand-effect hover-zoom-effect">
                        <!--<div class="icon">
                            <i class="glyphicon glyphicon-copy"></i>
                        </div>-->
                        <div class="content">
                            <div class="text">Dosificaciones</div>
                            <div class="text" data-to="SEDEM" data-speed="15"
                                 data-fresh-interval="20">Ver
                            </div>
                        </div>
                    </div>
                </a>
                <a class="col-lg-3 col-md-3 col-sm-6 col-xs-12" href="pruebas_dosificacion.php">
                    <div class="info-box bg-teal hover-expand-effect hover-zoom-effect">
                        <!--<div class="icon">
                            <i class="glyphicon glyphicon-open-file"></i>

                        </div>-->

                        <div class="content">
                            <div class="text">Dosificacion</div>
                            <div class="text" data-to="SEDEM" data-speed="15"
                                 data-fresh-interval="20">Pruebas
                            </div>
                        </div>
                    </div>
                </a>


                <a class="col-lg-3 col-md-3 col-sm-6 col-xs-12" href="libro_iva.php">
                    <div class="info-box bg-teal hover-expand-effect hover-zoom-effect">
                        <!--<div class="icon">
                            <i class="glyphicon glyphicon-log-out"></i>

                        </div>-->

                        <div class="content">
                            <div class="text">Libro IVA</div>
                            <div class="text" data-to="SEDEM" data-speed="15"
                                 data-fresh-interval="20">Reporte
                            </div>
                        </div>
                    </div>
                </a>
                <a class="col-lg-3 col-md-3 col-sm-6 col-xs-12" href="libro_ventas.php">
                    <div class="info-box bg-teal hover-expand-effect hover-zoom-effect">
                       <!-- <div class="icon">
                            <i class="glyphicon glyphicon-new-window"></i>

                        </div>-->

                        <div class="content">
                            <div class="text">Libro Ventas</div>
                            <div class="text" data-to="SEDEM" data-speed="15"
                                 data-fresh-interval="20">Reporte
                            </div>
                        </div>
                    </div>
                </a>

                <a class="col-lg-3 col-md-3 col-sm-6 col-xs-12" href="facturaciones_realizadas.php">
                    <div class="info-box bg-teal hover-expand-effect hover-zoom-effect">
                        <!--<div class="icon">
                            <i class="glyphicon glyphicon-log-in"></i>

                        </div>-->

                        <div class="content">
                            <div class="text">Facturas Realizadas</div>
                            <div class="text" data-to="SEDEM" data-speed="15"
                                 data-fresh-interval="20">Tabla
                            </div>
                        </div>
                    </div>
                </a>
                <?php
            }
            ?>

        </div>

        <!-- #END# Widgets -->
        <!-- CPU Usage -->
        <!-- #END# CPU Usage -->
        <div class="row clearfix">
            <!-- Task Info -->
            <!-- #END# Task Info -->
            <!-- Browser Usage -->
            <!-- #END# Browser Usage -->
        </div>
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
<!-- Waves Effect Plugin Js -->
<script src="../../plugins/node-waves/waves.js"></script>
<!-- Jquery CountTo Plugin Js -->
<script src="../../plugins/jquery-countto/jquery.countTo.js"></script>
<!-- Morris Plugin Js -->
<script src="../../plugins/raphael/raphael.min.js"></script>
<script src="../../plugins/morrisjs/morris.js"></script>
<!-- ChartJs -->
<script src="../../plugins/chartjs/Chart.bundle.js"></script>
<!-- Flot Charts Plugin Js -->
<script src="../../plugins/flot-charts/jquery.flot.js"></script>
<script src="../../plugins/flot-charts/jquery.flot.resize.js"></script>
<script src="../../plugins/flot-charts/jquery.flot.pie.js"></script>
<script src="../../plugins/flot-charts/jquery.flot.categories.js"></script>
<script src="../../plugins/flot-charts/jquery.flot.time.js"></script>
<!-- Sparkline Chart Plugin Js -->
<script src="../../plugins/jquery-sparkline/jquery.sparkline.js"></script>
<!-- Custom Js -->
<script src="../../js/admin.js"></script>
<script src="../../js/pages/index.js"></script>


</body>

</html>