<?php
session_start(); // starts session
require('dbconnection.php'); // brings db connection
$MAIN_user_id = $_SESSION['user_id']; // session user id is stored in the variable


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if (isset( $_POST["submit"]))
{
	if (isset($_FILES['upload']))
	{
	  // check to see if uploads folder file_exists
	  //if(file_exists("uploads") === false)
	  if(!file_exists("uploads"))
	  {
	    // if uploads folder does not exist create interface
	    mkdir("./uploads");
	  }

	if(!file_exists("uploads/" . $_SESSION['username']))
	{
	  mkdir("uploads/" . $_SESSION["username"], 0777, true);
	}

	  $target_dir = "uploads/" . $_SESSION["username"] . "/";
	  $target_file = $target_dir . basename($_FILES['upload']['name']);
	  $uploadVerification = true;

	// Lets check if the file already pcntl_wexitstatus
	if(file_exists($target_file))
	{
	  $uploadVerification = false;
	  $ret = "Sorry file already exists";
	}

	$file_type = $_FILES['upload']['type'];
	switch ($file_type)
	{
	  case 'image/jpeg':
	    $uploadVerification = true;
	    break;

	  case 'image/png':
	    $uploadVerification = true;
	    break;

	  case 'image/gif':
	    $uploadVerification = true;
	    break;

	  case 'application/pdf':
	    $uploadVerification = true;
	    break;

	  default:
	    $uploadVerification = false;
	    $ret = "Sorry only jpg, png, gif, and pdf files are allowed";
	    //break;
	}



	if($_FILES['upload']['size'] > 1000000)
	{
	  $uploadVerification = false;
	  $ret = "Sorry file is too big";
	}
	// check is file already exists
	  if ($uploadVerification)
	  {
	    move_uploaded_file($_FILES['upload']['tmp_name'], $target_file);
	  }
	}
}

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
							<!-- image comes from data base -->
              <img src="<?php echo $_SESSION['image_url']; ?>" alt="Circle Image" class="img-circle img-no-padding img-responsive">
            </div>
            <div class="name">
							<!-- prints first and last names of the user comes from database -->
                <h4 class="title"><?php echo $_SESSION['first_name'] . " " . $_SESSION['last_name'] ?><br /></h4>
								<!-- prints title from database -->
								<h6 class="description"><?php echo $_SESSION['title']; ?></h6>
            </div>
          </div>
          <div class="row">
	          <div class="col-md-6 ml-auto mr-auto text-center">
							<form action="" method="post" enctype="multipart/form-data">
							<!-- prints description from database -->
	            <p><?php echo $_SESSION['description']; ?></p>
	            <br />
							  <input type="file" name="upload">
							  <br />
							  <input type="submit">
	            <btn class="btn btn-outline-default btn-round" type="submit" value="Submit"><i class="fa fa-cog"></i>Settings</btn>
							</form>
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
										<?php
										// sql statement to seclect users who are following the session user
											$sql = "SELECT * FROM fm_users, fm_follows WHERE fm_users.user_id = fm_follows.user_id AND fm_follows.following_user_id = $MAIN_user_id";
											// connect to database
											$result = $conn->query($sql);
											while($row = $result->fetch_assoc())
												{
													// set fetched data from the rows into the variables
													$follow_user_id = $row['user_id'];
													$follow_user_first_name = $row['first_name'];
													$follow_user_last_name = $row['last_name'];
													$follow_user_title = $row['title'];
													$follow_user_image = $row['image_url'];

													// array of all users
													$all_users[] = $row['user_id'];
											?>
												<li>
													<div class="row">
														<div class="col-md-2 col-sm-2 ml-auto mr-auto">
															<!-- pulles image from database -->
															<img src="<?php echo $follow_user_image ?>" alt="Circle Image" class="img-circle img-no-padding img-responsive">
														</div>
														<div class="col-md-7 col-sm-4  ml-auto mr-auto">
															<!-- prints following me user`s first and last names, id and title -->
															<h6><?php echo ( $follow_user_first_name . " " . $follow_user_last_name . " " . 	$follow_user_id) ?><br/><small><?php echo $follow_user_title ?></small></h6>
														</div>
														<div class="col-md-3 col-sm-2  ml-auto mr-auto">
															<div class="form-check">
																<label class="form-check-label">
																	<!-- prints following the session user user id`s -->
																	<input class="form-check-input" type="checkbox" checked name="<?php echo $follow_user_id ?>" value="<?php echo $follow_user_id ?>" >
																		<span class="form-check-sign"></span>
																</label>
															</div>
														</div>
													</div>
												</li>
												<hr />
											<?php } ?>
            		</div>
							</ul>
            </div>
          </div>

					<div class="tab-pane text-center" id="following" role="tabpanel">
						<div class="row">
							<div class="col-md-6 ml-auto mr-auto">
								<ul class="list-unstyled follows">
									<?php
									// sql statement pulls data about users the current session user is following
										$sql = "SELECT * FROM fm_users, fm_follows WHERE fm_users.user_id = fm_follows.following_user_id AND fm_follows.user_id = $MAIN_user_id";
										$result = $conn->query($sql);
										while($row = $result->fetch_assoc())
											{
												// put rows into the variables
												$follow_user_id = $row['following_user_id'];
												$follow_user_first_name = $row['first_name'];
												$follow_user_last_name = $row['last_name'];
												$follow_user_title = $row['title'];
												$follow_user_image = $row['image_url'];

												// array of all users
												$all_users[]=$row['user_id'];
										?>
											<li>
												<div class="row">
													<div class="col-md-2 col-sm-2 ml-auto mr-auto">
														<!-- pictures of users that current user is following -->
														<img src="<?php echo $follow_user_image ?>" alt="Circle Image" class="img-circle img-no-padding img-responsive">
													</div>
													<div class="col-md-7 col-sm-4  ml-auto mr-auto">
														<!-- names, id`s, titles -->
														<h6><?php echo ( $follow_user_first_name . " " . $follow_user_last_name . " " .	$follow_user_id) ?><br/><small><?php echo $follow_user_title ?></small></h6>
													</div>
													<div class="col-md-3 col-sm-2  ml-auto mr-auto">
														<div class="form-check">
															<label class="form-check-label">
																<!-- users id`s -->
																<input class="form-check-input" type="checkbox" checked name="<?php echo $follow_user_id ?>" value="<?php echo $follow_user_id ?>" >
																<span class="form-check-sign"></span>
															</label>
														</div>
													</div>
												</div>
											</li>
											<hr />
										<?php } ?>
									</div>
								</ul>
							</div>
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
