<?php session_start() ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <?php
    $username = $_GET['username'];
    $password = $_GET['password'];
  ?>

  <body>
    <form method="get" action="">
      <input type="text" name="username" placeholder="Enter Username"> <br />
      <input type="password" name="password">
      <br>
      <input type="submit" value="go">
      <br>
      <input type="submit" name="logout" value="logout">
    </form>

    <?php
    if (isset($username) && isset($password))
    {
      // echo "Username was " . $username;
      // echo "<br>";
      // echo "Password was " . $password;
      if ($username == "matthew" && $password == "password")
      {
        $_SESSION['username'] = $username;
      }
    }

    echo "Logged in as: " . $_SESSION['username'];

    ?>

  </body>
</html>
