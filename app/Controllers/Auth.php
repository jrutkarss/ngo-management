<?php
namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MemberModel;

class Auth extends BaseController
{
    public function memberLogin()
    {
        return view('auth/member_login');
    }

    public function register()
    {
        return view('auth/member_register');
    }

    public function processRegister()
    {
        // Get form inputs
        $name = $this->request->getPost('name') ?? '';
        $email = $this->request->getPost('email') ?? '';
        $phone = $this->request->getPost('phone') ?? '';
        $address = $this->request->getPost('address') ?? '';
        $password = $this->request->getPost('password') ?? '';
        $confirmPassword = $this->request->getPost('confirm_password') ?? '';

        // Validate inputs
        if (empty($name) || empty($email) || empty($password)) {
            return redirect()->back()->with('error', 'Name, email and password are required.');
        }

        // Validate password match
        if ($password !== $confirmPassword) {
            return redirect()->back()->with('error', 'Passwords do not match.');
        }

        // Validate password length
        if (strlen($password) < 6) {
            return redirect()->back()->with('error', 'Password must be at least 6 characters long.');
        }

        // Validate email format
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return redirect()->back()->with('error', 'Please enter a valid email address.');
        }

        $memberModel = new MemberModel();

        // Check if email already exists
        if ($memberModel->where('email', $email)->first()) {
            return redirect()->back()->with('error', 'This email is already registered.');
        }

        // Prepare data
        $data = [
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'address' => $address,
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'membership_status' => 'active',
        ];

        // Insert member
        if ($memberModel->insert($data)) {
            return redirect()->to('/member/login')->with('success', 'Registration successful. Please login to continue.');
        }

        return redirect()->back()->with('error', 'Error during registration. Please try again.');
    }

    public function processLogin()
    {
        // Get form inputs with null checks
        $email = $this->request->getPost('email') ?? '';
        $password = $this->request->getPost('password') ?? '';

        // Validate inputs
        if (empty($email) || empty($password)) {
            return redirect()->back()->with('error', 'Email and password are required.');
        }

        $memberModel = new MemberModel();
        $member = $memberModel->where('email', $email)->first();

        // Check if member exists and password is correct
        if (!$member) {
            return redirect()->back()->with('error', 'Invalid email or password.');
        }

        // Check if member has a password field
        if (!isset($member['password']) || empty($member['password'])) {
            return redirect()->back()->with('error', 'Your account has not been properly configured. Please contact admin.');
        }

        // Verify password
        if (!password_verify($password, $member['password'])) {
            return redirect()->back()->with('error', 'Invalid email or password.');
        }

        // Check if member is active
        if ($member['membership_status'] === 'blocked') {
            return redirect()->back()->with('error', 'Your account has been blocked. Please contact admin.');
        }

        // ✅ FIXED: Set correct session variables to match layout
        session()->set([ 
            'member_id' => $member['id'],
            'member_name' => $member['name'],
            'member_email' => $member['email'],
            'isLoggedIn' => true,  // ← CHANGED FROM 'is_logged_in' to 'isLoggedIn'
        ]);

        return redirect()->to('/member/dashboard');
    }

    public function adminLogin()
    {
        return view('auth/admin_login');
    }

    public function processAdminLogin()
    {
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $adminEmail = env('ADMIN_EMAIL', 'admin@ngo.org');
        $adminPassword = env('ADMIN_PASSWORD', 'admin123');

        if ($email === $adminEmail && $password === $adminPassword) {
            session()->set([
                'admin_logged_in' => true,
                'admin_email' => $email,
            ]);

            return redirect()->to('/admin');
        }

        return redirect()->back()->with('error', 'Invalid admin credentials.');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }

    // ========== PASSWORD RESET FUNCTIONALITY ==========
    public function forgotPassword()
    {
        return view('auth/forgot_password');
    }

    public function processForgotPassword()
    {
        $email = $this->request->getPost('email') ?? '';

        if (empty($email)) {
            return redirect()->back()->with('error', 'Email address is required.');
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return redirect()->back()->with('error', 'Please enter a valid email address.');
        }

        $memberModel = new MemberModel();
        $member = $memberModel->where('email', $email)->first();

        // For security, don't reveal if email exists or not
        if (!$member) {
            return redirect()->to('/member/login')->with('success', 'If an account exists with this email, a password reset link has been sent.');
        }

        // Generate reset token
        $resetToken = bin2hex(random_bytes(32));
        $resetTokenHash = hash('sha256', $resetToken);

        // Store token in database with expiration (1 hour)
        $db = \Config\Database::connect();
        $db->table('password_resets')->insert([
            'member_id' => $member['id'],
            'token_hash' => $resetTokenHash,
            'created_at' => date('Y-m-d H:i:s'),
            'expires_at' => date('Y-m-d H:i:s', strtotime('+1 hour')),
        ]);

        // Send reset email
        $resetLink = base_url('reset-password/' . $resetToken);
        $this->sendPasswordResetEmail($member, $resetLink);

        return redirect()->to('/member/login')->with('success', 'A password reset link has been sent to your email address.');
    }

    public function resetPassword($token = '')
    {
        if (empty($token)) {
            return redirect()->to('/member/login')->with('error', 'Invalid reset link.');
        }

        // Verify token
        $tokenHash = hash('sha256', $token);
        $db = \Config\Database::connect();
        $resetRecord = $db->table('password_resets')
            ->where('token_hash', $tokenHash)
            ->where('expires_at >', date('Y-m-d H:i:s'))
            ->where('is_used', false)
            ->first();

        if (!$resetRecord) {
            return redirect()->to('/member/login')->with('error', 'This password reset link has expired or is invalid.');
        }

        $data['token'] = $token;
        $data['member_id'] = $resetRecord->member_id;

        return view('auth/reset_password', $data);
    }

    public function processResetPassword()
    {
        $token = $this->request->getPost('token') ?? '';
        $memberId = $this->request->getPost('member_id') ?? '';
        $password = $this->request->getPost('password') ?? '';
        $confirmPassword = $this->request->getPost('confirm_password') ?? '';

        // Validate inputs
        if (empty($token) || empty($password)) {
            return redirect()->back()->with('error', 'All fields are required.');
        }

        if ($password !== $confirmPassword) {
            return redirect()->back()->with('error', 'Passwords do not match.');
        }

        if (strlen($password) < 6) {
            return redirect()->back()->with('error', 'Password must be at least 6 characters long.');
        }

        // Verify token is still valid
        $tokenHash = hash('sha256', $token);
        $db = \Config\Database::connect();
        $resetRecord = $db->table('password_resets')
            ->where('token_hash', $tokenHash)
            ->where('member_id', $memberId)
            ->where('expires_at >', date('Y-m-d H:i:s'))
            ->where('is_used', false)
            ->first();

        if (!$resetRecord) {
            return redirect()->to('/member/login')->with('error', 'This password reset link has expired or is invalid.');
        }

        // Update member password
        $memberModel = new MemberModel();
        $memberModel->update($memberId, [
            'password' => password_hash($password, PASSWORD_DEFAULT)
        ]);

        // Mark token as used
        $db->table('password_resets')
            ->where('token_hash', $tokenHash)
            ->update(['is_used' => true]);

        return redirect()->to('/member/login')->with('success', 'Your password has been reset successfully. Please login with your new password.');
    }

    // ========== EMAIL HELPER ==========
    private function sendPasswordResetEmail($member, $resetLink)
    {
        try {
            $email = \Config\Services::email();
            $email->setTo($member['email']);
            $email->setFrom(env('MAIL_FROM_ADDRESS', 'noreply@ngo.org'), env('APP_NAME', 'Jan Prakrati Seva Trust'));
            $email->setSubject('Password Reset Request - ' . env('APP_NAME', 'Jan Prakrati Seva Trust'));

            $html = <<<HTML
            <html>
            <body style="font-family: Arial, sans-serif; line-height: 1.6;">
                <h2 style="color: #1a5f3d;">Password Reset Request</h2>
                <p>Dear {$member['name']},</p>
                <p>We received a request to reset your password. Click the link below to create a new password:</p>
                
                <p style="margin: 20px 0;">
                    <a href="{$resetLink}" style="display: inline-block; padding: 12px 30px; background-color: #1a5f3d; color: white; text-decoration: none; border-radius: 5px; font-weight: bold;">
                        Reset Password
                    </a>
                </p>

                <p>Or copy and paste this link in your browser:</p>
                <p style="word-break: break-all; color: #666;">{$resetLink}</p>

                <p style="color: #999; font-size: 12px; border-top: 1px solid #ddd; padding-top: 10px;">
                    This link will expire in 1 hour. If you did not request a password reset, please ignore this email and your password will remain unchanged.
                </p>

                <p>Best regards,<br/>
                Jan Prakrati Seva Trust Team</p>
            </body>
            </html>
            HTML;

            $email->setMessage($html);
            return $email->send();
        } catch (\Exception $e) {
            log_message('error', 'Password Reset Email Error: ' . $e->getMessage());
            return false;
        }
    }
}