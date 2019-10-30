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
<?PHP
$id_fac=$_GET['id_fac'];
$id_factura = $_GET['factura'];


include 'php/conexion_facturacion.php';
$result = pg_query("select a.numero_factura,a.id_factura, d.nombre_empresa,b.nombre_sucursal, c.cliente, c.nit_carnet from factura a, sucursal b, cliente c, empresa d 
where a.id_cliente=c.id_cliente 
and b.id_empresa=d.id_empresa
and a.id_sucursal=b.id_sucursal 
and id_factura=" . $id_factura . ";");
include 'php/desconectar_facturacion.php';
$row = pg_fetch_array($result);
if (is_array($row)) {
    $_SESSION["numero_factura"] = $row['numero_factura'];
    $_SESSION["id_fac"] = $row["id_factura"];
    $_SESSION["nombre_empresa1"] = $row["nombre_empresa"];
    $_SESSION["nombre_sucursal"] = $row["nombre_sucursal"];
    $_SESSION["cliente"] = $row["cliente"];
    $_SESSION["nit_carnet"] = $row["nit_carnet"];
}
?>
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
                        <i class="material-icons">home</i>
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
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">store_mall_directory</i>
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
        <?php include "pie_pagina.php"; ?>

    </aside>
</section>

<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>
                ANULACION DE FACTURA
            </h2>
        </div>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2> <?PHP echo $_SESSION["nombre_area"];
                            ?>

                        </h2>
                    </div>
                    <div class="body">
                        <form id="sign_in" method="POST">
                            <?php
                            echo '<div class="alert alert-warning">Esta seguro de anular la factura Nº ' . $_SESSION["numero_factura"] . '
                             de la empresa de '.$_SESSION["nombre_empresa1"].' emitida para el cliente '.$_SESSION["cliente"].'
                               </div>';
                            ?>
                            <div class="row clearfix">

                                <div class="col-sm-4">
                                    <div class="col-xs-12">
                                        <button class="btn btn-block bg-pink waves-effect" type="submit"
                                                name="confirma">ANULAR
                                        </button>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="col-xs-12">
                                    <?php
                                      echo ' <A class="btn btn-block bg-red waves-effect" href="anular_facturas.php?id_fac='.$id_fac.'" type="submit">CANCELAR</A>';
                                    ?>

                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <?php
        if (isset($_POST['confirma'])) {
            $articulo = array();
            $cantidad = array();
            $i=0;
            include "php/conexion_facturacion.php";
        $qa = pg_query("UPDATE public.factura set  estado_factura=0 WHERE id_factura=" . $_SESSION["id_fac"] . ";");

            $qa1=pg_query("SELECT * From cantidad_articulos_factura where id_factura=".$_SESSION["id_fac"]);

            while ($array = pg_fetch_assoc($qa1)) {
                $articulo[$i]=$array['id_articulo'];
                $cantidad[$i]=$array['cantidad'];
                $i=$i+1;
            }

            For ($j = 0; $j < count($articulo); $j++) {

                  $qa12=pg_query("SELECT * from stock where id_area=".$_SESSION['id_area']." and id_articulo=".$articulo[$j]); 

                 $row12 = pg_fetch_array($qa12);
                if (is_array($row12)) {
                    $cantidadd = $row12['cantidad'];
                }


               $can=$cantidadd+$cantidad[$j];


        $qa8 = pg_query("UPDATE stock SET cantidad=".$can." WHERE id_articulo=".$articulo[$j]." and id_area=".$_SESSION['id_area']);

            }

            include "php/desconectar_facturacion.php";
           // echo ("UPDATE public.factura set  estado_factura=0 WHERE id_factura=" . $_SESSION["id_fac"] . ";");
            echo '<div class="alert alert-success"><strong>LA FACTURA FUE ANULA CON EXITO</strong></div>';
            ECHO '<meta http-equiv="Refresh" content="1;url=anular_facturas.php?id_fac='.$id_fac.'">';
        }
        ?>

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