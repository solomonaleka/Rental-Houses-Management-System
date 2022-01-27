<?php
//starting the session
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
                        <a href="index.php">User</a>
                        <span>/</span>
                        <span>Home</span>
                    </h4>

                </div>

            </div>
            <!-- Heading -->



            <!--My code goes here,,,My code goes here-->
            <!--Displaying the user profile-->
            <?php
            echo strtoupper($_SESSION["username"])." has logged in!!"."<br /><br />";




include '../includes/config.php';
$sql="SELECT* FROM  `registration` where username='".$_SESSION["username"]."' ";
$result=mysqli_query($db_conn,$sql);
if($result) {
if(mysqli_num_rows($result)>0) {
echo "<table class=\"table table-hover table-responsive\">";
echo "<thead class=\"thead-dark\">";
echo "<tr>";
echo  "<th> User ID </th>";
echo  "<th> First Name </th>";
echo  "<th> Second Name </th>";
echo  "<th> Email Address </th>";
echo  "<th> Phone Number </th>";
echo  "<th> Username </th>";
echo  "<th> User Role </th>";
echo  "<th> Action </th>";
echo "</tr>";
echo "</thead>";
while($row=mysqli_fetch_array($result)) {
echo "<tbody>";
echo "<tr>";
echo "<td>".$row['regid']."</td>";
echo "<td>".$row['firstname']."</td>";
echo "<td>".$row['secondname']."</td>";
echo "<td>".$row['emailaddress']."</td>";
echo "<td>".$row['phonenumber']."</td>";
echo "<td>".$row['username']."</td>";
echo "<td>".$row['userrole']."</td>";
echo '<td><a href="edit-user.php?regid='.$row['regid'].'"> <b> <img src="../img/editIcon.png" height="30" width="30" alt="editIcon" style="margin-left:20px;" /> </b> </a> </td>';
echo "</tr>";
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