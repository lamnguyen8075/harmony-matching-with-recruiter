<?php
$servername = "http://35.222.60.204/";
$database = "harmony-db";
$username = "root";
$password = "Conheo130695!";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>