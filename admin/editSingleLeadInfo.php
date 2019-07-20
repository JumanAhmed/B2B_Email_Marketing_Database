<?php include'inc/header.php'; ?>
<?php include'inc/sidebar.php'; ?>

<?php
 if (!isset($_GET['editid']) || $_GET['editid']==NULL) {
     header("Location: listOfAllJobTitle.php");
 }else{
    $editid = $_GET['editid'];
 }

?>  
        <div class="grid_10">
    
            <div class="box round first grid">
                <h2>Update Lead Information</h2>

                <?php 

                    if ($_SERVER["REQUEST_METHOD"] == "POST"){
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
                            echo "<span  style='color:red'>Field must not be empty !!</span>";
                         } else{

                             $result = $db->updateCompanyById($fname,$lname,$d_phone,$email,$address,$city,$country,$facebook,$linkedin,$twitter,$company_id,$job_title_id,$editid);
                              if ($result) {
                                  echo "<span style = 'color: green'></span>Company Update successfully !";
                              }else {
                                     echo "<span style='color:red'>Company Not Update successfully !</span>";
                                    }
                         } 
                          
                     }

                ?>
               <div class="block "> 

               <?php
                      $value = $db-> getSingleLeadById($editid);
                      if ($value) {
                        foreach ($value as $sv) {

               ?>
                 <form action="" method="post">
                    <table class="form">          
                        
                        <tr>
                            <td> 
                                <label>First Name:</label>
                            </td>
                            <td>
                                <input type="text" name="fname" value="<?php echo $sv['fName']; ?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td> 
                                <label>Last Name:</label>
                            </td>
                            <td>
                                <input type="text" name="lname" value="<?php echo $sv['lName']; ?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td> 
                                <label>Direct Phone:</label>
                            </td>
                            <td>
                                <input type="text" name="d_phone" value="<?php echo $sv['d_phone']; ?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td> 
                                <label>Email:</label>
                            </td>
                            <td>
                                <input type="text" name="email" value="<?php echo $sv['email']; ?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td> 
                                <label>Address:</label>
                            </td>
                            <td>
                                <input type="text" name="address" value="<?php echo $sv['address']; ?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td> 
                                <label>City:</label>
                            </td>
                            <td>
                                <input type="text" name="city" value="<?php echo $sv['city']; ?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td> 
                                <label>Country:</label>
                            </td>
                            <td>
                                <input type="text" name="country" value="<?php echo $sv['country']; ?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td> 
                                <label>Facebook:</label>
                            </td>
                            <td>
                                <input type="text" name="facebook" value="<?php echo $sv['facebook']; ?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td> 
                                <label>Linkdin:</label>
                            </td>
                            <td>
                                <input type="text" name="linkdin" value="<?php echo $sv['linkedin']; ?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td> 
                                <label>Twitter:</label>
                            </td>
                            <td>
                                <input type="text" name="twitter" value="<?php echo $sv['twitter']; ?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td> 
                                <label>Company Name(id):</label>
                            </td>
                             <?php 
                                    $c_id = $sv['id_c'];
                                    $r = $db->getSingleCompanyById($c_id);
                                    foreach ($r as $value) {
                                        $name = $value['company_name'];
                                    

                             ?>
                            <td>
                                <input type="text" name="company_id" id="company_id" 
                                value="<?php echo $name; ?>" class="medium" />
                            </td>
                            <?php } ?>
                        </tr>
                        <tr>
                            <td> 
                                <label>Job Title(id):</label>
                            </td>

                            <?php 
                                    $j_id = $sv['id_j'];
                                    $r = $db->getSingleJobTitleById($j_id);
                                    foreach ($r as $value) {
                                        $name = $value['title_name'];
                                    

                             ?>
                            <td>
                                <input type="text" name="job_title_id" value="<?php echo $name  ?>" class="medium" />
                            </td>
                             <?php } ?>
                        </tr>
                           
                         <tr>
                            <td>
                            </td>
                            <td>
                                <input type="submit" name="submit" Value="Update" />
                            </td>
                        </tr>
                    </table>
                    </form>

                    <?php } } ?>

                </div>
            </div>
        </div>
        
<?php include'inc/footer.php'; ?>