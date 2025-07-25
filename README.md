# kutab

## 

## Deployment

1. **Clone the repository**
2. **Install PHP dependencies:**
   ```bash
   composer install
   ```
3. **Install Node.js dependencies:**
   ```bash
   npm install
   ```
4. **Copy environment file and set up your environment:**
   ```bash
   cp .env.example .env
   # Edit .env as needed
   ```
5. **Generate application key:**
   ```bash
   php artisan key:generate
   ```
6. **Run migrations:**
   ```bash
   php artisan migrate
   ```
7. **Seed the database with initial data:**
   ```bash
   php artisan db:seed
   ```
8. **Clear and optimize the application cache:**
   ```bash
   php artisan optimize:clear
   ```
9. **Start the development servers:**
   ```bash
   npm run dev
   php artisan serve
   ```

## Project Overview

This project is a Laravel-based system for managing Kutabs (traditional schools), their groups, sheikhs (teachers), students, and schedules. It provides user roles for SuperSheikh, Sheikh, and Student, and allows for the management of group assignments and busy times.

The system uses Spatie Laravel Permission package for role-based access control with four main roles:
- **SuperSheikh**: Full access to all features (manage kutabs, groups, sheikhs, students)
- **Sheikh**: Limited access (view kutabs, manage groups, view students, create/edit students)
- **Student**: Basic access (view groups, view sheikhs)
- **Parent**: Limited access (view groups, view sheikhs, view students, edit students)

## Models and Relationships

- **User**: Base user model. Can be a SuperSheikh, Sheikh, or Student.
- **SuperSheikh**: Linked to a User. Manages multiple Kutabs.
- **Sheikh**: Linked to a User. Can be assigned to multiple Groups and Kutabs.
- **Kutab**: Represents a school. Belongs to a SuperSheikh. Has many Groups and Sheikhs.
- **Group**: Represents a class/group in a Kutab. Belongs to a Kutab and a WeekDay. Has many Sheikhs and Students.
- **SheikhGroup**: Pivot table linking Sheikhs and Groups.
- **Student**: Linked to a User. Can belong to multiple Groups.
- **StudentGroup**: Pivot table linking Students and Groups.
- **WeekDay**: Represents days of the week. Used for scheduling Groups and Student busy times.
- **StudentBusyTime**: Tracks when a Student is unavailable (day, hour, minute).

## Backend Structure

- **Controllers**:
  - `KutabController`: CRUD for Kutabs (schools).
  - `GroupController`: CRUD for Groups (classes) within Kutabs.
  - `SheikhController`: CRUD for Sheikhs (teachers), including group assignments.
  - `SheikhGroupController`: Manages Sheikh-Group assignments.
  - `HomeController`: Dashboard/homepage logic.
- **Routes**:
  - Main routes are defined in `routes/web.php` and use resource controllers for Kutab, Group, and Sheikh management. Auth middleware is used for protected routes.

## Quick Reference for Developers

- **Models**: Located in `app/Models/`.
- **Controllers**: Located in `app/Http/Controllers/`.
- **Routes**: Main routes in `routes/web.php`.
- **Migrations**: Located in `database/migrations/`.
- **Frontend**: Uses Vite, TailwindCSS, and Bootstrap. Entry points in `resources/`.

---
For further details, see the code comments and explore the models and controllers for business logic and relationships.
