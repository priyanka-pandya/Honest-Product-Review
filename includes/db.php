<?php
$servername = "localhost";
$port = "3307";  // Update to "3306" if 3307 is not the correct port
$username = "root";
$password = "";
$dbname = "honestproductreview";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname, $port);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
  