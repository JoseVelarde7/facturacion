<?php

        include 'conexion_facturacion.php';
        $qa2 =    pg_query("select * from sucursal where id_empresa=".$empresa."order by id_sucursal");
        include 'desconectar_facturacion.php';
echo '<option value="0">-- Selecciona una Sucursal --</option>';
        while($row11 = pg_fetch_array($qa2))
        {
            echo '<option value="'.$row11['id_sucursal'].'">'.$row11['direccion_sucursal'].", ".$row11['nombre_sucursal'].'</option>';
        }
?>