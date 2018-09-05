<?php
// setting up the Database connection
$db_host = 'localhost'; // Database is installed on the PHPH server
$db_user = 'roman'; // name to log in to MySQL
$db_password = 'southhills#'; // password to login to MySQL
$db_name = 'roman'; // name of the database within MySQL
$conn = new mysqli($db_host, $db_user, $db_password, $db_name)
if ($conn->connect_error)
{
  die("Connection Failed: " . $conn->connect_error);
}
?>
