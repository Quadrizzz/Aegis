
<?php
// PHP program to delete a file named gfg.txt
// using unlink() function
 
if($_POST['submit']){
    $filename = $_POST["file"];
}
   
// writing on a file named gfg.txt 
 
// Use unlink() function to delete a file
if (!unlink($filename)) {
    echo ("$filename cannot be deleted due to an error");
}
else {
    echo ("$filename has been deleted");
    header("Location: ./questionaire.php");
}
  
?>