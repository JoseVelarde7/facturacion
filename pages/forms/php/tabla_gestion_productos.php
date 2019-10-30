<?php
$id_empresa = $_POST['id_empresa'];

$_SESSION['id_empresa_precio']=$id_empresa;
    include 'conexion_facturacion.php';
    $qa3 = pg_query("SELECT * from public.articulo where id_empresa=" . $id_empresa. "order by id_articulo desc");
    include 'desconectar_facturacion.php';
    $i = 0;
    while ($row13 = pg_fetch_array($qa3)) {
        echo '<tr><td>' . ($i + 1) . '</td>
    <td>' . $row13['descripcion_articulo'] . '</td>
       <td>' . $row13['unidad_representativa'] . '</td>
   
    <td>' . round($row13['cantidad_representativa'],2) . '</td>
      <td>' . $row13['unidad_medida'] . '</td>'
 . '<td align="center">' . anul($row13['estado_articulo'],$row13['id_articulo']) . '</td>'
    . '<td align="center"><a class="btn btn-sm btn-primary" href="modificar_producto.php?id_pro=' . $row13['id_articulo'] . '" target=""><i class="glyphicon glyphicon-pencil"></i></a></td>

    </tr> ';
        $i = $i + 1;
    }
function anul($anulado,$id)
{
    if($anulado=='t'){
        $anu = '<a class="btn btn-warning waves-effect"'.
            ' href="inactivar_producto.php?id_pro='.$id.
            '"target="">'.
             '<i class="glyphicon glyphicon-remove-sign"></i></a>';
    }else{
        $anu = '  ';
    }

    return $anu;
}

?>