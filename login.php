<?php
session_start();
require('dbconnection.php');

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
    if ($username == $row['username'] && $password == $row['password'])
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
