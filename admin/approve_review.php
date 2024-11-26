<?php
include 'db_connection.php'; // Include database connection file

// Check if the review ID is provided
if (isset($_GET['id'])) {
    $review_id = $_GET['id'];

    // Update the review status to approved
    $approve_query = "UPDATE reviews SET status = 'approved' WHERE review_id = $review_id";
    if (mysqli_query($conn, $approve_query)) {
        echo "Review approved successfully.";
        header("Location: manage_reviews.php"); // Redirect to manage reviews page
        exit;
    } else {
        echo "Error approving review: " . mysqli_error($conn);
    }
} else {
    echo "No review ID provided.";
}
?>
