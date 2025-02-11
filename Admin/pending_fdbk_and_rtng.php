<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Movie Ticekt Booking Rating & Feedback</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">



  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: Jul 27 2023 with Bootstrap v5.3.1
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->

   <title>Movie Ticekt Booking Rating & Feedback</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        .progress {
            height: 20px;
            margin-bottom: 10px;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function(){
            updateNumbers();
        });

        function updateNumbers() {
            $(".display-3").each(function(index, element) {
                let finalNumber = parseInt($(element).text());
                $(element).text(1);
                let currentNumber = 1;
                let interval = setInterval(function() {
                    if (currentNumber < finalNumber) {
                        currentNumber++;
                        $(element).text(currentNumber);
                    } else {
                        clearInterval(interval);
                    }
                }, 30);
            });
        }
    </script>

</head>

<body>


<main id="main" class="main">

        <?php
require 'connection.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if approve button is clicked
    if (isset($_POST['approve'])) {
        $feedback_id = $_POST['feedback_id'];
        // Update approval status to approved in the database
        $sql = "UPDATE rate_or_feedback SET approval_status = 'approved' WHERE u_id = $feedback_id";
        if (mysqli_query($conn, $sql)) {
            echo '<script>alert("Feedback Approved Successfully!");</script>';
        } else {
            echo '<script>alert("Error approving feedback!");</script>';
        }
    }
    // Check if reject button is clicked
    if (isset($_POST['reject'])) {
        $feedback_id = $_POST['feedback_id'];
        // Update approval status to rejected in the database
        $sql = "UPDATE rate_or_feedback SET approval_status = 'rejected' WHERE u_id = $feedback_id";
        if (mysqli_query($conn, $sql)) {
            echo '<script>alert("Feedback Rejected Successfully!");</script>';
        } else {
            echo '<script>alert("Error rejecting feedback!");</script>';
        }
    }
}

// Fetch pending feedback
$sql = "SELECT * FROM rate_or_feedback WHERE approval_status = 'pending'";
$result = mysqli_query($conn, $sql);
?>

<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<style>
    /* Your custom styles here */
</style>

<div class="container">
    <h1 class="mt-4 mb-4" style="text-align: center; background-color: #343a40; color: white; border: 2px solid black; font-size: 30px;"> -------------- : Pending Feedback & Rating List : -------------- </h1>
    <table class="table" style="border: 2px solid #343a40;">
        <thead class="thead-dark">
            <tr>
                <th style="text-align: center; border: 2px solid #000;">No</th>
                <th style="text-align: center; border: 2px solid #000;">Email</th>
                <th style="text-align: center; border: 2px solid #000;">Feedback</th>
                <th style="text-align: center; border: 2px solid #000;">Rating</th>
                <th style="text-align: center; border: 2px solid #000;">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $counter = 1; // Initialize counter variable
            while ($row = mysqli_fetch_assoc($result)) :
            ?>
                <tr>
                    <td style="text-align: center; border: 2px solid #343a40;"><?php echo $counter; ?></td> <!-- Display the counter value -->
                    <td style="text-align: center; border: 2px solid #343a40;"><?php echo $row['u_email']; ?></td>
                    <td style="text-align: center; border: 2px solid #343a40;"><?php echo $row['u_feedback']; ?></td>
                    <td style="text-align: center; border: 2px solid #343a40;"><?php echo $row['u_rate']; ?></td>
                    <td style="border: 2px solid #343a40;">
                        <form action="pending_fdbk_and_rtng.php" method="post">
                            <input type="hidden" name="feedback_id" value="<?php echo $row['u_id']; ?>">
                            <center>
                                <button type="submit" name="approve" class="btn btn-success btn-approve">Approve</button>
                                &nbsp;&nbsp;&nbsp;
                                <button type="submit" name="reject" class="btn btn-danger btn-reject">Reject</button>
                            </center>
                        </form>
                    </td>
                </tr>
            <?php
                $counter++; // Increment counter
            endwhile;
            ?>
        </tbody>
    </table>
</div>


<!-- Bootstrap JS (Optional, if you need it) -->
<!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> -->

<?php
mysqli_close($conn);
?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    const allRows = document.querySelectorAll('.table tbody tr');

    function filterRows(input) {
      const filterValue = input.value.toLowerCase().trim();

      allRows.forEach(row => {
        const email = row.querySelector('td:nth-child(2)').textContent.toLowerCase().trim();

        if (email.includes(filterValue)) {
          row.style.display = 'table-row';
        } else {
          row.style.display = 'none';
        }
      });
    }

    // Display all rows initially
    allRows.forEach(row => {
      row.style.display = 'table-row';
    });

    // Filter rows when input changes
    document.getElementById('searchInput').addEventListener('input', function () {
      filterRows(this);
    });

    // Prevent form submission
    document.getElementById('searchForm').addEventListener('submit', function (event) {
      event.preventDefault();
      // You can add more filtering or other actions here if needed
    });
  });
</script>

</body>

</html>