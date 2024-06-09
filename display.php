<?php
include 'connect.php'; // Include your database connection file
include 'index.php';



// Attempt select query execution
$sql = "SELECT id, name, email, role FROM users";
$result = mysqli_query($conn, $sql);

echo "<div class='container'>";
include 'header.php';
echo "<h2>Display User </h2>";
echo "<table class='table table-striped'>";
echo "<tr><th>ID</th><th>Name</th><th>Email</th><th>Role</th><th>Action</th></tr>";

if (mysqli_num_rows($result) > 0) {
    // Output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["name"] . "</td>";
        echo "<td>" . $row["email"] . "</td>";
        echo "<td>" . $row["role"] . "</td>";
        echo "<td> <button><a style='text-decoration:none' href='update.php?id=" . $row["id"] . "'>Update</a> </button> <button><a style='text-decoration:none' href='delete.php?id=" . $row["id"] . "&& role=" . $row["role"] . "'>Delete</a></button </td>";

        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='4'>0 results</td></tr>";
}

echo "</table>";
echo "</div>";

mysqli_close($conn); // Close the database connection
