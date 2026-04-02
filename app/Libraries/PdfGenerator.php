<?php

namespace App\Libraries;

use Dompdf\Dompdf;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;

class PdfGenerator
{
    protected $dompdf;

    public function __construct()
    {
        $this->dompdf = new Dompdf();
    }

    /**
     * Generate ID Card PDF
     */
    public function generateIdCard($member)
    {
        $html = $this->createIdCardHtml($member);
        
        $this->dompdf->loadHtml($html);
        $this->dompdf->setPaper('A4', 'portrait');
        $this->dompdf->render();
        
        $filename = 'member_' . $member['id'] . '_idcard.pdf';
        $filepath = WRITEPATH . 'uploads/idcards/' . $filename;
        
        // Create directory if not exists
        @mkdir(dirname($filepath), 0755, true);
        
        file_put_contents($filepath, $this->dompdf->output());
        return 'uploads/idcards/' . $filename;
    }

    /**
     * Generate Appointment Letter PDF
     */
    public function generateAppointmentLetter($member, $designation, $joiningDate = null)
    {
        if (!$joiningDate) {
            $joiningDate = date('Y-m-d');
        }

        $html = $this->createAppointmentLetterHtml($member, $designation, $joiningDate);
        
        $this->dompdf->loadHtml($html);
        $this->dompdf->setPaper('A4', 'portrait');
        $this->dompdf->render();
        
        $filename = 'member_' . $member['id'] . '_appointment_' . date('YmdHis') . '.pdf';
        $filepath = WRITEPATH . 'uploads/letters/' . $filename;
        
        @mkdir(dirname($filepath), 0755, true);
        
        file_put_contents($filepath, $this->dompdf->output());
        return 'uploads/letters/' . $filename;
    }

    /**
     * Generate Donation Receipt PDF
     */
    public function generateDonationReceipt($donation, $receiptNumber)
    {
        $html = $this->createDonationReceiptHtml($donation, $receiptNumber);
        
        $this->dompdf->loadHtml($html);
        $this->dompdf->setPaper('A4', 'portrait');
        $this->dompdf->render();
        
        $filename = 'receipt_' . $receiptNumber . '.pdf';
        $filepath = WRITEPATH . 'uploads/receipts/' . $filename;
        
        @mkdir(dirname($filepath), 0755, true);
        
        file_put_contents($filepath, $this->dompdf->output());
        return 'uploads/receipts/' . $filename;
    }

    /**
     * Generate 80G Receipt (Tax-Deductible Donation Receipt)
     */
    public function generate80GReceipt($donation, $receiptNumber)
    {
        $html = $this->create80GReceiptHtml($donation, $receiptNumber);
        
        $this->dompdf->loadHtml($html);
        $this->dompdf->setPaper('A4', 'portrait');
        $this->dompdf->render();
        
        $filename = '80G_receipt_' . $receiptNumber . '.pdf';
        $filepath = WRITEPATH . 'uploads/receipts/' . $filename;
        
        @mkdir(dirname($filepath), 0755, true);
        
        file_put_contents($filepath, $this->dompdf->output());
        return 'uploads/receipts/' . $filename;
    }

    /**
     * Generate Membership Certificate PDF
     */
    public function generateMembershipCertificate($member)
    {
        $html = $this->createMembershipCertificateHtml($member);
        
        $this->dompdf->loadHtml($html);
        $this->dompdf->setPaper('A4', 'landscape');
        $this->dompdf->render();
        
        $filename = 'certificate_' . $member['id'] . '_' . date('YmdHis') . '.pdf';
        $filepath = WRITEPATH . 'uploads/certificates/' . $filename;
        
        @mkdir(dirname($filepath), 0755, true);
        
        file_put_contents($filepath, $this->dompdf->output());
        return 'uploads/certificates/' . $filename;
    }

    /**
     * Generate QR Code
     */
    public function generateQrCode($data, $filename = null)
    {
        if (!$filename) {
            $filename = 'qr_' . md5($data) . '.png';
        }

        try {
            $qrCode = new QrCode($data);
            $writer = new PngWriter();
            $result = $writer->write($qrCode);
            
            $filepath = WRITEPATH . 'uploads/qrcodes/' . $filename;
            @mkdir(dirname($filepath), 0755, true);
            
            file_put_contents($filepath, $result->getStream());
            return 'uploads/qrcodes/' . $filename;
        } catch (\Exception $e) {
            log_message('error', 'QR Code Generation Error: ' . $e->getMessage());
            return null;
        }
    }

    // ========== HTML Templates ==========

    protected function createIdCardHtml($member)
    {
        $qrCode = $this->generateQrCode(
            'MEMBER:' . $member['id'] . '|' . $member['email'],
            'member_' . $member['id'] . '.png'
        );

        $photoPath = $member['photo_path'] ?? '';
        $photoHtml = $photoPath ? '<img src="' . base_url($photoPath) . '" style="width: 80px; height: 100px; border-radius: 4px;">' : '<div style="width: 80px; height: 100px; background: #ccc; border-radius: 4px; display: flex; align-items: center; justify-content: center;">No Photo</div>';

        return <<<HTML
        <html>
        <head>
            <style>
                body { font-family: Arial, sans-serif; }
                .card { width: 100%; max-width: 600px; border: 2px solid #333; padding: 20px; margin: 20px auto; }
                .header { text-align: center; border-bottom: 2px solid #333; padding-bottom: 10px; margin-bottom: 15px; }
                .header h2 { margin: 0; color: #1a5f3d; }
                .content { display: flex; gap: 20px; }
                .photo { text-align: center; }
                .details { flex: 1; }
                .detail-row { margin: 8px 0; }
                .label { font-weight: bold; color: #333; display: inline-block; width: 100px; }
                .value { display: inline-block; }
                .qr { text-align: center; margin-top: 15px; border-top: 1px solid #ddd; padding-top: 10px; }
                .qr img { width: 100px; height: 100px; }
            </style>
        </head>
        <body>
            <div class="card">
                <div class="header">
                    <h2>Jan Prakrati Seva Trust</h2>
                    <p style="margin: 5px 0;">Member ID Card</p>
                </div>
                <div class="content">
                    <div class="photo">{$photoHtml}</div>
                    <div class="details">
                        <div class="detail-row">
                            <span class="label">Member ID:</span>
                            <span class="value">{$member['id']}</span>
                        </div>
                        <div class="detail-row">
                            <span class="label">Name:</span>
                            <span class="value">{$member['name']}</span>
                        </div>
                        <div class="detail-row">
                            <span class="label">Email:</span>
                            <span class="value">{$member['email']}</span>
                        </div>
                        <div class="detail-row">
                            <span class="label">Phone:</span>
                            <span class="value">{$member['phone']}</span>
                        </div>
                        <div class="detail-row">
                            <span class="label">Address:</span>
                            <span class="value">{$member['address']}</span>
                        </div>
                        <div class="detail-row">
                            <span class="label">Status:</span>
                            <span class="value">{$member['membership_status']}</span>
                        </div>
                        <div class="detail-row">
                            <span class="label">Issue Date:</span>
                            <span class="value">" . date('d-m-Y') . "</span>
                        </div>
                    </div>
                </div>
                <div class="qr">
                    <img src="' . base_url($qrCode) . '" alt="QR Code">
                </div>
            </div>
        </body>
        </html>
        HTML;
    }

    protected function createAppointmentLetterHtml($member, $designation, $joiningDate)
    {
        $currentDate = date('d-m-Y');
        $orgName = env('APP_NAME', 'Jan Prakrati Seva Trust');

        return <<<HTML
        <html>
        <head>
            <style>
                body { font-family: Arial, sans-serif; line-height: 1.6; }
                .header { text-align: center; margin-bottom: 30px; border-bottom: 2px solid #333; padding-bottom: 15px; }
                .header h1 { margin: 0; color: #1a5f3d; font-size: 24px; }
                .content { margin: 30px 0; }
                .date { margin: 20px 0; }
                .closing { margin-top: 40px; }
                .signature { margin-top: 50px; }
            </style>
        </head>
        <body>
            <div class="header">
                <h1>{$orgName}</h1>
                <p style="margin: 5px 0;">APPOINTMENT LETTER</p>
            </div>

            <div class="date">
                <p>Date: {$currentDate}</p>
            </div>

            <div class="content">
                <p>Dear {$member['name']},</p>

                <p>We are pleased to inform you that you have been appointed as a <strong>{$designation}</strong> in our organization with effect from <strong>{$joiningDate}</strong>.</p>

                <p>Your appointment is based on the following terms and conditions:</p>

                <ul>
                    <li>Designation: {$designation}</li>
                    <li>Joining Date: {$joiningDate}</li>
                    <li>Address: {$member['address']}</li>
                    <li>Email: {$member['email']}</li>
                    <li>Phone: {$member['phone']}</li>
                </ul>

                <p>We look forward to your valuable contribution to the organization. Please confirm your acceptance of this appointment by signing and returning a copy of this letter.</p>

                <p>For any queries, please contact our office.</p>
            </div>

            <div class="closing">
                <p>Yours truly,</p>
            </div>

            <div class="signature">
                <p style="margin-bottom: 50px;">_________________________</p>
                <p>{$orgName}</p>
                <p>Authorized Signatory</p>
            </div>
        </body>
        </html>
        HTML;
    }

    protected function createDonationReceiptHtml($donation, $receiptNumber)
    {
        $receiptDate = $donation['created_at'] ?? date('Y-m-d');
        $orgName = env('APP_NAME', 'Jan Prakrati Seva Trust');

        return <<<HTML
        <html>
        <head>
            <style>
                body { font-family: Arial, sans-serif; margin: 20px; }
                .header { text-align: center; margin-bottom: 20px; border-bottom: 2px solid #333; padding-bottom: 15px; }
                .header h1 { margin: 0; color: #1a5f3d; font-size: 22px; }
                .receipt-no { text-align: right; margin: 10px 0; font-weight: bold; }
                .content { margin: 20px 0; }
                .detail-row { display: flex; justify-content: space-between; margin: 10px 0; }
                .label { font-weight: bold; width: 150px; }
                .divider { border-top: 1px solid #ccc; margin: 15px 0; }
                .total { display: flex; justify-content: space-between; font-size: 18px; font-weight: bold; color: #1a5f3d; }
                .footer { text-align: center; margin-top: 30px; font-size: 12px; color: #666; }
            </style>
        </head>
        <body>
            <div class="header">
                <h1>DONATION RECEIPT</h1>
                <p style="margin: 5px 0;">{$orgName}</p>
            </div>

            <div class="receipt-no">
                Receipt No: {$receiptNumber}
            </div>

            <div class="content">
                <div class="detail-row">
                    <span class="label">Receipt Date:</span>
                    <span>{$receiptDate}</span>
                </div>
                <div class="detail-row">
                    <span class="label">Donor Name:</span>
                    <span>{$donation['donor_name']}</span>
                </div>
                <div class="detail-row">
                    <span class="label">Email:</span>
                    <span>{$donation['donor_email']}</span>
                </div>
                <div class="detail-row">
                    <span class="label">Phone:</span>
                    <span>{$donation['donor_phone'] ?? 'N/A'}</span>
                </div>
                <div class="divider"></div>
                <div class="detail-row">
                    <span class="label">Donation Amount:</span>
                    <span>Rs. {$donation['amount']}</span>
                </div>
                <div class="detail-row">
                    <span class="label">Purpose:</span>
                    <span>{$donation['purpose'] ?? 'General Donation'}</span>
                </div>
                <div class="detail-row">
                    <span class="label">Payment Type:</span>
                    <span>{$donation['type']}</span>
                </div>
            </div>

            <div class="divider"></div>
            <div class="total">
                <span>Total Donation:</span>
                <span>Rs. {$donation['amount']}</span>
            </div>

            <div class="footer">
                <p>Thank you for your generous donation!</p>
                <p>This receipt is issued both in English and Hindi.</p>
                <p>इस रसीद का कोई मूल्य नहीं है यदि नकद नहीं दिया गया हो।</p>
            </div>
        </body>
        </html>
        HTML;
    }

    protected function create80GReceiptHtml($donation, $receiptNumber)
    {
        $receiptDate = $donation['created_at'] ?? date('Y-m-d');
        $orgName = env('APP_NAME', 'Jan Prakrati Seva Trust');
        $orgRegistration = env('ORG_80G_NUMBER', 'XXXX/XXXX');

        return <<<HTML
        <html>
        <head>
            <style>
                body { font-family: Arial, sans-serif; margin: 20px; }
                .header { text-align: center; margin-bottom: 20px; border-bottom: 3px solid #333; padding-bottom: 15px; }
                .header h1 { margin: 0; color: #1a5f3d; font-size: 22px; }
                .receipt-no { text-align: right; margin: 10px 0; font-weight: bold; }
                .registration { text-align: center; color: #666; margin: 5px 0; }
                .content { margin: 20px 0; }
                .detail-row { display: flex; justify-content: space-between; margin: 10px 0; }
                .label { font-weight: bold; width: 150px; }
                .divider { border-top: 1px solid #ccc; margin: 15px 0; }
                .total { display: flex; justify-content: space-between; font-size: 18px; font-weight: bold; color: #1a5f3d; padding: 10px; background: #f0f0f0; }
                .footer { text-align: center; margin-top: 30px; font-size: 12px; color: #666; }
                .disclaimer { background: #ffffcc; padding: 10px; margin: 15px 0; border-left: 4px solid #ffcc00; }
            </style>
        </head>
        <body>
            <div class="header">
                <h1>TAX-DEDUCTIBLE DONATION RECEIPT (80G)</h1>
                <p style="margin: 5px 0;">{$orgName}</p>
            </div>

            <div class="registration">
                <strong>80G Registration No: {$orgRegistration}</strong>
            </div>

            <div class="receipt-no">
                Receipt No: {$receiptNumber}
            </div>

            <div class="content">
                <div class="detail-row">
                    <span class="label">Receipt Date:</span>
                    <span>{$receiptDate}</span>
                </div>
                <div class="detail-row">
                    <span class="label">Donor Name:</span>
                    <span>{$donation['donor_name']}</span>
                </div>
                <div class="detail-row">
                    <span class="label">Email:</span>
                    <span>{$donation['donor_email']}</span>
                </div>
                <div class="detail-row">
                    <span class="label">PAN/Aadhaar:</span>
                    <span>N/A</span>
                </div>
                <div class="divider"></div>
                <div class="detail-row">
                    <span class="label">Donation Amount:</span>
                    <span>Rs. {$donation['amount']}</span>
                </div>
                <div class="detail-row">
                    <span class="label">Purpose:</span>
                    <span>{$donation['purpose'] ?? 'Charitable Activity'}</span>
                </div>
                <div class="detail-row">
                    <span class="label">Transaction ID:</span>
                    <span>{$donation['transaction_id'] ?? 'N/A'}</span>
                </div>
            </div>

            <div class="divider"></div>
            <div class="total">
                <span>Total Deductible Amount:</span>
                <span>Rs. {$donation['amount']}</span>
            </div>

            <div class="disclaimer">
                <strong>Important:</strong> This receipt is valid only for donations made with full details. In case of any discrepancy, please contact our office immediately.
            </div>

            <div class="footer">
                <p>This is an official receipt issued under section 80G of the Income Tax Act, 1961.</p>
                <p>The donor can claim tax deduction on this amount at the time of filing income tax return.</p>
                <p style="margin-top: 30px;">Authorized Signatory</p>
            </div>
        </body>
        </html>
        HTML;
    }

    protected function createMembershipCertificateHtml($member)
    {
        $joiningDate = $member['created_at'] ?? date('Y-m-d');
        $orgName = env('APP_NAME', 'Jan Prakrati Seva Trust');

        return <<<HTML
        <html>
        <head>
            <style>
                body { font-family: 'Georgia', serif; margin: 0; padding: 20px; background: #fff; }
                .certificate { 
                    border: 5px solid #1a5f3d; 
                    padding: 40px; 
                    text-align: center; 
                    background: linear-gradient(to bottom, #f9f7f4, #fefdfb);
                    min-height: 600px;
                    display: flex;
                    flex-direction: column;
                    justify-content: center;
                }
                .border-decoration { color: #1a5f3d; font-size: 24px; margin: 10px 0; }
                h1 { color: #1a5f3d; font-size: 38px; margin: 20px 0; text-transform: uppercase; }
                .subtext { color: #666; font-size: 18px; margin: 10px 0; }
                .content { margin: 40px 0; font-size: 16px; line-height: 1.8; }
                .name { font-size: 28px; font-weight: bold; color: #1a5f3d; margin: 20px 0; }
                .details { margin: 30px 0; }
                .detail { margin: 10px 0; }
                .signature-line { border-top: 2px solid #333; width: 200px; margin: 50px auto 10px; }
                .signature-text { margin-top: 5px; font-size: 14px; }
                footer { margin-top: 30px; color: #666; font-size: 12px; }
            </style>
        </head>
        <body>
            <div class="certificate">
                <div class="border-decoration">❀ ✦ ❀</div>
                
                <h1>Certificate of Membership</h1>
                
                <div class="subtext">{$orgName}</div>
                
                <div class="content">
                    <p>This is to certify that</p>
                    
                    <div class="name">{$member['name']}</div>
                    
                    <p>has been admitted as a valued member of</p>
                    
                    <p><strong>{$orgName}</strong></p>
                    
                    <div class="details">
                        <div class="detail">Member ID: <strong>{$member['id']}</strong></div>
                        <div class="detail">Date of Membership: <strong>{$joiningDate}</strong></div>
                        <div class="detail">Email: <strong>{$member['email']}</strong></div>
                        <div class="detail">Status: <strong>{$member['membership_status']}</strong></div>
                    </div>
                    
                    <p>In recognition of commitment to our noble cause and community service.</p>
                </div>
                
                <div class="signature-line"></div>
                <div class="signature-text">Authorized Signatory</div>
                
                <div class="border-decoration" style="margin-top: 30px;">❀ ✦ ❀</div>
                
                <footer>
                    <p>This certificate is issued in recognition of membership and contribution to the organization.</p>
                </footer>
            </div>
        </body>
        </html>
        HTML;
    }
}
