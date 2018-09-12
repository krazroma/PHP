<?php
if (!isset($_SESSION))
{
  session_start();
}

if (!isset($_SESSION['username']))
{
  // die("Don`t even think about it");
  header('Location: login.php');
}

/*var_dump($_POST['upload']);
echo "<hr />";
var_dump($_FILES['upload']);*/

if (isset($_FILES['upload']))
{
  $targer_dir = "uploads/";
  $targer_file = $targer_dir . basename($_FILES['upload']['name']);
  move_uploaded_files($_FILES['upload']['tmp_name'], $target_file);
}
?>

Upload your file.
<form action="" method="post" enctype="multipart/form-data">
  <input type="file" name="upload">
  <br />
  <input type="submit">
</form>
