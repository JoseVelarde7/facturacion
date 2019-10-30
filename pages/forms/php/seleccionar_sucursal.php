<?php
setlocale(LC_TIME, 'spanish');
date_default_timezone_set("America/La_Paz") ;
        $numero_autorizacion = $_POST['numero_autorizacion'];
        $fecha_emision = $_POST['fecha_emision'];
        include 'conexion_facturacion.php';
        $qa2 =    pg_query("select * from sucursal where estado=true order by id_empresa");
        include 'desconectar_facturacion.php';
        while($row11 = pg_fetch_array($qa2))
        {
            echo '<option value="'.$row11['id_sucursal'].'">'.empresa($row11['id_empresa']).", ".$row11['nombre_sucursal'].", ".$row11['direccion_sucursal'].'</option>';
        }


        function empresa($id_empresa){
            if($id_empresa==1){$empresa="EBA";}
            if($id_empresa==2){$empresa="EBA";}
            if($id_empresa==3){$empresa="PAPELBOL";}
            if($id_empresa==4){$empresa="PROMIEL";}
            return $empresa;
        }
?>