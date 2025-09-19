@echo off
echo Setting up Dwello Real Estate Application...
echo.

echo 1. Installing Composer dependencies...
composer install --no-interaction
echo.

echo 2. Installing NPM dependencies...
npm install
echo.

echo 3. Generating application key...
php artisan key:generate
echo.

echo 4. Creating database...
C:\xampp\mysql\bin\mysql.exe -u root -e "CREATE DATABASE IF NOT EXISTS dwello_estate;"
echo.

echo 5. Running migrations...
php artisan migrate
echo.

echo 6. Seeding database...
php artisan db:seed
echo.

echo 7. Building assets...
npm run build
echo.

echo Setup complete! You can now run: php artisan serve
echo.
echo Demo credentials:
echo Admin: admin@dwello.com / password
echo User: user@dwello.com / password
echo.
pause
