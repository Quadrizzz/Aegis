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


    // Performing insert query execution
    // here our table name is users
    $sql = "SELECT * FROM patient" ;

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
                                    <a href="./patient.php?id='.$patient["Id"].'"><img src="./image1.png"/></a> 
                                    <p><a href="./patient.php?id='.$patient["Id"].'">'.$patient["date_added"].'</a></p>
                                    <p><strong><a href="./patient.php?id='.$patient["Id"].'">Diag_Report_'.$patient["Name"].'</a></strong></p>
                                    <p><a href="./patient.php?id='.$patient["Id"].'">'.$patient["Name"].'</a></p>  
                                  </div>';
                        }
                    }
                    else{
                        echo '<p>There are no patients added..</p>';
                    } 
                ?>
            </div>
            <p><a href="./addPatient.php">Add New Patient</p></p>

            <form method="GET" action="./Logic/logout.php">
                <input type="submit" value="Log Out"/>
            </form>
        </section>
    </body>
</html>


