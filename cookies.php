<?php
//setcookie(name, value, expire, path, domain, secure, httponly);
$cookie_name = "last_visit";
$cookie_value = date("l jS \of F Y h:i:s A");// l -day of the week
//setcookie($cookie_name,$cookie_value, time() + (86400*30), "/");
//86400 = 1 day

if (isset($_COOKIE['last_visit']))
{
  $notification = "You were here last " .(time() - $_COOKIE['last_visit']). " seconds ago.";
  $cookie_value = time();
  setcookie($cookie_name, $cookie_value, time() + (86400*30), "/");
  // $notification = "You have been here within 30 days";
  $last_visit = $_COOKIE['last_visit'];
}
else
{
  $notification = "This is your first time here, or it`s been more than 30 days";
  $cookie_value = time();
  setcookie($cookie_name, $cookie_value, time() + (86400*30), "/");
}


 // if (isset($_COOKIE[$cookie_name])){
   //echo "You were here last " .(time() - $_COOKIE[$cookie_name]). " seconds ago.";
   // $cookie_value = time();
   // setcookie($cookie_name, $cookie_value, time() + (86400*30), "/");
 // }
 // else {
 //   echo "This is your first time here. We are required to let you know that we use cookies.";
 //   $cookie_value = time();
 //   setcookie($cookie_name, $cookie_value, time() + (86400*30), "/");
 // }

 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h2>
      <?php
          //echo $notification;
          echo ($last_visit != "")? "Last Visit: " . (time() - $_COOKIE['last_visit']) . " seconds ago.": "";
          // echo $notification;
          // echo "<br /> " . time();
          //echo "<br />";
          //echo $visit_time;
          //var_dump($_COOKIE);
       ?>
    </h2>
  </body>
</html>
