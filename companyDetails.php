<?php include'inc/header.php'; ?>
<?php include'inc/imvisibleSidebar.php'; ?>

<?php
 if (!isset($_GET['cid']) || $_GET['cid']==NULL) {
     header("Location: index.php");
 }else{
    $cid = $_GET['cid'];
 }

?>  

<!--  Main Content  -->
    <div class="ryt_area col-xm-12 col-sm-12 col-md-8 col-lg-8">
      <div class=" header_ryt">
            <div class="imgcls col-xm-12 col-sm-12 col-md-12 col-lg-12">
             
              <a href=""><img src="img/12.png"></a>
    
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
            $result= $db->getSingleCompanyById($cid);
            if ($result) {
            foreach ($result as $item) {
          
      ?>      
      <tr class="danger">
        <td width="30%"><b>Company Name</b></td>
        <td width="70%"><?php echo $item['company_name']?></td>
      </tr>
      <tr class="info">
         <td width="30%"><b>Revenue</b></td>
        <td width="70%"><?php echo $item['revenue']?></td>
      </tr>
       <tr class="danger">
        <td width="30%"><b>Employee Size</b></td>
        <td width="70%"><?php echo $item['employees']?></td>
      </tr>
      <tr class="info">
         <td width="30%"><b>Industry</b></td>
        <td width="70%"><?php echo $item['industry']?></td>
      </tr>
       <tr class="danger">
        <td width="30%"><b>Products And Services</b></td>
        <td width="70%"><?php echo $item['pro_and_service']?></td>
      </tr>
      <tr class="info">
         <td width="30%"><b>Address</b></td>
        <td width="70%"><?php echo $item['c_address']?></td>
      </tr>
       <tr class="danger">
        <td width="30%"><b>Phone</b></td>
        <td width="70%"><?php echo $item['c_phone']?></td>
      </tr>
      <tr class="info">
         <td width="30%"><b>Fax</b></td>
        <td width="70%"><?php echo $item['c_fax']?></td>
      </tr>
       <tr class="danger">
        <td width="30%"><b>Website</b></td>
        <td width="70%"><a href="<?php echo $item['c_web']?>" target="_blank"><?php echo $item['c_web']?></a></td>
      </tr>
      <tr class="info">
         <td width="30%"><b>Facebook</b></td>
        <td width="70%"><a href="<?php echo $item['c_fb']?>" target="_blank"><?php echo $item['c_fb']?></a></td>
      </tr>
       <tr class="danger">
        <td width="30%"><b>Linkedin</b></td>
        <td width="70%"><a href="<?php echo $item['c_linkedin']?>" target="_blank"><?php echo $item['c_linkedin']?></a></td>
      </tr>
      <tr class="info">
         <td width="30%"><b>Twiteer</b></td>
        <td width="70%"><a href="<?php echo $item['c_twitter']?>" target="_blank"><?php echo $item['c_twitter']?></a></td>
      </tr>

      <tr class="info">
         <td width="30%"><b>Company Details</b></td>
        <td width="70%" ><?php echo $item['c_details']?></td>
      </tr>
     <?php } }?>
    </tbody>
  </table>

     </div>
    
      <p class="copy">Copyright &copy 2017 RJ information All Rights Reserved </p>
    </div>



<?php include'inc/footer.php'; ?>