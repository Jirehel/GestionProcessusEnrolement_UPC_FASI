<?php
	$sec_config=array();
	$sec_config['allow_photo']=0;
	function sanitize($asset){
		$dao=new Dbaccess();
		$dba=$dao->accessDB();
		return htmlspecialchars(stripslashes(strip_tags(trim(htmlentities(filter_var($asset))))));
	}
 ?>