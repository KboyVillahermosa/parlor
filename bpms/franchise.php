<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['bpmsaid']==0)) {
    header('location: logout.php');
    exit(); 
} 

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $location = $_POST['location'];
    $phone = $_POST['phone'];

    $query = mysqli_query($con, "INSERT INTO tblinquires (CompleteName, EmailAddress, ResidentialAddress, LocationForBusiness, ContactNumber) VALUES ('$name', '$email', '$address', '$location', '$phone')");
    if ($query) {
        echo "<script>alert('Franchise application submitted successfully.');</script>";
        exit();
    } else {
        echo "<script>alert('Something went wrong. Please try again.');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Become One</title>
        
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
  </head>
  <body>
	  <?php include_once('includes/header.php');?>
  

<br>
<br>
<br>
<br>
<br>
<br>
    <section class="ftco-section ftco-no-pt ftco-booking">
    	<div class="container-fluid px-0">
    		<div class="row no-gutters d-md-flex justify-content-end">
    			<div class="one-forth d-flex ">
    				<div class="text">
    					<div class="overlay"></div>
    					<div class="appointment-wrap">
    						<span class="subheading">Franchise</span>
								<h3 class="mb-2">Apply for Franchise</h3>
		    				<form action="#" method="post" class="appointment-form">
			            <div class="row">
			              <div class="col-sm-12">
			                <div class="form-group">
					              <input type="text" class="form-control" id="name" placeholder="Complete Name" name="name" required="true">
					            </div>
			              </div>
			              <div class="col-sm-12">
			                <div class="form-group">
					              <input type="email" class="form-control" id="email" placeholder="Email Address" name="email" required="true">
					            </div>
			              </div>
				            <div class="col-sm-12">
			                <div class="form-group">
					              <input type="text" class="form-control" id="address" placeholder="Residential Address" name="address" required="true">
					            </div>
			              </div>
			              <div class="col-sm-12">
			                <div class="form-group">
					              <input type="text" class="form-control" id="location" placeholder="Target Location for Business" name="location" required="true">
					            </div>
			              </div>
						  <div class="col-sm-12">
			                <div class="form-group">
					              <input type="text" class="form-control" id="phone" placeholder="Contact Number" name="phone" required="true">
					            </div>
			              </div>
				          </div>
				          <div class="form-group">
			              <input type="submit" name="submit" value="Apply Now" class="btn btn-primary">
			            </div>
						<span class="subheading">"Paula Online Salon Franchise is committed to protecting the privacy of our applicants. <br>
							 We collect and use your personal information in accordance with Republic Act No. 10173 or the <br>
							 Data Privacy Act of 2012 and our privacy policy. By applying for franchise, <br>
							 you consent to the collection and use of your personal information in accordance with this policy.<br>
							  If you have any questions or concerns regarding our data privacy practices, please contact us."</span>
			          </form>
		          </div>
						</div>
    			</div>
					<div class="one-third">
						<div class="img" style="background-image: url(images/bg.png);">
						
						</div>
						
					</div>
    		</div>	
    	</div>
		
			  
    </section>

		
	<br>


   <?php include_once('includes/footer.php');?>

    
  

  
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="30px" height="30px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


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
