<?php include'inc/header.php'; ?>
<?php include'inc/sidebar.php'; ?>

        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Import </h2>

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
                                              $Fname        = $data[0];  
                                              $Lname        = $data[1];
                                              $job_title    = $data[2];
                                              $email        = $data[3];
                                              $d_phone      = $data[4];
                                              $city         = $data[5];
                                              $country      = $data[6];
                                              $company      = $data[7];
                                              $linkedin_pro = $data[8];

                                              $notFound = true;

                                    $formatch = $db->getalldata();
                                    if ($formatch) {

                                    foreach ($formatch as $info){
                                    if ($info['Fname'] == $Fname && $info['Lname'] == $Lname || $info['d_phone'] == $d_phone || $info['email'] == $email) {

                                        $matchCount = $matchCount+1;
                                        $notFound = false;
                                         break;

                 
                                        }

                                    }

                                   if ($notFound) {
                                       $result = $db->insertData($Fname,$Lname,$job_title,$email,$d_phone,$city,$country,$company,$linkedin_pro);

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
                              <td>
                                    <label>Select a CSV File:</label>
                                  
                              </td>
                              <td>
                                  <input type="file" name="file" />
                              </td>
                          </tr>
                         
  						            <tr>
                              <td></td>
                              <td>
                                  <input type="submit" name="submit" value="Import" />
                              </td>
                          </tr>
                      </table>
                  </form>

                </div>
            </div>
        </div>

   

<?php include'inc/footer.php'; ?>