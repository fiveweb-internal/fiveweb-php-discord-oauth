<?php

/**
 * Class Config
 *
 * This class contains configuration constants used for interacting with the Discord API
 * and setting up the application's OAuth2 authentication process.
 *
 * Constants include:
 * - Discord application credentials (client ID and secret)
 * - Redirect URI for OAuth2 callbacks
 * - Required OAuth2 scopes for accessing user data
 * - Discord API endpoints for token exchange and user information retrieval
 * - The base URL of the application
 */

namespace FiveWeb;

/**
 * The Config class defines constant configuration values used for
 * OAuth2 authentication and integration with Discord API.
 */
class Config {
    // Discord OAuth2 application credentials
    const DISCORD_CLIENT_ID = 'DISCORD_CLIENT_ID';
    const DISCORD_CLIENT_SECRET = 'DISCORD_CLIENT_SECRET';

    // OAuth2 redirect URI for handling authentication responses
    const DISCORD_REDIRECT_URI = 'DISCORD_REDIRECT_URI';

    // Required OAuth2 scopes for accessing Discord user data
    const DISCORD_SCOPES = 'identify email';

    // Endpoints for token exchange and user data retrieval
    const DISCORD_TOKEN_ENDPOINT = 'https://discord.com/api/oauth2/token';
    const DISCORD_API_ENDPOINT = 'https://discord.com/api/users/@me';

    // Base URL of the application
    const BASE_URL = 'http://localhost';
}