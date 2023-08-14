<?php
session_start();

$is_invalid = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $mysqli = require __DIR__ . "/database.php";

    $email = $_POST["email"];
    $password = $_POST["password"];

    $sql = sprintf("SELECT * FROM user
                    WHERE email = '%s'",
                   $mysqli->real_escape_string($email));

    $result = $mysqli->query($sql);
    $user = $result->fetch_assoc();

    if ($user && password_verify($password, $user["password_hash"])) {
        session_start();
        session_regenerate_id();

        $_SESSION["user_id"] = $user["id"];
        $_SESSION["is_superuser"] = $user["is_superuser"];

        header("Location: index.php");
        exit;
    } else {
        $is_invalid = true;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
</head>
<body>
    
    <h1>Login</h1>
    
    <?php if ($is_invalid): ?>
        <em>Invalid login</em>
    <?php endif; ?>
    
    <form method="post">
        <label for="email">Email</label>
        <input type="email" name="email" id="email"
               value="<?= htmlspecialchars($_POST["email"] ?? "") ?>">
        
        <label for="password">Password</label>
        <input type="password" name="password" id="password">
        
        <label for="user-type">Login as:</label>
        <select name="user-type" id="user-type">
            <option value="user">User</option>
            <option value="admin">Admin</option>
        </select>
        
        <button>Log in</button>
    </form>
    
</body>
</html>
