<?php
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../classes/Project.php');
	include_once ($filepath.'/../lib/Database.php');
	

	$pro = new Project();
	$db = new Database();
	
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$skill = $_POST['skill'];

		$getskill = $db->checkSkill($skill);
		echo $getskill;


	}
?>