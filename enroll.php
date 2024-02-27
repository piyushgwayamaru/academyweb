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
                alt="Sample photo" class="img-fluid"
                style="border-top-left-radius: .25rem; border-bottom-left-radius: .25rem; height:52rem" />
            </div>
            <div class="col-xl-6">
              <div class="card-body p-md-5 text-black">
                <h3 class="mb-5 text-uppercase text-center fw-bold">Course Enrollment Form</h3>

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

                <div class="d-md-flex justify-content-start align-items-center mb-4 py-2">

                  <h6 class="mb-0 me-4 fw-bolder">Gender: </h6>

                  <div class="form-check form-check-inline mb-0 me-4">
                    <input class="form-check-input" type="radio" name="radio" value="Female" />
                    <label class="form-check-label" for="femaleGender fw-bolder">Female</label>
                  </div>

                  <div class="form-check form-check-inline mb-0 me-4">
                    <input class="form-check-input" type="radio" name="radio" value="Male" />
                    <label class="form-check-label" for="maleGender fw-bolder">Male</label>
                  </div>


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

                                    <option value="<?php echo $row['id']; ?>"><?php echo $row['title']; ?></option>
                                    <?php
                                }
                            }
                        }
                   
                    ?>

                    
                    </select>
                  </div>

                <div class="d-flex justify-content-center pt-3 mr-5">
                  <button type="submit" name="submit" class="btn btn-light border-secondary btn-lg">Apply</button>
                </div>

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
		//get the value from category form
		$fname = $_POST['fname'];
        $lname=$_POST['lname'];
        $address=$_POST['address'];
        $phone = $_POST['phone'];
        if(isset($_POST['radio']))
				{
					$gender = $_POST['radio'];
				}
				else
				{
					$gender = "Male";//setting the default value
				}
		$email = $_POST['email'];
		$course = $_POST['course'];
    $course_id = $_POST['course'];
    $status="Pending";
    
   

		
		//create sql query to insert categiry into db
		$sql2 = "INSERT INTO tbl_enroll SET
			first_name = '$fname',
            last_name = '$lname',
            address = '$address',
            phone = $phone,
            gender = '$gender',
			email = '$email',
			course = '$course',
      course_id='$course',
      status='$status'
		
		";


		//execute the query and save in db
		$res2 =  mysqli_query($conn,$sql2);

		//check whether the query executed or not and data added or not
		if($res2 == true)
		
		{
      $_SESSION['status'] = "Registered Successfully";
      $_SESSION['status_code'] = "success";
		//  $alert="<script>alert('Successfully sent Contacts');</script>";
		//  echo $alert;
		}
		else
		{
      $_SESSION['status'] = "Registered Unsuccess";
      $_SESSION['status_code'] = "error";
			// $alert="<script>alert('Failed To Send Contacts');</script>";
			// echo $alert;
			

	}
}
	?>
}






<?php include('footer.php'); ?>
<?php ob_flush();?>