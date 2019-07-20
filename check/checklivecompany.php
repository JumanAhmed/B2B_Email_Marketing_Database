<?php
	$filepath = realpath(dirname(__FILE__));
	//include_once ($filepath.'/../classes/Project.php');
	include_once ($filepath.'/../lib/DatabasePDO.php');
	

	//$pro = new Project();
	$db = new Database();
	//echo "check is ok";
	
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$search = $_POST['search'];

		$lsearch = $db->liveSearchByCompanyName($search);
		echo  $lsearch;

			
	}
?>