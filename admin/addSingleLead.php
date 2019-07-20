<?php include'inc/header.php'; ?>
<?php include'inc/sidebar.php'; ?>
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Add New lead Information</h2>
               <div class="block copyblock"> 
               <?php

                  if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        $fname              =($_POST['fname']);
                        $lname              =($_POST['lname']);
                        $d_phone            =($_POST['d_phone']);
                        $email              =($_POST['email']);
                        $address            =($_POST['address']);
                        $city               =($_POST['city']);
                        $country            =($_POST['country']);
                        $facebook           =($_POST['facebook']);
                        $linkedin            =($_POST['linkdin']);
                        $twitter            =($_POST['twitter']);
                        $company_id         =($_POST['company_id']);
                        $job_title_id       =($_POST['job_title_id']);
     

                  if (empty($fname) || empty($lname) || empty($d_phone) || 
                     empty($email) || empty($address) || empty($city) || empty($country) || empty($facebook)|| empty($linkedin) || empty($twitter) ||  empty($company_id) || empty($job_title_id)) {
                     echo "<span class = 'error'>Field must not be empty !!</span>";
                  }else{
                      $result = $db->insertLeadData($fname,$lname,$d_phone,$email,$address,$city,$country,$facebook,$linkedin,$twitter,$company_id,$job_title_id);

                      if ($result) {
                           echo "<span class = 'success'>New Lead info Inserted successfully</span>";
                      }else{
                           echo "<span class = 'error'>Something Wrong</span>";
                      }
                  }

              }

                 ?>

                 <form action="" method="post">
                    <table class="form">					
                        <tr>
                            <td> 
                                <label>First Name:</label>
                            </td>
                            <td>
                                <input type="text" name="fname" placeholder="Ex. John" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td> 
                                <label>Last Name:</label>
                            </td>
                            <td>
                                <input type="text" name="lname" placeholder="Ex. Thomlinson
                            </td>
                        </tr>
                        <tr>
                            <td> 
                                <label>Direct Phone:</label>
                            </td>
                            <td>
                                <input type="text" name="d_phone" placeholder="Ex. 1 3434 3434..." class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td> 
                                <label>Email:</label>
                            </td>
                            <td>
                                <input type="text" name="email" placeholder="Ex. jtomlinson@gmail.com..." class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td> 
                                <label>Address:</label>
                            </td>
                            <td>
                                <input type="text" name="address" placeholder="Ex. 75 new york" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td> 
                                <label>City:</label>
                            </td>
                            <td>
                                <input type="text" name="city" placeholder="Ex. New york..." class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td> 
                                <label>Country:</label>
                            </td>
                            <td>
                                <input type="text" name="country" placeholder=" USA..." class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td> 
                                <label>Facebook:</label>
                            </td>
                            <td>
                                <input type="text" name="facebook" placeholder="Ex.www.fb.com/thomlinson..." class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td> 
                                <label>Linkdin:</label>
                            </td>
                            <td>
                                <input type="text" name="linkdin" placeholder="Ex.www.linkedin.com/thomlinson..." class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td> 
                                <label>Twitter:</label>
                            </td>
                            <td>
                                <input type="text" name="twitter" placeholder="Ex.www.twitter.com/thomlinson..." class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td> 
                                <label>Company Name(id):</label>
                            </td>
                            <td>
                                <input type="text" name="company_id" id="company_id" placeholder="Ex. Hp..." class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td> 
                                <label>Job Title(id):</label>
                            </td>
                            <td>
                                <input type="text" name="job_title_id" placeholder="Ex. CEO..." class="medium" />
                            </td>
                        </tr>
                         <div id="skillstatus"></div>
                       
						  <tr> 
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="Save" />
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>

<!--  <script type="text/javascript">

$(document).ready(function(){
    $('#company_id').keyup(function(){
        var company_id = $(this).val();
        if (company_id != '') {
            $.ajax({
                url:"checkcompany.php",
                method:"POST",
                data:{company_id:company_id},
                success:function(data){
                $('#skillstatus').fadeIn();
                $('#skillstatus').html(data);
                }
            });
        }

    });  

    $(document).on('click', 'li', function(){
        $("#company_id").val($(this).text());
        $('#skillstatus').fadeOut();
    });
  
});  

</script>  -->

<?php include 'inc/footer.php' ?>