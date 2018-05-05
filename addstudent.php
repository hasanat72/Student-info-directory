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
	include ('titlehead.php');
	
?>

<form method="post" action="addstudent.php"  enctype="multipart/form-data"> 
	<!--to store image enctype= multipart form-data -->
	<table align="center" style="width: 50%">
		<tr>
			<th> Roll No: </th>
			<td><input type="text" name="roll" placeholder="Enter Your Roll NO" required></td>
		</tr>
		<tr>
			<th> Full Name: </th>
			<td><input type="text" name="fullname" placeholder="Enter Your Full Name" required></td>
		</tr>
		<tr>
			<th> City: </th>
			<td><input type="text" name="city" placeholder="City" required></td>
		</tr>
		<tr>
			<th> Parents Contact No: </th>
			<td><input type="text" name="contactno" placeholder="Enter Contact No" required></td>
		</tr>

		<tr>
			<th> Standard</th>
			<td><input type="number" name="std" placeholder="Standard" required></td>
			
		</tr>
		<tr>
			<th>Image</th>
			<td> <input type="file" name="smg" required></td>
		</tr>
		<tr>
			<td colspan="2" align="center"> 
				
				<input type="submit" name="submit" value="Submit">
			</td>
		</tr>

	</table>
	
</form>

</body>
</html>

<?php
	if (isset($_POST['submit'])){

		include("../dbcon.php");
		$roll= $_POST['roll'];
		$name= $_POST['fullname'];
		$city= $_POST['city'];
		$pcon= $_POST['contactno'];
		$std= $_POST['std'];
		$imagename= $_FILES['smg']['name']; // detects uploading files name.. name of smg containers image .
		$tempname= $_FILES['smg']['tmp_name']; //temporary images name...
		
		/* file will temporary store on this path $_FILES['image_path']['tmp_name']. so when you move it will be remove from temp folder to your folder. if you use copy command instead of move_uploaded_file then your temp file will be stay in your server's temp folder. you can search file name in there. */
		
		move_uploaded_file($tempname, "../dataimg/$imagename");
		
		$qry="INSERT INTO `student`( `rollno`, `name`, `city`, `pcont`, `standard`,image) VALUES ('$roll','$name','$city','$pcon','$std','$imagename')" ;
		$run= mysqli_query($con,$qry);
		if ($run== true) {
			# code...
			?>
			<script type="text/javascript">
				alert("Data Inserted Successfully. ");
			</script>
			<?php
		}
		else
		{

		}


	}

?>