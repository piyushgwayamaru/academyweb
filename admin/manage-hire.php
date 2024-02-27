<?php
include('header.php'); 
?>

<div class="main-content">
	<div class="wrapper">
		<h1>Manage Hiring</h1>
		<br><br>

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

			<table class="tbl-full">
				<tr>
					<th>S.N.</th>
					<th>First Name</th>
					<th>Last Name</th>
					<th>Address</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Course</th>
                    <th>CV</th>
					<th>Status</th>
					<th>Action</th>
                   
				</tr>

				<?php  

					//qury to get all categiry from db
					$sql = "SELECT * FROM tbl_instructor_enroll";

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
                            $email = $row['email'];
                            $course = $row['course'];
                            $cv = $row['cv'];
							$status = $row['status'];
                    
							?>

						<tr>
							<td><?php echo $sn++; ?></td>
							<td><?php echo $firstname; ?></td>
                            <td><?php echo $lastname; ?></td>
                            <td><?php echo $address; ?></td>
                            <td><?php echo $phone; ?></td>
							<td><?php echo $email; ?></td>
                            <td><?php echo $course; ?></td>
                            <td><a href="cv/<?php echo $cv ?>"  target="_blank">Check CV</a></td>
							<td class="fw-bold">
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

							</td>
							<td><a href="update-hire.php?id=<?php echo $id; ?>" class="btn-secondary">Update Staus</a> </td>
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
							<td colspan="6"><div class="error">No New Application Found.</div></td>
						</tr>

						<?php  


					}
				?>

				
			
			</table>
	</div>
</div>
