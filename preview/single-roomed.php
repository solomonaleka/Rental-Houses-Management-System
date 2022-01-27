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
                            <a class="nav-link waves-effect" href="../index.php">Home
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link waves-effect" href="../about-us.php">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link waves-effect" href="../contact-us.php"> Contact Us</a>
                        </li>
                    </ul>


                    <!-- Right -->
                    <ul class="navbar-nav nav-flex-icons">
                        <li class="nav-item">
                        <a href="../login.php" class="nav-link border border-light rounded waves-effect">
                                <b> <strong>Login</strong> </b>
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
                <a href="single-roomed.php" class="list-group-item list-group-item-action waves-effect">
                    <i class="fa fa-institution mr-3">Single Roomed Houses</i></a>
                <a href="double-roomed" class="list-group-item list-group-item-action waves-effect">
                    <i class="fa fa-institution mr-3">Double Roomed Houses</i></a>
                <a href="apartment.php" class="list-group-item list-group-item-action waves-effect">
                    <i class="fa fa-institution mr-3">Apartments/Flats</i></a>
                <a href="detached.php" class="list-group-item list-group-item-action waves-effect">
                    <i class="fa fa-institution mr-3">Detached Houses</i></a>
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
                        <a href="single-roomed.php">Home Page</a>
                        <span>/</span>
                        <span>Single Roomed Houses</span>
                    </h4>

                </div>

            </div>
            <!-- Heading -->



        <!--my code goes here my code goes here-->

        <!-- Grid row -->
<div class="row">


        <!--PHP code-->
        <?php
include '../includes/config.php';
$sql="SELECT houses.house_type,houses.amount,houses.status,houses.detail,houses.image,building.building_name,destination.destination_name FROM  ((`houses` inner join `building` ON houses.building_id = building.building_id)
inner join `destination` ON houses.destination_id = destination.destination_id and houses.house_type='single roomed houses' and houses.status='Available')";
$result=mysqli_query($db_conn,$sql);
if($result) {
if(mysqli_num_rows($result)>0) {
while($row=mysqli_fetch_array($result)) {
    echo '<!-- Grid column for the card-->';
    echo '<div style="margin-bottom:5px;" class="col-lg-4 col-md-6">';
    echo '<!--Card Narrower-->';
    echo '<div class="card card-cascade narrower">';

    echo '<!--Card image-->';
    echo '<div class="view view-cascade overlay">';
    echo '<img src="'."../admin/".$row['image'].'" class="card-img-top" alt="narrower">';
        echo '<a>';
            echo '<div class=\"mask rgba-white-slight\">'.'</div>';
        echo '</a>';
    echo '</div>';
    echo '<!--/.Card image-->';

    echo '<!--Card content-->';
            echo "<div class=\"card-body card-body-cascade\">";
            echo "Type of House: <h5 class=\"pink-text\">".$row['house_type']."</h5>";
            echo "Building Name: <h6 class=\"card-title\">".$row['building_name']."</h4>";
            echo "Amount: <h6 class=\"card-title\">".$row['amount']."</h4>";
            echo "Status: <h6 class=\"card-title\">".$row['status']."</h4>";
            echo "Destination: <h6 class=\"card-title\">".$row['destination_name']."</h4>";
            echo "Detail: <p class=\"card-text\">".$row['detail']."</p>";
        echo "</div>";
        echo '<!--/.Card content-->';


        echo '</div>';
    echo '<!--/.Card Narrower-->';
    echo '</div>';
    echo '<!--closing the grid column-->';
}
//closing result set.
mysqli_free_result($result);
} else {
echo "<h4 style=\"color:black;margin-left:50px;\">"."Currently there are no vacant Single Roomed Houses!!"."</h4>".mysqli_connect_error();
}
}
mysqli_close($db_conn);
            ?> 
        <!--More PHP code under testing-->



</div>
<!-- Grid row -->

<!--/My code goes here my code goes here-->

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
    <!-- JQuery -->
    <script type="text/javascript" src="../js/jquery-3.3.1.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="../js/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="../js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="../js/mdb.min.js"></script>
    <!-- Initializations -->

    
    

</body>

</html>