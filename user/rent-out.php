<?php
session_start();
//setting variables to zero
$username=$houseid=$housetype=$amount=$status=$paystatus=$buildingid=$detail=$destinationid=$housenumber=$houseposition = " ";
include '../includes/config.php';

if(isset($_GET['house_id'])  && is_numeric($_GET['house_id'])) {
    $house_id=$_GET['house_id'];
    $sql="Select* from houses where house_id='$house_id'";
    $result=mysqli_query($db_conn,$sql);
    $row=mysqli_fetch_array($result);
  }


  // Inserting the booking details into the booking table
  if(isset($_POST['edit'])){
    $houseid=mysqli_real_escape_string($db_conn,$_POST['houseid']);
    $housetype=mysqli_real_escape_string($db_conn,$_POST['housetype']);
    $amount=mysqli_real_escape_string($db_conn,$_POST['amount']);
    $status=mysqli_real_escape_string($db_conn,$_POST['status']);
    $paystatus=mysqli_real_escape_string($db_conn,$_POST['paystatus']);
    $buildingid=mysqli_real_escape_string($db_conn,$_POST['buildingid']);
    $detail=mysqli_real_escape_string($db_conn,$_POST['detail']);
    $destinationid=mysqli_real_escape_string($db_conn,$_POST['destinationid']);
    $housenumber=mysqli_real_escape_string($db_conn,$_POST['housenumber']);
    $houseposition=mysqli_real_escape_string($db_conn,$_POST['houseposition']);


$query_name="SELECT username from registration where username='".$_SESSION["username"]."' ";
$result_name=mysqli_query($db_conn,$query_name);
if($result_name) {
if(mysqli_num_rows($result_name)>0) {
$row=mysqli_fetch_array($result_name);
$username=$row['username'];
}
}

    //sanitizing user data
    $username = filter_var($username, FILTER_SANITIZE_STRING);
    
    
    // Declaring the session variables...
    $_SESSION["housetype"] =$housetype;
    $_SESSION["amount"] = $amount;
    $_SESSION["status"] =$status;
    $_SESSION["deposit"] =$paystatus;
    $_SESSION["detail"] =$detail;
    $_SESSION["housenumber"] =$housenumber;
    $_SESSION["houseposition"] = $houseposition;


    
        $payment_check="SELECT booking.username,houses.deposit_payment from booking inner join houses on booking.house_id=houses.house_id and username='".$_SESSION["username"]."' and houses.deposit_payment='pending' ";
        $result_payment = mysqli_query($db_conn, $payment_check);
        if($result_payment){ 
        if(mysqli_num_rows($result_payment)>= 1 ){ //statement that checks payment status
            echo "<script> alert('You have to clear the deposit of the previously rented house')</script>";
            echo "<script> window.location.href=\"user-booked-houses.php\"; </script>";
        }

    else { //opening else statement checking presence of a pending house payment

        // Query to insert into the booking table
    $sql="insert into booking (username,house_id,building_id,destination_id) values ('$username','$houseid','$buildingid','$destinationid')";
    $result=mysqli_query($db_conn,$sql);
    if($result){ // opening booking if statement... 

    // Query to update the status column to occupied
    $sql="update houses set status='Occupied' where house_id='$houseid' ";
    $result=mysqli_query($db_conn,$sql);
    if($result){
        echo "<script> window.location.href=\"post-renting.php\"; </script>";
    }


    } // closing booking if statement...
    else { // opening the booking else statement
    echo "<script> alert('Error encountered while saving the booking data!!')</script>".mysqli_error();
    } // closing the booking else statement


    } //closing else statement checking presence of a pending house payment
}

} // closing the main if statement

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
                            <a class="nav-link waves-effect" href="index.php">Home
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
                            <a href="../logout.php" class="nav-link border border-light rounded waves-effect">
                                <b> Logout </b>
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
                        <span>Renting</span>
                    </h4>

                    <!--<form class="d-flex justify-content-center">
                        <input type="search" placeholder="Type your query" aria-label="Search" class="form-control">
                        <button class="btn btn-primary btn-sm my-0 p" type="submit">
                            <i class="fa fa-search"></i>
                        </button>
                    </form>-->

                </div>

            </div>
            <!-- Heading -->



            <!--My code goes here,,,My code goes here-->

    <form name="myForm" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" onsubmit="return(validate());">

<p class="h4 text-center mb-4">Rent a House</p>

<!-- Material input house id -->
<strong> <label for="houseid">House ID</label> </strong>
<input id="houseid" type="number" name="houseid" value="<?php echo $row[0]; ?>" class="form-control" readonly>
<br />

<!--Material input house type-->
<strong> <label for="housetype">House Type</label> </strong>
<input id="housetype" type="text" name="housetype" value="<?php echo $row[1]; ?>" class="form-control" readonly>
<br />

<!-- Material input amount-->
<strong> <label for="amount">Monthly Rent</label> </strong>
<input id="amount" type="number" name="amount" value="<?php echo $row[2]; ?>" class="form-control" readonly>
<br />

<!-- Material input status-->
<strong> <label for="status">House Status</label> </strong>
<input id="status" type="text" name="status" value="<?php echo $row[3]; ?>" class="form-control" readonly>
<br />

<!-- Material input payment status-->
<strong> <label for="paystatus">Deposit Payment</label> </strong>
<input id="paystatus" type="text" name="paystatus" value="<?php echo $row[10]; ?>" class="form-control" readonly>
<br />

<!-- Material input building id -->
<strong> <label for="buildingid">Building ID</label> </strong>
<input id="buildingid" type="text" name="buildingid" value="<?php echo $row[4]; ?>" class="form-control" readonly>
<br />

<!-- Material input detail-->
<strong> <label for="detail">House Detail</label> </strong>
<input id="detail" type="text" name="detail" value="<?php echo $row[5]; ?>" class="form-control" readonly>
<br />

<!-- Material input destination id -->
<strong> <label for="destinationid">Destination ID</label> </strong>
<input id="destinationid" type="number" name="destinationid" value="<?php echo $row[7]; ?>" class="form-control" readonly>
<br />

<!-- Material input house number -->
<strong> <label for="housenumber">House Number</label> </strong>
<input id="housenumber" type="number" name="housenumber" value="<?php echo $row[8]; ?>" class="form-control" readonly>
<br />

<!-- Material input house position-->
<strong> <label for="houseposition">House Position</label> </strong>
<input id="houseposition" type="text" name="houseposition" value="<?php echo $row[9]; ?>" class="form-control" readonly>
<br />

<!--The submit button-->
<div class="text-center mt-4">
    <button class="btn btn-default" type="submit" name="edit" >Submit</button>
</div>

</form>
            
            <!--My code goes here,,My code goes here-->
    </main>
    <!--Main layout-->



    <!--Footer-->
    <footer class="page-footer text-center font-small primary-color-dark darken-2 mt-4 wow fadeIn">

        <hr class="my-4">

        <!-- Social icons -->
        <div class="pb-4">
            <a href="https://www.facebook.com" target="_blank">
                <i class="fa fa-facebook mr-3"></i>
            </a>

            <a href="https://twitter.com" target="_blank">
                <i class="fa fa-twitter mr-3"></i>
            </a>

            <a href="https://www.youtube.com" target="_blank">
                <i class="fa fa-youtube mr-3"></i>
            </a>

            <a href="https://github.com/solomonaleka" target="_blank">
                <i class="fa fa-github mr-3"></i>
            </a>

        </div>
        <!-- Social icons -->

        <!--Copyright-->
        <div class="footer-copyright py-3">
            © 2018 Copyright:
            <a href="#" target="_blank"> Apex Computer Solutions </a>
        </div>
        <!--/.Copyright-->

    </footer>
    <!--/Footer-->

    <!-- SCRIPTS -->
    <!--Horizontal table scrolling-->
    <script type="text/javascript">
    $(document).ready(function () {
  $('#dtHorizontalExample').DataTable({
    "scrollX": true,
    "scrollX": 200,
  });
  $('.dataTables_length').addClass('bs-select');
});
    </script>

    <!-- JQuery -->
    <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="js/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="js/mdb.min.js"></script>

    
    

</body>
</html>