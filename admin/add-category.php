<?php  
	include('header.php');
?>

<div class="main-content">
	<div class="wrapper">
		<h1>Add Category</h1>
		<br><br>

		<?php  
			if(isset($_SESSION['add']))
			{
				echo $_SESSION['add'];
				unset($_SESSION['add']);
			}
			if(isset($_SESSION['upload']))
			{
				echo $_SESSION['upload'];
				unset($_SESSION['upload']);
			}
		?>

		<br><br>


		<!--Add Category Form Starts-->

		<form method="POST" enctype="multipart/form-data">
			<table class="tbl-30">
				<tr>
					<td>Name:</td>
					<td>
						<input type="text" name="title" placeholder="Category Title">
					</td>
				</tr>
					<td>Active:</td>
					<td>
						<input type="radio" name="active" value="Yes">Yes
						<input type="radio" name="active" value="No">No
					</td>
				</tr>
				<tr>
					<td colspan="2">
						<input type="submit" name="submit" value="Add Category" class="btn-secondary">
					</td>
				</tr>
			</table>
		</form>

		<!--Add Category Form Ends-->

<?php  
	//check whether the submit button is clicked or not
	if(isset($_POST['submit']))
	{
		//get the value from category form
		$title = $_POST['title'];

		//for radio input, we need to check whether the button is selected or not
		

		if(isset($_POST['active']))
		{
			//get the value from form
			$active =$_POST['active'];
		}
		else
		{
			//set the default value
			$active = "No";
		}

		
		//create sql query to insert categiry into db
		$sql = "INSERT INTO tbl_category SET
			name = '$title',
			active = '$active'
		";

		//execute the query and save in db
		$res =  mysqli_query($conn,$sql);

		//check whether the query executed or not and data added or not
		if($res == true)
		{
			//query executed and category added
			$_SESSION['add'] = "<div class='success'>Category added successfully.</div>";
			//redirect to manage category page
			header('location:'.'manage-category.php');
		}
		else
		{
			//failed to add category
			$_SESSION['add'] = "<div class='error'>Failed to add category.</div>";
			//redirect to manage category page
			header('location:'.'add-category.php');
		}
	}

?>


	</div>
</div>
