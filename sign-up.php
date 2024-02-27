<?php 

include('header.php'); 

?>

<!--breadcrumb starts-->
<div class="breadcrumb-nav">
	<div class="container">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb mb-0">
			<li class="breadcrumb-item"><a href="index.php">Home</a></li>
			<li class="breadcrumb-item active" aria-current="page">Sign Up</li>
			</ol>
		</nav>
	</div>
</div>
<!--breadcrumb ends-->

<?php 

$msg = "";
if(isset($_POST['submit']))
{
    $name = mysqli_real_escape_string($conn,$_POST['name']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $password = mysqli_real_escape_string($conn,md5($_POST['password']));
    
    $result = mysqli_query($conn, "SELECT * FROM tbl_user WHERE email = '{$email}'");
    if(mysqli_num_rows($result) > 0)
    {
        $msg = "<div class='alert alert-danger text-center'>{$email} - This email is already taken.</div>";
        echo $msg;
    }
    else 
    {
        $sql = "INSERT INTO tbl_user (name, email, password) VALUES ('{$name}', '{$email}', '{$password}')";
        $result = mysqli_query($conn, $sql);
        if($result)
        {
            $msg = "<div class='alert alert-success text-center'>Account Created.</div>";
            echo $msg;
        }
    }
}


?>

<!-- signup sections starts -->
<section class="signup section-padding">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-7 col-lg-6 col-xl-5">
				<div class="signup-form box">
					<h2 class="form-title text-center">Create Your Account</h2>
					<form action="" method="post">
						<div class="form-group">
							<input type="text" name="name" class="form-control" placeholder="Full Name" required>
						</div>
						<div class="form-group">
							<input type="text" name="email" class="form-control" placeholder="Email" required>
						</div>
						<div class="form-group">
							<input type="password" name="password" class="form-control" placeholder="Password">
						</div>
						<button type="submit" name="submit" class="btn btn-theme btn-block btn-form">Sign Up</button>
						<p class="text-center mt-4 mb-0">Already have an account?<a href="log-in.php"> Log In</a></p>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- signup section ends -->

<?php

include('footer.php'); 

?>