<?php
   include ("header.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <!-- Bootstrap CSS -->
    <!-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet"> -->
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <style>
        .contact-section {
            background-color: #b5dafe;
            padding: 60px 0;
        }
        .contact-card {
            background-color: #728293;
            color: #fff;
            border-radius: 15px;
            padding: 30px;
        }
        .contact-card h2, .contact-card h3 {
            margin-bottom: 20px;
        }
        .social-icons a {
            margin: 0 10px;
            color: #fff;
        }
        .form-container {
            padding: 30px;
            background-color: #fff;
            border-radius: 15px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
          .col-md-6 {
              width: 50%;
              float: left;
              padding: 0 15px;
              box-sizing: border-box;
          }
          .mb-5 {
              margin-bottom: 3rem;
          }
          .form-container {
              background-color: #f8f9fa;
              border: 1px solid #dee2e6;
              padding: 1.5rem;
              border-radius: .25rem;
              box-shadow: 0 0 10px rgba(0,0,0,0.1);
          }
          .form-group {
              margin-bottom: 1rem;
          }
          .form-control {
              display: block;
              width: 100%;
              padding: .375rem .75rem;
              font-size: 1rem;
              line-height: 1.5;
              color: #495057;
              background-color: #fff;
              background-clip: padding-box;
              border: 1px solid #ced4da;
              border-radius: .25rem;
              box-shadow: inset 0 0 0 transparent;
              transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
          }
          .btn-primary {
              color: #fff;
              background-color: #007bff;
              border-color: #007bff;
              padding: .375rem .75rem;
              font-size: 1rem;
              line-height: 1.5;
              border-radius: .25rem;
              cursor: pointer;
              text-align: center;
              display: inline-block;
              margin-top: 1rem;
          }
          .btn-primary:hover {
              background-color: #0056b3;
              border-color: #004085;
          }
    </style>


    <script>
         function form()
         {
            //First name js
            var fname = document.getElementById("ufname").value;
            var pattern = /^[a-zA-Z]*$|^\d*$/;

            if(fname == "")
            {
               document.getElementById("ufirstname").innerHTML="*First Name Is Empty*";
               return false;
            }
            if(!isNaN(fname))
            {
               document.getElementById("ufirstname").innerHTML="*Number is Not Allowed";
               return false;
            }
            if (!pattern.test(fname)) 
               {
                document.getElementById("ufirstname").innerHTML="characters Are Not Allowed*";
                return false;
               }
            else
            {
               document.getElementById("ufirstname").innerHTML="";
            }

            //Last name js

            var lname = document.getElementById("ulname").value;
            var pattern = /^[a-zA-Z]*$|^\d*$/;

            if(lname == "")
            {
               document.getElementById("ulastname").innerHTML="*Last Name Is Empty*";
               return false;
            }
            if(!isNaN(lname))
            {
               document.getElementById("ulastname").innerHTML="*Number is Not Allowed";
               return false;
            }
            if (!pattern.test(lname)) 
               {
                document.getElementById("ulastname").innerHTML="characters Are Not Allowed*";
                return false;
               }
            else
            {
               document.getElementById("ulastname").innerHTML="";
            }

            //Email javascript ...

               var email = document.getElementById("uemail").value;
               var emailPattern = /^[a-zA-Z0-9]+@[a-zA-Z0-9]+\.[a-zA-Z]{2,}$/; // Regular expression for email validation

            // Check if the email matches the pattern
            if (emailPattern.test(email))   //if (email.match(emailPattern))
            {
                document.getElementById("useremail").innerHTML="";
            } 
            else 
            {
                document.getElementById("useremail").innerHTML="*Invalid email address.*";
                return false; 
            }

            //Contact javascript ...

            var contact = document.getElementById("ucontact").value;
            
               if(contact == "")
               {
                  document.getElementById("usercontact").innerHTML="*Enter Contact Number*";
                  return false;
               }
               if(contact.length>10 || contact.length <10)
               {
                  document.getElementById("usercontact").innerHTML="*Enter Mobile Number must be 10 Digits*";
                  return false;
               }
               if (!/^\d{10}$/.test(contact)) 
               {
                  document.getElementById("usercontact").innerHTML="characters Are Not Allowed*";
                  return false;
               }
               else
               {
                     document.getElementById("usercontact").innerHTML="";
               }

               //Message javascript ...

               var message = document.getElementById("emessage").value;

               if(message == "")
               {
                   document.getElementById("usermessage").innerHTML="*Enter Your Message*";
                   return false;
               }
               
         }
      </script>
</head>
<body>

<section class="contact-section">
   <div class="container">
      <div class="row text-center mb-5">
         <div class="col">
            <h2>Contact Us | Get in Touch</h2>
            <h5>We would love to hear from you. Please fill out the form below to get in touch.</h5>
         </div>
      </div>
      <div class="row">
         <div class="col-md-6 mb-4">
            <div class="contact-card">
               <h2>Contact Information</h2><br>
               <p>Our team will get back to you within 24 hours.</p>
               <p><i class="fa fa-phone"></i> +91 81405 58956</p>
               <p><i class="fa fa-envelope"></i> Hellomovieticket@live.com</p>
               <p><i class="fa fa-map-marker-alt"></i> Banjara Road, Vesu, Surat, Gujarat</p><br>
               <h3>Join Us</h3>
               <div class="social-icons">

                  <a href="https://www.facebook.com/theanantsoni?mibextid=ZbWKwL"><i class="fab fa-facebook-square fa-2x"></i></a>

                  <a href="https://www.instagram.com/theanantsoni?igsh=MTE0MXh1b3duZmUxdA=="><i class="fab fa-instagram fa-2x"></i></a>

                  <a href="https://x.com/theanantsoni?t=veZLj-2UGTwHMYgc0YJi9Q&s=09"><i class="fab fa-twitter fa-2x"></i></a>

                  <a href="https://www.linkedin.com/in/anant-soni-b737662a2?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=android_app"><i class="fab fa-linkedin fa-2x"></i></a>

                  <a href="https://github.com/Theanantsoni"><i class="fab fa-github fa-2x"></i></a>

                  <a href="https://www.youtube.com/@Theanantsoni"><i class="fab fa-youtube fa-2x"></i></a>

               </div>
            </div>
         </div>

         <div class="col-md-6 mb-5">
             <div class="form-container border p-4 rounded" style="background-color: #f8f9fa; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
                 <form action="" method="POST" onsubmit="return form()">
                     <div class="form-row">
                         <div class="form-group col-md-6">
                             <label for="ufname" style="font-size: 15px;">First Name :</label><span id="ufirstname" style="color:red;"></span>
                             <input type="text" name="ufname" class="form-control" id="ufname" placeholder="Enter your first name">
                             
                         </div>
                         <div class="form-group col-md-6">
                             <label for="ulname" style="font-size: 15px;">Last Name :</label><span id="ulastname" style="color:red;"></span>
                             <input type="text" name="ulname" class="form-control" id="ulname" placeholder="Enter your last name">
                             
                         </div>
                     </div>
                     <div class="form-row">
                         <div class="form-group col-md-6">
                             <label for="uemail" style="font-size: 15px;">Your Email :</label><span id="useremail" style="color:red;"></span>
                             <input type="email" name="uemail" class="form-control" id="uemail" placeholder="Enter your email">
                             
                         </div>
                         <div class="form-group col-md-6">
                             <label for="umobile" style="font-size: 15px;">Mobile No :</label><span id="usercontact" style="color:red;"></span>
                             <input type="text" name="ucontact" class="form-control" id="ucontact" placeholder="Enter mobile no.">
                             
                         </div>
                     </div>
                     <div class="form-group col-md-12">
                         &nbsp;&nbsp;&nbsp;&nbsp;<label for="emessage" style="font-size: 15px;">Message :</label><span id="usermessage" style="color:red;"></span>
                         <textarea name="umsg" id="emessage" class="form-control" rows="4" placeholder="Send message"></textarea>
                     </div>
                     <button type="submit" class="btn btn-primary">Send Message</button>
                 </form>
             </div>
         </div>
      </div>
   </div>
</section>

<!-- jQuery and Bootstrap JS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> -->
</body>
</html>


<?php
   include ("footer.php");
?>