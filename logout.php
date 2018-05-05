<!-- Sessiond destroy to delete all sessions...-->


<?php
	
	session_start();
	session_destroy(); // deletes session

	header('location: ../login.php');  // redirects to login page.
?>