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
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="css/mdb.min.css" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="css/style.min.css" rel="stylesheet">
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
                            <a class="nav-link waves-effect" href="about-us.php">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link waves-effect" href="contact-us.php"> Contact Us</a>
                        </li>
                    </ul>

                    <!-- Right -->
                    <ul class="navbar-nav nav-flex-icons">
                        <li class="nav-item">
                            <a href="login.php" class="nav-link border border-light rounded waves-effect">
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
            include 'includes/logo.php';
            ?>

            <div class="list-group list-group-flush">
                <a href="preview/single-roomed.php" class="list-group-item list-group-item-action waves-effect">
                    <i class="fa fa-institution mr-3">Single Roomed Houses</i></a>
                <a href="preview/double-roomed" class="list-group-item list-group-item-action waves-effect">
                    <i class="fa fa-institution mr-3">Double Roomed Houses</i></a>
                <a href="preview/apartment.php" class="list-group-item list-group-item-action waves-effect">
                    <i class="fa fa-institution mr-3">Apartments/Flats</i></a>
                <a href="preview/detached.php" class="list-group-item list-group-item-action waves-effect">
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
                        <a href="about-us.php">Home Page</a>
                        <span>/</span>
                        <span>About Us</span>
                    </h4>

                </div>

            </div>
            <!-- Heading -->



            <!--My code goes here-->


            <div class="card card-body">
    <h4 class="card-title">Brief introduction</h4>
    <p class="card-text">This is a web-based application that has been developed to automate operations involved in the management of rental houses. Target
clients for the application are rental houses managing agencies. Can be used in managing a single rental house or a chain of
rental houses of varying types. This application has been designed with three main user roles: prospect tenant-one yet to rent
a house, tenant-one who has rented one or more houses and the manager-acts as the administrator and will be responsible in ensuring
that everything runs smoothly in the application. Upon successful login, the user is directed appropriately depending on the
entered user role.</p>
</div>
<br />

<div class="card card-body">
    <h4 class="card-title">Significance of the application</h4>
    <p class="card-text">This is a web-based application that has been developed to automate operations involved in the management of rental houses.
    <ul class="list-group">
    <li class="list-group-item"> Vacant rooms are easily broadcasted to many people </li>
    <li class="list-group-item"> A prospect tenant can rent out a house from any geographic location </li>
    <li class="list-group-item"> A prospect tenant can schedule a visit to a rental house easily </li>
    <li class="list-group-item"> Requests and complaints can be easily conveyed notwithstanding the distance constraints 
    between the location of the tenant and location of the managing agency </li>
    <li class="list-group-item"> Records for tenants can be retrieved more easily and less time is spent </li>
    <li class="list-group-item"> Some other advantage...</li>
</ul>
    </p>
</div>
<br />

<div class="card card-body">
    <h4 class="card-title">Types of rental houses incorporated into the application</h4>
    <p class="card-text">The application has a number of advantages over the traditional manual record keeping. They include the following:
    <ul class="list-group">
    <li class="list-group-item"> Apartment/Flat buildings. These rental houses will contain apartments, bedsitters, double-roomed houses and single-roomed houses. </li>
    <li class="list-group-item"> Detached houses. These rental houses will be standalone (self-standing). Examples under this category are mansions, maisonettes, bungalow, etc. </li>
    </ul>
    </p>
</div>


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
    <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="js/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="js/mdb.min.js"></script>
    <!-- Initializations -->

    
    

</body>

</html>