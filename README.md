# csv-upload

## Setup
- composer install
- create a .env file from .env.example
- migrate database: go to the project folder, `php migrate.php -f -s` (-f rewrites all tables, -s seeds the tables)

## Description
A webapp where you can upload a csv file, make changes and download it again.