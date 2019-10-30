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
</head>







<body class="theme-teal">

<?PHP
$id_suc = $_GET['id_suc'];

include 'php/conexion_corba.php';
$result = pg_query("SELECT *  FROM facturacion.sucursal
  WHERE id_sucursal=".$id_suc.";");
include 'php/desconectar_corba.php';
$row = pg_fetch_array($result);// guardo el resultado en un array
if (is_array($row)) { // verifico q exista el array en caso positivo
    $_SESSION["nombre_sucursal"] = $row['nombre_sucursal'];
    $_SESSION["id_sucursal"] = $row['id_sucursal'];
    $_SESSION["estado"] = $row['estado'];
}
?>
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
     <?php include "pie_pagina.php";?>
        <!-- #Footer -->
    </aside>
    <!-- #END# Left Sidebar -->
    <!-- Right Sidebar -->

    <!-- #END# Right Sidebar -->
</section>

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>
                    EDITAR DATOS DE LA SUCURSAL

                </h2>
            </div>
            <!-- Basic Validation -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2> <?PHP  echo  $_SESSION["nombre_area"];
                                ?>

                            </h2>

                        </div>
                        <div class="body">
                            <form id="sign_in" method="POST">

                                <div class="row clearfix">

                                    <div class="col-sm-6">
                                        <b>NOMBRE DE SUCURSAL</b>
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="text" class="form-control" name="nombre_sucursal" value="<?php echo $_SESSION['nombre_sucursal']?>" required>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <b>ESTADO DE LA SUCURSAL</b>
                                        <div class="input-group">
                                            <div class="form-group form-float" >
                                                <div class="row clearfix">
                                                    <div class="col-sm-12">
                                                        <select name="estado" id="estado" class="form-control show-tick">
                                                            <option value="2"><?php echo estado($_SESSION['estado']) ?></option>
                                                            <option value="true">ACTIVAR</option>
                                                            <option value="false">DESACTIVAR</option>
                                                        </select>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="col-xs-12">
                                            <button class="btn btn-block bg-pink waves-effect" type="submit" name = "confirma">GUARDAR</button>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="col-xs-12">
                                            <A class="btn btn-block bg-red waves-effect" href="gestion_sucursal.php" type="submit" >CANCELAR</A>
                                        </div>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>





<?php

function estado($estado)
{
if($estado=='t'){$ac="ACTIVO";}
else{$ac="DESACTIVADO";}
return $ac;
}

if(isset($_POST['confirma']))
{
    $esta=$_POST['estado'];
    $nombre=$_POST['nombre_sucursal'];

    if($esta==2){
        include "php/conexion_corba.php";
        $qa = pg_query("UPDATE facturacion.sucursal SET nombre_sucursal='".$nombre."' WHERE id_sucursal=".$_SESSION["id_sucursal"] .";");
      //  echo  ("UPDATE facturacion.sucursal SET estado=false WHERE id_sucursal=".$_SESSION["id_sucursal"] .";");
        include "php/desconectar_corba.php";
    }else{
        include "php/conexion_corba.php";
        $qa = pg_query("UPDATE facturacion.sucursal SET estado=".$esta.", nombre_sucursal='".$nombre."'WHERE id_sucursal=".$_SESSION["id_sucursal"] .";");
        //echo  ("UPDATE facturacion.sucursal SET estado=false WHERE id_sucursal=".$_SESSION["id_sucursal"] .";");
        include "php/desconectar_corba.php";
    }


                echo '<div class="alert alert-success">
  <strong>LA SUCURSAL FUE MOFICICADA CON EXITO</strong> 
</div>';
     ECHO '<meta http-equiv="Refresh" content="1;url=gestion_sucursal.php">';
            }

?>

        </div>
    </section>

    <!-- Jquery Core Js -->
    <script src="../../plugins/jquery/jquery.min.js"></script>

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