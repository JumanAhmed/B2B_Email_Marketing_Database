<?php include'inc/header.php'; ?>
<?php include'inc/sidebar.php'; ?>

        <div class="grid_10">
            <div class="box round first grid">
                <h2>All Job Title List</h2>

                <?php
                   if (isset($_GET['delid'])) {
                  	 $delid = $_GET['delid'];
                  	 $result = $db-> deleteJobTitle($delid);

                  	  if ($result) {
                           echo "<span class = 'success'>Job Title Deleted successfully</span>";
                      }else{
                          echo "<span class = 'error'>Job Title Not Deleted successfully</span>";
                      }
                   }
                    
                ?>

                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th width="10%">Serial No.</th>
							<th width="15%" >Job Title</th>
							<th width="15%">Job Level</th>
							<th width="20%">Action</th>
						</tr>
					</thead>
					<tbody>
					<?php
						$result = $db-> getAllJobTitle();
						foreach ($result as $item) {
							if ($result) {
							

					?>
						<tr class="odd gradeX">
							<td><?php echo $item['id_j']; ?></td>
							<td><?php echo $item['title_name']; ?></td>
							<td><?php echo $item['level']; ?></td>
							
							<td>
							<a href="editJobTitle.php?editid=<?php echo $item['id_j']; ?>">Edit</a> 
							|| 
							<a onclick="return confirm('Are You Sure to Delete this Job Title!!');" href="?delid=<?php echo $item['id_j']; ?>">Delete</a>
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