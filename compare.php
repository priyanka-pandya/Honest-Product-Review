<?php
// Include the database connection
include('includes/db.php');

// Initialize variables
$product1 = '';
$product2 = '';
$category = 'all'; // Default to 'all'
$product1_details = null;
$product2_details = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['product1']) && isset($_POST['product2'])) {
        $product1 = mysqli_real_escape_string($conn, $_POST['product1']);
        $product2 = mysqli_real_escape_string($conn, $_POST['product2']);
    }
    $category = mysqli_real_escape_string($conn, $_POST['category']); // Capture the selected category
    
    // Query to get details of product 1
    if (!empty($product1)) {
        $query1 = "SELECT * FROM products WHERE product_id = '$product1'";
        $result1 = mysqli_query($conn, $query1);
        if ($result1) {
            $product1_details = mysqli_fetch_assoc($result1);
        }
    }

    // Query to get details of product 2
    if (!empty($product2)) {
        $query2 = "SELECT * FROM products WHERE product_id = '$product2'";
        $result2 = mysqli_query($conn, $query2);
        if ($result2) {
            $product2_details = mysqli_fetch_assoc($result2);
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compare Products</title>
    <link rel="stylesheet" href="css/compare.css">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
     <script>
        // JavaScript for smooth scrolling
        document.addEventListener('DOMContentLoaded', function () {
            const links = document.querySelectorAll('a[href^="#"]');
            for (const link of links) {
                link.addEventListener('click', function (e) {
                    e.preventDefault();
                    const targetId = this.getAttribute('href');
                    document.querySelector(targetId).scrollIntoView({ behavior: 'smooth' });
                });
            }
        });
    </script>
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
                 <li><a href="explore.php" class="explore-button">Explore</a></li>
                <li><a href="login.php" class="login-button">Login</a></li>
             </ul>
        </nav>
    </header>

<div class="comparison-tool">
    <h2>Find Your Best Product</h2>
    <p>Compare products based on reviews and ratings</p>

    <form action="compare.php" method="post">
        <div class="search-and-category">
            <div class="category-select">
                <select name="category" id="category" onchange="this.form.submit()">
                    <option value="all" <?php if ($category == 'all') echo 'selected'; ?>>All Categories</option>
                    <option value="electronics" <?php if ($category == 'electronics') echo 'selected'; ?>>Electronics</option>
                    <option value="beauty" <?php if ($category == 'beauty') echo 'selected'; ?>>Beauty Products</option>
                </select>
            </div>
        </div>
        <div class="product-comparison">
            <div class="product-selection">
                <label for="product1">Product 1:</label>
                <select name="product1" id="product1" required>
                    <option value="" disabled selected>Select Product</option>
                    <?php
                    // Modify the query to fetch products based on the selected category
                    $query = "SELECT product_id, product_name FROM products";
                    if ($category != 'all') {
                        $query .= " WHERE category = '$category'";
                    }
                    $result = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<option value='".$row['product_id']."'>".$row['product_name']."</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="product-selection">
                <label for="product2">Product 2:</label>
                <select name="product2" id="product2" required>
                    <option value="" disabled selected>Select Product</option>
                    <?php
                    // Repeat the same query for product 2
                    $result = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<option value='".$row['product_id']."'>".$row['product_name']."</option>";
                    }
                    ?>
                </select>
            </div>
        </div>

        <button type="submit" class="compare-btn">Compare</button>
    </form>

    <!-- Display product comparison if both products are selected -->
    <?php if ($product1_details && $product2_details): ?>
         <div class="comparison-results">
    <h3>Comparison Results</h3>
    <div class="product-comparison">
        <div class="product-detail">
            <h4><?php echo $product1_details['product_name']; ?></h4>
            <img src="images/iphone 15 pro.jpg" alt="<?php echo $product1_details['product_name']; ?>" width="150">

            <p><?php echo $product1_details['product_description']; ?></p>
            <p>Price: ₹<?php echo number_format($product1_details['product_price']); ?></p>
            <p>Rating: <i class="fas fa-star"></i> 4.5</p> <!-- Example rating -->
        </div>
        <div class="product-detail">
            <h4><?php echo $product2_details['product_name']; ?></h4>
            <img src="images/s24.jpg" alt="<?php echo $product2_details['product_name']; ?>" width="150">
            <p><?php echo $product2_details['product_description']; ?></p>
            <p>Price: ₹<?php echo number_format($product2_details['product_price']); ?></p>
            <p>Rating: <i class="fas fa-star"></i> 4.0</p> <!-- Example rating -->
        </div>
    </div>
</div>

    <?php endif; ?>
</div>
<!-- Footer -->
  <footer>
      <div id="ft">
         <p>&copy; 2024 Honest Product Review. All Rights Reserved.</p>
      </div>
  </footer>
</body>
</html>
