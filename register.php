<?php
$firstname=$secondname=$emailaddress=$phonenumber=$username=$password=$confirmpassword=$userrole=" ";

//Referring to the file connecting to the database...
include 'includes/config.php';

// The Register button has been clicked..checking whether form data has been submitted... 
if(isset($_POST['submit'])) {

$firstname=mysqli_real_escape_string($db_conn,$_POST['firstname']);
$secondname=mysqli_real_escape_string($db_conn,$_POST['secondname']);
$emailaddress=mysqli_real_escape_string($db_conn,$_POST['emailaddress']);
$phonenumber=mysqli_real_escape_string($db_conn,$_POST['phonenumber']);
$username=mysqli_real_escape_string($db_conn,$_POST['username']);
$password=mysqli_real_escape_string($db_conn,$_POST['password']);
$confirmpassword=mysqli_real_escape_string($db_conn,$_POST['confirmpassword']);
$userrole=mysqli_real_escape_string($db_conn,$_POST['userrole']);


//sanitizing user data
$firstname = filter_var($firstname, FILTER_SANITIZE_STRING);
$secondname = filter_var($secondname, FILTER_SANITIZE_STRING);
// Remove all illegal characters from email
$emailaddress = filter_var($emailaddress, FILTER_SANITIZE_EMAIL);

// Validate e-mail
if (!filter_var($emailaddress, FILTER_VALIDATE_EMAIL) === false) {
    echo "";
} else {
    echo $emailaddress."<script> alert(' is not a valid email address') </script>";
    echo "<script> window.location.href=\"register.php\"; </script>";
}

// if (!filter_var($phonenumber, FILTER_VALIDATE_INT) === false) {
//     echo "";
// } else {
//     echo "<script> alert('Enter correct phone number') </script>";
//     echo "<script> window.location.href=\"register.php\"; </script>";
// }


$username = filter_var($username, FILTER_SANITIZE_STRING);
$password = filter_var($password, FILTER_SANITIZE_STRING);
$confirmpassword = filter_var($confirmpassword, FILTER_SANITIZE_STRING);

if (!preg_match("/^[a-zA-Z ]*$/",$firstname)) {
    echo "<script> alert('Only letters and white space allowed for First Name') </script>";
    echo "<script> window.location.href=\"register.php\"; </script>";
    exit();
  } 
  
  if (!preg_match("/^[a-zA-Z ]*$/",$secondname)) {
    echo "<script> alert('Only letters and white space allowed for Second Name') </script>";
    echo "<script> window.location.href=\"register.php\"; </script>";
    exit();
  }
  
  if (!preg_match("/^[a-zA-Z ]*$/",$username)) {
    echo "<script> alert('Only letters and white space allowed for Userame') </script>";
    echo "<script> window.location.href=\"register.php\"; </script>";
    exit();
  }


if($password==$confirmpassword) { //openning password checking if statement
    $password = md5($password);
    $confirmpassword = md5($confirmpassword);

    $user_check="SELECT username from registration where username='$username' ";
    $result_user = mysqli_query($db_conn, $user_check);
    if($result_user){ 
    if(mysqli_num_rows($result_user)>= 1 ){ //if statement checking presence of the username
            echo "<script> alert('Try using a different username')</script>";
            echo "<script> window.location.href=\"register.php\"; </script>";
    }// closing username checking if statement
    else { //openning username checking else statement
    $_SESSION['firstname']=$firstname;
    $_SESSION['secondname']=$secondname;
    $sql="insert into registration (firstname,secondname,emailaddress,phonenumber,username,password,confirmpassword,userrole) values ('$firstname','$secondname','$emailaddress','$phonenumber','$username','$password','$confirmpassword','$userrole')";
    $result=mysqli_query($db_conn,$sql);
    if($result){ //registering if statement
    echo "<script> alert('You have successfully created an account!!')</script>";
    } else{ //registering else statement
    echo "<script> alert('Error in storing user data!!')</script>";
    }
} //closing username checking else statement
}

} //closing password checking if statement

else { //openning password checking else statement
    echo "<script> alert('Ensure that the entered passwords match!!')</script>";
} //closing pass


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
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="css/mdb.min.css" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="css/style.min.css" rel="stylesheet">
    <!-- Location to the custom javascript validation code -->
    <script language="javascript" type="text/javascript" src="js/custom-js/registration.js"></script>
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
                                <b><strong>Login</strong></b>
                            </a>
                        </li>
                    </ul> 


                </div>

            </div>
        </nav>
        <!-- Navbar -->

        <!--Sidebar -->
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
                        <a href="register.php">Home Page</a>
                        <span>/</span>
                        <span>Register</span>
                    </h4>


                </div>

            </div>
            <!-- Heading -->

            <!--My code goes here,,,My code goes here-->

            <!--the registration form goes here...-->

<!-- Material form registration -->
<form name="myForm" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" onsubmit="return(validate());">
    <p class="h4 text-center mb-4">Sign Up</p>

    <!-- Material input firstname -->
    <div class="md-form">
        <input id="firstname" type="text" name="firstname" class="form-control">
        <label for="firstname">Firstname</label>
    </div>
    <!-- Material input secondname -->
    <div class="md-form">
        <input type="text" id="secondname" name="secondname" class="form-control">
        <label for="secondname">Secondname</label>
    </div>
    <!-- Material input email -->
    <div class="md-form">
        <input type="email" id="emailaddress" name="emailaddress" class="form-control">
        <label for="emailaddress">Email Address</label>
    </div>
    <!-- Material input phone number -->
    <div class="md-form">
        <input type="number" id="phonenumber" name="phonenumber" class="form-control" maxlength="10">
        <label for="phonenumber">Phone Number</label>
    </div>
    <!-- Material input username -->
    <div class="md-form">
    <i class="fa fa-user-circle-o prefix grey-text"></i>
        <input type="text" id="username" name="username"class="form-control">
        <label for="username">Username</label>
    </div>
    <!-- Material input password -->
    <div class="md-form">
        <i class="fa fa-lock prefix grey-text"></i>
        <input type="password" id="password" name="password" class="form-control">
        <label for="password">Password</label>
    </div>

    <!-- Material input password -->
    <div class="md-form">
        <i class="fa fa-lock prefix grey-text"></i>
        <input type="password" id="confirmpassword" name="confirmpassword" class="form-control">
        <label for="confirmpassword">Confirm Password</label>
    </div>

    <!-- Material input user role -->
    <div class="form-group">
    <label for="userrole">User Role:</label>
    <select class="form-control" id="userrole" name="userrole">
    <option>user</option>
  </select>
    </div>

    <div class="text-center mt-4">
        <button class="btn btn-default" type="submit" name="submit" >Register</button>
    </div>
</form>
<!-- Material form login -->

<!--end of the form-->

<!--my code goes here,,,my code here-->



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
    <!-- JQuery -->
    <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="js/popper.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/mdb.min.js"></script>

</body>

</html>