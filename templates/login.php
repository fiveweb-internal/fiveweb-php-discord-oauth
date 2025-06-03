<?php
require_once __DIR__ . '/../src/DiscordOauth.php';

use FiveWeb\DiscordOauth;
use FiveWeb\Config;

$discord = new DiscordOauth();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login – FiveWeb</title>
    <link rel="stylesheet" href="<?php echo Config::BASE_URL ?>/public/assets/css/style.css">
</head>
<body>
<div class="container">
    <div class="card">
        <img src="https://cdn.fiveweb.net/logo.png" alt="Logo" class="logo">
        <h2>Welcome to FiveWeb</h2>
        <p>Login with your Discord account to continue.</p>
        <a href="<?php echo $discord->getAuthUrl(); ?>" class="btn-discord">Login with Discord</a>
    </div>
</div>
</body>
</html>