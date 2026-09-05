# 🔗 URL_Shortener

[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](https://opensource.org/licenses/MIT)
[![PHP Version](https://img.shields.io/badge/PHP-8.1%2B-777BB4?logo=php&logoColor=white)](https://php.net)
[![Laravel Version](https://img.shields.io/badge/Laravel-10.x-FF2D20?logo=laravel&logoColor=white)](https://laravel.com)
[![Build Status](https://img.shields.io/badge/build-passing-brightgreen)](https://github.com)
[![PRs Welcome](https://img.shields.io/badge/PRs-welcome-brightgreen.svg)](http://makeapullrequest.com)

<div align="center">
  
  
  <h3>✨ Modern URL Shortener Built with Laravel</h3>
  <p><em>Clean, fast, and beautifully crafted link management solution</em></p>
  
  [🌐 Live Demo](#) •
  [📖 Documentation](#) •
  [🚀 Quick Start](#quick-start) •
  [💡 Features](#-features)
</div>

---

## 📸 Screenshots



## 🚀 Quick Start

```bash
# Clone the repository
git clone https://github.com/yourusername/url_shortener.git

# Navigate to project directory
cd url_shortener

# Install dependencies
composer install
npm install && npm run build

# Set up environment
cp .env.example .env
php artisan key:generate

# Configure your database in .env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=url_shortener
DB_USERNAME=root
DB_PASSWORD=

# Run migrations
php artisan migrate

# Start the development server
php artisan serve
```

> ⚡ **Requirements**: PHP 8.1+, Composer, Node.js, MySQL/PostgreSQL

---

## ✨ Features

<table>
  <tr>
    <td width="33%" align="center">
      <h3>🔗 Smart Shortening</h3>
      <p>Generate clean, memorable short links with custom aliases and automatic slug generation</p>
    </td>
    <td width="33%" align="center">
      <h3>📊 Real-time Analytics</h3>
      <p>Track clicks, locations, devices, and referral sources with beautiful visualizations</p>
    </td>
    <td width="33%" align="center">
      <h3>📱 QR Code Generator</h3>
      <p>Instant QR code generation for any shortened URL - perfect for print marketing</p>
    </td>
  </tr>
  <tr>
    <td width="33%" align="center">
      <h3>🛡️ Link Management</h3>
      <p>Dashboard with bulk operations, expiration dates, and password protection</p>
    </td>
    <td width="33%" align="center">
      <h3>👤 User Authentication</h3>
      <p>Secure user accounts with role-based access and personal link histories</p>
    </td>
    <td width="33%" align="center">
      <h3>🌐 API Access</h3>
      <p>RESTful API for programmatic link creation and analytics integration</p>
    </td>
  </tr>
</table>

---

## 🛠️ Tech Stack

<details>
<summary><strong>Click to expand</strong></summary>

| Technology | Purpose |
|------------|---------|
| ![Laravel](https://img.shields.io/badge/Laravel-10.x-FF2D20?logo=laravel) | Core framework |
| ![PHP](https://img.shields.io/badge/PHP-8.1%2B-777BB4?logo=php) | Programming language |
| ![MySQL](https://img.shields.io/badge/MySQL-5.7+-4479A1?logo=mysql) | Primary database |
| ![Redis](https://img.shields.io/badge/Redis-7.0-DC382D?logo=redis) | Caching & queues |
| ![TailwindCSS](https://img.shields.io/badge/TailwindCSS-3.x-38B2AC?logo=tailwind-css) | Styling |
| ![Alpine.js](https://img.shields.io/badge/Alpine.js-3.x-8BC0D0?logo=alpine.js) | Frontend interactivity |
| ![Composer](https://img.shields.io/badge/Composer-2.x-885630?logo=composer) | PHP dependency management |

</details>

---

## 📋 Table of Contents

<details>
<summary><strong>📌 Navigate quickly</strong></summary>

- [Features](#-features)
- [Tech Stack](#-tech-stack)
- [Installation](#-quick-start)
- [Environment Setup](#-environment-setup)
- [Database Configuration](#-database-configuration)
- [API Usage](#-api-usage)
- [Testing](#-testing)
- [Deployment](#-deployment)
- [Contributing](#-contributing)
- [Security](#-security-vulnerabilities)
- [License](#-license)
- [Support](#-support)

</details>

---

## 🔧 Environment Setup

Create a `.env` file and configure these essential variables:

```env
APP_NAME=URL_Shortener
APP_ENV=production
APP_DEBUG=false
APP_URL=https://yourdomain.com

# Database
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=url_shortener
DB_USERNAME=root
DB_PASSWORD=your_password

# URL settings
SHORTENER_DOMAIN=short.yourdomain.com
SHORTENER_ALGORITHM=base62
SHORTENER_LENGTH=6

# Analytics
ANALYTICS_ENABLED=true
ANALYTICS_RETENTION_DAYS=90
```

---

## 📡 API Usage

<details>
<summary><strong>Click to see API examples</strong></summary>

### Create a short URL

```http
POST /api/links
Authorization: Bearer {token}
Content-Type: application/json

{
  "url": "https://example.com/very/long/url",
  "custom_alias": "my-link",
  "expires_at": "2024-12-31T23:59:59"
}
```

### Get link analytics

```http
GET /api/links/{id}/analytics
Authorization: Bearer {token}
```

</details>

---

## 🧪 Testing

```bash
# Run all tests
php artisan test

# Run with coverage
php artisan test --coverage

# Run specific test suite
php artisan test tests/Feature/LinkTest.php
```

---

## 🚢 Deployment

<details>
<summary><strong>Optimization steps</strong></summary>

```bash
# Build assets
npm run build

# Cache configuration
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Optimize for production
php artisan optimize
```

</details>

---

## 🤝 Contributing

We welcome contributions! Please follow these steps:

1. 🍴 Fork the repository
2. 🌿 Create your feature branch: `git checkout -b feature/amazing-feature`
3. 💻 Commit your changes: `git commit -m 'Add amazing feature'`
4. 📤 Push to the branch: `git push origin feature/amazing-feature`
5. 🔄 Open a Pull Request

Please review our [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct) before contributing.

---

## 🔒 Security Vulnerabilities

If you discover any security vulnerabilities, please email us directly at [ypengly060@gmail.com](mailto:ypengly060@gmail.com). All security vulnerabilities will be promptly addressed following responsible disclosure guidelines.

---

## 📄 License

This project is open-sourced software licensed under the [MIT License](https://opensource.org/licenses/MIT).

---

## 🌟 Support

<table>
  <tr>
    <td align="center">
      <a href="#">
        <img src="https://img.shields.io/badge/📖-Documentation-1a73e8" alt="Docs">
      </a>
    </td>
    <td align="center">
      <a href="#">
        <img src="https://img.shields.io/badge/🐛-Report_Bug-ff6b6b" alt="Bug">
      </a>
    </td>
    <td align="center">
      <a href="#">
        <img src="https://img.shields.io/badge/💬-Community-20b2aa" alt="Community">
      </a>
    </td>
  </tr>
</table>

---

<div align="center">
  
  **Built with ❤️ using Laravel**
  
  [⬆ Back to Top](#-url_shortener)
  
</div>
