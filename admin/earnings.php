<?php include('header.php');
include('navbar.php'); 

if (isset($_SESSION['educator_id'])){
    $educator_id = $_SESSION['educator_id'];
}
?>

<div class="col-sm-9" style="margin-top: 30px; margin-left:230px;">
    <div class="main-content" style="margin-top:-50px;">
        <div class="wrapper">
            <h2>Earnings</h2>
            <div class="earning-filter">
                <form action="" method="POST">
                    <div class="input-fields d-flex">
                        <div class="start_date mr-5" >
                            <label for="start_date"><h6>Start Date:</h6></label>
                            <input type="date" class="form-control" id="start_date" name="start_date" required>
                        </div>
                        <div class="end_date" style="margin-left:4rem">
                            <label for="end_date"><h6>End Date:</h6></label>
                            <input type="date" class="form-control" id="end_date" name="end_date" required>
                        </div>
                        <button type="submit" name="submit" class="rounded btn btn-success" style="height:3rem; margin-left:4rem; margin-top:3px;">Search</button>
                    </div>
                </form>
            </div>
        </div>
    
<?php
if(isset($_POST['submit'])){
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    
    $sql = "SELECT tbl_course.price
        FROM tbl_enroll 
        INNER JOIN tbl_course ON tbl_enroll.course_id = tbl_course.id 
        WHERE tbl_course.educator_id = '$educator_id' AND tbl_enroll.status = 1
        AND tbl_enroll.order_date >= '$start_date' AND tbl_enroll.order_date <= '$end_date'";


    $result = $conn->query($sql);

    // Initialize total sold and total earnings
    $totalsold = $result->num_rows;
    $totalEarnings = 0;

    // Fetch each row
    while ($row = $result->fetch_assoc()) {
        // Access the 'price' column from each row
        $price = $row['price'];

        // Increment total earnings by the price
        $totalEarnings += $price;
        $educatorEarnings = (0.3 * $totalEarnings);
    }
    
    ?>
    
        <div class="card text-white bg-info" style="max-width: 37rem; margin-left:7rem; margin-top:2rem">
            <div class="card-header text-dark"><h5>Earnings from <?php echo $start_date; ?> to <?php echo $end_date ?></h5></div>
                <div class="card-body">
                    <h4 class="card-title">
                        NRs. <?php echo $educatorEarnings; ?>
                    </h4>
                </div>
            </div>
        </div>
    <?php
}

?>
</div>  	
</div>