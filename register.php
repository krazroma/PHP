<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
  require('dbconnection.php');
  // grab POST data could be dangerous because of XSS (cross site inctiption) or SQL injection
  $username = $_POST['username'];
  // sanitaze the $username by remove tags
  $username = filter_var($username, FILTER_SANITAZE_STRING);
  // grab POST data password will be hashed so no need to sanitaze
  $password = $_POST['password'];
  $password = password_hash($password, PASSWORD_BCRYT);
  $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
  $conn->query($sql);
}
 ?>

 <!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form method="post" action="">
      <a href="login.php">Login</a>
      <br>
      <input type="text" name="username"> <br>
      <input type="password" name="password"> <br>
      <input type="submit">
    </form>
  </body>
</html>
