<?php
session_start();
require('dbconnection.php');
// add submit button on the buttom of the page so user can follow or unfollow someone

// once users were selected or deselected we hit subbmit button

// create a for loop to searh through the submitted data
if(isset($_POST['user_id']) && isset($_POST['password']))
{
  require('dbconnection.php');
  //$userid = $_POST['userid'];
  $username = $_POST['username'];
  $password = $_POST['password'];
  // $sql = "UPDATE users set username = \"$username\" WHERE userid = $userid";
  $sql = "UPDATE users SET username='" . $_POST['username'] . "' WHERE userid = " . $_POST['userid'];

  $result = $conn->query($sql);
  if($result)
  {
    $msg = "Updated Sussecfully";
    echo "$msg";
  }
  else
  {
    $msg = "Error Updating";
    echo "$msg";
  }
  //var_dump($result);
  //header('Location: users.php');
}

$sql3 = "SELECT COUNT(user_id) FROM fm_users";
$result3 = $conn->query($sql3);
while ($row3 = $result3->fetch_assoc())
{
  $ids[] = $row3['user_id'];
  //print_r($row3);
  var_dump($ids);
}


// $_POST[i] and decide if box was checked or unchecked

  if( $_POST["Roman"])
  {
    echo "Welcome: " . $_POST['Roman'] . " <br />";
    // echo "Your value is: ". $_POST["1"]. "<br />";
  }

  // $checked_count = count($_POST['Roman']);
  // echo $checked_count;


// <form action="" method="POST">
//  <input type="checkbox" name="user" value="following_user_id"> Name<br>
//  <input type="checkbox" name="user" value="following_user_id"> Name<br>
//  <input type="checkbox" name="user" value="following_user_id"> Name<br>
//  <input type="checkbox" name="user" value="following_user_id"> Name<br>

// do an sql statement $sql=INCERT INTO or UPDATE...
// connect to db
// then do while loop and do it for all the users
// while($row = $result->fetch_assoc)
//{
//  $following_user_ids[]=$row['following_user_id'];
//}

// if wasnt checked
// do another sql query $sql= DELETE....
// connect to debug
// while($row = $result->fetch_assoc)
//{
//  $following_user_ids[]=$row['following_user_id'];
//}


$sql = "SELECT * FROM fm_users";
$result = $conn->query($sql);

$MAIN_user_id = $_SESSION['user_id'];

//sql2 = "SELECT following_user_id FROM fm_follows WHERE user_id = " . $_SESSION['user_id'];
$sql2 = "SELECT * FROM fm_follows WHERE user_id = '$MAIN_user_id'";
$result2 = $conn->query($sql2);

//$row2 = $result2->fetch_row();
while($row2 = $result2->fetch_assoc())
{
  $folliwing_user_ids[] = $row2['following_user_id'];
  //print_r( array_values( $folliwing_user_ids ));
}
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
            <form action="#" method="post" >
              <?php while($row = $result->fetch_assoc())
                {
              ?>

                <li>
                  <div class="row">
                    <div class="col-md-2 col-sm-2 ml-auto mr-auto">
                      <img src="<?php echo $row['image_url']; ?>" alt="Circle Image" class="img-circle img-no-padding img-responsive">
                    </div>
                    <div class="col-md-7 col-sm-4  ml-auto mr-auto">
                      <h6><?php echo $row['first_name']; echo " "; echo $row['last_name']; echo " "; echo $row['user_id'];?><br/><small><?php echo $row['title']; ?></small></h6>
                    </div>
                    <div class="col-md-3 col-sm-2  ml-auto mr-auto">
                      <div class="form-check">
                        <label class="form-check-label">

                          <input class="form-check-input" type="checkbox" <?php
                              $user_id = $row['user_id'];
                              if(in_array("$user_id", $folliwing_user_ids))
                              {
                                echo "checked";
                              }
                          ?> name="Roman" value="<?php echo $user_id ?>">
                            <span class="form-check-sign"></span>
                        </label>
                      </div>
                    </div>
                  </div>
                </li>
                <hr />
              <?php } ?>
              <input type="submit" value="Submit" button class="btn btn-danger btn-block btn-round">
            </form>
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
