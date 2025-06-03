# Security Policy

## Supported Versions

This repository is actively maintained and only specific versions receive security updates. Please make sure you are using a supported version.

| Version  | Supported          |
| -------- | ------------------ |
| 1.1.x    | ✅ Yes              |
| 1.0.x    | ❌ No               |
| < 1.0    | ❌ No               |

We recommend always using the latest stable version to benefit from the latest security improvements.

---

## Reporting a Vulnerability

If you believe you've found a security vulnerability in **fiveweb-php-discord-oauth**, we encourage you to report it responsibly.

### How to Report

- Send a **detailed report** via email to: **security@fiveweb.dev**
- Include information such as:
  - Description of the vulnerability
  - Steps to reproduce
  - Affected file(s) or function(s)
  - Potential impact (e.g. session hijacking, token leakage, etc.)
  - Optional: Proof of Concept (PoC) or exploit

Please **do not open a public GitHub issue** for security-related reports.

---

### Response Process

- You’ll receive a **confirmation within 48 hours**
- We’ll begin investigating the issue immediately and keep you updated
- If verified, we aim to publish a fix or mitigation within **7–14 business days**
- You’ll be **credited** in the changelog and release notes unless you request anonymity

---

## Scope of Security Coverage

This policy covers:

- OAuth2 implementation (`src/DiscordOauth.php`)
- Session handling and token validation
- Input sanitization and redirection logic
- Frontend asset loading if it affects secure display or access

---

## Out of Scope

The following are *not* covered under this policy:

- Issues caused by improper hosting or server misconfiguration (e.g., incorrect `.htaccess` settings)
- Usage of outdated PHP versions (< 7.4)
- Local development issues (e.g. file permission errors)

---

If you're unsure whether a vulnerability is in scope, please report it anyway — better safe than sorry.
