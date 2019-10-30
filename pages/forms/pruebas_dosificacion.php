
<!DOCTYPE html>
<html>
<?php
session_start();
?>
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>FACTURACION</title>
    <!-- Favicon-->
    <!--<link rel="shortcut icon" href="../../images/user2.png">-->

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
    <script src="../../plugins/jquery/jquery.min.js"></script>
</head>




<body class="theme-teal">

<?php include "cabecera.php";?>
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
                <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION["usuario"] ?></div>
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
     <!--<?php include "pie_pagina.php";?>-->
        <!-- #Footer -->
    </aside>

</section>

<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>
                FORMULARIO DE PRUEBA PARA VALIDACION DEL SISTEMA

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
                                    <input type="text" class="form-control" name="numero_autorizacion" required>
                                    <label class="form-label">NUMERO DE AUTORIZACION</label>
                                </div>

                            </div>
                            <div class="row clearfix">

                                <div class="col-sm-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="numero_factura" required>
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
                                            <input type="text" class="form-control" name="fecha_emision" required>
                                            <label class="form-label">FECHA DE FACTURACION</label>
                                        </div>
                                        <div class="help-label">Ej: AAAA/MM/DD</div>
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
                                            <input type="text" class="form-control" name="llave_dosificacion" maxlength="64" minlength="64" required>
                                            <label class="form-label">LLAVE DE DOSIFICACION </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-info waves-effect" name ="guardar">GENERAR CODIGO DE CONTROL</button>


                            <?php if(count($_POST)>0) {
                                include "php/pruebas_dosificacion.php";} ?>
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

</html>/