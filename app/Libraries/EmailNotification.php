<?php

namespace App\Libraries;

use phpmailerphp\PHPMailer\PHPMailer;
use phpmailerphp\PHPMailer\Exception;

class EmailNotification
{
    protected $mailer;

    public function __construct()
    {
        $this->mailer = \Config\Services::email();
    }

    /**
     * Send Welcome Email to New Member
     */
    public function sendWelcomeEmail($member)
    {
        try {
            $this->mailer->setTo($member['email']);
            $this->mailer->setFrom(env('MAIL_FROM_ADDRESS', 'noreply@ngo.org'), env('APP_NAME', 'Jan Prakrati Seva Trust'));
            $this->mailer->setSubject('Welcome to ' . env('APP_NAME', 'Jan Prakrati Seva Trust'));
            
            $html = <<<HTML
            <html>
            <body style="font-family: Arial, sans-serif; line-height: 1.6;">
                <h2 style="color: #1a5f3d;">Welcome to Jan Prakrati Seva Trust!</h2>
                <p>Dear {$member['name']},</p>
                <p>Thank you for becoming a member of our organization. We are excited to have you as part of our growing community dedicated to social and environmental welfare.</p>
                
                <p><strong>Your Member Details:</strong></p>
                <ul>
                    <li>Member ID: {$member['id']}</li>
                    <li>Name: {$member['name']}</li>
                    <li>Email: {$member['email']}</li>
                    <li>Phone: {$member['phone']}</li>
                </ul>

                <p>You can login to your member dashboard using your email and password.</p>
                <p>If you have any questions, please don't hesitate to contact us.</p>
                
                <p>Best regards,<br/>
                Jan Prakrati Seva Trust Team</p>
            </body>
            </html>
            HTML;
            
            $this->mailer->setMessage($html);
            return $this->mailer->send();
        } catch (\Exception $e) {
            log_message('error', 'Welcome Email Error: ' . $e->getMessage());
            return false;
        }
    }

    /**
     * Send Donation Receipt Email
     */
    public function sendDonationReceipt($donation, $receiptPath)
    {
        try {
            $this->mailer->setTo($donation['donor_email']);
            $this->mailer->setFrom(env('MAIL_FROM_ADDRESS', 'noreply@ngo.org'), env('APP_NAME', 'Jan Prakrati Seva Trust'));
            $this->mailer->setSubject('Donation Receipt - ' . env('APP_NAME', 'Jan Prakrati Seva Trust'));
            
            $purpose = $donation['purpose'] ?? 'General Donation';
            
            $html = <<<HTML
            <html>
            <body style="font-family: Arial, sans-serif; line-height: 1.6;">
                <h2 style="color: #1a5f3d;">Thank You for Your Generous Donation!</h2>
                <p>Dear {$donation['donor_name']},</p>
                <p>We are grateful for your donation of <strong>Rs. {$donation['amount']}</strong> to Jan Prakrati Seva Trust.</p>
                
                <p><strong>Donation Details:</strong></p>
                <ul>
                    <li>Amount: Rs. {$donation['amount']}</li>
                    <li>Purpose: {$purpose}</li>
                    <li>Date: {$donation['created_at']}</li>
                    <li>Status: {$donation['status']}</li>
                </ul>

                <p>Your receipt is attached to this email for your records.</p>
                <p>Your contribution will help us continue our mission to serve the community.</p>
                
                <p>Best regards,<br/>
                Jan Prakrati Seva Trust Team</p>
            </body>
            </html>
            HTML;
            
            $this->mailer->setMessage($html);
            return $this->mailer->send();
        } catch (\Exception $e) {
            log_message('error', 'Donation Receipt Email Error: ' . $e->getMessage());
            return false;
        }
    }

    /**
     * Send Event Registration Confirmation
     */
    public function sendEventRegistrationConfirmation($registration, $event)
    {
        try {
            $this->mailer->setTo($registration['participant_email']);
            $this->mailer->setFrom(env('MAIL_FROM_ADDRESS', 'noreply@ngo.org'), env('APP_NAME', 'Jan Prakrati Seva Trust'));
            $this->mailer->setSubject('Event Registration Confirmed - ' . $event['title']);
            
            $html = <<<HTML
            <html>
            <body style="font-family: Arial, sans-serif; line-height: 1.6;">
                <h2 style="color: #1a5f3d;">Event Registration Confirmed!</h2>
                <p>Dear {$registration['participant_name']},</p>
                <p>Your registration for the following event has been confirmed:</p>
                
                <p><strong>Event Details:</strong></p>
                <ul>
                    <li>Title: {$event['title']}</li>
                    <li>Date: {$event['event_date']}</li>
                    <li>Location: {$event['location']}</li>
                    <li>Fee: Rs. {$event['registration_fee']}</li>
                </ul>

                <p><strong>Your Registration Details:</strong></p>
                <ul>
                    <li>Name: {$registration['participant_name']}</li>
                    <li>Email: {$registration['participant_email']}</li>
                    <li>Phone: {$registration['participant_phone']}</li>
                </ul>

                <p>Please arrive 15 minutes before the event starts.</p>
                
                <p>Best regards,<br/>
                Jan Prakrati Seva Trust Team</p>
            </body>
            </html>
            HTML;
            
            $this->mailer->setMessage($html);
            return $this->mailer->send();
        } catch (\Exception $e) {
            log_message('error', 'Event Registration Email Error: ' . $e->getMessage());
            return false;
        }
    }

    /**
     * Send Member Notification/Notice
     */
    public function sendMemberNotice($member, $notice)
    {
        try {
            $this->mailer->setTo($member['email']);
            $this->mailer->setFrom(env('MAIL_FROM_ADDRESS', 'noreply@ngo.org'), env('APP_NAME', 'Jan Prakrati Seva Trust'));
            $this->mailer->setSubject($notice['title']);
            
            $html = <<<HTML
            <html>
            <body style="font-family: Arial, sans-serif; line-height: 1.6;">
                <h2 style="color: #1a5f3d;">{$notice['title']}</h2>
                <p>Dear {$member['name']},</p>
                <div>{$notice['message']}</div>
                <p>Best regards,<br/>
                Jan Prakrati Seva Trust Team</p>
            </body>
            </html>
            HTML;
            
            $this->mailer->setMessage($html);
            return $this->mailer->send();
        } catch (\Exception $e) {
            log_message('error', 'Member Notice Email Error: ' . $e->getMessage());
            return false;
        }
    }

    /**
     * Send Appointment Letter Email
     */
    public function sendAppointmentLetter($member, $letterPath)
    {
        try {
            $this->mailer->setTo($member['email']);
            $this->mailer->setFrom(env('MAIL_FROM_ADDRESS', 'noreply@ngo.org'), env('APP_NAME', 'Jan Prakrati Seva Trust'));
            $this->mailer->setSubject('Appointment Letter - ' . env('APP_NAME', 'Jan Prakrati Seva Trust'));
            
            $html = <<<HTML
            <html>
            <body style="font-family: Arial, sans-serif; line-height: 1.6;">
                <h2 style="color: #1a5f3d;">Appointment Letter</h2>
                <p>Dear {$member['name']},</p>
                <p>Please find your appointment letter attached.</p>
                <p>If you have any questions, please contact our office.</p>
                
                <p>Best regards,<br/>
                Jan Prakrati Seva Trust Team</p>
            </body>
            </html>
            HTML;
            
            $this->mailer->setMessage($html);
            return $this->mailer->send();
        } catch (\Exception $e) {
            log_message('error', 'Appointment Letter Email Error: ' . $e->getMessage());
            return false;
        }
    }

    /**
     * Send Enquiry Response
     */
    public function sendEnquiryResponse($enquiry, $response)
    {
        try {
            $this->mailer->setTo($enquiry['email']);
            $this->mailer->setFrom(env('MAIL_FROM_ADDRESS', 'noreply@ngo.org'), env('APP_NAME', 'Jan Prakrati Seva Trust'));
            $this->mailer->setSubject('Response to Your Enquiry');
            
            $html = <<<HTML
            <html>
            <body style="font-family: Arial, sans-serif; line-height: 1.6;">
                <h2 style="color: #1a5f3d;">Response to Your Enquiry</h2>
                <p>Dear {$enquiry['name']},</p>
                <p>Thank you for reaching out to us. Here is the response to your enquiry:</p>
                
                <p><strong>Your Original Message:</strong></p>
                <p>{$enquiry['message']}</p>

                <p><strong>Our Response:</strong></p>
                <p>{$response}</p>

                <p>If you have further questions, please don't hesitate to contact us.</p>
                
                <p>Best regards,<br/>
                Jan Prakrati Seva Trust Team</p>
            </body>
            </html>
            HTML;
            
            $this->mailer->setMessage($html);
            return $this->mailer->send();
        } catch (\Exception $e) {
            log_message('error', 'Enquiry Response Email Error: ' . $e->getMessage());
            return false;
        }
    }
}
