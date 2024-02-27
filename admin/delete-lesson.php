<?php 
	//include constants page
	include('../config/constants.php');

	//chceck whether value is passed on url or not
	if(isset($_GET['id']) )//either use && or AND
	{
		//process to delete
		//get id amnd image name
		$id = $_GET['id'];
		
		//delete food from db
		$sql = "DELETE FROM tbl_lesson WHERE id = $id";
		//execute the query
		$res = mysqli_query($conn,$sql);
		//check whether the query execute or not and set the session msg successfully
		//redirect to manage food with session msg
		if ($res == true) 
		{
			//food deleted
			$_SESSION['delete'] = "<div class='success'>Lesson deleted successfully.</div>";
			header('location:'.'manage-lesson.php');
		}
		else
		{
			//failed to delete food
			$_SESSION['delete'] = "<div class='error'>Failed to deleted Chapter Lesson.</div>";
			header('location:'.'manage-lesson.php');
		}

		
	}
	else
	{
		//redirect to manage food page
		$_SESSION['Unauthorized'] = "<div class='error'>Unauthorized access.</div>";
		header('location:'.'manage-lesson.php');
	}

?>