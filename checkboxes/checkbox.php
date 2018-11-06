<html><head><title>Checkbox Test</title>
<link rel="stylesheet" href="css/checkbox.css" />
</head>
<div class="container">
<div class="main">
<br/>
<br/>
<br/>
<?php
if(isset($_POST['submit'])){
if(!empty($_POST['check_list'])) {
//database connection
$connection = mysql_connect('localhost','root','');
$db=mysql_select_db('store',$connection);
//Counting number of checked checkboxes
$checked_count = count($_POST['check_list']);
$checkbox1=$_POST['check_list'];
$chk="";
echo "You have inserted following ".$checked_count." option(s): <br/>";
echo"</br>";
//Loop to store and display values of individually checked checkbox
foreach($_POST['check_list'] as $selected) {
echo "<p>".$selected ."</p>";
}
foreach($checkbox1 as $chk1)
{
$chk .= $chk1.",";
}
$query=mysql_query("insert into checkbox(services) values ('$chk')",$connection);
echo"<br>";
if($query==1)
{
echo"Data Inserted Successfully";
}
echo"<br/><br/><br/>";
echo"<form action="checkbox-edit.php" method="post">
<input type="submit" name="dsubmit1" Value="Edit"/>
</form>

<form action="checkbox-delete.php" method="post">
<input type="submit" name="dsubmit2" Value="Delete"/>
</form>";
}
else
{
echo"Failed To Insert, Please select at least one option";
}
}

?>
</br>
</br>
<a href="demo_checkbox.php">HOME</a>
</div>
</div>
</html>