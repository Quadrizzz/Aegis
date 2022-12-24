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
    else{
        echo "Connection Succesful";
    }

    //Storing the form values inside variables
    if($_POST['submit']){
        $name = $_POST["name"];
        $diagnosis = $_POST["diagnosis"];
        $prescription = $_POST["prescription"];
        $history = $_POST["history"];
    }

    // Performing insert query execution
    // here our table name is users
    $sql = "INSERT INTO patient (Name, Diagnosis, Prescription, History) VALUES ('$name', '$diagnosis', '$prescription', '$history')";


    if(mysqli_query($conn, $sql)){
        header('Location: ../service.php');
    } else{
        echo "ERROR: Hush! Sorry $sql. "
            . mysqli_error($conn);
    }
    
    // Close connection
    mysqli_close($conn);

?>
