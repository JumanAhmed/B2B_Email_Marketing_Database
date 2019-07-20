<?php include'inc/header.php'; ?>
<?php include'inc/sidebar.php'; ?>

        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Import Lead CSV/Excel File. </h2>

                 <?php
                        if ($_SERVER["REQUEST_METHOD"] == "POST"){

                          if(isset($_POST["submit"]))
                        {
                           if($_FILES['file']['name'])
                           {
                              $filename = explode(".", $_FILES['file']['name']);
                              if($filename[1] == 'csv')
                              {
                               $count = 0;
                               $matchCount =0;
                              
                               $handle = fopen($_FILES['file']['tmp_name'], "r");
                                 while($data = fgetcsv($handle))
                                 {
                                              $fName         = $data[0];  
                                              $lName         = $data[1];
                                              $d_phone       = $data[2];
                                              $email         = $data[3];
                                              $address       = $data[4];
                                              $city          = $data[5];
                                              $country       = $data[6];
                                              $facebook      = $data[7];
                                              $linkedin      = $data[8];
                                              $twitter       = $data[9];
                                              $company_name  = $data[10];
                                              $job_title     = $data[11];
                                              
                            $notFound = true;

                            $formatch = $db->getAllLeadInfo();
                              if ($formatch) {

                              foreach ($formatch as $info){
                              if ($info['fName'] == $fName && $info['lName'] == $lName || $info['d_phone'] == $d_phone || $info['email'] == $email || $info['linkedin'] == $linkedin) {

                                        $matchCount = $matchCount+1;
                                        $notFound = false;
                                         break;

                                            }

                                    }

                                   if ($notFound) {
                                      $company_id = $db-> getCompanyIdByName($company_name);
                                      $job_title_id = $db-> getJobIdByName($job_title);

                                       $result = $db->insertLeadData($fName,$lName,$d_phone,$email,$address,$city,$country,$facebook,$linkedin,$twitter,$company_id,$job_title_id);
                                    

                                      $count = $count+1;
                                    }


                                 }

                              
                              }

                              echo "<span class = 'success'>$count Lead information Inserted Successfully.</br></span>";
                               echo "<span class = 'error'>$matchCount Lead information already in the Table.</span>";
                               fclose($handle);
                               echo "<script>alert('Import done');</script>";
                           }
                        }
                  }

             }       
      ?>



                <div class="block">               
                 <form action="" method="post" enctype="multipart/form-data">
                      <table class="form">
                         
                          <tr>
                              <th>
                                    <label>Select a Lead CSV/Excel File:</label>
                                  
                              </th>
                              <td>
                                  <input type="file" name="file" />
                              </td>
                          </tr>
                         
  						            <tr>
                              <th></th>
                              <td>
                                  <input type="submit" name="submit" value="Import" />
                              </td>
                          </tr>
                          
                      </table>
                  </form>

                  <div>
                      <p><b>Note:</b> For Lead Data Input,CSV File data Sequence/format should be like below.<br>
                      (First Name,Last name,Direct Phone,Email, Address,City,Country,Facebook, Linkedin,Twitter,Company Name,Job Title)</p>


                      
                  </div>

                </div>
            </div>
        </div>

   

<?php include'inc/footer.php'; ?>
