<?php  
	include('header.php');
?>

<div class="main-content">
	<div class="wrapper">
		<h1>Update Category</h1>
		<br><br>

	<?php  
		if(isset($_GET['id']))
		{
			//get id and other detail
			$id = $_GET['id'];
			//create sql query to get all other details
			$sql = "SELECT * FROM tbl_category WHERE id = $id";

			//execute the query
			$res = mysqli_query($conn,$sql);

			//count the rowa to check whether the id is valid or not
			$count = mysqli_num_rows($res);

			if($count == 1)
			{
				//get all the data
				$row = mysqli_fetch_assoc($res); 
				$title = $row['name'];
				$active = $row['active'];
			}
			else
			{
				//redirect to manage category with session
				$_SESSION['no-category-found'] = "<div class='error'>Category not found</div>";
				header('location:'.'manage-category.php');
			}
		}
		else
		{
			//redirect to manage category
			header('location:'.'manage-category.php');
		}
	?>

		<form method="POST" enctype="multipart/form-data">

			<table class="tbl-30">
				<tr>
					<td>Title:</td>
					<td> 
						<input type="text" name="title" value="<?php echo $title;?>" placeholder="">
					</td>
				</tr>
                <tr>
					<td>Active:</td>
					<td>
						<input <?php if ($active == "Yes") {echo "checked";} ?> type="radio" name="active" value="Yes">Yes
						<input <?php if ($active == "No") {echo "checked";} ?> type="radio" name="active" value="No">No
					</td>
				</tr>
				<tr>
					<td>
						<input type="hidden" name="id" value="<?php echo $id;  ?>">
						<input type="submit" name="submit" value="Update Category" class="btn-secondary">
					</td>
				</tr>
			</table>
		</form>

		<?php  

			if(isset($_POST['submit']))
			{
				//get all the values from form
				$id = $_POST['id'];
				$title = $_POST['title'];
				$active = $_POST['active'];

				

				//update the database
				$sql2 = "UPDATE tbl_category SET
					name =  '$title',
					active = '$active'
					WHERE id = $id

				"; 

				//execute the query
				$res2 = mysqli_query($conn,$sql2);

				//redirect manage category with imagae
				//check whether executed or not
				if ($res2 == true) 
				{
					//category updated
					$_SESSION['update'] = "<div class= 'success'>Category updated successfully.</div>";
					header('location:'.'manage-category.php');
				}
				else
				{
					//failed to update category
					$_SESSION['update'] = "<div class= 'error'>Failed to update category.</div>";
					header('location:'.'manage-category.php');
				}
				
			}

		?>

	</div>
</div>
