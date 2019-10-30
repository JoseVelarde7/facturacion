<?php

        include 'conexion_facturacion.php';
        $qa2 =    pg_query("select * from sucursal where situacion=true and id_empresa=".$empresa);
        include 'desconectar_facturacion.php';
        while($row11 = pg_fetch_array($qa2))
        {
            echo '<option value="'.$row11['id_sucursal'].'">'.$row11['direccion_sucursal'].", ".$row11['nombre_sucursal'].'</option>';
        }
?>