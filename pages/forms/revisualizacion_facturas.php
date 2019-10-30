<?php
@session_start();
setlocale(LC_TIME, 'spanish');
date_default_timezone_set("America/La_Paz");
$mes = strftime("%m");
$anio = strftime("%Y");
$diafinal = date("d", mktime(0, 0, 0, $mes + 1, 0, $anio));
$fechainicial = "01-" . $mes . "-" . $anio;
$fechafinal = $diafinal . "-" . $mes . "-" . $anio;
$titulo = 1;
?>
<!DOCTYPE html>
<html>
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
    <link rel="stylesheet" href="../../datepicker/js/jquery-ui.min.css">


    <link rel="stylesheet" href="../../plugins/jquery-ui.css">

    <script src="../../plugins/jquery-ui.js"></script>
     <link href="../../plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">
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
                <li>
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
        <!-- #END# Right Sidebar -->
</section>
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>
                LISTA DE LAS FACTURAS EMITIDAS

            </h2>
        </div>
        <!-- Basic Validation -->
        <div class="body">
            <form id="form_validation" method="POST">
                <div class="row clearfix">

                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">

                            <div class="body">
                                <div class="row clearfix">
                                    <div class="col-sm-3">
                                        <b>RANGO INICIAL</b>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="glyphicon glyphicon-calendar"></i>
                                            </span>
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <input type="text" name="inicio" id="datepicker"
                                                           class="form-control" value="<?php echo $fechainicial ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <b>RANGO FINAL</b>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="glyphicon glyphicon-calendar"></i>
                                            </span>
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <input type="text" name="final" id="datepicker1"
                                                           class="form-control" value="<?php echo $fechafinal ?>">

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <?php if ($_SESSION["funcion"] == 1) { ?>

                                        <div class="col-sm-3">
                                            <b>AREA FACTURADA</b>
                                            <div class="input-group">

                                                <div class="form-group form-float">
                                                    <div class="row clearfix">
                                                        <div class="col-sm-12">
                                                            <select name="area" id="estado"
                                                                    class="form-control show-tick">
                                                                <?php include "php/seleccion_areas.php" ?>
                                                            </select>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                    <div class="col-sm-3">
                                        <div class="form-group form-float">
                                            <div class="">
                                                <button class="btn btn-info waves-effect" type="submit"
                                                        name="buscar">BUSCAR REGISTROS
                                                </button>

                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <?php


                                if (isset($_POST['buscar'])) {


                                    $titulo = 5;
                                    $fechainicio1 = $_POST['inicio'];
                                    $fechafin1 = $_POST['final'];


                                    if ($_SESSION["funcion"] == 1) {
                                        $area = $_POST['area'];
                                        if ($area == 0) {


                                            ECHO '<div class="header">
                                    <h2> Facturas emitidas de ' . $fechainicio1 . "  al  " . $fechafin1 . '</h2>
                            </div>';

                                            include "php/conexion_facturacion.php";
                                            $consulta = pg_query("
SELECT distinct factura.numero_conjunta,cliente.nit_carnet, cliente.cliente, factura.fecha_factura, factura.estado_factura, factura.id_area
FROM public.factura, public.cliente 
WHERE factura.id_cliente=cliente.id_cliente 
and fecha_factura>='" . $fechainicio1 . "'
  and fecha_factura<='" . $fechafin1 . "'
  ORDER BY factura.numero_conjunta DESC;");

                                            include "php/desconectar_facturacion.php";


                                        } else {
                                            ECHO '<div class="header">
                                    <h2> Facturas emitidas de ' . $fechainicio1 . "  al  " . $fechafin1 . " en el area de " . area($area) . '</h2>
                            </div>';

                                            include "php/conexion_facturacion.php";
                                            $consulta = pg_query("
SELECT distinct factura.numero_conjunta,cliente.nit_carnet, cliente.cliente, factura.fecha_factura, factura.estado_factura, factura.id_area
FROM public.factura, public.cliente 
WHERE factura.id_cliente=cliente.id_cliente 
and id_area='" . $area . "'
and fecha_factura>='" . $fechainicio1 . "'
  and fecha_factura<='" . $fechafin1 . "'
  ORDER BY factura.numero_conjunta DESC;");

                                            include "php/desconectar_facturacion.php";

                                        }
                                    } else {
                                        ECHO '<div class="header">
                                    <h2> Lista de facturas emitidas de ' . $fechainicio1 . "  al  " . $fechafin1 . '</h2>
                            </div>';
                                 

                                        include "php/conexion_facturacion.php";
                                        $consulta = pg_query("
SELECT distinct factura.numero_conjunta,cliente.nit_carnet, cliente.cliente, factura.fecha_factura, factura.estado_factura, factura.id_area
FROM public.factura, public.cliente 
WHERE factura.id_cliente=cliente.id_cliente 
and fecha_factura>='" . $fechainicio1 . "'
  and fecha_factura<='" . $fechafin1 . "'
  and factura.id_area='" . $_SESSION["id_area"] . "'
  ORDER BY factura.numero_conjunta DESC;");

                                        include "php/desconectar_facturacion.php";
                                    }
?>

                                <div class="table-responsive">
                                 <table align="center" class="table table-bordered table-striped table-hover dataTable js-exportable">

 <thead>
                               <tr class="bg-teal">
                                    <th align="center">Nº FACTURA</th>
                                    <th  align="center">NIT CLIENTE</th>
                                    <th  align="center">NOMBRE CLIENTE</th>
                                    <th  align="center">FECHA</th>
                                    <th  align="center">ESTADO</th>
                                    <th  align="center">ANULAR</th>
                                    <th  align="center">AREA EXPEDITA</th>
                                    <th  align="center">VER CARTA</th>
                                    <th  align="center">VER ROLLO</th>
                                </tr>
  </thead>
   <tfoot>
    <tr class="bg-teal">

                                    <th align="center">Nº FACTURA</th>
                                    <th  align="center">NIT CLIENTE</th>
                                    <th  align="center">NOMBRE CLIENTE</th>
                                    <th  align="center">FECHA</th>
                                    <th  align="center">ESTADO</th>
                                    <th  align="center">ANULAR</th>
                                    <th  align="center">AREA EXPEDITA</th>
                                    <th  align="center">VER CARTA</th>
                                    <th  align="center">VER ROLLO</th>
                                    </tr>
   </tfoot>
                    <?php
                                     while ($array = pg_fetch_assoc($consulta)) {

                                        echo '<tr class="active"><td align="center">' . $array['numero_conjunta'] .
                                            '</td>' . '<td align="center">' . $array['nit_carnet']
                                            . '</td>' . '<td align="center">' . $array['cliente'] . '</td>'
                                            . '<td align="center">' . $array['fecha_factura'] . '</td>'
                                            . '<td align="center">' . conteovigentes($array['numero_conjunta']) . ' ' . conteoanuladas($array['numero_conjunta']) . '</td>'

                                           
                                            . '<td align="center">' . anul($array['numero_conjunta']) . '</td>'
                                            . '<td align="center">' . area($array['id_area']) . '</td>'
                                            . '<td align="center"><a class="btn btn-sm btn-primary" href="imprimir_carta_vista.php?id_fac=' . $array['numero_conjunta'] . '" target="_blank"><i class=""></i>CARTA</a></td>'
                                            . '<td align="center"><a class="btn btn-sm btn-danger" href="termica_factura.php?id_fac=' . $array['numero_conjunta'] . '" target="_blank"><i class=""></i>ROLLO</a></td>'
                                            //  . '<td align="center">' . anul($array['estado_factura'], $array['numero_factura']) . '</td>'


                                            . '</tr>';
                                    }

                                    ?>

                                  </table>
                                    </div>

<?php
                                } else {
                                    ECHO '<div class="header">
                                    <h2> Facturas Emitidas en mes de ' . strftime("%B de %Y") . '</h2>
                            </div>';

                                 ?>


 <div class="table-responsive">
                                 <table align="center" class="table table-bordered table-striped table-hover dataTable js-exportable">

 <thead>
                               <tr class="bg-teal">
                                   <th align="center">Nº FACTURA</th>
                                    <th  align="center">NIT CLIENTE</th>
                                    <th  align="center">NOMBRE CLIENTE</th>
                                    <th  align="center">FECHA</th>
                                    <th  align="center">ESTADO</th>
                                    <th  align="center">ANULAR</th>
                                    <!-- <th  align="center">AREA EXPEDITA</th> -->
                                    <th align="center">EMPRESA</th>
                                    <th  align="center">VER CARTA</th>
                                    <th  align="center">VER ROLLO</th>
                                </tr>
  </thead>
   <tfoot>
    <tr class="bg-teal">
                                    <th align="center">Nº FACTURA</th>
                                    <th  align="center">NIT CLIENTE</th>
                                    <th  align="center">NOMBRE CLIENTE</th>
                                    <th  align="center">FECHA</th>
                                    <th  align="center">ESTADO</th>
                                    <th  align="center">ANULAR</th>
                                    <th  align="center">AREA EXPEDITA</th>
                                    <th  align="center">VER CARTA</th>
                                    <th  align="center">VER ROLLO</th>
                                    </tr>
   </tfoot>
                                 <?php

                                    include "php/conexion_facturacion.php";

                                    if ($_SESSION["funcion"] == 1) {
                                        $consulta = pg_query("
SELECT distinct factura.numero_conjunta,cliente.nit_carnet, cliente.cliente, factura.fecha_factura,factura.id_area
FROM public.factura, public.cliente 
WHERE factura.id_cliente=cliente.id_cliente 
and fecha_factura>='" . $fechainicial . "'
  and fecha_factura<='" . $fechafinal . "'
  ORDER BY factura.numero_conjunta DESC;");
                                    } else {
                                        $consulta = pg_query("
SELECT distinct factura.numero_conjunta,cliente.nit_carnet, cliente.cliente, factura.fecha_factura,factura.id_area
FROM public.factura, public.cliente 
WHERE factura.id_cliente=cliente.id_cliente 
and fecha_factura>='" . $fechainicial . "'
  and fecha_factura<='" . $fechafinal . "'
   and factura.id_area='" . $_SESSION["id_area"] . "'
  ORDER BY factura.numero_conjunta DESC;");
                                    }
                                    include "php/desconectar_facturacion.php";

                                   
                                    while ($array = pg_fetch_assoc($consulta)) {

                                        echo '<tr class="active"><td align="center">' . $array['numero_conjunta'] .
                                            '</td>' . '<td align="center">' . $array['nit_carnet']
                                            . '</td>' . '<td align="center">' . $array['cliente'] . '</td>'
                                            . '<td align="center">' . $array['fecha_factura'] . '</td>'
                                            . '<td align="center">' . conteovigentes($array['numero_conjunta']) . ' ' . conteoanuladas($array['numero_conjunta']) . '</td>'

                                           
                                            . '<td align="center">' . anul($array['numero_conjunta']) . '</td>'
                                            . '<td align="center">' . area($array['id_area']) . '</td>'
                                            . '<td align="center"><a class="btn btn-sm btn-primary" href="imprimir_carta_vista.php?id_fac=' . $array['numero_conjunta'] . '" target="_blank"><i class=""></i>CARTA</a></td>'
                                            . '<td align="center"><a class="btn btn-sm btn-danger" href="termica_factura.php?id_fac=' . $array['numero_conjunta'] . '" target="_blank"><i class=""></i>ROLLO</a></td>'
                                            //  . '<td align="center">' . anul($array['estado_factura'], $array['numero_factura']) . '</td>'


                                            . '</tr>';
                                    }
                                   
                                    ?>

                                  </table>
                                    </div>

<?php

                                }


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
            if ($estado == 1) {
                $veren = '<span class="label bg-green">V</span>';
            } else {
                $veren = '<span class="label bg-red">A</span>';
            }

            return $veren;
        }

        function anul($id)
        {

            $anu = '<a class="btn btn-warning waves-effect"' .
                ' href="anular_facturas.php?id_fac=' . $id .
                '"target="">' .
                '<i class="glyphicon glyphicon-remove-sign"></i></a>';

            return $anu;
        }

        function conteo($id)
        {
            $conteo = 0;
            include 'php/conexion_facturacion.php';
            $lugar = pg_query("select count(id_factura) from factura where numero_conjunta=" . $id);
            include 'php/desconectar_facturacion.php';
            $row1 = pg_fetch_array($lugar);
            if (is_array($row1)) {
                $conteo = $row1['count'];
            }
            return $conteo;
        }

        function conteoanuladas($id)
        {
            $conteo = 0;
            include 'php/conexion_facturacion.php';
            $lugar = pg_query("select count(id_factura) from factura where  estado_factura=0 and numero_conjunta=" . $id);
            include 'php/desconectar_facturacion.php';
            $row1 = pg_fetch_array($lugar);
            if (is_array($row1)) {
                $conteo = $row1['count'];
            }
            $veren = '<span class="label bg-red">' . $conteo . '</span>';

            return $veren;
        }

        function conteovigentes($id)
        {
            $conteo = 0;
            include 'php/conexion_facturacion.php';
            $lugar = pg_query("select count(id_factura) from factura where  estado_factura=1 and numero_conjunta=" . $id);
            include 'php/desconectar_facturacion.php';
            $row1 = pg_fetch_array($lugar);
            if (is_array($row1)) {
                $conteo = $row1['count'];
            }
            $veren = '<span class="label bg-green">' . $conteo . '</span>';
            return $veren;
        }

        function area($id)
        {
            $area = "";
            include 'php/conexion_facturacion.php';
            $lugar = pg_query("select * from public.area where id_area=" . $id);
            include 'php/desconectar_facturacion.php';
            $row1 = pg_fetch_array($lugar);
            if (is_array($row1)) {
                $area = $row1['nombre_area'];
            }
            return $area;
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

<!-- Jquery DataTable Plugin Js -->
<script src="../../plugins/jquery-datatable/jquery.dataTables.js"></script>
<script src="../../plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
<script src="../../plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
<script src="../../plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
<script src="../../plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
<script src="../../plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
<script src="../../plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
<script src="../../plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
<script src="../../plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>
<!-- Custom Js -->
<script src="../../js/pages/tables/jquery-datatable.js"></script>

</body>

</html>