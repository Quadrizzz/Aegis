<?php
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


    //Storing the form values inside variables
    if($_POST['submit']){
        $id = $_POST["id"];
    }

    // Performing insert query execution
    // here our table name is users
    $sql = "DELETE FROM patient WHERE Id='$id'";

    if(mysqli_query($conn, $sql)){
        $result = mysqli_query($conn, $sql);
        header('Location: ../service.php');
    } else{
        echo "ERROR: Hush! Sorry $sql. "
            . mysqli_error($conn);
    }
    
    // Close connection
    mysqli_close($conn);

?>