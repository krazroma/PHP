<?php
if (!isset($_SESSION))
{
  session_start();
}

if (!isset($_SESSION['username']))
{
  header('Location: login.php');
}

if (isset($_SESSION['username']))
{
  echo "<a href =\"register.php\"> Register</a>";
  echo "<a href =\"login.php\"> | Login</a>";
  echo "<a href =\"upload.php\"> | Upload</a>";
  echo "<a href =\"users.php\"> | Users</a>";
}

// if (isset($_POST))
if(isset($_POST['username']) && isset($_POST['password']))
{
  require('dbconnection.php');
  //$userid = $_POST['userid'];
  $username = $_POST['username'];
  $password = $_POST['password'];
  // $sql = "UPDATE users set username = \"$username\" WHERE userid = $userid";
  $sql = "UPDATE users SET username='" . $_POST['username'] . "' WHERE userid= " . $_POST['userid'];

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
  //var_dump($result);
  header('Location: users.php');
}


if (isset($_GET['id']) && $_GET['edit']=="edit")
{
  require('dbconnection.php'); // bring in database connection
  $sql = "SELECT * FROM users WHERE userid = " . $_GET['id'];// is is int datatype dont comment out
  $result = $conn->query($sql);

  echo "<form action=\"\" method=\"post\">";

  while($row = $result->fetch_assoc())
  {
    // echo "<input type =\"text\" disabled value=\"" . $row['userid'] . "\">";
    // echo "<br />";
    echo "<input name=\"userid\" type =\"text\" hidden value=\"" . $row['userid'] . "\">";
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
 ?>
