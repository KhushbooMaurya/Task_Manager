# Task Manager

A modern task management application built with Laravel, featuring user authentication, task creation and management, and file upload capabilities.

## Project Requirements

| Requirement | Version |
|-------------|---------|
| **PHP** | 8.3+ |
| **Laravel** | 13.7+ |
| **Composer** | Latest |

## Features

- User authentication (Login, Registration, Password reset)
- Task management (Create, Read, Update, Delete tasks)
- User profile management
- File uploads
- Responsive design with Tailwind CSS
- Modern frontend with Vite

## Prerequisites

Before you begin, ensure you have the following installed on your machine:

- PHP 8.3 or higher
- Composer
- MySQL
- Git

## Installation & Setup

### 1. Clone the Repository

```bash
git clone https://github.com/KhushbooMaurya/Task_Manager.git
cd Task_Manager
```

### 2. Install Dependencies

Install PHP dependencies:
```bash
composer install
```

Install Node.js dependencies:
```bash
npm install
```

### 3. Environment Configuration

Copy the example environment file:
```bash
cp .env.example .env
```

Generate the application key:
```bash
php artisan key:generate
```

### 4. Database Setup

Edit your `.env` file and configure your database connection:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=task_management
DB_USERNAME=root
DB_PASSWORD=
```

Run migrations to create database tables:
```bash
php artisan migrate
```

### 5. Build Frontend Assets

Build the frontend assets for production:
```bash
npm run build
```

For development with hot module reloading:
```bash
npm run dev
```

## Quick Setup

For a quick setup, you can run the setup script:

```bash
composer run setup
```

This will:
- Install PHP dependencies
- Copy `.env.example` to `.env`
- Generate application key
- Run database migrations
- Install Node dependencies
- Build frontend assets

## Running the Application

### Development Server

Start the Laravel development server:

```bash
php artisan serve
```

The application will be available at `http://localhost:8000`

### Full Development Environment

To run the complete development environment with server.

```bash
composer run dev
```

This runs:
- PHP artisan serve

```

## Project Structure

```
app/
├── Http/
│   ├── Controllers/    # Application controllers
│   └── Requests/       # Form request validations
├── Models/
│   ├── Task.php        # Task model
│   ├── Upload.php      # Upload model
│   └── User.php        # User model
└── Providers/          # Service providers

resources/
├── css/                # Stylesheets
├── js/                 # JavaScript
└── views/              # Blade templates
    ├── auth/           # Authentication views
    ├── layouts/        # Layout templates
    ├── tasks/          # Task management views
    └── upload/         # Upload views

database/
├── migrations/         # Database migrations

## Key Files

- `vite.config.js` - Vite configuration for asset bundling
- `tailwind.config.js` - Tailwind CSS configuration
- `postcss.config.js` - PostCSS configuration
- `phpunit.xml` - PHPUnit test configuration

## Available Commands

| Command | Description |
|---------|-------------|
| `php artisan serve` | Start development server |
| `php artisan migrate` | Run database migrations |
| `php artisan tinker` | Interactive PHP shell |
| `php artisan test` | Run test suite |
| `npm run dev` | Start frontend dev server |
| `npm run build` | Build frontend assets |
| `composer run setup` | Complete project setup |
| `composer run dev` | Full development environment |

## Environment Variables

Key environment variables to configure in `.env`:

```env
APP_NAME=Task_Manager
APP_ENV=local
APP_DEBUG=true
APP_URL=http://localhost:8000

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=task_management
DB_USERNAME=root
DB_PASSWORD=

MAIL_DRIVER=log
MAIL_FROM_ADDRESS=no-reply@taskmanager.local
```

## Troubleshooting

### Permission Denied Errors
If you encounter permission issues, ensure storage and bootstrap/cache directories are writable:

```bash
chmod -R 775 storage bootstrap/cache
```

### Database Connection Error
Verify your `.env` file database configuration matches your local setup.

### Missing Database
Create the database manually before running migrations:

```bash
mysql -u root -p -e "CREATE DATABASE task_management;"
```

### Node Dependencies Issues
Clear cache and reinstall:

```bash
rm -rf node_modules package-lock.json
npm install
```
