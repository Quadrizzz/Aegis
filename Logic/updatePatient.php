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
        $name = $_POST["name"];
        $diagnosis = $_POST["diagnosis"];
        $prescription = $_POST["prescription"];
        $history = $_POST["history"];
        $id = $_POST["id"];
    }

    // Performing insert query execution
    // here our table name is users
    $sql = "UPDATE patient SET Name = '$name', Diagnosis = '$diagnosis', Prescription = '$prescription', History = '$history' WHERE Id='$id'";

    if(mysqli_query($conn, $sql)){
        $result = mysqli_query($conn, $sql);
        header('Location: ../patient.php?id='.$id.'');
    } else{
        echo "ERROR: Hush! Sorry $sql. "
            . mysqli_error($conn);
    }
    
    // Close connection
    mysqli_close($conn);

?>