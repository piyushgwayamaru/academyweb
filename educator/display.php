<?php include("../config/constants.php");

    $sql = "SELECT * FROM video";
    $query = mysqli_query($conn,$sql);


    if(mysqli_num_rows($query)>0) {
        while($video = mysqli_fetch_assoc($query)) {
    ?>

        <video src="videos/<?=$video['name']?>" controls height=500px width=500px>
        
        </video>

   <?php
        }
    }

?>


<?php
				 
				 	$sql = "SELECT preview_video FROM tbl_course where id= '$course_id'";
    				$query = mysqli_query($conn,$sql);

					$result = mysqli_fetch_assoc($query);										
					echo $result['preview_video'];
					?>
				<video src="educator/videos/<?php echo $result['preview_video'];?>"></video>




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