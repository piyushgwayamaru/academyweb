<?php include('header.php'); ?>

<?php ob_start();?>

<section class="h-100">
  <div class="container py-3 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col">
        <div class="card card-registration my-4">
          <div class="row g-0">
            <div class="col-xl-6 d-none d-xl-block">
              <img src="img/courses/music/banner.png"
                alt="Sample photo" class="img-fluid "
                style="border-top-left-radius: .25rem; border-bottom-left-radius: .25rem; height:57.9rem; width:100%;" />
            </div>
            <div class="col-xl-6">
              <div class="card-body p-md-5 text-black">
                <h3 class="mb-5 text-uppercase text-center fw-bold">Become An Instructor</h3>

            <form method="POST" enctype="multipart/form-data">
                <div class="row">
                  <div class="col-md-6 mb-4">
                    <div class="form-outline">
                      <input type="text" name="fname" id="form3Example1m" class="form-control form-control-lg" />
                      <label class="form-label fw-bolder" for="form3Example1m">First name</label>
                    </div>
                  </div>
                  <div class="col-md-6 mb-4">
                    <div class="form-outline">
                      <input type="text" id="form3Example1n" name="lname" class="form-control form-control-lg" />
                      <label class="form-label fw-bolder" for="form3Example1n">Last name</label>
                    </div>
                  </div>
                </div>

                <div class="form-outline mb-4">
                  <input type="text" id="form3Example8" name="address" class="form-control form-control-lg" />
                  <label class="form-label fw-bolder" for="form3Example8">Address</label>
                </div>

                <div class="form-outline mb-4">
                <input type="text" class="form-control form-control-lg " name="phone" maxlength="10" pattern="\d{10}" title="Please enter exactly 10 digits" />
                  <label class="form-label fw-bolder" for="form3Example8">Phone Number</label>
                </div>

               
                <div class="form-outline mb-4">
                <input type="email" id="myEmail" name="email" class="form-control" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$">
                  <label class="form-label fw-bolder">Email ID</label>
                </div>


                <div class="form-group">
                    <label for="exampleFormControlSelect1" class="fw-bolder mb-2">Select Your Course</label>
                    <select class="form-control" id="exampleFormControlSelect1" name="course">
                    
                    <?php 
                        
                        $sql="SELECT * FROM tbl_course";
                        if($result=mysqli_query($conn,$sql))
                        {
                            if(mysqli_num_rows($result)>0)
                            {
                                while($row=mysqli_fetch_array($result))
                                {
                                    ?>

                                    <option value="<?php echo $row['title']; ?>"><?php echo $row['title']; ?></option>
                                    <?php
                                }
                            }
                        }
                   
                    ?>

                    
                    </select>
                  </div>

                  <div class="mb-3">
                    <label for="formFile" class="form-label">Drop Your CV Here!</label>
                    <input class="form-control" type="file" name="cv"  style="height:2.4rem;">
                    </div>

                <div class="d-flex justify-content-center pt-3 mr-5">
                  <button type="submit" name="submit" class="btn btn-light border-dark btn-lg">Apply</button>
                </div>
<br>
                <p class="font-weight-light"><i>NOTE: Only the selected candidates would be called for an interview.</i></p>

              </div>
            </div>
                    </form>
          </div>
        </div>
      </div>
    </div>
  </div>

</section>


<?php  
	//check whether the submit button is clicked or not
	if(isset($_POST['submit']))
	{


        $cv=$_FILES['cv']['name'];
				$cv_type=$_FILES['cv']['type'];
				$cv_size=$_FILES['cv']['size'];
				$cv_tem_loc=$_FILES['cv']['tmp_name'];
				$cv_store="cv/".$cv;

				move_uploaded_file($cv_tem_loc,$cv_store);

		//get the value from category form
		$fname = $_POST['fname'];
        $lname=$_POST['lname'];
        $address=$_POST['address'];
        $phone = $_POST['phone'];
		$email = $_POST['email'];
		$course = $_POST['course'];
    $status="Pending";
        



		
		//create sql query to insert categiry into db
		$sql2 = "INSERT INTO tbl_instructor_enroll SET
			first_name = '$fname',
            last_name = '$lname',
            address = '$address',
            phone = $phone,
			email = '$email',
			course = '$course',
            course_id='$course',
            cv='$cv',
            status='$status'
		
		";
       


		//execute the query and save in db
		$res2 =  mysqli_query($conn,$sql2);
       
        

		//check whether the query executed or not and data added or not
		if($res2 == true)
		
		{
      $_SESSION['status_teacher'] = "Thank You For Applying.";
      $_SESSION['status_teacher_code'] = "success";
		//  $alert="<script>alert('Successfully sent Contacts');</script>";
		//  echo $alert;
		}
		else
		{
      $_SESSION['status_teacher'] = "Failed To Apply.";
      $_SESSION['status_teacher_code'] = "error";
			// $alert="<script>alert('Failed To Send Contacts');</script>";
			// echo $alert;
			

	}
}
	?>
}






<?php include('footer.php'); ?>
<?php ob_flush();?>