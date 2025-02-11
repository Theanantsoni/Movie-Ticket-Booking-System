<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Ticket Booking</title>
</head>
<body bgcolor="skyblue">
	<center>
			
		<form method="POST" style="color:black">
			<font size="30">
				<h3 align="center" style="color:red">Admin Panel</h1>
			Username :
			<input type="text" name="txtname" size="30" placeholder="Enter Username" style="background-color: white; border: none; padding: 10px 20px; margin: 4px 2px; cursor: space; Border-radius:10px; Font-size:15px"> <br><br>
			Password :
			<input type="text" name="txtpwd" size="30" placeholder="Enter Password" style="background-color: white; border: none; padding: 10px 20px; margin: 4px 2px; cursor: space; Border-radius:10px; Font-size:15px"> <br><br>
			
			<input type="submit" name="btnlogin" value="login" style="background-color: yellow; border: none; color:red; padding: 15px 30px; text-decoration: none;margin: 8px 4px; cursor: pointer; Border-radius:100px; Font-size:20px";>
			</font>
		</form>
	</center>
</body>
</html>

<?php
	if(isset($_POST['btnlogin']))
	{
		$uname=$_POST['txtname'];
		$upwd=$_POST['txtpwd'];

		if($uname=="kenil" and $upwd=="kenil@022")
		{
			header("location: display.php");
		}
		else
		{
			echo "<center>";
			echo "<font size=30 color='red'>";
			echo "Your Id & Password Is Wrong...!!";
			echo "</font>";
			echo "</center>";
		}
	}
?>