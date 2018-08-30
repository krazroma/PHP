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
    </form>

    <?php
      echo "Username was " . $username;
      echo "<br>";
      echo "Password was " . $password;
    ?>

  </body>
</html>
