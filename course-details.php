<?php include('header.php'); ?>

<?php 

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
	$course_ratings=$row['ratings'];
	$reviews_number=$row['reviews_number'];
	$enrolled_students=$row['enrolled_students'];
	$course_instructor=$row['instructor'];
	$updatedAt=$row['updatedAt'];
	$language=$row['language'];

}




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
								<span class="average-rating">(<?php echo $course_ratings ?>)</span>		
								<span class="average-stars">
								<?php
											for ($i = 1; $i <= floor($course_ratings); $i++) {
												?>
												<span class="average-stars">
												<i class="fas fa-star"></i>
												</span>
												<?php
											}
											$rem = $i-$course_ratings;
											if($rem==0.5){
												?>
												<span class="average-stars">
												<i class="fas fa-star-half-alt"></i>
												</span>
												<?php
											}
										?>
								</span>
								<span class="reviews">(<?php echo $reviews_number;?>)</span>
							</div>
							<ul>

							<?php 
										$sql4="SELECT * FROM tbl_course where id=".$course_id;

										$res4=mysqli_query($conn,$sql4);

										$count4=mysqli_num_rows($res4);
							?>

								<li>enrolled students - <span><?php echo $count4; ?></span></li>
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
							  <button class="nav-link" id="course-reviews-tab" data-bs-toggle="tab" data-bs-target="#course-reviews" type="button" role="tab" aria-controls="course-reviews" aria-selected="false">reviews</button>
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
									<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellendus illo sequi labore neque, eveniet illum iste maiores nihil veniam impedit enim beatae accusantium quos, rerum fugiat perferendis voluptatum excepturi est?</p>
									<h4>For who is this course designed?</h4>
									<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam, non delectus voluptates ipsum sint cupiditate quis ducimus corrupti, sit illo nisi? Tenetur cum quae, eveniet mollitia voluptate qui totam voluptatibus!</p>
									<h4>why should you take this course</h4>
									<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Blanditiis cumque, nobis accusantium repellendus aperiam ullam deleniti voluptate nemo eveniet quo ratione illum non atque magni quos hic consequuntur nam numquam.</p>
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
												<h4>john doe<span>(web developer)</span></h4>
												<ul>
													<li><i class="fas fa-star"></i>4.5 Rating</li>
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
							<!--course reviews starts-->
							<div class="tab-pane fade" id="course-reviews" role="tabpanel" aria-labelledby="course-reviews-tab">
								<div class="course-reviews box">
									<!-- rating summary start -->
									<div class="rating-summary">
										<h3 class="mb-4 text-capitalize">students feedback</h3>
										<div class="row">
											<div class="col-md-4 d-flex align-items-center justify-content-center text-center">
												<div class="rating-box">
													<div class="average-rating">4.5</div>
													<div class="average-stars">
														<i class="fas fa-star"></i>
														<i class="fas fa-star"></i>
														<i class="fas fa-star"></i>
														<i class="fas fa-star"></i>
														<i class="fas fa-star-half-alt"></i>
													</div>
													<div class="reviews">230 Reviews</div>
												</div>
											</div>
											<div class="col-md-8">
												<div class="rating-bars">
													<!-- rating bars item start -->
													<div class="rating-bars-item">
														<div class="star-text">5 Star</div>
														<div class="progress">
															<div class="progress-bar" style="width: 50%;"></div>
														</div>
														<div class="percent">50%</div>
													</div>
													<!-- rating bars item ends -->
													<!-- rating bars item start -->
													<div class="rating-bars-item">
														<div class="star-text">4 Star</div>
														<div class="progress">
															<div class="progress-bar" style="width: 30%;"></div>
														</div>
														<div class="percent">30%</div>
													</div>
													<!-- rating bars item ends -->
													<!-- rating bars item start -->
													<div class="rating-bars-item">
														<div class="star-text">3 Star</div>
														<div class="progress">
															<div class="progress-bar" style="width: 10%;"></div>
														</div>
														<div class="percent">10%</div>
													</div>
													<!-- rating bars item ends -->
													<!-- rating bars item start -->
													<div class="rating-bars-item">
														<div class="star-text">2 Star</div>
														<div class="progress">
															<div class="progress-bar" style="width: 7%;"></div>
														</div>
														<div class="percent">7%</div>
													</div>
													<!-- rating bars item ends -->
													<!-- rating bars item start -->
													<div class="rating-bars-item">
														<div class="star-text">1 Star</div>
														<div class="progress">
															<div class="progress-bar" style="width: 3%;"></div>
														</div>
														<div class="percent">3%</div>
													</div>
													<!-- rating bars item ends -->
												</div>
											</div>
										</div>
									</div>
									<!-- rating summary ends -->

									<!-- reviews filter start -->
									<div class="reviews-filter">
										<h3 class="mb-4">Reviews</h3>
										<form action="">
											<div class="form-group">
												<i class="fas fa-chevron-down select-icon"></i>
												<select class="form-control">
													<option value="">All Reviews</option>
													<option value="1">1 Star</option>
													<option value="2">2 Star</option>
													<option value="3">3 Star</option>
													<option value="4">4 Star</option>
													<option value="5">5 Star</option>
												</select>
											</div>
										</form>
									</div>
									<!-- reviews filter ends -->

									<!-- reviews list start -->
									<div class="reviews-list">
										<!-- reviews item start -->
										<div class="reviews-item">
											<div class="img-box">
												<img src="img/review/1.png" alt="">
											</div>
											<h4>john doe</h4>
											<div class="stars-rating">
												<i class="fas fa-star"></i>
												<i class="fas fa-star"></i>
												<i class="fas fa-star"></i>
												<i class="fas fa-star"></i>
												<i class="fas fa-star"></i>
												<span class="date">1 week ago</span>
											</div>
											<p>Great work. I learned lot of things about JavaScript in this course.</p>
										</div>
										<!-- reviews item end -->
										<!-- reviews item start -->
										<div class="reviews-item">
											<div class="img-box">
												<img src="img/review/1.png" alt="">
											</div>
											<h4>john doe</h4>
											<div class="stars-rating">
												<i class="fas fa-star"></i>
												<i class="fas fa-star"></i>
												<i class="fas fa-star"></i>
												<i class="fas fa-star"></i>
												<i class="fas fa-star"></i>
												<span class="date">1 week ago</span>
											</div>
											<p>Great work. I learned lot of things about JavaScript in this course.</p>
										</div>
										<!-- reviews item end -->
										<!-- reviews item start -->
										<div class="reviews-item">
											<div class="img-box">
												<img src="img/review/1.png" alt="">
											</div>
											<h4>john doe</h4>
											<div class="stars-rating">
												<i class="fas fa-star"></i>
												<i class="fas fa-star"></i>
												<i class="fas fa-star"></i>
												<i class="fas fa-star"></i>
												<i class="fas fa-star"></i>
												<span class="date">1 week ago</span>
											</div>
											<p>Great work. I learned lot of things about JavaScript in this course.</p>
										</div>
										<!-- reviews item end -->
									</div>
									<!-- reviews list ends -->
									<button type="button" class="btn btn-theme">More Reviews</button>
								</div>
							</div>
							<!--course reviews ends-->
						  </div>
						<!--tab panes ends-->
					</div>
					<div class="col-lg-4">
						<!--course sidebar start-->
						<div class="course-sidebar box">
							<div class="img-box position-relative" data-bs-toggle="modal" data-bs-target="#video-modal">
								<img src="img/courses/web-development/3.jpg" class="w-100" alt="">
								<div class="play-icon">
									<i class="fas fa-play"></i>
								</div>
								<p class="text-center">Course Preview</p>
							</div>
							<div class="price d-flex align-content-center mb-3">
								<span class="price-old">$100</span>
								<span class="price-new">$49</span>
								<span class="price-discount">51% Off</span>
							</div>
								<h3 class="mb-3">Course Features</h3>
								<ul class="features-list">
									<li>Total 15 Lessons</li>
									<li>Other feature</li>
									<li>Other feature</li>
									<li>Other feature</li>
								</ul>
								<div class="btn-wrap">
									<button type="button" class="btn btn-theme btn-block"><a href="<?php echo SITEURL; ?>enroll.php" style="color:white;">enroll now</button>
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
					 <source src="video/course-preview.mp4" type="video/mp4"> 
				 </video>
			 </div>
		</div>
	  </div>
	</div>
  </div>
  <!-- course preview modal end -->


		<?php include('footer.php'); ?>