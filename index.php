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
function realNum($num) {
	$num1 = floor($num);
	$num2 = $num1+.5;
	$num3 = $num1+1;
	if (($num >= $num1) && ($num < $num2)) {
		$answer = $num1;
	} 
	elseif (($num >= $num2) && ($num < $num3)) {
		$answer = $num2;
	}
	return $answer;
}
				?>
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
								$instructor_id=$row['educator_id'];
								$price=$row['price'];
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
	
	$sql="SELECT * FROM tbl_reviews where course_id = $id";
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

	if($count !=0){
		$real_rating = $sum/$count;
	} else{
		$real_rating = 0;
	}
	
	// echo $real_rating;
	$real_rating_final = realNum($real_rating);

?>
					<!--courses item starts-->
					<div class="col-md-6 col-lg-3">
						<div class="courses-item">
							<a href="course-details.php?course_id=<?php echo $id; ?>" class="link"> 
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
										<span class="instructor-name"><?php 
										$res1 = mysqli_query($conn, "SELECT name FROM tbl_educator WHERE id='$instructor_id'");
										$row1 = mysqli_fetch_assoc($res1);

										echo $row1['name']; ?> </span>
									</div>
									
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
							<span clas reviews><?php #echo $reviews_number; ?></span>
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