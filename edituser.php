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
  echo "<input type =\"text\" disabled value=\"$row['userid']\">";
}

}
else
{
  echo "You should not be here."
}

 ?>
