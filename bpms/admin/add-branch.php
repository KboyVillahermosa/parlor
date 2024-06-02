<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['bpmsaid']) == 0) {
    header('location:logout.php');
} else {

    if (isset($_POST['submit'])) {
        $branch = $_POST['branch'];
        $location = $_POST['location'];

        $query = mysqli_query($con, "INSERT INTO tblbranches (Branch, Location) VALUES ('$branch', '$location')");
        if ($query) {
            echo "<script>alert('Branch has been added.');</script>";
            echo "<script>window.location.href = 'add-branch.php'</script>";
            $msg = "";
        } else {
            echo "<script>alert('Something Went Wrong. Please try again.');</script>";
        }
    }
}
?>
<!DOCTYPE HTML>
<html>

<head>
    <title>Add Branch</title>
    <script type="application/x-javascript">
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
    <!-- Custom CSS -->
    <link href="css/style.css" rel='stylesheet' type='text/css' />
    <!-- font CSS -->
    <!-- font-awesome icons -->
    <link href="css/font-awesome.css" rel="stylesheet">
    <!-- //font-awesome icons -->
    <!-- js-->
    <script src="js/jquery-1.11.1.min.js"></script>
    <script src="js/modernizr.custom.js"></script>
    <!--webfonts-->
    <link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>
    <!--//webfonts-->
    <!--animate-->
    <link href="css/animate.css" rel="stylesheet" type="text/css" media="all">
    <script src="js/wow.min.js"></script>
    <script>
        new WOW().init();
    </script>
    <!--//end-animate-->
    <!-- Metis Menu -->
    <script src="js/metisMenu.min.js"></script>
    <script src="js/custom.js"></script>
    <link href="css/custom.css" rel="stylesheet">
    <!--//Metis Menu -->
</head>

<body class="cbp-spmenu-push">
    <div class="main-content">
        <!--left-fixed -navigation-->
        <?php include_once('includes/sidebar.php'); ?>
        <!--left-fixed -navigation-->
        <!-- header-starts -->
        <?php include_once('includes/header.php'); ?>
        <!-- //header-ends -->
        <!-- main content start-->
        <div id="page-wrapper">
            <div class="main-page">
                <div class="forms">
                    <h3 class="title1">Add Branches</h3>
                    <div class="form-grids row widget-shadow" data-example-id="basic-forms">
                        <div class="form-title">
                            <h4>Branch:</h4>
                        </div>
                        <div class="form-body">
                            <form method="post">
                                <p style="font-size:16px; color:red" align="center"> <?php if ($msg) {
                                                                                                echo $msg;
                                                                                            }  ?> </p>


                                <div class="form-group">
                                    <label for="exampleInputEmail1">Branch Name</label>
                                    <input type="text" class="form-control" id="branch" name="branch" placeholder="Branch" value="" required="true">
                                    <label for="exampleInputPassword1">Location</label>
                                    <input type="text" id="location" name="location" class="form-control" placeholder="type location" value="" required="true">
                                </div>


                                <button type="submit" name="submit" class="btn btn-default">Add</button>
                            </form>
                        </div>

                    </div>

                    <?php include_once('includes/footer.php'); ?>
                </div>
                <!-- Classie -->
                <script src="js/classie.js"></script>
                <script>
                    var menuLeft = document.getElementById('cbp-spmenu-s1'),
                        showLeftPush = document.getElementById('showLeftPush'),
                        body = document.body;

                    showLeftPush.onclick = function() {
                        classie.toggle(this, 'active');
                        classie.toggle(body, 'cbp-spmenu-push-toright');
                        classie.toggle(menuLeft, 'cbp-spmenu-open');
                        disableOther('showLeftPush');
                    };

                    function disableOther(button) {
                        if (button !== 'showLeftPush') {
                            classie.toggle(showLeftPush, 'disabled');
                        }
                    }
                </script>
                <!--scrolling js-->
                <script src="js/jquery.nicescroll.js"></script>
                <script src="js/scripts.js"></script>
                <!--//scrolling js-->
                <!-- Bootstrap Core JavaScript -->
                <script src="js/bootstrap.js"></script>
</body>

</html>
