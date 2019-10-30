<?php
session_start();
$ci_nit = $_GET['ci_nit'];

//$conexion = new mysqli('servidor','usuario','password','basedatos',3306);
include "conexion_facturacion.php";
$result = pg_query("SELECT * from public.cliente where nit_carnet='".$ci_nit."' AND id_cliente=(select max(id_cliente) from cliente where nit_carnet='".$ci_nit."')" );
$emparray = array();
$clientName=new stdClass();

while($row =pg_fetch_assoc($result))
{
    $emparray[] = $row;
    $clientName->cliente=$row['cliente'];
    $clientee=$row['cliente'];

}
if(pg_num_rows($result)>0){$ex=1;}else {$ex=0;}
//echo $ex;
if($ex>0)
{
    echo $clientee;
   // echo json_encode($clientName);
}
