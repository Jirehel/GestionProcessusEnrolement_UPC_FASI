<?php
    if (!isset($_SESSION['matricule']) && !isset($_SESSION['email'])) {
         header('location:index.php?p=home');
     }

    include './controllers/fiche_controlleur.php';
    $fic_c=new fiche_controlleur();
    $student="";
    $pid="";
    if (isset($_GET['student']) && isset($_GET['pid'])) {
        $student=sanitize($_GET['student']);
        $pid=sanitize($_GET['pid']);
    }
    #die($_GET['student']." ".$_GET['pid']);
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
        <div class="navbar-header"> <a class="navbar-brand" href="javascript: history.go(-1)"><?=$University ?></a> </div>
    </div>
</nav>
<!-- #Top Bar -->

<!--Side menu and right menu -->

<!-- main content -->
<div class="container">
    <section class="content" style="margin: 70px 15px 15px 0;">
        <div class="container-fluid">
            
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="header text-center">
                            <h2><strong>UNIVERSITE PROTESTANTE AU CONGO</strong></h2>
                            <h2><strong>FACULTE DES SCIENCES INFORMATIQUES</strong></h2>
                            <h2><strong>FICHE D'EXAMENS</strong></h2>

                        </div>
                        <div class="body">
                            <div class="clearfix">
                                <div class="float-left">
                                    <h4 class="text-right"><img src="<?=$fic_c->fiche_infos($student,$pid)->photo ?>" width="150" alt="velonic"></h4>                                                
                                </div>
                                <div class="float-right">
                                    <h4>Matricule<br>
                                        <strong><?=$fic_c->fiche_infos($student,$pid)->matricule ?></strong>
                                    </h4>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-12">                                                
                                    <div class="float-left mt-20">
                                    <h6> <strong>Nom, Postnom et Prénom : <?= strtoupper($fic_c->fiche_infos($student,$pid)->nom." ".$fic_c->fiche_infos($student,$pid)->postnom." ".$fic_c->fiche_infos($student,$pid)->prenom) ?></strong></h6>
                                       <h6><strong>Matricule : <?=$fic_c->fiche_infos($student,$pid)->matricule ?></strong></h6>
                                       <h6><strong>Periode des examens : <?=$fic_c->fiche_infos($student,$pid)->periode ?></strong></h6>
                                    </div>
                                    <div class="float-right mt-20">
                                        <h6><strong>Anneé académique: </strong> <?=$fic_c->fiche_infos($student,$pid)->annee ?></h6>
                                        <h6 class="m-t-10"><strong>Promotion: </strong> #<?=$fic_c->promotion($fic_c->fiche_infos($student,$pid)->promotion) ?></h6>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-40"></div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                                <th>Date</th>
                                                <th>Matières</th>
                                                <th>verdicts</th>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                    foreach ($fic_c->fiche_presence($student,$pid) as $entry) {
                                                    ?>
                                                <tr>
                                                    <td><h6><?=$entry[0] ?></h6></td>
                                                    <td><?=$entry[1] ?><h6></h6></td>
                                                    <td><h6><?=$entry[2]==1?'<span class="badge bg-blue">Présent</span>':'<span class="badge bg-red">Absent</span>' ?></h6></td>
                                                </tr>
                                                <?php 
                                                    }
                                                    ?>

                                            </tbody>
                                            
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-12 text-right">
            
                                    <hr>
                                    <a href="javascript:window.print()" class="btn btn-raised btn-success"><i class="zmdi zmdi-print"></i></a>
                                </div>
                            </div>                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- main content -->

<div class="colo r-bg"></div>
<!-- Jquery Core Js --> 
<script src="assets/bundles/libscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js -->
<script src="assets/bundles/vendorscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js -->
<script src="assets/bundles/morphingsearchscripts.bundle.js"></script> <!-- Main top morphing search --> 

<script src="assets/bundles/mainscripts.bundle.js"></script><!-- Custom Js --> 
</body>
</html>