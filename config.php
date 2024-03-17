<?php
$servername = "localhost";
$username = "marie";
$password = "juin123";
$dbname = "examjs";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
