<?php
   include ("header.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interactive Movie Cards</title>
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.0/font/bootstrap-icons.min.css">

    <style>
        .movie-card {
            width: 23%;
            height: 50vh;
            margin-right: 7px;
            border: 1px solid #ddd;
            border-radius: 5px;
            margin-bottom: 15px;
            transition: box-shadow 0.3s;
            overflow: hidden;
            display: flex;
            flex-direction: column;
        }
        .movie-card:hover {
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        }
        .movie-card img {
            width: 100%;
            height: auto;
        }
        .movie-card-body {
            padding: 15px;
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .movie-card-title {
            font-size: 20px;
            color: #333;
        }
        .modal-header {
            background-color: #007bff;
            color: white;
        }
        .modal-body {
            font-size: 16px;
        }
        .search-box {
            margin-bottom: 20px;
        }
        .hidden {
            display: none;
        }
        .search-box {
            max-width: 100%; /* Adjust width as needed */
        }

        .search-box .form-control {
            padding-left: 40px; /* Space for the icon */
        }

        .search-box .bi-search {
            color: #007bff; /* Change the color as needed */
        }

    </style>
</head>
<body style="background-color: #9b9b9b;">
<div class="container mt-4">
    <h2 class="text-center movie-card-title text-white" style="font-size: 30px;">Gallery</h2>

    <br>

    <!-- Search Box -->
    <div class="search-box mb-4 position-relative">
    <input type="text" id="searchInput" class="form-control pl-5" placeholder="Search for movies..." onkeyup="filterMovies()" style="border: 3px solid black;">
    <i class="bi bi-search position-absolute" style="top: 50%; left: 15px; transform: translateY(-50%);"></i>
</div>


    <div class="row" id="movieCards">
        <?php
        // Database connection
        include 'Admin/connection.php';

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Fetch data from the 'image' table
        $sql = "SELECT pic_img, pic_name, pic_price, pic_language, pic_cinema, pic_time FROM image";
        $result = $conn->query($sql);

        while($row = $result->fetch_assoc()) { ?>
            &nbsp;&nbsp;&nbsp;&nbsp;

            <div class="col-md-3 movie-card" data-title="<?php echo strtolower($row['pic_name']); ?>" style="background-color: white; border: 3px solid black;">
                <div class="movie-card-body" style="background-color: white;">
                    <img src="images/<?php echo $row['pic_img']; ?>" alt="<?php echo $row['pic_name']; ?>" data-toggle="modal" data-target="#movieModal<?php echo md5($row['pic_name']); ?>">
                    <h5 class="movie-card-title" style="color: red; font-size: 25px;"><?php echo $row['pic_name']; ?></h5>
                    <p><strong>Price :</strong> Rs.<?php echo $row['pic_price']; ?>/-</p>
                    <p><strong>Language :</strong> <?php echo $row['pic_language']; ?></p>
                    <p><strong>Cinema :</strong> <?php echo $row['pic_cinema']; ?></p>
                    <p><strong>Time :</strong> <?php echo $row['pic_time']; ?></p>
                </div> <br>
            </div>


            <!-- Modal Pop-up -->
            <div class="modal fade" id="movieModal<?php echo md5($row['pic_name']); ?>" tabindex="-1" role="dialog" aria-labelledby="movieModalLabel<?php echo md5($row['pic_name']); ?>" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="movieModalLabel<?php echo md5($row['pic_name']); ?>"><?php echo $row['pic_name']; ?></h5>
                            <button type="button" class="btn close" data-dismiss="modal" aria-label="Close" style="font-size: 30px; color: white;">
                    <span aria-hidden="true">&times;</span>
                </button>
                        </div>
                        <div class="modal-body text-center">
                            <img src="images/<?php echo $row['pic_img']; ?>" alt="<?php echo $row['pic_name']; ?>" class="img-fluid" style="max-width: 80%; height: auto;"><br><br>
                            <p><strong>Price:</strong> Rs.<?php echo $row['pic_price']; ?>/-</p>
                            <p><strong>Language:</strong> <?php echo $row['pic_language']; ?></p>
                            <p><strong>Cinema:</strong> <?php echo $row['pic_cinema']; ?></p>
                            <p><strong>Time:</strong> <?php echo $row['pic_time']; ?></p>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<script>
    function filterMovies() {
        var input, filter, cards, card, i, txtValue;
        input = document.getElementById('searchInput');
        filter = input.value.toLowerCase();
        cards = document.getElementById('movieCards');
        card = cards.getElementsByClassName('movie-card');

        // Iterate over all movie cards
        for (i = 0; i < card.length; i++) {
            txtValue = card[i].getAttribute('data-title');
            // Check if the card title includes the filter value
            if (txtValue.includes(filter)) {
                card[i].style.display = "";
            } else {
                card[i].style.display = "none";
            }
        }
    }
</script>

</body>
</html>



<?php
   include ("footer.php");
?>
