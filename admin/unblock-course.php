<?php 
	//include constants page
	include('../config/constants.php');

	//chceck whether value is passed on url or not
	if(isset($_GET['id']))//either use && or AND
	{
		//process to delete
		//get id amnd image name
		$id = $_GET['id'];

		//remove the image if available
		//check if the image is available or not delete if available
		
		//delete food from db
		$sql = "UPDATE tbl_course
        SET active = 'Yes'
        WHERE id = '$id';
        ";
		//execute the query
		$res = mysqli_query($conn,$sql);
		//check whether the query execute or not and set the session msg successfully
		//redirect to manage food with session msg
		if ($res == true) 
		{
			//food deleted
			$_SESSION['delete'] = "<div class='success'>Course unblocked successfully.</div>";
			header('location:'.'manage-courses.php');
		}
		else
		{
			//failed to delete food
			$_SESSION['delete'] = "<div class='error'>Failed to unblock Course.</div>";
			header('location:'.'manage-courses.php');
		}

		
	}
	

?>