<?php

$servername = "localhost"; // Replace with your server name
$username = "root"; // Replace with your MySQL username
$password = ""; // Replace with your MySQL password
$dbname = "expense_tracker"; // Replace with your database name
$port="3307";

// Create a connection to the database
$conn = new mysqli("localhost", "root", "", "expense_tracker","3307");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>
