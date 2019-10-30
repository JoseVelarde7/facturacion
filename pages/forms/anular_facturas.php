<?php
@session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>EBA</title>
    <link rel="shortcut icon" href="../../images/user2.png">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet"
          type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
    <link href="../../plugins/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="../../plugins/node-waves/waves.css" rel="stylesheet"/>
    <link href="../../plugins/animate-css/animate.css" rel="stylesheet"/>
    <link href="../../plugins/material-design-preloader/md-preloader.css" rel="stylesheet"/>
    <link href="../../plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css"
          rel="stylesheet"/>
    <link href="../../plugins/waitme/waitMe.css" rel="stylesheet"/>
    <link href="../../plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet"/>
    <link href="../../plugins/sweetalert/sweetalert.css" rel="stylesheet"/>
    <link href="../../css/style.css" rel="stylesheet">
    <link href="../../css/themes/all-themes.css" rel="stylesheet"/>
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
              <li class="active">
                  <a href="../../pages/forms/revisualizacion_facturas.php">
                      <i class="glyphicon glyphicon-eye-open"></i>
                      <span>Anular y Revisualizar</span>
                  </a>
              </li>
             <li>
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
        <?php include "pie_pagina.php"; ?>

    </aside>
</section>

<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>
               ANULACION DE FACTURAS
            </h2>
        </div>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">

                    <div class="body">

                        <?PHP
                        $id_fac = $_GET['id_fac'];
                        ECHO '<div class="header">
                                    <h2> Facturas Conjuntas de Numero ' . $id_fac . '</h2>
                            </div>';

                        echo '<div class="table-responsive">';
                        echo '<table align="center" class="table table-hover">';

                        include "php/conexion_facturacion.php";

                        $consulta = pg_query("select id_factura, numero_factura, nombre_empresa, nombre_sucursal ,codigo_control, fecha_factura, a.estado_factura 
from factura a, sucursal b, empresa c 
where a.id_sucursal=b.id_sucursal and b.id_empresa=c.id_empresa and  numero_conjunta=" . $id_fac . ";");
                        include "php/desconectar_facturacion.php";

                        echo '<tr class="bg-light-blue"><td align="center">Nº FACTURA</td><td  align="center">EMPRESA</td><td  align="center">SUCURSAL</td><td  align="center">CODIGO CONTROL</td><td  align="center">FECHA FACTURA</td><td  align="center">ESTADO</td><td  align="center">ANULACION DE FACTURA</td></tr>';
                        while ($array = pg_fetch_assoc($consulta)) {

                            echo '<tr class="active"><td align="center">' . $array['numero_factura'] .
                                '</td>' . '<td align="center">' . $array['nombre_empresa']
                                . '</td>' . '<td align="center">' . $array['nombre_sucursal'] . '</td>'
                                . '<td align="center">' . $array['codigo_control'] . '</td>'
                                . '<td align="center">' . $array['fecha_factura'] . '</td>'
                                . '<td align="center">' . verda($array['estado_factura']) . '</td>'
                                . '<td align="center">' . anul($array['estado_factura'],$array['id_factura'],$id_fac) . '</td>'
                                //  . '<td align="center">' . anul($array['estado_factura'], $array['numero_factura']) . '</td>'
                                . '</tr>';
                        }
                        echo '</table>';
                        echo '</div>';
                        ?>
                            <div class="row clearfix">
                                <!--<div class="col-sm-4">
                                    <div class="col-xs-12">
                                        <button class="btn btn-block bg-pink waves-effect" type="submit"
                                                name="confirma">ANULAR TODAS LAS FACTURAS
                                        </button>
                                    </div>
                                </div>-->
                                <div class="col-sm-4">
                                    <div class="col-xs-12">
                                        <A class="btn btn-block bg-red waves-effect" href="revisualizacion_facturas.php"
                                           type="submit">ATRAS</A>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>








    </div>
</section>

<script src="../../plugins/jquery/jquery.min.js"></script>
<script src="../../plugins/bootstrap/js/bootstrap.js"></script>
<script src="../../plugins/bootstrap-select/js/bootstrap-select.js"></script>
<script src="../../plugins/jquery-slimscroll/jquery.slimscroll.js"></script>
<script src="../../plugins/jquery-validation/jquery.validate.js"></script>
<script src="../../plugins/jquery-steps/jquery.steps.js"></script>
<script src="../../plugins/sweetalert/sweetalert.min.js"></script>
<script src="../../plugins/node-waves/waves.js"></script>
<script src="../../js/admin.js"></script>
<script src="../../js/pages/forms/form-validation.js"></script>


</body>

</html>
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

function anul($anulado, $id,$id_fac)
{
    if ($anulado == 1) {
        $anu =  '<a type="button" class="btn btn-warning waves-effect"'.'href="anulacion_factura.php?factura=' . $id .'&id_fac='.$id_fac.'">'
            .'<i class="glyphicon glyphicon-remove-sign"><br>Anular</i></a>';
    } else {$anu = ' ';}
    return $anu;
}



?>
