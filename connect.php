<?php
include 'index.php';
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";

// creat connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

//  if(!$conn){
//     die("Database connection failed ".mysqli_connect_error());
//  }
//  else echo "Database connection successfully <br><br><br>";
