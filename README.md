# Dwello Estate Management System

A modern, responsive real estate management system built with Laravel 10 and Tailwind CSS.

## Features

### Public Features
- **Homepage**: Beautiful landing page with hero section, search functionality, and featured properties
- **Property Listings**: Browse available properties with detailed information
- **Agent Profiles**: View professional real estate agents
- **Contact Form**: Send messages to the company
- **Search Functionality**: Search properties by location, type, and price range

### User Features (Registered Users)
- **User Dashboard**: Personal dashboard with quick actions
- **Property Inquiries**: Send inquiries about specific properties
- **Message History**: View all sent messages and inquiries
- **Profile Management**: Manage personal information

### Admin Features
- **Admin Dashboard**: Comprehensive dashboard with statistics
- **User Management**: View and manage registered users
- **Admin Management**: Create and manage admin accounts
- **Inquiry Management**: View and respond to property inquiries
- **Message Management**: View and manage contact form messages
- **Agent Management**: Add, edit, and manage real estate agents

## Technology Stack

- **Backend**: Laravel 10
- **Frontend**: Tailwind CSS, Blade Templates
- **Database**: MySQL
- **Authentication**: Laravel's built-in authentication system
- **File Storage**: Laravel's file storage system

## Installation

1. **Clone the repository**
   ```bash
   git clone https://github.com/Codew-Me/dwello-estate.git
   cd dwello-estate
   ```

2. **Install dependencies**
   ```bash
   composer install
   ```

3. **Environment setup**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Database setup**
   - Create a MySQL database named `dwello_estate`
   - Update your `.env` file with database credentials
   - Run migrations and seeders:
   ```bash
   php artisan migrate
   php artisan db:seed
   ```

5. **Storage setup**
   ```bash
   php artisan storage:link
   ```

6. **Start the development server**
   ```bash
   php artisan serve
   ```

## Default Accounts

### Admin Account
- **Email**: admin@dwello.com
- **Password**: password

### Regular User Account
- **Email**: user@dwello.com
- **Password**: password

## Project Structure

```
dwello-estate/
├── app/
│   ├── Http/Controllers/     # Application controllers
│   ├── Models/              # Eloquent models
│   └── Http/Middleware/     # Custom middleware
├── database/
│   ├── migrations/          # Database migrations
│   └── seeders/            # Database seeders
├── resources/
│   ├── views/              # Blade templates
│   └── css/                # Stylesheets
├── public/                 # Public assets
└── routes/                 # Application routes
```

## Key Features Implemented

- ✅ Responsive design with Tailwind CSS
- ✅ User authentication and authorization
- ✅ Role-based access control (Admin/User)
- ✅ Property management system
- ✅ Agent management system
- ✅ Inquiry and message system
- ✅ Search functionality
- ✅ File upload handling
- ✅ Database relationships and migrations
- ✅ Professional UI/UX design

## Contributing

1. Fork the repository
2. Create a feature branch (`git checkout -b feature/amazing-feature`)
3. Commit your changes (`git commit -m 'Add some amazing feature'`)
4. Push to the branch (`git push origin feature/amazing-feature`)
5. Open a Pull Request

## License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## Contact

- **GitHub**: [@Codew-Me](https://github.com/Codew-Me)
- **Project Link**: [https://github.com/Codew-Me/dwello-estate](https://github.com/Codew-Me/dwello-estate)
