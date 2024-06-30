<?php

// Reference to the file connecting to the database
include '../includes/config.php';
if(isset($_POST['submit'])) {

    // inserting into the second table

$housetype=mysqli_real_escape_string($db_conn,$_POST['housetype']);
$amount=mysqli_real_escape_string($db_conn,$_POST['amount']);
$status=mysqli_real_escape_string($db_conn,$_POST['status']);
$paystatus=mysqli_real_escape_string($db_conn,$_POST['paystatus']);
$destinationid=mysqli_real_escape_string($db_conn,$_POST['destinationid']);
$buildingid=mysqli_real_escape_string($db_conn,$_POST['buildingid']);
$detail=mysqli_real_escape_string($db_conn,$_POST['detail']);
$number=mysqli_real_escape_string($db_conn,$_POST['number']);
$position=mysqli_real_escape_string($db_conn,$_POST['position']);


//sanitizing user data
if (!filter_var($amount, FILTER_VALIDATE_INT) === false) {
    echo "";
} else {
    echo "You have not entered a valid Amount";
}
if (!filter_var($destinationid, FILTER_VALIDATE_INT) === false) {
    echo "";
} else {
    echo "You have not entered a valid Destination ID";
}
if (!filter_var($buildingid, FILTER_VALIDATE_INT) === false) {
    echo "";
} else {
    echo "You have not entered a valid Building ID";
}
if (!filter_var($number, FILTER_VALIDATE_INT) === false) {
    echo "";
} else {
    echo "You have not entered a valid House Number";
}

$detail = filter_var($detail, FILTER_SANITIZE_STRING);



// uploading an image and submitting to database.
    $picture_tmp = $_FILES['image']['tmp_name'];
    $picture_name = $_FILES['image']['name'];//image
    $picture_type = $_FILES['image']['type'];//file
    $allowed_type = array('image/png', 'image/gif', 'image/jpg', 'image/jpeg');

    // <div class="form-group">
    //     <label for="picture">House Image</label>
    //     <input type="file" id="picture" name="image" class="form-control">  
    // </div>

    if(in_array($picture_type, $allowed_type)) {
        $path = 'photos/'.$picture_name; //change this to your liking
        // $sql="insert into houses (house_type,amount,status,payment_status,destination_id,building_id,detail,image,house_number,house_position) values ('$housetype','$amount','$status','$paystatus','$destinationid','$buildingid','$detail','$path','$number','$position')";
        $sql="insert into houses (house_type,amount,status,deposit_payment,destination_id,building_id,detail,image,house_number,house_position) values ('$housetype','$amount','$status','$paystatus','$destinationid','$buildingid','$detail','$path','$number','$position')";
        $result=mysqli_query($db_conn,$sql);
        move_uploaded_file($picture_tmp, $path);

        if($result){
            echo "<script> alert('You have successfully added a new rental house !!')</script>";
            } else{
            echo "<script> alert('Error in adding a rental house!!')</script>";
            }
    } 
// uploading an image and submitting to database.


} // closing the if statement that checks whether form data has been submitted... 
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
    <script language="javascript" type="text/javascript" src="../js/custom-js/new-house.js"></script>
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
                        <a href="new-house.php">Admin</a>
                        <span>/</span>
                        <span>Houses<pan>
                    </h4>

                </div>

            </div>
            <!-- Heading -->

            <!--My code goes here,,,My code goes here-->

            
            <!--My code goes here,,,My code goes here-->
            <!-- Material form login -->
<form name="myForm" method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" onsubmit="return(validate());">
    <p class="h4 text-center mb-4">Adding a Rental House</p>


    <!-- Material input type of house -->
    <div class="form-group">
    <label for="housetype">Type of House:</label>
    <select class="form-control" id="housetype" name="housetype">
    <option>Single Roomed Houses</option>
    <option>Double Roomed Houses</option>
    <option>Apartment/Flat</option>
    <option>Detached Houses</option>
  </select>
    </div>

    <!-- Material input detail -->
    <div class="form-group">
    <label for="detail">Detail:</label>
    <textarea rows="4" cols="90" name="detail"> 
    </textarea>
    </div>

    <!-- Material input amount -->
    <div class="form-group">
        <label for="amount">Amount of Rent</label>
        <input type="number" name="amount" class="form-control">
    </div>

    <!-- Material input status -->
    <div class="form-group">
    <label for="status">House Status:</label>
    <select class="form-control" id="status" name="status">
    <option>Available</option>
    </select>
    </div>

    <!-- Material input payment status -->
    <div class="form-group">
    <label for="paystatus">Payment Status:</label>
    <select class="form-control" id="paystatus" name="paystatus">
    <option>Pending</option>
    </select>
    </div>

    <!-- Material input location id -->
    <div class="form-group">
        <label for="destinationid">Destination ID</label> 
        <input type="number" id="destinationid" name="destinationid" class="form-control">
    </div>

    <!-- Material input building id -->
    <div class="form-group">
        <label for="buildingid">Building ID</label>
        <input type="number" id="buildingid" name="buildingid" class="form-control">  
    </div>

    <!-- Material input image-->
    <div class="form-group">
        <label for="picture">House Image</label>
        <input type="file" id="picture" name="image" class="form-control">  
    </div>

    <!-- Material input house number -->
    <div class="form-group">
        <label for="number">House Number</label>
        <input type="number" name="number" class="form-control">
    </div>

    <!-- Material input house position -->
    <div class="form-group">
    <label for="position">House Position:</label>
    <select class="form-control" id="position" name="position">
    <option>Ground Floor</option>
    <option>First Floor</option>
    <option>Second Floor</option>
    <option>Third Floor</option>
    <option>Fourth Floor</option>
    <option>Fifth Floor</option>
  </select>
    </div>
    

    <div class="text-center mt-4">
        <button class="btn btn-default" type="submit" name="submit" >Submit</button>
    </div>
</form>
<!-- Material form login -->
            <!--My code goes here,,,My code goes here-->

    </main>
    <!--Main layout-->

    <!--Footer-->
    <footer class="page-footer text-center font-small primary-color-dark darken-2 mt-4 wow fadeIn">

        <hr class="my-4">

        <!--Copyright-->
        <div class="footer-copyright py-3">
            © 2018 Copyright:
            <a href="#" target="_blank"> Apex Computer Solutions </a>
        </div>
        <!--/.Copyright-->

    </footer>
    <!--/Footer-->

    <!-- SCRIPTS -->
    <script type="text/javascript" src="../js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="../js/popper.min.js"></script>
    <script type="text/javascript" src="../js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../js/mdb.min.js"></script>
</body>

</html>