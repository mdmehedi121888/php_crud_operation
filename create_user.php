<?php
include 'connect.php'; // Include your database connection file
include 'index.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Escape user inputs for security
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $role = mysqli_real_escape_string($conn, $_POST['role']);

    // Attempt insert query execution
    $sql = "INSERT INTO users (id, name, email, role) VALUES ('$id', '$name', '$email', '$role')";
    if (mysqli_query($conn, $sql)) {
        echo "<br> New record created successfully <br><br>";
        header('Location: display.php');
    } else {
        echo "Failed to insert the record: " . mysqli_error($conn);
    }
}

mysqli_close($conn); // Close the database connection
?>
<div class="container">
    <?php include 'header.php';
    ?>
    <h2>Create User</h2>
    <br>


    <form action="" method="post">
        <div class="mb-3">
            <label for="" class="form-label">ID</label>
            <input type="text" class="form-control" name="id" required>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Name</label>
            <input type="text" class="form-control" name="name" required>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Email</label>
            <input type="email" class="form-control" name="email" required>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Select Role</label>
            <select class="form-select" name="role" aria-label="Default select example">
                <option value="user">user</option>
                <option value="admin">admin</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

</div>