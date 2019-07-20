<?php include'inc/header.php'; ?>
<?php include'inc/sidebar.php'; ?>
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Add New Job Title</h2>
               <div class="block copyblock"> 
               <?php

                  if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        $title =($_POST['title']);
                        $level =($_POST['level']);

                  if (empty($title) || empty($level) ) {
                     echo "<span class = 'error'>Field must not be empty !!</span>";
                  }else{
                      $result = $db-> addNewJobTitle($title,$level);

                      if ($result) {
                           echo "<span class = 'success'>Job Title Inserted successfully</span>";
                      }else{
                           echo "<span class = 'error'>Something Wrong</span>";
                      }
                  }

              }

                 ?>

                 <form action="" method="post">
                    <table class="form">					
                        <tr>
                            <th> 
                                <label>Enter Job Title:</label>
                            </th>
                            <td>
                                <input type="text" name="title" placeholder="Ex.Ceo,CFO..." class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <th> 
                                <label>Enter Job Level:</label>
                            </th>
                            <td>
                                <input type="text" name="level" placeholder="Ex.C-level,Director-level..." class="medium" />
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