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
                <h2>Update Job Title</h2>

                <?php 

                    if ($_SERVER["REQUEST_METHOD"] == "POST"){
                          $title    = $_POST['title'];
                          $level    = $_POST['level'];
                       if (empty($title) || empty($level)) {
                            echo "<span  style='color:red'>Field must not be empty !!</span>";
                         } else{

                              $result =$db-> updateJobTitle($title,$level,$editid);
                              if ($result) {
                                  echo "<span style = 'color: green'></span>Job Title Update successfully !";
                              }else {
                                     echo "<span style='color:red'>Job Title Not Update successfully !</span>";
                                    }
                         } 
                          

                     }


                ?>
               <div class="block "> 

               <?php
                      $value = $db-> getSingleJobTitleById($editid);
                      if ($value) {
                        foreach ($value as $sv) {

               ?>
                 <form action="" method="post">
                    <table class="form">          
                        <tr>
                            <th> 
                                <label>Edit Job Title:</label>
                            </th>
                            <td>
                                <input type="text" name="title" value="<?php echo $sv['title_name']; ?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <th> 
                                <label>Edit Job Level:</label>
                            </th>
                            <td>
                                <input type="text" name="level" value="<?php echo $sv['level']; ?>" class="medium" />
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