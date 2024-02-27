<?php  
	include('header.php');
	include('navbar.php');
?>

<div class="main-content" style="margin-left:200px;">
	<div class="wrapper">
		<h2>Add Lesson</h2>
		<br><br>

		<?php  
			if (isset($_SESSION['upload'])) 
			{
				echo $_SESSION['upload'];
				unset($_SESSION['upload']);
			}
		?>

		<form method="POST" enctype="multipart/form-data">
            <table class="tbl-30">
                <tr>
                    <td>Title:</td>
                    <td>
                    <input type="text" name="lesson_name">
                    </td>
                </tr>


               
               
				<tr>
					<td>Course:</td>
					<td>
						<select name="course">

							<?php  
							if(isset($_GET['id'])) {
								$course_id = $_GET['id'];
							
								// Create SQL to get all active categories from db
								$sql = "SELECT title FROM tbl_course WHERE id='$course_id' ";
							
								// Executing query
								$res = mysqli_query($conn, $sql);
							
								// Check if the query was successful
								if($res) {
									while($row = mysqli_fetch_assoc($res)) {
										// Get the details of categories
										$title = $row['title'];
							
										// Display categories in an option tag
										echo "<option value='$course_id'>$title</option>";
									}
								}
							}	
							?>	
						</select>
					</td>
				</tr>

				<tr>
					<td>Active:</td>
					<td>
						<input type="radio" name="active" value="Yes">Yes
						<input type="radio" name="active" value="No">No
					</td>
				</tr>


				
			
				<tr>
					<td colspan="2">
						<input type="submit" name="submit" value="Add Lesson" class="btn-secondary">
					</td>
				</tr>

			</table>
		</form>

		<?php  
			if(isset($_POST['submit'])){
				
				$lesson_name = $_POST['lesson_name'];
				$active = $_POST['active'];
				
				// move_uploaded_file($tmpname,$folder);
				    // SQL Injection Prevention: Use prepared statements
					$sql = "INSERT INTO tbl_lesson (course_id, lesson_name, active) VALUES ('$course_id','$lesson_name','$active')";
					$res2 = mysqli_query($conn,$sql);

					//check whether data inserted or not
	
					//redirect with msg to manage food page
	
					if ($res2 == true) 
					{
						//data inserted successfully
						$_SESSION['upload'] = "<div class='success'>Lesson added successfully.</div>";
						header('Location: manage-lesson.php?id=' . $course_id);
					}
					else
					{
						//failed to insert data
						$_SESSION['upload'] = "<div class='error'>Failed to add lesson.</div>";
						header('Location: manage-lesson.php?id=' . $course_id);
					}

				
				
			}
			
		?>

	</div>
</div>
