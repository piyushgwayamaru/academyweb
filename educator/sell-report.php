<?php include('header.php');
include('navbar.php'); 

if (isset($_SESSION['educator_id'])){
  $educator_id = $_SESSION['educator_id'];
}
?>
<!-- <div class="col-sm-9 mt-5">

</div> -->

<!-- ------------------------------------------------------------------ -->

<div class="col-sm-9" style="margin-top: 30px; margin-left:230px;">
  <div class="main-content" style="margin-top:-50px;">
    <div class="wrapper">
    <h2>Sales Report</h2>
    <form action="" method="POST">
      <div class="input-fields d-flex">
          <div class="start_date mr-5" >
              <label for="start_date"><h6>Start Date:</h6></label>
              <input type="date" class="form-control" id="startdate" name="startdate" required>
          </div>
          <div class="enddate" style="margin-left:4rem">
            <label for="enddate"><h6>End Date:</h6></label>
            <input type="date" class="form-control" id="enddate" name="enddate" required>
          </div>
          <button type="submit" name="searchsubmit" class="rounded btn btn-success" style="height:3rem; margin-left:4rem; margin-top:3px;">Search</button>
        </div>
    </form>

      <?php
    if(isset($_POST['searchsubmit'])){
        $startdate = $_REQUEST['startdate'];
        $enddate = $_REQUEST['enddate'];
        // $sql = "SELECT * FROM courseorder WHERE order_date BETWEEN '2018-10-11' AND '2018-10-13'";
        $sql = "SELECT tbl_course.title, tbl_enroll.email,tbl_enroll.order_date, tbl_enroll.status, tbl_course.price
        FROM tbl_enroll 
        INNER JOIN tbl_course ON tbl_enroll.course_id = tbl_course.id 
        WHERE tbl_course.educator_id = '$educator_id' AND tbl_enroll.status = 1
        AND tbl_enroll.order_date BETWEEN '$startdate' AND '$enddate'";

        $result = $conn->query($sql);
        if($result->num_rows > 0){
        echo '
      <p class=" bg-dark text-white p-2 mt-4">Details</p>
      <table class="table">
        <thead>
          <tr>
            <th scope="col">SN</th>
            <th scope="col">COURSE NAME</th>
            <th scope="col">EMAIL</th>
            <th scope="col">STATUS</th>
            <th scope="col">ORDER_DATE</th>
            <th scope="col">AMOUNT</th>
          </tr>
        </thead>
        <tbody>';
        $sn = 1;
        while($row = $result->fetch_assoc()){
          if ($row['status'] == 1){
            $status = "paid";
          }
          else{
            $status = "pending";
          }
          echo '<tr>
            <th scope="row">'.$sn++.'</th>
            <td>'.$row["title"].'</td>
            <td>'.$row["email"].'</td>
            <td>'.$status.'</td>
            <td>'.$row["order_date"].'</td>
            <td>'.$row["price"].'</td>
          </tr>';
        }
        echo '<tr>
        <td>
          <form class="d-print-none">
            <input class="btn btn-danger" type="submit" value="Print" onClick="window.print()">
          </form>
        </td>
      </tr>
      </tbody>
      </table>';

      } else {
        echo "<div class='alert alert-warning col-sm-6 ml-5 mt-2' role='alert'> No Records Found ! </div>";
      }
    }
      ?>
        
 
 
  </div>  <!-- div Row close from header -->
 </div>  <!-- div Conatiner-fluid close from header -->
