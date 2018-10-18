<?php
session_start();

 require('dbconnection.php');


 if (isset($_POST['user_email']))
 {
   $user_email = $_POST['user_email'];
   $user_email = filter_var($user_email, FILTER_SANITIZE_EMAIL);
   if (filter_var($user_email, FILTER_VALIDATE_EMAIL))
   {
       echo "This sanitized email address is considered valid.";
   }
   else
   {
       echo "This sanitized email address is considered invalid.\n";
   }
   $user_password = $_POST['user_password'];
   if (empty($user_email) || empty($user_password))
   {
       echo "Invalid Entry, please enter correct email and password";
   }

   $user_password = password_hash($user_password, PASSWORD_BCRYPT);


   // sql statement to execute. Surroundvariables with single quotes
   $sql = "SELECT user_email, user_password FROM fm_users where user_email = " . $user_email;

   // execute the sql and return array to $result
   $result = $conn->query($sql);

   // Extraction the returned query information
   while ($row = $result->fetch_assoc())
   { // $row[username] is value from database
     if ($user_email == $row['user_email'] && $user_email == $row['user_password']))
     {
        header('Location: profile.html');

     }
     else
     {
       echo "This is an invalid login. Your mom will have to come to school now.";
     } // closes if statement
   } // closes while loop
 } // closes POST condition

 ?>

 <!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="../assets/img/favicon.ico">
	<link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Paper Kit 2 by Russian</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

	<!-- Bootstrap core CSS     -->
	<link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
	<link href="../assets/css/paper-kit.css?v=2.1.0" rel="stylesheet"/>

	<!--  CSS for Demo Purpose, don't include it in your project     -->
	<link href="../assets/css/demo.css" rel="stylesheet" />

    <!--     Fonts and icons     -->
	<link href='http://fonts.googleapis.com/css?family=Montserrat:400,300,700' rel='stylesheet' type='text/css'>
	<link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
	<link href="../assets/css/nucleo-icons.css" rel="stylesheet">


</head>

<?php

  if (isset($_POST['logout']))
  {
    unset($_SESSION['username']);
  }
?>

<body>
    <nav class="navbar navbar-expand-md fixed-top navbar-transparent">
        <div class="container">
			<div class="navbar-translate">
	            <button class="navbar-toggler navbar-toggler-right navbar-burger" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-bar"></span>
					<span class="navbar-toggler-bar"></span>
					<span class="navbar-toggler-bar"></span>
	            </button>
	            <a class="navbar-brand" href="https://www.creative-tim.com">Ramzes</a>
			</div>
			<!-- <div class="collapse navbar-collapse" id="navbarToggler">
	            <ul class="navbar-nav ml-auto">
					<li class="nav-item">
	                    <a href="../index.html" class="nav-link"><i class="nc-icon nc-layout-11"></i>Components</a>
	                </li>
	                <li class="nav-item">
	                    <a href="../documentation/tutorial-components.html" target="_blank" class="nav-link"><i class="nc-icon nc-book-bookmark"></i>  Documentation</a>
	                </li>
					<li class="nav-item">
                        <a class="nav-link" rel="tooltip" title="Follow us on Twitter" data-placement="bottom" href="https://twitter.com/CreativeTim" target="_blank">
                            <i class="fa fa-twitter"></i>
                            <p class="d-lg-none">Twitter</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" rel="tooltip" title="Like us on Facebook" data-placement="bottom" href="https://www.facebook.com/CreativeTim" target="_blank">
                            <i class="fa fa-facebook-square"></i>
                            <p class="d-lg-none">Facebook</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" rel="tooltip" title="Follow us on Instagram" data-placement="bottom" href="https://www.instagram.com/CreativeTimOfficial" target="_blank">
                            <i class="fa fa-instagram"></i>
                            <p class="d-lg-none">Instagram</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" rel="tooltip" title="Star on GitHub" data-placement="bottom" href="https://www.github.com/CreativeTimOfficial" target="_blank">
                            <i class="fa fa-github"></i>
                            <p class="d-lg-none">GitHub</p>
                        </a>
                    </li>
	            </ul>
	        </div> -->
		</div>
    </nav>
    <div class="wrapper">
        <div class="page-header" style="background-image: url('../assets/img/login-image.jpg');">
            <div class="filter"></div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4 ml-auto mr-auto">
                            <div class="card card-register">
                                <h3 class="title">Login</h3>
				                            <div class="social-line text-center">
                                    <!-- <a href="#pablo" class="btn btn-neutral btn-facebook btn-just-icon">
                                        <i class="fa fa-facebook-square"></i>
                                    </a>
                                    <a href="#pablo" class="btn btn-neutral btn-google btn-just-icon">
                                        <i class="fa fa-google-plus"></i>
                                    </a>
                  									<a href="#pablo" class="btn btn-neutral btn-twitter btn-just-icon">
                  										<i class="fa fa-twitter"></i>
                  									</a> -->
                                    </div>
                                    <a href="register.php">Register</a>
                                    <form class="register-form" method="post">
                                        <label>Email</label>
                                        <input type="text" name="user_email" class="form-control" placeholder="Email">

                                        <label>Password</label>
                                        <input type="password" name="user_password" class="form-control" placeholder="Password">
                                        <input type="submit" value="Login" button class="btn btn-danger btn-block btn-round">
                                       <input type="submit" name="logout" value="logout">
                                     </form>

                                     <?php
                                     var_dump($user_email);
                                       echo "Logged in as: " . $_SESSION['user_email'];

                                     ?>
                                    </form>
                                    <div class="forgot">
                                        <a href="#" class="btn btn-link btn-danger">Forgot password?</a>
                                    </div>
                            </div>
                        </div>
                    </div>
					<div class="footer register-footer text-center">
						<h6>&copy; <script>document.write(new Date().getFullYear())</script>, made with <i class="fa fa-heart heart"></i> by Soviets</h6>
					</div>
                </div>
        </div>
    </div>
</body>

<!-- Core JS Files -->
<script src="../assets/js/jquery-3.2.1.js" type="text/javascript"></script>
<script src="../assets/js/jquery-ui-1.12.1.custom.min.js" type="text/javascript"></script>
<script src="../assets/js/tether.min.js" type="text/javascript"></script>
<script src="../assets/js/bootstrap.min.js" type="text/javascript"></script>

<!--  Paper Kit Initialization snd functons -->
<script src="../assets/js/paper-kit.js?v=2.0.1"></script>

</html>
