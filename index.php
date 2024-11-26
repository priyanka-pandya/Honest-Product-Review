<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Honest Product Review</title>
    <link rel="stylesheet" href="css/homepage.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;700&display=swap" rel="stylesheet">
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
                 <li><a href="compare.php" class="compare-button">Compare</a></li>
                <li><a href="explore.php" class="explore-button">Explore</a></li>
                <li><a href="login.php" class="login-button">Login</a></li>
             </ul>
        </nav>
    </header>

    <!-- Main Content -->
    <main>
        <!-- Hero Section -->
        <div class="hero-section">
    <div class="homepic"></div> <!-- Animated background container -->
    <div class="hero-content">
                <h2>Unbiased Insights</h2>
                <p>Unveiling the Real Deal: Dive into Unfiltered Product Reviews and Ratings</p>
                <a href="#reviews-section" class="cta-button">Discover More</a>
            </div>
        </div>

        <!-- Reviews Section -->
        <section id="reviews-section" class="reviews-section">
            <h2>What Our Customers Say</h2>
            <div class="reviews-container">
                <!-- Individual review cards -->
                <div class="review-card">
                    <p>I never knew skincare could be this easy! Thanks to HonestProductReview, I found my holy grail product.</p>
                    <div class="review-author">Samantha</div>
                </div>
                <div class="review-card">
                    <p>HonestProductReview's reviews helped me choose the perfect equipment for my home gym.</p>
                    <div class="review-author">Michael</div>
                </div>
                <div class="review-card">
                    <p>I trust HonestProductReview for all my supplement needs. Their recommendations never disappoint!</p>
                    <div class="review-author">Emily</div>
                </div>
            </div>
        </section>
 <!-- Products Section -->
<section id="products-section" class="products-section">
    <h2>Featured Products</h2>
    <div class="products-container">
        <!-- Product images here -->
        <img src="images/Product 1.jpg" alt="Product 1">
        <img src="images/Product 2.jpg" alt="Product 2">
        <img src="images/Product 3.jpg" alt="Product 3">
        <img src="images/Product 4.jpg" alt="Product 4">
        <img src="images/Product 5.jpg" alt="Product 5">
        <img src="images/Product 6.jpg" alt="Product 6">
        <img src="images/Product 7.jpg" alt="Product 7">
        <img src="images/Product 8.jpg" alt="Product 8">
        
    </div>
</section>
</main>
<footer>
    <p>&copy; 2024 Honest Product Review</p>
    <p><a href="admin/admin_login.php">admin Login</a></p>
    </footer>
</body>
</html>