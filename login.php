<?php
session_start();
include 'includes/config.php';


if(isset($_POST['submit'])) {
    $username=mysqli_real_escape_string($db_conn,$_POST['username']);
    $password=mysqli_real_escape_string($db_conn,$_POST['password']);
    $userrole=mysqli_real_escape_string($db_conn,$_POST['userrole']);

    //sanitizing user data
    $username = filter_var($username, FILTER_SANITIZE_STRING);
    $password = filter_var($password, FILTER_SANITIZE_STRING);
	
	switch($userrole){
        case "admin":
			$qrya="SELECT * FROM registration WHERE username='$username' AND password='".md5($password)."' AND userrole='$userrole' ";
			$result = mysqli_query($db_conn, $qrya);
			if($result){
				if(mysqli_num_rows($result) >= 1 ){
                    $_SESSION['loggedin'] = true;
                    $_SESSION['username'] = $username;
                    $_SESSION['password'] = $password;
                    echo "<script> window.location.href=\"admin/index.php\"; </script>";
						exit();	
				}
				else{
					header("location: index.php?");
					echo "Login Failed";
            }
        }
		break;
		
		
		case "tenant":
			$qryt="SELECT * FROM registration WHERE username='$username' AND password='".md5($password)."' AND userrole='$userrole' ";
			$result = mysqli_query($db_conn, $qryt);
			if($result){
				if(mysqli_num_rows($result) >=1 ){
                    $_SESSION['loggedin'] = true; 
                    $_SESSION['username'] = $username;
                    $_SESSION['password'] = $password;
                    echo "<script> window.location.href=\"user/index.php\"; </script>";
						exit();
				}
				else{
					header("location: index.php?");
					echo "Login Failed";
            }
        }
        break;
        
        case "user":
			$qryu="SELECT * FROM registration WHERE username='$username' AND password='".md5($password)."' AND userrole='$userrole' ";
			$result = mysqli_query($db_conn, $qryu);
			if($result){
				if(mysqli_num_rows($result) >= 1 ){
                    $_SESSION['loggedin'] = true;
                    $_SESSION['username'] = $username;
                    $_SESSION['password'] = $password;
                    echo "<script> window.location.href=\"user/index.php\"; </script>";
						exit();	
				}
				else{
					header("location: index.php");
					echo "Login Failed";
            }
        }
		break;
		
		
		default:
			echo 'System Error!!';
    }
    
}
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
                        <a href="login.php">Home Page</a>
                        <span>/</span>
                        <span>Contact Us</span>
                    </h4>


                </div>

            </div>
            <!-- Heading -->

            <!--My code goes here,,,My code goes here-->
            <!--the login form goes here...-->


<!-- Material form login -->
<form name="myForm" method="post" action="<?php echo htmlspecialchars($_SERVER[ 'PHP_SELF']); ?>" onsubmit="return(validate());">
    <p class="h4 text-center mb-4">Sign in</p>
    <!-- Material input username -->
    <div class="md-form">
    <i class="fa fa-user-circle-o prefix grey-text"></i>
        <input type="text" id="username" name="username" class="form-control">
        <label for="username">Your Username</label>
    </div>

    <!-- Material input password -->
    <div class="md-form">
        <i class="fa fa-lock prefix grey-text"></i>
        <input type="password" id="password" name="password" class="form-control">
        <label for="password">Your Password</label>
    </div>

    <!-- Material input user role -->
    <div class="form-group">
    <label for="userrole">User Role:</label>
    <select class="form-control" id="userrole" name="userrole">
    <option>admin</option>
    <option>user</option>
  </select>
    </div>

    <div class="text-center mt-4">
        <button class="btn btn-default" type="submit" name="submit" >Login</button>
        <a href="register.php" class="btn btn-secondary" >Sign Up</a>
    </div>
</form>
<!-- Material form login -->



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
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="js/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="js/mdb.min.js"></script>
    <!-- Initializations -->

    
    
</body>

</html>