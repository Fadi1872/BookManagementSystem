# 📚 Book Management System

A clean and simple **Laravel-based Book Management System** for managing books, authors, and categories. Built with a consistent and modern UI using Tailwind CSS.

## 🚀 Features

- CRUD operations for:
  - Books
  - Authors
  - Categories
- Form request validation
- Relational data (books belong to authors and categories)
- Styled UI with consistent design scheme
- Blade templates with clean layout and reusable partials

---

## 🧩 Entities & Relationships

### 📘 Book
- `id` (int)
- `title` (string)
- `published_at` (date)
- `author_id` (foreign key to `authors`)
- `category_id` (foreign key to `categories`)
- ⬇️ Belongs to:
  - Author
  - Category

---

### 🧑 Author
- `id` (int)
- `name` (string)
- `nationality` (string)
- `date_of_birth` (date)
- ⬆️ Has many:
  - Books

---

### 🏷️ Category
- `id` (int)
- `name` (string)
- ⬆️ Has many:
  - Books

---

## 🛠️ Technologies Used

- [Laravel](https://laravel.com/) 12
- Blade templating engine
- Tailwind CSS
- MySQL
- PHP 8.2+