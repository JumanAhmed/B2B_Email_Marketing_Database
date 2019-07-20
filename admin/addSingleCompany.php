<?php include'inc/header.php'; ?>
<?php include'inc/sidebar.php'; ?>
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Add New Company Information</h2>
               <div class="block copyblock"> 
               <?php

                  if ($_SERVER["REQUEST_METHOD"] == "POST") {
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
                     empty($industry) || empty($pro_and_service) || empty($c_details) ||      empty($c_address) || empty($c_phone)|| empty($c_fax) || empty($c_web) ||  empty($c_fb) || empty($c_linkedin) || empty($c_twitter) ) {
                     echo "<span class = 'error'>Field must not be empty !!</span>";
                  }else{
                      $result = $db->insertCompanyInformation($company_name,$revenue,$employees,$industry,$pro_and_service,$c_details,$c_address,$c_phone,$c_fax,$c_web,$c_fb,$c_linkedin,$c_twitter);

                      if ($result) {
                           echo "<span class = 'success'>New Company Inserted successfully</span>";
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
                                <label>Company name:</label>
                            </td>
                            <td>
                                <input type="text" name="name" placeholder="Ex.Apple..." class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td> 
                                <label>Revenue:</label>
                            </td>
                            <td>
                                <input type="text" name="revenue" placeholder="Ex.50 Billion..." class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td> 
                                <label>Total Employees:</label>
                            </td>
                            <td>
                                <input type="text" name="employees" placeholder="Ex.10,000..." class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td> 
                                <label>Industry:</label>
                            </td>
                            <td>
                                <input type="text" name="industry" placeholder="Ex.Software..." class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td> 
                                <label>Product & Services:</label>
                            </td>
                            <td>
                                <input type="text" name="proAndService" placeholder="Ex.Computer,Mobile..." class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td> 
                                <label>Details:</label>
                            </td>
                            <td>
                                <input type="text" name="details" placeholder="Ex.Summary of the Company..." class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td> 
                                <label>Address:</label>
                            </td>
                            <td>
                                <input type="text" name="address" placeholder="Enter full address..." class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td> 
                                <label>Phone:</label>
                            </td>
                            <td>
                                <input type="text" name="phone" placeholder="Ex.1 344 3443..." class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td> 
                                <label>Fax:</label>
                            </td>
                            <td>
                                <input type="text" name="fax" placeholder="Ex.234343..." class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td> 
                                <label>Web:</label>
                            </td>
                            <td>
                                <input type="text" name="Web" placeholder="Ex.www.apple.com..." class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td> 
                                <label>Facebook:</label>
                            </td>
                            <td>
                                <input type="text" name="facebook" placeholder="Ex.www.fb.com/apple..." class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td> 
                                <label>Linkedin:</label>
                            </td>
                            <td>
                                <input type="text" name="linkedin" placeholder="Ex.www.linkedin.com/apple..." class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td> 
                                <label>Twitter:</label>
                            </td>
                            <td>
                                <input type="text" name="twitter" placeholder="Ex.www.twitter.com/apple..." class="medium" />
                            </td>
                        </tr>
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

<?php include 'inc/footer.php' ?>