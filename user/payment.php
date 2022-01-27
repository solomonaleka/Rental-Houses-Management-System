<?php
session_start();

include '../includes/config.php';
//$firstname=$secondname=$emailaddress=$phonenumber=$username=$regid = " ";

if(isset($_GET['booking_id']) && is_numeric($_GET['booking_id'])) {
  $bookingid=$_GET['booking_id'];
  $sql="Select booking.booking_id,houses.house_id,houses.amount from booking inner join houses on booking.house_id=houses.house_id and booking_id='$bookingid'";
  $result=mysqli_query($db_conn,$sql);
  $row=mysqli_fetch_array($result);
}


if(isset($_POST['pay'])) {

    $bookingid=mysqli_real_escape_string($db_conn,$_POST['bookingid']);
    $houseid=mysqli_real_escape_string($db_conn,$_POST['houseid']);
    $amount=mysqli_real_escape_string($db_conn,$_POST['amount']);
    $paid=mysqli_real_escape_string($db_conn,$_POST['paid']);


$query_name="SELECT firstname,secondname,phonenumber from registration where username='".$_SESSION["username"]."' ";
$result_name=mysqli_query($db_conn,$query_name);
if($result_name) {
if(mysqli_num_rows($result_name)>0) {
$row=mysqli_fetch_array($result_name);
$firstname=$row['firstname'];
$secondname=$row['secondname'];
$phonenumber=$row['phonenumber'];
}
}

$query_build="SELECT building.building_name,houses.house_type from building inner join houses on building.building_id=houses.building_id and houses.house_id='$houseid' ";
$result_build=mysqli_query($db_conn,$query_build);
if($result_build) {
if(mysqli_num_rows($result_build)>0) {
$row=mysqli_fetch_array($result_build);
$buildingname=$row['building_name'];
}
}




$query_build="SELECT* FROM  `payment` where booking_id=$bookingid  and arrears > 0 ";
$result_build=mysqli_query($db_conn,$query_build);
if($result_build) {
if(mysqli_num_rows($result_build)>0) {
$row=mysqli_fetch_array($result_build);
$initial_payment=$row['paid'];
$final_payment=$initial_payment+$paid;

if($final_payment<$amount) {
    $new_arrears=$amount-$final_payment;
    $sql="update houses set deposit_payment='Incomplete' where house_id='$houseid' ";
    $result=mysqli_query($db_conn,$sql);
}
else {
    $new_over_payment=$final_payment-$amount;
    $new_arrears=0;
    $sql="update houses set deposit_payment='complete' where house_id='$houseid' ";
    $result=mysqli_query($db_conn,$sql);

    $sql="insert into tenant (firstname,secondname,phonenumber,house_id,building_name) values ('$firstname','$secondname','$phonenumber','$houseid','$buildingname')";
    $result=mysqli_query($db_conn,$sql);
}


$sql="update payment set booking_id='$bookingid',amount='$amount',paid='$final_payment',house_id='$houseid',firstname='$firstname',secondname='$secondname',arrears='$new_arrears' where house_id='$houseid' ";
    $result=mysqli_query($db_conn,$sql);
    if($result){ //payment if statement
        echo "<script> alert('Deposit payment made successfully')</script>";
        echo "<script> window.location.href=\"user-payment.php\"; </script>";
    } else{ //payment else statement
    echo "<script> alert('Unable to make the Deposit payment')</script>";
    echo "<script> window.location.href=\"user-payment.php\"; </script>";
    }


}

else {

//obtaining arrears
if($paid<$amount) {
    $arrears=$amount-$paid;
    $sql="update houses set deposit_payment='Incomplete' where house_id='$houseid' ";
    $result=mysqli_query($db_conn,$sql);
}

//obtaining overpayment
else {
    $over_payment=$paid-$amount;
    $arrears=0;
    $sql="update houses set deposit_payment='Complete' where house_id='$houseid' ";
    $result=mysqli_query($db_conn,$sql);

    $sql="insert into tenant (firstname,secondname,phonenumber,house_id,building_name) values ('$firstname','$secondname','$phonenumber','$houseid','$buildingname')";
    $result=mysqli_query($db_conn,$sql);
    
}


    $sql="insert into payment (booking_id,amount,paid,house_id,firstname,secondname,arrears) values ('$bookingid','$amount','$paid','$houseid','$firstname','$secondname','$arrears')";
    $result=mysqli_query($db_conn,$sql);
    if($result){ //payment if statement
        echo "<script> alert('Deposit payment made successfully')</script>";
        echo "<script> window.location.href=\"user-payment.php\"; </script>";
    } else{ //payment else statement
    echo "<script> alert('Unable to make the Deposit payment')</script>";
    echo "<script> window.location.href=\"user-payment.php\"; </script>";
    }
}

}

    
} // closing the main if statement 
mysqli_close($db_conn);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Material Design Bootstrap</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="../css/mdb.min.css" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="../css/style.min.css" rel="stylesheet">
    <!-- Location to the custom javascript validation code -->
    <script language="javascript" type="text/javascript" src="../js/custom-js/deposit.js"></script>
</head>

<body class="grey lighten-3">

    <!--Main Navigation-->
    <header>

        <!-- Navbar -->
        <nav class="navbar fixed-top navbar-expand-lg navbar-light white scrolling-navbar">
            <div class="container-fluid">

                <!-- Brand -->
                <a class="navbar-brand waves-effect" target="_blank">
                    <strong class="black-text">RENTAL HOUSE MANAGEMENT SYSTEM</strong>
                </a>

                <!-- Collapse -->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Links -->
                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <!-- Left -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link waves-effect" href="../user/index.php">Home
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link waves-effect" href="user-houses.php">Houses</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link waves-effect" href="#">Notices</a>
                        </li>
                    </ul>

                    <!-- Right -->
                    <ul class="navbar-nav nav-flex-icons">
                        <li class="nav-item">
                            <a href="../logout.php" class="nav-link border border-deep rounded waves-effect">
                                <b><strong>Logout</strong></b>
                            </a>
                        </li>
                    </ul>

                </div>

            </div>
        </nav>
        <!-- Navbar -->

        <!--<!-- Sidebar -->
        <div class="sidebar-fixed position-fixed">

            <?php
            include 'logo.php';
            ?>

            <div class="list-group list-group-flush">
                <a href="#" class="list-group-item active waves-effect">
                    <i class="fa fa-pie-chart mr-3"></i>Settings
                </a>
                <a href="../user/user-booked-houses.php" class="list-group-item list-group-item-action waves-effect">
                    <i class="fa fa-building mr-3"></i>My Houses</a>
                <a href="../user/user-payment" class="list-group-item list-group-item-action waves-effect">
                    <i class="fa fa-building mr-3"></i>Deposit Payment</a>
                <a href="#" class="list-group-item list-group-item-action waves-effect">
                    <i class="fa fa-bookmark mr-3"></i>File Complaint</a>
                <a href="#" class="list-group-item list-group-item-action waves-effect">
                    <i class="fa fa-map mr-3"></i>Lease Management</a>
            </div>

        </div>

    </header>
    <!--Main Navigation-->

    <!--Main layout-->
    <main class="pt-5 mx-lg-5">
        <div class="container-fluid mt-5">

            <!-- Heading -->
            <div class="card mb-4 wow fadeIn">

                <!--Card content-->
                <div class="card-body d-sm-flex justify-content-between">

                    <h4 class="mb-2 mb-sm-0 pt-1">
                        <a href="index.html" target="_blank">User</a>
                        <span>/</span>
                        <span>Make Payment</span>
                    </h4>

                </div>

            </div>
            <!-- Heading -->



<!--My code goes here,,,My code goes here-->

<!-- Material form registration -->
<form name="myForm" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" onsubmit="return(validate());">
    
    <!-- Material input booking id -->
    <div class="form-group">
        <label for="bookingid">Booking ID</label>
        <input id="bookingid" type="number" name="bookingid" value="<?php echo $row[0]; ?>" class="form-control" readonly>
    </div>

    <!-- Material input house id -->
    <div class="form-group">
        <label for="houseid">House ID</label>
        <input id="houseid" type="number" name="houseid" value="<?php echo $row[1]; ?>" class="form-control" readonly>
    </div>

    <!-- Material input amount -->
    <div class="form-group">
        <label for="amount">Rent Amount</label>
        <input id="amount" type="number" name="amount" value="<?php echo $row[2]; ?>" class="form-control" readonly>
    </div>

    <!-- Material input paid -->
    <div class="form-group">
        <label for="paid">Amount Paying</label>
        <input id="paid" type="number" name="paid" value=" " class="form-control">
    </div>

    
    <div class="text-center mt-4">
        <button class="btn btn-default" type="submit" name="pay">Pay</button>
    </div>
</form>

<!--My code goes here,,,My code goes here-->


    </main>
    <!--Main layout-->

    <!--Footer-->
    <footer class="page-footer text-center font-small primary-color-dark darken-2 mt-4 wow fadeIn">

        <!--Copyright-->
        <div class="footer-copyright py-3">
            © 2018 Copyright:
            <a href="#" target="_blank"> Apex Computer Solutions </a>
        </div>
        <!--/.Copyright-->

    </footer>
    <!--/Footer-->

    <!-- SCRIPTS -->
    <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="js/popper.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/mdb.min.js"></script>

</body>

</html>