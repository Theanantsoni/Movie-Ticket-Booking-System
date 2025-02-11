<?php
include "connection.php";
{
	$fname = $_POST['Firstname'];
	$lname = $_POST['Lastname'];
	$email = $_POST['email'];
	$pass = $_POST['Password'];
	$conpass = $_POST['Cpassword'];
	$contact = $_POST['umob'];
	$address = $_POST['Address'];

	$select="select u_id from register where u_email='$email'";

	$result = mysqli_query($conn,$select);
	$count = mysqli_num_rows($result);

	if($count > 0)
		{
			echo "ERROR : Email-id Is Already Registered";
		}
		else
		{
			$sql = "INSERT INTO register VALUES (0,'$fname','$lname','$email','$pass','$conpass','$contact','$address')";

			/*if(mysqli_query($conn,$sql))
			{
				echo "Records added successfully";
			}		
			else
			{
				echo "ERROR: Could not able to execute";
			} */


			$data=mysqli_query($conn,$sql);

			header("Location: ../login.php"); 
		}

}

		
?>