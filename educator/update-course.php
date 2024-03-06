<?php  
	include('header.php');
	include('navbar.php');
?>
<?php ob_start();?>
	
<div class="main-content" style="margin-left:200px;">
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
				$sql2 = "SELECT * from tbl_course WHERE id = $id";

				//execute the  query
				$res2 = mysqli_query($conn,$sql2);
                // $count2 = msqli_num_rows($res2);
                //  if($count2 == 1){

                 

				//get the value based on the query executed
				$row2 = mysqli_fetch_assoc($res2);

				//get the individual value of the selected food
				$current_image = $row2['image'];
				$title = $row2['title'];
				$current_category = $row2['category_id'];
                
				$price = $_POST['price'];
				$discount = $_POST['discount'];

			}
			else
			{
				//redirect to manage food
				header('location:'.'manage-courses.php');
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
					<td>Current Image:</td>
					<td>
						<?php 
							if ($current_image == "") 
							{
								//Image not availabel
								echo "<div class='error'>Image not available.</div>";
							}
							else
							{
								//Image available
								?>
									<img src="../img/admin/course/<?php echo $current_image; ?>"width="100px">
								<?php
							}
						?>
					</td>
				</tr>
				<tr>
					<td>Select New Image:</td>
					<td>
						<input type="file" name="image">
					</td>
				</tr>

                <tr>
					<td>Category:</td>
					<td>
						<select name="category">

							<?php  
							//query to get active caategories
							$sql = "SELECT * FROM tbl_category WHERE active ='Yes' ";

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
									$category_title = $row['name'];
									$category_id = $row['id'];
									
									//echo "<option  value='$category_id'>$category_title</option>"; 

									?>

									<option <?php if ($current_category == $category_id) {echo "selected";} ?> value="<?php echo $category_id; ?>"><?php echo $category_title; ?></option>

									<?php  
								}
							}
							else
							{
								//category not available
								echo "<option value='0'>Category Not Available.</option>";
							}

							?>

							
						</select>
					</td>
				</tr>
				
                

				<tr>
					<td>Price:</td>
					<td>
                    <input type="number" name="price" value="<?php echo $price; ?>">
					</td>
				</tr>
				<tr>
					<td>Discount:</td>
					<td>
                    <input type="number" name="discount" value="<?php echo $discount; ?>">
					</td>
				</tr>
				
				<tr>
					<td>
						<input type="hidden" name="id" value="<?php echo $id; ?>">
						<input type="hidden" name="current_image" value="<?php echo $current_image; ?>">
						<input type="submit" name="submit" value="Update Course" class="btn-secondary">
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
			$current_image = $_POST['current_image'];
            $category = $_POST['category'];
            
			$price = $_POST['price'];
            $discount = $_POST['discount'];



			//upload the image if selected

			//check whether upload button is clicked or not
			if (isset($_FILES['image']['name'])) 
			{
				//upload button clicked.
				$image_name = $_FILES['image']['name'];//new image name

				//check whether the file is available or not
				if ($image_name != "") 
				{
					//image is available
					//uploading new image


					//rename the image
					$ext1 = explode('.', $image_name);
                    $ext2 = end($ext1);
					$image_name = "Course-Name-".rand(0000, 9999).'.'.$ext2;//this will be renamed image 

					//get the source path and destination ppath
					$src_path = $_FILES['image']['tmp_name'];//src path
					$dest_path = "../img/admin/course/".$image_name;//destination path 

					//uploaod the image
					$upload = move_uploaded_file($src_path, $dest_path);

					//check whether the image is uoloaded or not
					if ($upload = false) 
					{
						//failed to upload
						$_SESSION['upload'] = "<div class='error'>Failed to upload new image.</div>";	
						//redirect to manage 
						header('location:'.'manage-courses.php');	
						//stop the process
						die(); 		
					}
					//remove the image if new image is uploaded

					//remove current image if availabel
					if ($current_image != "")
					{
						//current image is available
						//remove image
						$remove_path = "../img/admin/course/".$current_image;

						$remove = unlink($remove_path);

						//check whether the image is removed or not
						if ($remove = false) 
						{
							//failed to remove current image
							$_SESSION['failed-remove'] = "<div class='error'>Failed to remove current image.</div>";
							//redirect to manage 
							header('location:'.'manage-courses.php');
							//stop the process
							die();
						}

					}


					
				}
				else
				{
					$image_name = $current_image;//default image when image is not selected.
				}
				
			}
			else
			{
				$image_name = $current_image;//default image when button is not clicked.
			}


			//update the food in db
			$sql3 = "UPDATE tbl_course SET
                category_id = '$category',
				title = '$title',
				image = '$image_name',
				price = '$price',
                discount = '$discount'

				WHERE id=$id
			";

			//execute the sql query
			$res3 = mysqli_query($conn,$sql3);

			//check whether the query is executed or not
			if ($res3 == true) 
			{
				//query executed and food updated
				$_SESSION['update']="<div  class='success'>Course Updated successfully.</div>";
				header('location:'.'manage-courses.php');
			}
			else
			{
				//failed to update food
				$_SESSION['update']="<div  class='error'>Failed to update course.</div>";
				header('location:'.'manage-courses.php');
			}

			//redirect to manage food with session msg

		}
	?>

	</div>
</div>

<?php ob_flush();?>

