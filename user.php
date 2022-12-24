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
    $sql = "SELECT * FROM users WHERE Id = $id" ;

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
        <form class="userform" method="POST" action="./Logic/updateUser.php">
            <label for="name"> Name </label>
            <input type="text" name="name" value="<?php echo (isset($row["Name"]) ? $row["Name"] : ""); ?>"/>

            <label for="diagnosis"> Email </label>
            <input type="text" name="email" value="<?php echo (isset($row["Email"]) ? $row["Email"] : ""); ?>"/>

            <label for="prescription"> Username </label>
            <input type="text" name="username" value="<?php echo (isset($row["Username"]) ? $row["Username"] : ""); ?>"/>

            <label for="history"> Role </label>
            <input type="text" name="role" value="<?php echo (isset($row["Role"]) ? $row["Role"] : ""); ?>"/>

            <input type="hidden" name="id" value="<?php echo (isset($row["Id"]) ? $row["Id"] : ""); ?>" />

            <input type="Submit" name="submit" value="Update"/>
        </form>

        <form class="userform" method="POST" action="./Logic/deleteUser.php">
            <input type="hidden" name="id" value="<?php echo (isset($row["Id"]) ? $row["Id"] : ""); ?>" />
            <input type="Submit" name="submit" value="Delete User"/>
        </form>
    </body>
</html>