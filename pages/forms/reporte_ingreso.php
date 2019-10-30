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
    


    <link rel="stylesheet" href="../../plugins/jquery-ui.css">

    <script src="../../plugins/jquery-ui.js"></script>
 <link href="../../plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">
</head>
<body class="theme-teal">
<?php include "cabecera.php"; ?>
<section>
    <aside id="leftsidebar" class="sidebar">
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

             <li class="active">
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="glyphicon glyphicon-list-alt"></i>
                        <span>Almacen control de Stock</span> </a>
                    <ul class="ml-menu">
                        <li>
                            <a href="../../pages/forms/nota_ingreso.php">
                               Ingreso de Productos
                            </a>
                        </li>
                        <li class="active">
                            <a href="../../pages/forms/reporte_ingreso.php">
                                Reporte de Ingresos
                            </a>
                        </li>
                          <li>
                            <a href="../../pages/forms/stock_actual.php">
                                Stock Actual
                            </a>
                        </li>
                    </ul>
                </li>


                <li >
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="glyphicon glyphicon-list-alt"></i>
                        <span>Reportes</span> </a>
                    <ul class="ml-menu">
                        <li >
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

        <?php include "pie_pagina.php"; ?>
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
            <h2>REPORTE DE NOTAS DE INGRESO</h2>
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
                                    <div class="row clearfix">
                                        <div class="col-sm-12">
                                            <select id="area" class="form-control show-tick" name="area">
                                                <?php include "php/seleccion_areas.php" ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                           <!--     <div class="col-sm-6">
                                    <div class="row clearfix">
                                            <div id="sucursaless" class="col-sm-12"  >
                                                <select id="sucu" class="form-control show-tick" name="sucursal">
                                                    <option value="0">Todas las Sucursales</option>
                                                </select>
                                            </div>


                                    </div>
                                </div>
-->

                                <div class="col-sm-4">
                                    <div class="form-group form-float">
                                       <button class="btn btn-info waves-effect" type="submit"
                                                        name="buscar">REGISTROS GENERADOS
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <?php

                            if (isset($_POST['buscar'])) {
$area = $_POST['area'];
                                     include "php/conexion_facturacion.php";
   $consulta = pg_query("
SELECT * from nota_ingreso n, usuario u where n.usr_registro=u.id_usuario and  n.id_area=" . $area . " ORDER BY numero DESC;");

                                        include "php/desconectar_facturacion.php";

?>

                                   <div class="table-responsive">
                                    <table align="center" class="table table-bordered table-striped table-hover dataTable js-exportable">
                                <thead>
                                <tr class="bg-teal">
                                    <th align="center">Nº</th>
                                    <th align="center">NUMERO</th>
                                    <th align="center">FECHA DE INGRESO</th>
                                    <th align="center">USUARIO DE REGISTRO</th>
                                    <th align="center">VER NOTAS</th>
                                    
                                   
                                   
                                </tr>
                                </thead>
                                <tfoot>
                                <tr class="bg-teal">
                                    <th align="center">Nº</th>
                                    <th align="center">NUMERO</th>
                                    <th align="center">FECHA DE INGRESO</th>
                                    <th align="center">USUARIO DE REGISTRO</th>
                                    <th align="center">VER NOTAS</th>
                                  
                                </tr>
                                </tfoot>
                               <?php  
$t=1;
                                    while ($array = pg_fetch_assoc($consulta)) {
                                      
                                        echo '<tr class="active">
                                            <td align="center">' . $t .
                                            '</td>' . '<td align="center">' . $array['numero']
                                            . '</td>' . '<td align="center">' . substr($array['fecha'], 0, 10)  . '</td>'
                                            . '<td align="center">' . $array['usuario'].' </td>'
                                            . '<td align="center"><a class="btn btn-sm btn-primary" href="reimprimir_nota_ingreso.php?nota=' . $array['id_nota_ingreso'] . '" target="_blank"><i class="material-icons">remove_red_eye</i>Abrir Nota</a>'
                                            

                                            //  . '<td align="center">' . anul($array['estado_factura'], $array['numero_factura']) . '</td>'


                                            . '</tr>';

                                            $t=$t+1;
                                    }
                                    echo '</table>';
                                    echo '</div>';



                            }
                             







                            ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap Core Js -->
<script src="../../plugins/bootstrap/js/bootstrap.js"></script>
<!-- Select Plugin Js -->
<script src="../../plugins/bootstrap-select/js/bootstrap-select.js"></script>
<!-- Slimscroll Plugin Js -->
<script src="../../plugins/jquery-slimscroll/jquery.slimscroll.js"></script>
<!-- Waves Effect Plugin Js -->
<script src="../../plugins/bootstrap-notify/bootstrap-notify.js"></script>
<script src="../../plugins/node-waves/waves.js"></script>
<!-- Jquery CountTo Plugin Js -->
<script src="../../plugins/jquery-countto/jquery.countTo.js"></script>


<!-- Custom Js -->
<script src="../../js/admin.js"></script>


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