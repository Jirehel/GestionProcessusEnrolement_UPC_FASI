<?php 
	/**
	* 
	*/
	class profile_modele
	{
		
		function __construct(){}

		#fetch student infos
		public function get_student_Infos($matricule='')
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

		#fetch the max subscribe list id in db
		public function max_id()
		{
			$dao=new Dbaccess();
			$dba=$dao->accessDB();

			$sql = "SELECT max(id_liste) FROM liste_souscription";
		    $q = $dba->prepare($sql);
		    $q->execute();
	        return $q->fetchColumn();
		}

		#fetch max session id
		public function max_sessid($value='')
		{
			$dao=new Dbaccess();
			$dba=$dao->accessDB();

			$sql = "SELECT MAX(session_enrollement.id_session) FROM session_enrollement";
		    $q = $dba->prepare($sql);
		    $q->execute();
		    return $q->fetchColumn();
		}

		public function session_state($value='')
		{
			$dao=new Dbaccess();
			$dba=$dao->accessDB();

			$sql = "SELECT session_enrollement.actif FROM session_enrollement WHERE session_enrollement.id_session=:id";
		    $q = $dba->prepare($sql);
		    $q->execute(["id"=>$value]);
		    return $q->fetchColumn();
		}

		public function hasEnroled($matricule, $liste)
		{
		    $dao=new Dbaccess();
			$dba=$dao->accessDB();

			#fetch student id associated to the given matricule
			$sql = "SELECT  student.id FROM student WHERE student.matricule=:matricule_id";
		    $q0 = $dba->prepare($sql);
		    $q0->execute(["matricule_id"=>$matricule]);
		    $id=$q0->fetchColumn();
		    #get given id subscribed code from subscribed table
			$sql = "SELECT subscribed_students.etat_souscription FROM subscribed_students WHERE subscribed_students.etudiants=:id AND subscribed_students.sousc_liste=:liste";
		    $q = $dba->prepare($sql);
		    $q->execute([
		        'id' => $id,
		        'liste'=>$liste,
		    ]);
		    #die($id."--".$liste."%".$q->fetchColumn());
	        return $q->fetchColumn();
		}

		public function subs($id, $liste, $session_id)
		{
			$dao=new Dbaccess();
			$dba=$dao->accessDB();
			#checking if the student has already subscribed
		    $sql = "SELECT * FROM subscribed_students WHERE subscribed_students.etudiants=:id AND subscribed_students.sousc_liste=:liste";
		    $q = $dba->prepare($sql);
		    $q->execute([
		        'id' => $id,
		        'liste'=>$liste,
		    ]);
		    $q->rowCount();
		    $code=$id."".uniqid($session_id);
		    if($q->rowCount()<1){
		    	#then subscribe if not
		    	$s = array(
		            'id'=>$id,
		            'liste'=>$liste,
		            'etat'=>0,
		            'code'=>$code
        		);
				$sql = "INSERT INTO subscribed_students(etudiants, sousc_liste, etat_souscription,code_enrolement)
	                VALUES(:id, :liste,:etat,:code)";
		        $req = $dba->prepare($sql);
		        $req->execute($s);
		    }
		}

		public function getcode($matricule, $session_id)
		{
			$dao=new Dbaccess();
			$dba=$dao->accessDB();

			#fetch student id associated to the given matricule
			$sql = "SELECT  student.id FROM student WHERE student.matricule=:matricule";
		    $q0 = $dba->prepare($sql);
		    $q0->execute(['matricule'=>$matricule]);

			#fetching student code
		    $sql = "SELECT subscribed_students.code_enrolement 
					FROM subscribed_students 
					WHERE subscribed_students.etudiants=:id 
					AND subscribed_students.sousc_liste=:sess";
		    $q = $dba->prepare($sql);
		    $q->execute([
		        'id' => (int)$q0->fetchColumn(),
		        'sess'=>$session_id,
		    ]);
		    return $q->fetchColumn();
		}

		public function presence($student_id='')
		{
			
		}

	}
	

 ?>