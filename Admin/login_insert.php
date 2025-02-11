<?php

	include "connection.php";

	if(isset($_REQUEST['btnsubmit']))
	{
		 $useremail=$_REQUEST['txtemail'];
		 $userpassword=$_REQUEST['txtpwd'];

		$res=mysqli_query($conn, "select * from register where u_email='$useremail' and u_pass='$userpassword'");
		$result=mysqli_fetch_array($res);

		if($result)
		{
			$sql = "INSERT INTO login VALUES (0,'$useremail','$userpassword')";

			$data=mysqli_query($conn,$sql);

			echo '<script type="text/javascript">
			 		window.location="../index.php"</script>';
		}
		else
		{
			echo"<script>alert('Your Email And Password Are Wrong !!'); </script>";
			echo '<script type="text/javascript">
			 		window.location="../login.php"</script>';
		}
	}
?>