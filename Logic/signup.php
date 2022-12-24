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
        $email = $_POST["email"];
        $password = $_POST["password"];
        $designation = $_POST["designation"];
        $username = $_POST["username"];
    }

    // Performing insert query execution
    // here our table name is users
    $sql = "INSERT INTO users (Name, Email, Username, Password, Role) VALUES ('$name', '$email', '$username', '$password', '$designation')";


    if(mysqli_query($conn, $sql)){
        if($designation == "Service Worker"){
            header('Location: ../service.php?id='.$row["Id"].'');
        }
        else if($designation == "Doctor"){
            header('Location: ../servicedoc.php?id='.$row["Id"].'');
        };
    } else{
        echo "ERROR: Hush! Sorry $sql. "
            . mysqli_error($conn);
    }
    
    // Close connection
    mysqli_close($conn);

?>
