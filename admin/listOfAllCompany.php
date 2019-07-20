<?php include'inc/header.php'; ?>
<?php include'inc/sidebar.php'; ?>

        <div class="grid_10">
            <div class="box round first grid">
                <h2>All Company List</h2>

                <?php
                   if (isset($_GET['delid'])) {
                  	 $delid = $_GET['delid'];
                  	 $result = $db-> deleteSingleCompany($delid);

                  	  if ($result) {
                           echo "<span class = 'success'>Company Deleted successfully</span>";
                      }else{
                          echo "<span class = 'error'>Company Not Deleted successfully</span>";
                      }
                   }
                    
                ?>

                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th width="5%">ID</th>
							<th width="10%">Name</th>
							<th width="10%">Revenue</th>
							<th width="10%">Employee</th>
							<th width="15%">Industry</th>
							<th width="10%">Phone</th>
							<th width="15%">Web</th>
							<th width="10%">Linkedin</th>
							<th width="15%">Action</th>
							
						</tr>
					</thead>
					<tbody>
					<?php
					
						$result = $db-> getallCompanyData();
						 foreach ($result as $item) {
							if ($result) {
							

					?>
						<tr class="odd gradeX">
							<td><?php echo $item['id_c']; ?></td>
							<td><?php echo $item['company_name']; ?></td>
							<td><?php echo $item['revenue']; ?></td>
							<td><?php echo $item['employees']; ?></td>
							<td><?php echo $item['industry']; ?></td>
							<td><?php echo $item['c_phone']; ?></td>
							<td><?php echo $item['c_web']; ?></td>
							<td><?php echo $item['c_linkedin']; ?></td>
							
							<td>
							<a href="editSingleCompany.php?editid=<?php echo $item['id_c']; ?>">Edit</a> 
							|| 
							<a onclick="return confirm('Are You Sure to Delete this Company!!');" href="?delid=<?php echo $item['id_c']; ?>">Delete</a>
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