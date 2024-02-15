<?php 
// Start or resume session
session_start();

// Simulate fetching user ID from the database
// Replace this with your actual database connection and query
include "./assets/php/connection.php";

// Your SQL query to fetch user ID
$sql = "SELECT * FROM students";
$result = mysqli_query($connection, $sql);

// Fetch the user ID from the result
if ($row = mysqli_fetch_assoc($result)) {
    // Set the user ID in the session
    $_SESSION['studentId'] = $row['studentId'];

    // Close the database connection
    mysqli_close($connection);
}

// Close the session
session_write_close();

// Use the user ID outside the session
if (isset($_SESSION['studentId'])) {
    $userId = $_SESSION['studentId'];
    echo "User ID outside session: $userId";
} else {
    echo "User ID not found.";
}

?>