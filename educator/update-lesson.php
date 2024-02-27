<?php  
	include('header.php');
	include('navbar.php');
?>
<?php ob_start();?>
	

<div class="main-content" style="margin-left:200px;">
	<div class="wrapper">
		<h1>Update Lesson</h1>
		<br><br>

		<?php 
			//check whether id  is set or not
			if(isset($_GET['id']))
			{
				//get all the details
				$id = $_GET['id'];

				//sql query to get the selected course
				$sql2 = "SELECT * from tbl_lesson WHERE id = $id";

				//execute the  query
				$res2 = mysqli_query($conn,$sql2);
                // $count2 = msqli_num_rows($res2);
                //  if($count2 == 1){

                 

				//get the value based on the query executed
				$row2 = mysqli_fetch_assoc($res2);

				//get the individual value of the selected course
				$title = $row2['lesson_name'];
                $active= $row2['active'];
				//$video_url = $row2['video'];

			}
			else
			{
				//redirect to manage coure
				header('location:'.'manage-courses.php');
			}
		 ?>

		<form method="POST" enctype="multipart/form-data">
			<table class="tbl-30">
				<tr>
					<td>Title:</td>
					<td>
						<input type="text" name="lesson_name" value="<?php echo $title; ?>">
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
						<input type="submit" name="submit" value="Update Lesson" class="btn-secondary">
					</td>
				</tr>
			</table>
		</form>

		
	<?php  
		if (isset($_POST['submit'])) {
			// Get all the details from the form
			$id = $_POST['id'];
			$title = $_POST['lesson_name'];
			$active = $_POST['active'];
			
		
			// Update the lesson details in the database
			$sql3 = "UPDATE tbl_lesson SET
						lesson_name = '$title',
						active = '$active'				
					WHERE id = $id";
		
			$res3 = mysqli_query($conn, $sql3);
		
			if ($res3) {
				// Lesson updated successfully
				$_SESSION['update'] = "<div class='success'>Lesson Updated successfully.</div>";
				header('location: manage-courses.php');
				exit();
			} else {
				// Failed to update lesson
				$_SESSION['update'] = "<div class='error'>Failed to update Lesson.</div>";
				header('location: manage-courses.php');
				exit();
			}
		}
		
	?>

	</div>
</div>

<?php ob_flush();?>

