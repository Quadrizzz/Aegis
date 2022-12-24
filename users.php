<?php 
    session_start();

    // Server name must be localhost
    $servername = "localhost";
    
    // In my case, user name will be root
    $username = "root";
        
    // Password is empty
    $password = "";
    
    $database = "hospital";
        
    // Creating a connection
    $conn = new mysqli($servername, $username, $password, $database);

    $patients = array();
    
    //Checking if this database is connected
    if ($conn->connect_error) {
        die("Connection failure: " 
            . $conn->connect_error);
    }



    $sql = "SELECT * FROM users" ;

    if(mysqli_query($conn, $sql)){
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($result)){
            $patients[] = $row;
        }
    }
    
?>

<html>
    <head>
    <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <section class="servicemain">
            <div class="patients">
                <?php
                    if($patients[0]){
                        foreach($patients as $patient){
                            echo '<div class="patient_card">
                                    <a href="./user.php?id='.$patient["Id"].'"><img src="./image1.png"/></a> 
                                    <p><a href="./user.php?id='.$patient["Id"].'">'.$patient["Name"].'</a></p>
                                    <p><strong><a href="./user.php?id='.$patient["Id"].'">'.$patient["Email"].'</a></strong></p>
                                    <p><a href="./user.php?id='.$patient["Id"].'">'.$patient["Username"].'</a></p> 
                                    <p><a href="./user.php?id='.$patient["Id"].'">'.$patient["Role"].'</a></p>   
                                  </div>';
                        }
                    }
                    else{
                        echo '<p>There are no patients added..</p>';
                    } 
                ?>
            </div>
            <p><a href="./addUser.php">Add New User</p></p>
                
                <form method="GET" action="./Logic/logout.php">
                    <input type="submit" value="Log Out"/>
                </form>
        </section>
    </body>
</html>


