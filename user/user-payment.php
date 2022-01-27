<?php
session_start();
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
                <a href="user-booked-houses.php" class="list-group-item list-group-item-action waves-effect">
                    <i class="fa fa-building mr-3"></i>My Houses</a>
                <a href="user-payment" class="list-group-item list-group-item-action waves-effect">
                    <i class="fa fa-building mr-3"></i>Deposit Payment</a>
                <a href="file-complaint.php" class="list-group-item list-group-item-action waves-effect">
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
                    <a href="user-payment.php">
                        <?php
                        echo strtoupper($_SESSION["username"]);
                        ?>
                        </a>
                        <span>/</span>
                        <span>Rented Houses</span>
                    </h4>


                </div>

            </div>
            <!-- Heading -->



            <!--My code goes here,,,My code goes here-->
            <?php
include '../includes/config.php';

$sql="SELECT booking.booking_id,houses.house_id,houses.house_type,houses.amount,houses.status,houses.deposit_payment,houses.detail,houses.image,houses.house_number,houses.house_position,building.building_name,destination.destination_name FROM  (((`booking` inner join `houses` ON booking.house_id = houses.house_id) inner join `building` ON booking.building_id = building.building_id) inner join `destination` ON booking.destination_id = destination.destination_id and booking.username='".$_SESSION["username"]."' and houses.status='occupied' and houses.deposit_payment!='complete' )";
$result=mysqli_query($db_conn,$sql);
if($result) {
if(mysqli_num_rows($result)>0) {        
// opening the result set
echo "<table class=\"table table-hover table-responsive\">";
echo "<thead class=\"thead-dark\">";
echo "</th colspan=\"2\">"."Booking Details for ".strtoupper($_SESSION["username"])."</th>";
echo "<tr>";
echo  "<th> Booking ID </th>";
echo  "<th> House ID </th>";
echo  "<th> House Type </th>";
echo  "<th> Deposit Amount </th>";
echo  "<th> House Status </th>";
echo  "<th> Deposit Payment </th>";
echo  "<th> Detail </th>";
echo  "<th> House Image </th>";
echo  "<th> Building Name </th>";
echo  "<th> Building Location </th>";
echo  "<th> House Number </th>";
echo  "<th> House Position </th>";
echo  "<th> Action </th>";
echo "</tr>";
echo "</thead>";
while($row=mysqli_fetch_array($result)) {
echo "<tbody>";
echo "<tr>";
echo "<td>".$row['booking_id']."</td>";
echo "<td>".$row['house_id']."</td>";
echo "<td>".$row['house_type']."</td>";
echo "<td>".$row['amount']."</td>";
echo "<td>".$row['status']."</td>";
echo "<td>".$row['deposit_payment']."</td>";
echo "<td>".$row['detail']."</td>";
echo "<td>".'<img style=\"width:300px;height:80px;\" src="'."../admin/".$row['image'].'">'."</td>";
echo "<td>".$row['building_name']."</td>";
echo "<td>".$row['destination_name']."</td>";
echo "<td>".$row['house_number']."</td>";
echo "<td>".$row['house_position']."</td>";
echo '<td><a href="payment.php?booking_id='.$row['booking_id'].'"> <b> PAY DEPOSIT </b> </a> </td>';
echo "</tr>";
echo "</tbody>";
}
echo "</table>";
//closing the result set.


mysqli_free_result($result);
} else {
    echo "<h4 style=\"color:blue;margin-left:50px;\">"."Ensure you have rented out a house"."</h4>".mysqli_connect_error();
}

}


$sql="SELECT payment.arrears,booking.username from `payment` inner join booking on payment.booking_id=booking.booking_id and booking.username='".$_SESSION["username"]."' ";
$result=mysqli_query($db_conn,$sql);
if($result) {
if(mysqli_num_rows($result)>0) {        
// opening the result set
while($row=mysqli_fetch_array($result)) {
    if($row['arrears']>0) {
        echo "<h2> <strong> You have to clear the remaining : ".$row['arrears']."</strong> </h2>";
    }
}
//closing the result set.


mysqli_free_result($result);
} else {
    echo "<h2 style=\"color:black;margin-left:150px;\"> <strong> You currently have no arrears !!</strong> </h2>";
}

}
mysqli_close($db_conn);
?> 

    <!--My code goes here,,My code goes here-->
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