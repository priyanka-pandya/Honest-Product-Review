<?php
include 'db_connection.php'; // Include database connection file

// Check if the review ID is provided
if (isset($_GET['id'])) {
    $review_id = $_GET['id'];

    // Delete the review from the database
    $delete_query = "DELETE FROM reviews WHERE review_id = $review_id";
    if (mysqli_query($conn, $delete_query)) {
        echo "Review deleted successfully.";
        header("Location: manage_reviews.php"); // Redirect to manage reviews page
        exit;
    } else {
        echo "Error deleting review: " . mysqli_error($conn);
    }
} else {
    echo "No review ID provided.";
}
?>
