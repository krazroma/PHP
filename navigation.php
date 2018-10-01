
<?php
if (!isset($_SESSION))
{
  session_start();
}//checks if global variable for session is set
if (!isset($_SESSION['username']))//check to see session is started
{
  header('Location: login.php');
}
 ?>
  <br />
 <a href="register.php">| Register</a>
 <a href="upload.php">| Upload</a>
 <a href="users.php">| Users</a>
 <a href="login.php">| Log In</a>
 <br />
