<?php  
	include('header.php');
	include('navbar.php');
?>

<div class="main-content" style="margin-left:200px;">
	<div class="wrapper">
		<h2>Add Sub Lesson</h2>
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
                    <input type="text" name="sublesson_name">
                    </td>
                </tr>


               
               
				<tr>
					<td>Lesson:</td>
					<td>
						<select name="lesson">

							<?php  
							if(isset($_GET['id'])) {
								$lesson_id = $_GET['id'];
							
								// Create SQL to get all active categories from db
								$sql = "SELECT lesson_name FROM tbl_lesson WHERE id='$lesson_id' ";
							
								// Executing query
								$res = mysqli_query($conn, $sql);
							
								// Check if the query was successful
								if($res) {
									while($row = mysqli_fetch_assoc($res)) {
										// Get the details of categories
										$title = $row['lesson_name'];
							
										// Display categories in an option tag
										echo "<option value='$lesson_id'>$title</option>";
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
					<td>Add Video:</td>
					<td>
						<input type="file" name="sublesson-video" required>
					</td>
				</tr>			

				<tr>
					<td>PDF:</td>
					<td>
						<input type="file" name="pdf_notes">
					</td>
				</tr>

				<tr>
					<td colspan="2">
						<input type="submit" name="submit" value="Add Sub Lesson" class="btn-secondary">
					</td>
				</tr>

			</table>
		</form>

		<?php  
			
			if (isset($_POST['submit']) && isset($_FILES['sublesson-video']) ) {
				$filename = $_FILES['sublesson-video']['name'];
				$tmpname = $_FILES['sublesson-video']['tmp_name'];
				$error = $_FILES['sublesson-video']['error'];

				$sublesson_name = $_POST['sublesson_name'];
				
				
				if (isset($_FILES['pdf_notes'])) {
					$pdfFilename = $_FILES['pdf_notes']['name'];
					$pdf_ex = pathinfo($pdfFilename, PATHINFO_EXTENSION);
					$pdf_ex_lc = strtolower($pdf_ex);
					$allowed_pdf_exs = array("pdf");
				
					if (in_array($pdf_ex_lc, $allowed_pdf_exs)) {
						$new_pdf_name = uniqid("pdf-", true) . '.' . $pdf_ex_lc;
				
						// Specify the target directory
						$targetDirectory = "pdf_notes/";
				
						// Check if the directory exists, create it if not
						if (!file_exists($targetDirectory)) {
							mkdir($targetDirectory, 0777, true);
						}
				
						// Specify the target file path
						$targetFile = $targetDirectory . basename($new_pdf_name);
				
						// Move the uploaded PDF file to the target directory
						move_uploaded_file($_FILES['pdf_notes']['tmp_name'], $targetFile);	
					} else {
						echo "<script>alert('Invalid file format. Only PDF files are allowed.');</script>";
					}
				}
				
				$active = $_POST['active'];
			
				if ($error === 0) {
					$video_ex = pathinfo($filename, PATHINFO_EXTENSION);
					$video_ex_lc = strtolower($video_ex);
			
					$allowed_exs = array("mp4", 'webm', 'avi', 'flv');
			
					if (in_array($video_ex_lc, $allowed_exs)) {
						// Construct the FFmpeg command to get the duration
						$ffmpegCommand = "C:\\ffmpeg\\bin\\ffmpeg.exe -i \"$tmpname\" 2>&1";
						$durationString = shell_exec($ffmpegCommand);
			
						// Extract the duration from the FFmpeg output
						$duration = 0;
						preg_match('/Duration: (.*?),/', $durationString, $matches);
						if (isset($matches[1])) {
							$duration = $matches[1];
							$duration = preg_replace('/\.\d+/', '', $duration);
						}
						if(in_array($video_ex_lc, $allowed_exs)){
		
							$new_video_name = uniqid("video-",true). '.'.$video_ex_lc;
							$video_upload_path= 'videos/'.$new_video_name;
							move_uploaded_file($tmpname, $video_upload_path);
						}
			
						// Insert data into the database
						$sql = "INSERT INTO tbl_sublesson (lesson_id, sublesson_name, sublesson_video, duration, pdf_notes, active) 
								VALUES ('$lesson_id','$sublesson_name', '$new_video_name','$duration', '$new_pdf_name','$active')";
						$res2 = mysqli_query($conn, $sql);
			
						if ($res2 == true) {
							// Data inserted successfully
							$_SESSION['upload'] = "<div class='success'>Lesson added successfully.</div>";
							header('Location: manage-sublesson.php?id=' . $lesson_id);
						} else {
							// Failed to insert data
							$_SESSION['upload'] = "<div class='error'>Failed to add lesson.</div>";
							header('Location: manage-sublesson.php?id=' . $lesson_id);
						}
					}
					else{
						echo "<script>alert('Invalid file format. Only mp4, webm, avi, fl files are allowed.');</script>";
					}
				}
			}
			?>
			
				
				
				
				
			
		

	</div>
</div>
