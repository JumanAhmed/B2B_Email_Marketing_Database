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
                <h2>Update Company</h2>

                <?php 

                    if ($_SERVER["REQUEST_METHOD"] == "POST"){
                        $company_name     =($_POST['name']);
                        $revenue          =($_POST['revenue']);
                        $employees        =($_POST['employees']);
                        $industry         =($_POST['industry']);
                        $pro_and_service  =($_POST['proAndService']);
                        $c_details        =($_POST['details']);
                        $c_address        =($_POST['address']);
                        $c_phone          =($_POST['phone']);
                        $c_fax            =($_POST['fax']);
                        $c_web             =($_POST['Web']);
                        $c_fb             =($_POST['facebook']);
                        $c_linkedin       =($_POST['linkedin']);
                        $c_twitter        =($_POST['twitter']);

                       if (empty($company_name) || empty($revenue) || empty($employees) || 
                     empty($industry) || empty($pro_and_service) || empty($c_details) ||      empty($c_address) || empty($c_phone)|| empty($c_fax) || empty($c_web) ||  empty($c_fb) || empty($c_linkedin) || empty($c_twitter)) {
                            echo "<span  style='color:red'>Field must not be empty !!</span>";
                         } else{

                             $result = $db->updateCompanyById($company_name,$revenue,$employees,$industry,$pro_and_service,$c_details,$c_address,$c_phone,$c_fax,$c_web,$c_fb,$c_linkedin,$c_twitter,$editid);
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
                      $value = $db-> getSingleCompanyById($editid);
                      if ($value) {
                        foreach ($value as $sv) {

               ?>
                 <form action="" method="post">
                    <table class="form">          
                        
                         <tr>
                            <th> 
                                <label>Company name:</label>
                            </th>
                            <td>
                                <input type="text" name="name" value="<?php echo $sv['company_name']; ?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <th> 
                                <label>Revenue:</label>
                            </th>
                            <td>
                                <input type="text" name="revenue" value="<?php echo $sv['revenue']; ?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <th> 
                                <label>Total Employees:</label>
                            </th>
                            <td>
                                <input type="text" name="employees" value="<?php echo $sv['employees']; ?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <th> 
                                <label>Industry:</label>
                            </th>
                            <td>
                                <input type="text" name="industry" value="<?php echo $sv['industry']; ?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <th> 
                                <label>Product & Services:</label>
                            </th>
                            <td>
                                <input type="text" name="proAndService" value="<?php echo $sv['pro_and_service']; ?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <th> 
                                <label>Details:</label>
                            </th>
                            <td>
                                <input type="text" name="details" value="<?php echo $sv['c_details']; ?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <th> 
                                <label>Address:</label>
                            </th>
                            <td>
                                <input type="text" name="address" value="<?php echo $sv['c_address']; ?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <th> 
                                <label>Phone:</label>
                            </th>
                            <td>
                                <input type="text" name="phone" value="<?php echo $sv['c_phone']; ?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <th> 
                                <label>Fax:</label>
                            </th>
                            <td>
                                <input type="text" name="fax" value="<?php echo $sv['c_fax']; ?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <th> 
                                <label>Web:</label>
                            </th>
                            <td>
                                <input type="text" name="Web" value="<?php echo $sv['c_web']; ?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <th> 
                                <label>Facebook:</label>
                            </th>
                            <td>
                                <input type="text" name="facebook" value="<?php echo $sv['c_fb']; ?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <th> 
                                <label>Linkedin:</label>
                            </th>
                            <td>
                                <input type="text" name="linkedin" value="<?php echo $sv['c_linkedin']; ?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <th> 
                                <label>Twitter:</label>
                            </th>
                            <td>
                                <input type="text" name="twitter" value="<?php echo $sv['c_twitter']; ?>" class="medium" />
                            </td>
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