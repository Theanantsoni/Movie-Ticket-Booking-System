<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Movie Ticekt Booking Rating & Feedback</title>
    <!-- Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/css/bootstrap.min.css" integrity="sha384-SI27wrMjH3ZZ89r4o+fGIJtnzkAnFs3E4qz9DIYioCQ5l9Rd/7UAa8DHcaL8jkWt" crossorigin="anonymous"> -->
    <!-- RateYo CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">

    <style>
        /* Internal CSS for additional styling */
        

        form {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            font-weight: bold;
        }

        .rateyo {
            margin-top: 20px;
        }

        .result {
            font-weight: bold;
            margin-top: 10px;
            display: block;
        }

        .btn-submit {
            font-size: 18px;
            padding: 10px 20px;
            transition: background-color 0.3s ease-in-out, transform 0.2s ease-in-out;
        }

        .btn-submit:hover {
            background-color: #28a745;
            transform: scale(1.05);
        }
    </style>
</head>
<body>

<div class="container">
    <div class="row">
        <form id="feedbackForm" action="rating_or_feedback.php" method="post">

            <div>
                <h3 class="mb-4">Website Rating & Feedback</h3>
            </div>

            <div class="form-group">
                <label>Email :</label>
                <input type="email" class="form-control" name="email" required>
            </div>

            <div class="form-group">
                <label>Feedback :</label>
                <input type="text" class="form-control" name="feedback" required>
            </div>

            <div class="rateyo" id="rating"
                 data-rateyo-rating="4"
                 data-rateyo-num-stars="5"
                 data-rateyo-score="3">
            </div>

            <span class='result'>0</span>
            <input type="hidden" name="rating">

            <div class="mt-3 text-center">
                <p style="font-size: 25px;">Click Here For : </p> <a href="rating_or_feedback_details.php" id="displayFeedback" style="font-size: 25px;">Check Other Users Feedbacks & Ratings</a>
            </div>
            <div id="feedbackContainer"></div>

            <div class="mt-3 text-center">
                <input type="submit" class="btn btn-primary btn-submit" name="add">
            </div>

        </form>
    </div>
</div>

<!-- jQuery and RateYo JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>

<script>
    $(function () {
        $(".rateyo").rateYo().on("rateyo.change", function (e, data) {
            var rating = data.rating;
            $(this).parent().find('.result').text('Rating: ' + rating);
            $(this).parent().find('input[name=rating]').val(rating);
        });
    });
</script>

</body>
</html>



<?php
require 'Admin/connection.php';
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $email = $_POST["email"];
    $feedback = $_POST["feedback"];
    $rating = $_POST["rating"];

    $sql = "INSERT INTO rate_or_feedback (u_email,u_feedback,u_rate) VALUES ('$email','$feedback','$rating')";
    if (mysqli_query($conn, $sql))
    {
        header('location: about.php');
    }
    else
    {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    mysqli_close($conn);
}
?>