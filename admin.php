<?php
session_start();

// Check if the user is logged in and is a superuser
if (!isset($_SESSION["user_id"]) || !$_SESSION["is_superuser"]) {
    header("Location: index.php"); // Redirect if not logged in or not a superuser
    exit;
}

$mysqli = require __DIR__ . "/database.php";

$sql = "SELECT * FROM user";
$result = $mysqli->query($sql);
$users = $result->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Data</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
</head>
<body>
    
    <h1>User Data</h1>
    
    <table>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Date Created</th>
        <th>Last Login</th>
    </tr>
    <?php while ($user = $result->fetch_assoc()): ?>
    <tr>
        <td><?= $user["id"] ?></td>
        <td><?= htmlspecialchars($user["fname"] . ' ' . $user["lname"]) ?></td>
        <td><?= htmlspecialchars($user["email"]) ?></td>
        <td><?= $user["date_created"] ?></td>
        <td><?= $user["date_last_login"] ?></td>
    </tr>
    <?php endwhile; ?>
</table>

    
    <p><a href="logout.php">Log out</a></p>
    
</body>
</html>
