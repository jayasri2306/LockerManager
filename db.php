<?php
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "bank_locker";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
