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



## License

This template is released under the **Don't Be A Dick Public License (DBAD)**, which is summarized below.

---

Don't Be A Dick Public License

Copyright (C) Al Dave

> **Everyone is permitted to copy and distribute verbatim or modified copies of this license document.**

### Terms and Conditions for Copying, Distribution and Modification

1. **Do whatever you like with the original work, just don't be a dick.**

   Being a dick includes - but is not limited to - the following instances:

    *   Publicly defaming or mocking the licensor
    *   Selling or redistributing the original work without providing sufficient attribution (e.g. not crediting the original author or providing a link to the original source code)
    *   Using the original work in a way that promotes hate speech or discrimination
    *   Claiming ownership of the original work without the licensor's consent

2. If you become rich through modifications, related works/services, or supporting the original work, share the love. Only a dick would make loads off this work and not buy the original work's creator(s) a pint/coffee/tea, etc.

3. Code is provided with no warranty. Using somebody else's code and bitching when it goes wrong makes you a DONKEY dick. **Fix the problem yourself.**

---


