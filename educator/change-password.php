<?php 
include('header.php');
include('navbar.php'); 
?>

<?php  

$msg = "";

if(isset($_POST['submit'])){
    $educatorEmail = $_SESSION['SESSION_EMAIL'];
    $sql = "SELECT password FROM tbl_educator WHERE email = '$educatorEmail'";
    $res = mysqli_query($conn, $sql);
    
    while($row = mysqli_fetch_assoc($res)){
        $dbPassword = $row['password'];   
    }
    
    $oldPassword = mysqli_real_escape_string($conn, md5($_POST['currentPassword']));
    $newPassword = mysqli_real_escape_string($conn, md5($_POST['newPassword']));
    $confirmPassword = mysqli_real_escape_string($conn, md5($_POST['confirmPassword']));
    
    // Directly verify the old password without rehashing
    if ($oldPassword == $dbPassword){
        if ($newPassword == $confirmPassword){
            
            $updateQuery = "UPDATE tbl_educator SET password = '$newPassword' WHERE email = '$educatorEmail'";
            $result = mysqli_query($conn, $updateQuery);
            if($result){
                $msg = "<div class=' alert alert-success'>Password changed successfully.</div>";
            }
        }
            else{
                $msg = "<div class=' alert alert-danger '>New and confirmed password unmatched.</div>";
            }
    }
        else{
            $msg = "<div class=' alert alert-danger'>Wrong password.</div>";
    }
}

?>


<div class='col-sm-9'>
    <div class="mb-3" style="height: 30px;">
        <?php 
            if (isset($msg)){
                echo $msg; 
            }
        ?>
    </div>
    <form action="" method="post" class=" mt-5">
        <div class="form-group m-2">
            <input type="password" name="currentPassword" class="form-control" placeholder="Current Password">
        </div>
        <div class="form-group m-2">
            <input type="password" name="newPassword" class="form-control" placeholder="New Password">
        </div>
        <div class="form-group m-2">
            <input type="password" name="confirmPassword" class="form-control" placeholder="Confirm Password">
        </div>
        
        <button class="m-2" type="submit" name="submit">Change password</button>
    </form>
</div>
