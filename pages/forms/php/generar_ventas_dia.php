<?php
   setlocale(LC_TIME, 'spanish');
    date_default_timezone_set("America/La_Paz");

if (isset($_POST['generar'])) {

  include "conexion_facturacion.php";

$log = pg_query("SELECT u.id_usuario, s.id_sucursal,su.id_empresa from usuario u, sucursales_usuario s, sucursal su where u.id_usuario=s.id_usuario and s.id_sucursal=su.id_sucursal and u.id_usuario=".$_SESSION["id_usuario"]);
        include 'desconectar_facturacion.php';
        //  echo ("SELECT usuario, clave, id_usuario, id_area FROM public.usuario WHERE usuario='$usuario' and clave= MD5('$clave') and id_estado='A'");
        $row = pg_fetch_array($log);
        if (is_array($row)) {
            $id_sucursale = $row['id_sucursal'];
             $id_empresale = $row['id_empresa'];
       
        }

/*
    $mes = $_POST['mes'];
    $anio = $_POST['anio'];

    $empresa = $_POST['empresa'];
    $sucursal = $_POST['sucursal'];
*/
    $fecha_actual=$_POST['datepicker'];
    //$_SESSION['anio'] = $anio;
    //$_SESSION['mes'] = $mes;

    //$diafinal = date("d", mktime(0, 0, 0, $mes + 1, 0, $anio));
    $fechainicial = $fecha_actual;
    $fechafinal = $fecha_actual;

    $_SESSION["fechainicial"] = $fecha_actual;
    $_SESSION["fechafinal"] = $fecha_actual;
    //$_SESSION["diafinal"] = $diafinal;
    $_SESSION["empresa_iva"]=$id_empresale;
    $_SESSION["sucursal_iva"]=$id_sucursale;



if($_SESSION["empresa_iva"]==0 && $_SESSION['sucursal_iva']==0){

    for ($i = 1; $i < 4; $i++) {

        echo '<div class="table-responsive">';
        echo '<table align="center" class="table table-hover">';
        include "conexion_facturacion.php";
      
          $consulta = pg_query("SELECT distinct(a.id_articulo, precio_articulo), a.id_articulo, a.descripcion_articulo,a.cantidad_representativa, a.unidad_representativa, a.id_empresa, a.codigo_articulo, precio_articulo
FROM  public.articulo a, precios_articulo p where a.id_articulo=p.id_articulo and  a.id_empresa=" . $i."order by descripcion_articulo");
        include "desconectar_facturacion.php";

        if (pg_num_rows($consulta) > 0) {
            $nn = 1;
           /* if ($i == 1) {
                echo '<tr class="bg-blue">
        <td align="center" colspan="12"><h4>LACTOSBOL - Empresa Boliviana de Almendras</h4></td></tr>';
            }*/

          /*  if ($i == 2) {
                echo '<tr class="bg-blue">
        <td align="center" colspan="12"><h4>EBA - Empresa Boliviana de Almendras Y Derivados</h4></td></tr>';
            }*/
            if ($i == 1) {
                echo '<tr class="bg-blue">
        <td align="center" colspan="13"><h4>PAPELBOL - Empresa Publica Productiva Papeles de Bolivia Reporte de Fecha '.$fechainicial.'</h4></td></tr>';
            }


            echo '<tr class="bg-blue">
                            <td align="center">Nº</td>
                            <td  align="center">CODIGO</td>
                            <td  align="center">DESCRIPCION</td>
                            <td  align="center">LOTE</td>
                            <td  align="center">UNIDAD</td>
                            <td  align="center">CANTIDAD VENDIDA</td>
                            <td  align="center">PRECIO DE VENTA</td>
                            <td  align="center">DESCUENTO</td>
                            <td  align="center">PRECIO VENDIDO</td>
                            <td  align="center">COSTO</td>
                            <td  align="center">MARGEN DE UTILIDAD</td>
                            <td  align="center">%</td>
                                   <td  align="center">OBSERVACIONES</td>
                            </tr>';
            while ($array = pg_fetch_assoc($consulta)) {
                 $precioo = precio($array['id_articulo'], $fechainicial, $fechafinal,$array['precio_articulo'] );
                IF ($precioo != '0.00') {
                    echo '<tr class="active">
                                <td align="center">' . $nn . '</td>'
                        . '<td align="center">' . $array['id_articulo'] . '</td>'
                        . '<td align="center">' . $array['descripcion_articulo'] . '</td>'
                        . '<td align="center">' . " " . '</td>'
                        . '<td align="center">'  . $array['unidad_representativa'] . '</td>'
                       . '<td align="center">' . cantidad($array['id_articulo'], $fechainicial, $fechafinal,$array['precio_articulo']) . '</td>'
                        . '<td align="center">' . $precioo . '</td>'
                        . '<td align="center">' . " " . '</td>'
                        . '<td align="center">' . $precioo . '</td>'
                        . '<td align="center">' . " " . '</td>'
                        . '<td align="center">' . $precioo . '</td>'
                        . '<td align="center">' . "100,00 " . '</td>'
                           . '<td align="center">' . observacion($array['id_articulo'], $fechainicial, $fechafinal,$array['precio_articulo']) . '</td>'
                        . '</tr>';
                    $nn = $nn + 1;
                }
            }


            echo '</table>';
            ECHO '</div>';

        }

    }
    echo '<div>';
    echo '<br>';
    echo '<a class="btn btn-primary waves-effect" href="php/pdf_resumen_ventas.php" target="_blank"> REPORTE EN PDF</a>';
    echo '</div>';
}

if($_SESSION["empresa_iva"]>0 && $_SESSION['sucursal_iva']>0){

        echo '<div class="table-responsive">';
        echo '<table align="center" class="table table-hover">';
        include "conexion_facturacion.php";
        $consulta = pg_query("SELECT distinct(a.id_articulo), a.id_articulo, a.descripcion_articulo,a.cantidad_representativa, a.unidad_representativa, a.id_empresa, a.codigo_articulo, precio_articulo, p.id_sucursal
FROM  public.articulo a, precios_articulo p where a.id_articulo=p.id_articulo and  a.id_empresa=" . $_SESSION["empresa_iva"]." and p.id_sucursal=".$_SESSION['sucursal_iva']);

    $consulta1 = pg_query("select * from empresa a, sucursal where a.id_empresa=" . $_SESSION["empresa_iva"]."and id_sucursal=".$_SESSION["sucursal_iva"]);

        include "desconectar_facturacion.php";
    $row11 = pg_fetch_array($consulta1);
    if (is_array($row11)) {
        $nombre_empresa = $row11['nombre_empresa'];
        $nombre_completo = $row11['nombre_completo'];
        $nombre_sucursal = $row11['nombre_sucursal'];
    }

            $nn = 1;

                echo '<tr class="bg-blue">
        <td align="center" colspan="12"><h4>'.$nombre_empresa.' - '.$nombre_completo.' - '.$nombre_sucursal.'</h4></td></tr>';
            

            if (pg_num_rows($consulta) > 0) {
            echo '<tr class="bg-blue">
                            <td align="center">Nº</td>
                            <td  align="center">CODIGO</td>
                            <td  align="center">DESCRIPCION</td>
                            <td  align="center">LOTE</td>
                            <td  align="center">UNIDAD</td>
                            <td  align="center">CANTIDAD VENDIDA</td>
                            <td  align="center">PRECIO DE VENTA</td>
                            <td  align="center">DESCUENTO</td>
                            <td  align="center">TOTAL </td>
                            <td  align="center">COSTO</td>
                            <td  align="center">MARGEN DE UTILIDAD</td>
                            <td  align="center">%</td>
                           
                            </tr>';
                            $conteoo=0;
            while ($array = pg_fetch_assoc($consulta)) {

                  $precioo = precio1($array['id_articulo'],$array['id_sucursal'], $fechainicial, $fechafinal,$array['precio_articulo'] );

                IF ($precioo != '0.00') {
                     $conteoo=$conteoo+$precioo;
                
                    echo '<tr class="active">
                                <td align="center">' . $nn . '</td>'
                        . '<td align="center">' . $array['id_articulo'] . '</td>'
                        . '<td align="center">' . $array['descripcion_articulo'] . '</td>'
                        . '<td align="center">' . " " . '</td>'
                        . '<td align="center">' . $array['unidad_representativa'] . '</td>'
                        . '<td align="center">' . cantidad1($array['id_articulo'],$array['id_sucursal'], $fechainicial, $fechafinal,$array['precio_articulo']) . '</td>'
                        . '<td align="center">' . number_format($array['precio_articulo'], 2, ',', '.') . '</td>'
                        . '<td align="center">' . " " . '</td>'
                        . '<td align="center">' . number_format($precioo, 2, ',', '.') . '</td>'
                        . '<td align="center">' . " " . '</td>'
                        . '<td align="center">' . number_format($precioo, 2, ',', '.') . '</td>'
                        . '<td align="center">' . "100,00 " . '</td>'
                      //  . '<td align="center">' . observacion($array['id_articulo'], $fechainicial, $fechafinal,$array['precio_articulo']) . '</td>'
                        . '</tr>';


                    $nn = $nn + 1;
                }
            }
echo  '<td align="center" colspan="8"><h4>TOTAL VENDIDO</h4></td><td colspan="2"><h4>'.$conteoo.' Bs.</h4></td></tr>';
            echo '</table>';
            ECHO '</div>';

        }




    echo '<div>';
    echo '<br>';
    //echo '<a class="btn btn-primary waves-effect" href="php/pdf_resumen_ventas_sucursal.php" target="_blank"> REPORTE EN PDF</a>';
    echo '</div>';
}

if($_SESSION["empresa_iva"]>0 && $_SESSION['sucursal_iva']==0) {



    include "conexion_facturacion.php";
    $sucursal = pg_query("select * from sucursal where id_empresa=" . $_SESSION["empresa_iva"]);
    include "desconectar_facturacion.php";

    while ($array11 = pg_fetch_assoc($sucursal)) {

    echo '<div class="table-responsive">';
    echo '<table align="center" class="table table-hover">';
    include "conexion_facturacion.php";
    $consulta1 = pg_query("select * from empresa a, sucursal where a.id_empresa=" . $_SESSION["empresa_iva"] . "and id_sucursal=" . $array11['id_sucursal']);
    include "desconectar_facturacion.php";
    $row11 = pg_fetch_array($consulta1);
    if (is_array($row11)) {
        $nombre_empresa = $row11['nombre_empresa'];
        $nombre_completo = $row11['nombre_completo'];
        $nombre_sucursal = $row11['nombre_sucursal'];
    }
        include "conexion_facturacion.php";
        $consulta = pg_query("select distinct(a.id_articulo), a.descripcion_articulo,a.cantidad_representativa, a.unidad_representativa, a.id_empresa
FROM  public.articulo a where a.id_empresa=" . $_SESSION["empresa_iva"]);
        include "desconectar_facturacion.php";
    $nn = 1;

    echo '<tr class="bg-blue">
        <td align="center" colspan="12"><h4>' . $nombre_empresa . ' - ' . $nombre_completo . ' - ' . $nombre_sucursal . ' de Fecha  '.$fechainicial .'</h4></td></tr>';


    if (pg_num_rows($consulta) > 0) {
        echo '<tr class="bg-blue">
                            <td align="center">Nº</td>
                            <td  align="center">CODIGO</td>
                            <td  align="center">DESCRIPCION</td>
                            <td  align="center">LOTE</td>
                            <td  align="center">UNIDAD</td>
                            <td  align="center">CANTIDAD VENDIDA</td>
                            <td  align="center">PRECIO DE VENTA</td>
                            <td  align="center">DESCUENTO</td>
                            <td  align="center">PRECIO VENDIDO</td>
                            <td  align="center">COSTO</td>
                            <td  align="center">MARGEN DE UTILIDAD</td>
                            <td  align="center">%</td>
                            </tr>';
        while ($array = pg_fetch_assoc($consulta)) {
            $precioo = precio1($array['id_articulo'],$array11['id_sucursal'], $fechainicial, $fechafinal);

            IF ($precioo != '0.00') {
                echo '<tr class="active">
                                <td align="center">' . $nn . '</td>'
                    . '<td align="center">' . $array['id_articulo'] . '</td>'
                    . '<td align="center">' . $array['descripcion_articulo'] . '</td>'
                    . '<td align="center">' . " " . '</td>'
                    . '<td align="center">' . $array['unidad_representativa'] . '</td>'
                    . '<td align="center">' . cantidad1($array['id_articulo'],$array11['id_sucursal'], $fechainicial, $fechafinal) . '</td>'
                    . '<td align="center">' . $precioo . '</td>'
                    . '<td align="center">' . " " . '</td>'
                    . '<td align="center">' . $precioo . '</td>'
                    . '<td align="center">' . " " . '</td>'
                    . '<td align="center">' . $precioo . '</td>'
                    . '<td align="center">' . "100,00 " . '</td>'
                    . '</tr>';
                $nn = $nn + 1;
            }
        }


        echo '</table>';
        ECHO '</div>';

    }


}



    echo '<div>';
    echo '<br>';
    echo '<a class="btn btn-primary waves-effect" href="php/pdf_resumen_ventas_empresa.php" target="_blank"> REPORTE EN PDF</a>';
    echo '</div>';
}











}



function observacion($id_articulo, $fechainicial, $fechafinal, $id_precio)
{
    $total = 0;
    include 'conexion_facturacion.php';
    $qa11 = pg_query("
 SELECT observacion 
FROM factura a, cantidad_articulos_factura b, precios_articulo c
WHERE a.id_factura=b.id_factura
and b.id_precio_articulo=c.id_precio_articulo
  and a.estado_factura=1
and b.id_articulo=" . $id_articulo . " 
and c.precio_articulo=" . $id_precio . " 
and a.fecha_factura>='" . $fechainicial . "' and a.fecha_factura<='" . $fechafinal . "' limit 1");
    include 'desconectar_facturacion.php';

    if (pg_num_rows($qa11) > 0) {

        $row21 = pg_fetch_array($qa11);

        if (is_array($row21)) {
            $canti = $row21['observacion'];
        }
        $total = $canti;
    } ELSE {

        $total = "";
    }
    return $total;
}



function cantidad($id_articulo, $fechainicial, $fechafinal, $id_precio)
{
    $total = 0;
    include 'conexion_facturacion.php';
/*qa11 = pg_query("SELECT sum(cantidad) 
  FROM factura a, cantidad_articulos_factura b
  WHERE a.id_factura=b.id_factura
  and b.id_articulo=" . $id_articulo . "
  and a.estado_factura=1
  and c.precio_articulo=" . $id_precio . "
  and  a.fecha_factura >= '" . $fechainicial . "' 
  and  a.fecha_factura <='" . $fechafinal . "'");
*/
    $qa11 = pg_query("
 SELECT sum(cantidad) 
FROM factura a, cantidad_articulos_factura b, precios_articulo c
WHERE a.id_factura=b.id_factura
and b.id_precio_articulo=c.id_precio_articulo
  and a.estado_factura=1
and b.id_articulo=" . $id_articulo . " 
and c.precio_articulo=" . $id_precio . " 
and a.fecha_factura>='" . $fechainicial . "' and a.fecha_factura<='" . $fechafinal . "'");
    include 'desconectar_facturacion.php';

    if (pg_num_rows($qa11) > 0) {

        $row21 = pg_fetch_array($qa11);

        if (is_array($row21)) {
            $canti = $row21['sum'];
        }
        $total = number_format($canti, 2, '.', '.');
    } ELSE {

        $total = number_format("0", 2, '.', '.');
    }
    return $total;
}
function precio($id_articulo, $fechainicial, $fechafinal, $id_precio)
{
    $total = 0;
    include 'conexion_facturacion.php';
    $qa11 = pg_query("
SELECT b.cantidad, c.precio_articulo
FROM factura a, cantidad_articulos_factura b, precios_articulo c
WHERE a.id_factura=b.id_factura
and b.id_precio_articulo=c.id_precio_articulo
  and a.estado_factura=1
and b.id_articulo=" . $id_articulo . " 
and c.precio_articulo=" . $id_precio . " 
and a.fecha_factura>='" . $fechainicial . "' and a.fecha_factura<='" . $fechafinal . "'");

    include 'desconectar_facturacion.php';
    $total1 = 0;
    if (pg_num_rows($qa11) > 0) {
        while ($array = pg_fetch_assoc($qa11)) {
            $mult = ($array['cantidad'] * $array['precio_articulo']);
            $total1 = $total1 + $mult;
        }
        $total = number_format($total1, 2, ',', '.');
    } ELSE {

        $total = number_format("0", 2, '.', '.');
    }
    return $total;
}


function cantidad1($id_articulo,$id_sucursal, $fechainicial, $fechafinal, $id_precio)
{
    $total = 0;
    include 'conexion_facturacion.php';
/*
    $qa11 = pg_query("SELECT sum(cantidad) 
  FROM factura a, cantidad_articulos_factura b
  WHERE a.id_factura=b.id_factura
  and a.id_sucursal=" . $id_sucursal . "
  and b.id_articulo=" . $id_articulo . "
  and a.estado_factura=1
  and  a.fecha_factura >= '" . $fechainicial . "' 
  and  a.fecha_factura <='" . $fechafinal . "'");
*/

  $qa11 = pg_query("
SELECT sum(cantidad)
FROM factura a, cantidad_articulos_factura b, precios_articulo c
WHERE a.id_factura=b.id_factura
 and a.id_sucursal=" . $id_sucursal . "
and b.id_precio_articulo=c.id_precio_articulo
  and a.estado_factura=1
and b.id_articulo=" . $id_articulo . " 
and c.precio_articulo=" . $id_precio . " 
and a.fecha_factura>='" . $fechainicial . "' and a.fecha_factura<='" . $fechafinal . "'");

    include 'desconectar_facturacion.php';



    if (pg_num_rows($qa11) > 0) {

        $row21 = pg_fetch_array($qa11);

        if (is_array($row21)) {
            $canti = $row21['sum'];
        }
        $total = number_format($canti, 2, '.', '.');
    } ELSE {

        $total = number_format("0", 2, '.', '.');
    }
    return $total;
}
function precio1($id_articulo,$id_sucursal, $fechainicial, $fechafinal, $id_precio)
{
    $total = 0;
    include 'conexion_facturacion.php';
    $qa11 = pg_query("
SELECT b.cantidad, c.precio_articulo
FROM factura a, cantidad_articulos_factura b, precios_articulo c
WHERE a.id_factura=b.id_factura
 and a.id_sucursal=" . $id_sucursal . "
and b.id_precio_articulo=c.id_precio_articulo
  and a.estado_factura=1
and b.id_articulo=" . $id_articulo . " 
and c.precio_articulo=" . $id_precio . " 
and a.fecha_factura>='" . $fechainicial . "' and a.fecha_factura<='" . $fechafinal . "'");

    include 'desconectar_facturacion.php';
    $total1 = 0;
    if (pg_num_rows($qa11) > 0) {
        while ($array = pg_fetch_assoc($qa11)) {
            $mult = ($array['cantidad'] * $array['precio_articulo']);
            $total1 = $total1 + $mult;
        }
        $total = $total1;
    } ELSE {

        $total = 0;
    }
    return $total;
}










?>