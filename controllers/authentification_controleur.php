<?php 
	include './modeles/athentification_modele.php';
	class authentification_controlleur
	{
		public $error=[];

        #construct
		function __construct(){}

        #Tokken verification
		public function verify($identifiant='')
		{
			# code...
            if(!empty($identifiant)){
                $val=sanitize($identifiant);
                #$val=sha1($val);

                #modele object
                $au_m=new authentification_modele();
                if($au_m->p_manager_exists($val)){
                    #session_start();
                    # fetch admin infos
                    $p_manager_infos=$au_m->get_pm_Infos($val);

                    #saving the sessions for valid tokken
                    $_SESSION['tokken']=$p_manager_infos->tokken;
                    # redirection to login page
                    header('location:index.php?p=sign-in');
                }else if ($au_m->student_exists($val)) {
                    #session_start();
                    #fetch student infos
                    $student_infos=$au_m->get_student_Infos($val);
                    #saving the session for valid matricule
                    $_SESSION['matricule']=$student_infos->matricule;
                    #redirection to student home page
                    header('location:index.php?p=students-profile');
                }else{
                    $error[]="Identifiant invalid!";
                }
            }else{
                $error[]="Remplir le champs svp!";
            }
		}
	}
 ?>