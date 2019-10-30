<?php

$id_usuario = $_GET['id_us'];

include 'conexion_facturacion.php';
$result = pg_query("select * from public.usuario a , public.persona b, public.roles_usuario c , area d
where a.id_persona=b.id_persona
and a.id_area=d.id_area
and a.id_rol=c.id_roles
and a.id_usuario=".$id_usuario.";");
include 'desconectar_facturacion.php';
$row = pg_fetch_array($result);// guardo el resultado en un array
if (is_array($row)) { // verifico q exista el array en caso positivo
    $id_usuario = $row['id_usuario'];
    $id_persona = $row['id_persona'];
    $telefono= $row['telefono'];
    $paterno = $row['paterno'];
    $materno = $row['materno'];
    $nombres= $row['nombres'];
    $ci= $row['ci'];
    $celular= $row['movil'];
    $nacimiento= $row['fecha_nacimiento'];
    $correo= $row['correo'];
    $usuario= $row['usuario'];
    $area= $row['nombre_area'];
    $rol= $row['tipo_usuario'];
    $id_rol= $row['id_rol'];
    $id_area= $row['id_area'];
    $estado= $row['id_estado'];
}

?>