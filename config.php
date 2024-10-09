<?php
// Database configuration
$servername = "localhost"; // Change if needed
$username = "root"; // Database username
$password = ""; // Database password
$dbname = "msttc_db"; // Your database name

// Create connection
$connect = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
}
?>