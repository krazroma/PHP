<?php
if (!isset($_SESSION))
{
  session_start();
}

if (!isser($_SESSION['username']))
// die("Don`t even think about it");
header('login.php');
?>

Upload your file.
<form action="" method="post" >
  <input type="file" name="upload">
  <br>
  <input type="submit">
</form>
