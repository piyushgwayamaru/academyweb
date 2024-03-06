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
						<th>Status</th>
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
							if ($active == "No"){
								$status = "Pending";
								$anotherStatus = "Approved";
							}
							else{
								$status = "Approved";
								$anotherStatus = "Pending";
							}
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
							<td>
								<?php
								// Increment the form and select IDs
								
								?>
								<form id="form_<?php echo $id; ?>" action="" method="POST">
									<input type="hidden" name="course_id" value="<?php echo $id; ?>">
									<select name="status" id="select_<?php echo $id; ?>" onchange="checkStatusChange('form_<?php echo $id; ?>')">
										<option value="<?php echo ($active == 'No') ? 'No' : 'Yes'; ?>"><?php echo $status; ?></option>
										<option value="<?php echo ($active == 'No') ? 'Yes' : 'No'; ?>"><?php echo $anotherStatus; ?></option>
									</select>
									<button name="submit" type="submit" style="display:none;">Save</button>
								</form>
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

<!-- Status Change logic -->
<?php

    if (isset($_POST['status'])) {
        $selectedStatus = $_POST['status'];
		echo $selectedStatus;
		$course_id = $_POST['course_id'];
	

		$sql = "Update tbl_course set active='$selectedStatus' where id='$course_id'";
		$res = mysqli_query($conn,$sql);
		if ($res==true){
			$_SESSION['update'] = "<div class='success'>Status updated successfully.</div>";
			header('location:'.'manage-courses.php');	
		}
		else{
			$_SESSION['update'] = "<div class='danger'>Status updated successfully.</div>";
			header('location:'.'manage-courses.php');	
		}

		
    }

?>

<script>
    // Function to check if status has changed
    function checkStatusChange(formID) {
        var form = document.getElementById(formID);
        var select = form.querySelector('select[name="status"]');
        var submitButton = form.querySelector('button[name="submit"]');

        var currentValue = select.value;
        var originalValue = select.getAttribute('data-original');

        if (currentValue !== originalValue) {
            submitButton.style.display = 'block'; // Show the button if value changed
        } else {
            submitButton.style.display = 'none'; // Hide the button if value not changed
        }
    }
</script>







			<!-- search course logic-->
			
	


<!-- ------------------------------------------------------------------ -->



