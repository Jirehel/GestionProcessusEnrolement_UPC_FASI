<?php 
	include './modeles/admin_modele.php';
	if ($_GET['p']=='admin-home') {
        if(!isset($_SESSION['email'])){
            header('location:index.php?p=home');
        }
    }
    if(isset($_POST['l_souscription'])){
        header('location:index.php?p=all_listes_souscrption');
    }
    if (isset($_POST['l_enrolement'])) {
       header('location:index.php?p=all_sessions');
    }
    if(isset($_POST['newssession'])){
        header('location:index.php?p=enrolement');
    }
    if (isset($_POST['logout'])) {
        session_destroy();
        header('location:index.php?p=home');
    }
    $adm_c=new admin_controlleur();
    $_SESSION['nom']=$adm_c->admin_infos($_SESSION['email'])->nom;
    $_SESSION['prenom']=$adm_c->admin_infos($_SESSION['email'])->prenom;
    $_SESSION['avatar']=$adm_c->admin_infos($_SESSION['email'])->avatar;

	class admin_controlleur
	{
		function __construct(){}

		public function admin_infos($email)
		{
			$adm_m=new admin_modele();
			$email=sanitize($email);
			return $p_manager_infos=$adm_m->get_pm_Infos($email);
		}

		public function countSubscribed()
		{
			$adm_m=new admin_modele();
			return $adm_m->count_subscribed_students($adm_m->max_sessid())->fetchColumn();
		}

		public function countEnroled()
		{
			$adm_m=new admin_modele();
			return $adm_m->count_enroled_students($adm_m->max_sessid())->fetchColumn();
		}
		
		public function countLastSessionEnroled()
		{
			return $adm_m->count_enroled_students($adm_m->max_sessid()-1)->fetchColumn();
		}

		public function countTotalStudentsNumber()
		{
			$adm_m=new admin_modele();
			return $adm_m->count_students()->fetchColumn();
		}

		public function countTotalEarnings($value='')
		{

		}
		public function max_sessid()
		{
			$adm_m=new admin_modele();
			return $adm_m->max_sessid();
		}
		public function calpercents($navail, $ntotal)
		{
			return ($navail*100)/$ntotal;
		}
	}
 ?>