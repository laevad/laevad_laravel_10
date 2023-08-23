# Laravel Starter Template by Al Dave

This is a laravel starter template created by Al Dave. You can find the code for this template on [GitHub](https://github.com/laevad/laevad_laravel_10).
## Introduction

This starter template is designed to help you kickstart your Laravel project. It includes basic setup and structure to get you up and running quickly.

## Prerequisites

Before you start using this template, make sure you have the following installed:

- PHP >= 8.1
- Composer
- Node.js
- NPM

## Getting Started

1. Clone the repository:
    ```bash
    git clone https://github.com/laevad/laevad_laravel_10.git
   ```
2. Install the dependencies:
    ```bash
    composer install
    npm install
    ```
3. Copy the `.env.example` file to `.env` and update the database credentials.
    ```bash
    copy .env.example .env
    ```
4. Generate an application key:
    ```bash
    php artisan key:generate
    php artisan jwt:secret
    ```

5. Configure your database settings in the `.env` file:

    ```bash
    DB_DATABASE=your_database_name
    DB_USERNAME=your_database_username
    DB_PASSWORD=your_database_password
    ```
6. Run the migrations:
    ```bash
    php artisan migrate
    ```
7. Run the seeder:
    ```bash
    php artisan db:seed
    ```
8. Start the local development server:
    ```bash
    php artisan serve
    ```
9. You can now access the server at http://localhost:8000
10. Login with the following credentials:
    ```bash
    Email: admin@gmail.com
    Password: admin
    ```


## Features

This starter template includes the following features:

- User authentication
- Dashboard page
- User profile page

## Conclusion

This starter template provides you with a solid foundation for building a Laravel project. You can modify it to suit your specific needs and requirements. Happy coding!






