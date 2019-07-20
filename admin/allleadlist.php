<?php include'inc/header.php'; ?>
<?php include'inc/sidebar.php'; ?>

        <div class="grid_10">
            <div class="box round first grid">
                <h2>All lead info</h2>
                <div class="block">  
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th width="5%">id</th>
							<th width="10%">Fname</th>
							<th width="10%">Lname</th>
							<th width="10%">Job Title</th>
							<th width="10%">Email</th>
							<th width="10%">Phone</th>
							<th width="10%">City</th>
							<th width="10%">Country</th>
							<th width="10%">Company</th>
							<th width="10%">Linkedin</th>
							<th width="10%">Edit</th>

						</tr>
					</thead>
					<tbody>
					<?php   
							$allinfo = $db-> getalldata();
							if ($allinfo) {
								foreach ($allinfo as $info) {
									

					 ?>
						<tr class="odd gradeX">
							<td><?php echo $info['id'];?></td>
							<td><?php echo $info['Fname'];?></td>
							<td><?php echo $info['Lname'];?></td>
							<td><?php echo $info['job_title'];?></td>
							<td><?php echo $info['email'];?></td>
							<td><?php echo $info['d_phone'];?></td>
							<td><?php echo $info['city'];?></td>
							<td><?php echo $info['country'];?></td>
							<td><?php echo $info['company'];?></td>
							<td><?php echo $info['linkedin_pro'];?></td>
							<td>
							<a href="editrestaurent.php?editid=<?php echo $info['id']; ?>">Edit</a> 
							|| 
							<a onclick="return confirm('Are You Sure to Delete the Restaurant from table!!');" href="deleterestaurent.php?delid=<?php echo $info['id']; ?>">Delete</a>
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