<?php
@session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>FACTURACION</title>
    <!--<link rel="shortcut icon" href="../../images/user2.png">-->
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


    <!--  <script src="//code.jquery.com/jquery-latest.js"></script>-->
    <script src="../../plugins/jquery-latest.js"></script>
</head>
<body class="theme-teal">
<?php include "cabecera.php"; ?>
<section>
    <aside id="leftsidebar" class="sidebar">
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

        <!--<?php include "pie_pagina.php"; ?>-->
    </aside>
</section>


<section class="content">

    <script>
        $(document).ready(function () {
            $('#empresas').change(function () {
                $.ajax({
                    data: "",
                    url: "php/seleccionar_sucursales_json.php?idempresa=" + $('#empresas').val(),
                    type: "POST",
                    success: function (opciones) {

                        $('#sucursaless').html(opciones);
                        console.log(opciones);
                    }
                });
            });
        });
    </script>


    <div class="container-fluid">
        <div class="block-header">
            <h2>LIBRO IVA</h2>
        </div>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2> <?PHP ?></h2>
                    </div>
                    <div class="body">
                        <form id="form_validation" method="POST">
                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="number" class="form-control" min="2010" max="9999" name="anio"
                                                   required>
                                            <label class="form-label">AÑO</label>
                                        </div>
                                        <div class="help-info">AAAA</div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="row clearfix">
                                        <div class="col-sm-12">
                                            <select class="form-control show-tick" name="mes">
                                                <option value="0">-- MES --</option>
                                                <option value="01">ENERO</option>
                                                <option value="02">FEBRERO</option>
                                                <option value="03">MARZO</option>
                                                <option value="04">ABRIL</option>
                                                <option value="05">MAYO</option>
                                                <option value="06">JUNIO</option>
                                                <option value="07">JULIO</option>
                                                <option value="08">AGOSTO</option>
                                                <option value="09">SEPTIEMBRE</option>
                                                <option value="10">OCTUBRE</option>
                                                <option value="11">NOVIEMBRE</option>
                                                <option value="12">DICIEMBRE</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <div class="row clearfix">
                                        <div class="col-sm-12">
                                            <select id="empresas" class="form-control show-tick" name="empresa">
                                                <?php include "php/seleccion_empresas.php" ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="row clearfix">


                                            <div id="sucursaless" class="col-sm-12"  >
                                                <select id="sucu" class="form-control show-tick" name="sucursal">
                                                    <option value="0">Todas las Sucursales</option>
                                                </select>
                                            </div>


                                    </div>
                                </div>


                                <div class="col-sm-4">
                                    <div class="form-group form-float">
                                        <button class="btn btn-primary waves-effect" type="submit" name="generar">
                                            GENERAR
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <?php
                             include "php/generar_libro_iva.php";
                            ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="../../plugins/bootstrap/js/bootstrap.js"></script>
<script src="../../plugins/bootstrap-select/js/bootstrap-select.js"></script>
<script src="../../plugins/jquery-slimscroll/jquery.slimscroll.js"></script>
<script src="../../plugins/jquery-validation/jquery.validate.js"></script>
<script src="../../plugins/jquery-steps/jquery.steps.js"></script>
<script src="../../plugins/sweetalert/sweetalert.min.js"></script>
<script src="../../plugins/node-waves/waves.js"></script>
<script src="../../js/admin.js"></script>
<script src="../../js/pages/forms/form-validation.js"></script>
<script src="../../js/demo.js"></script>

</body>

</html>