<?php
      if (!isset($_SESSION))
      {
        session_start();
      }

      if (!isset($_SESSION['username']))
      {
        header('Location: login.php');
      }

if (isset($_GET['id']) && $_GET['edit']=="edit")
{
  require('dbconnection.php'); // bring in database connection
  $sql = "SELECT * FROM users WHERE userid = " . $_GET['id'];// is is int datatype dont comment out
  $result = $conn->query($sql);

  echo "<form action=\"\" method=\"post\">";

  while($row = $result->fetch_assoc())
  {
    echo "<input name=\"userid\" type =\"text\" disabled value=\"" . $row['userid'] . "\">";
    echo "<br />";
    echo "<input name=\"username\" type =\"text\" value=\"" . $row['username'] . "\">";
    echo "<br />";
    echo "<input name=\"password\" type =\"text\" value=\"" . $row['password'] . "\">";
    echo "<br />";
    echo "<input type=\"submit\" name=\"submit\" value=\"change\">";
  }
  echo "</form>";

}
else
{
  echo "You should not be here.";
}

if(isset($_GET['username']) && isset($_GET['password']))
{
  $username = $_GET['username'];
  $password = $_GET['password'];
  $sql = "UPDATE users SET username=" . $_GET['username'] . "WHERE userid=" . {$_SESSION['id']});
  $result = $conn->query($sql);
  if($result)
  {
    $msg = "Updated Sussecfully";
    echo "$msg";
  }
  else
  {
    $msg = "Error Updating";
    echo "$msg";
  }

}

 ?>
