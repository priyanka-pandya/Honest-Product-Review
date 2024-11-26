<?php
include('includes/db.php');
session_start();

if (!isset($_SESSION['user_id'])) {
    echo "Please log in to submit a review.";
    exit;
}

$user_id = $_SESSION['user_id']; // Retrieve from session


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form inputs
    $product_id = $_POST['product_id'];
    $user_id = $_POST['user_id']; // Assuming you have a way to get the user ID
    $review_text = $_POST['review_text'];
    $rating = $_POST['rating']; // Assume this is a number between 1 and 5

    // Prepare the SQL statement
    $query = "INSERT INTO reviews (user_id, product_id, review_text, rating, created_at) VALUES (?, ?, ?, ?, NOW())";
    $stmt = $conn->prepare($query);

    if ($stmt) {
        // Bind parameters
        $stmt->bind_param("iisi", $user_id, $product_id, $review_text, $rating);
        
        // Execute the statement
        if ($stmt->execute()) {
            echo "Review submitted successfully!";
            // Optionally redirect to the product page or reviews page
            header("Location: reviews.php?product_id=" . $product_id);
            exit;
        } else {
            echo "Error: " . $stmt->error;
        }
    } else {
        echo "Failed to prepare the statement.";
    }
} else {
    echo "Invalid request.";
}
?>
