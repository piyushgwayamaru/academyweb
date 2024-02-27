<?php

  // Authorizeion or access control
// check whether the user is logged in or not

if (!isset($_SESSION['educator'])) //if user session is not set
 	{
		//user not logged in redirect to login page

		header('location:'.'login.php');
	}	

    ?>