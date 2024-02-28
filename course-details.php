<?php include('header.php'); ?>

<?php 
$lesson_count=0;

if(!isset($_SESSION['SESSION_EMAIL']) && empty($_SESSION['SESSION_EMAIL']))
{
	header("location:".'log-in.php');
}
											
?>

<?php 

// check whether the id is passed or not 
if (isset($_GET['course_id']))

 {
	// category_id is set and gee the id
	$course_id=$_GET['course_id'];

	// get the catevory title based on category id 
	$sql="SELECT * FROM tbl_course WHERE id=$course_id";

	// execute the query 
	$res=mysqli_query($conn,$sql);

	// get the value from database 
	$row=mysqli_fetch_assoc($res);

	// get title 
	
	$course_title=$row['title'];
	$price=$row['price'];
	$ratings=$row['ratings'];
	$language=$row['language'];
	$description=$row['description'];
	$discount=$row['discount'];
	$id=$row['id'];
	$updatedAt=$row['updatedAt'];
}

$sql1="SELECT tbl_educator.name
FROM tbl_educator
JOIN tbl_course ON tbl_course.educator_id = tbl_educator.id
WHERE tbl_course.id = '$course_id';";

$res1 = mysqli_query($conn, $sql1);
$row1 = mysqli_fetch_assoc($res1);
$course_instructor = $row1['name'];
?>

<!-- For the ratings read from review table -->
<?php
	$sum =0;
	$count =0;
    $count1 =0;
    $count2 =0;
    $count3 =0;
    $count4 =0;
    $count5 =0;
	$sql="SELECT * FROM tbl_reviews where course_id = $course_id";
	if($result=mysqli_query($conn,$sql))
	{
		if(mysqli_num_rows($result)>0)
		{
			while($row=mysqli_fetch_array($result))
			{
				
				$rating_data = $row['rating_data'];
                if($rating_data == 1){
                    $count1++;
                }
                if($rating_data == 2){
                    $count2++;
                }
                if($rating_data == 3){
                    $count3++;
                }
                if($rating_data == 4){
                    $count4++;
                }
                if($rating_data == 5){
                    $count5++;
                }
				$sum += $rating_data;
				$count++;
				
			}
		}
	}
	
	function realNum($num) {
		$num1 = floor($num);
		$num2 = $num1+.5;
		$num3 = $num1+1;
		if ($num >= $num1 && $num < $num2) {
			$answer = $num1;
		} 
		elseif ($num >= $num2 && $num < $num3) {
			$answer = $num2;
		}
		return $answer;
	}
	if($count !=0){
		$real_rating = $sum/$count;
	} else{
		$real_rating = 0;
	}
	
	// echo $real_rating;
	$real_rating_final = realNum($real_rating);

?>


		<!--breadcrumb starts-->
		<div class="breadcrumb-nav">
			<div class="container">
				<nav aria-label="breadcrumb">
				  <ol class="breadcrumb mb-0">
				    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
				    <li class="breadcrumb-item active" aria-current="page">course details</li>
				  </ol>
				</nav>
			</div>
		</div>
		<!--breadcrumb ends-->

		<!--course details section start-->
		<section class="course_details section-padding">
			<div class="container">
				<div class="row">
					<div class="col-lg-8">
						<!--course header starts-->
						<div class="course-header box">
							<h2 class="text-capitalize">
								<?php echo $course_title;  ?>
							</h2>
							<div class="rating">
								<span class="average-rating">(<?php echo $real_rating_final ?>)</span>		
								<span class="average-stars">
								<?php
											if ($real_rating_final == 0){
												for ($i = 1; $i <= 5; $i++) {
													?>
													<span class="average-stars">
														<i class="fa-regular fa-star"></i>
													</span>
													<?php
												}
											}
											for ($i = 1; $i <= floor($real_rating_final); $i++) {
												?>
												<span class="average-stars">
												<i class="fas fa-star"></i>

												</span>
												<?php
											}
											$rem = $i-$real_rating_final;
											if($rem==0.5){
												?>
												<span class="average-stars">
												<i class="fas fa-star-half-alt"></i>
												</span>
												<?php
											}
										?>
								</span>
								
							</div>
							<ul>

							<?php 
										$sql4="SELECT * FROM tbl_enroll where course_id=".$course_id;

										$res4=mysqli_query($conn,$sql4);

										$count4=mysqli_num_rows($res4);
							?>

								<!-- <li>enrolled students - <span><?php #echo $count4['enrolled']; ?></span></li> -->
								<li>created by - <span><a href="#"><?php echo $course_instructor;  ?></a></span></li>
								<li>last updated - <span><?php echo $updatedAt;  ?></span></li>
								<li>language - <span><?php echo $language; ?></span></li>
							</ul>
						</div>
						<!--course header ends-->
						
						<!--course tab starts-->
						<nav class="course-tabs">
							<div class="nav nav-tabs border-0" id="nav-tab" role="tablist">
							  <button class="nav-link active" id="course-curriculum-tab" data-bs-toggle="tab" data-bs-target="#course-curriculum" type="button" role="tab" aria-controls="course-curriculum" aria-selected="true">curriculum</button>
							  <button class="nav-link" id="course-description-tab" data-bs-toggle="tab" data-bs-target="#course-description" type="button" role="tab" aria-controls="course-description" aria-selected="false">description</button>
							  <button class="nav-link" id="course-instructor-tab" data-bs-toggle="tab" data-bs-target="#course-instructor" type="button" role="tab" aria-controls="course-instructor" aria-selected="false">instructor</button>
						
							</div>
						  </nav>
						<!--course tab ends-->
						<!--tab panes start-->
						<div class="tab-content" id="nav-tabContent">

							<?php include ('curriculum.php'); ?>
							
							<!--course description starts-->
							<div class="tab-pane fade" id="course-description" role="tabpanel" aria-labelledby="course-description-tab">
								<div class="course-descirption box">
									<h3 class="mb-4">Description</h3>
									 <p><?php echo $description ?></p>
								</div>
							</div>
							<!--course description ends-->
							<!--course instructor-->
							<div class="tab-pane fade " id="course-instructor" role="tabpanel" aria-labelledby="course-instructor-tab">
								<div class="course-instructor box">
									<h3 class="mb-3">Instructor</h3>
									<div class="instructor-details">
										<div class="details-wrap d-flex align-items-center flex-wrap">
											<div class="left-box me-4">
												<div class="img-box">
													<img src="img/instructor/1.png" class="rounded-circle" alt="">
												</div>
											</div>
											<div class="right-box">
												<h4><?php echo $course_instructor ?></h4>
												<ul>
													<!-- <li><i class="fas fa-star"></i>4.5 Rating</li> -->
													<li><i class="fas fa-play-circle"></i>10 Courses</li>
													<li><i class="fas fa-certificate"></i>3000 Reviews</li>
												</ul>
											</div>
										</div>
										<div class="text">
											<p class="mb-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam recusandae aliquam culpa dolorum enim, qui repellendus officiis voluptate earum autem architecto molestiae nobis, alias nisi, maiores veritatis nulla magni obcaecati?</p>
										</div>
									</div>
								</div>
							</div>
							<!--course instructor-->
						</div> 
						<!--tab panes ends-->
					</div>
					
					<div class="col-lg-4">
						<!--course sidebar start-->
						<div class="course-sidebar box">
							<div class="img-box position-relative h-100 w-100" data-bs-toggle="modal" data-bs-target="#video-modal">
								<img src="img/instructor/1.png" class="img-thumbnail" alt="">
								<div class="play-icon">
									<i class="fas fa-play"></i>
								</div>
								<p class="text-center">Course Preview</p>
							</div>
							<div class="price d-flex align-content-center mb-3">
								<span class="price-old">Rs.<?php echo $price; ?></span>
								<span class="price-new">Rs.<?php $price_new=($price/100*(100-$discount)); echo $price_new; ?></span>
								<span class="price-discount"><?php echo $discount; ?> %</span>
							</div>
							<h3 class="mb-3">Course Features</h3>
							<ul class="features-list">
									<li>Total <?php echo $lesson_count; ?> Lessons</li>
									<li>Other feature</li>
									<li>Other feature</li>
									<li>Other feature</li>
								</ul>
								<div class="btn-wrap">
									<a href="enroll.php?course_id=<?php echo $course_id; ?>&price_new=<?php echo $price_new; ?>" style="color:white;"><button type="button" class="btn btn-theme btn-block">Enroll now</button></a>
								</div>
						</div>
						<!--course sidebar ends-->
					</div>
				</div>
			</div>

		</section>
		<!--course details section ends-->


				<!-- course preview modal start -->

				<div class="modal fade video-modal js-course-preview-modal" id="video-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg modal-dialog-centered">
	  <div class="modal-content">
		<div class="modal-body p-0">  
			<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
				<i class="fas fa-times"></i>
			</button>
			<div class="ratio ratio-16x9">
				<video controls class="js-course-preview-video">
				 <?php
				 
				 	$sql = "SELECT preview_video FROM tbl_course where id= '$course_id'";
    				$query = mysqli_query($conn,$sql);

					$result = mysqli_fetch_assoc($query);										
					echo $result['preview_video'];
					?>
				<source src="video/<?php echo $result['preview_video']; ?>"></source>
				</video>
			 </div>
		</div>
	  </div>
	</div>
  </div>
	<!-- course preview modal end -->
	


  
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
	
	// const btn = document.getElementById('btn');
	
	// 	btn.addEventListener('click', function onClick() {
		// 	btn.style.backgroundColor = 'salmon';
		// 	btn.style.color = 'white';
		// });
		
	</script>
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
	
	
	video {
    margin-top: 10px;
    width: 500px;
    height: 500px;
    display: block; /* Ensures it behaves like a block-level element */
    margin-left: auto; /* Centers the element horizontally */
    margin-right: auto; /* Centers the element horizontally */
	margin-top: auto;
	margin-bottom: auto;
}

</style>
	<?php include('footer.php'); ?>