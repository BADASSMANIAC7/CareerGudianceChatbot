<?php
$servername = "localhost";
$username = "root"; // Change this if needed
$password = "Siddu@786"; // Your database password
$dbname = "chatbot_db"; // Change to your database name

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
