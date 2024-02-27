<?php  
	include('header.php');
	include('navbar.php');
?>
<?php ob_start(); ?>

<div class="main-content" style="margin-left:200px;">
	<div class="wrapper">
		<h1>Update Enrollment</h1>
		<br>
		<br>
        <?php        

        if (isset($_GET['id']))
         {
        	# code...
        	$id=$_GET['id'];
        	// get all detail based on their id 
        	// query to get order details 
        	$sql="SELECT * FROM tbl_enroll WHERE id=$id";

        	// execute the query 
        	$res=mysqli_query($conn,$sql);

        	// count the rows 

        	$count=mysqli_num_rows($res);

        	if($count==1)
        	{
        		// details available	
        		$row=mysqli_fetch_assoc($res);

        		$first_name = $row['first_name'];
                $last_name = $row['last_name'];
        		$address=$row['address'];
        		$phone=$row['phone'];
                $gender =$row['gender'];
                $email=$row['email'];
        		$course=$row['course'];
        		$status=$row['status'];



        	}
        	else
        	{
        		// detail not available 
        		header('location:'.'manage-enrollment.php');
        	}
        }
        else
        {
        	// redirect to manage order page 
        	header('location:'.'manage-enrollment.php');
        }




        ?>




		<form action="" method="POST">
			<table class="tbl-30">
				<tr>
					<td>First Name:</td>
					<td class="fw-bold"><b><?php echo $first_name; ?></b></td>
				</tr>

                <tr>
					<td>Last Name:</td>
					<td class="fw-bold"><b><?php echo $last_name; ?></b></td>
				</tr>
                <tr>
					<td>Address:</td>
					<td class="fw-bold"><b><?php echo $address; ?></b></td>
				</tr>

                <tr>
					<td>Phone:</td>
					<td class="fw-bold"><b><?php echo $phone; ?></b></td>
				</tr>

                <tr>
					<td>Gender:</td>
					<td class="fw-bold"><b><?php echo $gender; ?></b></td>
				</tr>
                <tr>
					<td>Email:</td>
					<td class="fw-bold"><b><?php echo $email; ?></b></td>
				</tr>

                <tr>
					<td>Course:</td>
					<td class="fw-bold"><b><?php echo $course; ?></b></td>
				</tr>
               
				<tr>
					<td>Status:</td>
					<td>
						<select name="status">
							<option <?php if ($status=="Pending") 
							{
								echo "selected";
							} ?> value="Pending">Pedning</option>
							<option <?php if ($status=="Accepted") 
							{
								echo "selected";
							} ?> value="Accepted">Accepted</option>
							<option <?php if ($status=="Rejected") 
							{
								echo "selected";
							} ?> value="Rejected">Rejected</option>
							
						</select>
					</td>
				</tr>

				


				

					 </tr>
				

				<tr>
					<td colspan="2">
						<input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="hidden" name="first_name" value="<?php echo $first_name; ?>">
                        <input type="hidden" name="last_name" value="<?php echo $last_name; ?>">
                        <input type="hidden" name="address" value="<?php echo $address; ?>">
                        <input type="hidden" name="phone" value="<?php echo $phone; ?>">
                        <input type="hidden" name="gender" value="<?php echo $gender; ?>">
                        <input type="hidden" name="email" value="<?php echo $email; ?>">
                        <input type="hidden" name="course" value="<?php echo $course; ?>">
						<input type="submit" name="submit" value="Update Enrollment" class="btn-secondary">
					</td>



				</tr>
			</table>
		</form>



		<?php   


                            //Import PHPMailer classes into the global namespace
		//These must be at the top of your script, not inside a function
		use PHPMailer\PHPMailer\PHPMailer;
		use PHPMailer\PHPMailer\SMTP;
		use PHPMailer\PHPMailer\Exception;

		//Load Composer's autoloader
		require '../vendor/autoload.php';


			if (isset($_POST['submit']))
			 {
				//echo "Clicked";

				// get all values from form 
				$id=$_POST['id']; 
				$first_name=$_POST['first_name'];
                $last_name=$_POST['last_name'];
                $address=$_POST['address'];
				$phone=$_POST['phone'];
                $gender=$_POST['gender'];
				$email=$_POST['email'];
                $course=$_POST['course'];
				$status=$_POST['status'];

				// update the values 

				$sql2="UPDATE tbl_enroll SET

				first_name='$first_name',
                last_name='$last_name',
                address='$address',
                phone=$phone,
                gender='$gender',
                email='$email',
				course='$course',
				status='$status'

				WHERE id=$id

				";

            //  echo $sql2;
            //     die();

				$res2=mysqli_query($conn,$sql2);

				// check whether query updated or not 

				if ($res2==true)
				 {


                    $mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'testmmail19@gmail.com';                     //SMTP username
    $mail->Password   = 'qfaxacsryhfzqfat';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('from@example.com', 'Mailer');
    $mail->addAddress($email);     //Add a recipient
    

  
    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'no-reply';
    $mail->Body    = 'Dear'.' '.$first_name.' '.'Your Enrollment in The Course of your choice in COUSTD Has Been'.' '.$status;
    

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
					// Updated 
					$_SESSION['update']= "<div class='success'>Enrollment Updated Successfully</div>";
					header('location:'.'manage-enrollment.php');
				}
				else
				{
					// Failed TO Update 
					$_SESSION['update']= "<div class='error'>Failed To  Update Enrollment</div>";
					header('location:'.'manage-enrollment.php');
				}




				

			}








		?>

	</div>
</div>                  



<?php ob_flush(); ?>






