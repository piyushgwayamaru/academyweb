<?php include('header.php'); ?>

<?php
if(!isset($_SESSION)){ 
  session_start(); 
}

include('navbar.php'); 

 if(isset($_SESSION['user'])){
  $adminEmail = $_SESSION['user'];
 } else {
  echo "<script> location.href='login.php'; </script>";
 }
 
 
$sql = "SELECT * FROM tbl_course";
$result = $conn->query($sql);
$totalcourse = $result->num_rows;

$sql = "SELECT * FROM tbl_educator";
$result = $conn->query($sql);
$totalEducators = $result->num_rows;

$sql = "SELECT * FROM tbl_enroll";
$result = $conn->query($sql);
$totalStudents = $result->num_rows;

$sql = "SELECT tbl_enroll.id, tbl_course.price
FROM tbl_enroll 
JOIN tbl_course ON tbl_enroll.course_id = tbl_course.id";

 $result = $conn->query($sql);
 $totalsold = $result->num_rows;

 $totalRevenue = 0;

// Fetch each row
while ($row = $result->fetch_assoc()) {
    // Access the 'price' column from each row
    $price = $row['price'];

    // Increment total revenue by the price
    $totalRevenue += $price;
}
?>
  <div class="col-sm-9" style="margin-top: 30px; margin-left:280px;">
    <div class="row mx-5 text-center">
      <div class="col-sm-4  ">
        <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
          <div class="card-header">Courses</div>
          <div class="card-body">
            <h4 class="card-title">
              <?php echo $totalcourse; ?>
            </h4>
            <a class="btn text-white" href="manage-courses.php">View</a>
          </div>
        </div>
      </div>
	  <div class="col-sm-4  ">
        <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
          <div class="card-header">Educators</div>
          <div class="card-body">
            <h4 class="card-title">
              <?php echo $totalEducators; ?>
            </h4>
            <a class="btn text-white" href="manage-educators.php">View</a>
          </div>
        </div>
      </div>
	  <div class="col-sm-4  ">
        <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
          <div class="card-header">Enrolled Students</div>
          <div class="card-body">
            <h4 class="card-title">
              <?php echo $totalStudents; ?>
            </h4>
            <a class="btn text-white" href="manage-students.php">View</a>
          </div>
        </div>
      </div>
      <div class="col-sm-4  ">
        <div class="card text-white bg-warning mb-3" style="max-width: 18rem;">
          <div class="card-header">Courses sold</div>
          <div class="card-body">
            <h4 class="card-title">
              <?php echo $totalsold; ?>
            </h4>
            <a class="btn text-white" href="sell-report.php">View</a>
          </div>
        </div>
      </div>
      <div class="col-sm-4  ">
        <div class="card text-white bg-info mb-3" style="max-width: 18rem;">
          <div class="card-header">Total Earnings</div>
          <div class="card-body">
            <h4 class="card-title">
              NRs. <?php echo $totalRevenue; ?>
            </h4>
            <a class="btn text-white" href="earning.php">View</a>
          </div>
        </div>
      </div>
    </div>
    <div class="mx-5 mt-5 text-center">
      <!--Table-->
     
    </div>
  </div>
  </div>
  </div>
  
  </div>  <!-- div Row close from header -->
 </div>  <!-- div Conatiner-fluid close from header -->
<?php
// include('footer.php'); 
?>