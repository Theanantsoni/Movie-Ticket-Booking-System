<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../../../phpMyAdmin/vendor/autoload.php'; // Ensure correct path to PHPMailer autoload file

include 'Admin/connection.php';
session_start();

// Ensure the script is accessed through the form submission
if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !isset($_POST['btnsubmit'])) {
    // Redirect to a different page or show an error if accessed directly
    header('Location: index.php'); // Redirect to a safe page
    exit();
}

// Initialize variables
$email = '';

if (isset($_POST['btnsubmit'])) {
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "A valid email address is required.";
        exit();
    }

    // Check if email exists in the database
    $query = "SELECT * FROM register WHERE u_email = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Email exists, generate OTP and send email
        $otp = bin2hex(random_bytes(4)); // More secure OTP generation
        $expiry = time() + 300; // OTP expires in 5 minutes

        // Save OTP and expiry in the session
        $_SESSION['otp'] = $otp;
        $_SESSION['otp_expiry'] = $expiry;
        $_SESSION['otp_email'] = $email;

        // Send OTP to email using PHPMailer
        $mail = new PHPMailer(true); // Create a new PHPMailer instance

        try {
            // Server settings
            $mail->isSMTP(); // Set mailer to use SMTP
            $mail->Host = 'smtp.gmail.com'; // Specify main and backup SMTP servers
            $mail->SMTPAuth = true; // Enable SMTP authentication
            $mail->Username = 'mranantsoni@gmail.com'; // Replace with your SMTP username
            $mail->Password = 'wgjxuvlsxdkaeard'; // Replace with your SMTP password
            $mail->SMTPSecure = 'tls'; // Enable TLS encryption
            $mail->Port = 587; // TCP port to connect to

            // Recipients
            $mail->setFrom('mranantsoni@gmail.com', 'Anant Soni');
            $mail->addAddress($email); // Add a recipient

            // Content
            $mail->isHTML(true); // Set email format to HTML
            $mail->Subject = 'Your OTP Code';
            $mail->Body = "Your OTP code is <strong>$otp</strong>. It will expire in 5 minutes.";

            $mail->send();
            header("Location: del_verify_otp.php"); // Redirect after sending OTP
            exit();
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    } else {
        echo "No account found with that email.";
    }

    $stmt->close();
    $conn->close();
}
?>
