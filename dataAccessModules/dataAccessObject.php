<?php 
	class DbAccess
	{
		function __construct(){}

		function accessDB(){
			try{
        		return new PDO('mysql:dbname=enroll-v2;host=localhost', 'root', '',
        			array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
              	PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
    		}catch(PDOexception $e){
        		die("Une erreur est survenue lors de la connexion à la base de données");
        	}	
		}
	}
 ?>