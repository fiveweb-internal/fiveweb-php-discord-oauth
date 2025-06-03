<?php

/**
 * The DiscordOauth class handles the OAuth2 authentication process with Discord.
 * It provides methods for generating the authorization URL, obtaining access tokens,
 * and retrieving user information based on the authenticated token.
 */

namespace FiveWeb;

class DiscordOauth {
    private $clientId;
    private $clientSecret;
    private $redirectUri;
    private $tokenEndpoint;
    private $apiEndpoint;
    private $scopes;


    public function __construct() {
        $this->clientId = Config::DISCORD_CLIENT_ID;
        $this->clientSecret = Config::DISCORD_CLIENT_SECRET;
        $this->redirectUri = Config::DISCORD_REDIRECT_URI;
        $this->scopes = Config::DISCORD_SCOPES;
        $this->tokenEndpoint = Config::DISCORD_TOKEN_ENDPOINT;
        $this->apiEndpoint = Config::DISCORD_API_ENDPOINT;
    }

    /**
     * Generates and returns the authorization URL for the Discord OAuth2 flow.
     *
     * @return string The authorization URL containing the necessary query parameters.
     */
    public function getAuthUrl(): string {
        return "https://discord.com/api/oauth2/authorize?" . http_build_query([
                'client_id' => $this->clientId,
                'redirect_uri' => $this->redirectUri,
                'response_type' => 'code',
                'scope' => $this->scopes
            ]);
    }

    /**
     * Obtains an access token using the provided authorization code.
     *
     * @param string $code The authorization code to exchange for an access token.
     * @return string|null The access token as a string, or null if the token could not be retrieved.
     */
    public function getAccessToken(string $code): string {
        $data = [
            'client_id' => $this->clientId,
            'client_secret' => $this->clientSecret,
            'grant_type' => 'authorization_code',
            'code' => $code,
            'redirect_uri' => $this->redirectUri,
            'scope' => $this->scopes
        ];

        $ch = curl_init($this->tokenEndpoint);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/x-www-form-urlencoded']);

        $response = curl_exec($ch);
        curl_close($ch);

        $json = json_decode($response, true);
        return $json['access_token'] ?? "";
    }

    /**
     * Retrieves user data from an API using a given code to fetch the access token.
     *
     * @param string $code The authorization code used to obtain the access token.
     * @return array|null The user data as an associative array, or null if the token retrieval fails.
     */
    public function getUser(string $code): array {
        $token = $this->getAccessToken($code);
        if (!$token) {
            return [];
        }

        $ch = curl_init($this->apiEndpoint);
        curl_setopt($ch, CURLOPT_HTTPHEADER, ["Authorization: Bearer $token"]);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);
        curl_close($ch);

        return json_decode($response, true);
    }
}