<?php
$currentPageUrl = 'http://' . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
//echo "$currentPageUrl";
	$fav = $currentPageUrl;
    $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbName = "test";

	
    


   $conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);

    if ($conn->connect_error) {
        die('Could not connect to the database.');
    }
    else {
           $COL= "SELECT email FROM register1 WHERE online = '1'";
           $Insert = "UPDATE register1 SET fav = '$fav' WHERE online = '1' ";
			
            
			$result = mysqli_query($conn,$COL);
			$num = mysqli_num_rows($result);
			$stmt = $conn->prepare($Insert);
            
		
		if ($num == 1 ){
			if ($stmt->execute()){
				echo "New record inserted sucessfully.";
			}else{
			echo $stmt->error;
			$stmt->close();
			$conn->close();
		}
	}
}
?>