<?php 
	include './modeles/signIn_modele.php';
	/**
	* 
	*/
	class signIn_controlleur
	{
		
		function __construct($login, $pswd)
		{
			$id=sanitize($login);
			$psw=sanitize($pswd);
			#$psw=sha1($psw);
			$sign_m=new signIn_modele();
			if($sign_m->p_manager_exists($id, $psw)){
				session_start();
				$p_manager_infos=$sign_m->get_pm_Infos($id);
				$_SESSION['email']= $p_manager_infos->email;
				header('location:index.php?p=admin-home');
			}
		}
	}

 ?>