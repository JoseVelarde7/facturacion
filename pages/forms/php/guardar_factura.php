<?php
session_start();
include "conexion_facturacion.php";
include "numero_factura.php";
include '../classes/sin/ControlCode.php';


include "conexion_facturacion.php";
$qa41 = pg_query("SELECT numero_conjunta FROM public.factura WHERE id_factura=(select max(id_factura) from public.factura) ");
include "desconectar_facturacion.php";

$_SESSION['total1'] = 0;
$_SESSION['total2'] = 0;
$_SESSION['total3'] = 0;
$_SESSION['total4'] = 0;

$row41 = pg_fetch_array($qa41);
if (pg_num_rows($qa41) > 0) {
    $_SESSION['num_conjunta'] = $row41['numero_conjunta'];
    $_SESSION['num_conjunta'] = $_SESSION['num_conjunta'] + 1;
} else {
    $_SESSION['num_conjunta'] = 1;
}


$lacteos = 0;
$eba = 0;
$papelbol = 0;
$miel = 0;


$array_id_item = array();
$array_articulos = array();
$array_precio1 = array();
$array_productos = array();
$array_obs = array();
$array_camb_cost = array();


$_SESSION['array_total'] = number_format($_POST['total'], 2, '.', '');
$_SESSION['array_date'] = $_POST['date'];
$_SESSION['array_nit'] = $_POST['nit'];
$clienteee = $_POST['client_name'];

$_SESSION['array_cliente']=strtoupper($clienteee);


$array_productos = $_POST['id_items'];
$array_articulos = $_POST['quantity_items'];
$array_precio1 = $_POST['price_items'];
$array_obs = $_POST['obs_items'];

$suc1=$_SESSION['sucursal1'];
/*$suc2=$_SESSION['sucursal2'];
$suc3=$_SESSION['sucursal3'];
$suc4=$_SESSION['sucursal4'];*/

/*
ECHO($_SESSION['array_total']);
ECHO($_SESSION['array_date']);
ECHO($_SESSION['array_nit']);
ECHO($_SESSION['array_cliente']);
print_r($array_id_item);
print_r($array_productos);
print_r($array_articulos);
print_r($array_precio);*/
/*echo "--------------------------------------------------------------------";
print_r($array_obs);*/
/*
echo $suc1."///////////////////////////////////";
echo $suc2."///////////////////////////////////";
echo $suc3."///////////////////////////////////";
echo $suc4."///////////////////////////////////";
*/

$aux2=1;
$empresas = 0;
$suc0=0;
 include 'conexion_facturacion.php';
For ($i = 0; $i < count($array_productos); $i++) {



$porciones = explode(" | ", $array_productos[$i]);
$array=$porciones[1];




   
    $qa5 = pg_query("select a.id_articulo, b.precio_articulo, a.id_empresa
FROM public.articulo a , public.precios_articulo b 
where a.id_articulo=b.id_articulo and b.id_sucursal=".$_SESSION['sucursal1']." 
and b.estado_precio_articulo=true  and descripcion_articulo='" . $array . "'");
   
    $row5 = pg_fetch_array($qa5);

    if (is_array($row5)) {
        $array_id_item[$i] = $row5['id_articulo'];
        $array_empresa = $row5['id_empresa'];
        $array_precio11= $row5['precio_articulo'];
        $array_precio12=$array_precio1[$i];




   $qa12=pg_query("SELECT * from stock where id_area=".$_SESSION['id_area']." and id_articulo=".$array_id_item[$i]); 
                 $row12 = pg_fetch_array($qa12);
                if (is_array($row12)) {
                    $cantidadd = $row12['cantidad'];
                }


               $can=$cantidadd-$array_articulos[$i];


        $qa8 = pg_query("UPDATE stock SET cantidad=".$can." WHERE id_articulo=".$array_id_item[$i]." and id_area=".$_SESSION['id_area']);






$qa2 = pg_query("SELECT * from precios_articulo where estado_precio_articulo=true and id_articulo=".$array_id_item[$i]." and precio_articulo=".$array_precio1[$i]." and id_sucursal=".$_SESSION['sucursal1']);
   


    if (pg_num_rows($qa2) > 0) {
    
        $array_camb_cost[$i]=1;
        $array_pre= $array_precio11;

      }else{

        $array_camb_cost[$i]=2;
        $array_pre= $array_precio12;
   
        $qa33 = pg_query("SELECT id_sucursal from sucursal where id_empresa=".$array_empresa." and id_sucursal=".$_SESSION['sucursal1']);
       /*
        $qa44 = pg_query("SELECT id_sucursal from sucursal where id_empresa=".$array_empresa." and id_sucursal=".$_SESSION['sucursal2']);
         
       
        $qa55 = pg_query("SELECT id_sucursal from sucursal where id_empresa=".$array_empresa." and id_sucursal=".$_SESSION['sucursal3']);

        $qa66 = pg_query("SELECT id_sucursal from sucursal where id_empresa=".$array_empresa." and id_sucursal=".$_SESSION['sucursal4']);

                   */  if (pg_num_rows($qa33) > 0) {
                     $suc0=$suc1;
                      }
                     /* if (pg_num_rows($qa44) > 0) {
                     $suc0=$suc2;
                      }
                      if (pg_num_rows($qa55) > 0) {
                     $suc0=$suc3;
                      }
                      if (pg_num_rows($qa66) > 0) {
                     $suc0=$suc4;
                      }*/


    

        $qa3 = pg_query("INSERT INTO public.precios_articulo(
        id_articulo, id_usuario, 
        precio_articulo, estado_precio_articulo, id_sucursal,observacion)
        VALUES (" .  $array_id_item[$i] . "," . $_SESSION["id_usuario"] . "," . $array_precio1[$i] . ",'false',".  $suc0.",'".$array_obs[$i]."')");


      }



        if ($array_empresa == 1) {
            $lacteos = 1;
            $_SESSION['total1'] = $_SESSION['total1'] + ($array_pre * $array_articulos[$i]);
        }
       /* if ($array_empresa == 2) {
            $eba = 1;
            $_SESSION['total2'] = $_SESSION['total2'] + ($array_pre * $array_articulos[$i]);
        }
        if ($array_empresa == 3) {
            $papelbol = 1;
            $_SESSION['total3'] = $_SESSION['total3'] + ($array_pre * $array_articulos[$i]);
        }
          if ($array_empresa == 4) {
            $miel = 1;
            $_SESSION['total4'] = $_SESSION['total4'] + ($array_pre * $array_articulos[$i]);
        }*/
    }
   
}
include 'desconectar_facturacion.php';


include 'conexion_facturacion.php';
$qa4 = pg_query("SELECT id_cliente FROM public.cliente WHERE nit_carnet='" . $_SESSION['array_nit'] . "' and cliente='" . $_SESSION['array_cliente'] . "';");
include 'desconectar_facturacion.php';
//echo ("SELECT id_cliente FROM public.cliente WHERE nit_carnet='" . $_SESSION['array_nit'] . "';");
if (pg_num_rows($qa4) > 0) {
    $row1 = pg_fetch_array($qa4);
    if (is_array($row1)) {
        $_SESSION['id_cliente'] = $row1['id_cliente'];
    }
} else {
    include 'conexion_facturacion.php';
    $qa6 = pg_query("INSERT INTO public.cliente(nit_carnet, cliente) VALUES ('" . $_SESSION['array_nit'] . "', '" . $_SESSION['array_cliente'] . "');");
//echo "INSERT INTO facturacion.cliente(nit_carnet, cliente) VALUES ('" . $_SESSION['array_nit'] . "', '" . $_SESSION['array_cliente'] . "');";
    $qa4 = pg_query("SELECT max(id_cliente) as id_cliente FROM public.cliente WHERE nit_carnet='" . $_SESSION['array_nit'] . "';");
//echo "SELECT id_cliente FROM facturacion.cliente WHERE nit_carnet='" . $_SESSION['array_nit'] . "';";
    include 'desconectar_facturacion.php';
    $row1 = pg_fetch_array($qa4);
    if (is_array($row1)) {
        $_SESSION['id_cliente'] = $row1['id_cliente'];
    }
}

for ($i = 1; $i < 5; $i++) {
    if ($_SESSION['total'.$i] > 0) {

        $_SESSION['numero'] = num_factura($_SESSION['sucursal' . $i]);

//ECHO  'Numero'.$_SESSION['numero'];



        include 'conexion_facturacion.php';
        $qa1 = pg_query("SELECT * FROM public.dosificacion, public.sucursal WHERE sucursal.id_sucursal=" 
            . $_SESSION['sucursal' . $i] . " and sucursal.id_sucursal=dosificacion.id_sucursal and estado_dosificacion=1 and fecha_emision > '" . strftime(" %#d-%m-%Y") . "';");
        include 'desconectar_facturacion.php';
         $row2 = pg_fetch_array($qa1);
        if (is_array($row2)) {
            $_SESSION['id_dosificacion'] = $row2['id_dosificacion'];
            $_SESSION['numero_autorizacion'] = $row2['numero_autorizacion'];
            $_SESSION['fecha_emision'] = $row2['fecha_emision'];
            $_SESSION['llave_dosificacion'] = $row2['llave_dosificacion'];
            $_SESSION['leyenda_factura'] = $row2['leyenda_factura'];
            $_SESSION['actividad_economica'] = $row2['actividad_economica'];
            $_SESSION['nit_area'] = $row2['nit_area'];
        }

/*
echo $_SESSION['numero_autorizacion'].'//';
echo $_SESSION['numero'].'//';
echo $_SESSION['nit_area'].'//';
echo $_SESSION['array_date'].'//';
echo $_SESSION['total' . $i].'//';
echo $_SESSION['llave_dosificacion'].'//';
*/
          $_SESSION['codigo_control'] = codigo_control($_SESSION['numero_autorizacion'], $_SESSION['numero'], $_SESSION['array_nit'], $_SESSION['array_date'], $_SESSION['total' . $i], $_SESSION['llave_dosificacion']);

        include 'conexion_facturacion.php';
        $qa3 = pg_query("INSERT INTO public.factura(
           id_usuario, id_sucursal, id_dosificacion, id_cliente, 
            codigo_control, estado_factura, numero_factura, fecha_factura, 
            numero_conjunta,id_area)
    VALUES (" . $_SESSION['id_usuario'] . ", " . $_SESSION['sucursal' . $i] . ", " . $_SESSION['id_dosificacion'] . ", " . $_SESSION['id_cliente'] . ",
            '" . $_SESSION['codigo_control'] . "', 1, " . $_SESSION['numero'] . ", '" . $_SESSION['array_date'] . "', " . $_SESSION['num_conjunta'] . ",".$_SESSION["id_area"].")");
        include 'desconectar_facturacion.php';
/*
echo ("INSERT INTO public.factura(
           id_usuario, id_sucursal, id_dosificacion, id_cliente, 
            codigo_control, estado_factura, numero_factura, fecha_factura, 
            numero_conjunta,id_area)
    VALUES (" . $_SESSION['id_usuario'] . ", " . $_SESSION['sucursal' . $i] . ", " . $_SESSION['id_dosificacion'] . ", " . $_SESSION['id_cliente'] . ",
            '" . $_SESSION['codigo_control'] . "', 1, " . $_SESSION['numero'] . ", '" . $_SESSION['array_date'] . "', " . $_SESSION['num_conjunta'] . ",".$_SESSION["id_area"].")");

*/
        include 'conexion_facturacion.php';
        $qa1 = pg_query("select a.id_factura from public.factura a, public.sucursal c where 
 c.id_sucursal=a.id_sucursal and a.id_factura=(select max(id_factura) from factura where id_sucursal=" . $_SESSION['sucursal' . $i] . ") and c.id_sucursal=" . $_SESSION['sucursal' . $i]);
        include 'desconectar_facturacion.php';
        $row2 = pg_fetch_array($qa1);
        if (is_array($row2)) {
            $_SESSION['id_factura'] = $row2['id_factura'];

        }
        // echo "fctura :". $_SESSION['id_factura']."    empresa: ".  $_SESSION['id_empresa'];
  //print_r($array_camb_cost);


 include 'conexion_facturacion.php';

        For ($j = 0; $j < count($array_id_item); $j++) {

 if($array_camb_cost[$j]==1){

 $qa9 = pg_query("SELECT a.precio_articulo,a.id_precio_articulo, b.id_empresa 
from public.precios_articulo a, public.articulo b 
where a.id_articulo=b.id_articulo 
and a.estado_precio_articulo=true 
and a.id_sucursal=" . $_SESSION['sucursal' . $i] . " 
and b.id_articulo=" . $array_id_item[$j]);
           

            if (pg_num_rows($qa9) > 0) {
               // echo "entro";
                $row3 = pg_fetch_array($qa9);

                if (is_array($row3)) {
                    $id_precio = $row3['id_precio_articulo'];
                }

                $qa3 = pg_query("INSERT INTO public.cantidad_articulos_factura(
            id_factura, id_articulo, cantidad, id_precio_articulo)
    VALUES (" . $_SESSION['id_factura'] . ", " . $array_id_item[$j] . ", " . $array_articulos[$j] . "," . $id_precio . ");");
            }
 }

 if($array_camb_cost[$j]==2){
 $qa9 = pg_query("SELECT a.precio_articulo,a.id_precio_articulo, b.id_empresa 
from public.precios_articulo a, public.articulo b 
where a.id_articulo=b.id_articulo 
and a.id_sucursal=" . $_SESSION['sucursal' . $i] . " 
and b.id_articulo=" . $array_id_item[$j]."
 and a.id_precio_articulo=
 (SELECT max(c.id_precio_articulo)
  from public.precios_articulo c where  c.id_sucursal=" .
  $_SESSION['sucursal' . $i] . " and c.id_articulo=" . $array_id_item[$j].")");


            if (pg_num_rows($qa9) > 0) {
               // echo "entro";
                $row3 = pg_fetch_array($qa9);

                if (is_array($row3)) {
                    $id_precio = $row3['id_precio_articulo'];
                }

               
                $qa3 = pg_query("INSERT INTO public.cantidad_articulos_factura(
            id_factura, id_articulo, cantidad, id_precio_articulo)
    VALUES (" . $_SESSION['id_factura'] . ", " . $array_id_item[$j] . ", " . $array_articulos[$j] . "," . $id_precio . ");");
               

            }
 }

}


/*

            if($array_camb_cost[$j]==1){


            $qa9 = pg_query("select a.precio_articulo,a.id_precio_articulo, b.id_empresa 
from public.precios_articulo a, public.articulo b 
where a.id_articulo=b.id_articulo 
and a.estado_precio_articulo=true 
and a.id_sucursal=" . $_SESSION['sucursal' . $i] . " 
and b.id_articulo=" . $array_id_item[$j]);
           

            if (pg_num_rows($qa9) > 0) {
               // echo "entro";
                $row3 = pg_fetch_array($qa9);

                if (is_array($row3)) {
                    $id_precio = $row3['id_precio_articulo'];
                }

                
                $qa3 = pg_query("INSERT INTO public.cantidad_articulos_factura(
            id_factura, id_articulo, cantidad, id_precio_articulo)
    VALUES (" . $_SESSION['id_factura'] . ", " . $array_id_item[$j] . ", " . $array_articulos[$j] . "," . $id_precio . ");");
              

            }

        }
            if($array_camb_cost[$j]==2){


         
            $qa9 = pg_query("select a.precio_articulo,a.id_precio_articulo, b.id_empresa 
from public.precios_articulo a, public.articulo b 
where a.id_articulo=b.id_articulo 
and a.id_sucursal=" . $_SESSION['sucursal' . $i] . " 
and b.id_articulo=" . $array_id_item[$j])."
 and a.id_precio_articulo=
 (SELECT max(c.id_precio_articulo) from public.precios_articulo c where  c.id_sucursal=" .
  $_SESSION['sucursal' . $i] . " and c.id_articulo=" . $array_id_item[$j].")");
           


            if (pg_num_rows($qa9) > 0) {
               // echo "entro";
                $row3 = pg_fetch_array($qa9);

                if (is_array($row3)) {
                    $id_precio = $row3['id_precio_articulo'];
                }

               
                $qa3 = pg_query("INSERT INTO public.cantidad_articulos_factura(
            id_factura, id_articulo, cantidad, id_precio_articulo)
    VALUES (" . $_SESSION['id_factura'] . ", " . $array_id_item[$j] . ", " . $array_articulos[$j] . "," . $id_precio . ");");
               

            }

        }

        }*/
 include 'desconectar_facturacion.php';



















    }

}


/*


*/


function codigo_control($numero_autorizacion, $numero_factura, $numero_nit, $fecha, $total, $llave_dosificacion)
{


    $controlCode = new ControlCode();
    $code = $controlCode->generate($numero_autorizacion,//Numero de autorizacion
        $numero_factura,//Numero de factura
        $numero_nit,//Número de Identificación Tributaria o Carnet de Identidad
        str_replace('/', '', $fecha),//fecha de transaccion de la forma AAAAMMDD
        $total,//Monto de la transacción
        $llave_dosificacion//Llave de dosificación
    );


    //print_r($_SESSION['codigo_control']);

    return $code;
}

?>
