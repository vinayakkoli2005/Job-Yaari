# JobYaari — Blog Management System with AJAX Filtering

A responsive Blog Management System built for the **JobYaari Developer Intern Assessment**. It contains a public frontend with real-time AJAX filtering for exams, admit cards, notifications, and results, alongside a secure, dedicated Admin Panel for managing blog entries.

---

## Features

### Public Frontend (User Side)
- **Live Search**: Debounced search (300ms) to search titles and descriptions without reloading.
- **Category Filters**: Interactive tags/pills to filter by:
  - *Admit Card*
  - *Result*
  - *Job Notification*
  - *Syllabus*
- **Date Filter**: Dropdown menu compiled dynamically from unique months and years of published blogs.
- **AJAX Loading Spinner**: Smooth glassmorphic loading spinner overlay that activates during AJAX grid updates.
- **Detail View**: Dedicated page for reading full blog entries with formatted HTML and featured image banner.
- **Responsiveness**: Mobile-first grid design styled using Bootstrap 5, optimized for screen widths down to 375px (mobiles) up to 1920px (desktops).

### Admin Panel (Management Side)
- **Secure Authentication**: Protected dashboard via custom session-based middleware (`admin.auth`).
- **Dashboard Overview**: Paginated list of all blog posts displaying thumbnail image, title, category, date, and operations.
- **Full CRUD Management**:
  - **Create**: Forms with title, short description, category selection, date picker, HTML content textarea, and image file upload.
  - **Edit**: Pre-filled update screen showing existing assets.
  - **Delete**: Cleans up files from disk automatically and prompts double confirmation.
- **File Upload Cleanups**: Replaces old images automatically upon update, and deletes images from storage on post deletion.

---

## Tech Stack Used

- **Backend Framework**: Laravel 11/13
- **Language**: PHP 8.3
- **Database**: SQLite (Local development) / MySQL
- **CSS Styling**: Bootstrap 5 (CDN)
- **JavaScript & AJAX**: jQuery 3 & `$.ajax()`
- **Icons & Fonts**: FontAwesome 6, Google Fonts (Outfit)

---

## Installation & Local Setup

To run this application locally, follow these steps:

### Prerequisites
- PHP 8.2 or 8.3
- Composer

### Setup Steps

1. **Clone the Repository**:
   ```bash
   git clone <your-repository-url>
   cd JobYaari/temp_laravel
   ```

2. **Install Dependencies**:
   ```bash
   composer install
   ```

3. **Configure Environment Variables**:
   By default, it uses SQLite. Rename `.env.example` to `.env` or create it:
   ```bash
   cp .env.example .env
   ```
   Ensure the following settings are active:
   ```env
   DB_CONNECTION=sqlite
   ```

4. **Generate Application Key**:
   ```bash
   php artisan key:generate
   ```

5. **Create SQLite Database File**:
   If not automatically created:
   - On Windows (CMD): `type NUL > database/database.sqlite`
   - On Windows (PowerShell): `New-Item -Path database/database.sqlite -ItemType File`
   - On Linux/macOS: `touch database/database.sqlite`

6. **Run Migrations & Seeders**:
   This runs table creations and seeds 10 sample blog posts and a default admin user:
   ```bash
   php artisan migrate --seed
   ```

7. **Create Storage Link**:
   Symlink public storage to display uploaded images correctly:
   ```bash
   php artisan storage:link
   ```

8. **Start Local Development Server**:
   ```bash
   php artisan serve
   ```
   Open **[http://127.0.0.1:8000](http://127.0.0.1:8000)** in your web browser.

---

## Credentials

- **Admin Login Link**: [http://127.0.0.1:8000/admin/login](http://127.0.0.1:8000/admin/login)
- **Admin Username / Email**: `admin@jobyaari.com`
- **Admin Password**: `password123`
