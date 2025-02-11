<!doctype html>
<html lang="en">

<head>
  <title>Online Movie Ticket Booking</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <style>
    .navbar-nav .nav-link {
      color: white;
      font-size: 18px;
      transition: color 0.3s, background-color 0.3s;
    }

    .navbar-nav .nav-link:hover,
    .navbar-nav .nav-link:focus {
      color: yellow;
      background-color: rgba(255, 255, 255, 0.1);
    }

    .navbar-nav .nav-link.active {
      color: yellow;
      background-color: rgba(255, 255, 255, 0.2);
    }
  </style>
</head>

<body>
  <header>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
      <div class="container">
        <a class="navbar-brand" href="index.php"><img src="images/images.png" alt="Logo" style="width: 100px; margin-right: 5px;"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="index.php" style="color: white;">Home</a>
            </li> &nbsp;&nbsp;&nbsp;
            <li class="nav-item">
              <a class="nav-link" href="ticket.php">Book Now</a>
            </li>&nbsp;&nbsp;&nbsp;
            <li class="nav-item">
              <a class="nav-link" href="Gallery.php">Gallery</a>
            </li>&nbsp;&nbsp;&nbsp;
            <li class="nav-item">
              <a class="nav-link" href="about.php">About Us</a>
            </li>&nbsp;&nbsp;&nbsp;
            <li class="nav-item">
              <a class="nav-link" href="contact.php">Contact Us</a>
            </li>
          </ul>
          <ul class="navbar-nav">
            <li class="nav-item">
              <a href="registration.php" class="nav-link">Register</a>
            </li>&nbsp;&nbsp;&nbsp;
            <li class="nav-item">
              <a href="login.php" class="nav-link">Login</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7/zATKDh/vmOomk32alDJn8bkJtuA3Gl3uhm7mcUFGyd8I2DAF0/eHLjZm6ltxtp" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-oBqDVmMz4fnFO9gybAms0s3jL6J6x4U3piKb95ExlKZ7q99nR+PmXvX0T5nxjbJf" crossorigin="anonymous"></script>
</body>

</html>
