<?php

if(isset($_POST['submit']))
{
    $searcheditem = mysqli_real_escape_string($conn, $_POST['searcheditem']);

    // SQL query
    $sql = "SELECT * FROM tbl_course WHERE title LIKE '%$searcheditem%'";

    // Execute the query
    $result = mysqli_query($conn, $sql);

    if ($result)
    {
        // Fetch the results
        while ($row = mysqli_fetch_assoc($result)) {
            
        }
    }
    // Close the connection
    mysqli_close($conn);
}
?>

<div class="searchbar d-flex" >
    <input type="text" name="searcheditem">
    <button name="submit" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
</div>