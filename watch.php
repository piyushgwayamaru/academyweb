<?php include('header1.php'); ?>
<style>
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
	bottom: 0;
	left: 0;
	padding: 17px 0 0; /* Height of navbar */
	box-shadow: 0 2px 5px 0 rgb(0 0 0 / 5%), 0 2px 10px 0 rgb(0 0 0 / 5%);
	width: 240px;
	z-index: 600;
	}

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
				/* align-items: center;
		background-clip: padding-box;
		background-color: white;
		border: 1px solid transparent;
		border-radius: .25rem;
		box-shadow: rgba(0, 0, 0, 0.02) 0 1px 3px 0;
		box-sizing: border-box;
		color: black;
		cursor: pointer;
		display: inline-flex;
		font-family: system-ui,-apple-system,system-ui,"Helvetica Neue",Helvetica,Arial,sans-serif;
		font-size: 16px;
		font-weight: 600;
		justify-content: center;
		line-height: 1.25;
		margin: 0;
		min-height: 3rem;
		padding: calc(.875rem - 1px) calc(1.5rem - 1px);
		position: relative;
		text-decoration: none;
		transition: all 250ms;
		user-select: none;
		-webkit-user-select: none;
		touch-action: manipulation;
		vertical-align: baseline;
		width: auto;
}

button:hover,
button:focus {
  background-color: #E55252;
  color: white
  box-shadow: rgba(0, 0, 0, 0.1) 0 4px 12px;
}

button:hover {
  transform: translateY(-1px);
}

button:active {
  background-color: #c85000;
  box-shadow: rgba(0, 0, 0, .06) 0 2px 4px;
  transform: translateY(0);
} */
		

	
	video {
		margin-top:-90px;
		width: 1080px;
		height: 650px;

	}
</style>

<?php
	if(isset($_REQUEST['course_id'])){
		$course_id = $_REQUEST['course_id'];
	}
?>
  <!-- Sidebar -->
  <nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse bg-white">
	  <div class="header-logo" >
		  <a href="index.php"><span>Academy</span>Web</a>
		  <hr>
	  </div>
	  <div class="position-sticky">
		  <div class="list-group list-group-flush mx-3 mt-5">
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
					}
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

	const btn = document.getElementById('btn');

		btn.addEventListener('click', function onClick() {
		btn.style.backgroundColor = 'salmon';
		btn.style.color = 'white';
	});

</script>