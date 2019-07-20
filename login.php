<?php include 'lib/Session.php'; 
  Session::init();
?>

<?php include 'lib/DatabasePDO.php';?>
<?php include 'helpers/Format.php';?>

<?php  
     $db = new Database();
     $format = new Format();
     
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
	
	<link rel="stylesheet" href="login.css" />

</head>
<body>
	<div class="full_bdy">
		<div class="left_area col-xm-12 col-sm-12 col-md-6 col-lg-6">
			<div class="my_img">
				<img src="img/1.png">
			
			</div>

		
			
			<div class="frm_area col-xm-12 col-sm-12 col-md-6 col-lg-6">

			<?php 
         if ($_SERVER["REQUEST_METHOD"] == "POST") {
         	$uname = $format-> test_input($_POST['uname']);
		     $pwd = $format-> test_input(md5($_POST['pwd']));

		     	  $query = $db-> loginToZoominfo($uname,$pwd);
		     	  $allinfo = $query->fetch();
		     	  $num = $query->rowCount();

		     	  if ($num == 1) {
		     	  	 Session::set("login", true);
		     	  	 Session::set("uname", $allinfo['uname']);
		     	  	 Session::set("uid", $allinfo['id']);

		     	  	 header("Location: index.php");


		     	  }else{
		     	  	echo "<span style= 'color: red;'>Username and Password are not matched</span>";
		     	  }


         }

	?>

				<form action="login.php" method="post">
		
					<div class="my_frm form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<h5 class="text">Username</h5>
						<input type="text" required="" name="uname" class="form-control input-lg" placeholder="e.g.smith@zoominfo.com"/>

						<h5 class="text">Password</h5>
						<input type="text" class="form-control input-lg" required="" name="pwd" placeholder="Enter Your Password"/>

						<div class="btn-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
			    		<a href="index.html"><button type="submit" class="btn btn-primary btn-lg">LOGIN</button></a>
			    		</div>
					</div>
				</form>
				
			    <a href=""><h5 class="text_frgt">Forgot Password?</h5></a>
			   
			     <a href="signup.php"><h5 class="text_frgt">Sign Up</h5></a>
			</div>

		</div>

		<div class="ryt_area col-xm-12 col-sm-12 col-md-6 col-lg-6">
			<div class="my_img col-xm-12 col-sm-12 col-md-12 col-lg-12">
				<img src="img/2.png" alt="image">
				<h3>GROWTH ACCELERATION</h3>
				<h1>SUMMIT</h1>
				<h3>----------2017----------</h3>
				<h2>SEPTEMBER 13-14</h2>
				
			</div>
			
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