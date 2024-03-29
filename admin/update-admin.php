<?php  
include('header.php');
?>
<div class="main-content">
	<div class="wrapper">
		<h1>Update Admin</h1>

		<br><br>

		<?php  
		//get the id of selected admin
		$id = $_GET['id'];

		//create sql query to get details
		$sql = "SELECT * FROM tbl_admin WHERE id=$id";

		//execute the query
		$res = mysqli_query($conn,$sql);

		//check whether the query is executeed or not
		if($res==true)
		{
			//checkk whether data is available or not
			$count = mysqli_num_rows($res);
			//check whether we have admin data or not
			if($count==1)
			{
				//we will get the details
				//echo "Admin Available";
				$row = mysqli_fetch_assoc($res);

				$name = $row['name'];
				$username =  $row['username'];
			}
			else
			{
				//we will redirect to admin page
				header('location:'.'manage-admin.php');
			}
		}

		?>

		<form action="" method="POST">
			<table class="tbl-30">
				<tr>
					<td>Full Name:</td>
					<td>
						<input type="text" name="name" value="<?php echo $name;?>">
					</td>
				</tr>
				<tr>
					<td>Username:</td>
					<td>
						<input type="text" name="username" value="<?php echo $username;?>">
					</td>
				</tr>
				<tr>
					<td colspan="2">
						<input type="hidden" name="id" value="<?php echo $id;  ?>">
						<input type="submit" name="submit" value="Update Admin" class="btn-secondary">
					</td>
				</tr>
			</table>

		</form>

	</div>
</div>

<?php  
	//check whether the submit button is clicked or not
if(isset($_POST['submit']))
{
	//echo "Button Clicked.";
	//get all the vlaue from form to update
	 $id = $_POST['id'];
	 $name = $_POST['name'];
	 $username = $_POST['username'];

	 //create sql query to update admin
	 $sql = "UPDATE tbl_admin SET
	 name = '$name',
	 username = '$username'
	 WHERE id ='$id'
	 ";

	 //execute query
	 $res = mysqli_query($conn,$sql);

	 //check whether the query is executed successfully or not
	 if($res == true)
	 {
	 	//query executed and updated
	 	$_SESSION['update'] = "<div class='success'>Admin updated successfully.</div>";
	 	//redirect to manage_admin page
	 	header("location:".'manage-admin.php');
	 }
	 else
	 {
	 	//failed to update admin
	 	$_SESSION['update'] = "<div class='error'>failed to updated Admin.</div>";
	 	//redirect to manage_admin page
	 	header("location:".'manage-admin.php');
	 }

}
?>

