<?php
session_start();
require_once('db.php');

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

$user_id = $_SESSION['user_id'];

function getLockers() {
    global $conn;
    
    $sql = "SELECT * FROM lockers";
    $result = $conn->query($sql);

    $lockers = array();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $lockers[] = $row;
        }
    }
    return $lockers;
}

$lockers = getLockers();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Bank Locker Management</title>
</head>
<body>
    <h2>Welcome to Bank Locker Management System</h2>
    <h3>Lockers:</h3>
    <table border="1">
        <tr>
            <th>Locker Number</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        <?php foreach ($lockers as $locker): ?>
        <tr>
            <td><?php echo $locker['locker_number']; ?></td>
            <td><?php echo $locker['status']; ?></td>
            <td>
                <?php if ($locker['status'] == 'available'): ?>
                    <a href="allocate.php?id=<?php echo $locker['id']; ?>">Allocate</a>
                <?php elseif ($locker['status'] == 'allocated' && $locker['user_id'] == $user_id): ?>
                    <a href="deallocate.php?id=<?php echo $locker['id']; ?>">Deallocate</a>
                <?php endif; ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
    <br>
    <a href="logout.php">Logout</a>
</body>
</html>
