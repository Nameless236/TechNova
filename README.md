# **TechNova Labs - Semester Project (VAII)**

This repository contains the source code for **TechNova Labs**, a Laravel 11-based web application developed as part of the semester project for the subject **VAII**. The application showcases modern web development practices and features a responsive design using Bootstrap.

---

## **Table of Contents**
- [About the Project](#about-the-project)
- [Features](#features)
- [Setup Instructions](#setup-instructions)
    - [Prerequisites](#prerequisites)
    - [Steps to Run Locally](#steps-to-run-locally)


---

## **About the Project**

**TechNova Labs** is a fictional platform dedicated to advancing technology education and innovation. This project demonstrates:
- The use of **Laravel 11** for building dynamic web applications.
- Integration of user authentication (via Laravel Breeze).
- A responsive user interface built with **Bootstrap 5**.
- Practical implementation of database migrations, routing, and Blade templates.

The project was created as part of semester work for the subject **VAII** to showcase proficiency in modern web development tools and frameworks.

---

## **Features**

- **User Authentication**: Includes registration, login, email verification, and password reset.
- **Dynamic Content Management**: Easily customizable pages for "Programs," and "Forum."
- **Responsive Design**: Fully optimized for desktops, tablets, and mobile devices using Bootstrap.

---

## **Technologies Used**

- **Framework**: Laravel 11
- **Frontend Styling**: Bootstrap 5
- **Authentication**: Laravel Breeze
- **Database**: MySQL
- **Version Control**: Git & GitHub
- **Programming Language**: PHP 8.2+

---

## **Setup Instructions**

### Prerequisites

Ensure you have the following installed:
1. PHP 8.2 or higher
2. Composer
3. Node.js & npm

### Steps to Run Locally

1. Clone the repository: 
   ```bash 
    git clone https://github.com/Nameless236/TechNova.git
    ```
2. Install dependencies using Composer:
    ```bash
    composer install
    ```
3. Set up the `.env` file:
- Copy `.env.example` to `.env`:
- Update database variables in `.env`:
  ```
  DB_CONNECTION=mysql
  DB_HOST=db
  DB_PORT=3306
  DB_DATABASE=technova_db
  DB_USERNAME=root
  DB_PASSWORD=password
  ```

4. Build and initialize Docker containers:
    ```bash
    docker-compose up --build -d
    ```
5. Generate an application key:
    ```bash
    php artisan key:generate
    ```
6. Run database migrations with seeding:
    ```bash
    docker exec -it technova_app_container bash
    php artisan migrate:refresh --seed
    ```
7. Default users are created during seeding:
- Regular users with default passwords set to `password`.
- Admin account credentials:
    - Email: `admin@example.com`
    - Password: `password`.

8. Access the application in your browser at `http://localhost`.
