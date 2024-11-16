Appointment Management Application Overview

The Appointment Management Application is a Laravel-based platform designed to facilitate efficient scheduling and management of appointments. The application supports multiple user roles, including Doctors and Patients, each with specific functionalities and access levels.

This project incorporates the following key features:

Role-based authentication: Implemented using Laravel Jetstream and Spatie Permissions.
Custom redirection: Redirects users to role-specific dashboards upon login.
Appointment management: Users can create, view, and manage appointments.
Admin panel: Dedicated section for doctors to access specialized tools and manage their workflow.

Key Features Authentication and Authorization

Role-based access control using Spatie Permissions.
Seamless login and registration powered by Laravel Jetstream.
Role-specific redirections:
    Doctors: Redirected to /admin/panel.
    Patients: Redirected to /dashboard.

Appointment Management

Patients can:
    Create appointments.
    View their appointment history.
Doctors can:
    View appointments assigned to them.
    Edit and manage appointments.

Admin Panel

A dedicated section for doctors, accessible at /admin/panel, with tools and data visualization to manage appointments and patient records.

Technologies Used

Backend: Laravel 10
Frontend: Blade templates (integrated with Laravel Jetstream)
Authentication: Laravel Sanctum, Jetstream
Role Management: Spatie Permissions
Database: MySQL

Setup Instructions Requirements

PHP 8.1 or higher
Composer
MySQL
Node.js (for frontend assets)

Installation Steps

Clone the repository:

git clone https://github.com/alejandroava/appointment-management.git) cd appointment-management

Install dependencies:

composer install npm install

Configure environment variables:

Copy the .env.example file to .env:

cp .env.example .env

Update the .env file with your database and mail configurations.

Run database migrations and seeders:

php artisan migrate --seed

Build frontend assets:

npm run dev

Start the development server:

php artisan serve

User Roles Doctor

Access the admin panel at /admin/panel.
View and manage appointments.
Perform administrative tasks.

Patient

Access the dashboard at /dashboard.
Book and view appointments.

Directory Structure

app/Http/Controllers:
    AdminPanelController: Handles the logic for the admin panel.
    AppointmentController: Manages appointment creation, viewing, and storage.
database/seeders:
    RolesPermissionsSeeder: Seeds roles, permissions, and initial users.
resources/views:
    dashboard.blade.php: Patient dashboard.
    admin/panel.blade.php: Doctor admin panel.

Future Enhancements

Integrate calendar-based appointment scheduling.
Add notifications for appointment reminders.
Implement analytics for doctors to track appointment trends.

Contributors

Alejandro Velásquez Alzate (Lead Developer)
Team of Developers (Backend, Frontend, and Database)

License

This project is licensed under the MIT License.
