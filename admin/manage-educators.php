<?php
include('header.php'); 
include('navbar.php'); 
?>
 <div class="col-sm-9" style="margin-top: 30px; margin-left:230px;">

<div class="main-content">
	<div class="wrapper">
		<h1>Manage Educators</h1>
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


			<table class="tbl-full">
				<tr>
					<th>S.N.</th>
					<th>Name</th>
					<th>Email</th>
					<!-- <th>Active</th> -->
					<!-- <th>Actions</th> -->
				</tr>

				<?php  

					//qury to get all categiry from db
					$sql = "SELECT * FROM tbl_educator";

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
							$name = $row['name'];
							$email = $row['email'];

							// $active = $row['active'];
							?>

						<tr>
							<td><?php echo $sn++; ?></td>
							<td><?php echo $name; ?></td>
							<td><?php echo $email; ?></td>

							<!-- <td><?php #echo $active; ?>
							<td>
								<a href="update-category.php?id=<?php #echo $id; ?>" class="btn-secondary">Update Category</a> 
								<a href="delete-category.php?id=<?php #echo $id; ?>" class="btn-danger" onclick="return confirm('Are you sure you want to delete this category?')">Delete Category</a>
							</td> -->
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
							<td colspan="6"><div class="error">No educators yet.</div></td>
						</tr>

						<?php  


					}
				?>

				
			
			</table>
	</div>
</div>
</div>
