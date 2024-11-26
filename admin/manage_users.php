<?php
// Include the database connection file
include 'db_connection.php'; // Adjust the path as per your structure

// Query to fetch all users
$query = "SELECT * FROM users";
$result = mysqli_query($conn, $query);

// Check if the query was successful
if ($result) {
    echo "<table border='1'>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Email</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                <td>{$row['user_id']}</td>
                <td>{$row['username']}</td>
                <td>{$row['email']}</td>
                <td><a href='edit_user.php?id={$row['user_id']}'>Edit</a></td>
                <td><a href='delete_user.php?id={$row['user_id']}'>Delete</a></td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "Error: " . mysqli_error($conn); // Display the error if the query fails
}
?>
