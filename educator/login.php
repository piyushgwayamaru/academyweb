<?php include('../config/constants.php'); ?>




<!DOCTYPE html>
<html lang="en">
<head>
	<title>AcademyWeb</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<link rel="stylesheet" type="text/css" href="../css/responsive.css">

	<link rel="stylesheet" class="js-glass-style" href="../css/glass.css" disabled> 
	<link rel="stylesheet" class="js-color-style" href="../css/colors/color-1.css">
</head>
<body>


	<?php
		if(isset($_SESSION['login_educator']))
		{
			echo $_SESSION['login_educator'];
			unset($_SESSION['login_educator']);
		}
		if (isset($_SESSION['no-login-message'])) 
		{
			echo $_SESSION['no-login-message'];
			unset($_SESSION['no-login-message']);
		}
	?>

<?php 

			

$msg="";
		if(isset($_GET['verification']))
		{
			if(mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tbl_educator WHERE code = '{$_GET['verification']}'")) > 0)
			{
				$query = mysqli_query($conn, "UPDATE tbl_educator SET code='' WHERE code='{$_GET['verification']}'");

				if($query)
				{
					$msg = "<div class='alert alert-success'>Account Verification Has Been Successful.</div>";
					echo $msg;
				}
			}
			else
			{
				//header("Location: index.php");
			}
		}

		if(isset($_POST['submit']))
		{
			$email = mysqli_real_escape_string($conn, $_POST['email']);
			$password = mysqli_real_escape_string($conn, md5($_POST['password']));
			
			$sql = "SELECT * FROM tbl_educator WHERE email='{$email}' AND password='{$password}'";
			$result = mysqli_query($conn, $sql);

			if(mysqli_num_rows($result) == 1)
			{
				$row = mysqli_fetch_assoc($result);

				
					$_SESSION['SESSION_EMAIL'] = $email;
					$educator_id = $row['id'];

					$_SESSION['educator_id'] = $educator_id;

					
					header('location:'.'index.php');
				
			}
			else
				{
					$msg= "<div class='alert alert-danger'>Email or Password Does Not Match.</div>";
					echo $msg;
				}
		}
	
?>

<!-- login sections starts -->
<section class="login-section section-padding">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-md-7 col-lg-6 col-xl-5">
						<div class="login-form box">
							<h2 class="form-title text-center">Educator's<br>Log In to Your Account</h2>
							<form action="" method="post">
								<div class="form-group">
									<input type="text" name="email" class="form-control" placeholder="Email">
								</div>
								<div class="form-group">
									<div class="d-flex mb-2 justify-content-end"><a href="forget-password.php">Forgot Password?</a></div>
									<input type="password" name="password" class="form-control" placeholder="Password">
								</div>
								<button name="submit" type="submit" class="btn btn-theme btn-block btn-form">Log In</button>
								<p class="text-center mt-4 mb-0">Don't have an account?<a href="signup.php"> Sign Up</a></p>
							</form>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- login section ends -->
</body>
</html>

<?php  
	//check whether the submit button is clicked or not
	
	if (isset($_POST['submit']))
	{
		//Process for login
		//Get the data from login form
		 //$username = $_POST['username'];
		 //$password = md5($_POST['password']);
		 $email = mysqli_real_escape_string($conn,$_POST['email']);
		 $password = md5($_POST['password']);

		 //sql query to check whether the email and pw exists or not
		 $sql = "SELECT * FROM tbl_educator WHERE email = '$email' AND password = '$password' ";

		 //execute the query
		 $res = mysqli_query($conn,$sql);

		 //count rows to check whether the user exists or not 
		 $count = mysqli_num_rows($res);

		 if($count == 1)
		 {
		 	//user available and login success
		 	$_SESSION['login_educator'] = "<div class='success text-center'>Login Successful.</div>";
		 	$_SESSION['educator'] = $email;//to check whether the user is logged in or not and logout will unset it

		 	//redirect to home page
		 	header('location:'.'index.php');
		 }
		 else
		 {
		 	//user not available and login fail
		 	$_SESSION['login_educator'] = "<div class='error text-center'>Login Failed.</div>";
		 	//redirect to home page
		 	header('location:'.'login.php');
		 }
	}
?>