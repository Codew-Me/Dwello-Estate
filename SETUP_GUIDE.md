# Dwello Setup Guide

## Quick Setup (Windows with XAMPP)

### Step 1: Run Setup Script
Double-click `setup.bat` to automatically install dependencies and set up the database.

### Step 2: Start the Application
Double-click `start.bat` to start the development server.

## Manual Setup (if scripts don't work)

### 1. Install Dependencies
```bash
composer install
npm install
```

### 2. Generate Application Key
```bash
php artisan key:generate
```

### 3. Create Database
Open phpMyAdmin or MySQL command line and create database:
```sql
CREATE DATABASE dwello_estate;
```

### 4. Run Migrations
```bash
php artisan migrate
```

### 5. Seed Database
```bash
php artisan db:seed
```

### 6. Build Assets
```bash
npm run build
```

### 7. Start Server
```bash
php artisan serve
```

## Access the Application

- **URL**: http://localhost:8000
- **Admin Login**: admin@dwello.com / password
- **User Login**: user@dwello.com / password

## Features

✅ Complete landing page with exact design match
✅ Role-based authentication system
✅ Admin and User dashboards
✅ Responsive design with Tailwind CSS
✅ Property showcase with images
✅ Customer testimonials
✅ Help section with email subscription
✅ Footer with navigation links

## Troubleshooting

### If composer install fails:
- Make sure PHP is in your PATH
- Try: `php -v` to check PHP version
- Ensure Composer is installed globally

### If database connection fails:
- Make sure XAMPP MySQL is running
- Check database credentials in `.env` file
- Verify database `dwello_estate` exists

### If npm install fails:
- Make sure Node.js is installed
- Try: `node -v` and `npm -v` to check versions

## File Structure

```
estate/
├── app/                 # Laravel application code
├── config/             # Configuration files
├── database/           # Migrations and seeders
├── public/             # Web accessible files
├── resources/          # Views, CSS, JS
├── routes/             # Route definitions
├── storage/            # Logs, cache, sessions
├── .env               # Environment configuration
├── artisan            # Laravel command line tool
├── composer.json      # PHP dependencies
├── package.json       # Node.js dependencies
├── setup.bat          # Automated setup script
└── start.bat          # Start server script
```

## Support

If you encounter any issues, check the Laravel logs in `storage/logs/` directory.
