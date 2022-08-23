<?php 
	class view_student_profile_modele
	{
		
		function __construct(){}

		public function get_mtr_infos($matricule)
		{
			$dao=new Dbaccess();
			$dba=$dao->accessDB();

			$sql = "SELECT * FROM student WHERE matricule=:matricule";
		    $q = $dba->prepare($sql);
		    $q->execute([
		        'matricule' => $matricule,
		    ]);
	        return $q->fetch(PDO::FETCH_OBJ);
		}
		public function get_promo($id_promo)
		{
			$dao=new Dbaccess();
			$dba=$dao->accessDB();

			$sql = "SELECT denomination FROM promotion WHERE id_promotion=:id";
		    $q = $dba->prepare($sql);
		    $q->execute([
		        'id' => $id_promo,
		    ]);
	        return $q->fetch(PDO::FETCH_OBJ);
		}
	}
 ?>