<?php
$servername = "localhost";
$port = "3307";  // Specify the port
$username = "root";
$password = "";
$dbname = "honestproductreview";

// Create connection for admin dashboard
$conn = new mysqli($servername, $username, $password, $dbname, $port);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Example query to fetch products
$stmt = $conn->prepare("SELECT * FROM products WHERE product_name = ?");

// Error handling for the prepare statement
if ($stmt === false) {
    die("Error in prepare statement: " . $conn->error);
}

// Example usage with a product name
$productName = "Example Product";
$stmt->bind_param("s", $productName);
$stmt->execute();
$result = $stmt->get_result();

// Fetch and display results
while ($row = $result->fetch_assoc()) {
    echo $row["product_name"] . "<br>";
}

// Close the statement and connection
$stmt->close();
 
 