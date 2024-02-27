<?php  
	include('header.php');
	include('navbar.php')
?>

<div class="main-content" style="margin-left:200px;">
	<div class="wrapper">
		<h2>Add Course</h2>
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
                    <td> Select Image:</td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>
				<tr>
					<td>Title:</td>
					<td>
                    <input type="text" name="title">
					</td>
				</tr>
				<tr>
					<td>Category:</td>
					<td>
						<select name="category">

							<?php  

							//create php code to display categories from db
							//1.create sql to get all active categories from db
							$sql = "SELECT *FROM tbl_category WHERE active='Yes'";

							//executing query
							$res = mysqli_query($conn,$sql);

							//count rows to check whether we have caterogies or not
							$count =  mysqli_num_rows($res);

							//if count>0 we have categories
							if ($count>0)
							{
								while ($row = mysqli_fetch_assoc($res)) 
								{
									//get the details of categories
									$id = $row['id'];
									$title = $row['name'];
									?>

									<option value="<?php echo $id; ?>"><?php echo $title;  ?></option>

									<?php

								}
							}

							//else we don't have categories
							else
							{
								?>

								<option value="0">No Category Found</option>

								<?php

							}

							//2.display on drop down

							?>

						</select>
					</td>
				</tr>
				<tr>
					<td>
						<label for="language">Select Language:</label>
						<td>

							<select name="language" id="language">
								<option value="english">English</option>
								<option value="nepali">Nepali</option>
							</select>
						</td>
					</td>
				</tr>
				
				<tr>
					<td>Upload Preview Video:</td>
					<td>
						<input type="file" name="preview_video" required>
					</td>
				</tr>
			
				<tr>
					<td>Description:</td>
					<td>
                    <input type="textarea" name="description">
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
					<td>Price:</td>
					<td>
                    <input type="number" name="price">
					</td>
				</tr>
				<tr>
					<td>Discount:</td>
					<td>
                    <input type="number" name="discount">
					</td>
				</tr>

				<tr>
					<td colspan="2">
						<input type="submit" name="submit" value="Add Course" class="btn-secondary">
					</td>
				</tr>

			</table>
		</form>

		<?php  
			//check whether the button is clicked or not 
			if(isset($_POST['submit']))
			{
				if(isset($_FILES['preview_video'])){
					$filename = $_FILES['preview_video']['name'];
					$tmpname = $_FILES['preview_video']['tmp_name'];
					$error = $_FILES['preview_video']['error'];
					$folder = "videos/". $filename;

			
					if($error === 0){
						$video_ex = pathinfo($filename, PATHINFO_EXTENSION);
						$video_ex_lc = strtolower($video_ex);
			
						$allowed_exs = array("mp4", 'webm', 'avi', 'flv');
			
						if(in_array($video_ex_lc, $allowed_exs)){
			
							$preview_video_name = uniqid("video-",true). '.'.$video_ex_lc;
							$video_upload_path= 'videos/'.$preview_video_name;
							move_uploaded_file($tmpname, $video_upload_path);
						}
					}	
				}
				//add the course in db

				//upload the image if selected
				//check whether the image is clicked or not and upload the image only if the image is selected
				if(isset($_FILES['image']['name']))
				{
					//get the details of the selected image
					$image_name = $_FILES['image']['name'];

					//check whether the selected image is selected or not and upload image only
					if ($image_name != "")
					{
						//image is selected
						//rename the image 
						//get the extension of selected image (jpg,png,gif,etc)
						$ext1 = explode('.',$image_name);
                        $ext2 = end($ext1);

						//create new name for image
						$image_name = "Course-Name-".rand(0000,9999).".".$ext2;//new image name like"Food-Name-657.jpg"

						//upload the image
						//get the source path and destination path

						//source path is the current location of the image 
						$src = $_FILES['image']['tmp_name'];

						//destination path for the image to be uploaded
						$dst = "../img/admin/course/".$image_name;

						//finally upload food image
						$upload = move_uploaded_file($src, $dst);

						//check  whether image uploaded or not
						if($upload == false)
						{
							//failed to upload the image

							//redirect to add page woth error msg
							$_SESSION['upload'] = "<div class='error'>Failed to upload image.</div>";
							header('location:'.'add-course.php');

							//stop the process
							die();

						}


					}
				}
				else
				{
					$image_name = "";//setting default value as blank.
				}



				if(isset($_POST['active']))
				{
					$active = $_POST['active'];
				}
				else
				{
					$active = "No";//setting the default value
				}

				$email = $_SESSION['SESSION_EMAIL'];
				$sqlname = "SELECT id FROM tbl_educator WHERE email='$email'";
				$resname = mysqli_query($conn,$sqlname);
				$row = mysqli_fetch_assoc($resname);
				$educator_id = $row['id'];		
                $title = $_POST['title'];
				$category = $_POST['category'];
				$language = $_POST['language'];
				$description = $_POST['description'];
				$price = $_POST['price'];
				$discount = $_POST['discount'];


				//insert into db
				//create sql query to save or add food

				$sql2 =  "INSERT INTO tbl_course (category_id, image, title, preview_video, educator_id, email, language, description, active)
				VALUES ('$category', '$image_name', '$title', '$preview_video_name','$educator_id','$email', '$language', '$description', '$active')";
	  

				//execute query
				$res2 = mysqli_query($conn,$sql2);

				//check whether data inserted or not

				//redirect with msg to manage food page

				if ($res2 == true) 
				{
					//data inserted successfully
					$_SESSION['add'] = "<div class='success'>Course added successfully.</div>";
					header('location:'.'manage-courses.php');
				}
				else
				{
					//failed to insert data
					$_SESSION['add'] = "<div class='error'>Failed to add course.</div>";
					header('location:'.'manage-courses.php');
				}
			}
		?>

	</div>
</div>
