<?php

declare(strict_types=1);

// Start the session
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Include necessary files for configuration and authentication
require_once __DIR__ . '/../src/Config.php';
require_once __DIR__ . '/../src/DiscordOauth.php';

use FiveWeb\DiscordOauth;

// Decide which template to load based on the user's authentication status
if (isset($_SESSION['user'])) {
    include __DIR__ . '/../templates/dashboard.php';
} else {
    include __DIR__ . '/../templates/login.php';
}