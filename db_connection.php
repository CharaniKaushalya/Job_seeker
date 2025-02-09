<?php
$servername = "localhost"; // Usually "localhost"
$username = "root"; // Your MySQL username (default for XAMPP is 'root')
$password = ""; // Your MySQL password (default is empty for XAMPP)
$dbname = "job_portal"; // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
