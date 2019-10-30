<?php
@session_start();
setlocale(LC_TIME, 'spanish');
date_default_timezone_set("America/La_Paz");
$mes = strftime("%m");
$anio = strftime("%Y");
$diafinal = date("d", mktime(0, 0, 0, $mes + 1, 0, $anio));
$fechainicial = "01-" .  $mes ."-" . $anio;
$fechafinal = $diafinal . "-" . $mes . "-" .$anio;
$titulo=1;
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
    <script src="../../plugins/jquery/jquery.min.js"></script>
    <link rel="stylesheet" href="../../datepicker/js/jquery-ui.min.css">


    <link rel="stylesheet" href="../../plugins/jquery-ui.css">

    <script src="../../plugins/jquery-ui.js"></script>
    <script>
        $(function() {

            //Array para dar formato en español
            $.datepicker.regional['es'] =
            {
                closeText: 'Cerrar',
                prevText: 'Previo',
                nextText: 'Próximo',

                monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio',
                    'Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
                monthNamesShort: ['Ene','Feb','Mar','Abr','May','Jun',
                    'Jul','Ago','Sep','Oct','Nov','Dic'],
                monthStatus: 'Ver otro mes', yearStatus: 'Ver otro año',
                dayNames: ['Domingo','Lunes','Martes','Miércoles','Jueves','Viernes','Sábado'],
                dayNamesShort: ['Dom','Lun','Mar','Mie','Jue','Vie','Sáb'],
                dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sa'],
                dateFormat: 'dd/mm/yy', firstDay: 0,
                initStatus: 'Selecciona la fecha', isRTL: false};
            $.datepicker.setDefaults($.datepicker.regional['es']);

            //miDate: fecha de comienzo D=días | M=mes | Y=año
            //maxDate: fecha tope D=días | M=mes | Y=año
            //  $( "#datepicker" ).datepicker({ minDate: "", maxDate: "+0M +0D" });
            //  $( "#datepicker1" ).datepicker({ minDate: $( "#datepicker" ).val() , maxDate: "+0M +0D"});
            $("#datepicker").datepicker({
                onClose: function (selectedDate) {
                    $("#datepicker1").datepicker("option", "minDate", selectedDate);
                }
            });
            $("#datepicker1").datepicker({
                onClose: function (selectedDate) {
                    $("#datepicker").datepicker("option", "maxDate", selectedDate);
                }
            });

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
        <div class="user-info">
            <br>
            <br>
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

                            <li>
                                <a href="../../pages/forms/nuevas_sucursales.php">
                                    Nueva Sucursal
                                </a>
                            </li>
                            <li class="active">
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
    <!-- #END# Right Sidebar -->
</section>
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>
                LISTA DE LAS SUCURSALES

            </h2>
        </div>
        <!-- Basic Validation -->
        <div class="body">
            <form id="form_validation" method="POST">
                <div class="row clearfix">

                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">

                            <div class="body">


                                <?php




                               ECHO  '<div class="header">
                                    <h2> GESTION DE LAS SUCURSALES </h2>
                            </div>';

                                  echo '<div class="table-responsive">';
                                  echo '<table align="center" class="table table-hover">';

                                  include "php/conexion_corba.php";

                                  $consulta = pg_query("select * from facturacion.sucursal where id_area=100 ORDER BY nombre_sucursal ");
                                  include "php/desconectar_corba.php";
                                  echo '<tr class="bg-blue"><td align="center">NOMBRE DE SUCURSAL</td><td  align="center">ESTADO</td><td  align="center">DAR DE BAJA</td><td  align="center">MODIFICAR</td></tr>';
                                  while ($array = pg_fetch_assoc($consulta)) {

                                      echo '<tr class="active"><td align="center">' . $array['nombre_sucursal']  . '</td>'

                                          . '<td align="center">' . verda($array['estado']) . '</td>'
                                            . '<td align="center">' . anul($array['estado'],$array['id_sucursal']) . '</td>'
                                             . '<td align="center"><a class="btn btn-sm btn-primary" href="editar_sucursal.php?id_suc=' . $array['id_sucursal'] . '" target=""><i class="material-icons">mode_edit</i></a></td>'


                                          . '</tr>';
                                  }
                                  echo '</table>';
                                  echo '</div>';




                                ?>


                            </div>
                        </div>
                    </div>
                </div>






            </form>
        </div>





        <?php

        function verda($estado)
        {
            if($estado=='t'){$veren= '<span class="label bg-green">A</span>';}
            else{$veren= '<span class="label bg-red">D</span>';}

            return $veren;
        }

        function anul($anulado,$id)
        {
            if($anulado=='t'){
                $anu = '<a class="btn btn-warning waves-effect"'.
                    ' href="desactivar_sucursal.php?id_suc='.$id.
                    '"target="">'.
                    '<i class="material-icons">signal_cellular_no_sim</i></a>';
            }else{
                $anu = '  ';
            }

            return $anu;
        }






        ?>

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