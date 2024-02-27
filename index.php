<?php include('header.php'); ?>

		<!--banner section starts-->
		<section class="banner-section d-flex align-items-center">
			<div class="container">
				<div class="row align-items-center">
					<div class="col-md-6">
						<div class="banner-text">
							<h2 class="mb-3">An investment in knowledge pays the best interest.</h2>
							<h1 class="mb-3 text-capitalize">best online platform for learning.</h1>
							<p class="mb-4">Explore limitless learning at AcademyWeb: Elevate your skills with expert-led online courses anytime, anywhere!</p>
							<?php 
							 if(!isset($_SESSION['SESSION_EMAIL'])){
								echo "<a href='sign-up.php' class='btn btn-theme'>join free</a>";
							 }
							?>
						</div>
					</div>
					<div class="col-md-6">
						<div class="banner-img">
							<div class="circular-img">
								<div class="circular-img-inner">
									<div class="circular-img-circle"></div>
									<img src="img/banner-img.png" alt="banner img">
								</div>
							</div>
						</div>
					</div>
					
				</div>
			</div>
		</section>
		<!--banner section ends-->

		<!--courses section starts-->
		<section class="courses-section section-padding">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-md-8 ">
						<div class="section-title text-center">
							<h2 class="title">
								Courses
							</h2>
							<p class="sub-title">
								Find the right course for you.
							</p>
						</div>
					</div>
				</div>
				<div class="row">

		<?php
				$sql="SELECT * FROM tbl_course where active='yes' LIMIT 4";

				$res=mysqli_query($conn,$sql);

				$count=mysqli_num_rows($res);

				if($count>0)
					{
						while($row=mysqli_fetch_assoc($res))
							{
								//print_r($row); die(); // [id] => 1 [category_id] => 1 [image] => Course-Name-3425.jpg [title] => Html For Beginners [instructor] => Salam Khan [active] => Yes )
								$id=$row['id'];
								$title=$row['title'];
								$image_name=$row['image'];
								$instructor=$row['instructor'];
								$price=$row['price'];
								$ratings = $row['ratings'];
								$reviews_number = $row['reviews_number'];

		?>
					<!--courses item starts-->
					<div class="col-md-6 col-lg-3">
						<div class="courses-item">
							<a href="course-details.php?course_id=<?php echo $id; ?>" class="link"> 
		<!-- -------------------------------------------------------------------------------------->
								<div class="courses-item-inner">
									<div class="img-box">
										
									<?php 
                        
                                            if($image_name=="")
                                            {
                                                echo "NO IMAGE";
                                            }
                                            
                                            else 
                                            {
                                                ?>
										<img src="img/admin/course/<?php echo $image_name; ?>" alt="course img" style="height:175px; width:300px;">
													<?php 
											}
											?>
										
									</div>
									<h3 class="title"><?php echo $title ?></h3>
									<div class="instructor">
										<!-- <img src="img/instructor/1.png" alt="insrtucting"> -->
										<span class="instructor-name"><?php echo $instructor; ?> </span>
									</div>
									<div class="rating">
										<span class="average-rating">(<?php echo $ratings ?>)</span>
										<?php
											for ($i = 1; $i <= floor($ratings); $i++) {
												?>
												<span class="average-stars">
												<i class="fas fa-star"></i>
												</span>
												<?php
											}
											$rem = $i-$ratings;
											if($rem==0.5){
												?>
												<span class="average-stars">
												<i class="fas fa-star-half-alt"></i>
												</span>
												<?php
											}
											
										    	
											// <!--  -->
										?>
									</div>
										<span clas reviews><?php echo $reviews_number; ?></span>
									<div class="price">Rs.<?php echo $price;  ?></div>
								</div>
							</a>
						</div>
					</div>

					
					<!--courses item ends-->
				<?php }}?>
				</div>

				<div class="row">
					<div class="col-12 text-center mt-3">
						<a href="courses.php" class="btn btn-theme">view all courses</a>
					</div>
				</div>
			</div>
		</section>
		<!--courses section ends-->











		<!--testimonials section starts-->
		<section class="testimonials-section section-padding position-relative">
			<div class="decoration-circles">
				<div class="decoration-circles-item"></div>
				<div class="decoration-circles-item"></div>
				<div class="decoration-circles-item"></div>
				<div class="decoration-circles-item"></div>
			</div>
			<div class="decoration-imgs">
				<img src="img/testimonial/1.png" alt="decoration-img" class="decoration-imgs-item">
				<img src="img/testimonial/2.png" alt="decoration-img" class="decoration-imgs-item">
				<img src="img/testimonial/3.png" alt="decoration-img" class="decoration-imgs-item">
			</div>
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-md-8 ">
						<div class="section-title text-center"> 
							<h2 class="title">students feedback</h2>
							<p class="sub-title">What our students says</p>
						</div>
					</div>
				</div>
				<div class="row justify-content-center">
					<div class="col-md-8 col-lg-6">
						<div class="img-box rounded-circle position-relative">
							<img src="img/testimonial/1.png" class="w-100 js-testimonial-img rounded-circle" alt="testimonial img">
						</div>
						<!--carousel-->
						<div id="carouselOne" class="carousel slide text-center" data-bs-ride="carousel">
						  <div class="carousel-inner mb-4
						  ">
						    <div class="carousel-item active" data-js-testimonial-img="img/testimonial/1.png">
						    	<div class="testimonials-item ">
						    		<p class="text-1">AcademyWeb has transformed my learning experience. The courses are engaging, and the flexible online format fits perfectly with my schedule. I'm gaining valuable skills and knowledge that are directly applicable to my career.</p>
						    		<h3>Emily Thompson</h3>
						    		<p class="text-2">web developer</p>
						    	</div>
						    </div>
						    <div class="carousel-item" data-js-testimonial-img="img/testimonial/2.png">
						    	<div class="testimonials-item">
						    		<p class="text-1">I am impressed with the quality of instructors at AcademyWeb. The content is well-structured, and the interactive nature of the courses keeps me motivated. It's a fantastic platform for anyone looking to enhance their skills.</p>
						    		<h3>Alex Rodriguez</h3>
						    		<p class="text-2">Game developer</p>
						    	</div>
						    </div>
						    <div class="carousel-item" data-js-testimonial-img="img/testimonial/3.png">
						    	<div class="testimonials-item">
						    		<p class="text-1">The support from AcademyWeb's community and instructors is outstanding. I feel like I'm part of a learning community where everyone is committed to success. The practical insights gained from the courses have been invaluable in my career.</p>
						    		<h3>Sarah Johnson</h3>
						    		<p class="text-2">Data scientis</p>
						    	</div>
						    </div>
						  </div>
						  <button class="carousel-control-prev" type="button" data-bs-target="#carouselOne" data-bs-slide="prev">
						    <i class="fas fa-arrow-left"></i>
						    <span class="visually-hidden">Previous</span>
						  </button>
						  <button class="carousel-control-next" type="button" data-bs-target="#carouselOne" data-bs-slide="next">
						    <i class="fas fa-arrow-right"></i>
						    <span class="visually-hidden">Next</span>
						  </button>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!--testimonials section ends-->

		<!--become an instructor section starts-->
		<section class="bai-section section-padding">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-xl-10">
						<div class="box">
							<div class="row align-items-center">
								<div class="col-md-6">
									<div class="circular-img">
										<div class="circular-img-inner">
											<div class="circular-img-circle">
											</div>
											<img src="img/bai-img.png">
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="section-title m-0">
										<h2 class="title">
											become an instructor
										</h2>
										<p class="sub-title">Become an Instructor</p>
									</div>
									<a href="educator/login.php" class="btn btn-theme">get started</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section> 
		<!--become a instructor section ends-->

	<?php include('footer.php'); ?>