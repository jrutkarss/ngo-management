-- Create all NGO Management System Tables

-- 1. Designations Table
CREATE TABLE IF NOT EXISTS `designations` (
  `id` INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `name` VARCHAR(255) NOT NULL,
  `description` TEXT,
  `membership_fee` DECIMAL(10, 2) DEFAULT 0,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 2. Members Table
CREATE TABLE IF NOT EXISTS `members` (
  `id` INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `designation_id` INT(11) UNSIGNED NULL,
  `name` VARCHAR(255) NOT NULL,
  `email` VARCHAR(255) NOT NULL UNIQUE,
  `phone` VARCHAR(20) NULL,
  `address` TEXT NULL,
  `date_of_birth` DATE NULL,
  `photo_path` VARCHAR(255) NULL,
  `id_card_path` VARCHAR(255) NULL,
  `membership_fee` DECIMAL(10, 2) DEFAULT 0,
  `membership_status` ENUM('active', 'inactive', 'blocked') DEFAULT 'active',
  `referred_by` INT(11) UNSIGNED NULL,
  `referral_link` VARCHAR(255) NULL UNIQUE,
  `membership_receipt_path` VARCHAR(255) NULL,
  `appointment_letter_path` VARCHAR(255) NULL,
  `membership_certificate_path` VARCHAR(255) NULL,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  FOREIGN KEY (`referred_by`) REFERENCES `members` (`id`) ON DELETE SET NULL,
  FOREIGN KEY (`designation_id`) REFERENCES `designations` (`id`) ON DELETE SET NULL,
  KEY(`email`),
  KEY(`membership_status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 3. Gallery Table
CREATE TABLE IF NOT EXISTS `gallery` (
  `id` INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `image_path` VARCHAR(255) NOT NULL,
  `caption` TEXT NULL,
  `event_id` INT(11) UNSIGNED NULL,
  `uploaded_by` INT(11) UNSIGNED NULL,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  KEY(`event_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 4. Donations Table
CREATE TABLE IF NOT EXISTS `donations` (
  `id` INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `member_id` INT(11) UNSIGNED NULL,
  `donor_name` VARCHAR(255) NOT NULL,
  `donor_email` VARCHAR(255) NOT NULL,
  `donor_phone` VARCHAR(20) NULL,
  `amount` DECIMAL(12, 2) NOT NULL,
  `type` ENUM('online', 'cash', 'bank_transfer', 'upi', 'custom') DEFAULT 'online',
  `purpose` TEXT NULL,
  `campaign_id` INT(11) UNSIGNED NULL,
  `payment_gateway` VARCHAR(50) NULL,
  `transaction_id` VARCHAR(255) NULL UNIQUE,
  `status` ENUM('pending', 'success', 'failed', 'refunded') DEFAULT 'pending',
  `receipt_path` VARCHAR(255) NULL,
  `80g_receipt_path` VARCHAR(255) NULL,
  `referral_member_id` INT(11) UNSIGNED NULL,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  FOREIGN KEY (`member_id`) REFERENCES `members` (`id`) ON DELETE SET NULL,
  KEY(`status`),
  KEY(`donor_email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 5. Beneficiaries Table
CREATE TABLE IF NOT EXISTS `beneficiaries` (
  `id` INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `name` VARCHAR(255) NOT NULL,
  `email` VARCHAR(255) NULL,
  `phone` VARCHAR(20) NULL,
  `address` TEXT NOT NULL,
  `location` VARCHAR(255) NULL,
  `date_of_birth` DATE NULL,
  `category` VARCHAR(255) NULL,
  `assistance_details` JSON NULL,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  KEY(`location`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 6. Certificate Templates Table
CREATE TABLE IF NOT EXISTS `certificate_templates` (
  `id` INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `name` VARCHAR(255) NOT NULL,
  `image_path` VARCHAR(255) NOT NULL,
  `certificate_type` VARCHAR(100) NOT NULL,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 7. Certificates Table
CREATE TABLE IF NOT EXISTS `certificates` (
  `id` INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `recipient_name` VARCHAR(255) NOT NULL,
  `recipient_email` VARCHAR(255) NOT NULL,
  `member_id` INT(11) UNSIGNED NULL,
  `type` ENUM('membership', 'achievement', 'completion', 'visitor') DEFAULT 'membership',
  `template_id` INT(11) UNSIGNED NULL,
  `certificate_path` VARCHAR(255) NOT NULL,
  `qr_code_path` VARCHAR(255) NULL,
  `verification_code` VARCHAR(255) NOT NULL UNIQUE,
  `issue_date` DATE NOT NULL,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  FOREIGN KEY (`member_id`) REFERENCES `members` (`id`) ON DELETE SET NULL,
  FOREIGN KEY (`template_id`) REFERENCES `certificate_templates` (`id`) ON DELETE SET NULL,
  KEY(`verification_code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 8. Events Table
CREATE TABLE IF NOT EXISTS `events` (
  `id` INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `title` VARCHAR(255) NOT NULL,
  `description` TEXT NOT NULL,
  `event_date` DATETIME NOT NULL,
  `location` VARCHAR(255) NULL,
  `registration_fee` DECIMAL(10, 2) DEFAULT 0,
  `max_participants` INT(11) NULL,
  `image_path` VARCHAR(255) NULL,
  `status` ENUM('upcoming', 'ongoing', 'completed', 'cancelled') DEFAULT 'upcoming',
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  KEY(`event_date`),
  KEY(`status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 9. Event Registrations Table
CREATE TABLE IF NOT EXISTS `event_registrations` (
  `id` INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `event_id` INT(11) UNSIGNED NOT NULL,
  `member_id` INT(11) UNSIGNED NULL,
  `participant_name` VARCHAR(255) NOT NULL,
  `participant_email` VARCHAR(255) NOT NULL,
  `participant_phone` VARCHAR(20) NOT NULL,
  `registration_fee_paid` DECIMAL(10, 2) DEFAULT 0,
  `payment_status` ENUM('pending', 'completed', 'failed') DEFAULT 'pending',
  `receipt_path` VARCHAR(255) NULL,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE CASCADE,
  FOREIGN KEY (`member_id`) REFERENCES `members` (`id`) ON DELETE SET NULL,
  KEY(`participant_email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 10. Campaigns Table
CREATE TABLE IF NOT EXISTS `campaigns` (
  `id` INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `title` VARCHAR(255) NOT NULL,
  `description` TEXT NOT NULL,
  `goal_amount` DECIMAL(15, 2) NOT NULL,
  `start_date` DATE NOT NULL,
  `end_date` DATE NOT NULL,
  `image_path` VARCHAR(255) NULL,
  `status` ENUM('active', 'completed', 'paused', 'cancelled') DEFAULT 'active',
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  KEY(`status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 11. Projects Table
CREATE TABLE IF NOT EXISTS `projects` (
  `id` INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `title` VARCHAR(255) NOT NULL,
  `description` TEXT NOT NULL,
  `total_funds_received` DECIMAL(15, 2) DEFAULT 0,
  `total_expenses` DECIMAL(15, 2) DEFAULT 0,
  `start_date` DATE NULL,
  `end_date` DATE NULL,
  `status` ENUM('planning', 'ongoing', 'completed', 'paused') DEFAULT 'planning',
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  KEY(`status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 12. Expenses Table
CREATE TABLE IF NOT EXISTS `expenses` (
  `id` INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `project_id` INT(11) UNSIGNED NULL,
  `category` VARCHAR(100) NOT NULL,
  `description` TEXT NOT NULL,
  `amount` DECIMAL(12, 2) NOT NULL,
  `expense_date` DATE NOT NULL,
  `payment_method` VARCHAR(100) NULL,
  `receipt_path` VARCHAR(255) NULL,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE SET NULL,
  KEY(`category`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 13. Internships Table
CREATE TABLE IF NOT EXISTS `internships` (
  `id` INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `title` VARCHAR(255) NOT NULL,
  `description` TEXT NOT NULL,
  `duration_weeks` INT(11) NOT NULL,
  `positions_available` INT(11) NOT NULL,
  `start_date` DATE NOT NULL,
  `stipend` DECIMAL(10, 2) NULL,
  `image_path` VARCHAR(255) NULL,
  `status` ENUM('open', 'closed', 'ongoing', 'completed') DEFAULT 'open',
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  KEY(`status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 14. Internship Applications Table
CREATE TABLE IF NOT EXISTS `internship_applications` (
  `id` INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `internship_id` INT(11) UNSIGNED NOT NULL,
  `student_name` VARCHAR(255) NOT NULL,
  `student_email` VARCHAR(255) NOT NULL,
  `student_phone` VARCHAR(20) NOT NULL,
  `resume_path` VARCHAR(255) NULL,
  `cover_letter` TEXT NULL,
  `status` ENUM('applied', 'accepted', 'rejected', 'completed') DEFAULT 'applied',
  `completion_certificate_path` VARCHAR(255) NULL,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  FOREIGN KEY (`internship_id`) REFERENCES `internships` (`id`) ON DELETE CASCADE,
  KEY(`student_email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 15. News Table
CREATE TABLE IF NOT EXISTS `news` (
  `id` INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `title` VARCHAR(255) NOT NULL,
  `content` TEXT NOT NULL,
  `image_path` VARCHAR(255) NULL,
  `is_published` BOOLEAN DEFAULT true,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  KEY(`is_published`),
  KEY(`created_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 16. Activity Posts Table
CREATE TABLE IF NOT EXISTS `activity_posts` (
  `id` INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `caption` TEXT NOT NULL,
  `image_path` VARCHAR(255) NOT NULL,
  `posted_by` INT(11) UNSIGNED NULL,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  KEY(`created_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 17. Enquiries Table
CREATE TABLE IF NOT EXISTS `enquiries` (
  `id` INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `name` VARCHAR(255) NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  `phone` VARCHAR(20) NULL,
  `message` TEXT NOT NULL,
  `subject` VARCHAR(255) NULL,
  `status` ENUM('new', 'responded', 'closed') DEFAULT 'new',
  `admin_response` TEXT NULL,
  `response_date` DATETIME NULL,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  KEY(`status`),
  KEY(`created_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 18. Receipts Table
CREATE TABLE IF NOT EXISTS `receipts` (
  `id` INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `receipt_number` VARCHAR(100) NOT NULL UNIQUE,
  `type` ENUM('membership', 'donation', 'event', '80g', 'custom') DEFAULT 'donation',
  `member_id` INT(11) UNSIGNED NULL,
  `donor_name` VARCHAR(255) NOT NULL,
  `donor_email` VARCHAR(255) NOT NULL,
  `amount` DECIMAL(12, 2) NOT NULL,
  `purpose` TEXT NULL,
  `payment_method` VARCHAR(100) NULL,
  `receipt_path` VARCHAR(255) NOT NULL,
  `qr_code_path` VARCHAR(255) NULL,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  FOREIGN KEY (`member_id`) REFERENCES `members` (`id`) ON DELETE SET NULL,
  KEY(`receipt_number`),
  KEY(`type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 19. Member Messages Table
CREATE TABLE IF NOT EXISTS `member_messages` (
  `id` INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `title` VARCHAR(255) NOT NULL,
  `message` TEXT NOT NULL,
  `sent_by_admin` BOOLEAN DEFAULT true,
  `send_to_all` BOOLEAN DEFAULT false,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 20. Member Message Recipients Table
CREATE TABLE IF NOT EXISTS `member_message_recipients` (
  `id` INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `message_id` INT(11) UNSIGNED NOT NULL,
  `member_id` INT(11) UNSIGNED NOT NULL,
  `is_read` BOOLEAN DEFAULT false,
  `read_at` DATETIME NULL,
  `created_at` DATETIME NULL,
  FOREIGN KEY (`message_id`) REFERENCES `member_messages` (`id`) ON DELETE CASCADE,
  FOREIGN KEY (`member_id`) REFERENCES `members` (`id`) ON DELETE CASCADE,
  KEY(`is_read`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
