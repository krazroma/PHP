<?php
//start session
if (!isset($_SESSION))
{
  session_start();
}

require('dbconnection.php');

$sql = "SELECT first_name, last_name, image_url, description, title FROM fm_users where user_email = '$user_email'";

// execute the sql and return array to $result
$result = $conn->query($sql);

while($row = $result->fetch_assoc())
{
    echo "<br>". $row["first_name"]. " ". $row["last_name"]. " " . $row["description"] . "<br>";
}
// if ($result->num_rows > 0)
// {
//     // output data of each row
//     while($row = $result->fetch_assoc())
//     {
//         echo "<br> id: ". $row["first_name"]. " ". $row["last_name"]. " " . $row["description"] . "<br>";
//     }
// }
// else
// {
//       echo "0 results";
// }

// if (isset($_POST['user_email']))
// {
  // $first_name = $_POST['first_name'];
  // $last_name = $_POST['last_name'];
  // //$user_email = $_POST['last_name'];
  // //$user_password = $_POST['user_password'];
  // $image_url = $_POST['image_url'];
  // $description = $_POST['description'];
  // $title = $_POST['title'];
  // sql statement to execute. Surroundvariables with single quotes






  // Extraction the returned query information
  // while ($row = $result->fetch_assoc())
  // {
  //   if ($user_email == $row['user_email'])
  //   {
  //     $_SESSION['first_name'] = $first_name;
  //     $_SESSION['last_name'] = $last_name;
  //     //$_SESSION['user_email'] = $user_email;
  //     //$_SESSION['user_password'] = $user_password;
  //     $_SESSION['image_url'] = $image_url;
  //     $_SESSION['description'] = $description;
  //     $_SESSION['title'] = $title;
  //     var_dump('1');
  //   } // closes if statement
  // } // closes while loop
//} // closes POST condition

//var_dump($first_name, $last_name, $user_email, $user_password, $image_url, $description, $title);

// Uses $_SESSION['email'] to display in navigation
//done

//modify fm_users to include image_url load it to $_SESSION['image_url']
//done


// modify fm_users table to include first_name and last_name and put it in session variable $_SESSION['first_name'] and $_SESSION['last_name']
//done

// modify fm_users to add title and then load it to $_SESSION['title']
//done

// modify fm_users to add description and then load into $_SESSION['description']
// done




?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="../assets/img/favicon.ico">
	<link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Profile page</title>

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
  <nav class="navbar navbar-expand-md fixed-top navbar-transparent" color-on-scroll="150">
    <div class="container">
			<div class="navbar-translate">
        <button class="navbar-toggler navbar-toggler-right navbar-burger" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-bar"></span>
					<span class="navbar-toggler-bar"></span>
					<span class="navbar-toggler-bar"></span>
        </button>
        <a class="navbar-brand" href="#">Follow me</a>
			</div>
			<div class="collapse navbar-collapse" id="navbarToggler">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a href="login.php" class="nav-link">Login</a>
          </li>
					<li class="nav-item">
            <a href="login.php" class="nav-link">
							<?php
								echo $_SESSION['user_email']; // user_email goes here
							?>
						</a>
          </li>
      	</ul>
    	</div>
		</div>
    </nav>

    <div class="wrapper">
        <div class="page-header page-header-xs" data-parallax="true" style="background-image: url('../assets/img/fabio-mangione.jpg');">
			<div class="filter"></div>
		</div>
        <div class="section profile-content">
            <div class="container">
                <div class="owner">
                    <div class="avatar">
                      <img src="<?php echo $_SESSION['image_url']; ?>" alt="Circle Image" class="img-circle img-no-padding img-responsive">
                    </div>
                    <div class="name">
                        <h4 class="title"><?php echo $_SESSION['first_name'] . " " . $_SESSION['last_name'] ?><br /></h4>
												<h6 class="description"><?php echo $_SESSION['title']; ?></h6>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 ml-auto mr-auto text-center">
                        <p><?php echo $_SESSION['description']; ?></p>
                        <br />
                        <btn class="btn btn-outline-default btn-round"><i class="fa fa-cog"></i> Settings</btn>
                    </div>
                </div>
                <br/>
                <div class="nav-tabs-navigation">
                    <div class="nav-tabs-wrapper">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#follows" role="tab">Follows</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#following" role="tab">Following</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- Tab panes -->
                <div class="tab-content following">
                    <div class="tab-pane active" id="follows" role="tabpanel">
                        <div class="row">
                            <div class="col-md-6 ml-auto mr-auto">
                                <ul class="list-unstyled follows">
                                    <li>
                                        <div class="row">
                                            <div class="col-md-2 col-sm-2 ml-auto mr-auto">
                                                <img src="../assets/img/faces/clem-onojeghuo-2.jpg" alt="Circle Image" class="img-circle img-no-padding img-responsive">
                                            </div>
                                            <div class="col-md-7 col-sm-4  ml-auto mr-auto">
                                                <h6>Flume<br/><small>Musical Producer</small></h6>
                                            </div>
                                            <div class="col-md-3 col-sm-2  ml-auto mr-auto">
												<div class="form-check">
					                                <label class="form-check-label">
					                                    <input class="form-check-input" type="checkbox" value="" checked>
					                                    <span class="form-check-sign"></span>
					                                </label>
					                            </div>
                                            </div>
                                        </div>
                                    </li>
                                    <hr />
                                    <li>
                                        <div class="row">
                                            <div class="col-md-2 ml-auto mr-auto ">
                                                <img src="../assets/img/faces/ayo-ogunseinde-2.jpg" alt="Circle Image" class="img-circle img-no-padding img-responsive">
                                            </div>
                                            <div class="col-md-7 col-sm-4">
                                                <h6>Banks<br /><small>Singer</small></h6>
                                            </div>
                                            <div class="col-md-3 col-sm-2">
												<div class="form-check">
					                                <label class="form-check-label">
					                                    <input class="form-check-input" type="checkbox" value="">
					                                    <span class="form-check-sign"></span>
					                                </label>
					                            </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane text-center" id="following" role="tabpanel">
                        <h3 class="text-muted">Not following anyone yet :(</h3>
                        <button class="btn btn-warning btn-round">Find artists</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
	<footer class="footer section-dark">
        <div class="container">
            <div class="row">
                <nav class="footer-nav">
                    <ul>
                        <li><a href="https://www.creative-tim.com">Creative Tim</a></li>
                        <li><a href="http://blog.creative-tim.com">Blog</a></li>
                        <li><a href="https://www.creative-tim.com/license">Licenses</a></li>
                    </ul>
                </nav>
                <div class="credits ml-auto">
                    <span class="copyright">
                        © <script>document.write(new Date().getFullYear())</script>, made with <i class="fa fa-heart heart"></i> by Creative Tim
                    </span>
                </div>
            </div>
        </div>
    </footer>
</body>

<!-- Core JS Files -->
<script src="../assets/js/jquery-3.2.1.js" type="text/javascript"></script>
<script src="../assets/js/jquery-ui-1.12.1.custom.min.js" type="text/javascript"></script>
<!-- <script src="../assets/js/tether.min.js" type="text/javascript"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="../assets/js/bootstrap.min.js" type="text/javascript"></script>


<!--  Paper Kit Initialization snd functons -->
<script src="../assets/js/paper-kit.js?v=2.1.0"></script>

</html>
