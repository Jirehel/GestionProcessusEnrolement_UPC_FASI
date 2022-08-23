<?php 
	/**
	* 
	*/
	class all_listes_enrollement
	{
		
		function __construct(){}
		public function liste_enr($id)
		{
			$dao=new Dbaccess();
			$dba=$dao->accessDB();

			$sql = "SELECT * FROM liste_enrollement WHERE liste_enrollement.session_enrollement=:id";
		    $q = $dba->prepare($sql);
		    $q->execute(['id'=>$id]);
	        return $q->fetchAll();
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