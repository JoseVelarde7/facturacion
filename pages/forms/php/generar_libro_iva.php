<?php

if (isset($_POST['generar'])) {
    $mes = $_POST['mes'];
    $anio = $_POST['anio'];
    $_SESSION['anio'] = $anio;
    $_SESSION['mes'] = $mes;
    $diafinal = date("d", mktime(0, 0, 0, $mes + 1, 0, $anio));
    $fechainicial = $anio . "-" . $mes . "-01";
    $fechafinal = $anio . "-" . $mes . "-" . $diafinal;
    $_SESSION["fechainicial"] = $fechainicial;
    $_SESSION["fechafinal"] = $fechafinal;
$empresa=$_POST['empresa'];
    $sucursal=$_POST['sucursal'];
    $_SESSION["empresaiva"]=$empresa;
     $_SESSION["sucursaliva"]=$sucursal;


/*
    echo "Fecha inicial :".$_SESSION['fechainicial'];
    echo "Fecha Final :".$_SESSION['fechafinal'];
    echo "Empresa :".$_SESSION['empresaiva'];
    echo "Sucursal :".$_SESSION['sucursaliva'];
*/



if($_SESSION["sucursaliva"]==0)
{
    include "conexion_facturacion.php";
    $consulta = pg_query("select id_sucursal, nombre_sucursal, direccion_sucursal from sucursal where id_empresa=".$_SESSION['empresaiva']);
    include "desconectar_facturacion.php";

    while ($array = pg_fetch_assoc($consulta)) {
        include "conexion_facturacion.php";

        $consulta1 = pg_query("SELECT a.id_factura , a.fecha_factura ,a.numero_factura, a.estado_factura, a.numero_conjunta,
c.numero_autorizacion ,b.nit_carnet, b.cliente, a.codigo_control 
FROM public.factura a, public.cliente b, public.dosificacion c
WHERE a.id_cliente=b.id_cliente
        and a.id_dosificacion= c.id_dosificacion
        and a.id_sucursal=" . $array['id_sucursal'] . " and  a.fecha_factura >= '" . $fechainicial . "' and  a.fecha_factura <='" . $fechafinal . "' order by a.fechahora_aud_factura;");
        include "desconectar_facturacion.php";


        if (pg_num_rows($consulta1) > 0) {
            $nn = 1;

            echo '<div class="table-responsive">';
            echo '<table align="center" class="table table-hover">';
            echo '<tr class="bg-blue">
        <td align="center" colspan="16"><h3>'."Nombre Sucursal : ".$array['nombre_sucursal']." Direccion : ".$array['direccion_sucursal'].'</h3></td></tr>';


            echo '<tr class="bg-blue">
                            <td align="center">Nº</td>
                            <td  align="center">FECHA FACTURA</td>
                            <td  align="center">Nº DE FACTURA</td>
                            <td  align="center">Nº DE AUTORIZACION</td>
                            <td  align="center">ESTADO</td>
                             <td  align="center">NIT/ CI CLIENTE</td>
                            <td  align="center">NOMBRE O RAZON SOCIAL</td>
                            <td  align="center">IMPORTE TOTAL DE VENTA A</td>
                            <td  align="center">IMPORTE ICE/IEHD/TASAS B</td>
                            <td  align="center">ESPORTACIONESY OPERACIONES EXENTAS C</td>
                            <td  align="center">VENTAS GRAVADAS A TASA CERO D</td>
                            <td  align="center">SUBTOTAL E=A-B-C-D</td>
                            <td  align="center">DESCUENTOS BONIFIACIONES Y REBAJAS OTORGADAS  F</td>
                            <td  align="center">IMPORTE BASE PARA DEBITO FISCAL G=E-F</td>
                            <td  align="center">DEBITO FISCAL H=G*13%</td>
                            <td  align="center">CODIGO DE CONTROL</td>
                            </tr>';

            while ($array1 = pg_fetch_assoc($consulta1)) {

                echo '<tr class="active">
                <td align="center">' . $nn . '</td>'
                    . '<td align="center">' . $array1['fecha_factura'] . '</td>'
                    . '<td align="center">' . $array1['numero_factura'] . '</td>'
                    . '<td align="center">' . $array1['numero_autorizacion'] . '</td>'
                    . '<td align="center">' . verda($array1['estado_factura']) . '</td>'
                    . '<td align="center">' . $array1['nit_carnet'] . '</td>'
                    . '<td align="center">' . $array1['cliente'] . '</td>'
                    . '<td align="center">' . total($array1['id_factura']) . '</td>'
                    . '<td align="center">' . "0.00" . '</td>'
                    . '<td align="center">' . "0.00" . '</td>'
                    . '<td align="center">' . "0.00" . '</td>'
                    . '<td align="center">' . total($array1['id_factura']) . '</td>'
                    . '<td align="center">' . "0.00" . '</td>'
                    . '<td align="center">' . total($array1['id_factura']) . '</td>'
                    . '<td align="center">' . debito($array1['id_factura']) . '</td>'
                    . '<td align="center">' . $array1['codigo_control'] . '</td>'
                    . '</tr>';
                $nn = $nn + 1;
            }
            echo '</table>';
            ECHO '</div>';
            echo '<div>';
            echo '<br>';

            echo '</div>';
        } else {
            echo ' <div class="alert alert-danger"><strong>NO EXISTEN REGISTROS EN ESTA FECHA DE LA SUCURSAL '."NOMBRE SUCURSAL : ".$array['nombre_sucursal']." DIRECCION : ".$array['direccion_sucursal'].'</strong></div>';
        }

    }
    echo '<a class="btn btn-primary waves-effect" href="php/pdf_iva.php" target="_blank"> REPORTE EN PDF POR SUCURSAL</a>';
    echo "       ";    echo "       ";
    echo '<a class="btn btn-primary waves-effect" href="php/pdf_iva_sucursal.php" target="_blank"> REPORTE EN  POR EMPRESA</a>';
    echo "       ";    echo "       ";
    echo '<a class="btn btn-warning waves-effect" href="php/libro_iva_excel.php" target=""> REPORTE GENERAL EN EXCEL</a>';
}
ELSE

{

    include "conexion_facturacion.php";
    $consulta = pg_query("select id_sucursal, nombre_sucursal, direccion_sucursal from sucursal where id_sucursal=".$_SESSION["sucursaliva"]);
    include "desconectar_facturacion.php";
    $row1 = pg_fetch_array($consulta);
    if (is_array($row1)) {
        $id_sucursal = $row1['id_sucursal'];
        $nombre_sucursal = $row1['nombre_sucursal'];
        $direccion_sucursal = $row1['direccion_sucursal'];
    }



    include "conexion_facturacion.php";

    $consulta1 = pg_query("SELECT a.id_factura , a.fecha_factura ,a.numero_factura, a.estado_factura, a.numero_conjunta,
c.numero_autorizacion ,b.nit_carnet, b.cliente, a.codigo_control 
FROM public.factura a, public.cliente b, public.dosificacion c
WHERE a.id_cliente=b.id_cliente
        and a.id_dosificacion= c.id_dosificacion
        and a.id_sucursal=" . $_SESSION["sucursaliva"] . " and  a.fecha_factura >= '" . $fechainicial . "' and  a.fecha_factura <='" . $fechafinal . "' order by a.fechahora_aud_factura ;");
    include "desconectar_facturacion.php";


    if (pg_num_rows($consulta1) > 0) {
        $nn = 1;
        echo '<div class="table-responsive">';
        echo '<table align="center" class="table table-hover">';
        echo '<tr class="bg-blue">
        <td align="center" colspan="16"><h3>'."Nombre Sucursal : ".$nombre_sucursal." Direccion : ".$direccion_sucursal.'</h3></td></tr>';


        echo '<tr class="bg-blue">
                            <td align="center">Nº</td>
                            <td  align="center">FECHA FACTURA</td>
                            <td  align="center">Nº DE FACTURA</td>
                            <td  align="center">Nº DE AUTORIZACION</td>
                            <td  align="center">ESTADO</td>
                             <td  align="center">NIT/ CI CLIENTE</td>
                            <td  align="center">NOMBRE O RAZON SOCIAL</td>
                            <td  align="center">IMPORTE TOTAL DE VENTA A</td>
                            <td  align="center">IMPORTE ICE/IEHD/TASAS B</td>
                            <td  align="center">ESPORTACIONESY OPERACIONES EXENTAS C</td>
                            <td  align="center">VENTAS GRAVADAS A TASA CERO D</td>
                            <td  align="center">SUBTOTAL E=A-B-C-D</td>
                            <td  align="center">DESCUENTOS BONIFIACIONES Y REBAJAS OTORGADAS  F</td>
                            <td  align="center">IMPORTE BASE PARA DEBITO FISCAL G=E-F</td>
                            <td  align="center">DEBITO FISCAL H=G*13%</td>
                            <td  align="center">CODIGO DE CONTROL</td>
                            </tr>';

        while ($array1 = pg_fetch_assoc($consulta1)) {

            echo '<tr class="active">
                <td align="center">' . $nn . '</td>'
                . '<td align="center">' . $array1['fecha_factura'] . '</td>'
                . '<td align="center">' . $array1['numero_factura'] . '</td>'
                . '<td align="center">' . $array1['numero_autorizacion'] . '</td>'
                . '<td align="center">' . verda($array1['estado_factura']) . '</td>'
                . '<td align="center">' . $array1['nit_carnet'] . '</td>'
                . '<td align="center">' . $array1['cliente'] . '</td>'
                . '<td align="center">' . total($array1['id_factura']) . '</td>'
                . '<td align="center">' . "0.00" . '</td>'
                . '<td align="center">' . "0.00" . '</td>'
                . '<td align="center">' . "0.00" . '</td>'
                . '<td align="center">' . total($array1['id_factura']) . '</td>'
                . '<td align="center">' . "0.00" . '</td>'
                . '<td align="center">' . total($array1['id_factura']) . '</td>'
                . '<td align="center">' . debito($array1['id_factura']) . '</td>'
                . '<td align="center">' . $array1['codigo_control'] . '</td>'
                . '</tr>';
            $nn = $nn + 1;
        }
        echo '</table>';
        ECHO '</div>';
        echo '<div>';
        echo '<br>';
        echo '<a class="btn btn-primary waves-effect" href="php/pdf_iva_una_sucursal.php" target="_blank"> REPORTE EN PDF POR SUCURSAL</a>';
        echo '</div>';
    } else {
        echo ' <div class="alert alert-danger"><strong>NO EXISTEN REGISTROS EN ESTA FECHA DE LA SUCURSAL '."NOMBRE SUCURSAL : ".$nombre_sucursal." DIRECCION : ".$direccion_sucursal.'</strong></div>';
    }















}



/*



    echo '<div class="table-responsive">';
    echo '<table align="center" class="table table-hover">';
    include "conexion_corba.php";
    $consulta = pg_query("SELECT factura.id_factura , factura.fecha_factura ,factura.numero_factura, factura.estado_factura, dosificacion.numero_autorizacion ,cliente.nit_carnet, cliente.cliente, factura.codigo_control
  FROM facturacion.factura, facturacion.cliente, facturacion.dosificacion
  WHERE factura.id_cliente=cliente.id_cliente and factura.id_dosificacion= dosificacion.id_dosificacion AND factura.id_area=" . $_SESSION['id_area'] . " and  factura.fecha_factura > '" . $fechainicial . "' and  factura.fecha_factura <'" . $fechafinal . "';");

    if (pg_num_rows($consulta) > 0) {
        $nn = 1;
        include "desconectar_corba.php";
        echo '<tr class="bg-blue">
                            <td align="center">Nº</td>
                            <td  align="center">FECHA FACTURA</td>
                            <td  align="center">Nº DE FACTURA</td>
                            <td  align="center">Nº DE AUTORIZACION</td>
                            <td  align="center">ESTADO</td>
                             <td  align="center">NIT/ CI CLIENTE</td>
                            <td  align="center">NOMBRE O RAZON SOCIAL</td>
                            <td  align="center">IMPORTE TOTAL DE VENTA A</td>
                            <td  align="center">IMPORTE ICE/IEHD/TASAS B</td>
                            <td  align="center">ESPORTACIONESY OPERACIONES EXENTAS C</td>
                            <td  align="center">VENTAS GRAVADAS A TASA CERO D</td>
                            <td  align="center">SUBTOTAL E=A-B-C-D</td>
                            <td  align="center">DESCUENTOS BONIFIACIONES Y REBAJAS OTORGADAS  F</td>
                            <td  align="center">IMPORTE BASE PARA DEBITO FISCAL G=E-F</td>
                            <td  align="center">DEBITO FISCAL H=G*13%</td>
                            <td  align="center">CODIGO DE CONTROL</td>
                            </tr>';

        while ($array = pg_fetch_assoc($consulta)) {

            echo '<tr class="active">
                <td align="center">' . $nn . '</td>'
                . '<td align="center">' . $array['fecha_factura'] . '</td>'
                . '<td align="center">' . $array['numero_factura'] . '</td>'
                . '<td align="center">' . $array['numero_autorizacion'] . '</td>'
                . '<td align="center">' . verda($array['estado_factura']) . '</td>'
                . '<td align="center">' . $array['nit_carnet'] . '</td>'
                . '<td align="center">' . $array['cliente'] . '</td>'
                . '<td align="center">' . total($array['id_factura']) . '</td>'
                . '<td align="center">' . "0.00" . '</td>'
                . '<td align="center">' . "0.00" . '</td>'
                . '<td align="center">' . "0.00" . '</td>'
                . '<td align="center">' . total($array['id_factura']) . '</td>'
                . '<td align="center">' . "0.00" . '</td>'
                . '<td align="center">' . total($array['id_factura']) . '</td>'
                . '<td align="center">' . debito($array['id_factura']) . '</td>'
                . '<td align="center">' . $array['codigo_control'] . '</td>'
                . '</tr>';
            $nn = $nn + 1;
        }
        echo '</table>';
        ECHO '</div>';
        echo '<div>';
        echo '<br>';
        echo '<a class="btn btn-primary waves-effect" href="php/pdf_iva.php" target="_blank"> REPORTE EN PDF</a>';
        echo '</div>';
    } else {
        echo ' <div class="alert alert-danger"><strong>NO EXISTEN REGISTROS EN ESTA FECHA</strong></div>';
    }*/
}

function verda($estado)
{
    if ($estado == 1) {
        $veren = "V";
    } else {
        $veren = "A";
    }

    return $veren;
}

function total($id_fact)
{
    $total = 0;
    include 'conexion_facturacion.php';
    $qa11 = pg_query("SELECT b.descripcion_articulo, a.cantidad, b.unidad_medida, c.precio_articulo
  FROM public.cantidad_articulos_factura a, public.articulo b, public.precios_articulo c
  where b.id_articulo=c.id_articulo  and
  a.id_articulo=b.id_articulo and 
  a.id_precio_articulo=c.id_precio_articulo and
  a.id_factura=" . $id_fact . ";");
    include 'desconectar_facturacion.php';
    while ($array = pg_fetch_assoc($qa11)) {
        $mult = $array['cantidad'] * $array['precio_articulo'];
        $total = $total + $mult;
    }
    $total2 = number_format($total, 2, ',', '.');
    return $total2;

}

function debito($id_fact)
{
    $total = 0;
    include 'conexion_facturacion.php';
    $qa11 = pg_query("SELECT b.descripcion_articulo, a.cantidad, b.unidad_medida, c.precio_articulo
  FROM public.cantidad_articulos_factura a, public.articulo b, public.precios_articulo c
  where b.id_articulo=c.id_articulo  and
  a.id_articulo=b.id_articulo and 
  a.id_precio_articulo=c.id_precio_articulo and
  a.id_factura=" . $id_fact . ";");
    include 'desconectar_facturacion.php';
    while ($array = pg_fetch_assoc($qa11)) {
        $mult = $array['cantidad'] * $array['precio_articulo'];
        $total = $total + $mult;
    }
    $debito = $total * 0.13;
    $total2 = number_format($debito, 2, ',', '.');
    return $total2;

}




