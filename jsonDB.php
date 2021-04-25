<?php

$Body = file_get_contents('php://input');

$myfile = fopen($_GET['name'], "w") or die("Unable to open file!");
$txt = $Body;

fwrite($myfile, $txt);
fclose($myfile);
?>