<?php  
	include('header.php');
?>
<?php ob_start();?>
	

<div class="main-content">
	<div class="wrapper">
		<h1>Update Course</h1>
		<br><br>

		<?php 
			//check whether id  is set or not
			if(isset($_GET['id']))
			{
				//get all the details
				$id = $_GET['id'];

				//sql query to get the selected food
				$sql2 = "SELECT * from tbl_chapter WHERE id = $id";

				//execute the  query
				$res2 = mysqli_query($conn,$sql2);
                // $count2 = msqli_num_rows($res2);
                //  if($count2 == 1){

                 

				//get the value based on the query executed
				$row2 = mysqli_fetch_assoc($res2);

				//get the individual value of the selected food
				
				$title = $row2['name'];
				$current_course = $row2['course_id'];
                $active = $row2['active'];

			}
			else
			{
				//redirect to manage food
				header('location:'.'manage-chapter.php');
			}
		 ?>

		<form method="POST" enctype="multipart/form-data">
			<table class="tbl-30">
				<tr>
					<td>Title:</td>
					<td>
						<input type="text" name="title" value="<?php echo $title; ?>">
					</td>
				</tr>
				
				
                <tr>
					<td>Course:</td>
					<td>
						<select name="course">

							<?php  
							//query to get active caategories
							$sql = "SELECT * FROM tbl_course WHERE active ='Yes' ";

							//execute the query
							$res = mysqli_query($conn,$sql);

							//count rows
							$count = mysqli_num_rows($res);

							//check whether the category available or not
							if($count>0)
							{
								//category available
								while ($row = mysqli_fetch_assoc($res)) 
								{
									$course_title = $row['title'];
									$course_id = $row['id'];
									
									//echo "<option  value='$category_id'>$category_title</option>"; 

									?>

									<option <?php if ($current_course == $course_id) {echo "selected";} ?> value="<?php echo $course_id; ?>"><?php echo $course_title; ?></option>

									<?php  
								}
							}
							else
							{
								//category not available
								echo "<option value='0'>Course Not Available.</option>";
							}

							?>

							
						</select>
					</td>
				</tr>
				
                <tr>
					<td>Active:</td>
					<td>
						<input <?php if ($active == "Yes") {echo "checked";} ?> type="radio" name="active" value="Yes">Yes
						<input <?php if ($active == "No") {echo "checked";} ?> type="radio" name="active" value="No">No
					</td>
				</tr>
				
				<tr>
					<td>
						<input type="hidden" name="id" value="<?php echo $id; ?>">
						<input type="submit" name="submit" value="Update Chapter" class="btn-secondary">
					</td>
				</tr>
			</table>
		</form>

	<?php  
		if (isset($_POST['submit'])) 
		{
			//get all the details from the form
			$id = $_POST['id'];
			$title = $_POST['title'];
            $course = $_POST['course'];
            $active = $_POST['active'];

			//update the food in db
			$sql3 = "UPDATE tbl_chapter SET
                course_id = '$course',
				name = '$title',
                active = '$active'

				WHERE id=$id
			";

			//execute the sql query
			$res3 = mysqli_query($conn,$sql3);

			//check whether the query is executed or not
			if ($res3 == true) 
			{
				//query executed and food updated
				$_SESSION['update']="<div  class='success'>Chapter Updated successfully.</div>";
				header('location:'.'manage-chapter.php');
			}
			else
			{
				//failed to update food
				$_SESSION['update']="<div  class='error'>Failed to update Chapter.</div>";
				header('location:'.'manage-chapter.php');
			}

			//redirect to manage food with session msg

		}
	?>

	</div>
</div>

<?php ob_flush();?>

