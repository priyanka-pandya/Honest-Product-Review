<?php
include 'db_connection.php'; // Include database connection file

// Check if the review ID is provided
if (isset($_GET['id'])) {
    $review_id = $_GET['id'];

    // Fetch the existing review details
    $query = "SELECT * FROM reviews WHERE review_id = $review_id";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $review = mysqli_fetch_assoc($result);
    } else {
        echo "Review not found.";
        exit;
    }
} else {
    echo "No review ID provided.";
    exit;
}

// Handle form submission for updating the review
if (isset($_POST['update'])) {
    $review_text = mysqli_real_escape_string($conn, $_POST['review_text']);
    $rating = (int)$_POST['rating'];

    // Update the review in the database
    $update_query = "UPDATE reviews SET review_text = '$review_text', rating = $rating WHERE review_id = $review_id";
    if (mysqli_query($conn, $update_query)) {
        echo "Review updated successfully.";
        header("Location: manage_reviews.php"); // Redirect to manage reviews page
        exit;
    } else {
        echo "Error updating review: " . mysqli_error($conn);
    }
}
?>

<!-- HTML Form to Edit the Review -->
<form method="POST" action="">
    <label for="review_text">Review Text:</label><br>
    <textarea name="review_text" rows="5" cols="50"><?php echo $review['review_text']; ?></textarea><br><br>
    <label for="rating">Rating:</label><br>
    <input type="number" name="rating" value="<?php echo $review['rating']; ?>" min="1" max="5"><br><br>
    <input type="submit" name="update" value="Update Review">
</form>
