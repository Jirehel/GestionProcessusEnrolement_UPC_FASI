<?php 
	include './modeles/view_student_profile_modele.php';
	class view_student_profile_controlleur
	{
		function __construct(){}

		public function infos($matricule)
		{
			$vspm=new view_student_profile_modele();
			$matricule=sanitize($matricule);
			return $student=$vspm->get_mtr_infos($matricule);
		}
		public function promotion($id_promo)
		{
			$vspm=new view_student_profile_modele();
			return $vspm->get_promo($id_promo)->denomination;
		}
	}
 ?>