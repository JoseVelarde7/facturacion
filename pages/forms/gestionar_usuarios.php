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
    


    <link rel="stylesheet" href="../../plugins/jquery-ui.css">

    <script src="../../plugins/jquery-ui.js"></script>
 <link href="../../plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">
</head>

<body class="theme-teal">
<!-- Page Loader -->
<?php include "cabecera.php"; 

  include "php/conexion_facturacion.php";
  $consulta = pg_query("SELECT tipo_usuario, nombres, paterno, materno, id_usuario, id_estado
  from public.usuario a , public.persona b, public.roles_usuario c 
where a.id_persona=b.id_persona
and a.id_rol=c.id_roles");
                                  include "php/desconectar_facturacion.php";

?>
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
                <li class="active">
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
    <!-- #END# Right Sidebar -->
</section>
<section class="content">

    <div class="container-fluid">
      
      


  <div class="body">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header bg-blue-grey">
                        <h2>
                            <i class="glyphicon glyphicon-th-list"></i>  GESTION DE USUARIOS
                        </h2>
                        <ul class="header-dropdown m-r--5">
                           <!-- <a data-toggle="modal" class="btn bg-teal btn-block btn-sm waves-effect" data-target="#nuevo_registro_eba">NUEVO REGISTRO</a>-->
                            <!--<li class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">more_vert</i>
                                </a>
                                <ul class="dropdown-menu pull-right">
                                    <li>
                                        
                                    </li>
                                </ul>
                            </li>-->
                        </ul>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                <thead>
                                   <tr class="bg-teal">
                                    <th align="center">Nº</th>
                                    <th align="center">TIPO USUARIO</th>
                                    <th align="center">NOMBRE DE USUARIO</th>
                                    <th align="center">ESTADO</th>
                                    <th align="center">DAR DE BAJA</th>
                                    <th align="center">MODIFICAR</th>
                                   
                                   
                                </tr>
                                </thead>
                                <tfoot>
                                    <tr class="bg-teal">
                                   <th align="center">Nº</th>
                                    <th align="center">TIPO USUARIO</th>
                                    <th align="center">NOMBRE DE USUARIO</th>
                                    <th align="center">ESTADO</th>
                                    <th align="center">DAR DE BAJA</th>
                                    <th align="center">MODIFICAR</th>
                                  
                                </tr>
                                </tfoot>
                            <tbody>
                                            <?php
                                            $cont = 1;
                                           
                                            while($row = pg_fetch_array($consulta)) {
                                                ?>
                                                <tr>
                                                    <td><?php echo $cont;?></td>
                                                    <td><?php echo strtoupper($row['tipo_usuario'])?></td>
                                                    <td><?php echo strtoupper($row['paterno'])." ".strtoupper($row['materno']). ", ".strtoupper($row['nombres']);?></td>
                                                     <td align="center"><?php echo verda($row['id_estado']); ?></td>
                                                    <td  align="center"><?php echo anul($row['id_estado'],$row['id_usuario']);?></td>
                                                     <td  align="center"><?php echo '<a class="btn btn-sm btn-primary" href="modificar_usuario.php?id_us=' . $row['id_usuario'] . '" target=""><i class="glyphicon glyphicon-pencil"></i></a>';?></td>
                                                   
                                                  
                                                   

                                                  
                                                </tr>
                                                <?php
                                                $cont++;
                                            }
                                            ?>
                                        </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



















        <?php

        function verda($estado)
        {
            if($estado=='A'){$veren= '<span class="label bg-green">A</span>';}
            else{$veren= '<span class="label bg-red">I</span>';}

            return $veren;
        }

        function anul($anulado,$id)
        {
            if($anulado=='A'){
                $anu = '<a class="btn btn-warning waves-effect"'.
                    ' href="inactivar_usuario.php?id_us='.$id.
                    '"target="">'.
                    '<i class="glyphicon glyphicon-remove-sign">
                    </i></a>';
            }else{
                $anu = '  ';
            }

            return $anu;
        }






        ?>

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