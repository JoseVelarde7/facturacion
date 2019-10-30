<?php
if (isset($_POST['guardar'])) {
    setlocale(LC_TIME, 'spanish');
    date_default_timezone_set("America/La_Paz");
    $ap_paterno = $_POST['ap_paterno'];
    $ap_materno = $_POST['ap_materno'];
    $nombres = $_POST['nombres'];
    $ci = $_POST['ci'];
    $movil = $_POST['movil'];
    $telefono = $_POST['telefono'];
    $fecha_nacimiento = $_POST['fecha_nacimiento'];
    $correo = $_POST['correo'];
    $sexo = $_POST['sexo'];
    $usuario = $_POST['usuario'];
    $clave = $_POST['clave'];
    $usuario = $_POST['usuario'];
    $id_area = $_POST['id_area'];
    $id_rol = $_POST['id_rol'];

    include "conexion_facturacion.php";
    $qa4 = pg_query("SELECT id_persona FROM public.persona where ci='" . $ci . "';");
    include "desconectar_facturacion.php";
    if (pg_num_rows($qa4) > 0) {
        echo ' <div class="alert alert-warning"><strong>Ya existe este usuario verifique los registros</strong></div>';
    }
    else{
        $id_person = datos_personales($ap_paterno, $ap_materno, $nombres, $ci, $movil, $telefono, $fecha_nacimiento, $correo, $sexo);
        $res = nuevo_usuario($usuario, $clave, $id_area, $id_rol, $id_person);
    }

}

function datos_personales($ap_paterno, $ap_materno, $nombres, $ci, $movil, $telefono, $fecha_nacimiento, $correo, $sexo)
{
    include 'conexion_facturacion.php';
    $qa3 = pg_query("INSERT INTO public.persona(
            paterno, materno, nombres, sexo, fecha_nacimiento, 
            correo, telefono, movil, usr_registro, ci)
            VALUES ('" . $ap_paterno . "','" . $ap_materno . "','" . $nombres . "','" . $sexo . "','" . $fecha_nacimiento . "',
            '" . $correo . "','" . $telefono . "','" . $movil . "'," .$_SESSION["id_usuario"]. ",'" . $ci . "')");
    $qa4 = pg_query("SELECT id_persona FROM public.persona where ci='" . $ci . "';");
    $row1 = pg_fetch_array($qa4);
    if (is_array($row1)) {
        $id_persona = $row1['id_persona'];
    }
    include 'desconectar_facturacion.php';

return $id_persona;
}
function nuevo_usuario($usuario, $clave, $id_area, $id_rol, $id_person)
{
    include 'conexion_facturacion.php';
    $qa3 = pg_query("INSERT INTO public.usuario(
            usuario, clave, id_estado, id_persona, 
            id_area, usr_registro, id_rol)
                          VALUES ('" . $usuario . "', MD5('" . $clave. "'),'A'," . $id_person . ",
                          " . $id_area . "," . $_SESSION["id_usuario"] . "," . $id_rol . ")");
    include 'desconectar_facturacion.php';
    echo ' <div class="alert alert-success"><strong>Datos guardados correctamente</strong></div>';
  //  sleep(5);
    //echo '<meta http-equiv="refresh" content="2;url=../../pages/forms/nueva_dosificacion.php">';
}
?>