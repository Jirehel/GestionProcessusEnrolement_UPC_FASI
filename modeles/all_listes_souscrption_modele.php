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

			$sql = "SELECT periode, annee,id_liste,session_enrollement.actif FROM session_enrollement, liste_souscription WHERE id_session=liste_souscription.session_enrollement ORDER BY liste_souscription.id_liste DESC";
		    $q = $dba->prepare($sql);
		    $q->execute();
	        return $q->fetchAll();
		}
	}

 ?>