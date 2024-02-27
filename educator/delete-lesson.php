
<?php
// Start session if not already started

// Include necessary files
include('../config/constants.php');

// Check if lesson ID and course ID are provided in the URL
if(isset($_GET['id']) && isset($_GET['course_id'])) {
    // Get the lesson ID and course ID from the URL parameters
    $id = $_GET['id'];
    $course_id = $_GET['course_id'];


    // Construct SQL query to delete the lesson
    $sql = "DELETE FROM tbl_lesson WHERE id = $id";
    
    // Execute the query
    $res = mysqli_query($conn, $sql);
    
    // Check if deletion was successful
    if($res == true) {
        // Set session message for successful deletion
        $_SESSION['delete'] = "<div class='success'>Lesson deleted successfully.</div>";
        header('Location: manage-lesson.php?id=' . $course_id);
    
    } else {
        // Set session message for deletion failure
        $_SESSION['delete'] = "<div class='error'>Failed to delete lesson.</div>";
        header('Location: manage-lesson.php?id=' . $course_id);
    }
    
}
else{
    	//redirect to manage page
		$_SESSION['Unauthorized'] = "<div class='error'>Unauthorized access.</div>";
		header('location:'.'manage-lesson.php');
}

// header('location'.'manage-lesson.php');
// Redirect back to the page where lessons are managed // Ensure script stops executing after redirection
?>
