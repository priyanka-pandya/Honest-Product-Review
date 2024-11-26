<?php
include 'db_connection.php'; // Include the database connection file

$query = "SELECT * FROM products";
$result = mysqli_query($conn, $query);

echo "<table border='1'>
        <thead>
            <tr>
                <th>Product Name</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>";

// Check if the query was successful
if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                <td>{$row['product_name']}</td>
                <td>{$row['product_description']}</td>
                <td>{$row['product_price']}</td>
                <td>{$row['created_at']}</td>
                <td>{$row['category']}</td>
                <td>
                    <a href='edit_product.php?id={$row['product_id']}'>Edit</a> |
                    <a href='delete_product.php?id={$row['product_id']}'>Delete</a>
                </td>
              </tr>";
    }
    echo "</tbody></table>";
} else {
    echo "Error: " . mysqli_error($conn);
}
?>
