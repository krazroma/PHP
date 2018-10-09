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

  //$cookie_value = time();
  //$last_visit = $_COOKIE['last_visit'];
  setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
}
else {
  $notification = "This is your first time here, or it`s been more than 30 days";
  setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
}

// if (isset($_COOKIE['last_visit']))
// {
//   echo "Last time you were here " . (time()- $_COOKIE[])$change . " seconds ago";
//   $change = time() - $cookie_value;
//   $visit_time = "Last time you were here " . $change . " seconds ago";
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
          echo $notification;
          echo ($last_visit != "")? "<br /> Last Visit: " . $last_visit : "";
          echo "<br /> " . time();
          //echo "<br />";
          //echo $visit_time;
          //var_dump($_COOKIE);
       ?>
    </h2>
  </body>
</html>
