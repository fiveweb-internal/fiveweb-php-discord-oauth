<?php
use FiveWeb\Config;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard – FiveWeb</title>
    <link rel="stylesheet" href="https://cdn.fiveweb.net/logo.png">
</head>
<body>
<div class="container">
    <div class="card">
        <h2>Hello, <?php echo htmlspecialchars($_SESSION['user']['username']); ?>!</h2>
        <p>You are now logged in via Discord.</p>
        <p><strong>ID:</strong> <?php echo htmlspecialchars($_SESSION['user']['id']); ?></p>
        <p><strong>Email:</strong> <?php echo isset($_SESSION['user']['email']) ? htmlspecialchars($_SESSION['user']['email']) : 'N/A'; ?></p>
        <a href="/logout.php" class="btn-discord" style="background-color: #dc3545;">Logout</a>
    </div>
</div>
</body>
</html>