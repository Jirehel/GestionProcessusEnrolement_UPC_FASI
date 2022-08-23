<?php 
    session_destroy();
    include './controllers/signIn_controlleur.php';
    if ($_GET['p']=='sign-in') {
        # code...
        if(!isset($_SESSION['tokken'])){
            header('location:index.php?p=home');
        }
    }
    if(isset($_POST['access'])){

        $sign_c=new signIn_controlleur($_POST['username'],$_POST['password']);
    }

 ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<title><?=$sitetitle ?></title>
<!-- Favicon-->
<link rel="icon" href="favicon.ico" type="image/x-icon">
<link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css" />
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<!-- Custom Css -->
<link rel="stylesheet" href="assets/css/main.css">
<link href="assets/css/login.css" rel="stylesheet">

<link rel="stylesheet" href="assets/css/themes/all-themes.css"/>
</head>
<body class="login-page authentication">

<div class="container">
    <div class="card-top"></div>
    <div class="card">
        <h1 class="title"><span><?=$University ?></span>Login <span class="msg">Prouve que tu es un legitime</span></h1>
        <div class="col-sm-12">
            <form id="sign_in" method="POST">
                <div class="input-group"> <span class="input-group-addon"> <i class="zmdi zmdi-account"></i> </span>
                    <div class="form-line">
                        <input type="email" class="form-control" name="username" placeholder="Username" required autofocus>
                    </div>
                </div>
                <div class="input-group"> <span class="input-group-addon"> <i class="zmdi zmdi-lock"></i> </span>
                    <div class="form-line">
                        <input type="password" class="form-control" name="password" placeholder="Password" required>
                    </div>
                </div>
                <div class="text-center">
                    <button name="access" class="btn btn-raised waves-effect g-bg-blush2">ACCEDER</button>
                </div>
                <div class="text-center"> <a href="forgot-password.html">Mot de passe oublié??</a></div>
            </form>
        </div>
    </div>    
</div>
<div class="theme-bg"></div>
<!-- Jquery Core Js --> 
<script src="assets/bundles/libscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js -->
<script src="assets/bundles/vendorscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js -->
<script src="assets/bundles/mainscripts.bundle.js"></script><!-- Custom Js --> 
</body>
</html>