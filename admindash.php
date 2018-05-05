

<?php
	session_start();
	if ( isset($_SESSION['uid'])) {
		# code...
		#echo $_SESSION['uid'];
	}
	else{
		header('location: ../login.php');
	}
	
?>

<?php
	include('header.php');
	
?>
		<div class="admintitle">

			<h1 align="center"> Welcome to Admin Panel</h1>
			<h4 align="center" ><a  href="logout.php">Log Out</a></h4>
			
		</div>

		<div class="dashbord">
			<table style="width: 50%" align="center">
				<tr>
					<td>1. </td> <td><a href="addstudent.php">Add Student </a></td>
				</tr>
				<tr>
					<td>2. </td> <td><a href="updatestudent.php">Update Student </a></td>
				</tr>
				<tr>
					<td>3. </td> <td><a href="deletestudent.php">Delete Student </a></td>
				</tr>
			</table>
		</div>
</body>
</html>