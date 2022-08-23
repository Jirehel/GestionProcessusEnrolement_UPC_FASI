<?php
    $idd=0; 
    include './controllers/all_listes_souscrption_controlleur.php';
    $badg_c=new badge_controlleur();
 ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<title><?=$sitetitle  ?></title>
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
                        <li><a href="students.html">All Students</a></li>
                        <li><a href="add-students.html">Add Students</a></li>                       
                        <li><a href="students-profile.html">Students Profile</a></li>
                        <li><a href="students-invoice.html">Students Invoice</a></li>
                    </ul>
                </li>
                <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-city-alt"></i><span>Departments</span> </a>
                    <ul class="ml-menu">
                        <li><a href="departments.html">All Departments</a></li>
                        <li><a href="add-departments.html">Add Departments</a></li>
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
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>TOUTES LES PERIODES DE SOUSCRIPTIONS</h2>
        </div>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="body table-responsive">
                        <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                            <thead>
                                <tr>
                                    <th>Période</th>
                                    <th>Etat</th>
                                </tr>
                            </thead>                            
                            <tbody>
                            <?php 
                                foreach ($badg_c->liste_souscriptions() as $entry) {
                            ?>
                                <tr>
                                    <td >
                                        <a  href="<?="index.php?p=subscribed&subscribesliste=".$entry[2]  ?>" data-placement="bottom" title="<?=$entry[3]==1?"Encours":"Cloturée" ?>" ><?=$entry[0]."  ".$entry[1]." " ?></a></td>
                                    <td>
                                        <span class="badge <?=$entry[3]==0?"bg-orange":"bg-green" ?> p-2"><?=$entry[3]==0?" CLOTUREE ":"EN COURS" ?></span>
                                    </td>
                                </tr>
                                <?php 
                                }
                             ?>  
                            </tbody>
                        </table>
            </div>
            </div>
        </div>
</section>
<!-- main content -->

<div class="color- bg"></div>
<!-- Jquery Core Js --> 
<script src="assets/bundles/libscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js -->
<script src="assets/bundles/vendorscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js -->
<script src="assets/bundles/morphingsearchscripts.bundle.js"></script> <!-- Main top morphing search --> 

<script src="assets/bundles/mainscripts.bundle.js"></script><!-- Custom Js -->
</body>
</html>