<?php
include('header.php');
include('navbar.php');
?>

<div class="col-sm-9" style="margin-top: 30px; margin-left:230px;">
<div class="main-content" style="margin-top:-50px;">
	<div class="wrapper">
		<h2>Manage lesson</h2>
		
		<?php  
				if (isset($_GET['id'])){
					$course_id = $_GET['id'];
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
			<a href="add-lesson.php?id=<?php echo $course_id;?>" class="btn-primary">Add Lesson</a>
			<br>
			<br>
			<br>
			<table class="table table-striped tbl-full">
				<thead>

					<tr>
						<th>S.N.</th>
						<th>Title</th>
						<th>Active</th>
						<th>Actions</th>
					</tr>
				</thead>

				<?php  
					//create sql query too get all 
					$sql = "SELECT * FROM tbl_lesson where course_id='$course_id'";

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
							$id = $row['id'];
							$title = $row['lesson_name'];
							$active = $row['active'];
							?>

							<tr>
								<td><?php echo $sn++; ?></td>
								<td><a href="manage-sublesson.php?id=<?php echo $id; ?>"><?php echo $title; ?></a></td>
								<td><?php echo $active; ?></td>
								<td>
									<a href="add-sublesson.php?id=<?php echo $id; ?>" class="btn btn-info" title="Add Sublesson"> <i class="fa-solid fa-plus fa-1x"></a></i> &nbsp; 

									<a href="update-lesson.php?id=<?php echo $id; ?>&course_id=<?php echo $course_id; ?>" class="btn btn-secondary"><i class="fas fa-pen fa-2x"></a></i>
							
									<a href="delete-lesson.php?id=<?php echo $id; ?>&course_id=<?php echo $course_id; ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this lesson?')"><i class="far fa-trash-alt fa-2x"></i></a>
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
