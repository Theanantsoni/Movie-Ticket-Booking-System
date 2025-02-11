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
    <style>
        .movie-card {
            border: 1px solid #ddd;
            border-radius: 10px;
            overflow: hidden;
            transition: transform 0.3s ease-in-out;
            margin-left: 15px;
        }
        .movie-card img {
            width: 100%;
            height: auto;
        }
        .movie-card-body {
            padding: 15px;
            background-color: #f8f9fa;
        }
        .movie-card-body h5 {
            font-size: 18px;
            margin-bottom: 10px;
            color: #343a40;
        }
        .movie-card-body p {
            margin: 5px 0;
        }
        .movie-card:hover {
            transform: scale(1.05);
        }
        .movie-card-title {
            color: maroon;
            margin-bottom: 30px;
        }
    </style>
</head>
<body style="background-color: #9b9b9b;">


<?php
// Database connection
include 'Admin/connection.php';

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch data from the 'image' table
$sql = "SELECT pic_img, pic_name, pic_price, pic_language, pic_cinema, pic_time FROM image";
$result = $conn->query($sql);
?>

<div class="container mt-4">
        <h2 class="text-center movie-card-title" style="color: white;">About Us</h2>
    <div class="row">
        <?php while($row = $result->fetch_assoc()) { ?>
            <div class="col-md-3">
                <div class="movie-card">
                    <img src="images/<?php echo $row['pic_img']; ?>" alt="<?php echo $row['pic_name']; ?>" class="card-img-top" data-toggle="modal" data-target="#movieModal<?php echo md5($row['pic_name']); ?>">
                    <div class="movie-card-body">
                        <center><h5 class="movie-card-title" style="color: red; font-size: 25px;"><?php echo $row['pic_name']; ?></h5>
                        <p><strong>Price :</strong> <?php echo $row['pic_price']; ?></p>
                        <p><strong>Language :</strong> <?php echo $row['pic_language']; ?></p>
                        <p><strong>Cinema :</strong> <?php echo $row['pic_cinema']; ?></p>
                        <p><strong>Time :</strong> <?php echo $row['pic_time']; ?></p></center>
                    </div>
                </div>  <br>
            </div>

            <!-- Modal Pop-up -->
            <div class="modal fade" id="movieModal<?php echo md5($row['pic_name']); ?>" tabindex="-1" role="dialog" aria-labelledby="movieModalLabel<?php echo md5($row['pic_name']); ?>" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info text-white">
                <h5 class="modal-title" id="movieModalLabel<?php echo md5($row['pic_name']); ?>" style="font-size: 30px; color: white;"><?php echo $row['pic_name']; ?></h5>
                <button type="button" class="btn close" data-dismiss="modal" aria-label="Close" style="font-size: 30px; color: white;">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body bg-light text-center">
                <img src="images/<?php echo $row['pic_img']; ?>" alt="<?php echo $row['pic_name']; ?>" class="img-fluid" style="max-width: 80%; height: 50%;"><br><br>
                <p style="font-size: 18px;"><strong style="font-size: 20px;">Price :</strong>&nbsp;&nbsp;Rs.<?php echo $row['pic_price']; ?>/-</p>
                <p style="font-size: 18px;"><strong style="font-size: 20px;">Language :</strong> <?php echo $row['pic_language']; ?></p>
                <p style="font-size: 18px;"><strong style="font-size: 20px;">Cinema :</strong> <?php echo $row['pic_cinema']; ?></p>
                <p style="font-size: 18px;"><strong style="font-size: 20px;">Time :</strong> <?php echo $row['pic_time']; ?></p>
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

</body>
</html>



<?php
   include ("footer.php");
?>
