<!--footer section starts-->
<footer class="footer">
			<div class="footer-top">
				<div class="container">
					<div class="row">
						<div class="col-sm-6 col-lg-3">
							<div class="footer-item">
								<h3 class="footer-logo"><span>Academy</span>Web</h3>
								<ul>
									<li><a href="#">about</a></li>
									<li><a href="#">what we offer</a></li>
									<li><a href="#">career</a></li>
									<li><a href="#">certificate</a></li>
									<li><a href="#">blog</a></li>
								</ul>
							</div>
						</div>
						<div class="col-sm-6 col-lg-3">
							<div class="footer-item">
								<h3>learning</h3>
								<ul>
									<li><a href="#">get the app</a></li>
									<li><a href="#">testimonials</a></li>
									<li><a href="#">pricing</a></li>
									<li><a href="#">faq</a></li>
								</ul>
							</div>
						</div>
						<div class="col-sm-6 col-lg-3">
							<div class="footer-item">
								<h3>more</h3>
								<ul>
									<li><a href="#">affiliates</a></li>
									<li><a href="#">become a course creater</a></li>
									<li><a href="#">training webinars</a></li>
									<li><a href="#">free personality test</a></li>
									<li><a href="#">help and support</a></li>
								</ul>
							</div>
						</div>
						<div class="col-sm-6 col-lg-3">
							<div class="footer-item">
								<h3>get in touch</h3>
								<ul>
									<li><a href="#"><i class="fab fa-facebook social-icon"></i> facebook</a></li>
									<li><a href="#"><i class="fab fa-twitter social-icon"></i> twitter</a></li></a></li>
									<li><a href="#"><i class="fab fa-instagram social-icon"></i> instagram</a></li></a></li>
									<li><a href="#"><i class="fab fa-youtube social-icon"></i> youtube</a></li></a></li>
									<li><a href="#"><i class="fab fa-linkedin social-icon"></i> linkedin</a></li></a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="footer-bottom">
				<div class="container">
					<p class="m-0 py-4 text-center">copyright &copy; 2024 AcademyWeb </p>
				</div>
			</div>
		</footer>
		<!--footer section ends-->

	</div>
<!--main wrapper ends-->

<!-- style switcher start -->
	<div class="style-switcher js-style-switcher">
		<div class="style-switcher-toggler js-style-switcher-toggler">
			<i class="fas fa-cog"></i>
		</div>
			<h3>Style Switcher</h3>
			<div class="style-switcher-item">
				<p class="mb-2">Theme Colors</p>
				<!-- theme colors -->
				<div class="theme-colors js-theme-colors">
					<button type="button" data-js-theme-color="color-1" class="js-theme-color-item color-1"></button>
					<button type="button" data-js-theme-color="color-2" class="js-theme-color-item color-2"></button>
					<button type="button" data-js-theme-color="color-3" class="js-theme-color-item color-3"></button>
					<button type="button" data-js-theme-color="color-4" class="js-theme-color-item color-4"></button>
					<button type="button" data-js-theme-color="color-5" class="js-theme-color-item color-5"></button>
				</div>
			</div>
			<div class="style-switcher-item"> 
				<div class="form-check form-switch">
					<input class="form-check-input js-dark-mode" type="checkbox" role="switch" id="dark-mode">
					<label class="form-check-label" for="dark-mode">Dark Mode</label>
				</div>
			</div>
			<div class="style-switcher-item">
				<div class="form-check form-switch">
					<input class="form-check-input js-glass-effect" type="checkbox" role="switch" id="glass-effect">
					<label class="form-check-label" for="glass-effect">Glass Effect</label>
				</div>
			</div>
	</div>
<!-- style switcher end -->


<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/sweetalert.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<?php 

if(isset($_SESSION['status']) && $_SESSION['status'] != '')
{
	?>
	<script>
					swal({
							title: "<?php  echo $_SESSION['status'];  ?>",
							//text: "You clicked the button!",
							icon: "<?php  echo $_SESSION['status_code'];  ?>",
							button: "Ok",	
						});
	</script>
	<?php
	unset($_SESSION['status']);
}

?>


<?php 

if(isset($_SESSION['status_contact']) && $_SESSION['status_contact'] != '')
{
	?>
	<script>
					swal({
							title: "<?php  echo $_SESSION['status_contact'];  ?>",
							//text: "You clicked the button!",
							icon: "<?php  echo $_SESSION['status_contact_code'];  ?>",
							button: "Ok",	
						});
	</script>
	<?php
	unset($_SESSION['status_contact']);
}





?>


<?php 

if(isset($_SESSION['status_teacher']) && $_SESSION['status_teacher'] != '')
{
	?>
	<script>
					swal({
							title: "<?php  echo $_SESSION['status_teacher'];  ?>",
							//text: "You clicked the button!",
							icon: "<?php  echo $_SESSION['status_teacher_code'];  ?>",
							button: "Ok",	
						});
	</script>
	<?php
	unset($_SESSION['status_teacher']);
}





?>



















<script src="js/main.js"></script>
</body>
</html>