<?php 
include('includes/db.php');

// Array of random names for demonstration (you can replace or fetch from DB)
$names = ["John Doe", "Alice Johnson", "Mark Smith", "Sophia Brown", "Zulekha Parveen", "A.S."];

if(isset($_GET['product_id'])) {
    $product_id = $_GET['product_id'];

    // Fetch reviews for the product using the provided product_id
    $query = "SELECT * FROM reviews WHERE product_id = ?";
    $stmt = $conn->prepare($query);

    if($stmt) {
        // Bind the product_id as an integer (i)
        $stmt->bind_param("i", $product_id);
        $stmt->execute();
        $reviews = $stmt->get_result();

        // Check if there are any reviews
        if ($reviews->num_rows > 0) {
            // Display reviews
            while ($review = $reviews->fetch_assoc()) {
                $random_name = $names[array_rand($names)];  // Randomly select a name from the array

                echo "<div class='review'>";
                echo "<p><strong>{$random_name} - </strong>" . $review['created_at'] . "</p>";
                echo "<p>" . $review['review_text'] . "</p>";
                echo "<div class='rating'>";
                echo str_repeat("<span class='star'>&#9733;</span>", $review['rating']); // Display stars based on rating
                echo "</div>";
                echo "</div>";
            }
        } else {
            // Display message if no reviews are available
            echo "<p>No reviews available for this product.</p>";
        }
    } else {
        echo "Failed to prepare the statement.";
    }
} else {
    echo "No product selected.";
    exit;
}
?>
