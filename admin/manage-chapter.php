<?php
include('header.php');
?>

<div class="main-content">
	<div class="wrapper">
		<h1>Manage Chapter</h1>
		<br><br>

			<?php  
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
			<a href="add-chapter.php" class="btn-primary">Add Chapter</a>
			<br>
			<br>
			<br>
			<table class="tbl-full">
				<tr>
					<th>S.N.</th>
					<th>Title</th>
					<th>Active</th>
					<th>Actions</th>
				</tr>

				<?php  
					//create sql query too get all the food
					$sql = "SELECT * FROM tbl_chapter";

					//execute the query
					$res = mysqli_query($conn,$sql);

					//count rows to check whether we have food or not
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
							$title = $row['name'];
							$active = $row['active'];
							?>

							<tr>
								<td><?php echo $sn++; ?></td>
								<td><?php echo $title; ?></td>
								<td><?php echo $active; ?></td>
								<td>
									<a href="update-chapter.php?id=<?php echo $id; ?>" class="btn-secondary">Update Chapter</a> 
									<a href="delete-chapter.php?id=<?php echo $id; ?>" class="btn-danger">Delete Chapter</a>
								</td>
							</tr>

							<?php
						}
					}
					else
					{
						//food not added in db
						echo "<tr><td colspan='7' class='error'>chapter not added yet.</td></tr>";
					}
				?>

				
				
			</table>
	</div>
</div>
