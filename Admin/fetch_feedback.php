<?php
require 'connection.php';

// Fetch all approved feedback
$sql = "SELECT * FROM rate_or_feedback WHERE approval_status = 'approved'";
$result = mysqli_query($conn, $sql);

$feedbackData = array();
while ($row = mysqli_fetch_assoc($result)) {
    $feedbackData[] = $row;
}

echo json_encode($feedbackData);
mysqli_close($conn);
?>
