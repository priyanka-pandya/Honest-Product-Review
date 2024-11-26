<?php
// Include the database connection file
include 'db_connection.php'; // Adjust with your actual connection file

// Check if the user_id is set in the URL
if (isset($_GET['id'])) {
    $user_id = $_GET['id'];

    // Fetch the user data based on user_id
    $query = "SELECT * FROM users WHERE user_id = $user_id";
    $result = mysqli_query($conn, $query);
    $user = mysqli_fetch_assoc($result);

    // Check if the form is submitted to update the user data
    if (isset($_POST['update'])) {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password']; // You might want to hash the password

        // Update the user data in the database
        $update_query = "UPDATE users SET username = '$username', email = '$email', password = '$password' WHERE user_id = $user_id";
        $update_result = mysqli_query($conn, $update_query);

        if ($update_result) {
            echo "User updated successfully!";
            // Redirect to the manage users page or any other page
            header("Location: manage_users.php");
        } else {
            echo "Error updating user: " . mysqli_error($conn);
        }
    }
} else {
    echo "Invalid user ID!";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit User</title>
</head>
<body>
    <h2>Edit User</h2>
    <form method="POST" action="">
        <label>Username:</label>
        <input type="text" name="username" value="<?php echo $user['username']; ?>" required><br>

        <label>Email:</label>
        <input type="email" name="email" value="<?php echo $user['email']; ?>" required><br>

        <label>Password:</label>
        <input type="password" name="password" value="<?php echo $user['password']; ?>" required><br>

        <input type="submit" name="update" value="Update User">
    </form>
</body>
</html>
