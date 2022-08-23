<?php 
	class enrolement_modele
	{
		
		function __construct(){}

		public function insert($periode,$annee,$date,$state,$dir)
		{
			$dao=new Dbaccess();
			$dba=$dao->accessDB();
			$r = array(
				'id'=>null,
	            'periode'=>strtoupper($periode), 
	            'annee'=>$annee,
	        	'dat'=>$date,
	            'state'=>$state,
	            'dir'=>$dir
        	);
        	#session creattion
        	$sql = "INSERT INTO session_enrollement(id_session, periode, annee, date_creation,actif,directory)
                VALUES(:id, :periode, :annee, :dat,:state,:dir)";
	        $req = $dba->prepare($sql);
	        $req->execute($r);

	        #last session id 
	        $sess_id=$dba->lastInsertId();

	        #creation de la liste souscription
	        $s = array(
				'id'=>null,
	            'session'=>$sess_id,
	            'dat'=>$date
        	);
        	$sql = "INSERT INTO liste_souscription(id_liste, session_enrollement, date_creation)
                VALUES(:id, :session,:dat)";
	        $req = $dba->prepare($sql);
	        $req->execute($s);
	        #	header('location:index.php?p=admin-home');

	        #creation des listes d'enrolements
            for($i=1; $i<=5; $i++){
               $sql = "INSERT INTO liste_enrollement(id_liste, session_enrollement,promotion, date_creation)
                            VALUES(:id, :session,:promotion,:dat)";
            	$req = $dba->prepare($sql);               
            	$req->execute(array(
								'id'=>null,
					            'session'=>$sess_id,
					            'promotion'=>$i,
					            'dat'=>$date
				        	));
           }

		}
		public function get_session()
		{
			$dao=new Dbaccess();
			$dba=$dao->accessDB();

			$sql = "SELECT session_enrollement.id_session, session_enrollement.periode, session_enrollement.annee, session_enrollement.actif FROM session_enrollement ORDER BY session_enrollement.id_session DESC LIMIT 5";
		    $q = $dba->prepare($sql);
		    $q->execute();
	        return $q->fetchAll();
		}

		public function max_sessid($value='')
		{
			$dao=new Dbaccess();
			$dba=$dao->accessDB();

			$sql = "SELECT MAX(session_enrollement.id_session) FROM session_enrollement";
		    $q = $dba->prepare($sql);
		    $q->execute();
		    return $q->fetchColumn();
		}
		public function update_actif_value($value='')
		{
			$dao=new Dbaccess();
			$dba=$dao->accessDB();

		    #update
		    $sql="UPDATE session_enrollement SET session_enrollement.actif =0 WHERE session_enrollement.id_session=:id";
		    $u=$dba->prepare($sql);
		    $u->execute(['id'=>$value]);
		}

	}
 ?>