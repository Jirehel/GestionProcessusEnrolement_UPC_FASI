
<?php 
/**
* This class mplementes all db queries neeeded for this module
* also considered as the modele class
* this class contains ton of methods for returing or not values called  
* by the controller for the  future usage by the view 
*/
class subscribed_modele
{
	function __construct(){}#empty constructor
	public function souscris($liste_id)
	{
		#this function fetches in an array all subscribed students from table subscribed where the state = 0
		$dao=new Dbaccess();
		$dba=$dao->accessDB();

		$sql = "SELECT student.nom, student.postnom, student.prenom, student.promotion, subscribed_students.*, session_enrollement.id_session, student.photo 
				FROM student, subscribed_students, session_enrollement
				WHERE subscribed_students.sousc_liste=:liste_id
				AND session_enrollement.id_session=:liste_id 
				AND student.id=subscribed_students.etudiants 
				AND subscribed_students.etat_souscription=0 
				ORDER BY subscribed_students.date DESC";
		$q = $dba->prepare($sql);
		  $q->execute([
		        'liste_id' => $liste_id,
		    ]);
	    return $q->fetchAll();#returned value as an array
	}

	public function souscris2($liste_id)
	{
		#this function fetches in an array all subscribed students from table subscribed where the state =1
		$dao=new Dbaccess();
		$dba=$dao->accessDB();

		$sql = "SELECT student.nom, student.postnom, student.prenom, student.promotion, subscribed_students.*, session_enrollement.id_session, student.photo 
				FROM student, subscribed_students, session_enrollement
				WHERE subscribed_students.sousc_liste=:liste_id
				AND session_enrollement.id_session=:liste_id 
				AND student.id=subscribed_students.etudiants 
				AND subscribed_students.etat_souscription=1 
				ORDER BY subscribed_students.date DESC";
		$q = $dba->prepare($sql);
		  $q->execute([
		        'liste_id' => $liste_id,
		    ]);
	    return $q->fetchAll();#returned value as an array
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

	public function get_promo($id_promo)
	{
		#this method queries db to fetch the student promotion denomination from the given value {#id_promo}
		$dao=new Dbaccess();
		$dba=$dao->accessDB();

		$sql = "SELECT denomination FROM promotion WHERE id_promotion=:id";
		   $q = $dba->prepare($sql);
		   $q->execute([
		       'id' => $id_promo,
		   ]);
	       return $q->fetch(PDO::FETCH_OBJ);#returns single value
	}

	public function confirm($student, $session)
	{
		#this method aims to validate student subscription in case where the student has subscribed before. the method doesn't return any thing
		$dao=new Dbaccess();
		$dba=$dao->accessDB();

		#first, check if the session is ongoing
		$sql="SELECT session_enrollement.actif FROM session_enrollement WHERE session_enrollement.id_session=:session";
		$check=$dba->prepare($sql);
		$check->execute(['session'=>$session]);

		if($check->fetchColumn()>0){

			#before updating, first generate student qrcode using student matricule and session id

			#fetch matricule assiciated to a specific id
			$sql="SELECT student.matricule FROM student WHERE student.id=:id";
			$m=$dba->prepare($sql);
			$m->execute(['id'=>$student]);
			#fetch session directory from id. the purpose of the directory is to save each generated qrcode in a specific folder related the specific session
			$sql="SELECT session_enrollement.`directory` FROM session_enrollement WHERE session_enrollement.id_session=:session";
			$s=$dba->prepare($sql);
			$s->execute(['session'=>$session]); 
			$Qr=new QrCodeGen();
			$qrpath=$Qr->generateQrCode($m->fetchColumn(),$session/*session id*/,$s->fetchColumn().$m->fetchColumn().uniqid().".png",QR_ECLEVEL_L,100,3);

			#effective validation by updating given id entry where the session matches the given session
			$sql="UPDATE subscribed_students SET subscribed_students.etat_souscription=1 WHERE subscribed_students.etudiants=:student AND subscribed_students.sousc_liste=:session";
			$u=$dba->prepare($sql);
			$u->execute(['student'=>$student,
						 'session'=>$session]);

			#add student to the subscribed list
				/*first fetch student promot for enroled liste */
			$sql="SELECT liste_enrollement.id_liste  
				  FROM liste_enrollement, student
				  WHERE liste_enrollement.promotion=student.promotion
				  AND student.id=:id
				  AND liste_enrollement.session_enrollement=:session";
			$prom=$dba->prepare($sql);
			$prom->execute([
						'id'=>$student,
						'session'=>$session
							]);

			$sql="INSERT INTO enrolled_students(etudiant,liste_enrollement) VALUES(:id,:promotion)";
			$enr=$dba->prepare($sql);
			$enr->execute(['id'=>$student,
						 'promotion'=>$prom->fetchColumn()
						]);
			#Create fiche enrolement

			$sql="INSERT INTO fiche_enrollement(id_fiche, fiche_enrollement.`session`, etudiant, qrcode,date_creation)
					VALUES (:id, :session,:student,:qr,now())";
			$f=$dba->prepare($sql);
			$f->execute([
				'id'=>null,
				'session'=>$session,
				'student'=>$student,
				'qr'=>$qrpath,
			]);
			#email student with attached file
			/*fetch student's email addr*/
			$sql="SELECT student.email, session_enrollement.periode, session_enrollement.annee
				FROM student, session_enrollement 
				WHERE student.id=:id
				AND session_enrollement.id_session=:session";
			$mail=$dba->prepare($sql);
			$mail->execute([
							'id'=>$student,
							'session'=>$session
						]);
			$to=$mail->fetch(PDO::FETCH_OBJ);
			new mailer($to->email, $to->periode." ".$to->annee,$qrpath);
		}
		#no return value
	}

	public function subs_state($student, $session)
	{
		#this method queries db to fetch the specified student & session subscribed state
		$dao=new Dbaccess();
		$dba=$dao->accessDB();
		
		$sql = "SELECT subscribed_students.etat_souscription FROM subscribed_students WHERE subscribed_students.etudiants=:id AND subscribed_students.sousc_liste=:liste";
		$q = $dba->prepare($sql);
		$q->execute([
		    'id' => $student,
		    'liste'=>$session,
		]);

	    return $q->fetchColumn();
	}

	public function update_picture($student, $path)
	{
		#this method aims to update student profile photo. no return value
		$dao=new Dbaccess();
        $dba=$dao->accessDB();

        $sql="UPDATE enroll.student SET student.photo=:filepath WHERE student.id=:id";
        $q = $dba->prepare($sql);
        $q->execute([
		    'id' => $student,
		    'filepath'=>$path,
		]);
		#no return value
	}

	public function seachstudent($code,$session)
	{
		#this function searches the subscribed students from table subscribed where the state = 0 and the code is whatis given
		$dao=new Dbaccess();
        $dba=$dao->accessDB();

		$sql="SELECT subscribed_students.etudiants FROM subscribed_students WHERE subscribed_students.code_enrolement=:code";
		$query1=$dba->prepare($sql);
		$query1->execute(['code'=>$code]);

		$sql="SELECT student.nom, student.postnom, student.prenom, student.promotion, subscribed_students.*, session_enrollement.id_session, student.photo 
				FROM student, subscribed_students, session_enrollement
				WHERE subscribed_students.etudiants=:id
				AND session_enrollement.id_session=:session
				AND subscribed_students.sousc_liste=:session 
				AND student.id=subscribed_students.etudiants
				ORDER BY subscribed_students.date DESC";
		$query2=$dba->prepare($sql);
		$query2->execute([
						'id'=>$query1->fetchColumn(),
						'session'=>$session
						]);
		return $query2;
	}
}

 ?>