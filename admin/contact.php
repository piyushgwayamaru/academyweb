<?php
include('header.php'); 
include('navbar.php');
?>
<div class="col-sm-9" style="margin-top: 30px; margin-left:230px;">
<div class="main-content">
	<div class="wrapper">
		<h1>Messages</h1>
		<br><br>
<?php
if (isset($_SESSION['mark'])){
	echo $_SESSION['mark'];
	unset ($_SESSION['mark']);
}

?>
			<table class="tbl-full">
				<tr>
					<th>S.N.</th>
                    <th>Name</th>
					<th>Email</th>
					<th>Message</th>
                    <th>Mark as read</th>
				</tr>

				<?php  

					//qury to get all categiry from db
					$sql = "SELECT * FROM tbl_contact";

					//execute the query
					$res =  mysqli_query($conn,$sql);

					//count rows
					$count = mysqli_num_rows($res);

					//create serial number variable and assign value as 1
					$sn = 1;

					//check whether we have data in db or not
					if($count>0)
					{
						//we have data in db
						//get the data and display
						while ($row = mysqli_fetch_assoc($res)) 
						{
							$contact_id = $row['id'];
							$name = $row['fullname'];
							$email = $row['email'];
							$message = $row['message'];
                            $mark_as_read = $row['mark_as_read'];

                            if ($mark_as_read == "false"){

                            
							?>

						<tr>
							<td><?php echo $sn++; ?></td>
							<td><?php echo $name; ?></td>
							<td><?php echo $email; ?></td>
							<td><?php echo $message; ?>
							<td>
								
								<a href="mark-as-read.php?oontact_id=<?php echo $contact_id; ?>" class="btn-danger"><i class="fa-solid fa-square-check"></i> Mark as read</a>
							</td>
						</tr>


							<?php 
                            }
						}
					}
					else
					{
						//we don't have data
						//we will display the message inside table
						?>

						<tr>
							<td colspan="6"><div class="error">No Messages.</div></td>
						</tr>

						<?php  


					}
				?>

				
			
			</table>
	</div>
</div>
</div>
