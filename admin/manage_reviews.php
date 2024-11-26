<?php 
include 'db_connection.php'; // Adjust the path as per your structure

$query = "SELECT * FROM reviews";
$result = mysqli_query($conn, $query);

// Start the table and include table headers for better organization
echo "<table border='1' cellpadding='10' cellspacing='0'>
        <thead>
            <tr>
                <th>Review ID</th>
                <th>user ID</th>
                <th>Product ID</th>
                <th>Review Text</th>
                <th>Rating</th>
                <th>created AT</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>";

// Check if the query was successful
if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                <td>{$row['review_id']}</td>
                <td>{$row['user_id']}</td>
                <td>{$row['product_id']}</td>
                <td>{$row['review_text']}</td>
                <td>{$row['rating']}</td>
                <td>{$row['created_at']}</td>
                <td>
                    <a href='edit_review.php?id={$row['review_id']}'>Edit</a> |
                    <a href='delete_review.php?id={$row['review_id']}'>Delete</a> |
                    <a href='approve_review.php?id={$row['review_id']}'>Approve</a>
                </td>
              </tr>";
    }
} else {
    echo "<tr><td colspan='4'>Error: " . mysqli_error($conn) . "</td></tr>"; // Display the error if the query fails
}

// End the table
echo "</tbody>
      </table>";
?>
