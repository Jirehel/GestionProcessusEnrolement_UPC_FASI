<?php 
    include './controllers/view_student_profile_controlleur.php';
    if (isset($_GET['stu_matr'])) {
        $_SESSION['atricule']=$_GET['stu_matr'];
        $wspc=new view_student_profile_controlleur();
    }
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
        <p>Veillez patienter...</p>
    </div>
</div>
<!-- #END# Page Loader --> 

<!-- Overlay For Sidebars -->
<div class="overlay"></div> 

<!--Side menu and right menu -->

<!-- main content -->
<section class="content profile-page">
    <div class="container-fluid">
        <div class="block-header">
            <h2>Observateur de l'etudiant</h2>
            <small class="text-muted">Bienvenu sur application enroll</small>
        </div>        
        <div class="row clearfix">
            <?php 
                if (isset($_GET['stu_matr'])) {
                   
             ?>
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class=" card" style="width: 150px; height: 150px; margin-left: 10%">
                    <img style="width: 100%; height: 100%; object-fit: cover;border-radius: 100%;" src="<?=$wspc->infos($_GET['stu_matr'])->photo ?>" class="img-fluid" alt="">                              
                </div>
                 <div class=" card" style="width: 150px; height: 150px; ">
                    <img style="width: 100%; height: 100%; object-fit: cover;" src="../qrgen/qrcodes/Qr616916032bf48.png" class="img-fluid" alt="">                              
                </div>
                <div class="card">
                    <div class="header">
                        <h2>Apropos de l'etudiant</h2>
                    </div>
                    <div class="body">
                        <strong>Name</strong>
                        <p><?=strtoupper($wspc->infos($_GET['stu_matr'])->nom)." ".strtoupper($wspc->infos($_GET['stu_matr'])->postnom)." ".ucfirst($wspc->infos($_GET['stu_matr'])->prenom) ?></p>
                        <hr>
                        <strong>Promotion</strong>
                        <p><?=$wspc->promotion($wspc->infos($_GET['stu_matr'])->promotion)  ?></p>
                        <strong>Department/Option</strong>
                        <p><?=ucfirst($wspc->infos($_GET['stu_matr'])->departement)." / ".ucfirst($wspc->infos($_GET['stu_matr'])->option)?></p>
                    </div>
                </div>
            </div>
            <?php 
        }
             ?>
        </div>
    </div>
</section>
<!-- main content -->

<div class="color-bg"></div>
<!-- Jquery Core Js --> 
<script src="assets/bundles/libscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js -->
<script src="assets/bundles/vendorscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js -->
<script src="assets/bundles/morphingsearchscripts.bundle.js"></script> <!-- Main top morphing search --> 

<script src="assets/bundles/mainscripts.bundle.js"></script><!-- Custom Js --> 



</body>
</html>