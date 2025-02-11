<?php
session_start();
include 'Admin/connection.php';

$error_message = '';
$success_message = '';

// Check if session variable exists; if not, redirect to the index page
if (!isset($_SESSION['otp_email'])) {
    header("Location: index.php");
    exit();
}

if (isset($_POST['resetPassword'])) {
    $new_password = $_POST['txtpwd'];
    $confirm_password = $_POST['txtconpwd'];

    if (empty($new_password) || empty($confirm_password)) {
        $error_message = "Both password fields are required.";
    } elseif ($new_password !== $confirm_password) {
        $error_message = "Passwords do not match.";
    } else {
        $email = $_SESSION['otp_email'];
        $update_query = "UPDATE register SET u_pass = ?, u_conpass = ? WHERE u_email = ?";
        $update_stmt = $conn->prepare($update_query);
        $update_stmt->bind_param("sss", $new_password, $confirm_password, $email);

        if ($update_stmt->execute()) {
            // Clear session data and destroy session
            session_destroy();

            $success_message = "Password has been reset successfully.";
        } else {
            $error_message = "Error updating password.";
        }

        $update_stmt->close();
        $conn->close();
    }
}

if (isset($_POST['back'])) {
    // Clear session data and destroy session when 'Back' is clicked
    session_destroy();
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <style>
        body {
            background-image: url("images/rstpwdbg.jpeg");
            background-repeat: no-repeat;
            background-size: cover;
        }
        .container {
            margin-top: 25vh;
        }
        .form-frame {
            padding: 30px;
            background-color: #bff7ff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        .btn-custom {
            background-color: #800000;
            color: white;
        }
        .btn-custom:hover {
            background-color: #a52a2a;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="form-frame">
                    <h2 class="text-center" style="color: red; border: 2px solid red; padding: 10px;">Reset Password</h2>
                    <form method="POST" novalidate>
                        <div class="form-group">
                            <label for="upwd" class="font-weight-bold" style="font-size: 25px; color: #800000;">Enter New Password:</label>
                            <input type="password" name="txtpwd" class="form-control" id="upwd" placeholder="Enter New Password" style="border: 2px solid red; padding: 15px; background-color: #aaf4ff;" required>
                            <div class="invalid-feedback">Please enter the new password.</div>
                        </div>
                        <div class="form-group">
                            <label for="ucpwd" class="font-weight-bold" style="font-size: 25px; color: #800000;">Confirm New Password:</label>
                            <input type="password" name="txtconpwd" class="form-control" id="ucpwd" placeholder="Confirm New Password" style="border: 2px solid red; padding: 15px; background-color: #aaf4ff;" required>
                            <div class="invalid-feedback">Please confirm the new password.</div>
                            <span class="text-danger"><?php if (!empty($error_message)) echo $error_message; ?></span>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-custom" name="resetPassword" style="background-color: green;">Reset Password</button>
                            &nbsp;&nbsp;&nbsp;
                            <button type="submit" class="btn btn-custom" name="back">Back</button>
                        </div>
                    </form>

                    <!-- Success Modal -->
                    <?php if (!empty($success_message)) { ?>
                        <div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="successModalLabel">Success</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <?php echo $success_message; ?>
                                    </div>
                                    <div class="modal-footer">
                                        <a href="login.php" class="btn btn-custom">OK</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>

    <script>
        // JavaScript to show modal if there's a success message
        <?php if (!empty($success_message)) { ?>
            $(document).ready(function() {
                $('#successModal').modal('show');
            });
        <?php } ?>

        // JavaScript for form validation
        (function() {
            'use strict';
            window.addEventListener('load', function() {
                var forms = document.getElementsByClassName('needs-validation');
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
    </script>
</body>
</html>

