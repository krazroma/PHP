<?php
// if (!isset($_SESSION)){
//   session_start();
// }
session_start();

require('dbconnection.php');
$sql = "SELECT * FROM fm_users";
$sql2 = "SELECT * FROM fm_follows where used_id = " . $_SESSION['user_id'];
$result = $conn->query($sql);
$result2 = $conn->query($sql2);

echo $result2;
// while ($row2 = $result2->fetch_assoc())
// {
//   if ($user_email == $row['user_email'])
//   {
//        $_SESSION['user_id'] = $row['user_id'];
//        $_SESSION['following_user_id'] = $row['following_user_id'];
//    }
//  }
//
//  echo $_SESSION['user_id'];
//  echo $_SESSION['following_user_id'];

//var_dump($row = $result2->fetch_assoc());
// get array of users from Database
// <li> needs to be in the loop of database records
// replace flume with first and last name of database
// "music producer with title" image source should point to their profile url
// checkbox shod be unchecked



?>
<!doctype html>
<html lang="en">
<head>
        <meta charset="utf-8" />
        <link rel="icon" type="image/png" href="../assets/img/favicon.ico">
        <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

        <title>Follow me by Matthew</title>

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
           <a class="navbar-brand" href="#">Follow Me</a>
      </div>
      <div class="collapse navbar-collapse" id="navbarToggler">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a href="login.php" class="nav-link">Login</a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link"><?php echo $_SESSION['user_email']; ?></a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="wrapper">
    <div class="page-header page-header-xs" data-parallax="true" style="background-image: url('../assets/img/fabio-mangione.jpg');">
      <div class="filter"></div>
    </div>
      <br />
      <br />
      <div class="row">
        <div class="col-md-6 ml-auto mr-auto">
          <ul class="list-unstyled follows">

          <?php while($row = $result->fetch_assoc())
            {
              ?>

            <li>
              <div class="row">
                <div class="col-md-2 col-sm-2 ml-auto mr-auto">
                  <img src="<?php echo $row['image_url']; ?>" alt="Circle Image" class="img-circle img-no-padding img-responsive">
                </div>
                <div class="col-md-7 col-sm-4  ml-auto mr-auto">
                  <h6><?php echo $row['first_name']; echo " "; echo $row['last_name'];?><br/><small><?php echo $row['title']; ?></small></h6>
                </div>
                <div class="col-md-3 col-sm-2  ml-auto mr-auto">
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="form-check-input" type="checkbox" value="" <?php
                      if ($row2='122')
                      {
                        echo checked;
                        var_dump($result2);
                      }
                      ?>>
                        <span class="form-check-sign"></span>
                    </label>
                  </div>
                </div>
              </div>
            </li>
            <hr />
          <?php } ?>

          </ul>
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
