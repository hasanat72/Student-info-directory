

<?php
		include("../dbcon.php");
		
		$roll= $_POST['roll'];
		$name= $_POST['fullname'];
		$city= $_POST['city'];
		$pcon= $_POST['contactno'];
		$std= $_POST['std'];
		$id= $_POST['sid'];
		//echo $id;

		$imagename= $_FILES['smg']['name']; // detects uploading files name.. name of smg containers image .
		$tempname= $_FILES['smg']['tmp_name']; //temporary images name...
		
		/* file will temporary store on this path $_FILES['image_path']['tmp_name']. so when you move it will be remove from temp folder to your folder. if you use copy command instead of move_uploaded_file then your temp file will be stay in your server's temp folder. you can search file name in there. */
		
		move_uploaded_file($tempname, "../dataimg/$imagename");
		
		$qry = "UPDATE `student` SET `rollno` = '$roll', `name` = '$name', `city` = '$city', `pcont` = '$pcon', `image` = '$imagename' WHERE `student`.`id` = $id;" ;
		
		$run= mysqli_query($con,$qry);
		
		if ($run  == true) {
			# code...
			?>
			<script type="text/javascript">
				alert("Data Updated Successfully. ");
				window.open('updateform.php?sid= <?php echo $id ?>','_self');
			</script>
			
			<?php
		}
		else
		{

		}

?>