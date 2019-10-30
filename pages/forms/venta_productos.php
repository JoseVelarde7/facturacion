<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>FACTURACION</title>
    <!-- Favicon-->
    <!--<link rel="shortcut icon" href="../../images/user1.png">-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet"
          type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
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
include "php/seleccion_productos_factura.php";
include "php/fecha_dosificacion.php";
?>

<!-- Page Loader -->
<?php include "cabecera.php"; ?>

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

                     //"nombre del parámetro POST":valor (el cual es el objeto guardado en las variables de arriba)
               //var  datos =

                $.ajax({
                    url: "php/fechas_dosificacion.php",
                    type: "POST",
                    data: "",
                    success: function (data) {
                        console.log(data);
                        var fecha_con=data.control;
                       /* var almendra=data.almendra;
                        var papel=data.papel;
                        var miel=data.miel;*/

                       

                        if(fecha_con==1){$('#myModalcontrol').modal({show: 'true'});}
                      /*  if(almendra==1){$('#myModaleba').modal({show: 'true'});}
                        if(papel==1){$('#myModalpapelbol').modal({show: 'true'});}
                        if(miel==1){$('#myModalpromiel').modal({show: 'true'});}*/



                        if(fecha_con==2){$('#myModalcontrol1').modal({show: 'true'});}
                        /*if(almendra==2){$('#myModaleba1').modal({show: 'true'});}
                        if(papel==2){$('#myModalpapelbol1').modal({show: 'true'});}
                        if(miel==2){$('#myModalpromiel1').modal({show: 'true'});}*/
                    }
                });









                $('.date_panel').dblclick(function () {
                    var currentDate = $(this).html();
                    $(this).html("<input id='input_date' type='text' value='" + currentDate + "' >");
                    $('#input_date').focus();
                });

                $(document).on('blur', '#input_date', function () {
                    $('.date_panel').html($(this).val());
                });
                //busqueda de nit --------------------------------------------------

                $('#invoice_nit').change(function () {

                    if ($(this).val() == '')
                        $('#invoice_client').val('');
                    else {
                        $.ajax({
                            data: {
                                nit: $(this).val()
                            },
                            url: 'php/clientes.php?ci_nit=' + $('#invoice_nit').val(),
                            type: 'POST',
                            success: function (clientName) {
                                // console.log('clientes.php?ci_nit=' + $('#invoice_nit').val());
                                if (clientName != '') {
                                    $('#invoice_client').val(clientName);
                                    //$('#invoice_client').removeattr('readonly', '');
                                    //$('#invoice_client').html(Number(respuesta.precio).toFixed(2))updateTotalItem(index);
                                }
                                else {
                                    $('#message').fadeIn(500).delay(2000).fadeOut(500);
                                    $('#invoice_client').val('');
                                    $('#invoice_client').removeAttr('readonly');
                                }

                            }
                        });
                    }
                });

                $('#add_item').click(function () {
                    var itemColumn = $('<tr id="items_' + indexItems + '" index="' + indexItems + '" class="items_colums" >'
                        //  + '<td><select class="form-control show-tick form-line" id="item_name_' + indexItems + '" item_id=""></select></td>'
                        + '<td><input autocomplete="off" list="productos" name="productos" id="item_name_' + indexItems + '" type="text" item_id="" class="inputt form-control show-tick form-line" required></td>'
                        + '<td width="80px"><input   id="item_quantity_' + indexItems + '" type="number" class="item_quantity css-number_text form-control form-line" value="1" min=1 required></td>'
                        + '<td class="price_panel" style="text-align: right"><span id="item_pu_' + indexItems + '" class="item_pu">0</span></td>'
                        + '<td style="text-align: right"><span id="item_cost_' + indexItems + '" class="item_cost">0.00</span></td>'

                         + '<td ><input   id="item_obs_' + indexItems + '" type="text" class="css-number_text form-control form-line" ></td>'


                        + '<td style="text-align: center"><a href="javascript:void(0)" class="remove_item"><i class="glyphicon glyphicon-remove-sign" style="color: red" ></i></a></td>'

                        + '</tr>');

                    //    $('.item_name', itemColumn).autocomplete(autocomplete_action);
                    $('#items_panel').append(itemColumn);
                    indexItems++;
                });


                $(document).on('change', '.item_name', function () {
                   
                });


                var lastSpan = '';
        $(document).on('click', '.price_panel', function(){
            // If the span is showing
            if( $(this).children()[0].tagName.toLowerCase() == 'span' )
            {
                var childId = $(this).children('span').attr('id');
                var childClasses = $(this).children('span').attr('class');
                var value = $(this).children('span').text();

                lastSpan = "<span id='"+childId+"' class='"+ childClasses +"' >";

                $(this).html("<input id='temp_pu_edit' type='text' class='css-number_textcss-number_text form-control form-line '   value='"+ value +"' >");
                $('#temp_pu_edit').focus();
            }
        });
      $(document).on('blur', '#temp_pu_edit', function(){
            var index = $(this).parent().parent().attr('index');
            $(this).parent('td').html( lastSpan + $(this).val() +"</span>" );
            updateTotalItem( index );
        });
                $(document).on('click', '.inputt', function () {
                    seleccionProductos($(this).parent().parent().attr('index'));
                    $(".inputt").each(function (index, elemento) {
                        // console.log("El Numero "+index+" contiene : "+$(elemento).val());

                    })

                });


                $(document).on('change', '.inputt', function () {
                    $(".inputt").each(function (index, elemento) {


                        //    console.log("El Numero " + index + " Cambio a : " + $(elemento).val());
                        //   $('#item_pu_' + $(this).parent().parent().attr('index')).html($(elemento).val());

                        $(document).on('keyup change', '.item_quantity', function () {
                            updateTotalItem($(this).parent().parent().attr('index'));
                        });
                        $(document).on('keyup change', '.inputt', function () {
                            updateTotalItem($(this).parent().parent().attr('index'));
                        });

                    })
                });


                $(document).on('change', '.inputt', function () {

                    $(".inputt").each(function (index, elemento) {
                        //   $('#item_pu_' + $(this).parent().parent().attr('index')).empty()

                        var index = $(this).parent().parent().attr('index');
                        $.ajax({
                            url: 'php/precio.php?producto=' + $(elemento).val(),
                            type: 'POST',
                            dataType: 'json',
                        }).done(function (respuesta) {
                            // $('#item_pu_' + $(this).parent().parent().attr('index')).html($(elemento).val(respuesta.precio));
                            //$('#item_pu_' + $(this).parent().parent().attr('index')).val(respuesta.precio);
                            //  console.log("El precio" + index + "precioooooooo = " + (respuesta.precio));
                            var canti=respuesta.stock;
                            $('#item_pu_' + index).html(Number(respuesta.precio).toFixed(2))
                            $('#item_quantity_' + index).attr({
                            "max" : canti,       
                            "min" : 1     
                            });
                            updateTotalItem(index);
                            // $("#paterno").val(respuesta.paterno);
                            // $("#materno").val(respuesta.materno);
                        })

                    });
                });











                $(document).on('change', '#pago', function () {
                    var total=0;
                        $('.item_cost').each(function () {
                    total += +$(this).html();
                });
                   
                   var monto=$('#pago').val();
                   var vuelto=monto-total;
                   $('#vuelto').html(Number(vuelto).toFixed(2));

                });






                /* var lastSpan = '';
                 $(document).on('click', '.price_panel', function () {
                 // If the span is showing
                 if ($(this).children()[0].tagName.toLowerCase() == 'span') {
                 var childId = $(this).children('span').attr('id');
                 var childClasses = $(this).children('span').attr('class');
                 var value = $(this).children('span').text();

                 lastSpan = "<span id='" + childId + "' class='" + childClasses + "' >";

                 $(this).html("<input id='temp_pu_edit' type='text' class='css-number_text' value='" + value + "' >");
                 $('#temp_pu_edit').focus();
                 }
                 });*/

                /*  $(document).on('blur', '#temp_pu_edit', function () {
                 var index = $(this).parent().parent().attr('index');
                 $(this).parent('td').html(lastSpan + $(this).val() + "</span>");
                 updateTotalItem(index);
                 });*/

                $(document).on('click', '.remove_item', function () {
                    $('#items_' + $(this).parent().parent().attr('index')).remove();
                    updateTotalInvoice();
                    cambioproductos();
                });

                $('#invoice_form').submit(function (e) {
                    e.preventDefault();
                    console.log("LLEGO");
                    var id_items = [];
                    var quantity_items = [];
                    var price_items = [];
                    var obs_items = [];
                    $('.items_colums').each(function () {
                        var index = $(this).attr('index');
                        id_items.push($('#item_name_' + index).val());
                        quantity_items.push($('#item_quantity_' + index).val());
                        price_items.push($('#item_pu_' + index).html());
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
                            date: $('.date_panel').html(),
                            nit: $('#invoice_nit').val(),
                            client_name: $("#invoice_client").val(),
                            total: $('#total_cost').html(),
                            numero: $('#numerofactura').val(),
                            id_items: id_items,
                            quantity_items: quantity_items,
                            price_items: price_items,
                            obs_items: obs_items
                        },
                        url: 'php/guardar_factura.php',
                        type: 'post',
                        beforeSend: function () {
                            // showLoadingPanel();
                            //  console.log("cargando");
                            //   console.log("datos "+ data);
                            // console.log(id_items.val());


                            location.href = "cargado_factura.php";

                            //ocation.reload();
                        },
                        success: function (data) {
                          console.log("exitoso");
                            console.log(data);
                        }
                        /* success: function (result) {
                         if ($.trim(result) == '')
                         invoice_list();
                         else {
                         $('#invoice_message').html(result);
                         $('#loading_data_panel').hide();
                         }
                         }*/
                    });
                });

                $('#vista_previa').click(function (e) {
                    e.preventDefault();

                      var id_items = [];
                    var quantity_items = [];
                    var price_items = [];
                    var obs_items = [];
                    $('.items_colums').each(function () {
                     var index = $(this).attr('index');
                        id_items.push($('#item_name_' + index).val());
                        quantity_items.push($('#item_quantity_' + index).val());
                        price_items.push($('#item_pu_' + index).html());
                        obs_items.push($('#item_obs_' + index).val());
                        //   console.log("item = "+id_items.push($('#item_name_' + index).val('item_id')));
                        //   console.log("cantidad = "+quantity_items.push($('#item_quantity_' + index).val()));
                          console.log("precio = "+$('#invoice_nit').val());

                    });
                 
                      // console.log("cantidad " + quantity_items);
                    //  console.log("precio " + price_items);
                    //    console.log("fecha " + $('.date_panel').html());
                    //   console.log("nit " + $('#invoice_nit').val());
                    //   console.log("cliente " + $("#invoice_client").val());
                    $.ajax({
                        data: {
                             date: $('.date_panel').html(),
                            nit: $('#invoice_nit').val(),
                            client_name: $("#invoice_client").val(),
                            total: $('#total_cost').html(),
                            numero: $('#numerofactura').val(),
                            id_items: id_items,
                            quantity_items: quantity_items,
                            price_items: price_items,
                            obs_items: obs_items
                        },
                        url: 'php/guardar_factura_previa.php',
                        type: 'post',
                        beforeSend: function () {
                            // showLoadingPanel();
                            //  console.log("cargando");
                            //   console.log("datos "+ data);
                            // console.log(id_items.val());


                            //   location.href = "cargado_factura.php";

                            //ocation.reload();

                            
                            $('#iframe_vista')[0].contentWindow.location.reload(true);
                            $('#iframe_vista').attr('src', $('iframe').attr('src'));
                            $('#iframe_vista')[0].contentWindow.location.reload(true);

                        },
                        success: function (data) {
                        console.log(data);
                          $('#iframe_vista')[0].contentWindow.location.reload(true);
                        $('#myModal1').modal({show: 'true'});
                        }
                  
                    });
                });
            });
            /*$('#invoice_form').submit(function (e) {
                location.reload(tryLoad(true));
            });*/
            function updateTotalItem(index) {
                var result = +$('#item_quantity_' + index).val() * +$('#item_pu_' + index).html();

                if (result > 0)
                    $('#item_cost_' + index).html(Number(result).toFixed(2));
                else
                    $('#item_cost_' + index).html('0.00');

                updateTotalInvoice();
                cambioproductos();
            }

            function cambioproductos() {
                   var total=0;
                        $('.item_cost').each(function () {
                    total += +$(this).html();
                });
                   
                   var monto=$('#pago').val();
                   var vuelto=monto-total;
                   $('#vuelto').html(Number(vuelto).toFixed(2));
            }

            function updateTotalInvoice() {
                var total = 0;
                $('.item_cost').each(function () {
                    total += +$(this).html();
                });
                //$('#total_cost').html( Number( Math.ceil(total) ).toFixed(2) );
                $('#total_cost').html(Number(total).toFixed(2));
            }
        </script>
        <section class="content">
            <div class="container-fluid">
                <div class="block-header">
                    <h2> FACTURACION EBA
                    </h2>
                </div>
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="header">
                                <h2>DATOS DE LA FACTURA</h2>
                            </div>
                            <form id="invoice_form" role="form">
                                <div class="body">

                                    <div class="row clearfix">

                                        <div class="col-sm-6">
                                            <div class="form-group form-float">
                                                <label
                                                    class="form-label">Fecha :
                                                    <span class="date_panel"><?php echo strftime("%#Y/%m/%d") ?></span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group form-float">
                                                <!--  <label
                                                    class="form-label">Numero de
                                                    Factura: </label>
                                                <input id="numerofactura" value="<?php include "php/numero_factura.php" ?>"
                                                       disabled>-->

                                            </div>
                                        </div>
                                    </div>
                                    <div class="row clearfix">
                                        <div class="col-sm-6">
                                            <div class="form-group form-float">
                                                <div class="form-line focused">
                                                    <input id="invoice_nit" type="number" class="form-control"
                                                           name="libro" min="0"
                                                           required>
                                                    <label class="form-label"> NIT / CI </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group form-float">
                                                <div class="form-line focused">
                                                    <input id="invoice_client" client_id="" type="text"
                                                           class="form-control" name="curso" required>
                                                    <label class="form-label">CLIENTE</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <button class="btn btn-info waves-effect" type="button" id="add_item"
                                                href="javascript:void(0)">AGREGAR CONCEPTO
                                        </button>
                                    </div>
                                    <div class="form-group">
                                        <table id="invoice_items" class="table">
                                            <tbody>
                                            <tr>
                                                <th WIDTH="500">Producto</th>
                                                <th WIDTH="20">Cantidad</th>
                                                <th WIDTH="20">Precio Unitario</th>
                                                <th WIDTH="20">Total[Bs.]</th>
                                                <th WIDTH="200">Observacion</th>
                                                <th></th>
                                            </tr>
                                            </tbody>
                                            <tbody id="items_panel">
                                            </tbody>
                                            <tfoot>
                                            <tr>
                                                <th colspan="3" class="text-right text-primary"
                                                    style="padding-right: 10px">
                                                    TOTAL:
                                                </th>
                                                <th style="text-align: right"><span id="total_cost"
                                                                                    class="text-success">0.00</span>
                                                </th>
                                            </tr>
                                            </tfoot>
                                        </table>

    

                                    </div>
                                    <div class="form-group">
                                        <table id="" class="table">
                                            <tbody>
                                           
                                            </tbody>
                                            <tbody id="">
                                            </tbody>
                                            <tfoot>
                                            <tr>
                                                 <th WIDTH="400">
                                                    
                                                </th>
                                                <th colspan="3" class="text-right text-primary"
                                                    style="padding-right: 10px">
                                                    MONTO DE PAGO: 
                                                </th>
                                                <th style="text-align: right"> <input id="pago" type="number" c
                                                            min="0"
                                                          >
                                                </th>

                                                 <th colspan="3" class="text-right text-primary"
                                                    style="padding-right: 10px">
                                                    VUELTO:
                                                </th>
                                                <th style="text-align: right"><span id="vuelto"
                                                                                    class="text-right">0.00</span>
                                                </th>
                                                <th ><span></span>
                                                </th>
                                            </tr>
                                            </tfoot>
                                        </table>

    

                                    </div>

                                    <?php if($fecha_control<2)
                                    {?>







                                    <div class="row clearfix">
                                        <div class="col-sm-3">
                                            <button type="submit" class="btn btn-info waves-effect"> GUARDAR DATOS DE
                                                LA
                                                FACTURA
                                            </button>
                                        </div>

                                        <div class='col-sm-2'><a id="vista_previa"
                                                                 class='btn btn-info waves-effect'>VISTA
                                                PRELIMINAR</a>
                                        </div>
                                        <?php if ($_SESSION['facturar'] > 1) {
                                            echo "  <div class='col-sm-3'><a href='imprimir_carta.php' target='_blank' class='btn btn-primary waves-effect'>VER LA ULTIMA FACTURA CARTA</a></div>";
                                        } ?>
                                        <?php if ($_SESSION['facturar'] > 1) {
                                            echo "  <div class='col-sm-3'><a class='btn btn-primary waves-effect' href='impresion_termica.php' target='_blank'>VER LA ULTIMA FACTURA IMP. ROLLO</a></div>";
                                        } ?>
                                    </div>



                                    <?php }?>




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


<div id="myModalcontrol" class="modal fade" role="dialog">

        <div class="modal-dialog ">
            <div class="modal-content modal-col-orange">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <div align="center"><i  class="material-icons md-48 col-black">info</i></div>
                    <h3 class="modal-title">AVISO ...!!!</h3>

                </div>
                <div class="modal-body">
                    <?Php
                    echo 'LA DOSIFICACION DE '.$_SESSION["nombre_empresa"].' EN ESTA SUCURSAL ESTA YA NO TENDRA VIGENCIA DEBE REPORTAR AL AREA COMERCIAL';;
                    ?>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Entendido</button>
                </div>
            </div>
        </div>
</div>





<div id="myModalcontrol1" class="modal fade" role="dialog">

    <div class="modal-dialog ">
        <div class="modal-content modal-col-red">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <div align="center"><i  class="material-icons md-48 col-black">report_problem</i></div>
                <h4 class="modal-title">AVISO URGENTE...!!!</h4>
            </div>

            <div class="modal-body">
                <?Php
                echo 'LA DOSIFICACION DE '.$_SESSION["nombre_empresa"].' YA VENCIO POR LO CUAL NO PUEDE FACTURAR, DEBE REPORTAR URGENTE AL AREA COMERCIAL';
                ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Entendido</button>
            </div>
        </div>
    </div>
</div>

















<div id="myModal1" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Ultima Factura EBA Generada</h4>
            </div>
            <div class="modal-body">
                <?Php
                echo ' <iframe name="fra" id="iframe_vista" src="factura_vista_previa.php" width="100%" height="500" frameborder="0" ></iframe>';;
                ?>
            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<!--<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Ultima Factura Conjunta Generada</h4>
            </div>
            <div class="modal-body">
                <?Php
                /*echo ' <iframe src="php/pdf_factura.php" width="100%" height="500" frameborder="0" allowtransparency="true"></iframe>';*/
                ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>-->
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