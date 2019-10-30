<!DOCTYPE html>
<html>
<?php
session_start();
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
            $("#datepicker").datepicker({minDate: "", maxDate: "-227M "});
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

<?php include "cabecera.php";
include "php/seleccionar_usuario.php" ?>
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
                        <i class="glyphicon glyphicon-home"></i>
                        <span>Inicio</span>
                    </a>
                </li>
       <?php
          if($_SESSION["funcion"]==2){
                ?>

              <li>
                  <a href="../../pages/forms/venta_productos.php">
                      <i class="glyphicon glyphicon-paste"></i>
                      <span>Facturar</span>
                  </a>
              </li>
              <li>
                  <a href="../../pages/forms/revisualizacion_facturas.php">
                      <i class="glyphicon glyphicon-eye-open"></i>
                      <span>Anular y Revisualizar</span>
                  </a>
              </li>
            <?php  }else{ ?>
                <li class="active">
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="glyphicon glyphicon-user"></i>
                        <span>Administrar Usuarios</span> </a>
                    <ul class="ml-menu">
                        <li>
                            <a href="../../pages/forms/nuevo_usuario.php">
                                Nuevo Usuario
                            </a>
                        </li>
                        <li class="active">
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
                </li>
                <li>
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="glyphicon glyphicon-transfer"></i>
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
                        <i class="glyphicon glyphicon-list-alt"></i>
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
                        <i class="glyphicon glyphicon-off"></i>
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

</section>

<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>
                MODIFICACION DE DATOS DE LOS USUARIOS

            </h2>
        </div>
        <!-- Basic Validation -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>INGRESE LOS NUEVOS DATOS DEL USUARIO</h2>

                    </div>

                    <div class="body">
                        <form id="form_validation" method="POST">

                            <div class="row clearfix">

                                <div class="col-sm-4">
                                    <div class="form-group form-float">
                                        <div class="form-line focused">
                                            <input type="text" class="form-control" name="ap_paterno"
                                                   value="<?php echo $paterno ?>"
                                                   style="text-transform: uppercase" disabled>
                                            <label class="form-label">Apellido Paterno</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group form-float">
                                        <div class="form-line focused">
                                            <input type="text" class="form-control" style="text-transform: uppercase"
                                                   value="<?php echo $materno ?>"
                                                   name="ap_materno" disabled>
                                            <label class="form-label">Apellido Materno</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group form-float">
                                        <div class="form-line focused">
                                            <input type="text" class="form-control" style="text-transform: uppercase"
                                                   value="<?php echo $nombres ?>"
                                                   name="nombres" disabled>
                                            <label class="form-label">Nombre (s)</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group form-float">
                                        <div class="form-line focused">
                                            <input type="text" class="form-control" name="ci" value="<?php echo $ci ?>"
                                                   style="text-transform: uppercase" disabled>
                                            <label class="form-label">Cedula de Identidad</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group form-float">
                                        <div class="form-line focused">
                                            <input type="text" class="form-control" value="<?php echo $celular ?>"
                                                   name="movil" required>
                                            <label class="form-label">Numero Movil</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group form-float">
                                        <div class="form-line focused">
                                            <input type="text" class="form-control" value="<?php echo $telefono ?>"
                                                   name="telefono">
                                            <label class="form-label">Numero Telefono</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">


                                <div class="col-sm-4">
                                    <b>Fecha de Nacimiento</b>
                                    <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="glyphicon glyphicon-calendar"></i>
                                            </span>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="date" name="fecha_nacimiento" id="datepicker"
                                                       value="<?php echo $nacimiento ?>"
                                                       class="form-control" disabled>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <b>Correo Electronico</b>
                                    <div class="input-group">

                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="email" name="correo" class="form-control"
                                                       value="<?php echo $correo ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <b>Estado de Usuario</b>
                                    <div class="input-group">

                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <select class="form-control"
                                                        name="estado"><?php include "php/seleccion_estado.php" ?>
                                                    <select>


                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>

                            <div class="row clearfix">

                                <div class="col-sm-6">
                                    <b>Area de Trabajo</b>
                                    <div class="input-group">

                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <select class="form-control"
                                                        name="id_area"><?php include "php/seleccion_areas_usuario.php" ?>
                                                    <select>


                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <b>Rol de Usuario</b>
                                    <div class="input-group">

                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <select class="form-control"
                                                        name="id_rol"><?php include "php/seleccion_roles_usuario_mod.php" ?>
                                                    <select>


                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>


                            <div class="row clearfix">

                                <div class="col-sm-4">
                                    <div class="col-xs-12">
                                        <button class="btn btn-block bg-pink waves-effect" type="submit"
                                                name="guardar">GUARDAR LAS MODIFICACIONES
                                        </button>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="col-xs-12">
                                        <A class="btn btn-block bg-red waves-effect" href="gestionar_usuarios.php"
                                           type="submit" >CANCELAR</A>
                                    </div>
                                </div>
                            </div>


                            <?php

                                include "php/guardar_modificacion_usuario.php";


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