<?php
 $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'../lib/DatabasePDO.php');
	$db  = new Database();
	
?>
<?php  
   

     if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$skill = $_POST['company_id'];

		$getskill = $db->checkcompany($skill);
		echo $getskill;


	}
     
 ?>
    
