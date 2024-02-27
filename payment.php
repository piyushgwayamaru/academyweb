<?php
	$price_new = $_GET['price_new'];
	$course_id = $_GET['course_id'];
	$order_id = $_GET['order_id'];
?>



            <h3 class="title">Pay With<?php echo $price_new?> </h3>
      
                                    <form action="https://uat.esewa.com.np/epay/main" method="POST" class="flex-btn" >
										<input value="<?php echo $price_new?>" name="tAmt" type="hidden">
										<input value="<?php echo $price_new?>" name="amt" type="hidden">
										<input value="0" name="txAmt" type="hidden">
										<input value="0" name="psc" type="hidden">
										<input value="0" name="pdc" type="hidden">
										<input value="epay_payment" name="scd" type="hidden">
										<input value="<?php echo $order_id;?>" name="pid" type="hidden">
										<input value="http://localhost/academy_web/esewa_payment_success.php?cid=<?php echo $course_id ?>" type="hidden" name="su">
										<input value="http://localhost/academy/esewa_payment_failed.php" type="hidden" name="fu">
										<input type="image" src="img/esewa.png">
      								</form>
 
 






