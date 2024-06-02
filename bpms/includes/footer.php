 <?php
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}

include('includes/dbconnection.php');
?>
 <footer class="ftco-footer ftco-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2 logo">Vi Vogue</h2>
              <?php

$ret=mysqli_query($con,"select * from tblpage where PageType='aboutus' ");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
              <p><a href="about.php">Learn More...</a></p><?php } ?>
            
            </div>
          </div>
         
          <div class="col-md" style="padding-left: 150px">
             <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Links</h2>
              <ul class="list-unstyled">
                <li><a href="index.php" class="py-2 d-block">Home</a></li>
                <li><a href="about.php" class="py-2 d-block">About</a></li>
                <li><a href="services.php" class="py-2 d-block">Services</a></li>
               
                <li><a href="admin/index.php" class="py-2 d-block">Admin</a></li>
                <li><a href="contact.php" class="py-2 d-block">Contact</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
            	<h2 class="ftco-heading-2">Have a Questions?</h2>
            	<div class="block-23 mb-3">
                <?php

$ret=mysqli_query($con,"select * from tblpage where PageType='contactus' ");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
	              <ul>
	                <li><span class="icon icon-map-marker"></span><span class="text"><?php  echo $row['PageDescription'];?></span></li>
	                <li><a href="#"><span class="icon icon-phone"></span><span class="text">+<?php  echo $row['MobileNumber'];?></span></a></li>
	                <li><a href="https://www.facebook.com/profile.php?id=61557668187380"><span class="icon icon-envelope"></span><span class="text"><?php  echo $row['Email'];?></span></a></li>
	              </ul>
	            </div>
               <?php } ?>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">
<br>
<br>

            <p>
  2024 &copy; Vi Vogue online reservation Beauty Salon  </p>
          </div>
        </div>
      </div>
    </footer>