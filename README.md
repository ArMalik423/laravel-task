
## About This Project

This is a basic CRUD For creating tasks. It also provides unit testing. For Task CRUD. Anyone with API Route can Create or delete product. Authentication was not mentioned in task so no sign up or login was implemented in this project.
### Requirements
- PHP 8.1 or greater
- MYSQL
- Composer
- GIT


## Installation Guide
Run Composer install to create vendor folder having all required Packages by using below command:
```bash
composer install
```
Now After this create an .env file and copy .env.example and place it inside .env

Change .end DB credentials according to your database credentials

Run following command to migrate your database and seed it
```bash
php artinan migrate --seed
```

Now Run your project by:
```bash
php artinan serve
```
## For unit testing
IF you want to test by running unit test use following command
```bash
php artinan test
```
