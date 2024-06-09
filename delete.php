<?php
include 'connect.php'; // Include your database connection file

// Check if ID parameter is set in the URL
if (isset($_GET['id'])) {
    // Sanitize the ID parameter to prevent SQL injection
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    $role = mysqli_real_escape_string($conn,$_GET['role']);
    
    // Attempt delete query execution
    $delete_sql = "DELETE FROM users WHERE id = '$id'";
    if (mysqli_query($conn, $delete_sql)) {
        echo "Record deleted successfully.";
        header('Location: display.php');
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
} else {
    // No ID parameter provided in the URL
    echo "Invalid request.";
}

mysqli_close($conn); // Close the database connection
?>
