<?php
session_start();
include 'Admin/connection.php';

// Ensure user is redirected here only after OTP verification
if (!isset($_SESSION['otp_email'])) {
    header("Location: index.php"); // Redirect to the OTP or login page if the session variable is not set
    exit();
}

// Clear session data if the user clicks the "Home" button
if (isset($_POST['home'])) {
    session_destroy(); // Clear all session data
    header("Location: index.php");
    exit();
}

// Fetch all tickets associated with the email
$email = $_SESSION['otp_email'];
$query = "SELECT * FROM ticket WHERE u_email = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

$tickets = [];
while ($row = $result->fetch_assoc()) {
    $tickets[] = $row;
}

$stmt->close();

// Delete the ticket if the delete request is made
if (isset($_POST['delete_ticket_id'])) {
    $ticket_id = $_POST['delete_ticket_id'];

    $delete_query = "DELETE FROM ticket WHERE u_id = ?";
    $delete_stmt = $conn->prepare($delete_query);
    $delete_stmt->bind_param("i", $ticket_id);

    if ($delete_stmt->execute()) {
        // After deletion, refresh the ticket list
        header("Location: cancel_tckt.php");
        exit();
    } else {
        echo "Failed to delete the ticket.";
    }

    $delete_stmt->close();
}

$conn->close();
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cancel Booked Movie Ticket</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet"> -->

</head>
    <style>
        body {
            background-color: #b3fbff;
        }
        .container {
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }
        .ticket-table th, .ticket-table td {
            vertical-align: middle;
            text-align: center;
        }
        .ticket-table th {
            background-color: #007bff;
            color: white;
        }
        .ticket-table tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        .ticket-table tbody tr:hover {
            background-color: #e9ecef;
            transition: background-color 0.3s ease;
        }
        .ticket-table td {
            font-size: 16px;
        }
        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
            font-size: 14px;
        }
        .btn-danger:hover {
            background-color: #c82333;
            border-color: #bd2130;
        }
        h2 {
            font-size: 28px;
            font-weight: bold;
            color: #007bff;
        }
        h4 {
            font-size: 22px;
            font-weight: bold;
            color: #333;
        }
        p.text-center {
            font-size: 18px;
            color: #6c757d;
        }
         .modal-header {
            background-color: #007bff; /* Blue background */
            color: white;
        }
        .modal-footer .btn-primary {
            background-color: #28a745; /* Green background */
            border: none;
        }
        .modal-footer .btn-secondary {
            background-color: #dc3545; /* Red background */
            border: none;
        }
    </style>
<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Cancel Booked Movie Ticket</h2>
        <h4 class="text-center mb-4">Displaying The All Tickets For : <a style="color: red;"><?php echo htmlspecialchars($email); ?></a></h4>

        <?php if (!empty($tickets)): ?>
            <div class="table-responsive">
                <table class="table table-bordered ticket-table">
                    <thead>
                        <tr>
                            <th>First Name</th>
                            <th>Last name</th>
                            <th>Email ID</th>
                            <th>Contact No</th>                    
                            <th>Movie</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Seat</th>
                            <th>Price</th>
                            <th>Ticket No</th>
                            <th>Pay Price</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($tickets as $ticket): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($ticket['u_fname']); ?></td>
                                <td><?php echo htmlspecialchars($ticket['u_lname']); ?></td>
                                <td><?php echo htmlspecialchars($ticket['u_email']); ?></td>
                                <td><?php echo htmlspecialchars($ticket['u_contact']); ?></td>
                                <td><?php echo htmlspecialchars($ticket['u_movie']); ?></td>
                                <td><?php echo htmlspecialchars($ticket['u_date']); ?></td>
                                <td><?php echo htmlspecialchars($ticket['u_time']); ?></td>
                                <td><?php echo htmlspecialchars($ticket['u_seat']); ?></td>
                                <td><?php echo htmlspecialchars($ticket['u_price']); ?></td>
                                <td><?php echo htmlspecialchars($ticket['u_tcktno']); ?></td>
                                <td><?php echo htmlspecialchars($ticket['u_pay']); ?></td>
                                <td>
                                    <form method="POST" action="" onsubmit="return confirm('Are you sure you want to cancel this ticket?');">
                                        <input type="hidden" name="delete_ticket_id" value="<?php echo $ticket['u_id']; ?>">
                                        <button type="submit" class="btn btn-danger btn-sm" name="delete_ticket">Cancel Ticket </button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php else: ?>
            <p class="text-center">No tickets found for this email.</p>
        <?php endif; ?>
    </div>
    <center>
        <div class="mt-4">
            <form method="POST" action="">
                <!-- Home Button -->
                <button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#confirmModal">Home</button>           
            </form>
        </div>
    </center>

    <!-- Confirmation Modal -->
    <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="confirmModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmModalLabel">Confirm Exit</h5>
                    <button type="button" class="btn close" data-dismiss="modal" style="font-size: 30px; color: white;">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure you want to exit?
                </div>
                <div class="modal-footer">
                    <form action="" method="POST">
                        <button type="submit" class="btn btn-primary" name="home">Yes, Go Home</button>
                    </form>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
