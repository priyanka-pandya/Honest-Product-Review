<?php
include 'db_connection.php'; // Ensure the path is correct

// Check if the product ID is provided
if (isset($_GET['id'])) {
    $product_id = $_GET['id'];

    // Fetch the product details
    $query = "SELECT * FROM products WHERE product_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $product_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $product = $result->fetch_assoc();
    } else {
        echo "Product not found.";
        exit;
    }
} else {
    echo "No product ID provided.";
    exit;
}

// Handle form submission for editing the product
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $product_name = $_POST['product_name'];
    $product_description = $_POST['product_description'];
    $product_price = $_POST['product_price'];
    $category = $_POST['category'];

    // Update the product in the database
    $update_query = "UPDATE products SET product_name = ?, product_description = ?, product_price = ?, category = ? WHERE product_id = ?";
    $update_stmt = $conn->prepare($update_query);
    $update_stmt->bind_param("ssdsi", $product_name, $product_description, $product_price, $category, $product_id);
    if ($update_stmt->execute()) {
        echo "Product updated successfully.";
    } else {
        echo "Error updating product: " . $conn->error;
    }
}
?>

<!-- Edit Product Form -->
<form method="POST" action="">
    Product Name: <input type="text" name="product_name" value="<?php echo htmlspecialchars($product['product_name']); ?>"><br>
    Description: <textarea name="product_description"><?php echo htmlspecialchars($product['product_description']); ?></textarea><br>
    Price: <input type="number" step="0.01" name="product_price" value="<?php echo htmlspecialchars($product['product_price']); ?>"><br>
    Category: <input type="text" name="category" value="<?php echo htmlspecialchars($product['category']); ?>"><br>
    <input type="submit" value="Update Product">
</form>
