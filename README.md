### Assignment for Inext

A Laravel-based web application for document uploads, user registration/login, and database management.

---

## 🚀 Features

- User registration and login
- File upload with multiple document support
- File validation (PDF, DOCX, XLSX, PNG, JPG)
- CRUD operations
- MySQL database integration

---

### Clone

### 1. Clone the repository

```bash
git clone https://github.com/Dhiru5153/assignment_for_inext.git
cd assignment_for_inext
```

## Setup .env file
```
cp .env.example .env
php artisan key:generate
```
## Edit .env file for your database
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=assignment-for-inext
DB_USERNAME=root
DB_PASSWORD=
```

##  Create a database
```
CREATE DATABASE assignment-for-inext;
```

## Run migrations
```
php artisan migrate
```

## Serve the application
```
php artisan serve
```

Open: http://127.0.0.1:8000
