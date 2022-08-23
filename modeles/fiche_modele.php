<?php 

	/**
	* 
	*/
	class fiche_modele
	{
		
		function __construct(){}
		public function infos($id, $pid)
		{
			$dao=new Dbaccess();
			$dba=$dao->accessDB();

			$sql = "SELECT student.matricule, student.nom, student.postnom, student.prenom, student.photo , student.promotion, subscribed_students.*, session_enrollement.*
				FROM student, subscribed_students, session_enrollement
				WHERE subscribed_students.etudiants=:id
				AND session_enrollement.id_session=:pid
				AND subscribed_students.sousc_liste=:pid
				AND student.id=subscribed_students.etudiants";
		    $q = $dba->prepare($sql);
		    $q->execute([
		        'id' => $id,
		        'pid'=>$pid,
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

		public function getpresence($id, $pid)
		{
			$dao=new Dbaccess();
			$dba=$dao->accessDB();

			$sql = "SELECT presence.date, presence.cours, presence.etat 
					FROM presence 
					WHERE presence.etudiant =:id
					AND presence.`session`=:pid
					ORDER BY presence.id_presence ASC ";
		    $q = $dba->prepare($sql);
		    $q->execute([
		        'id' => $id,
		        'pid'=>$pid,
		    ]);
	        return $q->fetchAll();
		}

	}
 ?>