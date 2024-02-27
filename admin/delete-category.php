<?php  
  	include('../config/constants.php');

	//check whether id and imagename value is set or not
	if(isset($_GET['id']))
	{
		//get value amd delete
		//echo "Get value and delete";
		$id = $_GET['id'];
		
		

		//delte data from db
		//sql query delete data from db
		$sql = "DELETE FROM tbl_category WHERE id = $id";

		//execute the query
		$res = mysqli_query($conn,$sql);

		//check whether the data is deleted from db or not
		if($res ==true)
		{
			//set si=uccess message and redirect
			$_SESSION['delete'] = "<div class='success'> Category deleted successfully.</div>";
			//redirect to category page with message
			header('location:'.'manage-category.php');
		}
		else
		{
			//set si=uccess message and redirect
			$_SESSION['delete'] = "<div class='error'> Failed to delete category.</div>";
			//redirect to category page with message
			header('location:'.'manage-category.php');	
		}
		
	 }
	else
	{
		//redirect to manage category page
		header('location:'.'manage-category.php');
	}
?>