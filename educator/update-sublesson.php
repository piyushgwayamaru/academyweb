<?php  
	include('header.php');
	include('navbar.php');
?>
<?php ob_start();?>
	
<div class="main-content" style="margin-left:200px;">
	<div class="wrapper">
		<h1>Update Sub Lesson</h1>
		<br><br>

		<?php 
		
			
			if(isset($_GET['id']))
			{
				//get all the details
				$id = $_GET['id'];
				$lesson_id = $_GET['lesson_id'];

				//sql query to get the selected sublesson
				$sql2 = "SELECT * from tbl_sublesson WHERE sublesson_id = $id";

				//execute the  query
				$res2 = mysqli_query($conn,$sql2);
                // $count2 = msqli_num_rows($res2);
                //  if($count2 == 1){

                 

				//get the value based on the query executed
				$row2 = mysqli_fetch_assoc($res2);

				//get the individual value of the selected sublesson
				$title = $row2['sublesson_name'];
                $active= $row2['active'];
				$duration = $row2['duration'];
				$video_url = $row2['sublesson_video'];

			}
			else
			{
				//redirect to manage sublesson
				header('location:'.'manage-lesson.php');
			}
		 ?>

		<form method="POST" enctype="multipart/form-data">
			<table class="tbl-30">
				<tr>
					<td>Title:</td>
					<td>
						<input type="text" name="sublesson_name" value="<?php echo $title; ?>">
					</td>
				</tr>
				<tr>
					<td>Video URL:</td>
					<td>
						<input type="file" name="new_video" >
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
					<td>Duration:</td>
					<td>
						<input type="text" name="duration" value="<?php echo $duration; ?>">
					</td>
				</tr>
				<tr>
					<td>PDF Notes:</td>
					<td>
						<input type="file" name="pdf_notes" value="<?php echo $pdf_notes; ?>">
					</td>
				</tr>

				<tr>
					<td>
						<input type="hidden" name="id" value="<?php echo $id; ?>">
						<input type="submit" name="submit" value="Update Sub Lesson" class="btn-secondary">
					</td>
				</tr>
			</table>
		</form>

		<?php
			if(isset($_POST['submit']))
			{
				if(isset($_FILES['new_video'])){
					$filename = $_FILES['new_video']['name'];
					$tmpname = $_FILES['new_video']['tmp_name'];
					$error = $_FILES['new_video']['error'];
					$folder = "videos/". $filename;
			
					if($error === 0){
						$video_ex = pathinfo($filename, PATHINFO_EXTENSION);
						$video_ex_lc = strtolower($video_ex);
			
						$allowed_exs = array("mp4", 'webm', 'avi', 'flv');
			
						if(in_array($video_ex_lc, $allowed_exs)){
			
							$new_video_name = uniqid("video-",true). '.'.$video_ex_lc;
							$video_upload_path= 'videos/'.$new_video_name;
							move_uploaded_file($tmpname, $video_upload_path);
						}
					}	
				}
			}
		?>

	<?php  
		if (isset($_POST['submit'])) {
			// Get all the details from the form
			$id = $_POST['id'];
			$title = $_POST['sublesson_name'];
			$active = $_POST['active'];
			$duration = $_POST['duration'];
			$pdf_notes = $_POST['pdf_notes'];
			$new_video_name = $_POST['new_video'];
		
			// Update the lesson details in the database
			$sql3 = "UPDATE tbl_sublesson SET
						sublesson_name = '$title',
						active = '$active',
						sublesson_video = '$new_video_name',
						pdf_notes = '$pdf_notes',
						duration = '$duration'
					WHERE sublesson_id = $id";
		
			$res3 = mysqli_query($conn, $sql3);
		
			if ($res3) {
				// Sub Lesson updated successfully
				$_SESSION['update'] = "<div class='success'>Sub Lesson Updated successfully.</div>";
				header("location: manage-sublesson.php?id=".$lesson_id);
				exit();
			} else {
				// Failed to update lesson
				$_SESSION['update'] = "<div class='error'>Failed to update Sub Lesson.</div>";
				header('location: manage-courses.php');
				exit();
			}
		}
		
	?>

	</div>
</div>

<?php ob_flush();?>

