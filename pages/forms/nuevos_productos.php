<!DOCTYPE html>
<html>
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


    <!--  <script src="//code.jquery.com/jquery-latest.js"></script>-->
    <script src="../../plugins/jquery-latest.js"></script>
</head>
<body class="theme-teal">


<?PHP
session_start();
setlocale(LC_TIME, 'spanish');
date_default_timezone_set("America/La_Paz");
//include "php/seleccion_productos_factura.php";
?>

<!-- Page Loader -->
<?php include "cabecera.php";?>

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


                <li class="active">
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="glyphicon glyphicon-usd"></i>
                        <span>Precios y Productos</span> </a>
                    <ul class="ml-menu">
                        <li class="active">
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
        <?php include "pie_pagina.php";?>
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
                        +'<td width="85px" ><input  name="productos" id="pro_codigo_'+ indexItems +'" type="text" item_id="" class="inputt form-control show-tick form-line" onblur="aMayusculas(this.value,this.id)" required></td>'
                        + '<td width="400px"><input   id="pro_detalle_' + indexItems + '" type="text" class="item_quantity css-number_text form-control form-line"  required></td>'
                        + '<td width="90px"><input   id="pro_medida_' + indexItems + '" type="text" class="item_quantity css-number_text form-control form-line"  required></td>'
                        + '<td width="90px"><input   id="pro_cantidad_' + indexItems + '" type="text" class="item_quantity css-number_text form-control form-line"  required></td>'
                        + '<td width="90px"><input   id="pro_unidad_' + indexItems + '" type="text" class="item_quantity css-number_text form-control form-line"  ></td>'
                        + '<td width="150px"><select class="form-control" id="pro_empresa_' + indexItems + '" item_id=""><?php include 'php/seleccion_empresas.php'?></select></td>'
                        + '<td width="20px" style="text-align: center"><a href="javascript:void(0)" class="remove_item"><i class="glyphicon glyphicon-remove-sign" style="color: red" ></i></a></td>'
                        + '</tr>');

                    $('#items_panel').append(itemColumn);
                    indexItems++;
                });

                   $(document).on('click', '.remove_item', function () {
                    $('#items_' + $(this).parent().parent().attr('index')).remove();
                    updateTotalInvoice();
                });

                $('#invoice_form').submit(function (e) {
                    e.preventDefault();

                    var codigo_productos = [];
                    var descripcion_producto = [];
                    var medida_produtos = [];
                    var cantidad_produtos = [];
                    var unidad_produtos = [];
                    var empresa_produto = [];
                    $('.items_colums').each(function () {
                        var index = $(this).attr('index');
                        codigo_productos.push($('#pro_codigo_' + index).val());
                        descripcion_producto.push($('#pro_detalle_' + index).val());
                        medida_produtos.push($('#pro_medida_' + index).val());
                        cantidad_produtos.push($('#pro_cantidad_' + index).val());
                        unidad_produtos.push($('#pro_unidad_' + index).val());
                        empresa_produto.push($('#pro_empresa_' + index).val());
                    });
                    $.ajax({
                        data: {
                            codigos: codigo_productos,
                            descripcion: descripcion_producto,
                            medidas: medida_produtos,
                            cantidad: cantidad_produtos,
                            unidad: unidad_produtos,
                            empresa: empresa_produto
                        },
                        url: 'php/guardar_productos.php',
                        type: 'post',
                        beforeSend: function () {
                             location.href = "cargando_productos.php";

                        },
                        success: function (data) {
                            console.log(data);
                        }
                    });
                });
            });

            $('#invoice_form').submit(function (e) {
                location.reload(tryLoad(true));

            });





        </script>


        <!-- Main content -->
        <section class="content">

            <div class="container-fluid">
                <div class="block-header">
                    <h2>
                        INGRESO DE PRODUCTOS
                    </h2>
                </div>

                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="header">
                                <h2>INGRESE LOS DATOS DE LOS PRODUCTOS</h2>

                            </div>
                            <!-- form start -->
                            <form id="invoice_form" role="form">
                                <div class="body">

                                    <div class="row clearfix">

                                        <div class="col-sm-6">

                                        </div>


                                        <div class="col-sm-6">

                                        </div>

                                    </div>
                                    
                                    <div class="mensajeError">

                                        
                                    </div>



                                    <div class="">
                                        <button class="btn btn-info waves-effect" type="button" id="add_item"
                                                href="javascript:void(0)">INGRESAR PRODUCTO
                                        </button>

                                    </div>

                                    <div class="form-group">
                                        <table id="invoice_items" class="table">
                                            <tbody>
                                            <tr>
                                               
                                                <th>Codigo</th>
                                                <th>DESCRIPCION DE ARTICULO</th>
                                                <th>TIPO DE PRESENTACION</th>
                                                <th>CANTIDAD INGRESADA</th>
                                                <th>UNIDAD DE MEDIDA</th>
                                                <th>Empresa</th>
                                                <th></th>
                                            </tr>
                                            </tbody>
                                            <tbody id="items_panel">

                                            </tbody>
                                            <!-- <tfoot>
                                             <tr>
                                                 <th colspan="3" class="text-right text-primary"
                                                     style="padding-right: 10px">
                                                     TOTAL:
                                                 </th>

                                                 <th style="text-align: right"><span id="total_cost"
                                                                                     class="text-success">0.00</span>
                                                 </th>
                                             </tr>
                                             </tfoot>-->
                                        </table>
                                    </div>
                                    <div class="row clearfix">
                                        <div class="col-sm-6">
                                            <button type="submit" class="btn btn-info waves-effect"> GUARDAR DATOS DE LOS PRODUCTOS
                                            </button>
                                        </div>
                                        <?php /*if ($_SESSION['facturar'] > 1) {
                                            echo "  <div class='col-sm-6'><a data-toggle='modal' data-target='#myModal' class='btn btn-primary waves-effect'>VER LA ULTIMA FACTURA</a></div>";
                                        } */?>
                                    </div>
                                </div><!-- /.box-body -->


                            </form>

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


<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Factura</h4>
            </div>
            <div class="modal-body">

                <?Php


                echo ' <iframe src="php/facturapdf.php" width="100%" height="500" frameborder="0" allowtransparency="true"></iframe>';;
                ?>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
        </div>

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
    function verificarCodigo(valor,id) {
        
        var txtCodigo = 'pro_codigo_' + id;
        var bandera = true;
        console.log(valor);
        console.log(txtCodigo);
        //var textInput = document.getElementById(textbox).value; 
        var codigo_productos = [];

        $('.items_colums').each(function () {
            var index = $(this).attr('index');
            codigo_productos.push($('#pro_codigo_' + index).val());            
        });
        console.log(codigo_productos);
        var corto_codigo = codigo_productos.slice().sort();
        console.log(corto_codigo);
        var repetido = [];
        for (var i = 0; i < corto_codigo.length - 1; i++) {
            if (corto_codigo[i + 1] == corto_codigo[i]) {
                repetido.push(corto_codigo[i]);
            }
        }

        console.log(repetido[0]);
        if (repetido[0] == undefined) {
            console.log("undefined")
            $.ajax({
                type: "GET",
                data: {codigo: valor},
                url: 'php/verificar_codigo_articulo.php',
                success: function(data){
                    if (data > 0) {
                        document.getElementById(txtCodigo).value = '';
                        $( "div.mensajeError" ).html( "<div class='alert alert-danger'><strong>El codigo: "+ valor +" ya existe en un producto..</strong></div>" );
                    }
                    else{
                        $( "div.mensajeError" ).html( "" );
                    }
                }
            });
        }
        else{
            console.log("si existe")
            $( "div.mensajeError" ).html( "<div class='alert alert-danger'><strong>El codigo: "+ valor +" ya existe en un producto..</strong></div>" );
            document.getElementById(txtCodigo).value = '';
        }

        
        // for (var i = 0; i < codigo_productos.length; i++) {
        //     if (valor == codigo_productos[i]) {
        //         bandera = false;
        //         $( "div.mensajeErrorInterno" ).html( "<div class='alert alert-danger'><strong>El codigo: "+ valor +" ya existe en un producto..</strong></div>" );
        //     }
        // } 

        //if (true) {}    
        

    }

     function aMayusculas(obj,id){
        obj = obj.toUpperCase();
        document.getElementById(id).value = obj;

        //var txtCodigo = 'pro_codigo_' + id;
        var txtCodigo = id
        var valor = document.getElementById(id).value;
        var bandera = true;
        console.log(valor);
        console.log(txtCodigo);
        //var textInput = document.getElementById(textbox).value; 
        var codigo_productos = [];

        $('.items_colums').each(function () {
            var index = $(this).attr('index');
            codigo_productos.push($('#pro_codigo_' + index).val());            
        });
        console.log(codigo_productos);
        var corto_codigo = codigo_productos.slice().sort();
        console.log(corto_codigo);
        var repetido = [];
        for (var i = 0; i < corto_codigo.length - 1; i++) {
            if (corto_codigo[i + 1] == corto_codigo[i]) {
                repetido.push(corto_codigo[i]);
            }
        }

        console.log(repetido[0]);
        if (repetido[0] == undefined) {
            console.log("undefined")
            $.ajax({
                type: "GET",
                data: {codigo: valor},
                url: 'php/verificar_codigo_articulo.php',
                success: function(data){
                    if (data > 0) {
                        document.getElementById(txtCodigo).value = '';
                        $( "div.mensajeError" ).html( "<div class='alert alert-danger'><strong>El codigo: "+ valor +" ya existe en un producto..</strong></div>" );
                    }
                    else{
                        $( "div.mensajeError" ).html( "" );
                    }
                }
            });
        }
        else{
            console.log("si existe")
            $( "div.mensajeError" ).html( "<div class='alert alert-danger'><strong>El codigo: "+ valor +" ya existe en un producto..</strong></div>" );
            document.getElementById(txtCodigo).value = '';
        }


    }

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

<!--<script src="../../plugins/jquery/jquery.min.js"></script>
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

<!-- Demo Js -->
<script src="../../js/demo.js"></script>
</body>
</html>