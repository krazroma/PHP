<?php
// strt session if it is not running

session_start();
<?php
// setting up the Database connection
$db_host = 'localhost'; // Database is installed on the PHPH server
$db_user = 'roman'; // name to log in to MySQL
$db_password = 'southhills#'; // password to login to MySQL
$db_name = 'roman'; // name of the database within MySQL
$conn = new mysqli($db_host, $db_user, $db_password, $db_name);
if ($conn->connect_error)
{
  die("Connection Failed: " . $conn->connect_error);
}
?>

$sql ="UPDATE fm_users SET first_name='".$_POST['first_name']."', last_name='".$_POST['last_name']."',
title='".$_POST['title']."', description='".$_POST['description']."' WHERE user_id = " . $_SESSION['user_id'];
$result = $conn->query($sql);

$sql_main="SELECT * FROM fm_users WHERE user_id = " . $_SESSION['user_id'];
$result_main = $conn->query($sql_main);
while ($row = $result_main->fetch_assoc())
  {
    if (($_SESSION['user_id'] == $row['user_id']))
        {
            $_SESSION['first_name'] = $row['first_name'];
            $_SESSION['last_name'] = $row['last_name'];
            $_SESSION['title'] = $row['title'];
            $_SESSION['description'] = $row['description'];
            // header('Location: profile.php');
        }
  }

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
        $target_dir = "images/";
        $target_file = $target_dir . basename($_FILES['upload']['name']);
        $uploadVerification=true;
        if (file_exists($target_file)) {  $uploadVerification=false;  $ret = "Sorry file already exists";}
        $file_type = $_FILES['upload']['type'];

        switch ($file_type)
        {
            case "image/jpeg":$uploadVerification = true; $img_type=".jpg";    break;
            case "image/png":    $uploadVerification = true;    $img_type=".png"; break;
            case "image/gif":    $uploadVerification = true;    $img_type=".gif"; break;
            default: $uploadVerification = false;
            $ret = "Sorry only jpg, png, and gif files are allowed!";
        }

        if (file_exists($target_file)) {  $uploadVerification=false;  $ret = "Sorry file already exists";}

        if ($_FILES['upload']['size'] > 1000000){ $uploadVerification=false; $ret = "Sorry file is too big"; }

        $target_file = $target_dir . $_SESSION['user_id'] . $img_type; //NEW
        if ($uploadVerification){move_uploaded_file($_FILES['upload']['tmp_name'], $target_file);

            $sql2 ="UPDATE fm_users SET image_url='$target_file' WHERE user_id = " . $_SESSION['user_id'];
            $result2 = $conn->query($sql2);
        }

        $sql_u ="UPDATE fm_users SET first_name='".$_POST['first_name']."', last_name='".$_POST['last_name']."',title='".$_POST['title']."', description='".$_POST['description']."' WHERE user_id = " . $_SESSION['user_id'];
        $result_update = $conn->query($sql_u);

        header('Location: profile.php');
}// ends if post server access
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////





?>
<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<link rel="icon" type="image/png" href="../assets/img/favicon.ico">
		<link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

		<title>Edit Profile page</title>

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
								<?php	echo $_SESSION['user_email']; // user_email goes here ?>
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
			<div class="section landing-section">
				<div class="container">
					<div class="row">
							<div class="col-md-8 ml-auto mr-auto">
								<h2 class="text-center">Edit Profile</h2>

								<form class="contact-form" action="" method="post">
								<div class="row">

									<div class="col-md-6">
										<label>First Name</label>
											<div class="input-group">
												<span class="input-group-addon">
													<i class="nc-icon nc-single-02"></i>
												</span>
												<input name="first_name" type="text" class="form-control" placeholder="<?php echo $_SESSION['first_name']; ?>">
										</div>
									</div>
									<div class="col-md-6">
										<label>Last Name</label>
										<div class="input-group">
											<span class="input-group-addon">
												<i class="nc-icon nc-single-02"></i>
											</span>
											<input name="last_name" type="text" class="form-control" placeholder="<?php echo $_SESSION['last_name'];?>">
										</div>
									</div>
								</div><!--ends first row-->

								<label>Title</label>
								<div class="input-group">
									<span class="input-group-addon">
										<i class="nc-icon nc-tag-content"></i>
									</span>
									<input name="title" value="<?php echo $_SESSION['title']; ?>" type="text" class="form-control" placeholder="<?php echo $_SESSION['title']; ?>">
								</div>

								<label>Description</label>
								<textarea name="description" class="form-control" rows="4" placeholder="<?php echo $_SESSION['descr']; ?>"></textarea>
                <!-- ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->


                <label>Upload A New Profile Picture:</label>
                <input type="file" name="upload">
                <label><?php if($ret){echo $ret;}  ?></label>


                <!-- ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
								<div class="row">
									<div class="col-md-4 ml-auto mr-auto text-center">
										<button class="btn btn-danger btn-lg btn-fill" type="submit">Update</button>
									</div>
								</div>
								</form>
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
