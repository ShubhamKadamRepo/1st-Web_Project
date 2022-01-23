<?php
     
    $fav = $_POST['inputc'];
        

    $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbName = "test";

    


   $conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);

    if ($conn->connect_error) {
        die('Could not connect to the database.');
    }
    else {
        
        $Insert = "INSERT INTO register1(fav) values(?) WHERE id = 9";
            $stmt = $conn->prepare($Insert);
            $stmt->bind_param("s",$fav);
            if ($stmt->execute()) {
                echo "New record inserted sucessfully.";
            }
            else {
                echo $stmt->error;
            }
            $stmt->close();
            $conn->close();
        }
    

?>