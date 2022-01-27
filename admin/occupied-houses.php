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
                            <a class="nav-link waves-effect" href="tenants.php">Tenants</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link waves-effect" href="houses.php">Houses</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link waves-effect" href="maintenance.php">Maintenance</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link waves-effect" href="inspection.php">Inspection</a>
                        </li>
                    </ul>

                    <!-- Right -->
                    <ul class="navbar-nav nav-flex-icons">
                        <li class="nav-item">
                            <a href="../logout.php" class="nav-link border border-light rounded waves-effect">
                                <b> <strong>Logout</strong> </b>
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
                <a href="occupied-houses.php" class="list-group-item list-group-item-action waves-effect">
                    <i class="fa fa-table mr-3"></i>Occupied Houses</a>
                <a href="vacant-houses.php" class="list-group-item list-group-item-action waves-effect">
                    <i class="fa fa-map mr-3"></i>All Vacant Houses</a>
                <a href="deposit-payments.php" class="list-group-item list-group-item-action waves-effect">
                    <i class="fa fa-money mr-3"></i>Deposit Payments</a>
                <a href="rent-collections.php" class="list-group-item list-group-item-action waves-effect">
                    <i class="fa fa-money mr-3"></i>Rent Collections</a>
                <a href="landlords.php" class="list-group-item list-group-item-action waves-effect">
                    <i class="fa fa-money mr-3"></i>Landlords</a>  
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
                        <a href="occupied-houses.php">Admin</a>
                        <span>/</span>
                        <span>Occupied Houses<pan>
                    </h4>

                </div>

            </div>
            <!-- Heading -->

            <!--My code goes here,,,My code goes here-->
            <div id="txtHint"><b>The occupied houses will be displayed here...</b>
            </div>

            <?php
//fetching the occupied houses
include '../includes/config.php';
$sql="SELECT houses.house_type,houses.amount,houses.status,houses.deposit_payment,houses.detail,houses.image,houses.house_number,houses.house_position,building.building_name,destination.destination_name FROM  ((`houses` inner join `building` ON houses.building_id = building.building_id)
inner join `destination` ON houses.destination_id = destination.destination_id  and houses.status='occupied' and houses.deposit_payment='complete')";
$result=mysqli_query($db_conn,$sql);
if($result) {
if(mysqli_num_rows($result)>0) {
echo "<table class=\"table table-hover table-responsive\">";
echo "<thead class=\"thead-dark\">";
echo "<tr>";
echo  "<th> House Type </th>";
echo  "<th> Amount </th>";
echo  "<th> Status </th>";
echo  "<th> Deposit Payment </th>";
echo  "<th> Detail </th>";
echo  "<th> Image </th>";
echo  "<th> Building Name </th>";
echo  "<th> House Location </th>";
echo  "<th> House Number </th>";
echo  "<th> House Position </th>";
echo "</tr>";
echo "</thead>";
while($row=mysqli_fetch_array($result)) {
echo "<tbody>";
echo "<tr>";
echo "<td>".$row['house_type']."</td>";
echo "<td>".$row['amount']."</td>";
echo "<td>".$row['status']."</td>";
echo "<td>".$row['deposit_payment']."</td>";
echo "<td>".$row['detail']."</td>";
echo "<td>".'<img style=\"width:50px;height:80px;\" src="'.$row['image'].'">'."</td>";
echo "<td>".$row['building_name']."</td>";
echo "<td>".$row['destination_name']."</td>";
echo "<td>".$row['house_number']."</td>";
echo "<td>".$row['house_position']."</td>";
echo "</tr>";
echo "</tbody>";
}//closing the while loop
echo "</table>";
} //closing the if statement.
else {
echo "<h4 style=\"color:black;margin-left:50px;\">"."No record matching the query exists in the database!!"."</h4>";
}//closing the else statement.
}//closing the if result set.
mysqli_close($db_conn);
?>


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
    <!-- JQuery -->
    <script type="text/javascript" src="../js/jquery-3.3.1.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="../js/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="../js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="../js/mdb.min.js"></script>
    <!--javascript validation -->
    <script type="text/javascript" src="../js/custom-js/registration.js"></script>

    
    

</body>

</html>