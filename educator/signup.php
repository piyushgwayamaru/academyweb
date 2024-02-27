<?php 
	include('../config/constants.php'); 
?>

	<?php 

	$msg = "";
		
		if(isset($_POST['submit']))
		{
							$name = mysqli_real_escape_string($conn,$_POST['name']);
							$_SESSION['name'] = $name;
							$email = mysqli_real_escape_string($conn,$_POST['email']);
							$password = mysqli_real_escape_string($conn,md5($_POST['password']));

							if(mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tbl_educator WHERE email = '{$email}'")) > 0)
							{
								$msg = "<div class='alert alert-danger'>{$email} - This email is already taken.</div>";
								echo $msg;
							}


								else 
								{
									$sql = "INSERT INTO tbl_educator (name, email, password) VALUES ('{$name}', '{$email}', '{$password}')";
									$result = mysqli_query($conn, $sql);
									if($result)
									{
										$msg = "<div class='alert alert-success text-center'>Account Created.</div>";
										echo $msg;
									}
								}

		}

		

	?>

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
	<!-- signup sections starts -->
	<section class="signup section-padding">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-7 col-lg-6 col-xl-5">
					<div class="signup-form box">
						<h2 class="form-title text-center">Educator's<br>Create Your Account</h2>
						<form action="" method="post">
							<div class="form-group">
								<input type="text" name="name" class="form-control" placeholder="Full Name">
							</div>
							<div class="form-group">
								<input type="text" name="email" class="form-control" placeholder="Email">
							</div>
							<div class="form-group">
								<input type="password" name="password" class="form-control" placeholder="Password">
							</div>
							<button type="submit" name="submit" class="btn btn-theme btn-block btn-form">Sign Up</button>
							<p class="text-center mt-4 mb-0">Already have an account?<a href="login.php"> Log In</a></p>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- signup section ends -->
	</body>
	</html>
