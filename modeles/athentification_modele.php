<?php 
	class authentification_modele
	{
		private $dba;
		function __construct(){}

		public function p_manager_exists($id){
			$dao=new Dbaccess();
			$dba=$dao->accessDB();
		    $sql = "SELECT * FROM plateform_manager WHERE tokken=:id";
		    $q = $dba->prepare($sql);
		    $q->execute([
		        'id' => $id,
		    ]);
		    return $q->rowCount();
		}

		public function student_exists($matricule){
			$dao=new Dbaccess();
			$dba=$dao->accessDB();
		    $sql = "SELECT * FROM student WHERE matricule=:matricule";
		    $q = $dba->prepare($sql);
		    $q->execute([
		        'matricule' => $matricule,
		    ]);
		    return $q->rowCount();
		}

		public function get_pm_Infos($id)
		{
			$dao=new Dbaccess();
			$dba=$dao->accessDB();
			$sql = "SELECT plateform_manager.tokken FROM plateform_manager WHERE plateform_manager.tokken=:id";
		    $q = $dba->prepare($sql);
		    $q->execute([
		        'id' => $id,
		    ]);
	        return $q->fetch(PDO::FETCH_OBJ);
		}

		public function get_student_Infos($matricule)
		{
			$dao=new Dbaccess();
			$dba=$dao->accessDB();
			$sql = "SELECT student.matricule FROM student WHERE student.matricule=:matricule";
		    $q = $dba->prepare($sql);
		    $q->execute([
		        'matricule' => $matricule,
		    ]);
	        return $q->fetch(PDO::FETCH_OBJ);
		}
	}
 ?>