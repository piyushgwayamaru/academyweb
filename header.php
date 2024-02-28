<?php include('config/constants.php'); ?>




<!DOCTYPE html>
<html lang="en">
<head>
	<title>AcademyWeb</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/responsive.css">

	<!-- <link rel="stylesheet" class="js-glass-style" href="css/glass.css" disabled>  -->
	<link rel="stylesheet" class="js-color-style" href="css/colors/color-1.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

</head>
<body>

<!--main wrapper starts-->
	<div class="main-wrapper">
		
		<!--header starts-->
		<header class="header">
			<div class="container">
				<div class="header-main d-flex justify-content-between align-items-center">
					<div class="header-logo">
						<a href="index.php"><span>Academy</span>Web</a>
					</div>
					<!-- Search Courses -->
					<div class="search-container ">
							<form action="courses.php" method="post">
								<div class="search-fields d-flex ">
									<input type="text" class="form-control search-input border border-dark rounded mr-2 " placeholder="search" name="searchitem" required>
									<button type="submit" name="search" style="background-color: #CB4343; color: white;" class="btn search-button ml-2 "><i class="fa-solid fa-magnifying-glass"></i></button>
								</div>
							</form>
					</div>

					<button type="button" class="header-hamburger-btn js-header-menu-toggler">
						<span></span>
					</button>
					<div class="header-backdrop js-header-backdrop"></div>
					<nav class="header-menu js-header-menu">
						<button type="button" class="header-close-btn js-header-menu-toggler">
							<i class="fas fa-times"></i>
						</button>
						<ul class="menu">
							<li class="menu-item"><a href="index.php">home</a></li>

							<li class="menu-item menu-item-has-children"><a href="courses.php">courses</a></li>
							
							<?php if(!isset($_SESSION['SESSION_EMAIL']) && empty($_SESSION['SESSION_EMAIL'])) { ?>
							<li class="menu-item menu-item-has-children">
								<a href="#">login<i class="fas fa-chevron-down"></i></a>
								<ul class="sub-menu js-sub-menu">
									<li class="sub-menu-item"><a href="educator/login.php">login as educator</a></li>
									<li class="sub-menu-item"><a href="log-in.php">login as student </a></li>
								</ul>
							</li>
						<?php } else {
							$query = mysqli_query($conn, "SELECT * FROM tbl_user WHERE email = '{$_SESSION['SESSION_EMAIL']}'");
							if(mysqli_num_rows($query) > 0) {
								$row = mysqli_fetch_assoc($query);
								// echo "Welcome" . $row['name'];
							}
							//header("location:".SITEURL);
							//die();
						?>
							<li class="menu-item menu-item-has-children">
								<a href="#">
								<i class="fa-regular fa-user"></i>
									<?php if(isset($row)) echo $row['name']; ?>
									<i class="fas fa-chevron-down"></i>
								</a>
								<ul class="sub-menu js-sub-menu">
									<li class="sub-menu-item"><a href="logout.php">Logout </a></li>
								</ul>
							</li>
						<?php } ?>

						<li class="menu-item"><a href="contact.php">contact</a></li>
						</ul>

					</nav>
				</div>
			</div>
		</header>
		<!--header ends-->