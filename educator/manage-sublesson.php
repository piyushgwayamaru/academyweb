<?php
include('header.php');
include('navbar.php');
?>

<div class="col-sm-9">
<div class="main-content" style="margin-top:-50px;">
	<div class="wrapper">
		<h2>Manage Sub lesson</h2>
		
		<?php  
				if (isset($_GET['id'])){
					$lesson_id = $_GET['id'];
				}
				if (isset($_SESSION['add'])) 
				{
					echo $_SESSION['add'];
					unset($_SESSION['add']);
				}
				if (isset($_SESSION['delete'])) 
				{
					echo $_SESSION['delete'];
					unset($_SESSION['delete']);
				}
				if (isset($_SESSION['upload'])) 
				{
					echo $_SESSION['upload'];
					unset($_SESSION['upload']);
				}
				if (isset($_SESSION['unauthorized'])) 
				{
					echo $_SESSION['unauthorized'];
					unset($_SESSION['unauthorized']);
				}
				if (isset($_SESSION['update'])) 
				{
					echo $_SESSION['update'];
					unset($_SESSION['update']);
				}
				if (isset($_SESSION['failed-remove'])) 
				{
					echo $_SESSION['failed-remove'];
					unset($_SESSION['failed-remove']);
				}

			?>

<br><br>
			<!--Button to Add Admin-->
			<a href="add-sublesson.php?id=<?php echo $lesson_id;?>" class="btn-primary">Add Sub lesson</a>
			<br>
			<br>
			<br>
			<table class="table table-striped tbl-full">
				<thead>

					<tr>
						<th>S.N.</th>
						<th>Sublesson ID</th>
						<th>Title</th>
						<th>Active</th>
						<th>Video</th>
						<th>Duration</th>
						<th>PDF Notes</th>
						<th>Actions</th>
					</tr>
				</thead>

				<?php  
					//create sql query too get all 
					$sql = "SELECT * FROM tbl_sublesson where lesson_id='$lesson_id'";

					//execute the query
					$res = mysqli_query($conn,$sql);

					//count rows to check whether we have  or not
					$count = mysqli_num_rows($res);

					//create serial no variable and set default value as 1 
					$sn = 1;

					if ($count>0) 
					{
						//we have food in db
						//get the foods from db and display
						while ($row = mysqli_fetch_assoc($res)) 
						{
							//get the value from the indivisual column
							$id = $row['sublesson_id'];
							$title = $row['sublesson_name'];
							$video = $row['sublesson_video'];
							$duration = $row['duration'];
							$pdf_notes = $row['pdf_notes'];
							$active = $row['active'];
							?>

							<tr>
								<td><?php echo $sn++; ?></td>
								<td><?php echo $id; ?></td>
								<td><?php echo $title; ?></td>
								<td><?php echo $active; ?></td>
								<td><?php echo $video; ?></td>
								<td><?php echo $duration; ?></td>
								<td><?php echo $pdf_notes; ?></td>
								<td>
									
									<a href="update-sublesson.php?id=<?php echo $id;?>" class="btn btn-secondary"><i class="fas fa-pen fa-2x"></a></i>
							
									<a href="delete-sublesson.php?id=<?php echo $id;?>&lesson_id=<?php echo $lesson_id; ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this sublesson?')"><i class="far fa-trash-alt fa-2x"></i></a>	
									
								</td>
							</tr>

							<?php
							
						}
					}
					else
					{
						// not added in db
						echo "<tr><td colspan='7' class='error'>Lesson not added yet.</td></tr>";
					}
				?>

				
				
			</table>
	</div>
</div>
