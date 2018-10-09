<?php
$output = shell_exec('ls -lah');
echo "<pre>$output</pre>";

$pwd = shell_exec('$pwd');
echo "<pre>$pwd</pre>";
 ?>
