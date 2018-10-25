
<?php
session_start();
if($_SERVER['REQUEST_METHOD'] == 'POST')
{//connection setup
    $db_host = 'localhost'; // database is installed on php server
    $db_user = 'lev'; // name to login to mysql
    $db_password = 'southhills#'; // password
    $db_name = 'lev'; //name of db
    $conn = new mysqli($db_host,$db_user,$db_password,$db_name);
    if ($conn->connect_error){ die("Connection failed: ". $conn->connect_error);}
  $sql ="UPDATE fm_users SET firstname='".$_POST['firstname']."', lastname='".$_POST['lastname']."',
  title='".$_POST['title']."', descr='".$_POST['descr']."' WHERE userid = " . $_SESSION['userid'];
  $result = $conn->query($sql);
  $sql="SELECT * FROM fm_users WHERE userid = " . $_SESSION['userid'];
  $result = $conn->query($sql);
  while ($row = $result->fetch_assoc()) {
    if (($_SESSION['userid'] == $row['userid']))
        {
      $_SESSION['firstname'] = $row['firstname'];
            $_SESSION['lastname'] = $row['lastname'];
            $_SESSION['title'] = $row['title'];
            $_SESSION['descr'] = $row['descr'];
            header('Location: profile.php');
    }
  }//ends while loop for post checking
}
?>
this is php
for edit profile
<?php
session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST')
{//connection setup
    $db_host = 'localhost'; // database is installed on php server
    $db_user = 'lev'; // name to login to mysql
    $db_password = 'southhills#'; // password
    $db_name = 'lev'; //name of db
    $conn = new mysqli($db_host,$db_user,$db_password,$db_name);
    if ($conn->connect_error){ die("Connection failed: ". $conn->connect_error);}
//user authentication
    $email=$_POST['email'];
  $password=$_POST['password'];
  $sql="SELECT * FROM fm_users WHERE email = '$email' ";
  $result = $conn->query($sql);
  while ($row = $result->fetch_assoc()) {
    if (($email == $row['email']) && password_verify($password, $row['password']))
        {

            $_SESSION['email'] = $email;//used to authenticate our session to stay logged in;
            $_SESSION['password'] = $row['password'];
            $_SESSION['userid'] = $row['userid'];
            $_SESSION['firstname'] = $row['firstname'];
            $_SESSION['lastname'] = $row['lastname'];
            $_SESSION['image'] = $row['image'];
            $_SESSION['title'] = $row['title'];
            $_SESSION['descr'] = $row['descr'];
            $loggedIn = 1;
            header('Location: profile.php');
    }
  }//ends while loop for post checking
}
?>
