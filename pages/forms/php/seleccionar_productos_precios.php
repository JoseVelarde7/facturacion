<?php


    $opciones = '<select id="sucursaless" class="form-control show-tick" name="sucursal">
                                               <option value="0">Seleccione una Sucursal</option>';

   include "conexion_facturacion.php";
    $strConsulta = pg_query("select id_sucursal, nombre_sucursal, direccion_sucursal from sucursal where id_empresa=".$_GET["idempresa"]."order by id_sucursal");
    include "desconectar_facturacion.php";


    while($row = pg_fetch_array($strConsulta))
    {
        $opciones.='<option value="'.$row["id_sucursal"].'">'.$row["nombre_sucursal"].", ".$row["direccion_sucursal"].'</option>';
    }
$opciones.='</select>';

    echo $opciones;

?>