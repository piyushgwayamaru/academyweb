<?php include ('header.php');?>
<?php
    // --- Step 1: Get data from the URL ---
	$price_new = $_GET['price_new'];
	$course_id = $_GET['course_id'];
	$order_id = $_GET['order_id']; // This is the unique transaction ID (pid)

    // --- Step 2: Get the course name from the database ---
	$sql = "SELECT * FROM tbl_course WHERE id = '$course_id'";
	$res = mysqli_query($conn,$sql);
	$course_name = "Course"; // Default name
	if($res && mysqli_num_rows($res) > 0) {
        $row = mysqli_fetch_assoc($res);
        $course_name = $row['title'];
    }

    // --- Step 3: eSewa Signature Generation ---
    $total_amount = $price_new;
    $transaction_uuid = $order_id; 
    $product_code = "EPAYTEST"; 
    $secret_key = "8gBm/:&EnhH.1/q"; 
    $message = "total_amount={$total_amount},transaction_uuid={$transaction_uuid},product_code={$product_code}";
    $signature = base64_encode(hash_hmac('sha256', $message, $secret_key, true));
?>

<!-- Beautified Payment Section -->
<section class="payment-section section-padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7 col-lg-6 col-xl-5">
                <div class="payment-form box text-center">
                    <h2 class="form-title mb-4">Complete Your Purchase</h2>
                    
                    <div class="course-details mb-4">
                        <p class="mb-1">You are purchasing:</p>
                        <h4 class="mb-2" style="font-weight: 600;"><?php echo htmlspecialchars($course_name); ?></h4>
                        <h5 class="price">Price: Rs <?php echo htmlspecialchars($price_new); ?></h5>
                    </div>

                    <p class="mb-3">Click the button below to pay securely with eSewa.</p>

                    <!-- eSewa Payment Form -->
                    <form action="https://rc-epay.esewa.com.np/api/epay/main/v2/form" method="POST">
                        <input type="hidden" name="amount" value="<?php echo htmlspecialchars($price_new); ?>">
                        <input type="hidden" name="tax_amount" value="0">
                        <input type="hidden" name="total_amount" value="<?php echo htmlspecialchars($price_new); ?>">
                        <input type="hidden" name="transaction_uuid" value="<?php echo htmlspecialchars($transaction_uuid); ?>">
                        <input type="hidden" name="product_code" value="EPAYTEST">
                        <input type="hidden" name="product_service_charge" value="0">
                        <input type="hidden" name="product_delivery_charge" value="0">
                        <input type="hidden" name="success_url" value="http://localhost/academyweb/esewa_payment_success.php">
                        <input type="hidden" name="failure_url" value="http://localhost/academyweb/esewa_payment_failed.php">
                        <input type="hidden" name="signed_field_names" value="total_amount,transaction_uuid,product_code">
                        <input type="hidden" name="signature" value="<?php echo htmlspecialchars($signature); ?>">
                        <input value="Pay with eSewa" type="submit" class="btn btn-success btn-block">
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Beautified Payment Section -->

<?php include ('footer.php');?>
