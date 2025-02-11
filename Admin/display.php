<?php 
	include "connection.php";
?>

<?php
	$data=mysqli_query($conn,"SELECT * FROM register"); 
	//echo $data;
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>

	<!-- Icon Bootstrap Online link -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

</head>
<body bgcolor="lightgreen">
	<center>
		
	<p style="color: #bb0000; font-size: 35px;"><b>Display User Data</b></p> 
		<table border="10px" bordercolor="#0009bb" width="95%" cellspacing="15" align="center">
			
				<tr>
					<th style="color: #124b1e; font-size: 20px;">u_id</th>
					<th style="color: #124b1e; font-size: 20px;">u_fname</th>
					<th style="color: #124b1e; font-size: 20px;">u_lname</th>
					<th style="color: #124b1e; font-size: 20px;">u_email</th>
					<th style="color: #124b1e; font-size: 20px;">u_pass</th>
					<th style="color: #124b1e; font-size: 20px;">u_conpass</th>
					<th style="color: #124b1e; font-size: 20px;">u_mobile</th>
					<th style="color: #124b1e; font-size: 20px;">u_address</th>
					<th colspan="2" style="color: #124b1e; font-size: 20px;">Action</th>
				</tr>

		    <?php 
				
				while($row = mysqli_fetch_array($data))
				{ 
			?>
			<tr>
				<td style="color: black; font-size: 20px;"><?php echo $row['u_id']; ?></td>
				<td style="color: black; font-size: 20px;"><?php echo $row['u_fname']; ?></td>
				<td style="color: black; font-size: 20px;"><?php echo $row['u_lname']; ?></td>
				<td style="color: black; font-size: 20px;"><?php echo $row['u_email']; ?></td>
				<td style="color: black; font-size: 20px;"><?php echo $row['u_pass']; ?></td>
				<td style="color: black; font-size: 20px;"><?php echo $row['u_conpass']; ?></td>
				<td style="color: black; font-size: 20px;"><?php echo $row['u_mobile']; ?></td>
				<td style="color: black; font-size: 20px;"><?php echo $row['u_address']; ?></td>

				<td><a href="edit.php?edit_id=<?php echo $row['u_id']; ?>" onclick="return confirm('Are You Sure To Update ?')" style="color: darkblue; text-decoration: none; font-size: 20px;" class="bi bi-pen-fill"> Update</a></td>

				<td><a href="delete.php?del=<?php echo $row['u_id']; ?>" onclick="return confirm('Are You Sure To Delete ?')" style="color: red; text-decoration: none; font-size: 20px;" class="bi bi-trash"> Delete</a></td>

			</tr>
		<?php 
				
			}
		?>
		<table>

			<br><br>

			<button  type="reset" name="btnreset" style="background-color: red; border: 5px solid white; Border-radius:25px;"><a href="main.php" style=" color:white; padding: 15px 30px; text-decoration: none;margin: 8px 4px; cursor: pointer;  Font-size:30px";>Cancel</a></button>
	</center>
</body>
</html>