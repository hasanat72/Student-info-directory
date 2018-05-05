<!-- 
	Session starts here at first, cause in a session once you provide your credential untill you log out, youll be logged in, and directed to the admindash panel..
-->

<?php 
	session_start();
	if ( isset($_SESSION['uid'])) {  // checks if session is set or not, before log in uid is empty.. 
		header('location: admin/admindash.php');
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Admin Panel</title>
</head>
<body>
	<h1 align="center">Admin Login</h1>
	<form method="post" action="login.php">
		<table align="center">
			<tr>
				<td>Username<td><input type="text" name="uname"></td></td>
			</tr>
			<tr>
				<td>Password<td><input type="text" name="password"></td></td>
			</tr>
			<tr>
				<td colspan="2" align="center"><input type="submit" name="login" value="Log In"></td>
			</tr>
		</table>
	</form>
</body>
</html>

<?php

		include('dbcon.php');
		if (isset($_POST['login']))
		{
			$username= $_POST['uname']; 
			$pass= $_POST['password'];

			$qry= "SELECT * from admin WHERE username= '$username' AND password='$pass';" ;
			$result= mysqli_query($con,$qry);
			$row= mysqli_num_rows($result);

			if ($row<1) {
				
				?> <!--Php ends here -->
				<script>
					alert('Username or Password Incorrect. Check Again');
					window.Again('login.php','_self');
				</script>
				<?php
			}
			else{
				$data=mysqli_fetch_assoc($result);
				$ID= $data['id']; 

				
				$_SESSION['uid']= $ID; // ID means fetched result ffrom associative array
				header('location:admin/admindash.php');

			}

		}
?>

