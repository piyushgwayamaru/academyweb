



<?php include('header.php'); ?>



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
		<!-- search logic -->
<?php
	if(isset($_POST['search']))
	{ ?>
	<!-- Course section starts -->
<section class="course-section section-padding">
    <div class="container">
        
		<div class="row ">
            <div class="col-md-8">
                <div class="section-title ">
                    <h2 class="title">
                        Search Results:
                    </h2>
                </div>
            </div>
        </div>
		<?php
		$searchitem = $_POST['searchitem'];

		$query = "SELECT * FROM tbl_course WHERE title LIKE '%$searchitem%' AND active = 'Yes'";
		$result = mysqli_query($conn, $query);
	
		if (mysqli_num_rows($result) > 0 ){
			while($row = mysqli_fetch_assoc($result)){
				$id=$row['id'];
				$title=$row['title'];
				$image_name=$row['image'];
				$instructor_id=$row['educator_id'];
				$price=$row['price'];
				$ratings = $row['ratings'];
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
        <div class="row">
            <div class="col-12">
                
                <div class="tab-content" id="nav-tabContent">
                    
                    <div class="tab-pane fade show <?php if($cc == 0){ echo 'active'; }?> " id="<?php echo str_replace(' ','-',$name)?>" role="tabpanel" aria-labelledby="web-development-tab">
                        <div class="row ">
                            
                            <!-- Courses item starts -->
                            <div class="col-md-6 col-lg-3">
                                <div class="courses-item ">
                                    <a href="course-details.php?course_id=<?php echo $id; ?>" class="link">
                                        <div class="courses-item-inner">
                                            <div class="img-box">
                                                <img src="img/admin/course/<?php echo $image_name; ?>" alt="course img" style="height:175px; width:300px">
                                            </div>
                                            <h3 class="title"><?php echo $title;?></h3>
                                            <div class="instructor">
                                                <span class="instructor-name"><?php 
                                                    $res1 = mysqli_query($conn, "SELECT name FROM tbl_educator WHERE id='$instructor_id'");
                                                    $row1 = mysqli_fetch_assoc($res1);
                                                    echo $row1['name']; ?> 
                                                </span>
                                            </div>
                                            <div class="rating">
												<span class="average-stars">
									<span class="average-rating">(<?php echo $real_rating_final ?>)</span>		
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
											
                                            <div class="price">Rs.<?php echo $price; ?></div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <!-- Courses item ends -->
                            <?php 
                                }
                            }
							else{
								echo "<tr><td colspan='7' class='danger'>No matching course Found<td></tr>";
							}
                            ?> 
                        </div>
                    </div>				 
                    
                </div>
            </div>
        </div>
 
<!-- Course section ends -->

			
<?php
		
		}
		
	
?>
</div>
</section>






<?php
if (!isset($_POST['search'])){

?>
	<!--breadcrumb starts-->
	<div class="breadcrumb-nav">
		<div class="container">
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb mb-0">
					<li class="breadcrumb-item"><a href="index.php">Home</a></li>
					<li class="breadcrumb-item active" aria-current="page">course</li>
				</ol>
			</nav>
		</div>
	</div>
	<!--breadcrumb ends-->

	<!--course section starts-->
	<section class="course-section section-padding">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-8 ">
					<div class="section-title text-center mb-4">
						<h2 class="title">
							Our Courses
						</h2>
						<p class="sub-title">
							Find the right course for you.
						</p>
					</div>
				</div>
			</div>
		<div class="row">
		<div class="col-12">
			<nav>
				<div class="nav nav-tabs border-0 justify-content-center mb-4" id="web-development-tab" role="tablist">

				<?php
				$sql="SELECT * FROM tbl_category where active='Yes'";

				$res=mysqli_query($conn,$sql);

				$count=mysqli_num_rows($res);

				if($count>0)
				{
					$c = 0;
					while($row=mysqli_fetch_assoc($res))
					{
						//print_r($row); die(); // [id] => 1 [category_id] => 1 [image] => Course-Name-3425.jpg [title] => Html For Beginners [instructor] => Salam Khan [active] => Yes )
						$id=$row['id'];
						$name = $row['name'];

				?>   
				<button class="nav-link <?php if($c == 0){ echo 'active'; }?> " id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#<?php echo str_replace(' ','-',$name)?>" type="button" role="tab" aria-controls="<?php echo str_replace(' ','-',$name)?>" aria-selected="true"><?php echo $name; ?></button>
				<?php 
						$c++; 
					}
				}
				?>			   
				</div>
			</nav>
			<div class="tab-content" id="nav-tabContent">
				<?php 
				$sql="SELECT * FROM tbl_category where active='Yes'";

				$res=mysqli_query($conn,$sql);
				if($count>0)
				{
					$cc=0;
					while($row=mysqli_fetch_assoc($res))
					{
						//print_r($row); die(); // [id] => 1 [category_id] => 1 [image] => Course-Name-3425.jpg [title] => Html For Beginners [instructor] => Salam Khan [active] => Yes )
						$id=$row['id'];
						$name = $row['name'];
				?>
				<div class="tab-pane fade show <?php if($cc == 0){ echo 'active'; }?> " id="<?php echo str_replace(' ','-',$name)?>" role="tabpanel" aria-labelledby="web-development-tab">
				<div class="row">
				<?php
				$sql = "SELECT * FROM tbl_course 
						WHERE category_id = '$id'";
				$res2=mysqli_query($conn,$sql);

				$count2=mysqli_num_rows($res2);

				if($count2>0)
				{
					while($row2=mysqli_fetch_assoc($res2))
					{
						//print_r($row); die(); // [id] => 1 [category_id] => 1 [image] => Course-Name-3425.jpg [title] => Html For Beginners [instructor] => Salam Khan [active] => Yes )
						$id=$row2['id'];
						$title=$row2['title'];
						$image_name=$row2['image'];
						$instructor_id=$row2['educator_id'];
						$price=$row2['price'];
						$ratings = $row2['ratings'];
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
									<img src="img/admin/course/<?php echo $image_name; ?>" alt="course img" style="height:175px; width:300px">
								</div>
								<h3 class="title"><?php echo $title;?></h3>
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
				<?php 
					}
				}
				?> 
			</div>
		</div>				 
	<?php 
		$cc++; 
		}
	}
	?>
	</div>
</div>
</div>
			</div>
		</section>
		<!--course section ends-->
<?php
}
?>
		<?php include('footer.php'); ?>

