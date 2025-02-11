
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Movie Ticekt Booking Rating & Feedback</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/css/bootstrap.min.css"
        integrity="sha384-SI27wrMjH3ZZ89r4o+fGIJtnzkAnFs3E4qz9DIYioCQ5l9Rd/7UAa8DHcaL8jkWt"
        crossorigin="anonymous">
    <!-- RateYo CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">

    <style>
        body {
            background-color: #f8f9fa;
        }
        .card {
            border: 1px solid #17a2b8;
            border-radius: 10px;
            cursor: pointer;

            padding: 15px;
            margin-bottom: 20px;
            background-color: #fff; /* White background for cards */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 12px rgba(0, 0, 0, 0.1);
        }

        .card-title {
            color: #17a2b8;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .card-text {
            color: #6c757d;
            margin-bottom: 10px;
        }

        .rateyo-read-only {
            pointer-events: none;
        }

        .rateyo-star {
            color: #ffc107;
        }

        /* Style for home with header and footer button */
        /*.home-button {
            position: absolute;
            top: 79px;
            font-size: 25px;
            right: 14.9vh;
            z-index: 1000;
        }*/

        .home-button {
            position: absolute;
            font-size: 25px;
            top: 18px;
            right: 28vh;
            z-index: 1000;
        }
    </style>
</head>
<body>

    <div class="container">
        <h3 class="mt-4 mb-5" style="color: red;">Event Ratings and Feedback</h3>
        <div class="row" id="feedbackContainer"></div>
    </div>

    <!-- Home button -->
    <a href="about.php" class="btn btn-primary home-button">Home</a>

    <!-- jQuery and RateYo JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>

<!------------------------------- WITH ENCRYPTED EMAIL DISPLAY ------------------------------->

   <script>
    // Function to encrypt email with first two and last two characters visible
    function encryptEmail(email) {
        var atIndex = email.indexOf('@'); // Find the index of '@' symbol
        var encryptedEmail = email.substr(0, 2); // Retain first two characters
        
        // Replace characters between first two and last two with asterisks
        for (var i = 2; i < atIndex - 2; i++) {
            encryptedEmail += '*';
        }
        
        // Retain last two characters and the domain part after '@'
        encryptedEmail += email.substr(atIndex - 2, 2) + email.substr(atIndex);
        
        return encryptedEmail;
    }

    $(document).ready(function () {
        // AJAX request to fetch and display feedback data on page load
        $.ajax({
            url: "Admin/fetch_feedback.php", // PHP script that fetches feedback data
            type: "GET",
            success: function (response) {
                // Parse JSON response
                var feedbackData = JSON.parse(response);

                // Loop through the feedback data and create Bootstrap cards
                feedbackData.forEach(function (feedback) {
                    var encryptedEmail = encryptEmail(feedback.u_email); // Encrypt email

                    var cardHtml = '<div class="col-md-6"><div class="card">';
                    cardHtml += '<div class="card-body">';
                    cardHtml += '<p class="card-text"><strong>Email:</strong> ' + encryptedEmail + '</p>';
                    cardHtml += '<p class="card-text"><strong>Feedback:</strong> ' + feedback.u_feedback + '</p>';
                    cardHtml += '<p class="card-text"><strong>Rating:</strong> ' + feedback.u_rate + ' </p>';
                    cardHtml += '<div class="rateyo-read-only" data-rateyo-rating="' + feedback.u_rate + '"></div>';
                    cardHtml += '</div></div></div>';

                    // Append the card HTML to the feedback container
                    $('#feedbackContainer').append(cardHtml);
                });

                // Initialize RateYo for each rating
$(".rateyo-read-only").rateYo({
    rating: function () {
        return $(this).attr('data-rateyo-rating');
    },
    starWidth: "20px",
    ratedFill: "#ffc107",
    numStars: 5,
    precision: 0
});

            }
        });
    });
</script>

</body>
</html>

<!------------------------------- WITHOUT ENCRYPTED EMAIL DISPLAY ------------------------------->


<script>
        /*$(document).ready(function () {
            // AJAX request to fetch and display feedback data on page load
            $.ajax({
                url: "fetch_feedback.php", // PHP script that fetches feedback data
                type: "GET",
                success: function (response) {
                    // Parse JSON response
                    var feedbackData = JSON.parse(response);

                    // Loop through the feedback data and create Bootstrap cards
                    feedbackData.forEach(function (feedback) {
                        var cardHtml = '<div class="col-md-6"><div class="card">';
                        cardHtml += '<div class="card-body">';
                        cardHtml += '<p class="card-text"><strong>Email:</strong> ' + feedback.u_email + '</p>';
                        cardHtml += '<p class="card-text"><strong>Feedback:</strong> ' + feedback.u_feedback + '</p>';
                        cardHtml += '<p class="card-text"><strong>Rating:</strong> ' + feedback.u_rate + '</p>';
                        cardHtml += '<div class="rateyo-read-only" data-rateyo-rating="' + feedback.u_rate + '"></div>';
                        cardHtml += '</div></div></div>';

                        // Append the card HTML to the feedback container
                        $('#feedbackContainer').append(cardHtml);
                    });

                    // Initialize RateYo for each rating
                    $(".rateyo-read-only").rateYo({
                        readOnly: true,
                        rating: function () {
                            return $(this).attr('data-rateyo-rating');
                        },
                        starWidth: "20px",
                        ratedFill: "#ffc107",
                        numStars: 5,
                        precision: 0
                    });
                }
            });
        });*/
    </script>