<?php include('config/constants.php'); ?>
<?php

if(isset($_POST["rating_data"]))
{{
	$course_id = $_GET['course_id'];

	$user_name = $_POST["user_name"];
	$user_review = $_POST["user_review"];
	$rating_data = $_POST["rating_data"];
	$datetime = date("Y-m-d"); 
	
	$sql2 = "INSERT INTO tbl_reviews (user_name, rating_data, user_review, datetime, course_id) 
				 VALUES ('$user_name','$rating_data','$user_review','$datetime', '$course_id')";
	//execute the query and save in db
	$res2 =  mysqli_query($conn,$sql2);
	}		
	if($res2 == true)
	{
		echo "Your Review has been submitted";
	}else
	{
		echo "Your Review submission has failed";

	}				
}

?>