<?php include'inc/header.php'; ?>
<?php include'inc/imvisibleSidebar.php'; ?>

<?php
 if (!isset($_GET['lid']) || $_GET['lid']==NULL) {
     header("Location: index.php");
 }else{
    $lid = $_GET['lid'];
 }

?>  

<!--  Main Content  -->
    <div class="ryt_area col-xm-12 col-sm-12 col-md-8 col-lg-8">
      <div class=" header_ryt">
            <div class="imgcls col-xm-12 col-sm-12 col-md-12 col-lg-12">
              <a href=""><img src="img/11.png"></a>
             
            </div>
      </div>
      
     <div id="statuslive">
     	
     <table class="table table-bordered">
    <thead>
      <tr>
       
      </tr>
    </thead>
    <tbody>
     <?php
      			$result = $db->getSingleLeadById($lid);
      			if ($result) {
      			foreach ($result as $item) {
					
      ?>      
      <tr class="danger">
        <td width="30%"><b>First Name</b></td>
        <td width="70%"><?php echo $item['fName']?></td>
      </tr>
      <tr class="info">
         <td width="30%"><b>Last Name</b></td>
        <td width="70%"><?php echo $item['lName']?></td>
      </tr>
       <tr class="danger">
        <td width="30%"><b>Direct Phone</b></td>
        <td width="70%"><?php echo $item['d_phone']?></td>
      </tr>
      <tr class="info">
         <td width="30%"><b>Email</b></td>
        <td width="70%"><?php echo $item['email']?></td>
      </tr>
       <tr class="danger">
        <td width="30%"><b>Address</b></td>
        <td width="70%"><?php echo $item['address']?></td>
      </tr>
      <tr class="info">
         <td width="30%"><b>City</b></td>
        <td width="70%"><?php echo $item['city']?></td>
      </tr>
       <tr class="danger">
        <td width="30%"><b>Country</b></td>
        <td width="70%"><?php echo $item['country']?></td>
      </tr>
      <tr class="info">
         <td width="30%"><b>Facebook</b></td>
        <td width="70%"><a href="<?php echo $item['facebook']?>" target="_blank"><?php echo $item['facebook']?></a></td>
      </tr>
       <tr class="danger">
        <td width="30%"><b>Linkedin</b></td>
        <td width="70%"><a href="<?php echo $item['linkedin']?>" target="_blank"><?php echo $item['linkedin']?></a></td>
      </tr>
      <tr class="info">
         <td width="30%"><b>Twitter</b></td>
        <td width="70%"><a href="<?php echo $item['twitter']?>" target="_blank"><?php echo $item['twitter']?></a></td>
      </tr>
       <tr class="danger">
        <td width="30%"><b>Company Name</b></td>
        <?php 

              $id_c = $item['id_c'];
              $c_name = $db->getCompanyNameById($id_c);

        ?>
        <td width="70%"><?php echo $c_name; ?></td>
      </tr>
      <tr class="info">
         <td width="30%"><b>Job Title</b></td>
          <?php 

              $id_j = $item['id_j'];
              $job_title = $db->getJobTitleById($id_j);

        ?>
        <td width="70%"><?php echo $job_title; ?></td>
      </tr>
     <?php } }?>
    </tbody>
  </table>
     </div>
     
      <p class="copy">Copyright &copy 2017 RJ information All Rights Reserved </p>
    </div>


<?php include'inc/footer.php'; ?>