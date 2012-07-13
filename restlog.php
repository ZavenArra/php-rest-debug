<?php
function foreachPrint($fh, $myArray){
  foreach($myArray as $h=>$v){
    fwrite($fh, "$h = $v\n");
    if(is_array($v)){
      foreachPrint($fh, $v);
    }
  }
}
$myFile = "requestslog.txt";
$fh = fopen($myFile, 'a') or die("can't open file");
fwrite($fh, "\n\n---------------------------------------------------------------\n");
foreach($_SERVER as $h=>$v)
    fwrite($fh, "$h = $v\n");
fwrite($fh, "REQUEST\n");
foreachPrint($fh, $_REQUEST);
fwrite($fh, "FILES\n");
foreachPrint($fh, $_FILES);
fwrite($fh, "\r\n");
fwrite($fh, file_get_contents('php://input'));
fclose($fh);
echo "<html><head /><body><iframe src=\"$myFile\" style=\"height:100%; width:100%;\"></iframe></body></html>"
?>
