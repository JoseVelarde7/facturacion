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
    <title>FACTURAS</title>
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
                                    <div class="col-sm-3">
                                        <b>AREA FACTURADA</b>
                                        <div class="input-group">

                                            <div class="form-group form-float">
                                                <div class="row clearfix">
                                                    <div class="col-sm-12">
                                                        <select name="area" id="estado" class="form-control show-tick">
                                                            <?php include "php/seleccion_areas.php" ?>
                                                        </select>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

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
                                    $area = $_POST['area'];

                                    if ($area == '0') {

                                        ECHO '<div class="header">
                                    <h2> Facturas emitidas de ' . $fechainicio1 . "  al  " . $fechafin1 . '</h2>
                            </div>';

                                        include "php/conexion_facturacion.php";
                                        $consulta = pg_query("
SELECT distinct a.numero_conjunta,b.nit_carnet, b.cliente, a.fecha_factura,a.id_area, a.fechahora_aud_factura, c.usuario
FROM factura a, cliente b, usuario c
WHERE a.id_cliente=b.id_cliente 
and a.id_usuario=c.id_usuario
and fecha_factura>='" . $fechainicio1 . "'
  and fecha_factura<='" . $fechafin1 . "'
  ORDER BY a.numero_conjunta DESC;");

                                        include "php/desconectar_facturacion.php";


                                    } else {
                                        ECHO '<div class="header">
                                    <h2> Facturas emitidas de ' . $fechainicio1 . "  al  " . $fechafin1 . " en el area de " . area($area) . '</h2>
                            </div>';

                                        include "php/conexion_facturacion.php";
                                        $consulta = pg_query("
SELECT distinct a.numero_conjunta,b.nit_carnet, b.cliente, a.fecha_factura,a.id_area, c.usuario
FROM factura a, cliente b, usuario c
WHERE a.id_cliente=b.id_cliente 
and a.id_usuario=c.id_usuario
and a.id_area='" . $area . "'
and fecha_factura>='" . $fechainicio1 . "'
  and fecha_factura<='" . $fechafin1 . "'
  ORDER BY a.numero_conjunta DESC;");

                                        include "php/desconectar_facturacion.php";

                                    }


                                    echo '<div class="table-responsive">';
                                    echo '<table align="center" class="table table-hover">';


                                    echo '<tr class="bg-light-blue"><td align="center">Nº FACTURA</td>
                                                        <td  align="center">NIT CLIENTE</td>
                                                        <td  align="center">NOMBRE CLIENTE</td>
                                                        <td  align="center">ESTADO</td>
                                                        <td  align="center">NUMERO DE FACTURAS</td>
                                                          <td  align="center">TOTAL (BS)</td>
                                                        <td  align="center">AREA EXPEDITA</td>
                                                        <td  align="center">FECHA Y HORA EMITIDA</td>
                                                        <td  align="center">USUARIO</td> <td  align="center">VER</td></tr>';

                                    while ($array = pg_fetch_assoc($consulta)) {
                                        $date = date_create(fecha_hora($array['numero_conjunta']));
                                        echo '<tr class="active"><td align="center">' . $array['numero_conjunta'] .
                                            '</td>' . '<td align="center">' . $array['nit_carnet']
                                            . '</td>' . '<td align="center">' . $array['cliente'] . '</td>'
                                            . '<td align="center">' . conteovigentes($array['numero_conjunta']).' '.conteoanuladas($array['numero_conjunta']) . '</td>'
                                            . '<td align="center">' . conteo($array['numero_conjunta']) . '</td>'
                                            . '<td align="center">' . total($array['numero_conjunta']) . '</td>'
                                            . '<td align="center">' . area($array['id_area']) . '</td>'
                                            . '<td align="center">' . date_format($date, 'd/m/Y -  H:i a') . '</td>'
                                            . '<td align="center">' . $array['usuario'] . '</td>'
                                            . '<td align="center"><a class="btn btn-sm btn-primary" href="imprimir_carta_vista.php?id_fac=' . $array['numero_conjunta'] . '" target="_blank"><i class="material-icons">remove_red_eye</i>PDF</a>'
                                            . '<a class="btn btn-sm btn-danger" href="termica_factura.php?id_fac=' . $array['numero_conjunta'] . '" target="_blank"><i class="material-icons">remove_red_eye</i>ROLLO</a></td>'

                                            //  . '<td align="center">' . anul($array['estado_factura'], $array['numero_factura']) . '</td>'


                                            . '</tr>';
                                    }
                                    echo '</table>';
                                    echo '</div>';


                                } else {

                                    ECHO '<div class="header">
                                    <h2> Facturas Conjuntas Emitidas en mes de ' . strftime("%B de %Y") . '</h2>
                            </div>';
/*echo ("
SELECT distinct a.numero_conjunta,b.nit_carnet, b.cliente, a.fecha_factura,a.id_area, a.fechahora_aud_factura, c.usuario
FROM factura a, cliente b, usuario c
WHERE a.id_cliente=b.id_cliente 
and a.id_usuario=c.id_usuario
and fecha_factura>='" . $fechainicial . "'
  and fecha_factura<='" . $fechafinal . "'
  ORDER BY a.numero_conjunta DESC;");*/
                                    echo '<div class="table-responsive">';
                                    echo '<table align="center" class="table table-hover">';

                                    include "php/conexion_facturacion.php";
                                    $consulta = pg_query("
SELECT distinct a.numero_conjunta,b.nit_carnet, b.cliente, a.fecha_factura,a.id_area,  c.usuario
FROM factura a, cliente b, usuario c
WHERE a.id_cliente=b.id_cliente 
and a.id_usuario=c.id_usuario
and fecha_factura>='" . $fechainicial . "'
  and fecha_factura<='" . $fechafinal . "'
  ORDER BY a.numero_conjunta DESC;");

                                    include "php/desconectar_facturacion.php";


                                    echo '<tr class="bg-light-blue"><td align="center">Nº FACTURA</td>
                                                        <td  align="center">NIT CLIENTE</td>
                                                        <td  align="center">NOMBRE CLIENTE</td>
                                                         <td  align="center">ESTADO</td>
                                                        <td  align="center">NUMERO DE FACTURAS</td>
                                                          <td  align="center">TOTAL (BS)</td>
                                                        <td  align="center">AREA EXPEDITA</td>
                                                        <td  align="center">FECHA Y HORA EMITIDA</td>
                                                        <td  align="center">USUARIO</td><td  align="center">VER</td></tr>';
                                    while ($array = pg_fetch_assoc($consulta)) {
                                        $date = date_create(fecha_hora($array['numero_conjunta']));
                                        echo '<tr class="active"><td align="center">' . $array['numero_conjunta'] .
                                            '</td>' . '<td align="center">' . $array['nit_carnet']
                                            . '</td>' . '<td align="center">' . $array['cliente'] . '</td>'
                                            . '<td align="center">' . conteovigentes($array['numero_conjunta']).' '.conteoanuladas($array['numero_conjunta']) . '</td>'
                                            . '<td align="center">' . conteo($array['numero_conjunta']) . '</td>'
                                            . '<td align="center">' . total($array['numero_conjunta']) . '</td>'
                                            . '<td align="center">' . area($array['id_area']) . '</td>'
                                            . '<td align="center">' . date_format($date, 'd/m/Y -  H:i a') . '</td>'
                                            . '<td align="center">' . $array['usuario'] . '</td>'
                                            . '<td align="center"><a class="btn btn-sm btn-primary" href="imprimir_carta_vista.php?id_fac=' . $array['numero_conjunta'] . '" target="_blank">PDF</a>'
                                            . '<a class="btn btn-sm btn-danger" href="termica_factura.php?id_fac=' . $array['numero_conjunta'] . '" target="_blank">ROLLO</a></td>'
                                            //  . '<td align="center">' . anul($array['estado_factura'], $array['numero_factura']) . '</td>'
                                            . '</tr>';
                                    }
                                    echo '</table>';
                                    echo '</div>';

                                }


                                ?>


                            </div>
                        </div>
                    </div>
                </div>


            </form>
        </div>


        <?php
        function total($id_fact)
        {
            $total = 0;
            include 'php/conexion_facturacion.php';
            $qa11 = pg_query("SELECT * FROM public.cantidad_articulos_factura a, public.articulo b, public.precios_articulo c, factura d
  where b.id_articulo=c.id_articulo  
  and d.id_factura=a.id_factura
  and d.estado_factura=1
  and a.id_articulo=b.id_articulo 
  and a.id_precio_articulo=c.id_precio_articulo 
  and d.numero_conjunta=" . $id_fact . ";");
            include 'php/desconectar_facturacion.php';
            while ($array = pg_fetch_assoc($qa11)) {
                $mult = $array['cantidad'] * $array['precio_articulo'];
                $total = $total + $mult;
            }
            $total2 = number_format($total, 2, ',', '.');
            return $total2;

        }



        function fecha_hora($id_fact)
        {
            include 'php/conexion_facturacion.php';
            $qa11 = pg_query("SELECT fechahora_aud_factura FROM factura where numero_conjunta=" . $id_fact . ";");
            include 'php/desconectar_facturacion.php';
            while ($array = pg_fetch_assoc($qa11)) {
                $fecha = $array['fechahora_aud_factura'] ;
            }
            return $fecha;

        }





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
                    '<i class="material-icons">signal_cellular_no_sim</i></a>';

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
            $veren = '<span class="label bg-red">'.$conteo.'</span>';

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
            $veren = '<span class="label bg-green">'.$conteo.'</span>';
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


</body>

</html>