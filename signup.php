<?php include 'lib/Session.php'; 
  Session::init();
?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>zoominfo</title>
	
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">

	<!-- Optional theme -->
	<link rel="stylesheet" href="css/bootstrap-theme.min.css" >
	<link rel="stylesheet" href="css/uikit.min.css" >

	<!-- Latest compiled and minified JavaScript -->
	<script src="js/vendor/modernizr-2.6.2.min.js"></script>
	<script src="js/bootstrap.min.js" ></script>
	<script src="js/bootstrap.js" ></script>
	
	
	<link rel="stylesheet" href="responsive.css" />
	
	<link rel="stylesheet" href="signup.css" />

</head>
<body>

		<?php include('signupvalidation.php');?>

		<div class="full_bdy col-xm-12 col-sm-12 col-md-12 col-lg-12">
			<div class="header col-xm-12 col-sm-12 col-md-12 col-lg-12">
				<div class="my_img col-xm-12 col-sm-12 col-md-12 col-lg-12">
					<img src="img/borologo.png">
				</div>
			</div>

			<div class="frm_area col-xm-12 col-sm-12 col-md-12 col-lg-12">
				<form action="" method="post" class="">
		
					<div class="my_frm form-group col-xs-12 col-sm-6 col-md-12 col-lg-offset-3 col-lg-6 col-lg-offset-3 ">
					
						<input type="text" name="first_name" class="form-control input-lg"  placeholder="Enter Your Name"  required value="<?php echo $firstName;?>"/> 
						<br>
							<div class="error"><?php echo $firstNameErr;?></div>
						
						<input type="text" name="uname" class="form-control input-lg"  placeholder="Enter Your Username" required value="<?php echo $uname;?>"/>
							<br>
							<div  class="error"><?php echo $unameErr;?></div>
							
						<input type="text" name="email" class="form-control input-lg"  placeholder="Enter Your Email" required value="<?php echo $email;?>"/>
							<br>
							<div class="error"><?php echo $emailErr;?></div>
							
						<input type="password" name="pwd" class="form-control input-lg"  placeholder="Enter Password" required />
						
						<div class="my_btn btn-group col-xs-12 col-sm-12 col-md-6 	col-lg-offset-3  col-lg-6 col-lg-offset-3 ">
			    			<button type="submit" class="btn btn-primary btn-lg">Sign Up</button>
			   			 </div>
					</div>
				</form>
				<?php echo $msg; ?>
				
			</div>
			
		</div>	



	<script>window.jQuery || document.write('<script src="js/vendor/jquery-1.10.2.min.js"><\/script>')</script>
     <script src="js/bootstrap.min.js"></script>
	 
	 	<script src="uikit/js/uikit.min.js"></script>
		
		<script type="text/javascript">

	$(document).ready(function() {
  
  $(window).scroll(function () {
      //if you hard code, then use console
      //.log to determine when you want the 
      //nav bar to stick.  
      console.log($(window).scrollTop())
    if ($(window).scrollTop() > 900) {
      $('#this_area').addClass('navbar-fixed-top');
    }
    if ($(window).scrollTop() < 900) {
      $('#this_area').removeClass('navbar-fixed-top');
    }
  });
});

</script>
</body>
</html>