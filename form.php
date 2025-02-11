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
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/main.css" rel="stylesheet" media="all">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <script>
        $(function()
        {
            $('#tickets').change(function()
            {
                $('#priceinput').val($('#tickets option:selected').attr('seat'));


            });
        });
    </script>

  
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

</head>

<body>
    <form action="tckt.php" method="POST">
    <div class="page-wrapper bg-gra-02 p-t-130 p-b-100 font-poppins">
        <div class="wrapper wrapper--w680">
            <div class="card card-4">
                <div class="card-body">
                    <h2 class="title">Movie Ticket Booking</h2>
                    <form method="POST">
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">first name</label>
                                    <input class="input--style-4" type="text" name="ufname">
                                </div>
                            </div>

                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">last name</label>
                                    <input class="input--style-4" type="text" name="ulname">
                                </div>
                            </div>
                        </div>

                         <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Email</label>
                                    <input class="input--style-4" type="email" name="uemail">
                                </div>
                            </div>

                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Phone Number</label>
                                    <input class="input--style-4" type="text" name="ucontact">
                                </div>
                            </div>
                        </div>

                        
	                    <div class="input-group">
                            <label class="label">Select a Movie</label>
                            <div class="rs-select2 js-select-simple select--no-search">
                                <select name="umovie">
                                    <option disabled="disabled" selected="selected">Choose Movie</option>
                                    <option>Movie 1</option>
                                    <option>Movie 2</option>
                                    <option>Movie 3</option>
                                    <option>Movie 4</option>
                                    <option>Movie 5</option>
                                </select>
                                <div class="select-dropdown"></div>
                            </div>
                        </div>


                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Date</label>
                                    <div class="input-group-icon">
                                        <input class="input--style-4 js-datepicker" type="text" name="udate">
                                        <i class="zmdi zmdi-calendar-note input-icon js-btn-calendar"></i>
                                    </div>
                                </div>
                            </div>

                                <div class="col-2">
	                                <div class="input-group">
	                                    <label class="label">Time</label>
	                                    <input class="input--style-4" type="time" name="utime">
	                                </div>
                          		</div>
						</div>

						<div class="row row-space">
                            <div class="input-group">
                            <label class="label">Choose a Seat</label>
                            <div class="rs-select2 js-select-simple select--no-search">
                                <div class="select-dropdown">
                                <select name="useat" id="tickets">
                                    <option disabled="disabled" selected="selected">Choose Seat</option>
                                    <option seat="250">First Row</option>
                                    <option seat="450">second Row</option>
                                    <option seat="650">third Row</option>
                                </select>
                                </div>
                            </div>
                        </div>

                                <div class="col-2">
	                                <div class="input-group">
	                                    <label class="label">Price :</label>
	                                    <input class="input--style-4" type="text" name="uprice" id="priceinput" readonly>
	                                </div>
                          		</div>

						</div>

                        <div class="row row-space">
                            <div class="input-group">
                            <label class="label">Number Of Tickets</label>
                                <div class="rs-select2 js-select-simple select--no-search">
                                    <div class="select-dropdown">
                                    <select name="utcktno">
                                        <option disabled="disabled" selected="selected">Select Number Of Seat</option>
                                        <option tckt="1">1</option>
                                        <option tckt="2">2</option>
                                        <option tckt="3">3</option>
                                        <option tckt="4">4</option>
                                        <option tckt="5">5</option>
                                    </select>
                                    </div>
                                </div>
                            </div>
                        

                                <div class="col-2">
                                    <div class="input-group">
                                        <label class="label">Payment Price :</label>
                                        <input class="input--style-4" name="upayprice" type="text" id="paymentPrice" readonly>
                                    </div>
                                </div>

                        </div>
                        <div class="p-t-15">
                            <button class="btn btn--radius-2 btn--blue" type="submit" name="btnsubmit" style="margin-left: 115px;">Submit</button>
                            <button class="btn btn--radius-2 btn--blue" type="reset" name="btnreset" style="margin-right: 90px;">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

   </form> 

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

 <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="js/global.js"></script>

     

</html>
<!-- end document-->
