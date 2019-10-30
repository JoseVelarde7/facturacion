<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Login Administrador</title>
    <!-- Favicon-->
    <link rel="shortcut icon" href="../../images/user1.png">

    <!-- Google Fonts -->
  

    <!-- Bootstrap Core Css -->
    <link href="../../plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="../../plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="../../plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="../../css/style.css" rel="stylesheet">
</head>
<body class="login-page">
    <div class="login-box">
        <div class="logo">
            <a href="javascript:void(0);">Bienvenido al Sistema de Facturacion<br><b>EBA</b></a>
          <!--  <small>Recuerde que las credenciales son unicas, cuide y modifique periodicamente</small>-->
        </div>
        <div class="card">
            <div class="body">
                <form id="sign_in" method="POST">
                    <div class="msg">Ingrese sus credenciales</div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="glyphicon glyphicon-user"></i>

                        </span>
                        <div class="form-line">
                            <input type="text" id="user" class="form-control" name="usuario" placeholder="Usuario" required autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="glyphicon glyphicon-lock"></i>
                        </span>
                        <div class="form-line">
                            <input type="password" id="pass" class="form-control" name="clave" placeholder="Contraseña" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <button id="entrar" class="btn btn-block bg-pink waves-effect" type="submit" name = "ingresar">INGRESAR</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
    <!-- Jquery Core Js -->
    <script src="../../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap Core Js -->
    <script src="../../plugins/bootstrap/js/bootstrap.js"></script>
    <!-- Waves Effect Plugin Js -->
    <script src="../../plugins/node-waves/waves.js"></script>
    <!-- Validation Plugin Js -->
    <script src="../../plugins/jquery-validation/jquery.validate.js"></script>
    <!-- Custom Js -->
    <script src="../../js/admin.js"></script>
    <!--<script src="../../js/pages/examples/sign-in.js"></script>-->
</body>

</html>
<?php 
//if(count($_POST)>0) {
    include "php/credenciales.php";
//}
?>


