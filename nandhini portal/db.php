<?php
$host = 'localhost';
$username = 'root'; // Change to your MySQL username
$password = ''; // Change to your MySQL password
$database = 'register'; // Change to your database name

$conn = mysqli_connect($host, $username, $password, $database);

if (!$conn) {
    die('Failed to connect to MySQL: ' . mysqli_connect_error());
}
?>
