
<?php
  include "connection.php";

  if(isset($_GET['edit_id']))
  {
    $sql = "SELECT * FROM register WHERE u_id=" .$_GET['edit_id'];
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($result);
  }
 
  if(isset($_POST['btnupdate']))
  {

    $userfname = $_POST['Firstname'];
    $userlname = $_POST['Lastname'];
    $useremail = $_POST['email'];
    $userpass = $_POST['Password'];
    $userconpass = $_POST['Cpassword'];
    $usermobile = $_POST['umob'];
    $useraddress = $_POST['Address'];

    $update = "UPDATE register SET u_fname='$userfname', u_lname='$userlname', u_email='$useremail' , u_pass='$userpass', u_conpass='$userconpass', u_mobile='$usermobile', u_address='$useraddress' WHERE u_id= ".$_GET['edit_id'];

    $edit = mysqli_query($conn, $update);

    if(isset($sql))
    {
      header("location: display.php");
    }
    else
    {
      echo "ERROR";
    }
  
   } 
?>

<html>
	<head>
		<title>Registration Form</title>
	    
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width initial-1">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
		<style>
		h1{
		text-align:left;
		}
		h6{
		text-align:center;
		}
		.labelLeft {
	margin-bottom: 5px;
    margin-left: 5px;
		}
		.formField{
		text-align:left;
		}
		
		</style>
		<script>
		function form()
		{
			var fname = document.getElementById("ufname").value;

			if(fname == "")
			{
				document.getElementById("ufirstname").innerHTML="*First Name Is Empty*" ;
				return false;
			}
			if(!isNaN(fname))
			{
				document.getElementById("ufname").innerHTML="*Numbers Are Not Allowed*";
                return false;
			}
			else
			{
				document.getElementById("ufirstname").innerHTML="";
			}
			
			
			var lname = document.getElementById("ulname").value;

			if(lname == "")
			{
				document.getElementById("ulastname").innerHTML="*Last Name Is Empty*" ;
				return false;
			}
			if(!isNaN(lname))
			{
				document.getElementById("ulastname").innerHTML="*Numbers Are Not Allowed*";
                return false;
			}
			else
			{
				document.getElementById("ulastname").innerHTML="";
			}

			var pwd= document.getElementById("upwd").value;

			if(pwd=="")
			{
				document.getElementById("upass").innerHTML="*password is empty*";
				return false;
			}

			if(pwd.length < 5 || pwd.length > 20)
			{
				document.getElementById("upass").innerHTML="*password length must be between 5 and 20*";
				return false;
			}

			var connpwd= document.getElementById("cpwd").value;
			if(connpwd=="")
			{
				document.getElementById("conpwd").innerHTML="*confirm password is empty*";
				return false;
			}
			if(connpwd.length <5 || cpwd.length>20)
			{
				document.getElementById("conpwd").innerHTML="*confirm password length must be between 5 and 20*";
				return false;
			}
			if(pwd != connpwd)
			{
				document.getElementById("conpwd").innerHTML="*password and confirm password not same*";
				return false;
			}

			var mobile=document.getElementById("umobile").value;
			if(mobile=="")
			{
				document.getElementById("usermobile").innerHTML="*mobile number is empty*";
				return false;
			}
			if(mobile.length >10 || mobile.length <10)
			{
				document.getElementById("usermobile").innerHTML="*mobile number is invalid*";
				return false;
			}

			var address=document.getElementById("uaddress").value;
			if(address=="")
			{
				document.getElementById("useraddress").innerHTML="*address is empty*";
				return false;
			}
			

		}

	</script>

	</head>
	<body>
		<div class="container" style="color:maroon";>
			<div class="row">
			<div class="col-md-6 offset-md-3">
				<div>
					<div class="mt-5 border p-2 bg-light shadow">
						<h6 class="mb-5" style="font-size:25";>Registration form<h6>
						<form action="edit.php?edit_id=<?php echo $row['u_id']; ?>" method="POST" onsubmit="return form()">
						<div class="row">

							<div class="mb-3 col-md-6 formField">
								<label class="labelLeft">Firstname</label>
								<input type="text" name="Firstname" class="form-control" id="ufname" placeholder="Enter Firstname" value="<?php echo $row['u_fname']; ?>">
								<span id="ufirstname" style="color:red"></span>
							</div>
							<div class="mb-3 col-md-6 formField">
								<label class="mb-2 ms-2">Lastname</label>
								<input type="text" name="Lastname" class="form-control" id="ulname" placeholder="Enter Lastname" value="<?php echo $row['u_lname']; ?>">
								<span id="ulastname" style="color:red"></span>
							</div>

							<div class="mb-3 col-md-12 formField">
								<label class="labelleft">Email</label>
								<input type="text" name="email" class="form-control" id="uemail" placeholder="Enter Email-id" value="<?php echo $row['u_email']; ?>">
								<span id="uemail" style="color:red"></span>
							</div>
							<div class="mb-3 col-md-6 formField">
								<label class="labelleft">Password</label>
								<input type="text" name="Password" class="form-control" id="upwd" placeholder="Enter Password" value="<?php echo $row['u_pass']; ?>">
								<span id="upass" style="color:red"></span>
							</div>
							<div class="mb-3 col-md-6 formField">
								<label class="labelleft">Confirm Password</label>
								<input type="text" name="Cpassword" class="form-control" id="cpwd" placeholder="Confirm password" value="<?php echo $row['u_conpass']; ?>">
								<span id="conpwd" style="color:red"></span>
							</div>
							<div class="mb-3col-md-12 formField">
								<label class="labelleft">Mobile no.</label>
								<input type="text" name="umob" class="form-control" id="umobile" placeholder="Enter Mobile no." value="<?php echo $row['u_mobile']; ?>"><br>
								<span id="usermobile" style="color:red"></span>
							</div>
							<div class="mb-3 col-md-12 formField">
								<label class="labelleft">Address</label>
								<input type="text" name="Address" class="form-control" id="uaddress" placeholder="Enter Address" value="<?php echo $row['u_address']; ?>">
								<span id="useraddress" style="color:red"></span>
							</div> 
						</div>
									<button class="btn btn-primary type-end" type="submit" name="btnupdate" onclick="update()" style="background-color: green;">Update</button>
                  <button class="btn btn-primary type-end" type="reset" name="btn-reset">Reset</button>
                  <a href="display.php"><button class="btn btn-primary type-end" type="button" value="Cancel" style="background-color: red;" >Cancel</button></a>
					</form>
					</div>
				</div>
       </div>
			 </div>
		</div>
	</body>
    <script>
    function update()
    {
      var x;
      if(confirm("Updated data Sucessfully") == true)
      {
        x= "update";
      }
    }
  </script>
</html>

