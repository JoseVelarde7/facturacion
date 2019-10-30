<?php
if (isset($_POST['guardar'])) {
    setlocale(LC_TIME, 'spanish');
    date_default_timezone_set("America/La_Paz");

    $movil = $_POST['movil'];
    $telefono = $_POST['telefono'];

    $correo = $_POST['correo'];

    $id_estado = $_POST['estado'];
    $id_area = $_POST['id_area'];
    $id_rol = $_POST['id_rol'];


    $id_person = modificar_datos_personales($movil, $telefono, $correo, $id_persona);
    $res = modificar_usuario($id_estado, $id_area, $id_rol,$id_usuario);

}

function modificar_datos_personales($movil, $telefono,$correo,$id_persona)
{
    include 'conexion_facturacion.php';
    $qa3 = pg_query("UPDATE public.persona 
SET correo='" . $correo . "', telefono='" . $telefono . "', movil='" . $movil . "' where id_persona=" . $id_persona);
    include 'desconectar_facturacion.php';

}
function modificar_usuario($id_estado, $id_area, $id_rol,$id_usuario)
{
    include 'conexion_facturacion.php';
    $qa3 = pg_query("UPDATE public.usuario
   SET  id_estado='" . $id_estado . "', id_area=" . $id_area . ",  id_rol=" . $id_rol . " where id_usuario=" . $id_usuario);
    include 'desconectar_facturacion.php';
    echo ' <div class="alert alert-success"><strong>Datos guardados correctamente</strong></div>';
      //  sleep(5);
    echo '<meta http-equiv="refresh" content="2;url=../../pages/forms/gestionar_usuarios.php">';
}
?>