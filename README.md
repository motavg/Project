# Task Management API

## Description

A RESTful API for task management built with Laravel.

## Installation

1. Clone the repository: `git clone https://github.com/motavg/Project`
2. Install the dependencies: `composer install`
3. Copy the .env.example file to .env and configure the environment variables.
4. Generate the application key: `php artisan key:generate`
5. Run the migrations: `php artisan migrate`
6. Start the server: `php artisan serve`

## Usage

The API has the following endpoints:

- GET /api/tasks: Returns all tasks.
- POST /api/tasks: Creates a new task.
- GET /api/tasks/{id}: Returns a specific task.
- PUT /api/tasks/{id}: Updates a specific task.
- DELETE /api/tasks/{id}: Deletes a specific task.

## Tests

To run the tests, use the command: `php artisan test`

## Contribution

Contributions are welcome. Please fork the project and create a pull request with your changes.

## License

This project is licensed under the MIT License.

