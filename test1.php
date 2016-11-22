<?php 

$postUrl=$_SERVER["REQUEST_URI"]; 

if(strpos($postUrl,'storeavalue')){ 
  // Storing a Value

  // Get that tag
  $tag = trim($tag); 
  // Get the value 
  $value = trim($value); 

  // In this example, output to a file, but could use MySQL, or anything
  $myFile = "testFile.txt";
  $fh = fopen($myFile, 'w') or die("can't open file");
  fwrite($fh, str_replace('"', '', $value));
  fclose($fh);

} else { 
  // Retrieving a Value

  $tag = trim($tag); 

  $myFile = "testFile.txt";
  $fh = fopen($myFile, 'r');
  $theData = fgets($fh);
  fclose($fh);

  if ($theData == "two times table") {
    $resultData = array("VALUE",$tag,array('1 x 2 = '=>2,'2 x 2 = '=>4,'3 x 2 = '=>6,'4 x 2 = '=>8,'5 x 2 ='=>10));
  } else {
    $resultData = array("VALUE",$tag,array($theData));
  }

  $resultDataJSON = json_encode($resultData); 
  echo $resultDataJSON; 

} 

?> 