<?php

declare(strict_types=1);

session_start();

// Destroy the session and clear all session data
$_SESSION = [];
session_destroy();

// Redirect to the homepage
header('Location: /');
exit();