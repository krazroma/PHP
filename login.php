<?php
session_start();
require('dbconnection.php');
require('nav.php');



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

if (isset($_POST['username']))
{
  $username = $_POST['username'];
  $password = $_POST['password'];
  // sql statement to execute. Surroundvariables with single quotes
  $sql = "SELECT username, password FROM users where username = '$username'";

  // execute the sql and return array to $result
  $result = $conn->query($sql);

  // Extraction the returned query information
  while ($row = $result->fetch_assoc())
  { // $row[username] is value from database
    if ($username == $row['username'] && password_verify($password, $row['password']))
    {
      $_SESSION['username'] = $username;
    } // closes if statement
  } // closes while loop
} // closes POST condition

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <?php

    if (isset($_POST['logout']))
    {
      unset($_SESSION['username']);
    }
  ?>

  <body>

    <a href="register.php">Register</a>

  <?php

    if(isset($_SESSION['username']))
    {
      echo "<a href=\"upload.php\"> | Upload</a>";
    }

    if(isset($_SESSION['username']))
    {
      echo "<a href=\"users.php\"> | Users</a>";
    }
  ?>

    <br />


    <form method="post" action="">
      <input type="text" name="username" placeholder="Enter Username"> <br />
      <input type="password" name="password">
      <br>
      <input type="submit" value="go">
      <br>
      <input type="submit" name="logout" value="logout">
    </form>

    <?php
      echo "Logged in as: " . $_SESSION['username'];

      //if (isset($username) && isset($password))
      //{
        // echo "Username was " . $username;
        // echo "<br>";
        // echo "Password was " . $password;
      //  if ($username == "matthew" && $password == "password")
      //  {
      //    $_SESSION['username'] = $username;
    ?>

  </body>
</html>
