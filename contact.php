<?php include('header.php'); ?>
<br>
<?php ob_start();?>
<br>


<?php
	if(isset($_SESSION['contact']))
	{
		echo $_SESSION['contact'];
		unset($_SESSION['contact']);
	}

?>
<br>

<br>

		<!--breadcrumb starts-->
		<div class="breadcrumb-nav">
			<div class="container">
				<nav aria-label="breadcrumb">
				  <ol class="breadcrumb mb-0">
					<li class="breadcrumb-item"><a href="index.php">Home</a></li>
					<li class="breadcrumb-item active" aria-current="page">Contact</li>
				  </ol>
				</nav>
			</div>
		</div>
	<!--breadcrumb ends-->

	<!-- contact section start -->
	<section class="contact-section section-padding">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<div class="section-title">
						<p class="sub-title">
							Get In Touch
						</p>
					</div>
					<div class="contact-items">
						<div class="contact-item">
							<div class="icon-box"><i class="fas fa-map-marker-alt"></i></div>
							<h3>Address</h3>
							<p>Libali, Bhaktapur, Nepal</p>
						</div>
						<div class="contact-item">
							<div class="icon-box"><i class="fas fa-phone"></i></div>
							<h3>Phone</h3>
							<p>977-9812346567</p>
						</div>
						<div class="contact-item">
							<div class="icon-box"><i class="fas fa-envelope"></i></div>
							<h3>Email</h3>
							<p>admin@academyweb.com</p>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="contact-form box">
						<h2 class="form-title text-center">Leave a Message</h2>
						<form method="POST" enctype="multipart/form-data">
							<div class="form-group">
								<input type="text" name="f_name" class="form-control" placeholder="Full Name">
							</div>
							<div class="form-group">
								<input type="text" name="email" class="form-control" placeholder="Email">
							</div>
							<div class="form-group">
								<textarea class="form-control" name="message" placeholder="Message"></textarea>
							</div>
							<div class="form-group">
								<input type="text" name="mark_as_read" class="form-control" value="false" hidden>
							</div>
							<button type="submit" name="submit" class="btn btn-theme btn-block btn-form">Send Message</button>
							<p class="text-center mt-4 mb-0">Already have an account?<a href="log-in.php"> Log In</a></p>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- contact section ends -->

	



	<?php  
	//check whether the submit button is clicked or not
	if(isset($_POST['submit']))
	{
		//get the value from category form
		$name = $_POST['f_name'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$message = $_POST['message'];

		
		//create sql query to insert categiry into db
		$sql = "INSERT INTO tbl_contact SET
			fullname = '$name',
			email = '$email',
			phone = $phone,
			message = '$message'
		";

		//execute the query and save in db
		$res =  mysqli_query($conn,$sql);

		//check whether the query executed or not and data added or not
		if($res == true)
		
		{
			$_SESSION['status_contact'] = "Contact Sent Successfully";
      $_SESSION['status_contact_code'] = "success";
		//  $alert="<script>alert('Successfully sent Contacts');</script>";
		//  echo $alert;
		}
		else
		{
			$_SESSION['status_contact'] = "Failed To Send Contact";
      $_SESSION['status_contact_code'] = "error";
			// $alert="<script>alert('Failed To Send Contacts');</script>";
			// echo $alert;
			

	}
}
	?>
}



	


<?php include('footer.php'); ?>
<?php ob_flush();?>
