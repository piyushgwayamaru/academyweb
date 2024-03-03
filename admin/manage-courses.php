<?php include('header.php');
include('navbar.php'); 
?>	
 <div class="col-sm-9" style="margin-top: 30px; margin-left:230px;">
<div class="main-content" style="margin-top:-50px;">
	<div class="wrapper">
		<h2>Manage Course</h2>

			<?php  
				if (isset($_SESSION['add'])) 
				{
					echo $_SESSION['add'];
					unset($_SESSION['add']);
				}
				if (isset($_SESSION['delete'])) 
				{
					echo $_SESSION['delete'];
					unset($_SESSION['delete']);
				}
				if (isset($_SESSION['upload'])) 
				{
					echo $_SESSION['upload'];
					unset($_SESSION['upload']);
				}
				if (isset($_SESSION['unauthorized'])) 
				{
					echo $_SESSION['unauthorized'];
					unset($_SESSION['unauthorized']);
				}
				if (isset($_SESSION['update'])) 
				{
					echo $_SESSION['update'];
					unset($_SESSION['update']);
				}
				if (isset($_SESSION['failed-remove'])) 
				{
					echo $_SESSION['failed-remove'];
					unset($_SESSION['failed-remove']);
				}

			?>

			<!-- Search Courses -->
			<div class="search-container col-sm-9">
				<form action="" method="post">
					<div class="search-fields ">
						<input type="text" placeholder="search" name="searchitem">
						<button type="submit" name="search"><i class="fa-solid fa-magnifying-glass"></i></button>
					</div>
				</form>
			</div>
<!-- display courses -->
<table class="table tbl-full">
				<thead>	
					<tr>
						<th>S.N.</th>
						<th>Title</th>
						<th>Image</th>
						<th>Active</th>
						<th>Actions</th>
					</tr>
				</thead>



				<?php  

					//create sql query too get all the courses
					$sql = "SELECT * FROM tbl_course";

					//execute the query
					$res = mysqli_query($conn,$sql);

					//count rows to check whether we have or courses or not
					$count = mysqli_num_rows($res);

					//create serial no variable and set default value as 1 
					$sn = 1;

					if ($count>0 && (!isset($_POST['search']))) 
					{
						//we have courses in db
						//get the course from db and display
						while ($row = mysqli_fetch_assoc($res)) 
						{
							//get the value from the indivisual column
							$id = $row['id'];
							$title = $row['title'];
							$image_name = $row['image'];
							$active = $row['active'];
							?>

							<tr>
								<td><?php echo $sn++; ?></td>
								<td><a href="manage-lesson.php?id=<?php echo $id; ?>"><?php echo $title; ?></a></td>
								<td>
									<?php 
									//check whether image name is availale or not
								if($image_name !="")
								{
									//display image
									?>
									<img src="../img/admin/course/<?php echo $image_name;  ?>" width="100px">
									<?php

								}
								else
								{
									//display message
									echo "<div class='error'>Image not added.</div>";
								}
								?>
							</td>
							<td><?php echo $active; ?></td>
								
								
								<td>
									<?php 
									if ($active == 'Yes'){
										echo "<a href='block-course.php?id= $id; ?>' title='block course' class='btn btn-danger' onclick=\"return confirm('Are you sure you want to block this course?')\"><i class='fa-solid fa-ban'></i></a>";

									}else{
										echo "<a href='unblock-course.php?id=$id' title='unblock course' class='btn btn-danger' onclick=\"return confirm('Are you sure you want to unblock this course?')\"><i class='fa-solid fa-circle-check'></i></a>";
									}
									?>
								</td>
							</tr>

							<?php
						}
					}
					else if(isset($_POST['search']))
					{
						//food not added in db
						$searchitem = $_POST['searchitem'];
				
						$query = "SELECT * FROM tbl_course WHERE title LIKE '%$searchitem%'";
						$result = mysqli_query($conn, $query);
						$sno = 1;
						if (mysqli_num_rows($result) > 0 ){
						while($row = mysqli_fetch_assoc($result)){
							$id = $row['id'];
							$title = $row['title'];
							$image_name = $row['image'];
							$active = $row['active'];
							?>

							<tr>
								<td><?php echo $sno++; ?></td>
								<td><a href="../course-details.php?id=<?php echo $id; ?>"><?php echo $title; ?></a></td>
								<td>
									<?php 
									//check whether image name is availale or not
								if($image_name !="")
								{
									//display image
									?>
									<img src="../img/admin/course/<?php echo $image_name;  ?>" width="100px">
									<?php

								}
								else
								{
									//display message
									echo "<div class='error'>Image not added.</div>";
								}
								?>
							</td>
							<td><?php echo $active; ?></td>
								
								<td>
									<?php 
									if ($active == "Yes"){
										echo "<a href='block-course.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>' title='block course class='btn btn-danger' onclick='return confirm('Are you sure you want to block this course?')'><i class='fa-solid fa-ban'></i></a>";
									}else{
										echo "<a href='unblock-course.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>' title='unblock course'class='btn btn-danger' onclick='return confirm('Are you sure you want to unblock this course?')'><i class='fa-solid fa-circle-check'></i></a>";
									}
									?>
								</td>
							</tr>
						<?php
						
						}
						}
						else{
						echo "<tr><td colspan='7' class='error'>No course Found<td></tr>";

						}
					}
					else{

						echo "<tr><td colspan='7' class='error'>course not added yet.</td></tr>";
					}
				?>

				
				
			</table>
	</div>
</div>











			<!-- search course logic-->
			
	


<!-- ------------------------------------------------------------------ -->



