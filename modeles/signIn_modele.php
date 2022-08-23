<?php 
	/**
	* 
	*/
	class signIn_modele
	{
		
		function __construct(){}

		public function p_manager_exists($email,$pswd){
			$dao=new Dbaccess();
			$dba=$dao->accessDB();
		    $sql = "SELECT * FROM plateform_manager WHERE email=:email AND passwd=:passwd";
		    $q = $dba->prepare($sql);
		    $q->execute([
		        'email' => $email,
		        'passwd' => $pswd
		    ]);
		    return $q->rowCount();
		}

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
	}

 ?>