<?php
include ('includes/dbconnection.php');
session_start();
error_reporting(0);

// Function to fetch services from database
function getServices($con)
{
	$services = [];
	$query = mysqli_query($con, "SELECT * FROM tblservices");
	while ($row = mysqli_fetch_array($query)) {
		$services[] = $row['ServiceName'];
	}
	return $services;
}

if (isset($_POST['submit'])) {
	$name = $_POST['name'];
	$email = $_POST['email'];
	$services = $_POST['services'];
	$branches = $_POST['branches'];
	$adate = $_POST['adate'];
	$atime = $_POST['atime'];
	$phone = $_POST['phone'];
	$aptnumber = mt_rand(100000000, 999999999);

	if ($services === 'Other') {
		$services = $_POST['other_service'];
	}

	$query = mysqli_query($con, "INSERT INTO tblappointment(AptNumber,Name,Email,PhoneNumber,AptDate,AptTime,Services) 
                                VALUES ('$aptnumber','$name','$email','$phone','$adate','$atime','$services')");
	if ($query) {
		$ret = mysqli_query($con, "SELECT AptNumber FROM tblappointment WHERE Email='$email' AND PhoneNumber='$phone'");
		$result = mysqli_fetch_array($ret);
		$_SESSION['aptno'] = $result['AptNumber'];
		echo "<script>window.location.href='thank-you.php'</script>";
	} else {
		$msg = "Something Went Wrong. Please try again";
	}
}

// Fetch existing appointments for display
$appointments_query = mysqli_query($con, "SELECT * FROM tblappointment");
$appointments = mysqli_fetch_all($appointments_query, MYSQLI_ASSOC);

// Group appointments by date and time
$groupedAppointments = [];
foreach ($appointments as $appointment) {
	$key = $appointment['AptDate'] . '_' . $appointment['AptTime'];
	if (!isset($groupedAppointments[$key])) {
		$groupedAppointments[$key] = [
			'AptDate' => $appointment['AptDate'],
			'AptTime' => $appointment['AptTime'],
			'count' => 0
		];
	}
	$groupedAppointments[$key]['count']++;
}

// Fetch services from database
$servicesList = getServices($con);
?>



<!DOCTYPE html>
<html lang="en">

<head>
	<title>Vi VOGUE</title>

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

<body class="">
	<style>
		.appointment-history {
			padding: 30px;
			background-color: #f8f9fa;
			border: 1px solid #dee2e6;
			border-radius: 8px;
		}

		.appointment-history h3 {
			font-size: 24px;
			margin-bottom: 20px;
			color: #333;
		}

		.appointments-list {
			list-style: none;
			padding: 0;
		}

		.appointments-list li {
			margin-bottom: 20px;
			padding-bottom: 20px;
			border-bottom: 1px solid #ccc;
		}

		.appointment-details {
			display: flex;
			justify-content: space-between;
			align-items: center;
		}

		.appointment-meta {
			display: flex;
			flex-direction: column;
		}

		.appointment-meta .date,
		.appointment-meta .time {
			font-size: 16px;
			color: #666;
			margin-bottom: 5px;
		}

		.progress-bar-container {
			width: 100%;
		}

		.progress {
			height: 10px;
			background-color: #e9ecef;
			border-radius: 5px;
		}

		.progress-bar {
			height: 10px;
			background-color: #e9ecef;
			border-radius: 5px;
		}

		.progress-bar.red {
			background-color: #dc3545 !important;
		}

		.modal {
			display: none;
			position: fixed;
			z-index: 999;
			left: 0;
			top: 0;
			width: 100%;
			height: 100%;
			overflow-y: auto;
			background-color: rgba(0, 0, 0, 0.5);
		}

		.modal-content {
			background-color: #fefefe;
			margin: 15% auto;
			padding: 20px;
			border: 1px solid #888;
			width: 80%;
		}

		.close {
			color: #aaa;
			float: right;
			font-size: 28px;
			font-weight: bold;
		}

		.close:hover,
		.close:focus {
			color: black;
			text-decoration: none;
			cursor: pointer;
		}
	</style>
	<?php include_once ('includes/header.php'); ?>
	<!-- END nav -->

	<section id="home-section" class="hero" style="background-image: url(images/bg88.jpg);"
		data-stellar-background-ratio="0.5">
		<div class="home-slider owl-carousel">
			<div class="slider-item js-fullheight">
				<div class="overlay"></div>
				<div class="container-fluid p-0">
					<div class="row d-md-flex no-gutters slider-text align-items-end justify-content-end"
						data-scrollax-parent="true">
						<img class="one-third align-self-end order-md-last img-fluid" src="images/n1.png" alt=""
							style="max-width: 520px;">
						<div class="one-forth d-flex align-items-center ftco-animate"
							data-scrollax=" properties: { translateY: '80%' }">
							<div class="text mt-5">
								<span class="subheading">MIND, MODY AND SOUL</span>
								<h1 class="mb-4">"Book your beauty, anytime, anywhere, with our online reservation
									salon!"</h1>
								<p class="mb-4">"Experience the convenience of seamless beauty appointments with our
									online reservation salon. Say goodbye to waiting on hold or rushing to book during
									business hours – our user-friendly platform allows you to schedule your next
									haircut, manicure, or spa treatment with just a few clicks from the comfort of your
									own home.</p>


							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="slider-item js-fullheight">
				<div class="overlay"></div>
				<div class="container-fluid p-0">
					<div class="row d-flex no-gutters slider-text align-items-center justify-content-end"
						data-scrollax-parent="true">
						<img class="one-third align-self-end order-md-last img-fluid" src="images/r1.png" alt=""
							style="max-width: 630px;">
						<div class="one-forth d-flex align-items-center ftco-animate"
							data-scrollax=" properties: { translateY: '50%' }">
							<div class="text mt-5">
								<span class="subheading">Vi Vogue </span>
								<h1 class="mb-4">Beauty Salon</h1>
								<p class="mb-4">This parlour provides huge facilities with advanced technology
									equipments and best quality service. Here we offer best treatment that you might
									have never experienced before.</p>


							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>


	<br>
	<section class="ftco-section ftco-no-pt ftco-booking">
		<div class="container-fluid px-0">
			<div class="row no-gutters d-md-flex justify-content-end">
				<div class="one-forth d-flex ">
					<div class="text">
						<div class="overlay"></div>
						<div class="appointment-wrap">
							<span class="subheading">Reservation</span>
							<h3 class="mb-2">Make an Appointment</h3>
							<form action="#" method="post" class="appointment-form">
								<div class="row">
									<div class="col-sm-12">
										<div class="form-group">
											<input type="text" class="form-control" id="name" placeholder="Name"
												name="name" required="true">
										</div>
									</div>
									<div class="col-sm-12">
										<div class="form-group">
											<input type="email" class="form-control" id="appointment_email"
												placeholder="Email" name="email" required="true">
										</div>
									</div>
									<div class="col-sm-12">
										<div class="form-group">
											<div class="select-wrap">
												<div class="icon"><span class="ion-ios-arrow-down"></span></div>
												<select name="services" id="services" required="true"
													class="form-control" onchange="toggleOtherInput()">
													<option value="">Select Services</option>
													<?php foreach ($servicesList as $service) { ?>
														<option value="<?php echo $service; ?>"><?php echo $service; ?>
														</option>
													<?php } ?>
													<option value="Other">Other (Please specify)</option>
												</select>
											</div>
										</div>
									</div>
									<div class="col-sm-12" id="other-service-div" style="display: none;">
										<div class="form-group">
											<input type="text" class="form-control" name="other_service"
												id="other_service" placeholder="Please specify the service">
										</div>
									</div>

									<div class="col-sm-12">
										<div class="form-group">
											<div class="select-wrap">
												<div class="icon"><span class="ion-ios-arrow-down"></span></div>
												<select name="branches" id="branches" required="true"
													class="form-control">
													<option value="">Select Branch</option>
													<?php $query = mysqli_query($con, "select * from tblbranches");
													while ($row = mysqli_fetch_array($query)) { ?>
														<option value="<?php echo $row['Branch']; ?>">
															<?php echo $row['Branch']; ?></option>
													<?php } ?>
												</select>
											</div>
										</div>
									</div>
									<div class="col-sm-12">
										<div class="form-group">
											<input type="text" class="form-control appointment_date" placeholder="Date"
												name="adate" id='adate' required="true">
										</div>
									</div>
									<div class="col-sm-12">
										<div class="form-group">
											<select class="form-control" name="atime" id="atime" required>
												<option value="10:30">10:30 AM</option>
												<option value="11:00">11:00 AM</option>
												<option value="11:30">11:30 AM</option>
												<option value="12:00">12:00 PM</option>
												<option value="12:30">12:30 PM</option>
												<option value="13:00">1:00 PM</option>
												<option value="13:30">1:30 PM</option>
												<option value="14:00">2:00 PM</option>
												<option value="14:30">2:30 PM</option>
												<option value="15:00">3:00 PM</option>
												<option value="15:30">3:30 PM</option>
												<option value="16:00">4:00 PM</option>
												<option value="16:30">4:30 PM</option>
												<option value="17:00">5:00 PM</option>
												<option value="17:30">5:30 PM</option>
												<option value="18:00">6:00 PM</option>
											</select>
										</div>
									</div>

									<div class="col-sm-12">
										<div class="form-group">
											<input type="text" class="form-control" id="phone" name="phone"
												placeholder="Phone" required="true" maxlength="10" pattern="[0-9]+">
										</div>
									</div>
								</div>
								<div class="form-group" style="display: flex; gap: 10px;">
									<button type="submit" name="submit" value="" class="show btn btn-primary"
										onclick="openModal()">SHOW
										APPOINTMENT</button>
									<input type="submit" name="submit" value="Make an Appointment"
										class="btn btn-primary">
								</div>
								<span class="subheading">"Vi Vogue Online Salon Reservation is committed to protecting
									the privacy of our
									customers. <br> We collect and use your personal information in accordance with
									Republic Act No. 10173 or
									the <br> Data Privacy Act of 2012 and our privacy policy. By using our website to
									book appointments, <br> you
									consent to the collection and use of your personal information in accordance with
									this policy.<br> If you have
									any questions or concerns regarding our data privacy practices, please contact
									us."</span>
							</form>

						</div>
					</div>
				</div>
				<div class="one-third">
					<div class="img" style="background-image: url(images/n12.jpg);">

					</div>
					<div class="one-fifth">
						<div class="img" style="background-image: url(images/q3.jpg);">

						</div>
					</div>
				</div>
			</div>
	</section>

	<div id="myModal" class="modal">
		<div class="modal-content">
			<span class="close" onclick="closeModal()">&times;</span>
			<div class="container">
				<div class="row justify-content-center mb-5 pb-3">
					<div class="col-md-7 heading-section text-center ftco-animate">
						<span class="subheading">Appointment History</span>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 ftco-animate">
						<div class="appointment-history">
							<h3>Current Appointments</h3>
							<ul class="appointments-list">
								<?php
								// Array to store aggregated appointments
								$aggregatedAppointments = [];

								// Group appointments by date and time
								foreach ($appointments as $appointment) {
									$key = $appointment['AptDate'] . '_' . $appointment['AptTime'];
									if (!isset($aggregatedAppointments[$key])) {
										$aggregatedAppointments[$key] = [
											'AptDate' => $appointment['AptDate'],
											'AptTime' => $appointment['AptTime'],
											'Count' => 0
										];
									}
									$aggregatedAppointments[$key]['Count']++;
								}

								// Display aggregated appointments
								foreach ($aggregatedAppointments as $appointment) {
									?>
									<li>
										<div class="appointment-details">
											<div class="appointment-meta">
												<span
													class="date"><?php echo date('F j, Y', strtotime($appointment['AptDate'])); ?></span>
												<span
													class="time"><?php echo date('h:i A', strtotime($appointment['AptTime'])); ?></span>
											</div>
											<div class="progress-bar-container">
												<?php
												// Calculate progress
												$progress = ($appointment['Count'] / 10) * 100; // Number of slots per schedule
												$remainingSlots = 10 - $appointment['Count'];
												?>
												<div class="progress">
													<div class="progress-bar <?php echo ($progress >= 100) ? 'bg-danger' : 'bg-success'; ?>"
														role="progressbar" style="width: <?php echo $progress; ?>%;"
														aria-valuenow="<?php echo $progress; ?>" aria-valuemin="0"
														aria-valuemax="100"></div>
												</div>
												<div class="slots-left">
													Slots Left: <?php echo $remainingSlots; ?>
												</div>
											</div>
										</div>
									</li>
								<?php } ?>
							</ul>
							<button onclick="closeModal()" class="btn btn-primary">Close Modal</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	</div>
	</div>




	<!-- Loader -->
	<?php include_once ('includes/footer.php'); ?>
	<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="30px" height="30px">
			<circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
			<circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10"
				stroke="#F96D00" />
		</svg></div>

	<!-- JavaScript -->
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
	<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&sensor=false"></script>
	<script src="js/google-map.js"></script>
	<script src="js/main.js"></script>
	<script>
		$(document).ready(function () {
			var groupedAppointments = <?php echo json_encode(array_values($groupedAppointments)); ?>;
			var timeSlots = {};

			groupedAppointments.forEach(function (appointment) {
				var key = appointment['AptDate'] + '_' + appointment['AptTime'];
				timeSlots[key] = appointment['count'];
			});

			// Update progress bars
			$('.progress-bar').each(function () {
				var aptDate = $(this).data('date');
				var aptTime = $(this).data('time');
				var key = aptDate + '_' + aptTime;
				var percentage = (timeSlots[key] / 10) * 100; // Assuming max 10 slots per schedule
				$(this).css('width', percentage + '%');
				if (percentage >= 100) {
					$(this).addClass('red');
				}
			});

		});
		var modal = document.getElementById("myModal");

		// Get the button that opens the modal
		var btn = document.querySelector("button");

		// When the user clicks the button, open the modal 
		function openModal() {
			modal.style.display = "block";
		}

		// When the user clicks on <span> (x), close the modal
		function closeModal() {
			modal.style.display = "none";
		}
		function toggleOtherInput() {
			var select = document.getElementById('services');
			var otherServiceDiv = document.getElementById('other-service-div');
			if (select.value === 'Other') {
				otherServiceDiv.style.display = 'block';
				document.getElementById('other_service').required = true;
			} else {
				otherServiceDiv.style.display = 'none';
				document.getElementById('other_service').required = false;
			}
		}

	</script>
</body>

</html>