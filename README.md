# Task Management System

## Overview

This is a Task Management System developed using Laravel. The application allows users to create, read, update, and delete tasks. It also provides user authentication, task filtering, and sorting functionalities. An API is also available to interact with tasks programmatically.

## Features

- **User Authentication**: Users can register, log in, and log out.
- **Task CRUD Operations**: 
  - Create new tasks
  - View a list of tasks
  - Update existing tasks
  - Delete tasks
- **Task Filtering and Sorting**: 
  - Filter tasks by status (Pending, In Progress, Completed)
  - Sort tasks by due date (Ascending or Descending)
- **API Development**: 
  - API endpoints available for all task-related operations
  - JSON responses for easy integration with other applications
  - API authentication using Laravel Sanctum

## Installation

1. **Clone the repository:**
   ```bash
   git clone https://github.com/your-username/task-management-system.git
   cd task-management-system
##Install dependencies:
composer install
npm install

##Set up the environment variables:
cp .env.example .env

##Generate the application key:
php artisan key:generate

##Run the migrations:
php artisan migrate

##Start the development server:
php artisan serve


