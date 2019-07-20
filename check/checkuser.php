<?php
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../classes/Project.php');
	include_once ($filepath.'/../lib/Database.php');
	

	$pro = new Project();
	$db = new Database();
	
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$username = $_POST['username'];

		$row = $db->getUserName($username);

		if ($username == "") {
         	echo "<span class='error'>Plese Enter UserName.</span>";
         	exit();
         }elseif ($row) {
         	echo "<span class='error'><b>$username</b> Not Available !</span>";
         	exit();
         }else{
         	echo "<span class='success'><b>$username</b>  Available !</span>";
         	exit();
         }	

	}
?>