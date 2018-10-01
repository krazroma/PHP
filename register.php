<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
  require('dbconnection.php');
  $username = $_POST['username'];
  $password = $_POST['password'];
  $password = password_hash($password, PASSWORD_BCRYT)
  $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
  $conn->query($sql);
}
require('dbconnection.php');
 ?>



<?php
if (!isset($_SESSION))
{
  require('nav.php');
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

 <!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form method="post" action="">
      <input type="text" name="username"> <br>
      <input type="password" name="password"> <br>
      <input type="submit">
    </form>
  </body>
</html>
