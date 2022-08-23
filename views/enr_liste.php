<?php 
    include './controllers/enr_controlleur.php';
    $fic_c=new fiche_controlleur();
    $liste="";
    if ((isset($_GET['liste']) && !empty($_GET['liste']) && is_numeric($_GET['liste'])) && (isset($_GET['session']) && !empty($_GET['session']) && is_numeric($_GET['session']))) {
        $liste=sanitize($_GET['liste']);
    }else{
        header("location:javascript://history.go(-1)");
        exit();
    }
 ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<title></title>
<link rel="icon" href="favicon.ico" type="image/x-icon">
<!-- Favicon-->
<link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css" />
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="assets/css/main.css">
<!-- Custom Css -->


<link rel="stylesheet" href="assets/css/themes/all-themes.css"/>
</head>

<body class="theme-blush">
<!-- Page Loader -->
<div class="page-loader-wrapper">
    <div class="loader">
        <div class="preloader">
            <div class="spinner-layer pl-blush">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div>
                <div class="circle-clipper right">
                    <div class="circle"></div>
                </div>
            </div>
        </div>
        <p>Please wait...</p>
    </div>
</div>
<!-- #END# Page Loader --> 

<!-- Overlay For Sidebars -->
<div class="overlay"></div>
<!-- #END# Overlay For Sidebars --> 

<!-- Top Bar -->
<nav class="navbar clearHeader">
    <div class="col-12">
        <div class="navbar-header"> <a class="navbar-brand" href="javascript: history.go(-1)" ><?=$University ?></a> </div>
    </div>
</nav>
<!-- #Top Bar -->

<!--Side menu and right menu -->

<!-- main content -->
<section class="container">
    <div class="">
        <div class="block-header">
            <!---<h2>Student Recipes</h2>
            <small class="text-muted">Welcome to Swift application</small>-->
            <br><br>
        </div>
        <br>
        <div class="row clearfix" style="margin: 70px 15px 15px 0;">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card"><br><br>
                    <div class="body">
                        <div class="clearfix">
                            
                            <br>
                            <div class="">
                                <center><STRONG><h2>UNIVERSITE PROTESTANTE AU CONGO</h2></STRONG></center>
                                <center><STRONG><h3>FACULTE DES SCIENCES INFORMATIQUES</h3></STRONG></center>
                                <center><STRONG><h5>LISTE D'ENROLEMENT</h5></STRONG></center>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12">                                                
                                <div class="float-left mt-20">
                                    <address>
                                       <h5><strong>Periode des examens :<?=$fic_c->fiche_infos($liste)->periode ?></strong></h5>
                                </div>
                                <div class="float-right mt-20">
                                    <h6><strong>Anneé académique:<?=$fic_c->fiche_infos($liste)->annee  ?></h6>
                                    <h6 class="m-t-10"><strong>Promotion: </strong> #<?=$fic_c->fiche_infos($liste)->denomination ?></h6>
                                </div>
                            </div>
                        </div>
                        <div class="mt-40"></div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                            <th><h6><strong>Nom</strong></h6></th>
                                            <th><h6><strong>Postenom</strong></h6></th>
                                            <th><h6><strong>Prenom</strong></h6></th>
                                            </tr>
                                        </thead>
                                         
                                        <tbody>
                                         <?php 
                                                foreach ($fic_c->enroled($liste) as $entry) {
                                                 ?>
                                            <tr>
                                                <td><h6><?=$entry[1] ?></h6></td>
                                                <td><?=$entry[2] ?><h6></h6></td>
                                                <td><h6><?=$entry[3] ?></h6></td>
                                            </tr>
                                            <?php 
                                                }
                                                 ?>

                                        </tbody>
                                                                             </table>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 text-right">
                                <a href="javascript:window.print()" class="btn btn-raised btn-success"><i class="zmdi zmdi-print"></i></a>
                            </div>
                        </div>                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- main content -->

<div class="colo r-bg"></div>
<!-- Jquery Core Js --> 
<script src="assets/bundles/libscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js -->
<script src="assets/bundles/vendorscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js -->
<script src="assets/bundles/morphingsearchscripts.bundle.js"></script> <!-- Main top morphing search --> 

<script src="assets/bundles/mainscripts.bundle.js"></script><!-- Custom Js --> 
</body>
</html>