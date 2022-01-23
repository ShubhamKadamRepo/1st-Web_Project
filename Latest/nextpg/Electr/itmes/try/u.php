<?php 

    $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbName = "test";

   $conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);

    if ($conn->connect_error) {
        die('Could not connect to the database.');
    }
    else {
        
        $COL = "SELECT email FROM register1 WHERE online = '1'";

	    $result = mysqli_query($conn,$COL);
	    $num = mysqli_num_rows($result);

            if ($num == 1 ){
                echo "New record inserted sucessfully.";
            }
            else {
                echo "LOL";
            }
            $conn->close();
        }
    

?>