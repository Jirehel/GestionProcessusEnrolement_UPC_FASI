<?php 
    include './controllers/authentification_controleur.php';
    $au_c= new authentification_controlleur();
    if (isset($_POST['access'])) {
           $au_c->verify($_POST['identifier'] );
        }
 ?>

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
        <h1 class="title"><span><?=$University ?></span>Identification <span class="msg">Saisi ton identifiant</span></h1>
        <div class="col-sm-12">
            <form id="sign_in" method="post">
                <div class="input-group"> <span class="input-group-addon"> <i class="zmdi zmdi-account"></i> </span>
                    <div class="form-line">
                        <input type="text" class="form-control" name="identifier" placeholder="identifiant" required autofocus>
                    </div>
                </div>
                <div class="text-center">
                    <button name="access" class="btn btn-raised waves-effect g-bg-blush2">ACCEDER</button>
                </div>
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