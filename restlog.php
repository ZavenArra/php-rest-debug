<?php
$myFile = "requestslog.txt";
$fh = fopen($myFile, 'a') or die("can't open file");
fwrite($fh, "\n\n---------------------------------------------------------------\n");
foreach($_SERVER as $h=>$v)
  if(ereg('HTTP_(.+)',$h,$hp))
    fwrite($fh, "$h = $v\n");
fwrite($fh, "\r\n");
fwrite($fh, file_get_contents('php://input'));
fclose($fh);
echo "<html><head /><body><iframe src=\"$myFile\" style=\"height:100%; width:100%;\"></iframe></body></html>"
?>
