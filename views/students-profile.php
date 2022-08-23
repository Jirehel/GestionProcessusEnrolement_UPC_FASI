<?php 
    include './controllers/profile_controlleur.php';
    #$pro_c->enroled($_SESSION['matricule']);
 ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<title><?=$sitetitle?></title>
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

<!--Side menu and right menu -->

<!-- main content -->
<div class="container mt-5" >
<section class="content profile-page ajuste" style="margin: 70px 15px 15px 0;">
    <div class="container-fluid">
        <div class="block-header">
            <h2>Profile Etudiant</h2>
        </div>        
        <div class="row clearfix">
            <div class="col-lg-4 col-md-12 col-sm-12">
                <div class=" card">
                    <img src="<?=$pro_c->infos($_SESSION['matricule'])->photo #displaying photo?>" class="img-fluid" alt="">                                
                </div>
                <div class="">
                    <div class="alert  <?=$pro_c->sess_state()==0?"alert-warning ":"alert-success" #verify whether the student has enroled or not?> alert-dismissible" role="alert">
                        <?=$pro_c->sess_state()==1?"Enrolements en cours":"Aucun enrolement en cours" #verify whether the session is ongoing or not?>
                        <br>
                    </div>
                    <hr>
                    <div class="alert alert-info">
                        Votre code d'enrolement est : <strong> <?=$pro_c->code($_SESSION['matricule'])==""?"Aucun pour l'instant":$pro_c->code($_SESSION['matricule'])?></strong>
                    </div>
                    <div class="alert  <?=$pro_c->enroled($_SESSION['matricule'])==0?"alert-warning ":"alert-success" #verify whether the student has enroled or not?> alert-dismissible" role="alert">
                        <?=$pro_c->enroled($_SESSION['matricule'])==0?"Vous ne vous êtes pas encore fait enrolé(e).<br>Veillez confirmer votre participation aux examens au près de votre secretaire facultaire.":"Vous vous êtes déjà fait enrolé pour la récente periode des examens." #verify whether the student has enroled or not?>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-md-12 col-sm-12">
                <div class="card">
                    <div class="body"> 
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#report">Identité</a></li>
                        </ul>
                        
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane in active" id="report">
                                <div class="body">
                                    <strong>identité</strong>
                                    <p><?=strtoupper($pro_c->infos($_SESSION['matricule'])->nom." ".$pro_c->infos($_SESSION['matricule'])->postnom)." ". ucfirst(strtolower($pro_c->infos($_SESSION['matricule'])->prenom  ))
                                    ?></p>
                                    <strong>Department/Option</strong>
                                    <p><?=$pro_c->infos($_SESSION['matricule'])->departement." / ".$pro_c->infos($_SESSION['matricule'])->option?></p>
                                    <strong>Matricule</strong>
                                    <p><?=$pro_c->infos($_SESSION['matricule'])->matricule ?></p>
                                    <strong>Téléphone</strong>
                                    <p><?=$pro_c->infos($_SESSION['matricule'])->telephone  ?></p>
                                    <hr>
                                    <div class="text-center">
                                        <form method="post">
                                            <button name="subscribe" class="btn btn-raised waves-effect g-bg-blush2" 
                                            <?=$pro_c->sess_state()==1?"":"disabled" ?> 
                                            <?=$pro_c->enroled($_SESSION['matricule'])==0?"":"disabled" ?>>SOUSCRIRE</button>

                                            <button name="logout" class="btn btn-raised waves-effect">SORTIE</button>
                                            
                                            <button name="presence" class="btn btn-raised waves-effect"
                                            <?=$pro_c->enroled($_SESSION['matricule'])==0?"disabled ":"" ?> 
                                            <?=$pro_c->sess_state()==1?"":"disabled" ?>>VOIR MES PRESENCE</button>
                                        </form>
                            
                                     </div>
                                </div>
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

<div class="color-bg"></div>
<!-- Jquery Core Js --> 
<script src="assets/bundles/libscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js -->
<script src="assets/bundles/vendorscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js -->
<script src="assets/bundles/morphingsearchscripts.bundle.js"></script> <!-- Main top morphing search --> 

<script src="assets/bundles/mainscripts.bundle.js"></script><!-- Custom Js --> 



</body>
</html>