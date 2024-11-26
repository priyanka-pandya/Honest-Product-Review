<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header('Location: admin_login.php'); // Redirect to the login page if not logged in
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="admin_style.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> <!-- Chart.js for graphs -->
</head>
<body>
    <div class="sidebar">
        <h2>Admin Panel</h2>
        <ul>
            <li><a href="admin_dashboard.php">Dashboard</a></li>
            <li><a href="manage_users.php">Manage Users</a></li>
            <li><a href="manage_reviews.php">Manage Reviews</a></li>
            <li><a href="manage_products.php">Manage Products</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </div>
<div class="main-content">
        <h1 style="margin-top: 20px;">Welcome, Admin</h1>
        <div class="cards">
            <div class="card">
                <h3>Total Users</h3>
                <p>150</p>
            </div>
            <div class="card">
                <h3>Total Products</h3>
                <p>30</p>
            </div>
            <div class="card">
                <h3>Total Reviews</h3>
                <p>200</p>
            </div>
        </div>

        <div class="chart-section">
            <h2>Site Analytics</h2>
            <canvas id="userChart"></canvas>
        </div>
    </div>

    <script>
        // Chart.js configuration for displaying the analytics graph
        const ctx = document.getElementById('userChart').getContext('2d');
        const userChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun','july','Aug','Sep','Oct'],
                datasets: [{
                    label: 'User Registrations',
                    data: [10, 20, 15, 25, 29, 20,25,23,30,40],
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 2,
                    fill: false
                }]
            },
            options: {
                responsive: true,
                
                plugins: {
                    legend: {
                        display: true,
                        position: 'top'
                    }
                }
            }
        });
    </script>
</body>
</html>

     