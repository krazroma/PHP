<?php


$output = shell_exec('ls -lah');
echo "<pre>$output</pre>";

$pwd = shell_exec('$pwd');
echo "<pre>$pwd</pre>";


//$folder_test = file_exists("test");


$filename = 'test';

if (file_exists($filename))
{
    echo "The file $filename exists";
}
else
{
    echo "The file $filename does not exist";
}

// $dirname = $_POST["test"];
// $filename = "/folder/" . $dirname . "/";
//
// if (!file_exists($filename)) {
//     //mkdir("folder/" . $dirname, 0777);
//     //echo "The directory $dirname was successfully created.";
//     echo "The directory $dirname exists.";
//     exit;
// } else {
//     echo "The directory $dirname doesn`t exist.";
// }

 ?>
