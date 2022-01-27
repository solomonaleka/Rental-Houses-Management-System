
<?php

// Reference to the file connecting to the database
include '../includes/config.php';
if(isset($_POST['submit'])) {

    // inserting into the second table

$firstname=mysqli_real_escape_string($db_conn,$_POST['firstname']);
$secondname=mysqli_real_escape_string($db_conn,$_POST['secondname']);
$phonenumber=mysqli_real_escape_string($db_conn,$_POST['phonenumber']);
$emailaddress=mysqli_real_escape_string($db_conn,$_POST['emailaddress']);
$buildingid=mysqli_real_escape_string($db_conn,$_POST['buildingid']);


///sanitizing user data
$firstname = filter_var($firstname, FILTER_SANITIZE_STRING);
$secondname = filter_var($secondname, FILTER_SANITIZE_STRING);
// Remove all illegal characters from email
$emailaddress = filter_var($emailaddress, FILTER_SANITIZE_EMAIL);

//validate the firstname
if (!preg_match("/^[a-zA-Z ]*$/",$firstname)) {
    echo "<script> alert('Only letters and white space allowed for First Name') </script>";
    echo "<script> window.location.href=\"new-landlord.php\"; </script>";
    exit();
  } 
  
  //validate the secondname
  if (!preg_match("/^[a-zA-Z ]*$/",$secondname)) {
    echo "<script> alert('Only letters and white space allowed for Second Name') </script>";
    echo "<script> window.location.href=\"new-landlord.php\"; </script>";
    exit();
  }

// Validate e-mail
if (!filter_var($emailaddress, FILTER_VALIDATE_EMAIL) === false) {
    echo "";
} else {
    echo "<script> alert('You have entered an invalid email address') </script>";
    echo "<script> window.location.href=\"new-landlord.php\"; </script>";
}

    $query_land="SELECT* from landlord where phonenumber='$phonenumber' or emailaddress='$phonenumber' or building_id='$buildingid'";
    $result_land=mysqli_query($db_conn,$query_land);
    if($result_land) {
    if(mysqli_num_rows($result_land)>0) {
    $row=mysqli_fetch_array($result_land);

    $present_phonenumber=$row['phonenumber'];
    $present_emailaddress=$row['emailaddress'];
    $present_buildingid=$row['building_id'];
    
    if($phonenumber==$present_phonenumber){
        echo "<script> alert('A landlord with the entered phonenumber already exists!!')</script>";
    }
    else if($emailaddress==$present_emailaddress){
        echo "<script> alert('A landlord with the entered emailaddress already exists!!')</script>";
    }
    else{
        echo "<script> alert('A landlord with the entered building id already exists!!')</script>";
    }

    }

    else{

        //checking whether the entered Building ID exists in the building table
    $query_build="SELECT* from building where building_id='$buildingid' ";
    $result_build=mysqli_query($db_conn,$query_build);
    if($result_build) {
    if(mysqli_num_rows($result_build)>0) {
    $row=mysqli_fetch_array($result_build);
    $present_building_id=$row['building_id'];
    $sql="insert into landlord (firstname,secondname,phonenumber,emailaddress,building_id) values ('$firstname','$secondname','$phonenumber','$emailaddress','$buildingid')";
    $result=mysqli_query($db_conn,$sql);
    if($result){ //registering if statement
    echo "<script> alert('You have successfully added a new landlord!!')</script>";
    } else{ //registering else statement
    echo "<script> alert('Error in adding new landlord!!')</script>";
    }
    
    }

    else {
        echo "<script> alert('The entered Building ID does not exist in the building table!!')</script>";
    }
}



    }


    }


} // closing the if statement that checks whether form data has been submitted...the main if statement 
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
    <script language="javascript" type="text/javascript" src="../js/custom-js/new-landlord.js"></script>
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
                        <a href="new-landlord.php">Admin</a>
                        <span>/</span>
                        <span>New Landlord<pan>
                    </h4>

                </div>

            </div>
            <!-- Heading -->

            <!--My code goes here,,,My code goes here-->

            
            <!--My code goes here,,,My code goes here-->
            <!-- Addition of a new landlord -->
<form name="myForm" method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" onsubmit="return(validate());">
    <p class="h4 text-center mb-4">Adding a New Landlord</p>

    <!-- Material input firstname -->
    <div class="form-group">
        <label for="firstname">Firstname</label>
        <input id="firstname" type="text" name="firstname" class="form-control">
    </div>
    <!-- Material input secondname -->
    <div class="form-group">
        <label for="secondname">Secondname</label>
        <input type="text" id="secondname" name="secondname" class="form-control">
    </div>

    <!-- Material input phone number -->
    <div class="form-group">
        <label for="phonenumber">Phone Number</label>
        <input type="number" id="phonenumber" name="phonenumber" class="form-control" maxlength="10">
    </div>

    <!-- Material input email -->
    <div class="form-group">
        <label for="emailaddress">Email Address</label>
        <input type="email" id="emailaddress" name="emailaddress" class="form-control">
    </div>

    <!-- Material input building id -->
    <div class="form-group">
        <label for="buildingid">Building ID</label>
        <input type="number" id="buildingid" name="buildingid" class="form-control">  
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