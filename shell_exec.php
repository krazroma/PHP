<?php


$output = shell_exec('ls -lah');
echo "<pre>$output</pre>";

$pwd = shell_exec('$pwd');
echo "<pre>$pwd</pre>";


$file_test = file_exists("test");

    if ($file_test)
    {
      $folder_test = is_dir("test");
      if ($folder_test)
      {
        echo "test exists, and it is a folder <br />";
        $testArray = scandir("test/");
        // var_dump($testArray);
        // print_r($testArray);
        foreach ($testArray as $key => $value)
        {
          if($value == "." || $value == "..")
          {
            continue;
          }
          echo $value . "<br />";
        }

      }
      else
      {
        echo "test exists and it is a file";
      }
    }
    else
    {
      mkdir("test");
    }

    $users = shell_exec('w');
    echo "<pre>$users</pre>";
    "<br />"
    "<br />"
    "<br />"
    var_dump($users);
    "<br />"
    "<br />"
    "<br />"
    $salad = explode(" ", $users);
    echo $salad[0];

 ?>
