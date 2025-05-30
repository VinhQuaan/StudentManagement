# Student Management System

A simple web application built with Laravel for managing student information.

## Project Description

This project allows you to:

- View a list of students
- Add new students
- Edit existing student details
- Delete students

It features a clean and user-friendly interface with full CRUD functionality.

## Technologies Used

- PHP 8.x or higher
- Laravel 10.x
- Bootstrap 4 for UI styling
- Font Awesome for icons
- MySQL

## Installation & Setup

1. **Clone the repository:**

   ```bash
   git clone https://github.com/VinhQuaan/StudentManagement.git
   cd StudentManagement
    ````

2. **Install dependencies:**

   ```bash
   composer install
   ```

3. **Configure environment:**

   * Copy `.env.example` to `.env`
   * Update your database credentials in `.env`

4. **Generate application key:**

   ```bash
   php artisan key:generate
   ```

5. **Run database migrations:**

   ```bash
   php artisan migrate
   ```

6. **Start the development server:**

   ```bash
   php artisan serve
   ```

7. Open your browser and visit `http://localhost:8000/students`

## Contact

If you have any questions or need help, please open an issue or contact the project manager via email: hoangquan5824@gmail.com
