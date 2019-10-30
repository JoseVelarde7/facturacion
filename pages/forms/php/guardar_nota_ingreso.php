<?php
session_start();
setlocale(LC_TIME, 'spanish');
date_default_timezone_set("America/La_Paz");




$lacteos = 0;
$eba = 0;
$papelbol = 0;
$miel = 0;

$array_cantidad = array();
$array_productos = array();
$array_obs = array();
$array_id_articulos = array();
$id_area = $_POST['area'];
$array_productos = $_POST['id_items'];
$array_cantidad = $_POST['quantity_items'];
$array_obs = $_POST['obs_items'];




if(count($array_productos)>0){


 include 'conexion_facturacion.php';

    For ($i = 0; $i < count($array_productos); $i++) {


$porciones = explode(" | ", $array_productos[$i]);
$array=$porciones[1];



    $qa5 = pg_query("SELECT id_articulo FROM articulo where  descripcion_articulo='" . $array . "'");
        $row5 = pg_fetch_array($qa5);
        if (is_array($row5)) {
        $array_id_articulos[$i] = $row5['id_articulo'];
        }
    }

   $qa2 = pg_query("SELECT * from nota_ingreso where gestion=".date('Y')." and id_area=".$id_area);

    if (pg_num_rows($qa2) > 0) {    
             $qa3 = pg_query("SELECT numero from nota_ingreso where id_nota_ingreso=(select max(id_nota_ingreso) from nota_ingreso where gestion=".date('Y')." and id_area=".$id_area.")");
            $row3 = pg_fetch_array($qa3);

        if (is_array($row3)) {
            $numero = $row3['numero'];
        }
         $numero=$numero+1;
    }else{
         $numero=1;
    }

$_SESSION['id_ingresoo']=$numero;


    $qa4=pg_query("INSERT INTO  nota_ingreso(numero, gestion, id_area, usr_registro) VALUES (".$numero.", ".date('Y').", ".$id_area.", ".$_SESSION["id_usuario"].");");

$qa5 = pg_query("SELECT max(id_nota_ingreso) AS id_nota_ingreso from nota_ingreso where id_area=".$id_area." and gestion=".date('Y'));
            $row5 = pg_fetch_array($qa5);

        if (is_array($row5)) {
            $id_nota_ingreso = $row5['id_nota_ingreso'];
            $_SESSION['id_ingresoo']=$row5['id_nota_ingreso'];
        }


    For ($i = 0; $i < count($array_id_articulos); $i++) {
     
     $qa6=pg_query("INSERT INTO public.detalle_ingreso(id_nota_ingreso, id_articulo, cantidad, observaciones)
                   VALUES (".$id_nota_ingreso.", ".$array_id_articulos[$i].", ".$array_cantidad[$i].",'".$array_obs[$i]."' );");


 $qa7 = pg_query("SELECT * from stock where id_articulo=".$array_id_articulos[$i]." and id_area=".$id_area);

    if (pg_num_rows($qa7) > 0) { 


     $qa8 = pg_query("SELECT cantidad from stock where id_articulo=".$array_id_articulos[$i]." and id_area=".$id_area);
            $row8 = pg_fetch_array($qa8);

        if (is_array($row8)) {
            $canti = $row8['cantidad'];
        }
$cantidad=$canti+$array_cantidad[$i];

$qa8 = pg_query("UPDATE stock SET cantidad=".$cantidad." WHERE id_articulo=".$array_id_articulos[$i]." and id_area=".$id_area);

    }else{

        $qa9=pg_query("INSERT INTO stock(id_articulo, id_area, cantidad) 
            VALUES (".$array_id_articulos[$i].", ".$id_area.",  ".$array_cantidad[$i].")");
    }

    }

}
 include 'desconectar_facturacion.php';


?>
