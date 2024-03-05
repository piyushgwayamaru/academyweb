<?php include('header.php'); ?>

	<!--breadcrumb starts-->
			<div class="breadcrumb-nav">
				<div class="container">
					<nav aria-label="breadcrumb">
					  <ol class="breadcrumb mb-0">
						<li class="breadcrumb-item"><a href="index.php">Home</a></li>
						<li class="breadcrumb-item active" aria-current="page">log In</li>
					  </ol>
					</nav>
				</div>
			</div>
		<!--breadcrumb ends-->


		<?php 

			

		$msg="";
				if(isset($_GET['verification']))
				{
					if(mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tbl_user WHERE code = '{$_GET['verification']}'")) > 0)
					{
						$query = mysqli_query($conn, "UPDATE tbl_user SET code='' WHERE code='{$_GET['verification']}'");

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
					
					$sql = "SELECT * FROM tbl_user WHERE email='{$email}' AND password='{$password}'";
					$result = mysqli_query($conn, $sql);

					if(mysqli_num_rows($result) == 1)
					{
						$row = mysqli_fetch_assoc($result);

						if(empty($row['code']))
						{
							$_SESSION['SESSION_EMAIL'] = $email;
							
							header('location:'.'index.php');
						}

						else 
						{
							$msg= "<div class='alert alert-info'>First Verify Your Account and Try Again. </div>";
							echo $msg;
						}
						
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
							<h2 class="form-title text-center">Log In to Your Account</h2>
							<form action="" method="post">
								<div class="form-group">
									<input type="text" name="email" class="form-control" placeholder="Email" required>
								</div>
								<div class="form-group">
									<div class="d-flex mb-2 justify-content-end"><a href="forget-password.php">Forgot Password?</a></div>
									<input type="password" name="password" class="form-control" placeholder="Password" required>
								</div>
								<button name="submit" type="submit" class="btn btn-theme btn-block btn-form">Log In</button>
								<p class="text-center mt-4 mb-0">Don't have an account?<a href="sign-up.php"> Sign Up</a></p>
							</form>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- login section ends -->

		<?php include('footer.php'); ?>