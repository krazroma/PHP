<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
  require('dbconnection.php');
  // grab POST data could be dangerous because of XSS (cross site inctiption) or SQL injection
  $username = $_POST['username'];
  // sanitaze the $username by remove tags
  $username = filter_var($username, FILTER_SANITAZE_STRING);
  // trim white space from beginning and the end of the $username
  $username = trim($username);
  // remove slashes from $username, no / allowed
  //$username = stripslashes($username);

  $username = str_replace("/", "", $username);
  $username = str_replace("\\", "", $username);
  // remove white space from the middle of the string
  //$username = str_replace(' ', '', $username); //first parameter is string to look, second is what to replace with
  $username = preg_replace("/\s+/", "", $username); //removes tab is pressed

  // grab POST data password will be hashed so no need to sanitaze
  $password = $_POST['password'];
  $password = password_hash($password, PASSWORD_BCRYT);
  $sql = "INSERT INTO fm_users (user_name, user_password) VALUES ('$username', '$password')";
  $conn->query($sql);
}
 ?>

 <!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="../assets/img/favicon.ico">
	<link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Paper Kit 2 by Creative Tim</title>

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
<body>
    <nav class="navbar navbar-expand-md fixed-top navbar-transparent">
        <div class="container">
			<div class="navbar-translate">
	            <button class="navbar-toggler navbar-toggler-right navbar-burger" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-bar"></span>
					<span class="navbar-toggler-bar"></span>
					<span class="navbar-toggler-bar"></span>
	            </button>
	            <a class="navbar-brand" href="https://www.creative-tim.com">Paper Kit 2</a>
			</div>
			<div class="collapse navbar-collapse" id="navbarToggler">
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
	        </div>
		</div>
    </nav>
    <div class="wrapper">
        <div class="page-header" style="background-image: url('../assets/img/login-image.jpg');">
            <div class="filter"></div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4 ml-auto mr-auto">
                            <div class="card card-register">
                                <h3 class="title">Welcome</h3>
								<div class="social-line text-center">
                                    <a href="#pablo" class="btn btn-neutral btn-facebook btn-just-icon">
                                        <i class="fa fa-facebook-square"></i>
                                    </a>
                                    <a href="#pablo" class="btn btn-neutral btn-google btn-just-icon">
                                        <i class="fa fa-google-plus"></i>
                                    </a>
									<a href="#pablo" class="btn btn-neutral btn-twitter btn-just-icon">
										<i class="fa fa-twitter"></i>
									</a>
                                </div>
                                <form class="register-form">
                                    <label>Email</label>
                                    <input type="text" class="form-control" placeholder="Email" name="user_name">

                                    <label>Password</label>
                                    <input type="password" class="form-control" placeholder="Password" name="user_password">
                                    <button class="btn btn-danger btn-block btn-round">Register</button>
                                </form>
                                <div class="forgot">
                                    <a href="#" class="btn btn-link btn-danger">Forgot password?</a>
                                </div>
                            </div>
                        </div>
                    </div>
					<div class="footer register-footer text-center">
						<h6>&copy; <script>document.write(new Date().getFullYear())</script>, made with <i class="fa fa-heart heart"></i> by Creative Tim</h6>
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
