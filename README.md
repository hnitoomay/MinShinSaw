# MinShinSaw

#This project is a Company and Employee Management System built with Laravel. It allows administrators to manage companies and their employees 
. The application includes user authentication, role-based access control, and basic CRUD functionalities for companies and employees.

#Project Setup Instructions
   Run Migrations and Seeders
      php artisan migrate --seed
   Link Storage
      php artisan storage:link
      php artisan serve
#Usage Instructions
#Visit http://127.0.0.1:8000 in your browser
  --It will redirect to Login Page. 
  -- Logging In: Describe the login process, default admin credentials (e.g., admin@admin.com / password).    
  --It you register, it will redirect you to user page.

#Interacting with the API
    I use Postman to interact with the API endpoints.

#Features
--Authentication and Authorization: User authentication using Laravel Jetstream, with roles (e.g., Administrator and User)
--Company Management: CRUD operations for managing companies
--Employee Management: CRUD operations for managing employees, relationship employee to a company.
--Search and Filter: Search functionality for companies and employees by name, email
--RESTful API for managing companies and employees
