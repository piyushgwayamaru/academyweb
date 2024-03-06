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
		width: 226px;
		z-index: 1000; /* Ensure it's above other content */
		padding: 10px 20px; /* Adjust padding as needed */
		box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* Optional: Add a shadow */
		border-radius: 30px;
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

	@media (max-width: 991.98px) {
	.sidebar {
		width: 100%;
		
	}
	}

	.sidebar button.active {
	background-color: blue; /* Change this color to whatever you prefer */
	color: white; /* Text color when active */
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
	/* .watch-video-section {
            background-color: #f9f9f9;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        } */

        @media (max-width: 767px) {
            .watch-video-section {
                padding: 15px;
            }
		}
</style>

<body>
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
    <nav id="sidebarMenu" class="d-lg-block sidebar sidebar-expang-lg bg-white">
        <div class="header-logo bg-light">
            <a href="index.php" style="margin-left:0px;"><span>Academy</span>Web</a>
        </div>
        <div>
            <div class="list-group list-group-flush mx-3 mt-5">
                <h5><?php echo $course_name; ?></h5>
                <hr>
                <?php
                $sql2="SELECT * FROM tbl_lesson where course_id=$course_id";
                $res2=mysqli_query($conn,$sql2);
                $count2=mysqli_num_rows($res2);

                if($count2>0) {
                    while($row2=mysqli_fetch_assoc($res2)) {
                        $lesson_id = $row2['id'];
                        $lesson_name = $row2['lesson_name'];
                        echo '<h6>'.$lesson_name.'</h6>';
                        $sql3="SELECT sublesson_name, sublesson_video FROM tbl_sublesson where lesson_id=$lesson_id";
                        $res3=mysqli_query($conn,$sql3);
                        $count3=mysqli_num_rows($res3);

                        if($count3>0) {
                            while($row3=mysqli_fetch_assoc($res3)) {
                                $sublesson_name=$row3['sublesson_name'];
                                $video = $row3['sublesson_video'];
                                $videopath = 'educator/videos/'.$video;
                                echo '<button data-video="'.$videopath.'" type="button" onclick="displayvideo(\''.$videopath.'\')" class="btn btn-outline-dark btn btn-light btn-block">'.$sublesson_name.'</button>';
                            }
                        }
                        echo '<br>';
                    }
                }
                ?>
            </div>
        </div>
    </nav>
    <!-- Sidebar -->

    <!--Main layout-->
    <main style="margin-top: 58px;">
        <div class="container pt-4">
            <!-- Watch Video Section -->
            <div id="videoContainer" class="watch-video-section">
                <!-- Video content will be displayed here -->
            </div>
            <!-- End of Watch Video Section -->
        </div>
    </main>
    <!--Main layout-->

<script>
	window.addEventListener('DOMContentLoaded', (event) => {
    // Select the first video button
    var firstVideoButton = document.querySelector('.sidebar button');
    if (firstVideoButton) {
        // Trigger click event on the first video button
        firstVideoButton.click();
    }
});

function displayvideo(videoPath) {
    // Create a video element
    var videoElement = document.createElement('video');
    videoElement.controls = true;
    videoElement.autoplay = true; // Add autoplay attribute to start playing automatically
    videoElement.src = videoPath;

    // Get the video container and append the video element
    var videoContainer = document.getElementById('videoContainer');
    videoContainer.innerHTML = ''; // Clear existing content
    videoContainer.appendChild(videoElement);

    // Remove active class from all buttons
    var buttons = document.querySelectorAll('.sidebar button');
    buttons.forEach(function (button) {
        button.classList.remove('active');
    });

    // Add active class to the button corresponding to the clicked video
    var selectedButton = document.querySelector('button[data-video="' + videoPath + '"]');
    if (selectedButton) {
        selectedButton.classList.add('active');
    }
}


</script>