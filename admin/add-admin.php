<?php
include('header.php');
?>

<div class="main-content">
	<div class="wrapper">
		<h1>Add Admin</h1>
		<br><br>

		<?php
			if(isset($_SESSION['add']))
			{
				echo $_SESSION['add'];
				unset($_SESSION['add']);
			}
		?>

		<form action="" method="POST">
			<table class="tbl-30">
				<tr>
					<td>Full Name:</td>
					<td>
						<input type="text" name="name" placeholder="Enter your name">
					</td>
				</tr>
				<tr>
					<td>Username:</td>
					<td>
						<input type="text" name="username" placeholder="Enter Username">
					</td>
				</tr>
				<tr>
					<td>Password:</td>
					<td>
						<input type="password" name="password" placeholder="Enter password">
					</td>
				</tr>
				<tr>
					<td colspan="2">
						<input type="submit" name="submit" value="Add Admin" class="btn-secondary">
					</td>
				</tr>
			</table>
		</form>
	</div>
</div>



<?php
if(isset($_POST['submit']))
{
	//1. Get the data from form
	$name = $_POST['name'];
	$username = $_POST['username'];
	$password = md5($_POST['password']);

	//2. SQL query to save the data into database.
	$sql = "INSERT INTO tbl_admin SET
		name = '$name',
		username = '$username',
		password = '$password'
	";

	
	$res = mysqli_query($conn, $sql) or die(mysqli_error());

	if ($res==TRUE) 
	{
		//echo"data inserted";
		//create a session variable to display message
		$_SESSION['add']="<div class='success'>Admin added successfully.</div>";
		//redirect page to manage admin
		header("location:".'manage-admin.php');
	}
	else
	{
		//echo"failed to insert data in database";
		//create a session variable to display message
		$_SESSION['add']=" <div class='error'>Failed to add Admin.</div>";
		//redirect page to add admin
		header("location:".'add-admin.php');
	}
}

?>