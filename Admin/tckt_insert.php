<?php
include "connection.php";

if (isset($_POST['btnsubmit'])) {
    $ufname = $_POST['ufname'];
    $ulname = $_POST['ulname'];
    $uemail = $_POST['uemail'];
    $ucon = $_POST['ucontact'];
    $umovie = $_POST['umovie'];
    $udate = $_POST['udate'];
    $utime = $_POST['utime'];
    $useat = $_POST['useat'];
    $uprice = $_POST['uprice'];
    $utcktno = $_POST['utcktno'];
    $upay = $_POST['upayprice'];

    // Check if the email exists in the login table
    $emailCheckQuery = "SELECT * FROM login WHERE u_email='$uemail'";
    $emailCheckResult = mysqli_query($conn, $emailCheckQuery);

    if (mysqli_num_rows($emailCheckResult) > 0) {
        // Email exists, proceed with further checks

        // Check if there are existing tickets with the same date, time, seat, and movie
        $ticketCheckQuery = "SELECT SUM(u_tcktno) AS total_tickets FROM ticket 
                             WHERE u_date='$udate' AND u_time='$utime' AND u_seat='$useat' AND u_movie='$umovie'";
        $ticketCheckResult = mysqli_query($conn, $ticketCheckQuery);
        $ticketCheckRow = mysqli_fetch_assoc($ticketCheckResult);
        $totalTickets = $ticketCheckRow['total_tickets'] ?? 0;

        // Check if the total tickets exceed or equal to 10
        if (($totalTickets + $utcktno) <= 10) {
            // Proceed to book the ticket if the sum is less than 10
            $sql = "INSERT INTO ticket (u_fname, u_lname, u_email, u_contact, u_movie, u_date, u_time, u_seat, u_price, u_tcktno, u_pay) 
                    VALUES ('$ufname', '$ulname', '$uemail', '$ucon', '$umovie', '$udate', '$utime', '$useat', '$uprice', '$utcktno', '$upay')";
            $data = mysqli_query($conn, $sql);

            if ($data) {
                echo "<script>alert('Ticket booked successfully!'); window.location.href = '../index.php';</script>";
            } else {
                echo "<script>alert('Error occurred while submitting the form.'); window.location.href = '../index.php';</script>";
            }
        } else {
            // If the sum is 10 or more, do not book the ticket
            echo "<script>alert('Ticket cannot be booked as the total ticket number meets or exceeds the threshold.'); window.location.href = '../index.php';</script>";
        }
    } else {
        // Email does not exist, display an alert message
        echo "<script>alert('Email ID is not logged in. Please login first.'); window.location.href = '../index.php';</script>";
    }
}
?>
