<?php
     
    $email = $_POST['email'];
    $password = $_POST['password'];
        

    $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbName = "test";

    


    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);

    if ($conn->connect_error) {
        die('Could not connect to the database.');
    }else {
	$COL= "SELECT email FROM register1 WHERE email = '$email'";
	$COL1= "SELECT email FROM register1 WHERE password = '$password' ";

	$result = mysqli_query($conn,$COL);
	$result1 = mysqli_query($conn,$COL1);

	$num = mysqli_num_rows($result);
	$num1 = mysqli_num_rows($result1);

	if($num == 1 && $num1 == 1){
	$U = "UPDATE register1 SET online = '1' WHERE email = '$email'";
	if($conn->query($U)){
		header('Location: http://localhost:8011/L/Latest/index.html');
	  
	}

	}elseif($num == 1 && $num1 == 0){
		echo "wrong password";
	}else{
			echo '<script>alert("Register Please")</script>';
			header('Location: http://localhost:8011/L/Latest/log%20reg/register.html');
		}
	}
?>