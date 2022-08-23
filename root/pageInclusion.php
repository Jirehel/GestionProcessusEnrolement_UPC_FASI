<?php 
	class root
	{
		function __construct()
		{
			$sitetitle=":: Enroll-Fasi - Université Protestante au Congo ::";
			$University="Fasi-UPC"; 
			$pages=scandir("./views");
			$admn=scandir("./mkz");
			if(isset($_GET['p']) && !empty($_GET['p'])){
				# Given a get parameter
				if(in_array($_GET['p'].".php", $pages)){
					$includeItem = $_GET['p'];# .php file found
					$filedir="views";
				}elseif(in_array($_GET['p'].".php", $admn)){
					$includeItem=$_GET['p'];
					$filedir="mkz";
				}else{
					$cam=scandir("./webcam");
					if(in_array($_GET['p'].".php", $cam)){

						$includeItem=$_GET['p'];
						$filedir="webcam";
					}else{
						$filedir="views";
						$includeItem="404"; # .php file not found
					}
				}
			}else{
				#Get parameter not given
				$filedir="views";
				$includeItem="home";
			}

			$functPages=scandir("./func");
			if(in_array($includeItem."f.php", $functPages)){
				include './func/'.$includeItem.".f.php"; # include specific function file
			}
			include './func/common.php';
			include "./".$filedir."/".$includeItem.".php";
		}
	}

 ?>