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
                            <a class="nav-link waves-effect" href="../user/index.php">Home
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link waves-effect" href="../admin/user-houses.php">Houses</a>
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
                <a href="../admin/user-booked-houses" class="list-group-item list-group-item-action waves-effect">
                    <i class="fa fa-building mr-3"></i>My Houses</a>
                <a href="#" class="list-group-item list-group-item-action waves-effect">
                    <i class="fa fa-bookmark mr-3"></i>File Complaint</a>
                <a href="#" class="list-group-item list-group-item-action waves-effect">
                    <i class="fa fa-map mr-3"></i>Lease Management</a>
                <a href="#" class="list-group-item list-group-item-action waves-effect">
                    <i class="fa fa-envelope mr-3"></i>Notices</a>
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
                        <span>Rented House</span>
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
            <!--Displaying the user rented house-->

            <?php
include '../includes/config.php';

$sql="SELECT booking.username,houses.house_type,houses.amount,houses.status,houses.detail,houses.image,building.building_name,destination.destination_name FROM  (((`booking` inner join `houses` ON booking.house_id = houses.house_id and username='".$_SESSION["username"]."') inner join `building` ON booking.building_id = building.building_id) inner join `destination` ON booking.destination_id = destination.destination_id and username='".$_SESSION["username"]."')";
$result=mysqli_query($db_conn,$sql);
if($result) {
if(mysqli_num_rows($result)>0) {
echo "<table class=\"table table-hover table-responsive\">";
echo "<thead>";
echo "</th colspan=\"2\">"."Booking Details for ".strtoupper($_SESSION["username"])."</th>";
echo "</thead>";
while($row=mysqli_fetch_array($result)) {
echo "<tbody>";
echo "<tr>";
echo "<td>"."Username"."</td>";
echo "<td>".$row['username']."</td>";
echo "</tr>";
echo "<tr>";
echo "<td>"."Type of House"."</td>";
echo "<td>".$row['house_type']."</td>";
echo "</tr>";
echo "<tr>";
echo "<td>"."Monthly Rent"."</td>";
echo "<td>".$row['amount']."</td>";
echo "</tr>";
echo "<tr>";
echo "<td>"."State of House"."</td>";
echo "<td>".$row['status']."</td>";
echo "</tr>";
echo "<tr>";
echo "<td>"."House Description"."</td>";
echo "<td>".$row['detail']."</td>";
echo "</tr>";
echo "<tr>";
echo "<td>"."House Image"."</td>";
echo "<td>".'<img style=\"width:300px;height:80px;\" src="'.$row['image'].'">'."</td>";
echo "</tr>";
echo "<tr>";
echo "<td>"."Building Name"."</td>";
echo "<td>".$row['building_name']."</td>";
echo "</tr>";
echo "<tr>";
echo "<td>"."Building Location"."</td>";
echo "<td>".$row['destination_name']."</td>";
echo "</tr>";
echo "</tbody>";
}
echo "</table>";
//closing result set.
mysqli_free_result($result);
} else {
echo "<h4 style=\"color:black;margin-left:50px;\">"."No record matching the query exists in the database!!"."</h4>".mysqli_connect_error();
}

}
mysqli_close($db_conn);
?> 

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