

<?php
	if(isset($_POST['btnsubmit']))
	{
		$fname=$_POST['ufname'];
		$lname=$_POST['ulname'];
		$email=$_POST['uemail'];
		$contact=$_POST['ucontact'];
		$movie=$_POST['umovie'];
		$date=$_POST['udate'];
		$time=$_POST['utime'];
		$seat=$_POST['useat'];
		$price=$_POST['uprice'];
		$tcktno=$_POST['utcktno'];
		$payment=$_POST['upayprice'];
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body bgcolor="skyblue">
	<center>
		<h1 style="color:red">------------------------------Your Ticket Is Successfully Registration------------------------------</h1>
		<table border="5" bordercolor="red">
			<tr>
				<th>
					<font>
						First Name : 
					</font>
				</th>
				<td>
					<font>
						<?php
							echo $fname;
						?>
					</font>
				</td>
			</tr>

			<tr>
				<th>
					<font>
						Last Name : 
					</font>
				</th>
				<td>
					<font>
					<?php
						echo $lname;
					?>
					</font>
				</td>
			</tr>

			<tr>
				<th>
					<font>
						Email : 
					</font>
				</th>
				<td>
					<font>
					<?php
						echo $email;
					?>
					</font>
				</td>
			</tr>

			<tr>
				<th>
					<font>
						Contact Number : 
					</font>
				</th>
				<td>
					<font>
					<?php
						echo $contact;
					?>
					</font>
				</td>
			</tr>

			<tr>
				<th>
					<font>
						Movie Name : 
					</font>
				</th>
				<td>
					<font>
					<?php
						echo $movie;
					?>
					</font>
				</td>
			</tr>

			<tr>
				<th>
					<font>
						Date : 
					</font>
				</th>
				<td>
					<font>
					<?php
						echo $date;
					?>
					</font>
				</td>
			</tr>

			<tr>
				<th>
					<font>
						Time : 
					</font>
				</th>
				<td>
					<font>
					<?php
						echo $time;
					?>
					</font>
				</td>
			</tr>

			<tr>
				<th>
					<font>
						Select A Seat : 
					</font>
				</th>
				<td>
					<font>
					<?php
						echo $seat;
					?>
					</font>
				</td>
			</tr>

			<tr>
				<th>
					<font>
						Price For 1 Person : 
					</font>
				</th>
				<td>
					<font>
					<?php
						echo $price;
						echo "&nbsp;";
						echo "RS/- Only";
					?>
					</font>
				</td>
			</tr>

			<tr>
				<th>
					<font>
						Select Number Of Seat :
					</font>
				</th>
				<td>
					<font>
					<?php
						echo $tcktno;
					?>
					</font>
				</td>
			</tr>

			<tr>
				<th>
					<font>
						Payment Price : 
					</font>
				</th>
				<td>
					<font>
					<?php
						echo $payment;
						echo "&nbsp;";
						echo "RS/- Only";
					?>
					</font>
				</td>
			</tr>
		</table> <br><br>

		<button  type="reset" name="btnreset" style="background-color: red; border: none;"><a href="about.php" style=" color:white; padding: 15px 30px; text-decoration: none;margin: 8px 4px; cursor: pointer; Border-radius:10px; Font-size:30px";>Back</a></button>

</body>
</html>

<?php
	}
?>


