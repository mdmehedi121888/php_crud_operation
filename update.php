<?php
include 'connect.php'; // Include your database connection file

// Check if ID parameter is set in the URL
if (isset($_GET['id'])) {
    // Sanitize the ID parameter to prevent SQL injection
    $id = mysqli_real_escape_string($conn, $_GET['id']);

    // Attempt select query execution to fetch the record with the given ID
    $sql = "SELECT id, name, email, role FROM users WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);

    // Check if the query returned a result
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $name = $row['name'];
        $email = $row['email'];
        $role = $row['role'];
    } else {
        // No record found with the given ID
        echo "No record found.";
        exit(); // Stop further execution
    }
} else {
    // No ID parameter provided in the URL
    echo "Invalid request.";
    exit(); // Stop further execution
}

// Handle form submission for updating the record
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate input data
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $role = mysqli_real_escape_string($conn, $_POST['role']);

    // Update query
    $update_sql = "UPDATE users SET name='$name', email='$email', role='$role' WHERE id='$id'";
    if (mysqli_query($conn, $update_sql)) {
        echo "Record updated successfully.";
        header('Location: display.php');
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}

mysqli_close($conn); // Close the database connection
?>

<!DOCTYPE html>
<html>

<head>
    <title>Update User</title>
</head>

<body>
    <div class="container">
        <?php include 'index.php';
        ?>
        <h2>Update User</h2>
        <form action="" method="post">
            <div class="mb-3">
                <label for="" class="form-label">Name</label>
                <input type="text" class="form-control" name="name" value="<?php echo $name; ?>">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" value="<?php echo $email; ?>">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Select Role</label>
                <select class="form-select" name="role" aria-label="Default select example">
                    <option value="user">user</option>
                    <option value="admin">admin</option>
                </select>
            </div>


            <button type="submit" class=" btn btn-primary">update</button>
        </form>
    </div>
</body>

</html>