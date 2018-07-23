<?php
$servername = "localhost";
$username = "root";
$password = "root";
try {
    // Create connection
    $conn = new mysqli($servername, $username, $password ,'bamkocore');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
}catch(PDOException $e){
    echo "Connection failed: " . $e->getMessage();
}
?>
