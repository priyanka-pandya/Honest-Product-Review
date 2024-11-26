<?php
include 'db_connection.php'; // Include the database connection

$user_id = $_GET['id']; // Get the user ID from the URL

// First delete associated reviews
$delete_reviews_query = "DELETE FROM reviews WHERE user_id = $user_id";
mysqli_query($conn, $delete_reviews_query);

// Now delete the user
$delete_user_query = "DELETE FROM users WHERE user_id = $user_id";
if (mysqli_query($conn, $delete_user_query)) {
    echo "User deleted successfully.";
    header('Location: manage_users.php'); // Redirect back to the user management page
} else {
    echo "Error deleting user: " . mysqli_error($conn);
}
?>
