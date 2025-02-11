<?php
session_start();
include 'Admin/connection.php';

$error_message = '';

// Check if OTP session data is set
if (!isset($_SESSION['otp']) || !isset($_SESSION['otp_expiry'])) {
    // Redirect to the login or home page if OTP data is not set
    header("Location: index.php");
    exit();
}

if (isset($_POST['verifyOtp'])) {
    $otp = $_POST['otp'];

    if (empty($otp)) {
        $error_message = "OTP is required.";
    } elseif (time() > $_SESSION['otp_expiry']) {
        $error_message = "OTP has expired.";
    } elseif ($otp != $_SESSION['otp']) {
        $error_message = "Invalid OTP.";
    } else {
        // Redirect to the cancel_tckt.php page after OTP verification
        header("Location: cancel_tckt.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify OTP</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <style>
        body {
/*            background-color: #f8f9fa;*/
            background-image: url("images/otpbg.jpg");
            background-repeat: no-repeat;
            background-size: cover;
        }
        .container {
            margin-top: 30vh;
        }
        .form-frame {
            padding: 35px;
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
                    <h2 class="text-center" style="color: red; border: 2px solid red; padding: 10px;">Verify OTP</h2>

                    <form method="POST" novalidate>
                        <div class="form-group">
                            <label for="otp" class="font-weight-bold" style="font-size: 25px; color: #800000;">Enter OTP :</label>
                            <input type="text" name="otp" class="form-control" id="otp" placeholder="Enter OTP" style="border: 2px solid red; padding: 10px; font-size: 25px; background-color: #aaf4ff;" required>
                            <div class="invalid-feedback">Please enter the OTP.</div>
                            <span class="text-danger"><?php if (!empty($error_message)) echo $error_message; ?></span>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-custom" name="verifyOtp" style="background-color: green;">Verify OTP</button>
                            &nbsp;&nbsp;&nbsp;
                            <a href="index.php" class="btn btn-custom" style="color: white">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
