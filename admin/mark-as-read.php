<?php 
	//include constants page
	include('../config/constants.php');

	//chceck whether value is passed on url or not
	if(isset($_GET['contact_id']))//either use && or AND
	{
		//process to delete
		//get id amnd image name
		$contact_id = $_GET['contact_id'];
		

		//remove the image if available
		//check if the image is available or not delete if available
		
			
	

		//delete food from db
		$sql = "UPDATE tbl_contact
        SET mark_as_read = 'true'
        WHERE id = '$contact_id';
        ";
		//execute the query
		$res = mysqli_query($conn,$sql);
		//check whether the query execute or not and set the session msg successfully
		//redirect to manage food with session msg
		if ($res == true) 
		{
			//food deleted
			$_SESSION['mark'] = "<div class='success'>Marked as read</div>";
			header('location:'.'contact.php');
		}
		else
		{
			//failed to delete food
			$_SESSION['mark'] = "<div class='error'>Failed to mark as read.</div>";
			header('location:'.'contact.php');
		}

		
	}
	

?>