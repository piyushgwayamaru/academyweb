<?php include ('header.php');?>
<?php
	$price_new = $_GET['price_new'];
	$course_id = $_GET['course_id'];
	$order_id = $_GET['order_id'];
?>
<?php
	$sql = "SELECT * FROM tbl_course WHERE id = '$course_id'";
	$res = mysqli_query($conn,$sql);
	$count=mysqli_num_rows($res);
		if($count>0)
		{
			while($row=mysqli_fetch_assoc($res))
			{
				$course_name=$row['title'];
          	}	
        }
?>
					<div style="margin-left:200px;">
				<?php
					echo $course_name ."<br>";
					echo "Price: Rs $price_new";
				?>
            <h3 class="title">Pay With </h3>
				<form action="https://uat.esewa.com.np/epay/main" method="POST" class="flex-btn" >
					<input value="<?php echo $price_new?>" name="tAmt" type="hidden">
					<input value="<?php echo $price_new?>" name="amt" type="hidden">
					<input value="0" name="txAmt" type="hidden">
					<input value="0" name="psc" type="hidden">
					<input value="0" name="pdc" type="hidden">
					<input value="epay_payment" name="scd" type="hidden">
					<input value="<?php echo $order_id;?>" name="pid" type="hidden">
					<input value="http://localhost/academyweb/esewa_payment_success.php?cid=<?php echo $course_id ?>" type="hidden" name="su">
					<input value="http://localhost/academyweb/esewa_payment_failed.php" type="hidden" name="fu">
					<input type="image" src="img/esewa.jpg" height="100">
				</form>
			</div>