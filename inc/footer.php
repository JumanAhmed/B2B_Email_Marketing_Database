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