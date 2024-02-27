<?php include('header.php');
include('navbar.php'); 
?>
<div class="col-sm-9" style="margin-top: 30px; margin-left:230px;">
<div class="main-content" style="margin-top:-50px;">
	<div class="wrapper container-fluid">
		<h2>Manage Enrollment</h2>
		<br>
			<?php  
				if(isset($_SESSION['add']))
				{
					echo $_SESSION['add'];
					unset($_SESSION['add']);
				}
				if(isset($_SESSION['remove']))
				{
					echo $_SESSION['remove'];
					unset($_SESSION['remove']);
				}
				if(isset($_SESSION['delete']))
				{
					echo $_SESSION['delete'];
					unset($_SESSION['delete']);
				}
				if(isset($_SESSION['no-category-found']))
				{
					echo $_SESSION['no-category-found'];
					unset($_SESSION['no-category-found']);
				}
				if(isset($_SESSION['update']))
				{
					echo $_SESSION['update'];
					unset($_SESSION['update']);
				}
				if(isset($_SESSION['upload']))
				{
					echo $_SESSION['upload'];
					unset($_SESSION['upload']);
				}
				if(isset($_SESSION['failed-remove']))
				{
					echo $_SESSION['failed-remove'];
					unset($_SESSION['failed-remove']);
				}
			?>


			<!--Button to Add Admin-->

			<table class="table table-striped table-bordered tbl-full">
				<thead>
					<tr>
						<th>S.N.</th>
						<th>First Name</th>
						<th>Last Name</th>
						<th>Address</th>
						<th>Phone</th>
						<th>Gender</th>
						<th>Email</th>
						<th>Course</th>
						<!-- <th>Status</th> -->
						<th>Action</th>	
					</tr>
				</thead>

				<?php  

					//qury to get all categiry from db
					$sql = "SELECT * FROM tbl_enroll";

					//execute the query
					$res =  mysqli_query($conn,$sql);

					//count rows
					$count = mysqli_num_rows($res);

					//create serial number variable and assign value as 1
					$sn = 1;

					//check whether we have data in db or not
					if($count>0)
					{
						//we have data in db
						//get the data and display
						while ($row = mysqli_fetch_assoc($res)) 
						{
							$id = $row['id'];
							$firstname = $row['first_name'];
                            $lastname = $row['last_name'];
                            $address = $row['address'];
                            $phone = $row['phone'];
                            $gender = $row['gender'];
                            $email = $row['email'];
                            $course = $row['course'];
							// $status=$row['status'];
                    
							?>

						<tr>
							<td><?php echo $sn++; ?></td>
							<td><?php echo $firstname; ?></td>
                            <td><?php echo $lastname; ?></td>
                            <td><?php echo $address; ?></td>
                            <td><?php echo $phone; ?></td>
							<td><?php echo $gender; ?></td>
                            <td><?php echo $email; ?></td>
                            <td><?php echo $course; ?></td>
							<!-- <td class="fw-bold">
									<?php  
									if ($status=="Pending")
									 {
									 	echo "<label style='color: #0099cc;'><b>$status</b></label>";	
									}
									elseif ($status=="Accepted") 
									{
										echo "<lable style='color: #29a329;'><b>$status</b></label>";
									}
									elseif ($status=="Rejected") 
									{
										echo "<lable style='color: #e60000;'><b>$status</b></label>";
									}
									
									?>

							</td> -->
							<td>
									<a href="update-enrollment.php?id=<?php echo $id; ?>" class="btn-secondary">Update Enrollment</a> 
							
						</tr>


							<?php 

						}
					}
					else
					{
						//we don't have data
						//we will display the message inside table
						?>

						<tr>
							<td colspan="6"><div class="error">No Enrollment Found.</div></td>
						</tr>

						<?php  


					}
				?>
			
			</table>
	</div>
</div>
</div>












<!-- ------------------------------------------------------------------ -->

