<?php 
	include './modeles/all_listes_souscrption_modele.php';
	if ($_GET['p']=='all_listes_souscrption') {
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

		public function liste_souscriptions()
		{
			$badge_m=new badge_modele();
			return $badge_m->liste_souscriptions();
		}
	}
 ?>