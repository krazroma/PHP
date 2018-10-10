<?php


$output = shell_exec('ls -lah');
echo "<pre>$output</pre>";

$pwd = shell_exec('$pwd');
echo "<pre>$pwd</pre>";


$filename = '/test';

if (file_exists($filename))
{
    echo "The file $filename exists";
}
else
{
    echo "The file $filename does not exist";
}

 ?>
