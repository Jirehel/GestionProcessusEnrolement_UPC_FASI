<?php 

	/**
	* 
	*/
	class fiche_modele
	{
		
		function __construct(){}
		public function infos($id)
		{
			$dao=new Dbaccess();
			$dba=$dao->accessDB();
			$sql = "SELECT session_enrollement.periode, session_enrollement.annee, promotion.denomination 
					FROM session_enrollement, promotion,liste_enrollement 
					WHERE liste_enrollement.session_enrollement=session_enrollement.id_session
					AND liste_enrollement.promotion=promotion.id_promotion
					AND liste_enrollement.id_liste=:id";
		    $q = $dba->prepare($sql);
		    $q->execute([
		        'id' => $id,
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

		public function getEnroled($id)
		{
			$dao=new Dbaccess();
			$dba=$dao->accessDB();

			$sql = "SELECT student.id, student.nom, student.postnom, student.prenom
				FROM student, enrolled_students
				WHERE enrolled_students.etudiant=student.id
				AND enrolled_students.liste_enrollement=:id ORDER BY student.nom ASC";
		    $q = $dba->prepare($sql);
		    $q->execute([
		        'id' => $id,
		    ]);
	        return $q->fetchAll();
		}

	}
 ?>