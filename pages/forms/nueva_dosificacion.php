<!DOCTYPE html>
<html>
<?php
@session_start();
?>
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>FACTURACION</title>

    <!-- Favicon-->
    <!--<link rel="shortcut icon" href="../../images/user1.png">-->

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

    <script src="../../plugins/jquery/jquery.min.js"></script>
    <link rel="stylesheet" href="../../datepicker/js/jquery-ui.min.css">


     <link rel="stylesheet" href="../../plugins/jquery-ui.css">

    <script src="../../plugins/jquery-ui.js"></script>
    <script>
        $(function () {

            //Array para dar formato en español
            $.datepicker.regional['es'] =
            {
                closeText: 'Cerrar',
                prevText: 'Previo',
                nextText: 'Próximo',

                monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio',
                    'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
                monthNamesShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun',
                    'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
                monthStatus: 'Ver otro mes', yearStatus: 'Ver otro año',
                dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
                dayNamesShort: ['Dom', 'Lun', 'Mar', 'Mie', 'Jue', 'Vie', 'Sáb'],
                dayNamesMin: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sa'],
                dateFormat: 'dd/mm/yy', firstDay: 0,
                initStatus: 'Selecciona la fecha', isRTL: false
            };
            $.datepicker.setDefaults($.datepicker.regional['es']);

            // miDate: fecha de comienzo D=días | M=mes | Y=año
            //maxDate: fecha tope D=días | M=mes | Y=año
            $("#datepicker").datepicker({minDate: "+0M +0D", maxDate: ""});
            //  $( "#datepicker1" ).datepicker({ minDate: $( "#datepicker" ).val() , maxDate: "+0M +0D"});
            /*  $("#datepicker").datepicker({
             onClose: function (selectedDate) {
             $("#datepicker1").datepicker("option", "minDate", selectedDate);
             }
             });
             $("#datepicker1").datepicker({
             onClose: function (selectedDate) {
             $("#datepicker").datepicker("option", "maxDate", selectedDate);
             }
             });*/

        });

    </script>
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
        <div class="block-header">
            <h2>NUEVA DOSIFICACION</h2>
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
                            INGRESE LOS DATOS DE LA NUEVA DOSIFICACION
                        </h2>

                    </div>
                    <div class="body">


                        <form id="form_validation" method="POST">
                            <div class="row clearfix">
                                <div class="form-group form-float">
                                    <div class="col-sm-6">
                                        <div class="form-line">
                                            <input type="number" class="form-control" name="numero_autorizacion"
                                                   required>
                                            <label class="form-label">NUMERO DE AUTORIZACION</label>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="col-sm-12">
                                            <select class="form-control show-tick" name="sucursal">
                                                <option value="">-- ESCOGE UNA SUCURSAL --</option>
                                                <?php include "php/seleccionar_sucursal.php"; ?>


                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="form-group form-float">


                                    <div class="col-sm-5">
                                        <div class="form-line">
                                            <input type="number" class="form-control" name="numero_nit" required>
                                            <label class="form-label">NUMERO DE NIT</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="text" class="form-control" name="llave_dosificacion"
                                                       maxlength="64" minlength="64" required>
                                                <label class="form-label">LLAVE DE DOSIFICACION </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <select class="form-control show-tick" name="leyenda">
                                        <option value="">-- ESCOGE LA LEYENDA--</option>
                                        <option value="1">Ley N° 453: Si se te ha vulnerado algún derecho puedes exigir
                                            la reposición o restauración.
                                        </option>
                                        <option value="2">Ley N° 453: El proveedor deberá dar cumplimiento a las
                                            condiciones ofertadas.
                                        </option>
                                        <option value="3">Ley N° 453: Están prohibidas las prácticas comerciales
                                            abusivas, tienes derecho a denunciarlas.
                                        </option>
                                        <option value="4">Ley N° 453: Tienes derecho a recibir información que te
                                            proteja de la publicidad engañosa.
                                        </option>
                                        <option value="5">Ley N° 453: Puedes acceder a la reclamación cuando tus
                                            derechos han sido vulnerados.
                                        </option>
                                        <option value="6">Ley N° 453: Los contratos de adhesión deben redactarse en
                                            términos claros, comprensibles, legibles y deben informar todas las
                                            facilidades y limitaciones.
                                        </option>
                                        <option value="7">Ley N° 453: Se debe promover el consumo solidario, justo, en
                                            armonía con la Madre Tierra y precautelando el hábitat, en el marco del
                                            Vivir Bien.
                                        </option>
                                        <option value="8">Ley N° 453: El proveedor de productos debe habilitar medios e
                                            instrumentos para efectuar consultas y reclamaciones.
                                        </option>
                                        <option value="9">Ley N° 453: El proveedor debe brindar atención sin
                                            discriminación, con respeto, calidez y cordialidad a los usuarios y
                                            consumidores.
                                        </option>
                                        <option value="10">Ley N° 453: Los productos deben suministrarse en condiciones
                                            de inocuidad, calidad y seguridad.
                                        </option>
                                        <option value="11">Ley N° 453: Está prohibido importar, distribuir o
                                            comercializar productos expirados o prontos a expirar.
                                        </option>
                                        <option value="12">Ley N° 453: Está prohibido importar, distribuir o
                                            comercializar productos prohibidos o retirados en el país de origen por
                                            atentar a la integridad física y a la salud.
                                        </option>
                                        <option value="13">Ley N° 453: Tienes derecho a recibir información sobre las
                                            características y contenidos de los productos que consumes.
                                        </option>
                                        <option value="14">Ley N° 453: Tienes derecho a un trato equitativo sin
                                            discriminación en la oferta de productos.
                                        </option>
                                        <option value="15">Ley N° 453: El proveedor deberá entregar el producto en las
                                            modalidades y términos ofertados o convenidos.
                                        </option>
                                        <option value="16">Ley N° 453: En caso de incumplimiento a lo ofertado o
                                            convenido, el proveedor debe reparar o sustituir el producto.
                                        </option>
                                        <option value="17">Ley N° 453: Los alimentos declarados de primera necesidad
                                            deben ser suministrados de manera adecuada, oportuna, continua y a precio
                                            justo.
                                        </option>
  								 <option value="18">Ley N° 453: Los servicios deben suministrarse en condiciones de inocuidad, calidad y seguridad.                                            justo.
                                        </option>

                                    </select>
                                </div>

                            </div>

                            <div class="demo-masked-input">


                                <div class="row clearfix">
                                    <div class="col-sm-6">
                                        <b>FECHA EMISION</b>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="glyphicon glyphicon-calendar"></i>
                                            </span>
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <input type="text" name="fecha_emision" id="datepicker"
                                                           class="form-control">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <b>ACTIVIDAD ECONOMICA</b>
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="text" class="form-control" name="actividad_economica"
                                                       required>

                                            </div>
                                        </div>
                                    </div>

                                </div>


                                <?php if (count($_POST) > 0) {
                                    include "php/guardar_nueva_dosiciacion.php";
                                } ?>
                                <button class="btn btn-info waves-effect" type="submit" name="guardar">GUARDAR
                                    DATOS
                                </button>


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
</section>

<!-- Jquery Core Js -->


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

