<?php 
include('../config/constants.php');
 session_destroy(); //unsets $_session['user']

header('location:'.'./login.php');



 ?>