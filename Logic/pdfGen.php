<?php
    require_once '../fpdf/fpdf.php';
    
    // Server name must be localhost
    $servername = "localhost";
    
    // In my case, user name will be root
    $username = "root";
    
    // Password is empty
    $password = "";
    
    $database = "hospital";
        
    // Creating a connection
    $conn = new mysqli($servername, $username, $password, $database);

    if($_POST['submit']){
        $id = $_POST["id"];
    }
    
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
        $pdf = new FPDF('P','mm', 'A4');
        $pdf->AddPage();
        $pdf->SetFont('arial','','10');

        $pdf->Cell('12', '10', $row["Id"], '1','1', 'C',);

        $pdf->Cell('100', '10', '', '0', '2');

        $pdf->Cell('30','10','Date','1','3','C',);

        $pdf->Cell('180', '10', $row["date_added"], '1', '4');

        $pdf->Cell('100', '10', '', '0', '5');

        $pdf->Cell('30','10','Name','1','6','C',);

        $pdf->Cell('180', '10', $row["Name"], '1', '7');

        $pdf->Cell('100', '10', '', '0', '8');

        $pdf->Cell('36','10','Diagnosis','1','9','C',);

        $pdf->Cell('180', '70', $row["Diagnosis"], '1', '10');

        $pdf->Cell('100', '10', '', '0', '11');

        $pdf->Cell('40','10','Prescription','1','12','C',);

        $pdf->Cell('180', '70', $row["Prescription"], '1', '13');

        $pdf->Cell('100', '10', '', '0', '14');

        $pdf->Cell('40','10','History','1','15','C',);

        $pdf->Cell('180', '70', $row["History"], '1', '16');
        $pdf->Output();
    }

    // Close connection
    mysqli_close($conn);
    
?>