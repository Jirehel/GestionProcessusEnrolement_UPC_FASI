<?php 
    include './controllers/enrolement_controlleur.php';
    $en_c=new enrolement_controlleur();
    if (isset($_POST['create'])) {
        $en_c->insertion($_POST['periode'],$_POST['annee']);
    }
    if (isset($_POST['close_enrol'])) {
        $en_c->end_session();
    }

 ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<title><?=$sitetitle ?></title>
<link rel="icon" href="favicon.ico" type="image/x-icon">
<link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css" />
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<!-- Custom Css -->
<link rel="stylesheet" href="assets/css/main.css">

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
        <p>Viellez patienter...</p>
    </div>
</div>


<!-- Top Bar -->
<nav class="navbar clearHeader">
    <div class="col-12">
        <div class="navbar-header"> <a class="navbar-brand" href="index.php?p=admin-home"><?=$University ?></a> </div>
    </div>
</nav>
<!-- #Top Bar -->

<!--Side menu and right menu -->
<section> 
    <!-- Left Sidebar -->
    <aside id="leftsidebar" class="sidebar"> 
        <!-- User Info -->
        <div class="user-info">
            <div class="admin-image"> <img src="<?=$_SESSION['avatar'] ?>" alt=""> </div>
            <div class="admin-action-info"> <span>Bienvenu</span>
                <h3><?=strtoupper( $_SESSION['nom'])." ".ucfirst( $_SESSION['prenom']) ?></h3>
                <ul>
                    <li><a data-placement="bottom" title="Go to Inbox" href=""><i class="zmdi zmdi-email"></i></a></li>
                    <li><a data-placement="bottom" title="Go to Profile" href=""><i class="zmdi zmdi-account"></i></a></li>                    
                    <li><a href="javascript:void(0);" class="js-right-sidebar" data-close="true"><i class="zmdi zmdi-settings"></i></a></li>    
                </ul>
            </div>
        </div>
        <!-- #User Info --> 
        <!-- Menu -->
        <div class="menu">
            <ul class="list">
                <li class="header">NAVIGATION</li>
                <li><a href="index.php?p=admin-home"><i class="zmdi zmdi-home"></i><span>Dashboard</span></a></li>
                <li class="header">LABELS</li>
                <li><a href="javascript:void(0);"><i class="zmdi zmdi-chart-donut col-red"></i><span>Important</span></a></li>
                <li><a href="javascript:void(0);"><i class="zmdi zmdi-chart-donut col-amber"></i><span>Warning</span></a></li>
                <li><a href="javascript:void(0);"><i class="zmdi zmdi-chart-donut col-blue"></i><span>Information</span></a></li>
            </ul>
        </div>
        <!-- #Menu -->
    </aside>
    <!-- #END# Left Sidebar --> 

</section>
<!--Side menu and right menu -->

<!-- main content -->
<section class="content">
    <div class="container-fluid">
         <div class="block-header">
            <h2>LISTE DES SESSIONS</h2>
        </div>
            <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="row body">
                    <?php 
                    foreach ($en_c->sessions_list() as $entry) {
                     ?>
                        <div class="col-lg-10 col-md-10 col-sm-10">
                            <a href="" data-placement="bottom" title="<?=$entry[3]==1?"Encours":"Cloturée" ?>" class="list-group-item"><?=strtoupper($entry[1])." ".$entry[2]?></a>
                        </div>

                        <div class="col-lg-2 col-md-2 col-sm-2">
                            <form method="POST">
                                <button name="close_enrol" class="btn btn-raised btn-primary waves-effect" type="submit" <?=$entry[3]==1?"":"disabled" ?>> <?=$entry[3]==1?"CLOTURER":"CLOTUREE" ?></button>
                            </form>
                            
                        </div>
                        <?php 
                            }
                         ?>
                    </div>
                    <div class="container-fluid">
                        <ul class="pagination pagination-lg con">
                        
                            <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">Next</a></li>
                        </ul>
                     </div>
                </div> 
            </div>
        </div>
    </div>
    </div>
</section>
<!-- main content -->

<div class="color-bg"></div>
<!-- Jquery Core Js --> 
<script src="assets/bundles/libscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js -->
<script src="assets/bundles/vendorscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js -->
<script src="assets/bundles/morphingsearchscripts.bundle.js"></script> <!-- Main top morphing search --> 

<script src="assets/plugins/jquery-validation/jquery.validate.js"></script> <!-- Jquery Validation Plugin Css --> 
<script src="assets/plugins/jquery-steps/jquery.steps.js"></script> <!-- JQuery Steps Plugin Js --> 

<script src="assets/bundles/mainscripts.bundle.js"></script><!-- Custom Js --> 
<script src="assets/js/pages/forms/form-validation.js"></script> 
</body>
</html>