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
        $password = $_POST["password"];
        $username = $_POST["username"];
    }

    // Performing insert query execution
    // here our table name is users
    $sql = "SELECT * FROM users WHERE Username='$username'";

    if(mysqli_query($conn, $sql)){
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        if($password == $row["Password"]){
            if($row["Role"] == "Service Worker"){
                header('Location: ../service.php?id='.$row["Id"].'');
            }
            else if($row["Role"] == "Doctor"){
                header('Location: ../servicedoc.php?id='.$row["Id"].'');
            }
            else{
                header('Location: ../admin.php?id='.$row["Id"].'');
            }
        }
        else{
            echo "<h1>Incorrect Password</h1>";
        }
    } else{
        echo "ERROR: Hush! Sorry $sql. "
            . mysqli_error($conn);
    }
    
    // Close connection
    mysqli_close($conn);

?>