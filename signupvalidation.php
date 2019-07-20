<?php include 'lib/DatabasePDO.php';?>
<?php include 'helpers/Format.php';?>

<?php  
     $db = new Database();
     $format = new Format();
     
 ?>

<?php

      // define variables and set to empty values
      $unameErr = $pwdErr =  $firstNameErr =  $emailErr = "";
      $uname = $pwd = $firstName =  $email = "";
 	  $msg= "";
 		
  
      
      if ($_SERVER["REQUEST_METHOD"] == "POST") {

      	/* First Name*/
        if (!empty($_POST["first_name"])) {
        	$test =  $format->test_input($_POST["first_name"]);
          // check if name only contains letters and whitespace
          if (preg_match("/^[a-zA-Z ]*$/", $test)) {
          	$firstName = $test;
            
          }else{
          	$firstNameErr = "Only allowed letters and white space !"; 
          }
          
        } else {
        	$firstNameErr = "Name is required";
          
        }


        
      	// UserName
        if (!empty($_POST["uname"])) {

			$test = $format->test_input($_POST["uname"]);
			// check if name only contains letters and  and number 
          		if (preg_match("/^[a-zA-Z0-9]+$/", $test)) {
          	 		$uname = $test;
          	 	  } 
          	 	  else{
	          	 	$unameErr = "Only allowed a-z , A-Z, 0-9";
	          	 }     
	          
          } else{
                $unameErr = "UserName is required";
            }


           /*Email*/
        if (!empty($_POST["email"])) {
        	$test = $format->test_input($_POST["email"]);
          // check if e-mail address is well-formed
          if (filter_var($test , FILTER_VALIDATE_EMAIL)) {
          	$email = $test;
           
          }else{
          	 $emailErr = "Invalid email format !"; 
          }
          
        } else {
          $emailErr = "Email is required";
        }
          

        /*Password*/

        if (!empty($_POST["pwd"])) {
        	 $pwd = $format->test_input($_POST["pwd"]);
        	 $pwd = md5($pwd);
        	
         
        } else {
           $pwdErr = "Password is required";
          
        }


        /*Insert to Database*/
        if (!empty($firstName) and  !empty($uname) and !empty($email) and  !empty($pwd) ) {

           $register = $db-> registerSignup($firstName, $uname, $email, $pwd);
		   if ($register) {
				$msg = "<span style='margin-left: 80px; color: green;font-size: 20px; text-transform:capitalize;  font-weight: bold;'>Registetion done <a href ='login.php?'>Click  here </a>for login.</span>";
		      }else{
		        $msg = "<span style='margin-left: 80px; color: red;font-size: 20px; text-transform:capitalize;  font-weight: bold;'>Error.....Username OR email already exists.</spam>";
		         }
           }else{
        	$msg = "<span style='margin-left: 80px;color: red;font-size: 15px; text-transform:capitalize;  font-weight: bold;'>Fill the required field with proper format !</span>";
        }


      }

      
  ?>
