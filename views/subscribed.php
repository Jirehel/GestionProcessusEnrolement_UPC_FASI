<?php 
    /**
    * HERE IS THE WIEW MODULE FOR ADVENCED PHP BUSINESS 
    * LOGIC, CFR THE MODULE/CLASS INCLUDES ABOVE    
    */
    include './controllers/subscribed_controlleur.php';
    $sub_c="";
    $searchvalue="";
    if ($_GET['p']=='subscribed') {
        if(!isset($_SESSION['email'])){
            header('location:index.php?p=home');
        }
    }
    if (isset($_GET['subscribesliste']) && is_numeric($_GET['subscribesliste']) && !empty($_GET['subscribesliste'])) {
        #$liste_id=(int)sanitize($_GET['subscribesliste']);# get session liste id and saninitize
        $sub_c=new subscribed_controlleur();
    }else{
        #if no numeric and valid id given in the GET request, redirect 
        header("location:index.php?p=all_listes_souscrption");
    }

    if (isset($_POST['btnsearch'])) {
        #student search by code
        extract($_POST);
        $searchvalue=sanitize($searchvalue);
        $sub_c->search($searchvalue,$_GET['subscribesliste']);
    }
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
        <link rel="stylesheet" href="assets/css/custom.css">
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
            <p>Veillez patienter</p>
        </div>
    </div>
    <!-- #END# Page Loader --> 

    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars --> 

    <!-- Morphing Search  -->
    <div id="morphsearch" class="morphsearch">
        <form class="morphsearch-form" method="POST">
            <div class="form-group m-0">
                <form method="POST">
                    <input name="searchvalue" value="" type="search" placeholder="Rechercher par code d'enrolement..." class="form-control morphsearch-input" />
                <button name="btnsearch" class="morphsearch-submit">Search</button>
                </form>
                
            </div>
        </form>
        <div class="morphsearch-content">
            <div class="column">
                <h2>Récemment </h2>
                <a class="media-object" href="#">
                    
                    <?php 
                        if ($sub_c->search($searchvalue, $_GET['subscribesliste'])->rowCount()>0) {
                            foreach ($sub_c->search($searchvalue, $_GET['subscribesliste'])->fetchAll() as $entry) {
                     ?>
                     <img style="height: 50px; width: 50px" class="rounded-circle" src="<?=$entry[10] ?>" alt=""/>
                    <h3><?=ucfirst(strtolower($entry[0]))." ".ucfirst(strtolower($entry[1])) ?></h3>
                    <?php 
                            }
                        }else{

                        }
                     ?>
                </a>
            </div>
        </div>
        <!-- /morphsearch-content --> 
        <span class="morphsearch-close"></span>
    </div>
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
        <?php 
            if ($sub_c->search($searchvalue, $_GET['subscribesliste'])->rowCount()>0) {
                            foreach ($sub_c->search($searchvalue, $_GET['subscribesliste'])->fetchAll() as $entry) {
                     ?>
                                
        <!--Displaying all subscribed sutdents where the subscription.state =0-->
        <div class="container-fluid">
            <div class="block-header">
                <h2>RECHERCHE</h2>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="row body">
                            <?php 
                                foreach ($sub_c->search($searchvalue, $_GET['subscribesliste']) as $entry) {
                             ?>
                             <div class="col-lg-1 col-md-1 col-sm-1">
                                 <img style="height: 50px; width: 50px; border: solid #e5798d 3px;" class="rounded-circle materialboxed" src="<?=$entry[10] ?>" alt=""/>
                             </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <a href="<?=$sub_c->subscription_state($entry[4],$entry[6])==0?"":"index.php?p=fiche_enrolement&student=".$entry[4] ."&pid=".$_GET['subscribesliste']?>" data-placement="bottom" title="" class="list-group-item">
                                    <?=strtoupper($entry[0])." ".strtoupper($entry[1])." ".ucfirst($entry[2]) ?></a>
                            </div>

                            <div class="col-lg-2 col-md-2 col-sm-2">
                                <a data-placement="bottom" title="" class="list-group-item"><?=$sub_c->promotion($entry[3])->denomination ?></a>
                            </div>

                            <div class="col-lg-2 col-md-2 col-sm-2">
                                <form method="POST">
                                    <button name="validate" class="btn btn-raised waves-effect g-bg-blush2" type="submit" 
                                    <?=$sub_c->subscription_state($entry[4],$entry[6])==0?"":"disabled" ?> >VALIDER</button>
                                    <input type="hidden" name="nothing" value="<?=$entry[4] ?>">
                                </form>
                                
                            </div>
                            <?php 
                            }
                             ?>
                        </div>
                    </div> 
                </div>
            </div>
        </div>
                    <?php 
                            }
                        }else{

                        }
                     ?>
        <div class="container-fluid">
            <div class="block-header">
                <h2 id="non-validated">SOUSCRISPTION (DEMANDE D'ENROLEMENT)</h2>
            </div>
        </div>
        <!--Displaying all subscribed sutdents where the subscription.state =0-->
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="row body">
                            <?php 
                                foreach ($sub_c->ayant_souscris($_GET['subscribesliste']) as $entry) {
                             ?>
                             <div class="col-lg-1 col-md-1 col-sm-1">
                                 <img style="height: 50px; width: 50px; border: solid #e5798d 3px;" class="rounded-circle materialboxed" src="<?=$entry[10] ?>" alt=""/>
                             </div>
                            <div class="col-lg-7 col-md-7 col-sm-7">
                                <a href="#" data-placement="bottom" title="" class="list-group-item"><?=strtoupper($entry[0])." ".strtoupper($entry[1])." ".ucfirst($entry[2]) ?></a>
                            </div>

                            <div class="col-lg-2 col-md-2 col-sm-2">
                                <a data-placement="bottom" title="" class="list-group-item"><?=$sub_c->promotion($entry[3])->denomination ?></a>
                            </div>

                            <div class="col-lg-2 col-md-2 col-sm-2">
                                <form method="POST">
                                    <button name="validate" class="btn btn-raised waves-effect g-bg-blush2" type="submit" 
                                    <?=$sub_c->subscription_state($entry[4],$entry[6])==0?"":"disabled" ?> >VALIDER</button>
                                    <input type="hidden" name="nothing" value="<?=$entry[4] ?>">
                                </form>
                                
                            </div>
                            <?php 
                            }
                             ?>
                        </div>
                    </div> 
                </div>
            </div>
        </div>
    <!--Displaying all subscribed sutdents where the subscription.state =1-->
    <div class="container-fluid">
        <div class="block-header">
            <h2 id="validated">SOUSCRIPTIONS VALIDES</h2>
        </div>
        </div>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="row body">
                            <!--Displaying all subscribed sutdents-->
                            <?php 
                                foreach ($sub_c->ayant_souscris2($_GET['subscribesliste']) as $entry) {
                             ?>
                             <div class="col-lg-1 col-md-1 col-sm-1">
                                 <img style="height: 50px; width: 50px; border: solid #e5798d 3px;" class="rounded-circle materialboxed" src="<?=$entry[10] ?>" alt=""/>
                             </div>
                            <div class="col-lg-7 col-md-7 col-sm-7">
                                <a href="<?="index.php?p=fiche_enrolement&student=".$entry[4]."&pid=".$_GET['subscribesliste'] ?>" data-placement="bottom" title="" class="list-group-item"><?=strtoupper($entry[0])." ".strtoupper($entry[1])." ".ucfirst($entry[2]) ?></a>
                            </div>

                            <div class="col-lg-2 col-md-2 col-sm-2">
                                <a data-placement="bottom" title="" class="list-group-item"><?=$sub_c->promotion($entry[3])->denomination ?></a>
                            </div>

                            <div class="col-lg-2 col-md-2 col-sm-2">
                                <form method="POST">
                                    <button name="validate" class="btn btn-raised waves-effect g-bg-blush2" type="submit" 
                                    <?=$sub_c->subscription_state($entry[4],$entry[6])==0?"":"disabled" ?> >VALIDER</button>
                                    <input type="hidden" name="nothing" value="<?=$entry[4] ?>">
                                </form>
                                
                            </div>
                            <?php 
                            }
                             ?>
                        </div>
                    </div> 
                </div>
            </div>
        </div>

    </section>
    <!-- main content -->

    <div class="col or-bg"></div>
    <!-- Jquery Core Js --> 
    <script type="text/javascript" src="./assets/js/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="./assets/js/materialize.js"></script>
    <script src="assets/bundles/libscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js -->
    <script src="assets/bundles/vendorscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js -->
    <script src="assets/bundles/morphingsearchscripts.bundle.js"></script> <!-- Main top morphing search --> 

    <script src="assets/bundles/mainscripts.bundle.js"></script><!-- Custom Js -->
    </body>
</html>