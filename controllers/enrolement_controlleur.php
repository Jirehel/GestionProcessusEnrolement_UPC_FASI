<?php 
	include './modeles/enrolement_modele.php';
	if(!isset($_SESSION['email'])){
            header('location:index.php?p=home');
        }
    if (isset($_POST['logout'])) {
        session_destroy();
        header('location:index.php?p=home');
    }
	class enrolement_controlleur
	{
		
		function __construct(){}

		public function insertion($periode, $annee)
		{
			#les données de l'enrolement
			$periode=sanitize($periode);
			$annee=sanitize($annee);
			$date=date("Y-m-d");
			$date=sanitize($date);
			$state=1;
			$dir="./avatar/qrcodes/";
			if ($periode=="MI-SESSION") {
				$dir="./avatar/qrcodes/MI-SESSION/".$periode." ".$annee."/";
			}elseif ($periode=="SESSION") {
				$dir="./avatar/qrcodes/SESSION/".$periode." ".$annee."/";
			}elseif ($periode=="DEUXIEME-SESSION") {
				$dir="./avatar/qrcodes/DEUXIEME-SESSION/".$periode." ".$annee."/";
			}
			if (!file_exists($dir)) {
				mkdir($dir,0777,true);
			}

			$en_m=new enrolement_modele();
			$en_m->insert($periode,$annee,$date,$state,$dir);
		}
		public function sessions_list()
		{
			$en_m=new enrolement_modele();
			return $en_m->get_session();
		}
		public function end_session($value='')
		{
			$en_m=new enrolement_modele();
			$en_m->update_actif_value($en_m->max_sessid());
		}
	}
 ?>