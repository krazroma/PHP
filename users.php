<?php

// check to see if session has started
if (!isset($_SESSION))
{
  session_start();
}

// if user is not logged in, send them to login page

if (!isset($_SESSION['username']))
{
  // die("Don`t even think about it");
  header('Location: login.php');
}

// bring in database connection
require('dbconnection.php');

if (isset($_POST['id']) && isset($_POST['delete']))
{
  $sql = "DELETE FROM users WHERE userid = " . $_POST['id'] . ";";
  $result = $conn->query($sql);
}

// create the sql query
$sql = "SELECT * from users";

// execute the sql query
$result = $conn->query($sql);

// close db connection
$conn->close();

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <table>
      <tr>
        <th>User Id</th>
        <th>User Name</th>
        <th>Password Hash</th>
        <th>Action</th>
        </th>
      </tr>

      <?php
      // loop through tavle records

      while($row = $result->fetch_assoc())
      {
        echo "<tr>";
          echo "<td>" . $row['userid'] . "</td>";
          echo "<td>" . $row['username'] . "</td>";
          echo "<td>" . $row['password'] . "</td>";
          echo "<td>
                  <form action=\"\" method=\"post\">
                    <input name=\"id\" type=\"hidden\" value=\"" . $row['userid'] . "\">
                    <input type=\"submit\" value=\"delete\" name=\"delete\">
                  </form>
                </td>";
        ?>

<!--Another way of doing php in html
        <td>
            <form action="" method="post">
              <input type="hidden" name="id" value=" <?php echo $row['userid']; ?> ">
              <input type="submit" value="delete" name="delete">-->
            </form>
        </td>

       <?php
              echo "</tr>";
        }
        ?>
    </table>
  </body>
</html>
