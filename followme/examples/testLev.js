$main_user = $_SESSION['userid'];


$sql="SELECT * FROM fm_users";
$result = $conn->query($sql);
$all_user=array();
while ($row = $result->fetch_assoc())
{
    $all_user[]=$row['userid'];
}

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    //var_dump($all_user);
    foreach ($all_user as $value1) {
        foreach($_POST as $key => $value2)
        {
            $found=0;
            if ($value1 == $value2){// echo " This value: ".$value1." is in! <br />";
            $found=1;
            $sql3 ="INSERT INTO fm_follow (user_id, follow_by) VALUES ($main_user,$value1)";
            $result3 = $conn->query($sql3);
            break;
            }
        }
        if ($found==0){//echo "This value: ".$value1." is NOT FOUND! <br />";
            $sql4 ="DELETE FROM fm_follow WHERE user_id='$main_user' AND follow_by='$value1'";
            $result4 = $conn->query($sql4);

        }
    }
}



$user_data=array();
$sql2 = "SELECT * FROM fm_follow WHERE user_id = " . $_SESSION['userid'];
$result2 = $conn->query($sql2);
while ($row2 = $result2->fetch_assoc())
{
        $user_data[]=$row2['follow_by'];
}
//var_dump($user_data);
function checkUser($user,$user_data )
{//this handles the checking to make sure users are properly displayed when following
  if (in_array("$user", $user_data)) {echo "checked";}// else {echo "checked";}
}
?>
