<?php
	include "connection.php";

	//echo "hello";

	if(isset($_GET['del']))
	{
		$delete = "DELETE FROM register WHERE u_id=$_GET[del]";

		mysqli_query($conn, $delete);
		header("location: display.php");
	}
?>