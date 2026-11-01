# Online Perfume Store

A PHP and MySQL shopping website for perfumes, with a customer storefront and a separate admin panel for managing products, users and orders.

## Features

**Customers**
- Register, log in and log out
- Browse products on the home page
- Cart and wishlist
- Checkout and payment method selection
- Order status history (order tracking table in the database)

**Admin panel** (`/admin`)
- Admin login
- Add products, edit products and update product images
- Manage products and manage users
- View pending orders and today's orders

## Tech stack

- PHP (mysqli)
- MySQL
- HTML, CSS, JavaScript, Bootstrap

## Project structure

```
Online-perfume-store/
├── index.php                 # home page and product listing
├── login.php / logout.php    # customer authentication
├── my-cart.php / cart.php    # cart
├── my-wishlist.php           # wishlist
├── checkout.php              # checkout
├── payment-method.php        # payment method selection
├── header.php / footer.php   # shared page parts
├── config.php                # database connection
├── shopping.sql              # database schema
├── admin/                    # admin panel
│   ├── index.php             # admin login
│   ├── insert-product.php
│   ├── edit-products.php
│   ├── manage-products.php
│   ├── manage-users.php
│   ├── pending-orders.php
│   ├── todays-orders.php
│   └── update-image1.php
├── CSS/  js/
```

## Database

Database name: `shopping`. Tables:

| Table | Purpose |
|---|---|
| `users` | customer details, shipping and billing addresses |
| `products` | name, company, price, image, shipping charge |
| `orders` | user, product, quantity, date, payment method, order status |
| `ordertrackhistory` | status updates and remarks for each order |
| `wishlist` | products saved by a user |
| `admin` | admin accounts |

## Setup (local, with XAMPP)

1. Install [XAMPP](https://www.apachefriends.org/) and start **Apache** and **MySQL**.
2. Copy this project folder into `htdocs`.
3. In phpMyAdmin (`http://localhost/phpmyadmin`), create a database named `shopping` and import `shopping.sql`.
4. Check `config.php`. The defaults are `localhost`, user `root`, empty password, database `shopping`. Change them if your MySQL setup differs.
5. Open `http://localhost/<your-folder>/index.php` for the store and `http://localhost/<your-folder>/admin/` for the admin panel.

## Known limitations and planned improvements

- Queries use plain `mysqli_query`; switching to prepared statements would harden the app against SQL injection.
- The payment page currently lists products with a "Buy Now" button and has no live payment gateway connected.
- Database credentials are set in `config.php`; moving them to environment configuration would be safer for deployment.

## Author

Sushmita Shrestha, [GitHub](https://github.com/sshrestha000)
