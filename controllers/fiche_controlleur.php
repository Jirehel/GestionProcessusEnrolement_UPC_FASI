<?php 
	/**
	* 
	*/
	include './modeles/fiche_modele.php';
	class fiche_controlleur
	{
		
		function __construct(){}

		public function fiche_infos($id, $pid)
		{
			$fic_m=new fiche_modele();
			return $fic_m->infos($id,$pid);
		}

		public function fiche_presence($id, $pid)
		{
			$fic_m=new fiche_modele();
			return $fic_m->getpresence($id,$pid);
		}

		public function promotion($id)
		{
			$fic_m=new fiche_modele();
			return $fic_m->get_promo($id)->denomination;
		}
	}

	

 ?>