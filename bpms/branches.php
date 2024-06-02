<?php
session_start();
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Branches</title>
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i,900,900i" rel="stylesheet">
    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/aos.css">
    <link rel="stylesheet" href="css/ionicons.min.css">
    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
    <style>
        .card-img-top {
            height: 200px;
            object-fit: cover;
        }
    </style>
</head>
<body>
    <?php include_once('includes/header.php'); ?>

    <section class="hero-wrap hero-wrap-2" style="background-image: url('images/b1.jpg');" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-center">
                <div class="col-md-9 ftco-animate pb-5">
                    <h2 class="mb-0 bread">Branches</h2>
                    <p class="breadcrumbs">
                        <span class="mr-2"><a href="index.php">Home <i class="ion-ios-arrow-forward"></i></a></span>
                        Branches <span> <i class="ion-ios-arrow-forward"></i></span>
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section ftco-no-pb">
        <div class="container">
            <div class="row no-gutters justify-content-center mb-5 pb-2">
                <div class="col-md-6 text-center heading-section ftco-animate">
                    <h4 class="w3ls_head">Branches <?php echo $_SESSION['aptno']; ?></h4>
                </div>
            </div>
            <div class="container-fluid p-5">
                <div class="row">
                    <div class="col-md-3 ftco-animate">
                        <div class="card">
                            <a href="https://www.facebook.com/profile.php?id=100079226911378" target="_blank">
                                <img src="images/branch1.jpg" class="card-img-top" alt="Branch 1">
                            </a>
                            <div class="card-body">
                                <h3 class="card-title">Vi Vogue Banilad </h3> 
                                <h7><strong> Address: </strong> 2nd Floor Gaisano Country Mall Banilad (Beside Taste of Mandarin) <br>
                                <strong>Contact Number: </strong><br> 0927-207-0793 <br>
                                <strong> Store Hours: </strong><br> 9 AM - 9 PM </h7>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 ftco-animate">
                        <div class="card">
                            <a href="https://www.facebook.com/search/top/?q=%20vi%20vogue%20mandaue" target="_blank">
                                <img src="images/branch2.jpg" class="card-img-top" alt="Branch 2">
                            </a>
                            <div class="card-body">
                                <h3 class="card-title">Vi Vogue Mandaue</h3>
                                <h7><strong> Address: </strong> 2nd Floor Insular Square Mandaue<br>
                                <strong>Contact Number: </strong><br> 09185773238 <br>
                                <strong> Store Hours: </strong><br> 10 AM - 8 PM</h7>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 ftco-animate">
                        <div class="card">
                            <a href="https://www.facebook.com/profile.php?id=100083624216637" target="_blank">
                                <img src="images/branch3.jpg" class="card-img-top" alt="Branch 3">
                            </a>
                            <div class="card-body">
                                <h3 class="card-title">Vi Vogue Liloan</h3>
                                <h7><strong> Address: </strong> 2nd Floor Karando's Commercial Building (above JRS, and across Motortrade), Purok Acacia, Poblacion Liloan, <br>
                                <strong>Contact Number: </strong><br> 09266206118 <br>
                                <strong> Store Hours: </strong><br> 11 AM - 8 PM </h7>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 ftco-animate">
                        <div class="card">
                            <a href="https://www.facebook.com/search/top/?q=%20vi%20vogue%20mactan" target="_blank">
                                <img src="images/branch4.jpg" class="card-img-top" alt="Branch 4">
                            </a>
                            <div class="card-body">
                                <h3 class="card-title">Vi Vogue Mactan</h3>
                                <h7><strong> Address: </strong> 2nd Floor City Times Square Mactan <br>
                                <strong>Contact Number: </strong><br> 09812452469 <br>
                                <strong> Store Hours: </strong><br> 10 AM - 7 PM </h7>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>

    <?php include_once('includes/footer.php'); ?>

    <!-- loader -->
    <div id="ftco-loader" class="show fullscreen">
        <svg class="circular" width="48px" height="48px">
            <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
            <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" />
        </svg>
    </div>

    <script src="js/jquery.min.js"></script>
    <script src="js/jquery-migrate-3.0.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.easing.1.3.js"></script>
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/jquery.stellar.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/aos.js"></script>
    <script src="js/jquery.animateNumber.min.js"></script>
    <script src="js/bootstrap-datepicker.js"></script>
    <script src="js/jquery.timepicker.min.js"></script>
    <script src="js/scrollax.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
    <script src="js/google-map.js"></script>
    <script src="js/main.js"></script>
</body>
</html>
