<?php include'inc/header.php'; ?>
<?php include'inc/sidebar.php'; ?>

        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Import Company CSV/Excel File. </h2>

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
                                              $c_name         = $data[0];  
                                              $revenue        = $data[1];
                                              $employees      = $data[2];
                                              $industry       = $data[3];
                                              $proANDsevice   = $data[4];
                                              $c_details      = $data[5];
                                              $c_address      = $data[6];
                                              $c_phone        = $data[7];
                                              $c_fax          = $data[8];
                                              $c_web          = $data[9];
                                              $c_fb           = $data[10];
                                              $c_linkedin     = $data[11];
                                              $c_twiter       = $data[12];


                                              $notFound = true;

                            $formatch = $db->getallCompanyData();
                              if ($formatch) {

                              foreach ($formatch as $info){
                              if ($info['company_name'] == $c_name || $info['c_web'] == $c_web || $info['c_phone'] == $c_phone || $info['c_fax'] == $c_fax || $info['c_linkedin'] == $c_linkedin) {

                                        $matchCount = $matchCount+1;
                                        $notFound = false;
                                         break;

                                        }

                                    }

                                   if ($notFound) {
                                       $result = $db->insertCompanyInformation($c_name,$revenue,$employees,$industry,$proANDsevice,$c_details,$c_address,$c_phone,$c_fax,$c_web,$c_fb,$c_linkedin,$c_twiter);

                                      $count = $count+1;
                                    }


                                 }

                              
                              }

                              echo "<span class = 'success'>$count Company information Inserted Successfully.</br></span>";
                               echo "<span class = 'error'>$matchCount Company information already in the Table.</span>";
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
                                    <label>Select Company CSV/Excel File:</label>
                                  
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
                      <p><b>Note:</b> CSV File data Sequence/format should be like below.<br>
                      (Company name, Revenue, Employees,Industry,Product & Services,Company Details,Company Address ,Phone, Fax ,Website Url, Facebook Url, Linkedin Url ,Twitter Url.)</p>
                  </div>

                </div>
            </div>
        </div>

   

<?php include'inc/footer.php'; ?>
