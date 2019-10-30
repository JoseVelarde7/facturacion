<?php
session_start(); // INICIO SESION
session_destroy(); // DESTRUYO TODAS LAS VARIABLES DE SESION
header("Location:sign.php"); // FINALMENTE REDIRIJO A LA PAGINA DE LOGIN
?>