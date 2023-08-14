<?php
session_start();

$mysqli = require __DIR__ . "/database.php";

$user = null;

if (isset($_SESSION["user_id"])) {
    $sql = "SELECT * FROM user WHERE id = {$_SESSION["user_id"]}";
    $result = $mysqli->query($sql);
    $user = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
</head>
<body>
    
    <h1>Home</h1>
    
    <?php if ($user): ?>
        <p>Hello <?= htmlspecialchars($user["fname"]) ?></p>
        <p><a href="logout.php">Log out</a></p>
        
        <?php if ($_SESSION["is_superuser"]): ?>
            <p><a href="admin.php">Admin Panel</a></p>
        <?php endif; ?>
        
    <?php else: ?>
        <p><a href="login.php">Log in</a> or <a href="signup.html">sign up</a></p>
    <?php endif; ?>
    
</body>
</html>

    