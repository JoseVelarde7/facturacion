<?php
session_start();
$usuario = $_GET['usuario'];
$clave = $_GET['clave'];
//if (isset($_POST['ingresar'])) {
    $res = login($usuario, $clave);
//}

    echo $usuario;
    echo $clave;

function login($usuario, $clave)
{
    $usuario = "";
    $password = "";
    $_SESSION["tipo_usu"] = 0;
    $_SESSION['facturar'] = 0;
    $veren = 0;

    //if (count($_POST) > 0) {
        $usuario = $_GET["usuario"];
        $clave = $_GET["clave"];
        include 'conexion_facturacion.php';
        $log = pg_query("SELECT usuario, clave, id_usuario, id_area FROM public.usuario WHERE usuario='".pg_escape_string($usuario)."'  and clave= MD5('".pg_escape_string($clave)."') and id_estado='A'");

// ECHO ("SELECT usuario, clave, id_usuario, id_area FROM public.usuario WHERE usuario='".pg_escape_string($usuario)."'  and clave= MD5(pg_escape_string('".pg_escape_string($clave)."')) and id_estado='A'");



        include 'desconectar_facturacion.php';
        //  echo ("SELECT usuario, clave, id_usuario, id_area FROM public.usuario WHERE usuario='$usuario' and clave= MD5('$clave') and id_estado='A'");
        $row = pg_fetch_array($log);
        if (is_array($row)) {
            $_SESSION["usuario"] = $row['usuario'];
            $_SESSION["id_usuario"] = $row['id_usuario'];
            //  $_SESSION["id_estado"] = $row['id_estado'];
            $_SESSION["id_area"] = $row['id_area'];
            $_SESSION["id_area_area"] = $row['id_area'];

            include 'conexion_facturacion.php';
            $lugar = pg_query("SELECT nombre_area, ubicacion, nombre_empresa from area a, empresa e where e.id_empresa=a.id_empresa and id_area=" . $_SESSION["id_area"]);
            include 'desconectar_facturacion.php';
            $row1 = pg_fetch_array($lugar);
            if (is_array($row1)) {
                $_SESSION["nombre_area"] = $row1['nombre_area'];
                $_SESSION["ubicacion_area"] = $row1['ubicacion'];
                 $_SESSION["nombre_empresa"] = $row1['nombre_empresa'];
            }




            include 'conexion_facturacion.php';
            $funcion = pg_query("select id_rol from public.roles_usuario, public.usuario where id_usuario=" . $_SESSION["id_usuario"]);
            include 'desconectar_facturacion.php';
            $row3 = pg_fetch_array($funcion);
            if (is_array($row3)) {
                $_SESSION["funcion"] = $row3['id_rol'];
            }
            if ($_SESSION["funcion"] == 1) {
                header("Location:pagina_principal.php");
            } else {
                if ($_SESSION["funcion"] == 2) {

                    include 'conexion_facturacion.php';
                    $usuario = pg_query("select * from sucursales_usuario where estado=true and id_usuario=". $_SESSION["id_usuario"]." ORDER BY (id_sucursales_usuario)");
                    include 'desconectar_facturacion.php';
                   
                    $i = 1;
                    while ($row13 = pg_fetch_array($usuario)) {
                        $_SESSION["sucursal" . $i] = $row13['id_sucursal'];
                        $i = $i + 1;
                    }
                    header("Location:pagina_principal.php");
                } else {
                    echo ' <div class="alert alert-danger"><strong>No tiene funciones en este sistema</strong></div>';
                }
            }
        } else {

            echo ' <div class="alert alert-danger"><strong>Error de ingreso intente de nuevo</strong></div>';
        }
    //}
}


?>