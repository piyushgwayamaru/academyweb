<?php include('header.php'); ?>

<?php 

if(!isset($_SESSION['SESSION_EMAIL']) && empty($_SESSION['SESSION_EMAIL']))
{
	header("location:".'log-in.php');
}
											
?>


<?php 

// check whether the id is passed or not c
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
	$course_instructor=$row['instructor'];
	$language = $row['language'];
}
else
{
	// category not passed redirect to home page
	header('location:'.'index.php');
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
								<span class="average-rating">(4.5)</span>		
								<span class="average-stars">
									<i class="fas fa-star"></i>
									<i class="fas fa-star"></i>
									<i class="fas fa-star"></i>
									<i class="fas fa-star"></i>
									<i class="fas fa-star-half-alt"></i>
								</span>
								<span class="reviews">(230 Reviews)</span>
							</div>
							<ul>

							<?php 
										$sql4="SELECT * FROM tbl_enroll where course_id=".$course_id;

										$res4=mysqli_query($conn,$sql4);

										$count4=mysqli_num_rows($res4);
							
							?>
								<!-- <li>enrolled students - <span><?php echo $count4['enrolled']; ?></span></li> -->
								<li>created by - <span><?php echo $course_instructor;  ?></span></li>
								<li>last updated - <span>10/10/2022</span></li>
								<li>language - <span><?php echo $language;  ?></span></li>
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

							<!--course curriculum starts-->
							<div class="tab-pane fade  show active" id="course-curriculum" role="tabpanel" aria-labelledby="course-curriculum-tab">
								<div class="course-curriculum box">
									<h3 class="text-capitalize">curriculum</h3>
									<!-- accordion start -->
									<div class="accordion" id="accordion">

								

										<!-- accordion item start -->
										<div class="accordion-item">
											<h2 class="accordion-header" id="heading-1">
											<?php  

													$sql2="SELECT * FROM tbl_lesson where course_id=".$course_id;

													$res2=mysqli_query($conn,$sql2);

													$count2=mysqli_num_rows($res2);

													if($count2>0)
													{
														while($row2=mysqli_fetch_assoc($res2))
														{
															$chapter_id=$row2['id'];
															$name=$row2['lesson_name'];
															?>

																<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-<?php echo $row2['id'] ?>" aria-expanded="true" aria-controls="collapse-<?php echo $row2['id'] ?>">
																<?php echo $name; ?>
															</button>
															</h2>
															<div id="collapse-<?php echo $chap_id ?>" class="accordion-collapse collapse" aria-labelledby="heading-<?php echo $chap_id ?>" data-bs-parent="#accordion">
											  <div class="accordion-body">
												  <ul>
													  <li>
														  <i class="fas fa-play-circle"></i>
														  <?php
														  if($pdf == "")
														  {
															?>
															<a href="#" target="_blank"><?php echo $lesson_name; ?></a>
															<?php
														  }
														  else 
														  {
															?>
															
															<a href="pdf/<?php echo $pdf ?>" target="_blank"><?php echo $lesson_name; ?></a>
															<?php
														  }
														  ?>
														  
														  
														  
														  <span>06:00</span>
													  </li>
												  </ul>
											  </div>
											</div>
											<?php


														}
													}



													?>

													
											 
										
										  </div>
										<!-- accordion item ends -->
										
									
										

									</div>
									<!-- accordion ends -->
								</div>
							</div>
							<!--course curriculum ends-->
							<!--course description starts-->
							<?php  

								$sql3="SELECT * FROM tbl_course where id=".$course_id;

								$res3=mysqli_query($conn,$sql3);

								$count3=mysqli_num_rows($res3);

								if($count3>0)
								{
									while($row3=mysqli_fetch_assoc($res3))
									{
										$email = $row3['email'];
										$description = $row3['description'];
										$instructor = $row3['instructor'];
										$category_id = $row3['category_id'];
									}
								}
							?>

							<div class="tab-pane fade" id="course-description" role="tabpanel" aria-labelledby="course-description-tab">
								<div class="course-descirption box">
									<h3 class="mb-4">Description</h3>
									<p><?php 
									echo $description; ?></p>
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
												<h4><?php echo $instructor;?></h4>
												<?php 
													$sql5 = "SELECT COUNT(*) AS course_count 
																	FROM tbl_course 
																	WHERE email = '$email'";
													$query = mysqli_query($conn,$sql5);
													$result = mysqli_fetch_assoc($query);
												
												?>
												<ul>
													<li><i class="fas fa-star"></i><?php echo $category_id; ?></li>
													<li><i class="fas fa-play-circle"></i><?php echo $result['course_count'];?> Course/s </li>
													<li><i class="fas fa-certificate"></i>3000 Reviews</li>
												</ul>
											</div>
										</div>
										<div class="text">
											<!-- <p class="mb-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam recusandae aliquam culpa dolorum enim, qui repellendus officiis voluptate earum autem architecto molestiae nobis, alias nisi, maiores veritatis nulla magni obcaecati?</p> -->
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
												<?php $rating = 3.5; ?>
												<div class="rating-box"> 
													<div class="average-rating"><?php echo $rating; ?></div>
													<div class="average-stars">

														<?php
															// Display filled stars
															for ($i = 1; $i <= floor($rating); $i++) {
																echo '<i class="fas fa-star"></i>'; // Unicode character for a star
															}

															// Display half-filled star for odd ratings
															if ($rating - floor($rating) > 0) {
																echo '<i class="fas fa-star-half-alt"></i>';
															}

															// Display unfilled stars
															// for ($i = ceil($rating); $i < 5; $i++) {
															// 	echo '<i class="fas fa-star unfilled"></i>';
															// }
														?>
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
									<a href="watch.php?course_id=<?php echo $course_id; ?>" style="color:white;"><button type="button" class="btn btn-theme btn-block">enroll now</button></a>
								</div>
						</div>
						<!--course sidebar ends-->
					</div>
				</div>
			</div>

		</section>
		<!--course details section ends-->

		<?php include('footer.php'); ?>

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
				<source src="educator/videos/<?php echo $result['preview_video']; ?>"></source>
				</video>
			 </div>
		</div>
	  </div>
	</div>
  </div>
  <!-- course preview modal end -->