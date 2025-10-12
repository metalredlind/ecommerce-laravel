# 🛒 Laravel Ecommerce Platform

A modern, feature-rich ecommerce platform built with Laravel 10, featuring a multi-vendor marketplace, admin panel, and user dashboard.

## 🚀 Features

### 🏪 **Multi-Vendor Marketplace**
- Vendor registration and profile management
- Vendor product management with approval system
- Vendor shop profiles and settings

### 🛍️ **Product Management**
- Product catalog with categories, subcategories, and child categories
- Product variants and variant items
- Product image galleries
- Brand management
- Product status management (active/inactive)

### 🎯 **Shopping Experience**
- Shopping cart functionality
- Wishlist management
- Product search and filtering
- Flash sales with countdown timers
- Coupon system with discount calculations

### 💳 **Payment & Checkout**
- PayPal integration
- Stripe payment gateway
- Secure checkout process
- Order management
- Transaction tracking

### 🚚 **Shipping & Delivery**
- Shipping rules management
- Address management for users
- Multiple shipping options

### 👥 **User Management**
- User registration and authentication
- User profiles and address management
- User dashboard with order history
- Profile settings and password management

### 🎨 **Admin Panel**
- Comprehensive admin dashboard
- Product approval system
- Order management
- User management
- Settings and configuration
- Analytics and reporting

### 🎨 **Frontend Features**
- Responsive design
- Modern UI/UX
- Product sliders and banners
- Flash sale displays
- Shopping cart sidebar

## 🛠️ **Technology Stack**

- **Backend**: Laravel 10.x
- **Frontend**: Blade Templates, Bootstrap, jQuery
- **Database**: MySQL
- **Payment**: PayPal, Stripe
- **Cart**: Shopping Cart Package
- **DataTables**: Yajra DataTables
- **Notifications**: Toastr
- **Authentication**: Laravel Breeze

## 📋 **Requirements**

- PHP >= 8.1
- Composer
- MySQL >= 5.7
- Node.js & NPM (for asset compilation)

## 🚀 **Installation**

1. **Clone the repository**
   ```bash
   git clone <repository-url>
   cd ecommerce
   ```

2. **Install PHP dependencies**
   ```bash
   composer install
   ```

3. **Install Node.js dependencies**
   ```bash
   npm install
   ```

4. **Environment setup**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

5. **Configure database**
   ```bash
   # Edit .env file with your database credentials
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=your_database_name
   DB_USERNAME=your_username
   DB_PASSWORD=your_password
   ```

6. **Run migrations and seeders**
   ```bash
   php artisan migrate
   php artisan db:seed
   ```

7. **Compile assets**
   ```bash
   npm run dev
   ```

8. **Start the development server**
   ```bash
   php artisan serve
   ```

## 🔧 **Configuration**

### Payment Gateways

#### PayPal Configuration
```env
PAYPAL_CLIENT_ID=your_paypal_client_id
PAYPAL_CLIENT_SECRET=your_paypal_client_secret
PAYPAL_MODE=sandbox
```

#### Stripe Configuration
```env
STRIPE_KEY=your_stripe_publishable_key
STRIPE_SECRET=your_stripe_secret_key
```

### File Upload
Ensure the `public/uploads` directory is writable:
```bash
chmod -R 775 public/uploads
```

## 📁 **Project Structure**

```
ecommerce/
├── app/
│   ├── Http/Controllers/
│   │   ├── Backend/          # Admin controllers
│   │   └── Frontend/         # Frontend controllers
│   ├── Models/               # Eloquent models
│   ├── DataTables/           # DataTable classes
│   └── Helpers/              # Helper functions
├── resources/views/
│   ├── admin/                # Admin panel views
│   ├── frontend/             # Frontend views
│   └── vendor/               # Vendor panel views
├── routes/
│   ├── web.php               # Main web routes
│   ├── admin.php             # Admin routes
│   └── auth.php              # Authentication routes
└── public/
    ├── backend/              # Admin assets
    └── frontend/             # Frontend assets
```

## 👤 **Default Admin Credentials**

After running the seeders, you can access the admin panel with:
- **Email**: admin@example.com
- **Password**: password

## 🎯 **Key Features in Detail**

### Product Management
- **Categories**: Hierarchical category system (Category → Subcategory → Child Category)
- **Products**: Full CRUD operations with image galleries
- **Variants**: Product variants and variant items (size, color, etc.)
- **Brands**: Brand management system

### Flash Sales
- Time-limited sales with countdown timers
- Product-specific discounts
- Homepage display options

### Shopping Cart
- Session-based cart functionality
- Quantity updates
- Coupon application
- Cart total calculations

### User Dashboard
- Order history
- Profile management
- Address book
- Account settings

### Admin Panel
- Product approval system
- Order management
- User management
- System settings
- Payment gateway configuration

## 🔒 **Security Features**

- CSRF protection
- SQL injection prevention
- XSS protection
- Secure file uploads
- Authentication middleware
- Role-based access control

## 🧪 **Testing**

Run the test suite:
```bash
php artisan test
```

## 📝 **API Documentation**

The application includes API routes for:
- Product catalog
- User authentication
- Order management
- Payment processing

## 🤝 **Contributing**

As this is a learning project based on a Udemy tutorial, contributions are not actively sought. However, feedback and suggestions are welcome.


## 📄 **License**

This project is developed as part of a Udemy tutorial and is intended for educational purposes. Please check the original tutorial for licensing information.

## 🆘 **Support**

If you encounter any issues or have questions:
1. Check the [Issues](https://github.com/metalredlind/ecommerce-laravel/issues) page
2. Create a new issue with detailed information
3. Contact the development team

## 🔄 **Development Status**

⚠️ **This project is currently in development** ⚠️

- Core features are implemented
- Testing and bug fixes ongoing
- Additional features planned
- Performance optimization in progress

---

**Built with ❤️ using Laravel**
