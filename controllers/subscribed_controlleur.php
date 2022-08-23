<?php
	/**
	* This class is the intermidiate class 
	* (controller) between the the view and the 
	* model
	* this class directly interacts with subscribed_modele which implements 
	* all required db queries.
	* for all db queries exemples, cfr subscribed_modele
	*/
	include './modeles/subcribed_modele.php';
	include './func/generateQr.php';
	include './func/mailer.php';
	if (isset($_POST['validate'])) {
        #subcription validation
        header("location:index.php?p=capture&student=".$_POST['nothing']);
    }

    if (isset($_POST['logout'])) {
        session_destroy();
        header('location:index.php?p=home');
    }

    if (isset($_POST['logout'])) {
        session_destroy();
        header('location:index.php?p=home');
    }
	class subscribed_controlleur
	{
		
		function __construct(){}

		public function ayant_souscris($liste_id)
		{
			#this method return the value returned by souscris method
			$liste_id=sanitize($liste_id);
			$sub_m=new subscribed_modele();
			return $sub_m->souscris($liste_id);
		}

		public function ayant_souscris2($liste_id)
		{
			#this method return the value returned by souscris2 method
			$liste_id=sanitize($liste_id);
			$sub_m=new subscribed_modele();
			return $sub_m->souscris2($liste_id);
		}

		public function promotion($value)
		{
			#this method return the value returned by get_promo method
			$sub_m=new subscribed_modele();
			return $sub_m->get_promo($value);
		}

		public function confirm_subs($student)
		{
			#this method references the effective update donne in confirm method
			$sub_m=new subscribed_modele();
			$sub_m->confirm($student,$sub_m->max_sessid());
			#no return value
		}

		public function update_photo($student, $path)
		{
			#this method references the effective update donne in update_picture method
			$sub_m=new subscribed_modele();
			$sub_m->update_picture($student, $path);
			#no return value
		}
		
		public function subscription_state($student, $session)
		{
			#this method return the value returned by subs_state method
			$sub_m=new subscribed_modele();
			return $sub_m->subs_state($student, $session);
		}

		public function search($code, $session)
		{
			#this method return the value returned by searchstudent method
			$code=sanitize($code);
			$sub_m=new subscribed_modele();
			return $sub_m->seachstudent($code,$session);
		}
		
	}
 ?>