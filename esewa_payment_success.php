<?php
include 'config/constants.php';

// Check if eSewa sent back the 'data' parameter
if (isset($_GET['data'])) {
    // Decode the Base64 encoded data string
    $decoded_data = base64_decode($_GET['data']);
    
    // Convert the decoded JSON string into a PHP array
    $transaction_details = json_decode($decoded_data, true);

    // Check if the transaction status from eSewa is 'COMPLETE'
    if ($transaction_details && isset($transaction_details['status']) && strtoupper($transaction_details['status']) === 'COMPLETE') {
        
        // Get our unique order ID from the transaction details
        $order_id = $transaction_details['transaction_uuid'];
        
        // Find the enrollment record in our database using the order ID to get the course ID
        $sql_enroll = "SELECT course_id FROM tbl_enroll WHERE order_id = '$order_id'";
        $result_enroll = mysqli_query($conn, $sql_enroll);

        if ($result_enroll && mysqli_num_rows($result_enroll) > 0) {
            $enroll_row = mysqli_fetch_assoc($result_enroll);
            $course_id = $enroll_row['course_id'];

            // Update our database to mark the payment as successful (status = 1)
            $sql_update = "UPDATE tbl_enroll SET status = 1 WHERE order_id = '$order_id'";
            $update_result = mysqli_query($conn, $sql_update);

            if ($update_result) {
                // If everything is successful, redirect the user to the course video page
                header("Location: watch.php?course_id=$course_id");
                exit();
            } else {
                echo "Error: Could not update your enrollment status. Please contact support.";
            }
        } else {
             echo "Error: Could not find your enrollment record. Please contact support.";
        }
    } else {
        // If the eSewa status is not 'COMPLETE', redirect to the failure page
        header("Location: esewa_payment_failed.php");
        exit();
    }
} else {
    // If eSewa did not send back a 'data' parameter, redirect to the failure page
    header("Location: esewa_payment_failed.php");
    exit();
}
?>
