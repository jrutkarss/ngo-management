# NGO Management System - Complete Implementation Guide

## Project Overview
A comprehensive PHP CodeIgniter 4 based NGO Management System with all 23 required features fully implemented.

## Features Implemented

### 1. **Member Management**
- ✅ Member Registration & Login
- ✅ Member ID Card Generation (PDF)
- ✅ Membership Applications
- ✅ Member Dashboard
- ✅ Member Status Management (Active/Blocked)

### 2. **Donation System**
- ✅ Online Donations (Razorpay Integration)
- ✅ Cash Donations
- ✅ Donation Receipts (PDF)
- ✅ 80G Tax-Deductible Receipts
- ✅ Donations List & Tracking

### 3. **Documents & Certificates**
- ✅ ID Card Generation
- ✅ Appointment Letter Generation
- ✅ Donation Receipt Generation
- ✅ Membership Certificate
- ✅ QR Code Integration

### 4. **Notice & Communication System**
- ✅ Notice Board
- ✅ Member Messages
- ✅ Email Notifications on Every Action
- ✅ Enquiry Management
- ✅ Response System

### 5. **Website Features**
- ✅ About Us Page
- ✅ Our Objectives Page
- ✅ Management Team Listing
- ✅ President's Message
- ✅ Gallery with Image Management
- ✅ Testimonials
- ✅ Latest Activity Feed
- ✅ YouTube Videos Section
- ✅ Upcoming Events Display
- ✅ Donors List
- ✅ Contact Form with Email Integration
- ✅ Social Media Links Ready

### 6. **Admin Panel**
- ✅ Complete Dashboard with Statistics
- ✅ Member Management
- ✅ Donation Management
- ✅ Event Management
- ✅ News Management
- ✅ Enquiry Management
- ✅ Receipt Generation
- ✅ ID Card Generation

### 7. **Security Features**
- ✅ Admin Authentication
- ✅ Member Authentication
- ✅ Password Hashing
- ✅ Session Management
- ✅ CSRF Protection

## Installation & Setup

### Prerequisites
- PHP 8.2 or higher
- MySQL/MariaDB 5.7+
- Composer
- Apache/Nginx with mod_rewrite

### Step 1: Install Dependencies
```bash
cd /home/utkarss/ngo-management
composer install
```

### Step 2: Configure Database

Create a MySQL database and update `.env` file:

```bash
cp .env.example .env
```

Edit `.env`:
```
database.default.hostname = localhost
database.default.database = ngo_management
database.default.username = root
database.default.password = your_password
database.default.DBDriver = MySQLi
```

### Step 3: Import Database Schema

```bash
mysql -u root -p ngo_management < setup_database.sql
```

### Step 4: Configure Email (SMTP)

Update `.env`:
```
MAIL_DRIVER = smtp
MAIL_HOST = smtp.gmail.com
MAIL_PORT = 587
MAIL_USERNAME = your-email@gmail.com
MAIL_PASSWORD = your-app-password
MAIL_ENCRYPTION = tls
MAIL_FROM_ADDRESS = noreply@ngo.org
MAIL_FROM_NAME = Jan Prakrati Seva Trust
```

### Step 5: Configure Admin Credentials

Update `.env` or use defaults:
```
ADMIN_EMAIL = admin@ngo.org
ADMIN_PASSWORD = admin123
```

### Step 6: Set Up File Permissions

```bash
chmod -R 755 writable/
chmod -R 755 public/uploads/
mkdir -p writable/uploads/{idcards,letters,receipts,certificates,qrcodes,events,news}
chmod -R 777 writable/uploads/
```

### Step 7: Configure Razorpay (Optional for Online Donations)

Update `.env`:
```
RAZORPAY_KEY = your_razorpay_key_id
RAZORPAY_SECRET = your_razorpay_secret_key
```

### Step 8: Start Development Server

```bash
cd /home/utkarss/ngo-management
php spark serve
```

Access the application at `http://localhost:8080`

## Database Schema

The system includes 20+ tables for managing:
- Members
- Designations
- Donations
- Gallery
- Beneficiaries
- Certificates
- Events & Registrations
- Campaigns & Projects
- Expenses
- Internships & Applications
- News
- Activity Posts
- Enquiries
- Receipts
- Member Messages

## Directory Structure

```
ngo-management/
├── app/
│   ├── Controllers/        # Application controllers
│   │   ├── Home.php       # Public pages
│   │   ├── Admin.php      # Admin panel
│   │   ├── Auth.php       # Authentication
│   │   ├── Donation.php   # Donation handling
│   │   ├── Member.php     # Member features
│   ├── Models/             # Database models
│   ├── Views/              # View files
│   │   ├── layout/        # Layouts
│   │   ├── admin/         # Admin pages
│   │   ├── auth/          # Auth pages
│   ├── Libraries/          # Custom libraries
│   │   ├── PdfGenerator.php   # PDF generation
│   │   ├── EmailNotification.php  # Email handling
│   ├── Config/            # Configuration files
├── public/
│   ├── index.php          # Entry point
│   └── uploads/           # User uploaded files
├── composer.json          # Dependencies
├── setup_database.sql     # Database schema
└── .env                   # Environment config
```

## User Roles & Access

### Admin Panel Access
- **URL:** `http://localhost:8080/admin/login`
- **Default Email:** admin@ngo.org
- **Default Password:** admin123

Features:
- Dashboard with statistics
- Member management
- Donation tracking
- Report generation
- Event management
- News publishing

### Member Portal Access
- **URL:** `http://localhost:8080/member/login`

Features:
- View profile
- Download ID card
- Donation history
- Certificates
- Messages
- Event registration

### Public Website
- **URL:** `http://localhost:8080/`

Features:
- View events
- Make donations
- Contact form
- Gallery view
- Read news

## Key Features Details

### 1. ID Card Generation
- PDF format with member photo
- QR code for verification
- Unique member ID
- Auto-generated and stored

### 2. Donation System
- Multiple payment methods (Online, Cash, Bank)
- Receipt generation (Regular & 80G)
- Email confirmation
- Donor tracking

### 3. Email Notifications
Automated emails for:
- New member registration
- Donation receipts
- Event registrations
- Enquiry responses
- Member notices
- Appointment letters

### 4. Admin Features
- Generate ID cards on demand
- Send member notices
- Track donations
- Manage events
- Publish news
- Handle enquiries

### 5. Document Generation
- ID Cards (PDF)
- Appointment Letters (PDF)
- Donation Receipts (PDF)
- 80G Certificates (PDF)
- Membership Certificates (PDF)
- QR Codes

## API Endpoints

### Public Routes
```
GET  /                          # Homepage
GET  /about                     # About page
GET  /events                    # Events listing
GET  /objectives                # Our objectives
GET  /team                      # Management team
GET  /president                 # President's message
GET  /testimonials              # Testimonials
GET  /donors                    # Donors list
GET  /contact                   # Contact page
POST /contact                   # Submit contact
GET  /gallery                   # Photo gallery
GET  /activity                  # Latest activity
GET  /videos                    # YouTube videos
GET  /notice                    # Notice board
GET  /donate                    # Donation page
POST /donate                    # Process donation
```

### Authentication Routes
```
GET  /admin/login               # Admin login
POST /admin/login               # Process login
GET  /member/login              # Member login
POST /member/login              # Process login
GET  /member/register           # Registration
POST /member/register           # Process registration
GET  /logout                    # Logout
```

### Admin Routes (Protected)
```
GET  /admin                     # Dashboard
GET  /admin/members             # Members list
GET  /admin/members/add         # Add member
POST /admin/members/save        # Save member
GET  /admin/donations           # Donations list
GET  /admin/donations/add-cash  # Add cash donation
POST /admin/donations/save-cash # Save donation
GET  /admin/events              # Events management
GET  /admin/news                # News management
GET  /admin/enquiries           # Enquiries
```

### Member Routes (Protected)
```
GET  /member/dashboard          # Dashboard
GET  /member/idcard             # Download ID card
GET  /member/donations          # Donation history
GET  /member/profile            # Profile
POST /member/update-profile     # Update profile
```

## Configuration Files

### Email Configuration (.env)
```
MAIL_DRIVER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=your-email@gmail.com
MAIL_PASSWORD=your-app-password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=noreply@ngo.org
```

### Database Configuration (.env)
```
database.default.hostname=localhost
database.default.database=ngo_management
database.default.username=root
database.default.password=
database.default.DBDriver=MySQLi
```

### Admin Credentials (.env)
```
ADMIN_EMAIL=admin@ngo.org
ADMIN_PASSWORD=admin123
```

## Customization Guide

### Change Organization Name
Update in `.env`:
```
APP_NAME=Your Organization Name
```

This will be reflected in all PDFs, emails, and pages.

### Customize Email Templates
Edit files in `app/Libraries/EmailNotification.php`

### Customize PDF Templates
Edit methods in `app/Libraries/PdfGenerator.php`

### Add Social Media Links
Update `app/Views/layout/header.php` with your social media URLs

## Troubleshooting

### Database Connection Error
- Check MySQL is running
- Verify credentials in .env
- Ensure database exists

### Email Not Sending
- Check SMTP credentials
- Verify "Less Secure Apps" enabled (Gmail)
- Check logs: `writable/logs/log-*.log`

### PDF Generation Error
- Ensure `writable/uploads/` has write permissions
- Check DOMPDF library is installed

### File Upload Issues
- Verify `public/uploads/` exists and is writable
- Check file size limits in php.ini

## Security Checklist

- [ ] Change default admin credentials
- [ ] Update SMTP credentials
- [ ] Set secure database password
- [ ] Enable HTTPS
- [ ] Set proper file permissions
- [ ] Regular database backups
- [ ] Update CodeIgniter framework regularly

## Support & Maintenance

### Regular Maintenance
- Review member registrations
- Process donations
- Generate reports
- Backup database

### Monitoring
- Check error logs
- Monitor email delivery
- Track page performance
- Review user feedback

## License
MIT License - See LICENSE file

## Contact
For support and inquiries, contact the development team.

---

**Last Updated:** April 2, 2026
**Version:** 1.0.0
**Status:** Production Ready
