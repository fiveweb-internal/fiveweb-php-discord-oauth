<?php

declare(strict_types=1);

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once __DIR__ . '/../src/Config.php';
require_once __DIR__ . '/../src/DiscordOauth.php';

use FiveWeb\DiscordOauth;

try {
    // Validate the presence of the authorization code in the request
    if (empty($_GET['code'])) {
        throw new InvalidArgumentException('Authorization code is missing.');
    }

    $authorizationCode = trim($_GET['code']);

    $discord = new DiscordOauth();

    // Retrieve user data via the Discord API
    $user = $discord->getUser($authorizationCode);

    if (!$user) {
        throw new RuntimeException('Failed to retrieve user data.');
    }

    // Store the user data in the session for later use
    $_SESSION['user'] = $user;

    // Redirect to the home page
    header('Location: /');
    exit;
} catch (InvalidArgumentException $e) {
    error_log($e->getMessage());
    http_response_code(400);
    echo 'Bad Request: ', htmlspecialchars($e->getMessage());
} catch (RuntimeException $e) {
    error_log($e->getMessage());
    http_response_code(500);
    echo 'An error occurred: ', htmlspecialchars($e->getMessage());
} catch (Exception $e) {
    error_log($e->getMessage());
    http_response_code(500);
    echo 'An unexpected error occurred.';
}