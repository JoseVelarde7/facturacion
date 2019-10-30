<?php
$id_area = $_POST['id_area'];

    include 'conexion_facturacion.php';
    $qa3 = pg_query("SELECT * from stock s, articulo a where s.id_articulo=a.id_articulo and cantidad>0 and id_area=" . $id_area. "order by a.descripcion_articulo ");
    include 'desconectar_facturacion.php';
    $i = 0;
    while ($row13 = pg_fetch_array($qa3)) {
        echo '<tr><td>' . ($i + 1) . '</td>
    <td>' . $row13['descripcion_articulo'] . '</td>
       <td>' . $row13['unidad_representativa'] . '</td>
   

      <td>' . $row13['unidad_medida'] . '</td>
      <td>' . $row13['cantidad'] . '</td>
      </tr> ';
        $i = $i + 1;
    }


?>