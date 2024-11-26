<?php
session_start();
require_once 'includes/db.php';  // Use require_once for critical files

// Function to sanitize user input
function sanitize_input($data) {
    return htmlspecialchars(strip_tags(trim($data)));
}

// Ensure the connection is valid
if ($conn === false) {
    die("Error: Could not connect to the database.");
}

// Registration logic
if (isset($_POST['register'])) {
    $email = sanitize_input($_POST['email']);
    $password = $_POST['password'];
    
    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script>alert('Invalid email format');</script>";
    } else {
        // Check if email already exists
        $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows > 0) {
            echo "<script>alert('Email already exists');</script>";
        } else {
            // Hash password
            $passwordHash = password_hash($password, PASSWORD_DEFAULT);
            
            // Insert new user
            $stmt = $conn->prepare("INSERT INTO users (email, password) VALUES (?, ?)");
            $stmt->bind_param("ss", $email, $passwordHash);
            
            if ($stmt->execute()) {
                echo "<script>alert('Registration successful!');</script>";
            } else {
                echo "<script>alert('Registration failed. Please try again.');</script>";
            }
        }
        $stmt->close();
    }
}

// Sign-in logic
if (isset($_POST['signIn'])) {
    $email = sanitize_input($_POST['email']);
    $password = $_POST['password'];
    
    // Prepare statement for login
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    
    if ($stmt === false) {
        die("Prepare failed: " . $conn->error);
    }
    
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['email'] = $user['email'];
            echo "<script>alert('Login successful!'); window.location.href='index.php';</script>";
            exit();
        } else {
            echo "<script>alert('Incorrect Email or Password');</script>";
        }
    } else {
        echo "<script>alert('Incorrect Email or Password');</script>";
    }
    
    $stmt->close();
}

// Close the connection at the end of the script
$conn->close();
 