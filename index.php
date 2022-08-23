<!DOCTYPE html>
<link rel="stylesheet" href="assets/css/custom.css">
<?php
	class Main
	{
		function __construct()
		{	session_start();
			header('Cache-Control: no-cache, must-revalidate, max-age=0');
			/*DB file inclusion*/
			require "./dataAccessModules/dataAccessObject.php";
			/*End DB file inclusion*/

			/*Page inclusion*/
			include './root/pageInclusion.php';
			$index=new root();	
		}
	}
?>
	<body>
		<script type="text/javascript" src="./accessoires/blocker.js"></script>
		<script type="text/javascript" src="./accessoires/validation.js"></script>
		<script type="text/javascript" src="./assets/js/jquery-1.11.0.min.js"></script>
		<script type="text/javascript" src="./assets/js/materialize.js"></script>
	</body>
<?php
		new Main();
?>