# Laravel Multi-Vendor E-Commerce Platform

A robust e-commerce solution built with Laravel 10, featuring multi-vendor capabilities, shopping cart functionality, and payment processing.

> **Note:** This project is currently in development and not ready for production use.

## Table of Contents

- [Features](#features)
- [Tech Stack](#tech-stack)
- [Key Components](#key-components)
- [Installation](#installation)
- [Database Structure](#database-structure)
- [Payment Gateways](#payment-gateways)
- [Development Status](#development-status)
- [Contributing](#contributing)
- [License](#license)

## Features

- **Multi-Vendor Support**: Allow multiple vendors to sell products on the platform
- **Product Management**: Comprehensive product catalog with categories, variants, and image galleries
- **Shopping Cart**: Full-featured cart system with quantity adjustment and coupon support
- **User Dashboard**: Personalized user experience with order history and profile management
- **Flash Sales**: Time-limited special offers
- **Order Processing**: Complete order management workflow
- **Payment Integration**: Multiple payment options including PayPal
- **Responsive Design**: Mobile-friendly interface

## Tech Stack

- **Backend**: Laravel 10
- **PHP**: ^8.1
- **Database**: MySQL
- **Frontend**: Blade templates, Tailwind CSS
- **Payment**: PayPal integration
- **Shopping Cart**: anayarojo/shoppingcart ^4.2

## Key Components

### Product System
- Products with multiple images
- Product variants and variant items
- Categories, subcategories, and child categories
- Brand management
- Flash sale functionality

### User Management
- User authentication and profile management
- User address book
- Vendor accounts with shop information

### Order Management
- Complete order processing workflow
- Order history tracking
- Transaction records

### Admin Panel
- Dedicated admin login
- Backend management interface

## Installation

1. Clone the repository:
   ```bash
   git clone https://github.com/your-username/ecommerce-training.git
   ```

2. Navigate to the project directory:
   ```bash
   cd ecommerce-training
   ```

3. Install PHP dependencies:
   ```bash
   composer install
   ```

4. Install Node dependencies:
   ```bash
   npm install
   ```

5. Copy and configure the environment file:
   ```bash
   cp .env.example .env
   ```

6. Generate application key:
   ```bash
   php artisan key:generate
   ```

7. Configure your database in the `.env` file

8. Run database migrations:
   ```bash
   php artisan migrate
   ```

9. Seed the database (optional):
   ```bash
   php artisan db:seed
   ```

10. Compile assets:
    ```bash
    npm run dev
    ```

11. Start the development server:
    ```bash
    php artisan serve
    ```

## Database Structure

The application uses a comprehensive database structure with the following key tables:

- Users and Vendor accounts
- Product catalog (Products, Categories, Brands)
- Product variants and image galleries
- Shopping cart and orders
- Payment transactions
- Flash sales and coupons
- User addresses and shipping rules

## Payment Gateways

Currently integrated payment methods:

- **PayPal**: Full PayPal payment processing workflow

## Development Status

This project is currently in active development and should be considered unstable for production use. Features may be incomplete or subject to change.

### Current Development Focus

- Backend functionality and database structure
- User authentication and authorization
- Product management system
- Shopping cart and checkout process
- Payment integration

## Contributing

As this is a learning project based on a Udemy tutorial, contributions are not actively sought. However, feedback and suggestions are welcome.

## License

This project is developed as part of a Udemy tutorial and is intended for educational purposes. Please check the original tutorial for licensing information.
