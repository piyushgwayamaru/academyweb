



<?php include('header.php'); 

if (isset($_SESSION['SESSION_EMAIL'])){
    $email = $_SESSION['SESSION_EMAIL'];
}
?>

	<!--breadcrumb starts-->
	<div class="breadcrumb-nav">
		<div class="container">
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb mb-0">
					<li class="breadcrumb-item"><a href="index.php">Home</a></li>
					<li class="breadcrumb-item active" aria-current="page">My courses</li>
				</ol>
			</nav>
		</div>
	</div>
	<!--breadcrumb ends-->

	<!--course section starts-->
	<section class="course-section section-padding">
		<div class="container">
			<h2>My Courses</h2><br>
		<div class="row">
		<div class="col-12">
			
			
				<div class="tab-pane fade show <?php if($cc == 0){ echo 'active'; }?> " id="<?php echo str_replace(' ','-',$name)?>" role="tabpanel" aria-labelledby="web-development-tab">
				<div class="row">
				<?php
				$sql="SELECT *, tbl_course.id
                FROM tbl_course
                JOIN tbl_enroll ON tbl_course.id = tbl_enroll.course_id 
                where email = '$email' AND status=1 AND active='Yes'";
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
				<!--courses item starts-->

				<div class="col-md-6 col-lg-3">
					<div class="courses-item">
						<a href="watch.php?course_id=<?php echo $id; ?>" class="link">
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
									?>
									</div>
												
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
	
	</div>
</div>
</div>
				
					</div>
				</div>
			</div>
		</section>
		<!--course section ends-->

		<?php include('footer.php'); ?>

