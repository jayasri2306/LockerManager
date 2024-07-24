<?php
session_start();
require_once('db.php');

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

$user_id = $_SESSION['user_id'];

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $locker_id = $_GET['id'];

    $sql = "UPDATE lockers SET status = 'allocated', user_id = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $user_id, $locker_id);
    $stmt->execute();

    header('Location: dashboard.php');
    exit();
}
?>
