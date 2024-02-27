<?php include('header.php');
include('navbar.php'); 
?>
<!-- <div class="col-sm-9 mt-5">

</div> -->

<!-- ------------------------------------------------------------------ -->

  <div class="col-sm-9 container-fluid"  style="margin-top: 30px; margin-left:260px;">
      <form action="" method="POST" class="d-print-none">
        <div class="form-row">
          <div class="form-group col-md-2">
            <input type="date" class="form-control" id="startdate" name="startdate">
          </div> <span> to </span>
          <div class="form-group col-md-2">
            <input type="date" class="form-control" id="enddate" name="enddate">
          </div>
          <div class="form-group">
            <input type="submit" class="btn btn-secondary" name="searchsubmit" value="Search">
          </div>
        </div>
      </form>
      <?php
    if(isset($_REQUEST['searchsubmit'])){
        $startdate = $_REQUEST['startdate'];
        $enddate = $_REQUEST['enddate'];
        // $sql = "SELECT * FROM courseorder WHERE order_date BETWEEN '2018-10-11' AND '2018-10-13'";
        $sql = "SELECT * FROM tbl_enroll WHERE order_date BETWEEN '$startdate' AND '$enddate'";
        $result = $conn->query($sql);
        if($result->num_rows > 0){
        echo '
      <p class=" bg-dark text-white p-2 mt-4">Details</p>
      <table class="table">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">EMAIL</th>
            <th scope="col">COURSE_ID</th>
            <th scope="col">STATUS</th>
            <th scope="col">ORDER_DATE</th>
            <th scope="col">AMOUNT</th>
          </tr>
        </thead>
        <tbody>';
        while($row = $result->fetch_assoc()){
          echo '<tr>
            <th scope="row">'.$row["id"].'</th>
            <td>'.$row["email"].'</td>
            <td>'.$row["course_id"].'</td>
            <td>'.$row["status"].'</td>
            <td>'.$row["order_date"].'</td>
            <td>'.$row["amount"].'</td>
          </tr>';
        }
        echo '<tr>
        <td><form class="d-print-none"><input class="btn btn-danger" type="submit" value="Print" onClick="window.print()"></form></td>
      </tr></tbody>
      </table>';
      } else {
        echo "<div class='alert alert-warning col-sm-6 ml-5 mt-2' role='alert'> No Records Found ! </div>";
      }
    }
      ?>
        </div>
        </div>
  </div>
 
 
  </div>  <!-- div Row close from header -->
 </div>  <!-- div Conatiner-fluid close from header -->
