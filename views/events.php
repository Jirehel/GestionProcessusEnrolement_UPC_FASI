<?php 

    if(!isset($_SESSION['email'])){
            header('location:index.php?p=home');
        }
 ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<title>:: Swift - University Admin ::</title>
<link rel="icon" href="favicon.ico" type="image/x-icon">
<!-- Favicon-->
<link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css" />
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="assets/plugins/fullcalendar/fullcalendar.min.css">
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
<section class="content page-calendar">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-3 col-lg-4 col-md-12">
                <div class="card">
                    <div class="body">
                        <button type="button" class="btn btn-raised btn-primary btn-block m-t-0" data-toggle="modal" href="#cal-new-event"> <i class="zmdi zmdi-plus"></i> Evennement</button>
                        <div class="">
                            <div class="event-name b-greensea"> The Custom Event #1 <a class=" text-muted event-remove"><i class="zmdi zmdi-delete"></i></a> </div>
                            <div class="event-name b-lightred"> The Custom Event #2 <a class=" text-muted event-remove"><i class="zmdi zmdi-delete"></i></a> </div>
                            <div class="event-name b-amethyst"> The Custom Event #3 <a class=" text-muted event-remove"><i class="zmdi zmdi-delete"></i></a> </div>
                            <div class="event-name b-amethyst"> The Custom Event #4 <a class=" text-muted event-remove"><i class="zmdi zmdi-delete"></i></a> </div>
                            <div class="event-name b-success"> The Custom Event #5 <a class=" text-muted event-remove"><i class="zmdi zmdi-delete"></i></a> </div>
                            <div class="event-name b-lightred"> The Custom Event #6 <a class=" text-muted event-remove"><i class="zmdi zmdi-delete"></i></a> </div>
                            <div class="event-name b-greensea"> The Custom Event #7 <a class=" text-muted event-remove"><i class="zmdi zmdi-delete"></i></a> </div>
                            <div class="event-name b-success"> The Custom Event #8 <a class=" text-muted event-remove"><i class="zmdi zmdi-delete"></i></a> </div>
                            <div class="event-name b-success"> The Custom Event #9 <a class=" text-muted event-remove"><i class="zmdi zmdi-delete"></i></a> </div>
                            <div class="event-name b-primary"> The Custom Event #10 <a class=" text-muted event-remove"><i class="zmdi zmdi-delete"></i></a> </div>                
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-9 col-lg-8 col-md-12">
                <div class="card">
                    <div class="body">
                        <div class="row">
                            <div class="col-lg-4 col-md-5 col-sm-12">
                                <h4 class="custom-font text-default m-0">Events Schedule</h4>
                            </div>
                            <div class="col-lg-8 col-md-7 col-sm-12 text-right">
                                <button class="btn btn-raised btn-success btn-sm" id="change-view-today">today</button>
                                <button class="btn btn-raised btn-default btn-sm" id="change-view-day" >Day</button>
                                <button class="btn btn-raised btn-default btn-sm" id="change-view-week">Week</button>
                                <button class="btn btn-raised btn-default btn-sm" id="change-view-month">Month</button>
                            </div>
                        </div>
                        <div class="tcol">                       
                            <div id="calendar"></div>                       
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- main content -->

<div class="col or-bg"></div>
<!-- Jquery Core Js --> 
<script src="assets/bundles/libscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js -->
<script src="assets/bundles/vendorscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js -->
<script src="assets/bundles/morphingsearchscripts.bundle.js"></script> <!-- Main top morphing search --> 

<script src="assets/bundles/fullcalendarscripts.bundle.js"></script><!--/ calender javascripts --> 

<script src="assets/bundles/mainscripts.bundle.js"></script><!-- Custom Js --> 
<script src="assets/js/pages/calendar/calendar.js"></script>
</body>
</html>