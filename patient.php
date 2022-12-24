<?php
    $id =  $_GET['id'];

    // Server name must be localhost
    $servername = "localhost";
    
    // In my case, user name will be root
    $username = "root";
    
    // Password is empty
    $password = "";
    
    $database = "hospital";
        
    // Creating a connection
    $conn = new mysqli($servername, $username, $password, $database);

    
    //Checking if this database is connected
    if ($conn->connect_error) {
        die("Connection failure: " 
            . $conn->connect_error);
    }


    // Performing insert query execution
    // here our table name is users
    $sql = "SELECT * FROM patient WHERE Id = $id" ;

    if(mysqli_query($conn, $sql)){
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
    }

    // Close connection
    mysqli_close($conn);    
    
?>

<html>
    <head>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <form class="userform" method="POST" action="./Logic/updatePatient.php">
            <label for="name"> Name </label>
            <input type="text" name="name" value="<?php echo (isset($row["Name"]) ? $row["Name"] : ""); ?>"/>

            <label for="diagnosis"> Diagnosis </label>
            <input type="text" name="diagnosis" value="<?php echo (isset($row["Diagnosis"]) ? $row["Diagnosis"] : ""); ?>"/>

            <label for="prescription"> Prescription </label>
            <input type="text" name="prescription" value="<?php echo (isset($row["Prescription"]) ? $row["Prescription"] : ""); ?>"/>

            <label for="history"> History </label>
            <input type="text" name="history" value="<?php echo (isset($row["History"]) ? $row["History"] : ""); ?>"/>

            <input type="hidden" name="id" value="<?php echo (isset($row["Id"]) ? $row["Id"] : ""); ?>" />

            <input type="Submit" name="submit" value="Update"/>
        </form>
        <form class="userform" method="POST" action="./Logic/pdfGen.php">
            <input type="hidden" name="id" value="<?php echo (isset($row["Id"]) ? $row["Id"] : ""); ?>" />
            <input type="Submit" name="submit" value="Download Report"/>
        </form>
        <form class="userform" method="POST" action="./Logic/deletePatient.php">
            <input type="hidden" name="id" value="<?php echo (isset($row["Id"]) ? $row["Id"] : ""); ?>" />
            <input type="Submit" name="submit" value="Delete Report"/>
        </form>
    </body>
</html>