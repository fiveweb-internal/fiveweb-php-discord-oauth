# 🎯 fiveweb-php-discord-oauth2

A simple, secure, and dependency-free implementation of Discord OAuth2 in pure PHP.  
Perfect for lightweight projects, FiveM UCPs, admin panels, or any PHP-based web application that needs Discord login functionality.

---

## ✨ Features

- 🔐 **Secure Discord OAuth2 login:** Implement secure user authentication with Discord.  
- 🔎 **Fetch key user information:** Easily retrieve user ID, username, tag (`#0000`), avatar, and more.  
- 🧩 **Framework-independent:** Works standalone with vanilla PHP, no external libraries required.  
- 💡 **Customizable & extendable:** Modify and build upon the flexible code structure to suit your project requirements.  
- ⚙️ **Session or database compatible:** Use it with sessions, or integrate with your preferred database setup.  

---

## 🚀 Quick Start Guide

Follow these steps to integrate and begin using Discord OAuth2 for your PHP project:

### 1. **Clone the repository:**
Clone the repository into your project directory:
```bash
git clone https://github.com/FiveWeb/discord-oauth2-php.git
cd discord-oauth2-php
```

---

### 2. **Create your Discord application:**
Navigate to the [Discord Developer Portal](https://discord.com/developers/applications):

- Create a new application.
- Add your **redirect URI** under `OAuth2 > Redirects`:  
  Example: `https://yourdomain.com/callback.php`.
- Save your **Client ID** and **Client Secret** for later.

---

### 3. **Configure the application:**
Add your credentials to the `config.php` file:
```php
define('DISCORD_CLIENT_ID',     'your_client_id');
define('DISCORD_CLIENT_SECRET', 'your_client_secret');
define('DISCORD_REDIRECT_URI',  'https://yourdomain.com/callback.php');
```

---

### 4. **Setup the login process:**
Use the `index.php` file to initiate the login process:
```php
require_once 'discord.php';

$discord = new DiscordOAuth();
$discord->authorize(); // Redirects the user to Discord for login
```

---

### 5. **Process the callback:**
Handle the logged-in user's data in the `callback.php` file:
```php
require_once 'discord.php';

$discord = new DiscordOAuth();
$user = $discord->getUser();

echo 'Logged in as ' . htmlspecialchars($user['username'] . '#' . $user['discriminator']);
```

---

## 📁 Project Structure

Here’s an overview of the project structure:
```
.
├── discord.php        # Main OAuth2 class
├── config.php         # Your credentials & setup
├── index.php          # Login entry point
├── callback.php       # Handles token & user fetch
├── example/           # UI demo
└── README.md          # Documentation
```
---

## 📜 License

This project is licensed under the **MIT License**.  
You are free to use, modify, and distribute this project, provided you include the original license.

---

## 🛡️ Security Policy

We take security seriously.  
If you discover any vulnerabilities, please report them via GitHub Issues or contact the project maintainers directly for a quick resolution.

---

## 🤝 Contribution Guidelines

Contributions are welcome!  
Feel free to submit **pull requests**, open **issues**, or suggest enhancements. Just make sure your code is clear and well-documented. Check out `CONTRIBUTING.md` for more details.

---

## 🌐 Useful Links

- 📖 **Discord Developer Documentation**: [OAuth2 Documentation](https://discord.com/developers/docs/topics/oauth2)
- 🔗 **FiveWeb**: [Join our community](https://dc.fiveweb.net)

---
