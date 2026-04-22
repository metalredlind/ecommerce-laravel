# 🛒 Laravel Ecommerce Platform

A modern, feature-rich ecommerce platform built with Laravel 10, featuring a multi-vendor marketplace, comprehensive admin panel, and user dashboard with advanced shopping capabilities.

## 🚀 Features

### 🏪 **Multi-Vendor Marketplace**
- Vendor registration and profile management
- Vendor shop profiles and settings
- Vendor product management with approval system
- Vendor dashboard and order handling
- Vendor terms and conditions on dashboard
- Vendor role verification on sidebar

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

### 🛡️ **Admin Panel**
- Comprehensive admin dashboard
- Product approval system
- Order management
- User and vendor management
- Customer and vendor lists
- Vendor request approval system
- Warning alerts for inactive/banned accounts
- Settings and configuration
- Analytics and reporting
- Homepage settings management (popular categories + multi product sliders)
- Slider management
- Payment settings (Stripe/PayPal) and transaction reports
- Footer management (footer info, social links, grid sections)
- Newsletter/Subscriber management with email campaigns

### 🎨 **Frontend Features**
- Responsive design
- Modern UI/UX
- Product sliders and banners
- Flash sale displays
- Shopping cart sidebar
- Newsletter subscription with email verification
- Dynamic footer with customizable sections
- Contact page with email functionality
- About page
- Terms and conditions page

## 🛠️ **Technology Stack**

- Backend: Laravel 10.x
- Authentication: Laravel Breeze + Sanctum
- Frontend: Blade Templates, Bootstrap, Tailwind CSS, Alpine.js, jQuery
- Asset Bundling: Vite (v4)
- Database: MySQL
- Payment: PayPal, Stripe
- Cart: anayarojo/shoppingcart
- DataTables: Yajra DataTables
- Notifications: Toastr
- HTTP Client: Axios

## 📋 **Requirements**

- PHP >= 8.1
- Composer
- MySQL >= 5.7
- Node.js & NPM (for asset compilation)
- Git
- Optional: Docker (Laravel Sail)

## 🚀 **Installation**

1. Clone the repository
   ```bash
   git clone <repository-url>
   cd ecommerce
   ```

2. Install PHP dependencies
   ```bash
   composer install
   ```

3. Install Node.js dependencies
   ```bash
   npm install
   ```

4. Environment setup
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

5. Configure database
   ```env
   # Edit .env file with your database credentials
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=your_database_name
   DB_USERNAME=your_username
   DB_PASSWORD=your_password
   ```

6. Run migrations and seeders
   ```bash
   php artisan migrate
   php artisan db:seed
   ```

7. (Optional) Link storage if you use the storage disk for uploads
   ```bash
   php artisan storage:link
   ```

8. Compile assets
    ```bash
    npm run dev
    ```

9. Start the development server
    ```bash
    php artisan serve
    ```

10. For production deployment
    ```bash
    npm run build
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
│   │   ├── Backend/          # Admin & Vendor controllers (settings, products, payments, orders)
│   │   ├── Frontend/         # Frontend controllers
│   │   └── Auth/             # Authentication controllers
│   ├── Models/               # Eloquent models
│   ├── DataTables/           # DataTable classes
│   └── Helpers/              # Helper functions
├── resources/
│   ├── views/
│   │   ├── admin/            # Admin panel views
│   │   ├── frontend/         # Frontend views
│   │   ├── profile/          # User profile views
│   │   └── auth/             # Authentication views
│   ├── css/                  # CSS files
│   └── js/                   # JavaScript files
├── routes/
│   ├── web.php               # Main web routes (frontend, user dashboard, cart, checkout, payment)
│   ├── admin.php             # Admin routes (dashboard, products, orders, settings, footer, subscribers)
│   ├── vendor.php            # Vendor routes (dashboard, products, orders, shop profile)
│   ├── api.php               # API routes
│   └── auth.php              # Authentication routes
├── config/                   # Configuration files
│   ├── settings.php          # Application settings
│   ├── order_status.php      # Order status configurations
│   ├── paypal.php            # PayPal configuration
│   └── datatables.php        # DataTables configuration
├── tailwind.config.js        # Tailwind CSS configuration
└── public/
    ├── backend/              # Admin assets
    └── frontend/             # Frontend assets
```

## 👤 **Default Admin Credentials**

After running the seeders, you can access the admin panel with:
- Email: admin@example.com
- Password: password

## 🎯 **Key Features in Detail**

### Multi-Vendor System
- Vendor Registration: Complete vendor onboarding process with request system
- Vendor Profiles: Comprehensive vendor shop profiles with customizable settings
- Product Approval: Admin approval system for vendor products with pending/approved status
- Vendor Dashboard: Dedicated dashboard for vendors to manage products, variants, and orders
- Vendor Orders: Separate order management for vendors with status updates
- Vendor Request Approval: Admin dashboard for approving vendor registration requests

### Product Management
- Categories: Hierarchical category system (Category → Subcategory → Child Category)
- Products: Full CRUD operations with image galleries
- Variants: Product variants and variant items (size, color, etc.)
- Brands: Brand management system
- Product Images: Multiple image galleries with zoom functionality

### Flash Sales
- Time-limited sales with countdown timers
- Product-specific discounts
- Homepage display options
- Flash sale management dashboard

### Shopping Cart
- Session-based cart functionality
- Quantity updates
- Coupon application
- Cart total calculations
- Persistent cart across sessions

### User Dashboard
- Order history with tracking
- Profile management
- Address book management
- Account settings
- Wishlist management with add/remove functionality

### Admin Panel
- Product approval system
- Order management with status tracking
- User and vendor management
- Customer and vendor lists with detailed management
- Vendor request approval system
- Warning alerts for inactive or banned accounts
- System settings
- Payment gateway configuration
- Analytics and reporting
- Homepage settings (popular categories + 3 customizable product slider sections)
- Slider management with image uploads
- Payment settings and transaction reports
- Footer management (footer info, social links, customizable grid sections)
- Newsletter subscriber management with bulk email campaigns
- Email configuration settings (SMTP)

### Payment Processing
- PayPal Integration: Complete PayPal payment flow
- Stripe Integration: Credit card processing via Stripe
- Transaction Management: Complete transaction tracking
- Payment Settings: Configurable payment options

### Shipping Management
- Shipping Rules: Configurable shipping rules based on location/weight
- Address Management: User address book functionality
- Order Tracking: Complete order status tracking system with 7 statuses:
  - Pending Orders
  - Processed Orders
  - Dropped Off Orders
  - Shipped Orders
  - Out for Delivery Orders
  - Delivered Orders
  - Canceled Orders

## 🔒 **Security Features**

- CSRF protection
- SQL injection prevention
- XSS protection
- Secure file uploads
- Authentication middleware
- Role-based access control
- Email verification
- Password reset functionality

## 🧪 **Testing**

Run the test suite:
```bash
php artisan test
```

## 🎨 **Frontend Technologies**

- Tailwind CSS: Utility-first CSS framework for rapid UI development
- Alpine.js: Lightweight JavaScript framework for reactive components
- Bootstrap: Responsive CSS framework for consistent design
- jQuery: JavaScript library for DOM manipulation
- Vite: Fast asset bundler and development server
- Slick: Responsive carousel/slider library
- Select2: Enhanced select dropdowns
- Toastr: Notification system for user feedback
- Isotope: Dynamic, filterable grid layouts
- SimplyCountdown: Countdown timers (e.g., for flash sales)
- Venobox: Lightbox for images/videos
- jQuery Nice Number: Styled number inputs
- jQuery Waypoints: Scroll-based triggers
- Axios: Promise-based HTTP client
- DataTables: Advanced table features with server-side processing (Yajra DataTables)

## 📝 **API Documentation**

The application includes API routes for:
- Product catalog
- User authentication (Sanctum-protected)
- Order management
- Payment processing

## 🧰 **Developer Tools**

- Laravel Debugbar (development)
- Laravel Pint (code style)
- Laravel Sail (optional Docker environment)

## 🤝 **Contributing**

As this is a learning project based on a Udemy tutorial, contributions are not actively sought. However, feedback and suggestions are welcome.

## 📄 **License**

This project is developed as part of a Udemy tutorial and is intended for educational purposes. Please check the original tutorial for licensing information.

## 🆘 **Support**

If you encounter any issues or have questions:
1. Check the Issues page
2. Create a new issue with detailed information
3. Contact the development team

## 🔄 **Development Status**

✅ **This project is production-ready** ✅

- ✅ Core features implemented and tested
- ✅ Multi-vendor marketplace functionality
- ✅ Payment gateway integrations (PayPal & Stripe)
- ✅ Complete order management system with 7 order statuses
- ✅ Responsive frontend design
- ✅ Admin and vendor dashboards
- ✅ Advanced product management with variants
- ✅ Flash sales and coupon system
- ✅ Shipping and tax management
- ✅ User authentication and authorization (Breeze + Sanctum)
- ✅ Footer management system (info, social links, grid sections)
- ✅ Newsletter subscription with email verification
- ✅ Subscriber management with bulk email campaigns
- ✅ Homepage customization (sliders, popular categories, product sections)
- ✅ Transaction tracking and reporting
- ✅ Contact page with email functionality
- ✅ About page
- ✅ Terms and conditions page
- ✅ Vendor request approval system
- ✅ Customer and vendor management lists
- ✅ Warning alerts for inactive/banned accounts
- 🔄 Continuous improvements and optimizations

---

**Built with ❤️ using Laravel**
