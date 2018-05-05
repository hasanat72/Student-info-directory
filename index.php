<!DOCTYPE html>
<html>
<head>
	<title>Student Management Project</title>
</head>
<body>
	<h1 align="center"> Welcome to Admin Panel </h1>
	<center><a href="login.php"><h3>ADMIN LOGIN</h3> </a></center>
	
	<form method="post" action="index.php">
		<table style="width: 50%;" align="center">

			<tr>
				<td colspan="2" align="center" style="font-weight: bold;" >STUDENT INFORMATION </td>
			</tr>
			<tr>
				<td >Choose Standard: </td>
				<td>
					<select name="std">
						<option value="1">1st</option>
						<option value="2">2nd</option>
						<option value="3">3rd</option>
						<option value="4">4th</option>
						<option value="5">5th</option>
						<option value="6">6th</option>
					</select>
				</td>
			</tr>
			<tr>
				<td >Enter Roll No: </td>
				<td>
					<input type="text" name="rollno">
				</td>
			</tr>
			<tr>
				<td colspan="2"><input type="submit" name="submit" value="Show Info" ></td>
				<td>
					
				</td>
			</tr>

		</table>
	</form>
</body>
</html>

<?php
		if (isset($_POST['submit'])) {
			
			$standard= $_POST['std'];
			$rollno= $_POST['rollno'];

			include('dbcon.php');
			include('function.php');
			showdetails($standard,$rollno);
		}

?>