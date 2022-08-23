<?php 
	/**
	* 
	*/
	class badge_modele
	{
		
		function __construct(){}
		public function liste_souscriptions()
		{
			$dao=new Dbaccess();
			$dba=$dao->accessDB();

			$sql = "SELECT * FROM session_enrollement ORDER BY session_enrollement.id_session DESC";
		    $q = $dba->prepare($sql);
		    $q->execute();
	        return $q->fetchAll();
		}
	}

 ?>