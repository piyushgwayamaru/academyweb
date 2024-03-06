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
<style>

		/* Add this CSS to stick header-logo to the top */
		.header-logo {
			position: fixed;
			top: 0;
			left: 0;
			width: 16%;
			background-color: #ffffff;
			z-index: 1000; /* Ensure it's above other content */
			padding: 10px 20px; /* Adjust padding as needed */
			box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* Optional: Add a shadow */
		}

		/* Add this CSS to offset content below the fixed header */
		.main-content {
			margin-top: 60px; /* Adjust margin-top to match the height of the fixed header */
		}
	body {
  		background-color: #fbfbfb;
	}
	@media (min-width: 991.98px) {
	main {
		padding-left: 240px;
	}
	}

	/* Sidebar */
	.sidebar {
			position: fixed;
			top: 0;
			left: 0;
			padding-top: 50px;
			width: 240px;
			height: 100%;
			overflow-y: auto;
			background-color: #f1f1f1;
		}
	/* .sidebar {
	position: fixed;
	top: 0;
	bottom: 0;
	left: 0;
	padding: 17px 0 0; 
	box-shadow: 0 2px 5px 0 rgb(0 0 0 / 5%), 0 2px 10px 0 rgb(0 0 0 / 5%);
	width: 240px;
	z-index: 600;
	} */

	@media (max-width: 991.98px) {
	.sidebar {
		width: 100%;
		
	}
	}
	.sidebar .active {
	border-radius: 5px;
	box-shadow: 0 2px 5px 0 rgb(0 0 0 / 16%), 0 2px 10px 0 rgb(0 0 0 / 12%);
	}

	.sidebar-sticky {
	position: relative;
	top: 0;
	height: calc(100vh - 48px);
	padding-top: 0.5rem;
	overflow-x: hidden;
	overflow-y: auto; /* Scrollable contents if viewport is shorter than content. */
	}
	button {
		margin-top:10px;
		border-radius: 3px;
	}	

	
	video {
		margin-top:-30px;
		width: 1080px;
		height: 650px;

	}
</style>

<?php
	if(isset($_REQUEST['course_id'])){
		$course_id = $_REQUEST['course_id'];
	}
	$sql="SELECT title FROM tbl_course where id=$course_id";

			$res=mysqli_query($conn,$sql);
			$row = mysqli_fetch_assoc($res);
			$course_name = $row['title'];
?>
  <!-- Sidebar -->
  <nav id="sidebarMenu" class=" d-lg-block sidebar sidebar-expang-lg bg-white">
	  <div class="header-logo" >
		  <a href="index.php" style = "margin-left:20px;"><span>Academy</span>Web</a>
		  <hr>
	  </div>
	  <div >
		  <div class="list-group list-group-flush mx-3 mt-5">
			<h5><?php echo $course_name; ?></h5>
			<hr>
        	<?php
				$sql2="SELECT * FROM tbl_lesson where course_id=$course_id";

				$res2=mysqli_query($conn,$sql2);
				$count2=mysqli_num_rows($res2);

				if($count2>0)
				{
					while($row2=mysqli_fetch_assoc($res2))
					{
						$lesson_id = $row2['id'];
						$lesson_name = $row2['lesson_name'];
						
						echo $lesson_name;
						$sql3="SELECT sublesson_name, sublesson_video FROM tbl_sublesson where lesson_id=$lesson_id";

						$res3=mysqli_query($conn,$sql3);
						$count3=mysqli_num_rows($res3);

						if($count3>0)
						{
							while($row3=mysqli_fetch_assoc($res3))
							{
								$sublesson_name=$row3['sublesson_name'];
								$video = $row3['sublesson_video'];
								$videopath = 'educator/videos/'.$video;
								?>
								<button id="btn" type="button" onclick="displayvideo('<?php echo $videopath; ?>')">
									<?php echo $sublesson_name; ?>
								</button>
								<?php
							}
						}?>
					<br><?php
					}
				}
			?>



			
      </div>
    </div>
  </nav>
  <!-- Sidebar -->

<!--Main layout-->
<main style="margin-top: 58px;">
  <div class="container pt-4" id="videoContainer">
	
  </div>
</main>
<!--Main layout-->

<script>
	function displayvideo(videoPath) {
      // Create a video element
      var videoElement = document.createElement('video');
      videoElement.controls = true;
      videoElement.src = videoPath;
	//   document.getElementById("videoContainer").innerHTML = videoPath;
      // Get the video container and append the video element
      var videoContainer = document.getElementById('videoContainer');
      videoContainer.innerHTML = ''; // Clear existing content
      videoContainer.appendChild(videoElement);
    }

	

</script>