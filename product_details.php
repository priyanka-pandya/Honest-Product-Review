<?php
// Connect to your database
include ('includes/db.php'); 

// Check if product_id is set
if(isset($_GET['product_id'])) {
    $product_id = $_GET['product_id'];

    // Fetch product details from the database
    $query = "SELECT * FROM products WHERE product_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $product_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows > 0) {
        $product = $result->fetch_assoc();
    } else { 
        echo "Product not found.";
        exit;
    }
} else {
    echo "No product selected.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $product['product_name']; ?></title>
    <link rel="stylesheet" href="css/product_details.css">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;700&display=swap" rel="stylesheet">

</head>
<body>

<!-- Header -->
<header>
    <div class="logo">
        <img src="images/logo.png" alt="Logo">
        <h1 class="dancing-script">HonestProductReview</h1>
    </div>
    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="compare.php" class="compare-button">Compare</a></li>
            <li><a href="login.php" class="login-button">Login</a></li>
        </ul>
    </nav>
</header>

<!-- Product Details Section -->
 <!-- Product Details Section -->
<div class="product-details">
    <h1><?php echo $product['product_name']; ?></h1>
    <img src="images\shopping.jpg" alt="<?php echo $product['product_name']; ?>">
    <p><?php echo $product['product_description']; ?></p>
    <p><strong>Price:</strong> ₹<?php echo number_format($product['product_price'], 2); ?></p>
    <h4>Details:</h4>
    <p>You need to check your skin resilience...</p> <!-- Add the long description from the database -->
</div>

<div class="product-details">
    <h1><?php echo $product['product_name']; ?></h1>
    <img src="images/cc8.jpg" alt="<?php echo $product['product_name']; ?>">
    <p><?php echo $product['product_description']; ?></p>
    <p><strong>Price:</strong> ₹<?php echo $product['product_price']; ?></p>

    <h4>Details:</h4>
    <p><strong>Targets:</strong> Hyper-pigmented skin & brightens uneven tone</p>
    <h4>Benefits:</h4>
    <ul>
        <li>Brightens</li>
        <li>Smoothes</li>
        <li>Evens Tone</li>
    </ul>
    <h4>Good for:</h4>
    <ul>
        <li>Reducing dullness</li>
        <li>Minimizing inflammation</li>
        <li>Correcting discoloration</li>
        <li>Evening out skin tone</li>
        <li>Fading dark spots and blemishes</li>
        <li>Hydrating and replenishing the skin</li>
        <li>Protecting against free radical damage</li>
        <li>Achieving a healthy, even skin</li>
    </ul>
    <h4>Skin Moods:</h4>
    <p>Works for all skin moods/types, especially for dull, sun-damaged, pigmentation-prone skin.</p>
    <h4>Skin Goals:</h4>
    <p>A brighter, more even skin tone with enhanced hydration and protection against free radical damage for radiant, healthy skin.</p>
    <h4>Texture + Notes:</h4>
    <p>Lightweight serum delivering a plumping skin finish with a subtle pink shimmer and refreshing, mild botanical notes.</p>
</div>

<!-- Footer -->
<footer>
    <p>&copy; 2024 Honest Product Review. All Rights Reserved.</p>
</footer>

</body>
</html>
