<?php
$id_empresa = $_POST['id_empresa'];
$id_sucursal = $_POST['sucursal'];
$_SESSION['id_sucursal']=$_POST['sucursal'];


$_SESSION['id_empresa_precio']=$id_empresa;
include 'conexion_facturacion.php';
$qa3 = pg_query("select * from articulo where estado_articulo=true and id_empresa=" . $id_empresa);
include 'desconectar_facturacion.php';
$i = 0;
while ($row13 = pg_fetch_array($qa3)) {

    if (precios($row13['id_articulo'],$id_sucursal) != "") {
        $precio = number_format(precios($row13['id_articulo'],$id_sucursal), 2, '.', '.');
    } else {
        $precio = "";
    }

    echo '<tr><td>' . ($i + 1) . '</td>
    <td>' . $row13['descripcion_articulo'] . '</td>
    <td>' . $row13['unidad_medida'] . '</td> 
           <td>' . $row13['unidad_representativa'] . '</td>
   
  <td>' . $precio . '</td>
    <td>
           <div class="form-group form-float">
                   <div class="form-line focused">
                        <input value="' . $precio . '" type="number" min="0.1" class="form-control" name="'.$row13['id_articulo'].'" required>
                                <label class="form-label">Ingrese Precio</label>
                    </div>
                                <div class="help-label">Ej: 00,00</div>
           </div>

    </td>
    </tr> ';
    $i = $i + 1;
}

function precios($id_producto,$id_sucursal)
{
    include 'conexion_facturacion.php';
    $qa3 = pg_query("select * from precios_articulo where  estado_precio_articulo=true and id_articulo=".$id_producto." and id_sucursal=".$id_sucursal);
    include 'desconectar_facturacion.php';

    if (pg_num_rows($qa3) > 0) {
        $row14 = pg_fetch_array($qa3);

        if (is_array($row14)) {
            $precio = $row14['precio_articulo'];
        }
    } ELSE {
        $precio = "";
    }
    return $precio;
}


?>