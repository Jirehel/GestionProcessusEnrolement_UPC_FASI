<?php 
	include './modeles/all_listes_enrollement_modele.php';
	if ($_GET['p']=='all-listes-enrollement') {
	    if(!isset($_SESSION['email'])){
	        header('location:index.php?p=home');
	    }
	}
	if (isset($_POST['logout'])) {
        session_destroy();
        header('location:index.php?p=home');
    }
	class all_listes_enrollement_controlleur
	{
		
		function __construct(){}

		public function liste_enrollements($id)
		{
			$badge_m=new all_listes_enrollement();
			return $badge_m->liste_enr($id);
		}
		public function promotion($value)
		{
			$badge_m=new all_listes_enrollement();
			return $badge_m->get_promo($value)->denomination;
		}
	}
 ?>