<?php 
	/**
	* 
	*/
	if(!isset($_SESSION['email'])){
            header('location:index.php?p=home');
        }
	include './modeles/enr_modele.php';
	class fiche_controlleur
	{
		
		function __construct(){}

		public function fiche_infos($id)
		{
			$fic_m=new fiche_modele();		
			return $fic_m->infos($id);
		}

		public function enroled($id)
		{
			$fic_m=new fiche_modele();
			return $fic_m->getEnroled($id);
		}

		public function promotion($id)
		{
			$fic_m=new fiche_modele();
			return $fic_m->get_promo($id)->denomination;
		}
	}

	

 ?>