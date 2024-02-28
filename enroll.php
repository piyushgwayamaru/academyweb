<?php include('header.php'); ?>

<?php
    $course_id =  $_GET['course_id'];
    $query = mysqli_query($conn, "SELECT * FROM tbl_enroll WHERE email = '{$_SESSION['SESSION_EMAIL']}' && course_id = $course_id");
    if(mysqli_num_rows($query) > 0) {
      $row = mysqli_fetch_assoc($query);
      $status = $row['status'];
      if($status == 1){
        header("Location: watch.php?course_id=$course_id");
      }
    }
?>
<?php ob_start();?>
<?php
    $price_new =  $_GET['price_new'];
    $query = mysqli_query($conn, "SELECT * FROM tbl_user WHERE email = '{$_SESSION['SESSION_EMAIL']}'");
    if(mysqli_num_rows($query) > 0) {
      $row = mysqli_fetch_assoc($query);
      $name = $row['name'];
      $email = $row['email'];    
    }
?>
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
                      <label class="form-label fw-bolder" for="form3Example1m">Name</label>
                      <input type="text" name="name" value="<?php echo $name;?>" id="form3Example1m" class="form-control form-control-lg" />                      
                    </div>
                  </div>
        
                </div>

                <div class="form-outline mb-4">
                <label class="form-label fw-bolder" for="form3Example8">Phone Number</label>
                  <input type="text" class="form-control form-control-lg " name="phone" maxlength="10" pattern="\d{10}" title="Please enter exactly 10 digits" />                  
                </div>


                
                <div class="form-outline mb-4">
                  <label class="form-label fw-bolder">Email ID</label>
                  <input type="email" id="myEmail" name="email" value="<?php echo $email;?>" class="form-control" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$">               
                </div>

                <div class="form-outline mb-4">
                  <label class="form-label fw-bolder">Total:</label>
                  <input type="text" id="price_new" value="<?php echo $price_new;?>" class="form-control">               
                </div>

                <div class="form-group">
                    <label for="exampleFormControlSelect1" class="fw-bolder mb-2">Selected Course</label>
                    <select class="form-control" id="exampleFormControlSelect1" name="course">
                    
                    <?php 
                        $id =  $_GET['course_id'];
                        $sql="SELECT * FROM tbl_course where id = '".$id."'";
                        if($result=mysqli_query($conn,$sql))
                        {
                            if(mysqli_num_rows($result)>0)
                            {
                                while($row=mysqli_fetch_array($result))
                                {
                                    $title = $row['title'];
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
		    $name = $_POST['name'];
        $phone = $_POST['phone'];   
        $email = $_POST['email'];
        $course_id = $id;
        $status= 0;
        
        
        function generateRandomString($length = 10) {
              $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
              $randomString = '';
              for ($i = 0; $i < $length; $i++) {
                  $randomString .= $characters[rand(0, strlen($characters) - 1)];
              }
              return $randomString;
       }
       $order_id = generateRandomString();
      
      // Usage
      echo generateRandomString(10); // Generates a random string of length 10
      
		
		//create sql query to insert categiry into db
		$sql2 = "INSERT INTO tbl_enroll SET
			      name = '$name',
            phone = '$phone',
            email = '$email',
            course_id='$course_id', 
            status = '$status',
            order_id = '$order_id'
            ";


		//execute the query and save in db
		$res2 =  mysqli_query($conn,$sql2);
    echo "HERE IT IS ";
		//check whether the query executed or not and data added or not
		if($res2 == true)
		
		{
      $_SESSION['status'] = "Registered Successfully";
      $_SESSION['status_code'] = "success";
      header('Location: payment.php?course_id=' . $course_id . '&price_new=' . $price_new . '&order_id=' . $order_id);

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







<?php include('footer.php'); ?>
<?php ob_flush();?>