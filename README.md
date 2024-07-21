# Codeigniter Beginner Guide

[![Official Website](https://img.shields.io/badge/Official_Website-Visit-yellow)](https://simpletine.com)   [![YouTube Channel](https://img.shields.io/badge/YouTube_Channel-Subscribe-FF0000)](https://www.youtube.com/channel/UCRuDf31rPyyC2PUbsMG0vZw) 

## Introduce

This repository provides guides to CodeIgniter 4, including learning topics, steps, and examples.

## Learning Examples

| Topic                  | Learning Files            |
|------------------------|---------------------------|
| **Routes**             | Create route at [Routes.php](/app/Config/Routes.php) |
| **Database Configuration** | Set up your database connection in [Database.php](/app/Config/Database.php) or copy the [env](env) file, rename it to `.env`, and update the `DATABASE` section.  |
| **CRUD**               | Sample CRUD operations with `Blogs`:<br> - [Controller](app/Controllers/Blogs.php): List of method actions<br> - [Model](app/Models/Blogs.php): Available properties<br> - [Views](app/Views/Blogs): Form validation and session error display<br> - [Migration](/app/Database/Migrations/2024-07-20-133021_Blogs.php): Table and column setup<br> - [Seeder](app/Database/Seeds/Blogs.php): Data seeding with Faker for development  |
| **Custom Form Validation** | - [Controller](app/Controllers/Products.php): Defines validation rules and handles form validation<br> - [Ruleset](app/Validation/ProductRules.php): Custom validation rules for product attributes<br> - [Config](app/Config/Validation.php): Registers the new ruleset                                    |
| **Session Storage**    | - [Config](app/Config/Session.php): Session configuration settings<br> - [Controller](app/Controllers/SessionStorage.php): Examples of session handling, flashdata, and tempdata operations   |
| **Filters**            | - [Config](app/Config/Filters.php): Define filter aliases<br> - [Routes](app/Config/Routes.php): Apply filters to route groups<br> - [AuthFilter](app/Filters/AuthFilter.php): Custom authentication filter to check login status  |
| **Helpers**            | - [Autoload.php](app/Config/Autoload.php): Load helpers automatically<br> - [BaseController.php](app/Controllers/BaseController.php): Load helpers in the base controller<br> - [customize_helper.php](app/Helpers/Customize_helper.php): Example helper functions (array flattening and date formatting) |
| **File Upload**        | - [Routes](app/Config/Routes.php): Define routes for file upload functionality<br> - [View](app/Views/upload_form.php): HTML form for file upload<br> - [Controller](app/Controllers/FileUpload.php): Handle file upload logic and validation |
| **RestAPI**            | - [Routes](app/Config/Routes.php): Define RESTful routes for the API<br> - [Controller](app/Controllers/BlogAPI.php): Implement RESTful API methods (index, show, create, update, delete) for handling blog resources<br><br> - **Testing Endpoints**: Use a tool like `Postman`:<br>&nbsp;&nbsp;&nbsp;&nbsp;- **GET /blogs**: List all blogs<br>&nbsp;&nbsp;&nbsp;&nbsp;- **GET /blogs/{id}**: Get a single blog<br>&nbsp;&nbsp;&nbsp;&nbsp;- **POST /blogs**: Create a new blog<br>&nbsp;&nbsp;&nbsp;&nbsp;- **PUT /blogs/{id}**: Update a blog<br>&nbsp;&nbsp;&nbsp;&nbsp;- **DELETE /blogs/{id}**: Delete a blog  |


## Error Page
| Page | Path |
| ---- | ---- |
| Error 404 | [error_404.php](/app/views/errors/html/error_404.php) |
| Production Error | [production.php](/app/views/errors/html/production.php) |


## Useful Commands

| Command                          | Description                                                  |
|----------------------------------|--------------------------------------------------------------|
| `php spark serve`                | Start the local development server.                          |
| `php spark make:controller Name` | Create a new controller named `Name`.                        |
| `php spark make:model Name`      | Create a new model named `Name`.                             |
| `php spark make:migration Name`  | Create a new migration file named `Name`.                    |
| `php spark migrate`              | Run all new migrations.                                      |
| `php spark migrate:rollback`     | Rollback the last migration operation.                       |
| `php spark db:seed NameSeeder`   | Run the database seeder named `NameSeeder`.                  |
| `php spark make:seeder Name`     | Create a new database seeder named `Name`.                   |
| `php spark make:filter Name`     | Create a new filter named `Name`.                            |
| `php spark make:entity Name`     | Create a new entity named `Name`.                            |
| `php spark make:command Name`    | Create a new custom command named `Name`.                    |
| `php spark make:scaffold Name`   | Create a scaffold (controller, model, views) named `Name`.   |
| `php spark make:cell Name`       | Create a new cell view named `Name`.                         |
| `php spark env`                  | Display the current environment settings.                    |
| `php spark cache:clear`          | Clear the application cache.                                 |
| `php spark clear-cache`          | Another command to clear the application cache.              |
| `php spark routes`               | Display the list of all registered routes.                   |
| `php spark help`                 | Display help information for spark commands.                 |
| `php spark --list`               | List all available spark commands.                           |

## Coding Standard

### Install `PHP_CodeSniffer` and `coding-standard`
```bash
composer require --dev squizlabs/php_codesniffer
composer require --dev codeigniter/coding-standard
```

### Run PHP_CodeSniffer
```bash
vendor/bin/php-cs-fixer fix --verbose
```

### Automate Code Fixes (Optional)
To run `phpcbf` on a specific file, provide the path to the file:
```bash
vendor/bin/phpcbf app/Controllers/Home.php
```

Target Specific Directories or Files 
```bash
vendor/bin/phpcbf app public tests system
```

For details:
```bash
vendor/bin/phpcbf --help
```