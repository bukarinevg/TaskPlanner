# Task Planner

## Introduction

This is a task planner application that add string to the table tickets, 
after number of minutes the string will be moved to ticket table. 

## Features

- Create row in a table in n minutes.
- In project used MVC pattern, Rest API, Cron, Docker, Apache, MySQL, Composer,
    OOP, SOLID principles, PSR-4 for autoloading  and  PSR-7 symphony class for handling request.

## Installation

1. Clone the repository.
2. Run the following command to install the dependencies:
    ```bash
    composer install
    ```
3. Docker is required to run the application. If you don't have Docker installed, 
you can download it [here](https://www.docker.com/products/docker-desktop).
4. Run the following command to build the Docker image:
    ```bash 
    docker-compose up --build
    ```

## Usage
1. The main url is http://localhost:8080
2. Send request with POST, GET to  http://localhost:8080 with body:
    ```json
    {
        "code": "string",
        "min": number
    }
    ```
3. In n-minutes the string will be moved to ticket table.

## Project Structure
- `config/` - This directory contains configuration file.
- `db/` - This directory contains migrations.
- `php-apache/` - This directory contains Dockerfile for Apache.
- `php-fpm/` - This directory contains Dockerfile for PHP.
- `src/` - This directory contains the main application code.
  - `controllers/` - This directory contains the controller classes.
  - `models/` - This directory contains the model classes.
  - `source/` - Base code of application.
    - `controller/` - This directory contains Abstract Controller Class.
    - `model/` - This directory contains Abstract Model Class.
    - `db/` - This directory contains DataBase settings Classes.
    - `http/` - This directory contains Request Handler Classes.
- `vendor/` - This directory contains the Composer dependencies.
- `index.php` - This file is the entry point of the application.	
- `composer.json` - This file is used to manage the dependencies of the project.
- `docker-compose.yml` - This file is used to configure Docker for the project.
- `phpinx.php` - This file is used to run migrations.
- `gitignore` - This file tells Git which files to ignore.
- `scheduler.php` - This file is used to run cron job.
- `script.php` - The main script that used by cron job.
- `readme.md` - This file contains the documentation of the project.
- `LICENSE` - This file contains the license information of the project.

## Contributing

Contributions are welcome! Please follow the guidelines in [CONTRIBUTING.md](./CONTRIBUTING.md) to contribute to this project.

## License

This project is licensed under the [Apache](./LICENSE).
