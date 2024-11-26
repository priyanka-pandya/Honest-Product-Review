<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Honest Product Review</title>
    <link rel="stylesheet" href="css/explore.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;700&display=swap" rel="stylesheet">
    <script>
        // JavaScript for smooth scrolling and navigation
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

        document.addEventListener('DOMContentLoaded', function() {
            const detailButtons = document.querySelectorAll('.view-details-button');
            const reviewButtons = document.querySelectorAll('.review-button');
            
            detailButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const productId = this.getAttribute('data-product-id');
                    window.location.href = `product_details.php?product_id=${productId}`;
                });
            });

            reviewButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const productId = this.getAttribute('data-product-id');
                    window.location.href = `reviews.php?product_id=${productId}`;
                });
            });
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
                <li><a href="compare.php" class="compare-button">Compare</a></li>
                <li><a href="login.php" class="login-button">Login</a></li>
            </ul>
        </nav>
    </header>
    
     
    <!-- Products Display Section -->
    <section class="products">
        <h2>Explore Variety of Products</h2>
        <div class="product-grid">
           <!-- Product Card for Cellreturn LED Device -->
<div class="product-card">
    <img src="images/shopping.jpg" alt="Cellreturn LED Device">
    <h3>Home Skin Care Light Therapy Wireless Device</h3>
    <div class="rating">
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star-half-alt checked"></span>
        <span class="fa fa-star"></span>
        <span class="rating-percentage"> 76% (58) </span>
    </div>
    <button class="view-details-button" data-product-id="6">View Details</button>
    <button class="review-button" data-product-id="6">See All Reviews</button>
    <!-- Add Review Form -->
    <div class="review-form">
        <form action="submit_review.php" method="POST">
            <input type="hidden" name="product_id" value="6"> <!-- Dynamically set Product ID -->
            <textarea name="review_text" placeholder="Write your review..." required></textarea>
            <label for="rating">Rating:</label>
            <select name="rating" required>
                <option value="1">1 Star</option>
                <option value="2">2 Stars</option>
                <option value="3">3 Stars</option>
                <option value="4">4 Stars</option>
                <option value="5">5 Stars</option>
            </select>
            <button type="submit">Submit Review</button>
        </form>
    </div>
</div>

<!-- Product Card for Correcting Concentrate -->
<div class="product-card">
    <img src="images/cc8.jpg" alt="Correcting Concentrate">
    <h3>Correcting Concentrate Icons</h3>
    <div class="rating">
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star"></span>
        <span class="fa fa-star"></span>
        <span class="rating-percentage"> 73% (78) </span>
    </div>
    <button class="view-details-button" data-product-id="3">View Details</button>
    <button class="review-button" data-product-id="3">See All Reviews</button>

    <!-- Add Review Form -->
    <div class="review-form">
        <form action="submit_review.php" method="POST">
            <input type="hidden" name="product_id" value="3"> <!-- Dynamically set Product ID -->
            <textarea name="review_text" placeholder="Write your review..." required></textarea>
            <label for="rating">Rating:</label>
            <select name="rating" required>
                <option value="1">1 Star</option>
                <option value="2">2 Stars</option>
                <option value="3">3 Stars</option>
                <option value="4">4 Stars</option>
                <option value="5">5 Stars</option>
            </select>
            <button type="submit">Submit Review</button>
        </form>
    </div>
</div>


             
             

        </div>
    </section>

    <!-- Footer -->
    <footer>
        <p>&copy; 2024 Honest Product Review. All Rights Reserved.</p>
    </footer>
</body>
</html>
