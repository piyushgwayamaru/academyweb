<?php include('header.php'); 

if (isset($_SESSION['SESSION_EMAIL'])){
    $email = $_SESSION['SESSION_EMAIL'];
} else {
    // If user is not logged in, redirect them to the login page
    header('Location: log-in.php');
    exit();
}
?>

<!--breadcrumb starts-->
<div class="breadcrumb-nav">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">My Courses</li>
            </ol>
        </nav>
    </div>
</div>
<!--breadcrumb ends-->

<?php
function realNum($num) {
    $num1 = floor($num);
    $num2 = $num1 + 0.5;
    if ($num >= $num2) {
        return $num1 + 0.5;
    }
    return $num1;
}
?>

<!--course section starts-->
<section class="course-section section-padding">
    <div class="container">
        <h2>My Courses</h2><br>
        <div class="row">
            <?php
            // SQL query to get all courses the logged-in user has successfully enrolled in
            $sql = "SELECT *, tbl_course.id
                    FROM tbl_course
                    JOIN tbl_enroll ON tbl_course.id = tbl_enroll.course_id 
                    WHERE email = '$email' AND status = 1 AND active = 'Yes'";
            
            $res = mysqli_query($conn, $sql);
            $count_courses = mysqli_num_rows($res);

            if ($count_courses > 0) {
                while ($row = mysqli_fetch_assoc($res)) {
                    // Get course details
                    $id = $row['id'];
                    $title = $row['title'];
                    $image_name = $row['image'];
                    $instructor_id = $row['educator_id'];

                    // --- Calculate average rating for this course ---
                    $sum = 0;
                    $count_reviews = 0;
                    $sql_reviews = "SELECT rating_data FROM tbl_reviews WHERE course_id = $id";
                    $result_reviews = mysqli_query($conn, $sql_reviews);
                    if (mysqli_num_rows($result_reviews) > 0) {
                        while ($row_review = mysqli_fetch_array($result_reviews)) {
                            $sum += $row_review['rating_data'];
                            $count_reviews++;
                        }
                    }
                    $real_rating = ($count_reviews > 0) ? $sum / $count_reviews : 0;
                    $real_rating_final = realNum($real_rating);
                    ?>

                    <!--courses item starts-->
                    <div class="col-md-6 col-lg-3">
                        <div class="courses-item">
                            <a href="watch.php?course_id=<?php echo $id; ?>" class="link">
                                <div class="courses-item-inner">
                                    <div class="img-box">
                                        <img src="img/admin/course/<?php echo htmlspecialchars($image_name); ?>" alt="course img" style="height:175px; width:300px;">
                                    </div>
                                    <h3 class="title"><?php echo htmlspecialchars($title); ?></h3>
                                    <div class="instructor">
                                        <span class="instructor-name">
                                            <?php 
                                            $res1 = mysqli_query($conn, "SELECT name FROM tbl_educator WHERE id='$instructor_id'");
                                            $row1 = mysqli_fetch_assoc($res1);
                                            echo htmlspecialchars($row1['name']); 
                                            ?>
                                        </span>
                                    </div>
                                    <div class="rating">
                                        <span class="average-rating">(<?php echo $real_rating_final; ?>)</span>		
                                        <span class="average-stars">
                                            <?php
                                            for ($i = 1; $i <= 5; $i++) {
                                                if ($i <= floor($real_rating_final)) {
                                                    echo '<i class="fas fa-star"></i>';
                                                } elseif ($real_rating_final > floor($real_rating_final) && $i == ceil($real_rating_final)) {
                                                    echo '<i class="fas fa-star-half-alt"></i>';
                                                } else {
                                                    echo '<i class="far fa-star"></i>'; // Use far for empty star
                                                }
                                            }
                                            ?>
                                        </span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <!--courses item ends-->
            <?php
                } // End while loop
            } else {
                echo "<p>You have not enrolled in any courses yet.</p>";
            }
            ?>
        </div> <!-- End .row -->
    </div>
</section>
<!--course section ends-->

<?php include('footer.php'); ?>
