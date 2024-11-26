<?php
include 'db_connection.php'; // Include the database connection file

// Check if the product ID is provided
if (isset($_GET['id'])) {
    $product_id = $_GET['id'];

    // Disable foreign key checks temporarily
    mysqli_query($conn, "SET FOREIGN_KEY_CHECKS=0");

    // First, delete any related records from the compare table where the product is in product1 or product2
    $delete_compare_query = "DELETE FROM compare WHERE product1 = ? OR product2 = ?";
    $stmt = $conn->prepare($delete_compare_query);
    if ($stmt) {
        $stmt->bind_param("ii", $product_id, $product_id);
        $stmt->execute();
        $stmt->close();
    } else {
        echo "Error preparing statement for deleting related records: " . $conn->error;
        exit;
    }

    // Now, delete the product from the products table
    $delete_product_query = "DELETE FROM products WHERE product_id = ?";
    $stmt = $conn->prepare($delete_product_query);
    if ($stmt) {
        $stmt->bind_param("i", $product_id);
        if ($stmt->execute()) {
            echo "Product deleted successfully.";
            header("Location: manage_products.php"); // Redirect to manage products page
            exit;
        } else {
            echo "Error deleting product: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Error preparing statement for deleting product: " . $conn->error;
    }

    // Re-enable foreign key checks
    mysqli_query($conn, "SET FOREIGN_KEY_CHECKS=1");
} else {
    echo "No product ID provided.";
}

$conn->close();
?>
