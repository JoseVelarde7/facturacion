<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>EBA</title>
    <!-- Favicon-->
    <link rel="shortcut icon" href="../../images/user1.png">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet"
          type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">-->
    <link href="../../plugins/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="../../plugins/node-waves/waves.css" rel="stylesheet"/>
    <link href="../../plugins/material-design-preloader/md-preloader.css" rel="stylesheet"/>
    <link href="../../plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet"/>
    <link href="../../css/style.css" rel="stylesheet">
    <link href="../../css/themes/all-themes.css" rel="stylesheet"/>
    <script src="../../plugins/jquery-latest.js"></script>
</head>
<body class="theme-teal">


<?PHP
session_start();
setlocale(LC_TIME, 'spanish');
date_default_timezone_set("America/La_Paz");
include "php/seleccion_productos.php";

?>

<!-- Page Loader -->
<?php include "cabecera.php"; ?>

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
                <li >
                    <a href="../../pages/forms/pagina_principal.php">
                        <i class="glyphicon glyphicon-home"></i>
                        <span>Inicio</span>
                    </a>
                </li>
       <?php
          if($_SESSION["funcion"]==2){
                ?>

              <li class="active">
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
                        <li class="active">
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
    <!-- #END# Left Sidebar -->
    <!-- Right Sidebar -->

    <!-- #END# Right Sidebar -->
</section>
<div class="wrapper">
    <div class="content-wrapper" id="cont-cambiar">


        <script>
            var indexItems = 0;
            $(document).ready(function () {
                $('#add_item').click(function () {
                    var itemColumn = $('<tr id="items_' + indexItems + '" index="' + indexItems + '" class="items_colums" >'
                        + '<td><input autocomplete="off" list="productos" name="productos" id="item_name_' + indexItems + '" type="text" item_id="" class="inputt form-control show-tick form-line" required></td>'
                        + '<td width="80px"><input   id="item_quantity_' + indexItems + '" type="number" class="item_quantity css-number_text form-control form-line" value="1" min=1 required></td>'
                         + '<td ><input   id="item_obs_' + indexItems + '" type="text" class="css-number_text form-control form-line" ></td>'
                        + '<td style="text-align: center"><a href="javascript:void(0)" class="remove_item"><i class="glyphicon glyphicon-remove-sign" style="color: red" ></i></a></td>'
                        + '</tr>');
                    $('#items_panel').append(itemColumn);
                    indexItems++;
                });
   
                $(document).on('click', '.remove_item', function () {
                    $('#items_' + $(this).parent().parent().attr('index')).remove();
                });

                $('#invoice_form').submit(function (e) {
                    e.preventDefault();
                    var id_items = [];
                    var quantity_items = [];
                    var price_items = [];
                    var obs_items = [];
                    $('.items_colums').each(function () {
                        var index = $(this).attr('index');
                        id_items.push($('#item_name_' + index).val());
                        quantity_items.push($('#item_quantity_' + index).val());
                        obs_items.push($('#item_obs_' + index).val());
                        //   console.log("item = "+id_items.push($('#item_name_' + index).val('item_id')));
                        //   console.log("cantidad = "+quantity_items.push($('#item_quantity_' + index).val()));
                        //   console.log("precio = "+price_items.push($('#item_pu_' + index).html()));
                    });
                        //  console.log("items   " + id_items);
                        //     console.log("cantidad " + quantity_items);
                        //  console.log("precio " + price_items);
                        //    console.log("fecha " + $('.date_panel').html());
                        //   console.log("nit " + $('#invoice_nit').val());
                        //   console.log("cliente " + $("#invoice_client").val());

                    $.ajax({
                        data: {

                            area: $("#id_area").val(),
                            id_items: id_items,
                            quantity_items: quantity_items,
                            obs_items: obs_items
                        },
                        url: 'php/guardar_nota_ingreso.php',
                        type: 'post',
                        beforeSend: function () {
                            //  showLoadingPanel();
                            //  console.log("cargando");
                            //  console.log("datos "+ data);
                            //  console.log(id_items.val());
                          location.href = "cargado_ingreso.php";

                            //  location.reload();
                        },
                        success: function (data) {
                            console.log(data);
                            
                        }
                    });
                });
            });
        </script>
        <section class="content">
            <div class="container-fluid">
                <div class="block-header">
                    <h2> FACTURACION CONJUNTA
                    </h2>
                </div>
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="header">
                                <h2>NOTA DE INGRESO - ALMACEN</h2>
                            </div>
                            <form id="invoice_form" role="form">
                                <div class="body">

                                    <div class="row clearfix">

                                       
                                    
                                    </div>




                                 <div class="col-sm-6">
                                    <b>Area de Trabajo</b>
                                    <div class="input-group">

                                        <div class="form-group form-float" >
                                            <div class="form-line">
                                                <select class="form-control" name="id_area" id="id_area">
                                                    <option value="0">seleccione uno</option>
                                                    <?php  include "php/seleccion_areas.php" ?>
                                                
                                                <select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                        <div class="col-sm-6">
                                        <button class="btn btn-info waves-effect" type="button" id="add_item"
                                                href="javascript:void(0)">AÑADIR PRODUCTO
                                        </button>
                                    </div>
                                    
                                    <div class="form-group">
                                        <table id="invoice_items" class="table">
                                            <tbody>
                                            <tr>
                                                <th WIDTH="600">Producto</th>
                                                <th WIDTH="50">Cantidad</th>
                                                <th WIDTH="300">Observacion</th>
                                                <th></th>
                                            </tr>
                                            </tbody>
                                            <tbody id="items_panel">
                                            </tbody>
                                            <tfoot>
                                          
                                            </tfoot>
                                        </table>
                                    </div>
  









                                    <div class="row clearfix">
                                        <div class="col-sm-3">
                                            <button type="submit" class="btn btn-info waves-effect"> REGISTRAR INGRESO
                                            </button>
                                        </div>
                                    

                                    <?php if ($_SESSION["ingresoo"] > 1) {
                                            echo "  <div class='col-sm-3'><a href='imprimir_nota_ingreso.php' target='_blank' class='btn btn-primary waves-effect'>IMPRIMIR INGRESO</a></div>";
                                        } ?>

                            </div>




                                </div><!-- /.box-body -->
                            </form>
                            <!-- <div class='col-sm-2'><a id="vista_previa" href="vista_previa_factura.php" target="_blank"
                                                           class='btn btn-info waves-effect'>VISTA
                                     PRELIMINAR</a>
                             </div>



                              <div class='col-sm-2'><a id="vista_previa"  onclick="fra.location='factura_vista_previa.php';return false"
                                                             alt="vista"
                                                             class='btn btn-info waves-effect'>VISTA
                                            PRELIMINAR</a>
                                    </div>





                             -->

                            <!--     <div class='col-sm-2'><a id="vista_previa"
                                                           class='btn btn-info waves-effect'
                                                          >VISTA
                                          PRELIMINAR</a>
                                  </div>-->
                            <!-- <div class="alert alert-success">
                                 <strong>DATOS GUARDADOS CORRECTAMENTE </strong>  Pulse el boton para ver e imprimir la factura
                                 <button type="button" class="btn btn-primary waves-effect" data-toggle="modal" data-target="#myModal">FACTURA</button>
                             </div>-->
                        </div><!-- /.box -->
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>






<?php
if (isset($_POST['guardar'])) {
    ECHO '<meta http-equiv="refresh" content="2;url=venta_producto.php">';
}
?>
<script>
    $(document).ready(function () {
        // simpleLoadAjax('application/view/invoice_edit.php');
    });
</script>
<div id="lightboxOverlay" class="lightboxOverlay" style="display: none;"></div>
<div id="lightbox" class="lightbox" style="display: none;">
    <div class="lb-outerContainer">
        <div class="lb-container"><img class="lb-image" src="">
            <div class="lb-nav"><a class="lb-prev" href=""></a><a class="lb-next" href=""></a></div>
            <div class="lb-loader"><a class="lb-cancel"></a></div>
        </div>
    </div>
    <div class="lb-dataContainer">
        <div class="lb-data">
            <div class="lb-details"><span class="lb-caption"></span><span class="lb-number"></span></div>
            <div class="lb-closeContainer"><a class="lb-close"></a></div>
        </div>
    </div>
</div>

<span role="status" aria-live="assertive" aria-relevant="additions" class="ui-helper-hidden-accessible"></span>
<script src="../../plugins/bootstrap/js/bootstrap.js"></script>
<script src="../../plugins/bootstrap-select/js/bootstrap-select.js"></script>
<script src="../../plugins/jquery-slimscroll/jquery.slimscroll.js"></script>
<script src="../../plugins/jquery-validation/jquery.validate.js"></script>
<script src="../../plugins/node-waves/waves.js"></script>
<script src="../../js/admin.js"></script>
<script src="../../js/pages/forms/form-validation.js"></script>
<script src="../../js/demo.js"></script>
</body>
</html>