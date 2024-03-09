# Laravel From Scratch Blog Demo Project

http://laravelfromscratch.com

## Installation

First clone this repository, install the dependencies, and setup your .env file.

```
git clone https://github.com/mithrakmanikandan/new_crud.git
composer install
cp .env.example .env
```

Then create the necessary database.

```
php artisan db
create database new_task
```

And run the initial migrations and seeders.

```
php artisan migrate --seed
```

## About the project
 

1. Home Page with Register and Login Buttons.
2. Registration form contain Name, Role(Select box with Guest, Agent
and User options), Email and Password.
3. Once they logged in, fill the personal detailed form with DOB, Phone numbers
(Primary and Secondary Numbers where Primary is
mandatory),Address(Primary and secondary), Image upload(Preview image)
4. If you login as admin then you can show a option like 'User management' where you can see all the information about the registered users with a search,sort by name/dob and pagination functionality
5. Admin can edit and delete the infornation of users
6. Users can only register,login,fill the personal information and edit their profile 