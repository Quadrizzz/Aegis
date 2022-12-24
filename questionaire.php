<?php
$arrFiles = array();
$temp= '';
$iterator = new FilesystemIterator("./Questionaires");
foreach($iterator as $entry) {
    $arrFiles[] = $entry->getFilename();
}
?>


<html>
    <head>
    <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div class="dirMain">
            <?php 
                if($arrFiles[0]){
                    foreach($arrFiles as $files){
                        $temp = str_replace(' ', '', $files);
                        echo '<div class="file">
                                <p>'.$files.'</p>
                                <form action="./openfile.php" method="POST">
                                    <input type="hidden" name="file" value="./Questionaires/'.$temp.'" />
                                    <input type="submit" name="submit" value="Open File"/>                           
                                </form>
                                <form action="./deletefile.php" method="POST">
                                    <input type="hidden" name="file" value="./Questionaires/'.$temp.'" />
                                    <input type="submit" name="submit" value="Delete File"/>                           
                                </form>
                            </div>';
                    }
                }
            
            ?>
        </div>
    </body>
</html>