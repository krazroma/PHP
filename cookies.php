<?php
//setcookie(name, value, expire, path, domain, secure, httponly);
$cookie_name = "last_visit";
$cookie_value = date("l jS \of F Y h:i:s A");// l -day of the week
//setcookie($cookie_name,$cookie_value, time() + (86400*30), "/");
//86400 = 1 day

if (isset($_COOKIE['last_visit']))
{
  $notification = "You have been here within 30 days";
  $last_visit = $_COOKIE['last_visit'];
  setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
}
else {
  $notification = "This is your first time here, or it`s been more than 30 days";
  setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
}

 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
    <h2>
    echo $notification;
    </h2>

    ($last_visit)? echo "<br /> Last Visit: " . $last_visit : echo "";;
      // if (isset($_COOKIE['user'])) {
      //   echo "You have been here before.";
      //   setcookie($cookie_name,$cookie_value, time() - (60), "/");
      //   // going back in time, makes an expired cookie, which browser will delete
      // }
      // else {//make the cookie
      //   echo "This is your first time here.";
      //   setcookie($cookie_name,$cookie_value, time() + (86400*30), "/");

      //setcookie($cookie_name,$cookie_value, time() + (86400*30), "/");
      //php7 allows this go work, otherwise would have to be up to before any html code
      //to see cookies in chrome-> settings to advanced settings to content settings to see all cookies
      //}
     ?>

  </body>
</html>
<!--
  <?php
  $cookie_name ="user";
  $cookie_value = "".date('m-d-Y')."";

  if (isset($_COOKIE[$cookie_name])){
      echo "Your last visit was on:  " .$_COOKIE[$cookie_name];
      $cookie_value = "".date('m-d-Y')."";
      setcookie($cookie_name, $cookie_value, time() + (86400*30), "/");
  }
  else {
    echo "This is your first time here. We are required to let you know that we use cookies.";
    setcookie($cookie_name, $cookie_value, time() + (86400*30), "/");
  }
   ?>
 -->
