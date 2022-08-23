<?php 
	include './modeles/profile_modele.php';
	$pro_c=new profile_controlleur();

    if ($_GET['p']=='students-profile') {
        if(!isset($_SESSION['matricule'])){
            header('location:index.php?p=home');
        }
    }

    if (isset($_POST['logout'])) {
        header('location:index.php?p=home');
        session_destroy();

    }

    if (isset($_POST['subscribe'])) {
        $pro_c->subscribe($pro_c->infos($_SESSION['matricule'])->id);
    }
    
    if (isset($_POST['presence'])) {
    	$pro_c->view_presence($pro_c->infos($_SESSION['matricule'])->id);
    }

    #class
	class profile_controlleur
	{
		public function __construct(){}

		public function infos($matricule)
		{
			$pro_m=new profile_modele();
			$matricule=sanitize($matricule);
			return $pro_m->get_student_Infos($matricule);
		}
		
		public function subscribe($id){
			$pro_m=new profile_modele();
			$pro_m->subs($id,$pro_m->max_id(),$pro_m->max_sessid());
		}

		public function sess_state($value='')
		{
			$pro_m=new profile_modele();
			return $pro_m->session_state($pro_m->max_sessid());
		}

		public function enroled($matricule)
		{
			$pro_m=new profile_modele();
			return $pro_m->hasEnroled($matricule,$pro_m->max_id());
		}

		public function code($matricule)
		{
			$pro_m=new profile_modele();
			return $pro_m->getcode($matricule,$pro_m->max_sessid());
		}

		public function view_presence($student_id)
		{
			$pro_m=new profile_modele();
			header("location:index.php?p=fiche_enrolement&student=".$student_id."&pid=".$pro_m->max_sessid());
		}
	}
 ?>