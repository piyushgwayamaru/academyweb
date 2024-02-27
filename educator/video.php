<?php include("../config/constants.php");
    if(isset($_POST['submit'])&& isset($_FILES['myvideo'])){
        $filename = $_FILES['myvideo']['name'];
        $tmpname = $_FILES['myvideo']['tmp_name'];
        $error = $_FILES['myvideo']['error'];
        $folder = "videos/". $filename;

        if($error === 0){
            $video_ex = pathinfo($filename, PATHINFO_EXTENSION);
            $video_ex_lc = strtolower($video_ex);

            $allowed_exs = array("mp4", 'webm', 'avi', 'flv');

            if(in_array($video_ex_lc, $allowed_exs)){

                $new_video_name = uniqid("video-",true). '.'.$video_ex_lc;
                $video_upload_path= 'videos/'.$new_video_name;
                move_uploaded_file($tmpname, $video_upload_path);
            }

        }
        // move_uploaded_file($tmpname,$folder);
        $sql = "INSERT INTO video(name)VALUES('$new_video_name')";
        if(!mysqli_query($conn,$sql))
        {
            echo "data not insert";
        }
        else
        {
            echo "data inserted";
        }
    }

?>

<form action="" method="post" enctype="multipart/form-data">
    <input type="file" name="myvideo" id="file">
    <input type="submit" value="submit" name="submit">

</form>