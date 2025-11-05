# Greenery World — Flower Shop (local XAMPP setup)

This is a small flower shop demo using HTML/CSS/JS, PHP and MySQL (MariaDB). It is intended to run on a local XAMPP (or similar) environment.

Quick setup
1. Start XAMPP (Apache + MySQL).
2. Import the SQL schema: in phpMyAdmin or via CLI import `db/setup.sql`. This creates the database `greenery_world` and sample data (users, products, orders).
   - From CLI: `mysql -u root < db/setup.sql` (adjust user/password as needed).
3. Put this project folder into your Apache document root (already in `htdocs` per your workspace).
4. Update DB credentials in `php/config.php` if your MySQL username/password differ from default.
5. Visit: http://localhost/Project/Greenery%20World/index.html

Notes & next steps
- Passwords are hashed using PHP `password_hash()`.
- We added a simple `php/products.php` endpoint that returns JSON for the `products` table.
- For production, you should:
  - Move credentials out of source control and use env variables.
  - Use CSRF protection for forms.
  - Validate and sanitize all user input.
  - Use HTTPS.

Files added/changed
- `db/setup.sql` — now includes `products` table and sample product rows.
- `php/products.php` — JSON API for products.
- `php/register.php` and `php/login.php` — use prepared statements.
- `index.html` — fixed stylesheet path and included `scripts.js`.

How to test products API quickly
- Open your browser to: http://localhost/Project/Greenery%20World/php/products.php

If you want, I can next:
- Wire the front page to fetch products dynamically from `php/products.php` and build the product cards with JS.
- Add a minimal cart (session-based) and checkout flow.
- Add an admin page to add/remove products.

Tell me which next step you want me to implement and I'll do it.
