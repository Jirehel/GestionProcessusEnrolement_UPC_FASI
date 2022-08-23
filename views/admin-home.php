<?php
include './controllers/admin_controlleur.php'; 
 ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<title><?=$sitetitle?></title>
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
        <p>Veillez patienter...</p>
    </div>
</div>
<!-- #END# Page Loader --> 
<!-- Top Bar -->
<nav class="navbar clearHeader">
    <div class="col-12">
        <div class="navbar-header"> 
            <a href="javascript:void(0);" class="bars"></a> 
            <a class="navbar-brand" href=""><?=$University?></a>
        </div>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="javascript:void(0);" class="js-right-sidebar" data-close="true"><i class="zmdi zmdi-settings"></i></a></li>
        </ul>
    </div>
</nav>
<!-- #Top Bar -->

<!--Side menu and right menu -->
<section> 
    <!-- Left Sidebar -->
    <aside id="leftsidebar" class="sidebar"> 
        <!-- User Info -->
        <div class="user-info">
            <div class="admin-image"> 
                <img style="height: 80px; width: 80px" src="<?=$_SESSION['avatar'] ?>" alt="" class="materialboxed"> 
            </div>
            <div class="admin-action-info"> <span>Identité de la connexion</span>
                <h3><?=strtoupper( $_SESSION['nom'])." ".ucfirst( $_SESSION['prenom']) ?></h3>
                <ul>
                    <li><a data-placement="bottom" title="Go to Inbox" href=""><i class="zmdi zmdi-email"></i></a></li>                    
                    <li><a href="javascript:void(0);" class="js-right-sidebar" data-close="true"><i class="zmdi zmdi-settings"></i></a></li>    
                </ul>
            </div>
        </div>
        <!-- #User Info -->  
        <!-- Menu -->
        <div class="menu">
            <ul class="list">
                <li class="header">NAVIGATION</li>
                <li class="active open"><a href="index.php?p=admin-home"><i class="zmdi zmdi-home"></i><span>Dashboard</span></a></li>
                <li><a href="index.php?p=events"><i class="zmdi zmdi-calendar-check"></i><span>Evennements</span> </a></li>               
                <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-accounts-outline"></i><span>Students</span> </a>
                    <ul class="ml-menu">
                        <li><a href="javascript:void(0);">All Students</a></li>
                        <li><a href="javascript:void(0);">Students Profile</a></li>
                    </ul>
                </li>
                <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-city-alt"></i><span>Departments</span> </a>
                    <ul class="ml-menu">
                        <li><a href="javascript:void(0);">All Departments</a></li>
                    </ul>
                </li>
                <li class="header">LABELS</li>
                <li><a href="javascript:void(0);"><i class="zmdi zmdi-chart-donut col-red"></i><span>Important</span></a></li>
                <li><a href="javascript:void(0);"><i class="zmdi zmdi-chart-donut col-amber"></i><span>Warning</span></a></li>
                <li><a href="javascript:void(0);"><i class="zmdi zmdi-chart-donut col-blue"></i><span>Information</span></a></li>
                <hr>
            </ul>
        </div>
        <!-- #Menu -->
    </aside>
    <!-- #END# Left Sidebar --> 
    <!-- Right Sidebar -->
    <aside id="rightsidebar" class="right-sidebar">
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane tab-pane in active in active" id="settings">
                <div class="demo-settings">
                    <p>CONFIGURATIONS</p>
                    <ul class="setting-list">
                        <li>
                            <span>Report Panel Usage</span>
                            <div class="switch">
                                <label><input type="checkbox" checked><span class="lever"></span></label>
                            </div>
                        </li>
                        <li>
                            <span>Email Redirect</span>
                            <div class="switch">
                                <label><input type="checkbox"><span class="lever"></span></label>
                            </div>
                        </li>
                    </ul>
                    <p>PARAMETRE SYSTEME</p>
                    <ul class="setting-list">
                        <li>
                            <span>Notifications</span>
                            <div class="switch">
                                <label><input type="checkbox" checked><span class="lever"></span></label>
                            </div>
                        </li>
                        <li>
                            <span>Auto Updates</span>
                            <div class="switch">
                                <label><input type="checkbox" checked><span class="lever"></span></label>
                            </div>
                        </li>
                    </ul>
                    <p>GESTION DU COMPTE</p>
                    <ul class="setting-list">
                        <li>
                            <span>Offline</span>
                            <div class="switch">
                                <label><input type="checkbox"><span class="lever"></span></label>
                            </div>
                        </li>
                        <li>
                            <span>Location Permission</span>
                            <div class="switch">
                                <label><input type="checkbox" checked><span class="lever"></span></label>
                            </div>
                        </li>
                    </ul>
                    <div class="container-fluid form-line">
                        <h1></h1>
                            <form method="POST">
                                <center><button name="logout" class="btn btn-raised waves-effect g-bg-blush2">
                                    DECONNEXION </button></center>
                            </form>
                        </div>
                </div>
            </div>
        </div>
    </aside>
    <!-- #END# Right Sidebar --> 
</section>
<!--Side menu and right menu -->

<!-- main content -->
<section class="content home">
    <div class="container-fluid">
        <div class="block-header">
            <div class="d-sm-flex justify-content-between">
                <div>
                    <h2>Dashboard</h2>
                    <small class="text-muted">Bienvenu dans :: <?=$University." - Enrol" ?></small>
                </div>
                <div>
                    <form method="POST">
                    <button name="l_souscription" class="btn btn-raised btn-defualt">SOUSCRIPTION</button>
                    <button name="l_enrolement" class="btn btn-raised waves-effect g-bg-blush2">LISTE ENROLEMENT</button>
                    <button name="newssession" class="btn btn-raised btn-primary">SESSIONS</button>
                    <h4></h4>
                    </form>
                </div>
            </div>
            <div>
                <hr>
                <h2>Observations sur la récente session</h2>
            </div>
        </div>
        
        <div class="row clearfix top-report row-deck">
            <div class="col-lg-3 col-sm-6 col-md-6">
                <div class="card">
                    <div class="body">
                        <h1><?=$adm_c->countTotalStudentsNumber() ?></h1>
                        <p class="text-muted">Effectif total d'etudiants de toutes les promotions confondues</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-md-6">
                <div class="card">
                    <div class="body">
                        <h3><?=$adm_c->countSubscribed()."/ soit ".ceil($adm_c->calpercents($adm_c->countSubscribed(),$adm_c->countTotalStudentsNumber() ))."%" ?></h3>
                        <p class="text-muted">Nombre total de souscription</p>
                        <div class="progressbar-xs progress-rounded progress-striped progress ng-isolate-scope">
                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="68" aria-valuemin="0" aria-valuemax="100" style="width: 68%;"></div>
                        </div>
                        <span class="text-small">
                            <a href="<?="http://localhost/project/index.php?p=subscribed&subscribesliste=".$adm_c->max_sessid()."#non-validated" ?>">voir</a></span> 
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-md-6">
                <div class="card">
                    <div class="body">
                        <h3><?=$adm_c->countEnroled()."/ soit ".ceil($adm_c->calpercents($adm_c->countEnroled(),$adm_c->countTotalStudentsNumber() ))."%" ?></h3>
                        <p class="text-muted">Nombre total des enrolé(e)s</p>
                        <div class="progressbar-xs progress-rounded progress-striped progress ng-isolate-scope">
                            <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="68" aria-valuemin="0" aria-valuemax="100" style="width: 68%;"></div>
                        </div>
                        <span class="text-small"><a href="<?="http://localhost/project/index.php?p=subscribed&subscribesliste=".$adm_c->max_sessid()."#validated" ?>">voir</a></span> </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-md-6">
                <div class="card">
                    <div class="body">
                        <h3>$ <?=$adm_c->countEnroled()*10 ?></h3>
                        <p class="text-muted">Le gain total</p>
                        <div class="progressbar-xs progress-rounded progress-striped progress ng-isolate-scope">
                            <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="68" aria-valuemin="0" aria-valuemax="100" style="width: 68%;"></div>
                        </div></div>
                </div>
            </div>            
        </div>        
        <hr>        
        <div class="row clearfix">
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="card">
                    <div class="header">
                        <h2>Les gains de la faculté</h2>
                        <ul class="header-dropdown">
                            <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="zmdi zmdi-more-vert"></i></a>
                                <ul class="dropdown-menu pull-right">
                                    <li><a href="javascript:void(0);">Action</a></li>
                                    <li><a href="javascript:void(0);">Another action</a></li>
                                    <li><a href="javascript:void(0);">Something else here</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="body">
                        <canvas id="line_chart" height="150"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="card">
                    <div class="header">
                        <h2>OBSERVATIONS SUR LES REUSSITES</h2>
                        <ul class="header-dropdown">
                            <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="zmdi zmdi-more-vert"></i> </a>
                                <ul class="dropdown-menu pull-right">
                                    <li><a href="javascript:void(0);">Action</a></li>
                                    <li><a href="javascript:void(0);">Another action</a></li>
                                    <li><a href="javascript:void(0);">Something else here</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="body">
                        <canvas id="bar_chart" height="150"></canvas>
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

<script src="assets/plugins/jquery-sparkline/jquery.sparkline.min.js"></script> <!-- Sparkline Plugin Js -->
<script src="assets/plugins/chartjs/Chart.bundle.min.js"></script> <!-- Chart Plugins Js --> 

<script src="assets/bundles/mainscripts.bundle.js"></script><!-- Custom Js --> 
<script src="assets/js/pages/charts/sparkline.min.js"></script> 
<script src="assets/js/pages/index.js"></script>
</body>
</html>