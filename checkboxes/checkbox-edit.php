<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Checkbox-edit</title>
    <link rel="stylesheet" href="css/checkbox.css" />
  </head>
    <div class="container2">
      <div class="main2">
      <br/>
      <br/>
      <br/>
      <?php
        $connection = mysql_connect('localhost','root','');
        $db=mysql_select_db('store',$connection);
        $query=mysql_query("select * from checkbox",$connection);
        echo"CLICK ON THE DATA YOU WANT TO EDIT";
        echo"<br/><br/><br>";
        echo "<ol>";
        while($row=mysql_fetch_array($query))
        {
          echo "<li><a href=\"checkbox-edit.php $uid={$row["user_id"]}\">{$row[\"services\"]}</a></li><br/>";
        }

        if(isset($_GET['uid']))
        {
          $id=$_GET['uid'];
          $query2=mysql_query("select * from checkbox where user_id  = $id", $connection);
          while($row=mysql_fetch_array($query2))
          {
            $str=($row['services']);
            $data=(explode(",",$str));

            $check=array("Website Development","Data Support","Online Marketing","Business Development","Responsive Themes");
            if (in_array($check[0], $data))
            {
              $checked1 ="checked";
            }
            else
            {
              $checked1 ="";
            }

            if (in_array($check[1], $data))
            {
              $checked2 ="checked";
            }
            else
            {
              $checked2 ="";
            }
            if (in_array($check[2], $data))
            {
              $checked3 ="checked";
            }
            else
            {
              $checked3 ="";
            }
            if (in_array($check[3], $data))
            {
              $checked4 ="checked";
            }
            else
            {
              $checked4 ="";
            }
            if (in_array($check[4], $data))
            {
              $checked5 ="checked";
            }
            else
            {
              $checked5 ="";
            }

            echo "<form action='checkbox-edit.php $uid={$row ['user_id']}' method='POST'>

            <label class=\"heading\">Select the Services you want to insert:</label><br/><br/>
            <input type='checkbox' name='check_list[]' value='Website Development' $checked1 ><label>Website Development</label><br/>
            <input type='checkbox' name='check_list[]' value='Data Support' $checked2 ><label>Data Support</label><br/>
            <input type='checkbox' name='check_list[]' value='Online Marketing'$checked3 ><label>Online Marketing</label><br/>
            <input type='checkbox' name='check_list[]' value='Business Development'$checked4 ><label>Business Development</label><br/>
            <input type='checkbox' name='check_list[]' value='Responsive Themes'$checked5><label>Responsive Themes</label><br/><br/>
            <input type='submit' name='dsubmit' Value='update'>";
          }
        }
        if(isset($_POST['dsubmit']))
        {
          $id=$_GET['uid'];
          $checkedit=($_POST['check_list']);
          $chked='';
          foreach($_POST['check_list'] as $chked1)
          {
            $chked .= $chked1.",";
          }
          $sql="update checkbox set services='$chked'where user_id=$id";
          $query2=mysql_query($sql,$connection);
          echo"<br/><br/><br/>";
          echo"Data updated Successfully...!!!";
        }
        echo"</ol>";
        mysql_close($connection);
        echo"</br></br>";
        echo"<a href="demo_checkbox.php">HOME</a>";
      ?>
      </div>
    </div>
</html>
