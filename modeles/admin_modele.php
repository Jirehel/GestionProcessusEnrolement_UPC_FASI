<?php 
	/**
	* 
	*/
	class admin_modele
	{
		
		function __construct(){}

		public function get_pm_Infos($email)
		{
			$dao=new Dbaccess();
			$dba=$dao->accessDB();
			$sql = "SELECT * FROM plateform_manager WHERE email=:email";
		    $q = $dba->prepare($sql);
		    $q->execute([
		        'email' => $email,
		    ]);
	        return $q->fetch(PDO::FETCH_OBJ);
		}

		public function max_sessid()
		{
			#this method queries db to fetch the last created session id from db which is used as reference for all new activities
			$dao=new Dbaccess();
			$dba=$dao->accessDB();

			$sql = "SELECT MAX(session_enrollement.id_session) FROM session_enrollement";
			$q = $dba->prepare($sql);
			$q->execute();
			return $q->fetchColumn();#returns  single value
		}

		public function count_students()
		{
			#this method queries db to fetch the last created session id from db which is used as reference for all new activities
			$dao=new Dbaccess();
			$dba=$dao->accessDB();

			$sql = "SELECT COUNT(student.id) FROM student";
			$q = $dba->prepare($sql);
			$q->execute();
			return $q;#returns  single value
		}

		public function count_subscribed_students($id)
		{
			#this method queries db to fetch the last created session id from db which is used as reference for all new activities
			$dao=new Dbaccess();
			$dba=$dao->accessDB();

			$sql = "SELECT COUNT(subscribed_students.etudiants) FROM subscribed_students WHERE subscribed_students.sousc_liste=:id";
			$q = $dba->prepare($sql);
			$q->execute(["id"=>$id]);
			return $q;#returns  single value
		}

		public function count_enroled_students($id)
		{
			#this method queries db to fetch the last created session id from db which is used as reference for all new activities
			$dao=new Dbaccess();
			$dba=$dao->accessDB();

			$sql = "SELECT COUNT(enrolled_students.etudiant) AS enroled_num
			FROM enrolled_students, liste_enrollement
			WHERE enrolled_students.liste_enrollement=liste_enrollement.id_liste
			AND liste_enrollement.session_enrollement=:id";
			$q = $dba->prepare($sql);
			$q->execute(["id"=>$id]);
			return $q;#returns  single value
		}
	}
 ?>