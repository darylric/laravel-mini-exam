# Laravel Mini-Exam — User & Posts One-to-Many Relationship

This project implements a simple blog-style system demonstrating a **one-to-many Eloquent relationship** where:

- Each **User** may have many **Posts**
- Each **Post** belongs to exactly one **User**
- Authentication is required for creating posts (laravel/ui scaffolding)

This submission includes migrations, models, controllers, routes, and Blade views required in the exam specification.

---

## 🚀 Features Implemented

### ✔ Eloquent Relationship
- `User` **hasMany** `Post`
- `Post` **belongsTo** `User`

### ✔ CRUD Behavior
| Route | Access | Description |
|-------|--------|-------------|
| GET /posts | Public | List all posts (latest first) |
| GET /posts/{post} | Public | Show full post + author |
| GET /users/{user}/posts | Public | List posts by a specific user |
| GET /posts/create | Auth only | Create form |
| POST /posts | Auth only | Store new post (automatically assigns authenticated user) |
| GET /posts/{post}/edit | Owner only | Edit post |
| PUT /posts/{post} | Owner only | Update post |
| DELETE /posts/{post} | Owner only | Delete post |

### ✔ Validation Rules
- **title**: required, max:255  
- **content**: required, min:20  
- **published_at**: nullable, date  

### ✔ Views Included
- `resources/views/posts/index.blade.php`
- `resources/views/posts/show.blade.php`
- `resources/views/posts/create.blade.php`
- `resources/views/posts/edit.blade.php` (optional but completed)
- `resources/views/posts/user_posts.blade.php`

All Blade files extend the default `layouts.app` from laravel/ui and use Bootstrap styling.

---

## 📦 Installation & Setup

### 1. Clone the repository

```bash
git clone https://github.com/yourusername/laravel-mini-exam.git
cd laravel-mini-exam
