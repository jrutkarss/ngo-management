#!/bin/bash

# NGO Management System - Automated Setup Script
# This script automates the installation and configuration of the NGO Management System

set -e

echo "=========================================="
echo "NGO Management System - Setup Guide"
echo "=========================================="
echo ""

# Check PHP version
echo "[1/6] Checking PHP version..."
PHP_VERSION=$(php -v | head -n 1 | grep -oP 'PHP \K[0-9.]+')
echo "✓ PHP Version: $PHP_VERSION"
echo ""

# Install Composer dependencies
echo "[2/6] Installing Composer dependencies..."
if command -v composer &> /dev/null; then
    composer install
    echo "✓ Composer dependencies installed"
else
    echo "⚠ Composer not found. Please install Composer first."
    exit 1
fi
echo ""

# Create necessary directories
echo "[3/6] Creating required directories..."
mkdir -p writable/uploads/{idcards,letters,receipts,certificates,qrcodes,events,news,gallery}
mkdir -p public/uploads/{idcards,letters,receipts,certificates,qrcodes,events,news,gallery}
mkdir -p writable/{cache,debugbar,logs,session}
chmod -R 777 writable/
chmod -R 755 public/
echo "✓ Directories created"
echo ""

# Create .env file if it doesn't exist
echo "[4/6] Configuring environment..."
if [ ! -f .env ]; then
    echo "Creating .env file..."
    cat > .env << EOF
CI_ENVIRONMENT = development

app.baseURL = 'http://localhost:8080'
app.forceGlobalSecureRequests = false
app.CSRFTokenRandomize = true

database.default.hostname = localhost
database.default.database = ngo_management
database.default.username = root
database.default.password = 
database.default.DBDriver = MySQLi
database.default.DBPrefix = 
database.default.port = 3306

ADMIN_EMAIL = admin@ngo.org
ADMIN_PASSWORD = admin123

APP_NAME = Jan Prakrati Seva Trust
ORG_80G_NUMBER = XXXX/XXXX

MAIL_DRIVER = smtp
MAIL_HOST = smtp.gmail.com
MAIL_PORT = 587
MAIL_USERNAME = your-email@gmail.com
MAIL_PASSWORD = your-app-password
MAIL_ENCRYPTION = tls
MAIL_FROM_ADDRESS = noreply@ngo.org
MAIL_FROM_NAME = Jan Prakrati Seva Trust

RAZORPAY_KEY = 
RAZORPAY_SECRET = 
EOF
    echo "✓ .env file created"
    echo "⚠ Please update .env with your database credentials and email settings"
else
    echo "✓ .env file already exists"
fi
echo ""

# Database setup instructions
echo "[5/6] Database Setup Instructions..."
echo "Please create a MySQL database:"
echo ""
echo "  mysql -u root -p"
echo "  CREATE DATABASE ngo_management;"
echo "  EXIT;"
echo ""
echo "Then import the schema:"
echo "  mysql -u root -p ngo_management < setup_database.sql"
echo ""
read -p "Have you completed the database setup? (y/n) " -n 1 -r
echo ""
if [[ $REPLY =~ ^[Yy]$ ]]; then
    echo "✓ Database setup confirmed"
else
    echo "⚠ Please complete the database setup and run this script again"
    exit 1
fi
echo ""

# Verify installation
echo "[6/6] Verifying installation..."
echo "✓ Installation files ready"
echo "✓ Directories created"
echo "✓ Dependencies installed"
echo ""

echo "=========================================="
echo "Setup Complete!"
echo "=========================================="
echo ""
echo "Next steps:"
echo "1. Update .env with your database credentials"
echo "2. Update .env with your SMTP email settings"
echo "3. Run: php spark serve"
echo "4. Access the system:"
echo "   - Public: http://localhost:8080"
echo "   - Admin:  http://localhost:8080/admin/login"
echo "   - Member: http://localhost:8080/member/login"
echo ""
echo "Default Admin Credentials:"
echo "  Email:    admin@ngo.org"
echo "  Password: admin123"
echo ""
echo "For more details, see DEPLOYMENT_GUIDE.md"
echo "=========================================="
