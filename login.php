<?php
	// include "Admin/connection.php";
?>


<!DOCTYPE html>

<html>
	<head>
		<title>Login Page</title>
		
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width initial-1">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

		<script src='https://www.google.com/recaptcha/api.js'></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.3/font/bootstrap-icons.min.css">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	</head>

    <style>
    	body {
            background-image: url('images/bg2.jpeg');
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
        	}
        .form-frame {
            border: 5px solid #fc2626;
            border-radius: 10px;
            padding: 20px;
/*            margin-top: 1vh;*/
            background-color: #ffecec;
        }
        .btn-custom {
            background-color: red;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            margin-top: 5px;
            font-size: 1em;
            transition: background-color 0.3s ease;
        }
        .btn-custom:hover {
            background-color: green;
            color: white;
        }

        .form-control {
            padding: 10px;
            border: 2px solid red;
            border-radius: 5px;
            font-size: 1em;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }
        .form-control:focus {
            border-color: #600000;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
        }
        .full-row-border {
        border-bottom: 2px solid #000;
        padding-bottom: 10px;
        margin-bottom: 20px;
        font-size: 25px;
        width: 100%;
    }
    </style>


	<script>
		function form()
		{
			var email=document.getElementById("uemail").value;
			if(email=="")
			{
				document.getElementById("userid").innerHTML="*email is invalid*";
				return false;
			}

			var pwd=document.getElementById("upwd").value;
			if(pwd=="")
			{
				document.getElementById("userpwd").innerHTML="*password is invalid*"
				return false;
			}
			

			if(pwd.length < 3 || pwd.length > 20)
			{
				document.getElementById("userpwd").innerHTML="*password  length must be between 3 and 20*";
				return false;
			}

			var response = grecaptcha.getResponse();
    		if(response.length == 0) 
    		{
        	document.getElementById('g-recaptcha-error').innerHTML = '<span style="color:red;">Please complete the reCAPTCHA challenge!</span>';
        	return false;
    		}
    		return true;
			
		}
	</script>
	<body>
    <div class="container mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="form-frame">
                    <center><h1 class="full-row-border" style="color: red;">Login Here</h1></center>
                    <form action="Admin/login_insert.php" method="POST" onsubmit="return form()">
                        <div class="form-group">
                            <label for="uemail" class="font-weight-bold" style="font-size: 1.2em; color: #800000;">Enter Email :</label>
                            <input type="text" name="txtemail" class="form-control" id="uemail" placeholder="Enter Email" style="background-color: #ffe9ec;">
                            <span id="userid" class="text-danger"></span>
                        </div>
                        <div class="form-group">
                            <label for="upwd" class="font-weight-bold" style="font-size: 1.2em; color: #800000; margin-top: 25px;">Enter Password :</label>
                            <input type="password" name="txtpwd" class="form-control" id="upwd" placeholder="Enter Password" style="background-color: #ffe9ec;">
                            <span id="userpwd" class="text-danger"></span>
                        </div>
                        <center>
                            <div class="g-recaptcha" data-sitekey="6LcY1M8mAAAAAFITXd7NPTHA0WoVKwmxbaMl5ZFt" style="border: none; padding: 10px 20px; margin: 4px 2px; cursor: pointer; border-radius: 10px; font-size: 15px;"></div>
                            <div id="g-recaptcha-error"></div>
                        </center>
                        <div class="text-center mt-3">
                            <button type="submit" class="btn btn-custom" name="btnsubmit" style="background-color: green;">Login</button>
                            &nbsp;&nbsp;&nbsp;
                            <a href="index.php" class="btn btn-custom" style="background-color: red;">Back</a>
                        </div>
                        <br>

                        <div class="text-center">
                            <a href="#" style="font-size: 20px;" data-toggle="modal" data-target="#otpModal">
                                <i class="bi bi-key"></i>&nbsp;Forget Password
                            </a>
                        </div>

                        <p style="font-size: 20px; text-align: center; margin-top: 25px; color: black;">New User? Click Here For <a href="registration.php">Registration</a></p>
                        
                        <div class="text-center">
                            <a href="#" style="font-size: 20px;" data-bs-toggle="modal" data-bs-target="#cancelTicketModal">
                                <i class="bi bi-x-circle"></i>&nbsp;Cancel Booked Ticket
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Reset Password Modal -->
<div class="modal fade" id="otpModal" tabindex="-1" role="dialog" aria-labelledby="otpModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="background-color: #ffecec; border-radius: 10px; border: 2px solid #800000;">
            <div class="modal-header" style="background-color: #800000; color: white;">
                <h5 class="modal-title" id="otpModalLabel">Request OTP</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: white;">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="padding: 20px;">
                <form action="send_otp.php" method="POST">
                    <div class="form-group">
                        <label for="otp-email" class="font-weight-bold" style="font-size: 1.2em; color: #800000;">Enter Email :</label>
                        <input type="email" name="txtemail" class="form-control" id="otp-email" placeholder="Enter Email" style="border: 2px solid #800000; border-radius: 5px; font-size:20px; padding: 10px; background-color: #ffecec;" required>
                        <span id="otp-email-error" class="text-danger"></span>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-custom" name="btnsubmit" style="background-color: green; color: white; border: none; border-radius: 5px; padding: 10px 20px;">Request OTP</button>
                        &nbsp;&nbsp;&nbsp;
                        <button type="button" class="btn btn-custom" data-dismiss="modal" style="background-color: red; color: white; border: none; border-radius: 5px; padding: 10px 20px;">Back</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Cancel Ticket Modal -->
<div class="modal fade" id="cancelTicketModal" tabindex="-1" aria-labelledby="cancelTicketModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="background-color: #ffecec; border-radius: 10px; border: 2px solid #800000;">
            <div class="modal-header" style="background-color: #800000; color: white;">
                <h5 class="modal-title" id="cancelTicketModalLabel">Enter Your Email</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close" style="color: white;">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="padding: 20px;">
                <!-- Email Form inside the modal -->
                <form id="emailForm" method="POST" action="del_send_otp.php">
                    <div class="form-group">
                        <label for="email" style="font-size: 1.2em; color: #800000;">Enter Your Email:</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email" style="border: 2px solid #800000; border-radius: 5px; font-size: 1em; padding: 10px; background-color: #ffecec;" required>
                    </div>
                    <div class="text-center mt-3">
                        <button type="submit" class="btn btn-primary" name="btnsubmit" style="background-color: green; color: white; border: none; border-radius: 5px; padding: 10px 20px;">Request OTP</button>
                        <button type="button" class="btn btn-secondary ms-2" data-bs-dismiss="modal" style="background-color: red; color: white; border: none; border-radius: 5px; padding: 10px 20px;">Back</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



</body>
</html>




<?php
	// if(isset($_REQUEST['btnsubmit']))
	// {
	// 	 $useremail=$_REQUEST['txtemail'];
	// 	 $userpassword=$_REQUEST['txtpwd'];

	// 	$res=mysqli_query($conn, "select * from register where u_email='$useremail' and u_pass='$userpassword'");
	// 	$result=mysqli_fetch_array($res);

	// 	if($result)
	// 	{
	// 		$sql = "INSERT INTO login VALUES (0,'$useremail','$userpassword')";

	// 		$data=mysqli_query($conn,$sql);

	// 		echo '<script type="text/javascript">
	// 		 		window.location="index.php"</script>';
	// 	}
	// 	else
	// 	{
	// 		echo"<script>alert('Your Email And Password Are Wrong !!'); </script>";
	// 	}
	// }
?>