<?php 

include('../config/constants.php'); 
include('login-check.php'); 

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<title>Course Details</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="../css/admin.css">
	<link rel="stylesheet" class="js-color-style" href="../css/colors/color-1.css">
	<script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>
<body class="m-4"> 

<!--header starts-->
	<header class="header">
		<div class="container">
			<div class="header-main d-flex justify-content-between align-items-center">
				<div class="header-logo">
					<a href="index.php"><span>Academy</span>Web</a>
				</div>
				<button type="button" class="header-hamburger-btn js-header-menu-toggler">						<span></span>
					</button>
					<div class="header-backdrop js-header-backdrop"></div>
					<nav class="header-menu js-header-menu">
						<button type="button" class="header-close-btn js-header-menu-toggler">
							<i class="fas fa-times"></i>
						</button>
						<ul class="menu">
                            <li class="menu-item"><a href="index.php">home</a></li>
                            <li class="menu-item"><a href="manage-admin.php">admin</a></li>
                            <li class="menu-item"><a href="manage-category.php">category</a></li>
                            <!-- <li class="menu-item"><a href="manage-course.php">course</a></li>
							<li class="menu-item"><a href="manage-chapter.php">chapter</a></li>
							<li class="menu-item"><a href="manage-lesson.php">lessons</a></li>
							<li class="menu-item"><a href="manage-enrollment.php">Enrollments</a></li>
							<li class="menu-item"><a href="manage-hire.php">Hirings</a></li> -->
							<li class="menu-item"><a href="logout.php">Logout</a></li>
						</ul>
					</nav>
				</div>

				
				</div>
		</header>

		<!--header ends-->

		