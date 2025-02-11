<?php
    include "Admin/connection.php";
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>Au Register Forms by Colorlib</title>

    <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <!--<link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">-->

    <!-- Main CSS-->
    <link href="css/main.css" rel="stylesheet" media="all">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <script type="text/javascript" src="https://code.jquery.com/jquery-1.7.2.min.js"></script>


    <!-- ticket price Javascript Start-->
    <script>
        $(function()
        {
            $('#tickets').change(function()
            {
                $('#priceinput').val($('#tickets option:selected').attr('seat'));
            });
        });
    </script>
    <!-- ticket price Javascript End-->

    <!-- Payment Price Javascript Start -->
    <script>
        $(function() {
            $('#tickets').change(function() {
                calculatePaymentPrice();
            });

            $('select[name="utcktno"]').change(function() {
                calculatePaymentPrice();
            });

            function calculatePaymentPrice() {
                const selectedSeatPrice = parseInt($('#tickets option:selected').attr('seat'));
                const numberOfTickets = parseInt($('select[name="utcktno"]').val());

                if (!isNaN(selectedSeatPrice) && !isNaN(numberOfTickets)) {
                    const totalPrice = selectedSeatPrice * numberOfTickets;
                    $('#paymentPrice').val(totalPrice);
                }
            }
        });
    </script>
    <!-- Payment Price Javascript End -->

    <script>
        function form()
        {
            //------------------First name js------------------

            var fname = document.getElementById("ufname").value;    
            var pattern = /^[a-zA-Z]*$|^\d*$/;

            if(fname == "")
            {
                document.getElementById("ufirstname").innerHTML="*First Name Is Empty*";
                return false;
            }
            if(!isNaN(fname))
            {
                document.getElementById("ufirstname").innerHTML="*characters Are Not Allowed*";
                return false;
            }
            if (!pattern.test(fname)) 
            {
                document.getElementById("ufirstname").innerHTML="Numbers Are Not Allowed*";
                return false;
            }
            else
            {
                document.getElementById("ufirstname").innerHTML="";
            }

            //------------------Last name js------------------

            var lname = document.getElementById("ulname").value;
            var pattern = /^[a-zA-Z]*$|^\d*$/;

            if(lname == "")
            {
                document.getElementById("ulastname").innerHTML="*Last Name Is Empty*";
                return false;
            }
            if(!isNaN(lname))
            {
                document.getElementById("ulastname").innerHTML="*characters Are Not Allowed*";
                return false;
            }
            if (!pattern.test(lname)) 
            {
                document.getElementById("ulastname").innerHTML="Numbers Are Not Allowed*";
                return false;
            }
            else
            {
                document.getElementById("ulastname").innerHTML="";
            }

            //------------------Email js------------------

            var email = document.getElementById("uemail").value;    
            var emailPattern = /^[a-zA-Z0-9]+@[a-zA-Z0-9]+\.[a-zA-Z]{2,}$/; // Regular expression for email validation

            // Check if the email matches the pattern
            if(email == "")
            {
                document.getElementById("useremail").innerHTML="*Please Enter Your Email Address*";
                return false;
            }
            if (emailPattern.test(email))   //if (email.match(emailPattern))
            {
              document.getElementById("useremail").innerHTML="";
            } 
            else 
            {
              document.getElementById("useremail").innerHTML="*Invalid email address. Please enter a valid email.*";
              return false; 
            }

            //------------------Contact js------------------

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
            

            //------------------movie js------------------

            var umovie = document.getElementById("uselmovie").value;    

            if(umovie == "selected")
            {
                document.getElementById("selmovie").innerHTML="*Please Select Movie*";
                return false;
            }

            //------------------date js------------------

            var date = document.getElementById("datepicker").value; 

            if(date == "")
            {
                document.getElementById("userdate").innerHTML="*Please Select Date*";
                return false;
            }

            //------------------Time js------------------

          var selutime = document.getElementById("useltime").value;    

            if(selutime == "Select Time")
            {
                document.getElementById("usertime").innerHTML="*Please Select Time*";
                return false;
            }

            //------------------Seat js------------------

            var userselseat = document.getElementById("tickets").value;  
            
            if(userselseat == "Choose Seat")  
            {
                document.getElementById("selseat").innerHTML="*Please Select Seat*";
                return false;
            }

            //------------------Seat No. js------------------

            var userseatnumber = document.getElementById("selno").value;
            if(userseatnumber == "Select Number Of Seat")
            {
                document.getElementById("selseatno").innerHTML="*Select How many seats do you want*";
                return false;
            }
    
        }

    </script>

    <style>
        body {
            background-image: url('images/images1.jpeg');
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            }

             .custom-title {
            border: 2px solid #007bff; /* Border color */
            background-color: #f8f9fa; /* Background color */
            padding: 10px; /* Padding inside the border */
            border-radius: 5px; /* Rounded corners */
        }
    </style>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    

</head>

<body>
    <form action="Admin/tckt_insert.php" method="POST" onsubmit="return form()">
        <div class="container mt-5">
            <div class="card">
                <div class="card-body">
                <div class="container mt-5 text-center">
    <h2 class="card-title custom-title" style="
        color: #007bff; 
        font-weight: bold; 
        margin-bottom: 20px;
        text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.2);
    ">
        Book Your Ticket
    </h2>
</div>

                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="ufname" style="font-weight: bold; color: #007bff;">First Name :</label>
                            <input type="text" class="form-control" name="ufname" id="ufname" placeholder="Enter First Name" 
                                style="border: 2px solid #007bff; padding: 10px; background-color: #e7f3ff; border-radius: 5px;">
                            <span id="ufirstname" style="color: red; font-size: 12px;"></span>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="ulname" style="font-weight: bold; color: #28a745;">Last Name :</label>
                            <input type="text" class="form-control" name="ulname" id="ulname" placeholder="Enter Last Name" 
                                style="border: 2px solid #28a745; padding: 10px; background-color: #e8f5e9; border-radius: 5px;">
                            <span id="ulastname" style="color: red; font-size: 12px;"></span>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="uemail" style="font-weight: bold; color: #17a2b8;">Email Id :</label>
                            <input type="email" class="form-control" name="uemail" id="uemail" placeholder="Enter Email" 
                                style="border: 2px solid #17a2b8; padding: 10px; background-color: #e0f7fa; border-radius: 5px;">
                            <span id="useremail" style="color: red; font-size: 12px;"></span>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="ucontact" style="font-weight: bold; color: #ffc107;">Contact Number :</label>
                            <input type="text" class="form-control" name="ucontact" id="ucontact" placeholder="Enter Contact Number" 
                                style="border: 2px solid #ffc107; padding: 10px; background-color: #fff3cd; border-radius: 5px;">
                            <span id="usercontact" style="color: red; font-size: 12px;"></span>
                        </div>
                    </div>



                    <div class="form-row">
                        <!-- Movie Selection -->
                        <div class="form-group col-md-4">
                            <label for="uselmovie" style="font-weight: bold; color: #0056b3;">Select a Movie :</label>
                            <select id="uselmovie" name="umovie" class="form-control" style="background-color: #f0f8ff; border: 2px solid #0056b3; color: #0056b3;">
                                <option disabled selected>Choose Movie</option>
                                <option value="movie 1" style="color: #333;">Movie 1</option>
                                <option value="movie 2" style="color: #333;">Movie 2</option>
                                <option value="movie 3" style="color: #333;">Movie 3</option>
                                <option value="movie 4" style="color: #333;">Movie 4</option>
                                <option value="movie 5" style="color: #333;">Movie 5</option>
                            </select>
                            <span id="selmovie" style="color:red; font-size: 12px;"></span>
                        </div>

                        <!-- Date Picker -->
                        <div class="form-group col-md-4">
                            <label for="datepicker" style="font-weight: bold; color: #28a745;">Date :</label>
                            <div class="input-group">
                                <input type="text" class="form-control input--style-4" name="udate" id="datepicker" placeholder="Select Date" 
                                    style="cursor: pointer; background-color: #e8f5e9; border: 2px solid #28a745; color: #28a745;">
                                <div class="input-group-append">
                                    <span class="input-group-text" style="background-color: #28a745; color: #fff;">
                                        <i class="zmdi zmdi-calendar-note"></i>
                                    </span>
                                </div>
                            </div>
                            <span id="userdate" style="color:red; font-size: 12px;"></span>
                        </div>

                        <!-- Time Selection -->
                        <div class="form-group col-md-4">
                            <label for="useltime" style="font-weight: bold; color: #dc3545;">Time :</label>
                            <select name="utime" id="useltime" class="form-control" style="background-color: #ffe6e6; border: 2px solid #dc3545; color: #dc3545;">
                                <option disabled selected>Select Time</option>
                                <option>7:30 AM</option>
                                <option>11:00 AM</option>
                                <option>2:30 PM</option>
                                <option>6:00 PM</option>
                                <option>9:30 PM</option>
                            </select>
                            <span id="usertime" style="color:red; font-size: 12px;"></span>
                        </div>
                    </div>


                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="tickets" style="font-weight: bold; color: #ffc107;">Choose a Seat :</label>
                            <select name="useat" id="tickets" class="form-control" style="background-color: #fff3cd; border: 2px solid #ffc107; color: #ffc107;">
                                <option disabled selected style="color: #6c757d;">Choose Seat</option>
                                <option seat="250" style="color: #28a745;">First Row</option>
                                <option seat="450" style="color: #17a2b8;">Second Row</option>
                                <option seat="650" style="color: #17a2b8;">Third Row</option>
                            </select>
                            <span id="selseat" style="color: red; font-size: 12px;"></span>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="priceinput" style="font-weight: bold; color: #007bff;">Price :</label>
                            <input type="text" class="form-control" name="uprice" id="priceinput" readonly
                                style="background-color: #e9ecef; border: 2px solid #007bff; color: #495057;">
                        </div>
                    </div>


                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="selno" style="font-weight: bold; color: #dc3545;">Number Of Tickets :</label>
                            <select name="utcktno" id="selno" class="form-control" style="background-color: #ffe6e6; border: 2px solid #dc3545; color: #dc3545;">
                                <option disabled selected>Select Number Of Seats</option>
                                <option tckt="1" style="color: #28a745;">1</option>
                                <option tckt="2" style="color: #17a2b8;">2</option>
                                <option tckt="3" style="color: #ffc107;">3</option>
                                <option tckt="4" style="color: #dc3545;">4</option>
                                <option tckt="5" style="color: #6f42c1;">5</option>
                            </select>
                            <span id="selseatno" style="color: red; font-size: 12px;"></span>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="paymentPrice" style="font-weight: bold; color: #007bff;">Payment Price :</label>
                            <input type="text" class="form-control" name="upayprice" id="paymentPrice" readonly 
                                style="background-color: #e9ecef; border: 2px solid #007bff; color: #495057;">
                        </div>
                    </div>


                    <div class="form-group">
                        <center>
                        <button type="submit" class="btn btn-primary" name="btnsubmit" style="color: white; background-color: green; text-decoration: none;">Submit</button>
                        <button type="reset" class="btn btn-danger" name="btnreset"><a href="index.php" style="color: white; text-decoration: none;">Cancel</a></button>
                    </center>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

 <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <!-- Main JS-->
    <script src="js/global.js"></script>

        <!-- Calender Javascript Start -->

        <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <script>
            $(function() {
                $("#datepicker").datepicker({
                    minDate: 1, // 0 means today's date
                    dateFormat: "dd-mm-yy" // Customize the date format if needed
                });
            });
        </script> 

        <!-- Calender Javascript End -->
     
</html>
