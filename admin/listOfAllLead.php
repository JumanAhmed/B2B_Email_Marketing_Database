<?php include'inc/header.php'; ?>
<?php include'inc/sidebar.php'; ?>

        <div class="grid_10">
            <div class="box round first grid">
                <h2>All Lead List</h2>

                <?php
                   if (isset($_GET['delid'])) {
                  	 $delid = $_GET['delid'];
                  	 $result = $db-> deleteSingleLeadInfo($delid);

                  	  if ($result) {
                           echo "<span class = 'success'>Lead Info Deleted successfully</span>";
                      }else{
                          echo "<span class = 'error'>Lead Info Not Deleted successfully</span>";
                      }
                   }
                    
                ?>

                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th width="5%">ID</th>
							<th width="10%">Fname</th>
							<th width="10%">Lname</th>
							<th width="10%">Phone</th>
							<th width="15%">Email</th>
							<th width="10%">Country</th>
							<th width="10%">Company</th>
							<th width="10%">Job Tittle</th>
							<th width="15%">Action</th>
							
						</tr>
					</thead>
					<tbody>
					<?php
					
						$result = $db-> getAllLeadInfo();
						 foreach ($result as $item) {
							if ($result) {
							

					?>
						<tr class="odd gradeX">
							<td><?php echo $item['id_lead']; ?></td>
							<td><?php echo $item['fName']; ?></td>
							<td><?php echo $item['lName']; ?></td>
							<td><?php echo $item['d_phone']; ?></td>
							<td><?php echo $item['email']; ?></td>
							<td><?php echo $item['country']; ?></td>
							<td>
								<?php
								       $company_id = $item['id_c']; 
								       $company_name = $db-> getCompanyNameById($company_id);
								       echo $company_name;
								 ?>
								
							</td>
							<td>
								<?php 

								      $job_title_id =  $item['id_j']; 
								      $job_title = $db-> getJobTitleById($job_title_id);
								      echo $job_title;

								?>		
							</td>

							
							<td>
							<a href="editSingleLeadInfo.php?editid=<?php echo $item['id_lead']; ?>">Edit</a> 
							|| 
							<a onclick="return confirm('Are You Sure to Delete this Lead info!!');" href="?delid=<?php echo $item['id_lead']; ?>">Delete</a>
							</td>
						</tr>

					<?php } } ?>	
						
					</tbody>
				</table>
               </div>
            </div>
        </div>
        


<script type="text/javascript">

        $(document).ready(function () {
            setupLeftMenu();

            $('.datatable').dataTable();
            setSidebarHeight();


        });
    </script>

 <?php include'inc/footer.php'; ?>