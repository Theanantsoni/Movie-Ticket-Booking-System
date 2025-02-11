<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script>
        function form() {
            var email = document.getElementById("uemail").value;
            var password = document.getElementById("upwd").value;
            if(email == "" || password == "") {
                if(email == "") {
                    document.getElementById("userid").innerText = "Email is required";
                }
                if(password == "") {
                    document.getElementById("userpwd").innerText = "Password is required";
                }
                return false;
            }
            return true;
        }

        function verifyCaptcha() {
            var response = grecaptcha.getResponse();
            if(response.length == 0) {
                document.getElementById('g-recaptcha-error').innerText = 'Captcha is required';
                return false;
            }
            return true;
        }
    </script>
</head>
<body>
    <div class="container">
        <form action="reset_password.php" method="POST" onsubmit="return form() && verifyCaptcha()">
            <div class="form-group">
                <label for="uemail" class="font-weight-bold" style="font-size: 1.2em; color: #800000;">Enter Email :</label>
                <input type="email" name="txtemail" class="form-control" id="uemail" placeholder="Enter Email">
                <span id="userid" class="text-danger"></span>
            </div>
            <div class="form-group">
                <label for="upwd" class="font-weight-bold" style="font-size: 1.2em; color: #800000; margin-top: 25px;">Enter Password :</label>
                <input type="password" name="txtpwd" class="form-control" id="upwd" placeholder="Enter Password">
                <span id="userpwd" class="text-danger"></span>
            </div>
            <center>
                <div class="g-recaptcha" data-sitekey="6LcY1M8mAAAAAFITXd7NPTHA0WoVKwmxbaMl5ZFt" style="border: none; padding: 10px 20px; margin: 4px 2px; cursor: space; border-radius:10px; font-size:15px"></div>
                <div id="g-recaptcha-error"></div>
            </center>
            <div class="text-center">
                <button type="submit" class="btn btn-custom" name="btnsubmit">Reset Password</button>
                &nbsp;&nbsp;&nbsp;
                <a href="index.php" class="btn btn-custom">Back</a>
            </div>
            <p style="font-size: 20px; text-align: center; margin-top: 25px; color: black;">New User? Click Here For <a href="registration.php">Registration</a></p>
        </form>
    </div>
</body>
</html>
