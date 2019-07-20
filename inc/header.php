<?php include'lib/Session.php'; 
  Session::checkSeassion();
   $id   = $_SESSION['uid'];
  $uname = $_SESSION['uname'];
?>

<?php include 'lib/DatabasePDO.php';?>
<?php  
     $db = new Database();
     
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
  <script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
	<script src="js/vendor/modernizr-2.6.2.min.js"></script>
	<script src="js/bootstrap.min.js" ></script>
	<script src="js/bootstrap.js" ></script>
	
	
	<link rel="stylesheet" href="responsive.css" />
	
	<link rel="stylesheet" href="style.css" />

</head>
<body>
	<section class="nav">

    	<nav class="my_nav navbar navbar-default">
      <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#"><img src="img/sutologo.png" class="img-responsive"</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <?php 
                  if (isset($_GET['action']) && $_GET['action']== "logout") {
                       Session::destroy();
                    }

          ?>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="head nav navbar-nav navbar-right">
            
            <li><a href="index.php">Home</a></li>
            <li><a href="#">About Us</a></li>
            <li><a href="#">Services</a></li>
            <li ><a href=""><?php echo $uname; ?></a></li>
            <li><a href="?action=logout">Logout</a></li>
          
          </ul>

         
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
      </nav>
  </section>
  <div class="line">
      
  </div>

  <div class="container">