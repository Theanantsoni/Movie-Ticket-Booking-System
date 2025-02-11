<?php
   include ("header.php");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - Movie Ticket Booking</title>
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->
    <style>
        .about-section {
            background-color: #f8f9fa;
            padding: 60px 0;
        }
        .about-section h1 {
            font-size: 36px;
            font-weight: bold;
            color: #343a40;
            margin-bottom: 30px;
            text-align: center;
        }
        .about-section p {
            font-size: 18px;
            color: #6c757d;
            text-align: center;
            margin-bottom: 20px;
        }
        .about-section .btn {
            background-color: #007bff;
            color: white;
            display: block;
            margin: 20px auto;
            padding: 10px 20px;
            font-size: 18px;
            border-radius: 50px;
            text-transform: uppercase;
            transition: background-color 0.3s ease;
        }
        .about-section .btn:hover {
            background-color: #0056b3;
        }
        .features-section {
            padding: 60px 0;
        }
        .feature-box {
            text-align: center;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background-color: white;
            margin-bottom: 30px;
        }
        .feature-box h3 {
            font-size: 24px;
            font-weight: bold;
            color: #343a40;
            margin-bottom: 15px;
        }
        .feature-box p {
            font-size: 16px;
            color: #6c757d;
        }
    </style>
</head>
<body>

    <div class="about-section">
        <div class="container">
            <h1>About Us</h1>
            <p>Welcome to our Movie Ticket Booking website! We are dedicated to providing you with the best movie-going experience. Whether you're looking for the latest blockbuster or an indie film, we have it all. Our user-friendly platform allows you to book tickets easily and securely, ensuring that you never miss out on your favorite movies.</p>
            <p>Our mission is to make movie-watching convenient and enjoyable for everyone. With a wide range of cinemas and showtimes, you can find the perfect movie at the perfect time. We also offer exclusive deals and discounts, so you can enjoy more movies for less.</p>
        </div>
    </div>

<br>

<div class="row">
    <div class="col-md-4">
        <div class="card mb-3 shadow-sm" style="height: 100%; width: 90%; margin-left: 50px;">
            <div class="card-body"  style="border: 3px solid black; border-radius: 5px;">
                <h5 class="card-title" style="text-align: center; border: 3px solid #424242; border-radius: 3px;">Exclusive Member Benefits</h5>
                <p class="card-text" style="text-align: center;">Join our membership program to enjoy early access to tickets, special discounts, and invitations to exclusive movie premieres.</p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card mb-3 shadow-sm" style="height: 100%; width: 90%; margin-left: 25px;">
            <div class="card-body"  style="border: 3px solid black; border-radius: 5px;">
                <h5 class="card-title" style="text-align: center; border: 3px solid #424242; border-radius: 3px;">Customer Support</h5>
                <p class="card-text" style="text-align: center;">Our dedicated customer support team is here to assist you with any queries or issues, ensuring a smooth and pleasant experience.</p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card mb-3 shadow-sm" style="height: 100%; width: 90%;">
            <div class="card-body"  style="border: 3px solid black; border-radius: 5px;">
                <h5 class="card-title" style="text-align: center; border: 3px solid #424242; border-radius: 3px;">Mobile-Friendly Experience</h5>
                <p class="card-text" style="text-align: center;">Book your tickets on the go with our mobile-friendly platform. Whether on your phone or tablet, our website is designed for convenience.</p>
            </div>
        </div>
    </div>
</div>

<br>

<div class="row">
    <div class="col-md-4">
        <div class="card mb-3 shadow-sm" style="height: 100%; width: 90%; margin-left: 50px;">
            <div class="card-body"  style="border: 3px solid black; border-radius: 5px;">
                <h5 class="card-title" style="text-align: center; border: 3px solid #424242; border-radius: 3px;">Gift Cards</h5>
                <p class="card-text" style="text-align: center;">Give the gift of movies! Our gift cards are perfect for any occasion, allowing recipients to enjoy their favorite films.</p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card mb-3 shadow-sm" style="height: 100%; width: 90%; margin-left: 25px;">
            <div class="card-body"  style="border: 3px solid black; border-radius: 5px;">
                <h5 class="card-title" style="text-align: center; border: 3px solid #424242; border-radius: 3px;">Instant Ticket Confirmation</h5>
                <p class="card-text" style="text-align: center;">Receive immediate confirmation of your ticket purchase via email and SMS, ensuring that you are ready for your movie night.</p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card mb-3 shadow-sm" style="height: 100%; width: 90%;">
            <div class="card-body"  style="border: 3px solid black; border-radius: 5px;">
                <h5 class="card-title" style="text-align: center; border: 3px solid #424242; border-radius: 3px;">Special Screenings</h5>
                <p class="card-text" style="text-align: center;">Don't miss our special screenings and events, including movie marathons, director's cuts, and fan meet-ups.</p>
            </div>
        </div>
    </div>
</div>

<br>

<?php
   include("rating_or_feedback.php");
?>


    <!-- Bootstrap JS and dependencies -->
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>




<?php
   include ("footer.php");
?>