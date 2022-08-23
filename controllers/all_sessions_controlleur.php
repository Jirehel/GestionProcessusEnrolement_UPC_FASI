<?php 
	include './modeles/all_sessions_modele.php';
	if ($_GET['p']=='all_sessions') {
	    if(!isset($_SESSION['email'])){
	        header('location:index.php?p=home');
	    }
	}
	if (isset($_POST['logout'])) {
        session_destroy();
        header('location:index.php?p=home');
    }
	class badge_controlleur
	{
		
		function __construct(){}

		public function liste_sessions()
		{
			$badge_m=new badge_modele();
			return $badge_m->liste_souscriptions();
		}
	}
 ?>