<?php
session_start();

include '../includes/config.php';
$firstname=$secondname=$emailaddress=$phonenumber=$username=$regid = " ";

if(isset($_GET['regid']) && is_numeric($_GET['regid'])) {
  $regid=$_GET['regid'];
  $sql="Select* from registration where regid='$regid'";
  $result=mysqli_query($db_conn,$sql);
  $row=mysqli_fetch_array($result);
}


if(isset($_POST['edit'])) {

    $regid=mysqli_real_escape_string($db_conn,$_POST['regid']);
    $firstname=mysqli_real_escape_string($db_conn,$_POST['firstname']);
    $secondname=mysqli_real_escape_string($db_conn,$_POST['secondname']);
    $emailaddress=mysqli_real_escape_string($db_conn,$_POST['emailaddress']);
    $phonenumber=mysqli_real_escape_string($db_conn,$_POST['phonenumber']);
    $username=mysqli_real_escape_string($db_conn,$_POST['username']);
    
    
    //sanitizing user data
    $firstname = filter_var($firstname, FILTER_SANITIZE_STRING);
    $secondname = filter_var($secondname, FILTER_SANITIZE_STRING);
    // Remove all illegal characters from email
    $emailaddress = filter_var($emailaddress, FILTER_SANITIZE_EMAIL);
    
    // Validate e-mail
    if (!filter_var($emailaddress, FILTER_VALIDATE_EMAIL) === false) {
        echo "";
    } else {
        echo $emailaddress." is not a valid email address";
    }
    
    $username = filter_var($username, FILTER_SANITIZE_STRING);
    
    if (!preg_match("/^[a-zA-Z ]*$/",$firstname)) {
        echo "<script type=\"text/javascript\"> alert('Only letters and white space allowed for First Name') </script>";
        echo "<script> window.location.href=\"index.php\"; </script>";
      } 
      
      if (!preg_match("/^[a-zA-Z ]*$/",$secondname)) {
        echo "<script type=\"text/javascript\"> alert('Only letters and white space allowed for Second Name') </script>";
        echo "<script> window.location.href=\"index.php\"; </script>";
      }
      
      if (!preg_match("/^[a-zA-Z ]*$/",$username)) {
        echo "<script type=\"text/javascript\"> alert('Only letters and white space allowed for Userame') </script>";
        echo "<script> window.location.href=\"index.php\"; </script>";
      }
    
    //$sql="update registration set firstname='$firstname',secondname='$secondname', emailaddress='$emailaddress',phonenumber='$phonenumber',username='$username' where username='".$_SESSION["username"]."' ";
    $sql="update registration set firstname='$firstname',secondname='$secondname', emailaddress='$emailaddress',phonenumber='$phonenumber',username='$username' where regid='$regid' ";
    $result=mysqli_query($db_conn,$sql);
    if($result){
    echo "<script> alert('You have successfully modified your account!!')</script>";
    echo "<script> window.location.href=\"index.php\"; </script>";
    } else{
    echo "<script> alert('Error in editing the account!!')</script>";
    echo "<script> window.location.href=\"index.php\"; </script>";
    }
    
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
    <script language="javascript" type="text/javascript" src="../js/custom-js/registration.js"></script>
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
                            <a class="nav-link waves-effect" href="index.php">Profile
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
                <a href="#" class="list-group-item list-group-item-action waves-effect">
                    <i class="fa fa-table mr-3"></i>Occupied Houses</a>
                <a href="#" class="list-group-item list-group-item-action waves-effect">
                    <i class="fa fa-map mr-3"></i>Vacant Rooms</a>
                <a href="#" class="list-group-item list-group-item-action waves-effect">
                    <i class="fa fa-money mr-3"></i>Rent Collections</a>
                <a href="#" class="list-group-item list-group-item-action waves-effect">
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
                        <a href="index.html" target="_blank">Admin</a>
                        <span>/</span>
                        <span>Edit Admin Profile</span>
                    </h4>

                </div>

            </div>
            <!-- Heading -->



<!--My code goes here,,,My code goes here-->

<!-- Material form registration -->
<form name="myForm" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" onsubmit="return(validate());">

    
    <!-- Material input regid-->
    <div class="form-group">
        <label for="regid">Admin ID</label>
        <input id="regid" type="number" name="regid" value="<?php echo $row[0]; ?>" class="form-control" readonly>
    </div>

    <!-- Material input firstname -->
    <div class="form-group">
        <label for="firstname">Firstname</label>
        <input id="firstname" type="text" name="firstname" value="<?php echo $row[1]; ?>" class="form-control">
    </div>
    <!-- Material input secondname -->
    <div class="form-group">
        <label for="secondname">Secondname</label>
        <input type="text" id="secondname" name="secondname" value="<?php echo $row[2]; ?>" class="form-control">
    </div>
    <!-- Material input email -->
    <div class="form-group">
        <label for="emailaddress">Email Address</label>
        <input type="email" id="emailaddress" name="emailaddress" value="<?php echo $row[3]; ?>" class="form-control">
    </div>
    <!-- Material input phone number -->
    <div class="form-group">
        <label for="phonenumber">Phone Number</label>
        <input type="number" id="phonenumber" name="phonenumber" value="<?php echo $row[4]; ?>" class="form-control">
    </div>
    <!-- Material input username -->
    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" id="username" name="username" value="<?php echo $row[5]; ?>" class="form-control">
    </div>
    
    <div class="text-center mt-4">
        <button class="btn btn-default" type="submit" name="edit" >Register</button>
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