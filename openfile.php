
<?php
  
  // The location of the PDF file
  // on the server
  if($_POST['submit']){
    $filename = $_POST["file"];
  }
  
  
  header('Content-type: application/pdf');
  header('Content-Disposition: inline; filename="' . $filename . '"');
  header('Content-Transfer-Encoding: binary');
  header('Content-Length: ' . filesize($filename));
  header('Accept-Ranges: bytes');
  
  @readfile($filename);
  ?> 