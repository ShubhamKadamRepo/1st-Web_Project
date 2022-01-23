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
    }
    else {
        $Select = "SELECT email FROM register1 WHERE email = ? LIMIT 1";
        $Insert = "INSERT INTO register1(email, password,online) values(?, ?,0)";

        $stmt = $conn->prepare($Select);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->bind_result($resultEmail);
        $stmt->store_result();
        $stmt->fetch();
        $rnum = $stmt->num_rows;

        if ($rnum == 0) {
            $stmt->close();

            $stmt = $conn->prepare($Insert);
            $stmt->bind_param("ss",$email, $password);
            if ($stmt->execute()) {
                echo "New record inserted sucessfully.";
		header('Location: http://localhost:8011/L/Latest/index.html');
            }
            else {
                echo $stmt->error;
            }
           }
          else {
                echo "Someone already registers using this email.";
            }
            $stmt->close();
            $conn->close();
        }
    

?>