# Email Configuration Guide

The NGO Management System is now configured to use SMTP for sending emails. You need to set up your email credentials to make it work.

## Quick Setup Options

### Option 1: Gmail SMTP (Recommended for Personal Use)

1. **Enable 2-Factor Authentication** on your Gmail account
2. **Generate an App Password**:
   - Go to https://myaccount.google.com/apppasswords
   - Select "Mail" and "Windows Computer" (or your device)
   - Google will generate a 16-character password
   
3. **Update your `.env` file**:
```
MAIL_PROTOCOL = smtp
MAIL_HOST = smtp.gmail.com
MAIL_PORT = 587
MAIL_ENCRYPTION = tls
MAIL_USERNAME = your-email@gmail.com
MAIL_PASSWORD = your-16-character-app-password
MAIL_FROM_ADDRESS = your-email@gmail.com
MAIL_FROM_NAME = Jan Prakrati Seva Trust
```

4. **Test it**: Try the forgot password feature in your application

---

### Option 2: Mailtrap (Best for Development/Testing)

Mailtrap allows you to test email sending without sending real emails. Perfect for development!

1. **Create a Mailtrap account**: https://mailtrap.io (free tier available)
2. **Create a new inbox** in your Mailtrap dashboard
3. **Get your SMTP credentials** from the inbox settings
4. **Update your `.env` file**:
```
MAIL_PROTOCOL = smtp
MAIL_HOST = sandbox.smtp.mailtrap.io
MAIL_PORT = 2525
MAIL_ENCRYPTION = tls
MAIL_USERNAME = your-mailtrap-username
MAIL_PASSWORD = your-mailtrap-password
MAIL_FROM_ADDRESS = noreply@ngo.org
MAIL_FROM_NAME = Jan Prakrati Seva Trust
```

5. **All test emails will appear in your Mailtrap inbox** - no real emails sent!

---

### Option 3: SendGrid (Professional)

1. **Sign up at SendGrid**: https://sendgrid.com (free tier: 100 emails/day)
2. **Create an API Key** in your SendGrid dashboard
3. **Update your `.env` file**:
```
MAIL_PROTOCOL = smtp
MAIL_HOST = smtp.sendgrid.net
MAIL_PORT = 587
MAIL_ENCRYPTION = tls
MAIL_USERNAME = apikey
MAIL_PASSWORD = your-sendgrid-api-key
MAIL_FROM_ADDRESS = noreply@yourdomain.com
MAIL_FROM_NAME = Jan Prakrati Seva Trust
```

---

### Option 4: Local Testing with MailHog (Advanced)

For local development without external services:

1. **Install MailHog**: Download from https://github.com/mailhog/MailHog/releases
2. **Run MailHog**: `./mailhog`
3. **Update your `.env` file**:
```
MAIL_PROTOCOL = smtp
MAIL_HOST = localhost
MAIL_PORT = 1025
MAIL_ENCRYPTION = 
MAIL_USERNAME = 
MAIL_PASSWORD = 
MAIL_FROM_ADDRESS = noreply@ngo.org
MAIL_FROM_NAME = Jan Prakrati Seva Trust
```

4. **View emails**: Open http://localhost:8025 to see all test emails

---

## Verification Steps

After configuring your email:

1. **Navigate to**: http://your-site.com/forgot-password
2. **Enter a test email address** (your own email or test email)
3. **Check your inbox** (or Mailtrap inbox if using Option 2)
4. **Click the reset link** to verify it works
5. **Check your application logs** at `writable/logs/` if there are issues

---

## Troubleshooting

### "Email not appearing in inbox"
- ✅ Verify `.env` settings are correct
- ✅ Check your spam/junk folder
- ✅ If using Gmail, allow "Less secure apps" access
- ✅ Check application logs: `writable/logs/log-*.log`

### "SMTP Connection Failed"
- ✅ Verify MAIL_HOST is correct for your provider
- ✅ Verify MAIL_PORT matches your provider (usually 587 or 465)
- ✅ Check MAIL_ENCRYPTION setting (tls or ssl)
- ✅ Ensure your firewall allows SMTP connections

### "Authentication Failed"
- ✅ Double-check username and password in `.env`
- ✅ For Gmail, ensure you're using the 16-character app password, not your regular password
- ✅ Verify credentials are quoted properly: `MAIL_PASSWORD = "password-with-special-chars"`

### "Connection Timeout"
- This usually means the SMTP server can't be reached
- ✅ Try a different port (587 vs 465)
- ✅ Check if your ISP blocks SMTP ports
- ✅ Verify the MAIL_HOST is correct

---

## Email Features in Your System

Once email is configured, these features will work:

- ✅ **Password Reset** - Users can reset forgotten passwords
- ✅ **Member Welcome Email** - Auto-sent when members register
- ✅ **Donation Receipts** - Sent automatically after donations
- ✅ **Event Notifications** - Event confirmations and updates
- ✅ **Admin Notifications** - Staff alerts for important actions

---

## Security Notes

- **Never commit `.env` to version control** - it contains sensitive credentials
- **Use environment variables** in production rather than hardcoding
- **Rotate API keys** periodically if using SendGrid or similar services
- **Use strong passwords** for email accounts
- **Enable 2FA** on your email account for additional security

---

## Support

For more information:
- CodeIgniter Email Docs: https://codeigniter.com/user_guide/libraries/email.html
- Your email provider's SMTP documentation
- Check `writable/logs/` for detailed error messages
