<?php

namespace App\Controllers;

use App\Models\MemberModel;
use App\Models\DesignationModel;
use App\Models\DonationModel;
use App\Models\BeneficiaryModel;
use App\Models\CertificateModel;
use App\Models\EventModel;
use App\Models\EventRegistrationModel;
use App\Models\CampaignModel;
use App\Models\ProjectModel;
use App\Models\ExpenseModel;
use App\Models\InternshipModel;
use App\Models\InternshipApplicationModel;
use App\Models\NewsModel;
use App\Models\ActivityPostModel;
use App\Models\EnquiryModel;
use App\Models\ReceiptModel;
use App\Models\MemberMessageModel;
use App\Models\MemberMessageRecipientModel;

class Admin extends BaseController
{
    protected $memberModel;
    protected $designationModel;
    protected $donationModel;
    protected $eventModel;
    protected $campaignModel;
    protected $projectModel;
    protected $newsModel;

    public function __construct()
    {
        $this->memberModel = new MemberModel();
        $this->designationModel = new DesignationModel();
        $this->donationModel = new DonationModel();
        $this->eventModel = new EventModel();
        $this->campaignModel = new CampaignModel();
        $this->projectModel = new ProjectModel();
        $this->newsModel = new NewsModel();
    }

    // Dashboard
    public function dashboard()
    {
        $data['total_members'] = $this->memberModel->countAll();
        $data['total_donations'] = $this->donationModel->selectSum('amount')->where('status', 'success')->first()['amount'] ?? 0;
        $data['recent_donations'] = $this->donationModel->getRecentDonations(5);
        $data['recent_members'] = $this->memberModel->orderBy('created_at', 'DESC')->limit(5)->findAll();
        $data['pending_donations'] = $this->donationModel->where('status', 'pending')->countAllResults();
        
        return view('admin/dashboard', $data);
    }

    // ============ MEMBER MANAGEMENT ============
    public function members()
    {
        $data['members'] = $this->memberModel->findAll();
        return view('admin/members/list', $data);
    }

    public function saveMember()
    {
        $name = $this->request->getPost('name');
        $email = $this->request->getPost('email');
        $phone = $this->request->getPost('phone');
        $designation_id = $this->request->getPost('designation_id');
        $address = $this->request->getPost('address');
        $date_of_birth = $this->request->getPost('date_of_birth');

        $data = [
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'designation_id' => $designation_id,
            'address' => $address,
            'date_of_birth' => $date_of_birth,
            'referral_link' => $this->memberModel->generateReferralLink(time()),
            'membership_status' => 'active'
        ];

        if ($this->memberModel->save($data)) {
            return redirect()->to('admin/members')->with('success', 'Member added successfully');
        }

        return redirect()->back()->with('error', 'Error: Failed to add member');
    }

    public function editMember($id)
    {
        $data['member'] = $this->memberModel->find($id);
        $data['designations'] = $this->designationModel->findAll();
        
        if (!$data['member']) {
            return redirect()->to('admin/members')->with('error', 'Member not found');
        }

        return view('admin/members/edit', $data);
    }

    public function updateMember($id)
    {
        $data = [
            'name' => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
            'phone' => $this->request->getPost('phone'),
            'designation_id' => $this->request->getPost('designation_id'),
            'address' => $this->request->getPost('address'),
            'date_of_birth' => $this->request->getPost('date_of_birth'),
            'membership_status' => $this->request->getPost('membership_status'),
        ];

        if ($this->memberModel->update($id, $data)) {
            return redirect()->to('admin/members')->with('success', 'Member information updated');
        }

        return redirect()->back()->with('error', 'Error: Update failed');
    }

    public function generateIdCard($id)
    {
        $member = $this->memberModel->find($id);
        if (!$member) {
            return redirect()->back()->with('error', 'Member not found');
        }

        // Generate QR code for member ID verification
        $qrCode = $this->generateQRCode($member['id'] . '-' . $member['email']);
        
        // For now, return success message
        // In production, implement PDF generation for ID card
        return redirect()->back()->with('success', 'ID card generated successfully');
    }

    public function blockMember($id)
    {
        $member = $this->memberModel->find($id);
        if ($member) {
            $this->memberModel->update($id, ['membership_status' => 'blocked']);
            return redirect()->back()->with('success', 'Member blocked');
        }
        return redirect()->back()->with('error', 'Error');
    }

    public function unblockMember($id)
    {
        $member = $this->memberModel->find($id);
        if ($member) {
            $this->memberModel->update($id, ['membership_status' => 'active']);
            return redirect()->back()->with('success', 'Member unblocked');
        }
        return redirect()->back()->with('error', 'Error');
    }

    // ============ DONATION MANAGEMENT ============
    public function donations()
    {
        $data['donations'] = $this->donationModel->findAll();
        return view('admin/donations/list', $data);
    }

    public function addCashDonation()
    {
        $data['members'] = $this->memberModel->findAll();
        return view('admin/donations/add_cash', $data);
    }

    public function saveCashDonation()
    {
        $donor_name = $this->request->getPost('donor_name');
        $donor_email = $this->request->getPost('donor_email');
        $amount = $this->request->getPost('amount');
        $purpose = $this->request->getPost('purpose');
        $member_id = $this->request->getPost('member_id');

        $donationData = [
            'donor_name' => $donor_name,
            'donor_email' => $donor_email,
            'donor_phone' => $this->request->getPost('donor_phone'),
            'amount' => $amount,
            'type' => 'cash',
            'purpose' => $purpose,
            'member_id' => $member_id ?: null,
            'status' => 'success'
        ];

        if ($this->donationModel->save($donationData)) {
            // Generate receipt
            $this->generateDonationReceipt($this->donationModel->getInsertID());
            
            // Send email
            $this->sendDonationEmail($donor_email, $donor_name, $amount, $purpose);
            
            return redirect()->to('admin/donations')->with('success', 'Donation recorded successfully');
        }

        return redirect()->back()->with('error', 'Error: Failed to save donation');
    }

    // ============ EVENT MANAGEMENT ============
    public function events()
    {
        $data['events'] = $this->eventModel->findAll();
        return view('admin/events/list', $data);
    }

    public function addEvent()
    {
        return view('admin/events/add');
    }

    public function saveEvent()
    {
        $eventData = [
            'title' => $this->request->getPost('title'),
            'description' => $this->request->getPost('description'),
            'event_date' => $this->request->getPost('event_date'),
            'location' => $this->request->getPost('location'),
            'registration_fee' => $this->request->getPost('registration_fee'),
            'max_participants' => $this->request->getPost('max_participants'),
            'status' => 'upcoming'
        ];

        // Handle image upload
        $image = $this->request->getFile('image');
        if ($image && $image->isValid()) {
            $name = $image->getRandomName();
            $image->move('uploads/events', $name);
            $eventData['image_path'] = 'uploads/events/' . $name;
        }

        if ($this->eventModel->save($eventData)) {
            return redirect()->to('admin/events')->with('success', 'Event created successfully');
        }

        return redirect()->back()->with('error', 'Error: Failed to save event');
    }

    // ============ NEWS MANAGEMENT ============
    public function news()
    {
        $data['news'] = $this->newsModel->findAll();
        return view('admin/news/list', $data);
    }

    public function addNews()
    {
        return view('admin/news/add');
    }

    public function saveNews()
    {
        $newsData = [
            'title' => $this->request->getPost('title'),
            'content' => $this->request->getPost('content'),
            'is_published' => $this->request->getPost('is_published') ? true : false
        ];

        // Handle image upload
        $image = $this->request->getFile('image');
        if ($image && $image->isValid()) {
            $name = $image->getRandomName();
            $image->move('uploads/news', $name);
            $newsData['image_path'] = 'uploads/news/' . $name;
        }

        if ($this->newsModel->save($newsData)) {
            return redirect()->to('admin/news')->with('success', 'News added successfully');
        }

        return redirect()->back()->with('error', 'Error: Failed to save news');
    }

    public function deleteNews($id)
    {
        if ($this->newsModel->delete($id)) {
            return redirect()->back()->with('success', 'News deleted');
        }
        return redirect()->back()->with('error', 'Error');
    }

    // ============ CONTACT ENQUIRIES ============
    public function enquiries()
    {
        $enquiryModel = new EnquiryModel();
        $data['enquiries'] = $enquiryModel->findAll();
        return view('admin/enquiries/list', $data);
    }

    public function respondEnquiry($id)
    {
        $enquiryModel = new EnquiryModel();
        $data['enquiry'] = $enquiryModel->find($id);
        return view('admin/enquiries/respond', $data);
    }

    public function saveResponse($id)
    {
        $enquiryModel = new EnquiryModel();
        $response = $this->request->getPost('response');

        $enquiryModel->update($id, [
            'admin_response' => $response,
            'status' => 'responded',
            'response_date' => date('Y-m-d H:i:s')
        ]);

        $enquiry = $enquiryModel->find($id);
        
        // Send response email
        $this->sendEnquiryResponse($enquiry['email'], $enquiry['name'], $response);

        return redirect()->to('admin/enquiries')->with('success', 'Response sent');
    }

    // ============ HELPER METHODS ============
    public function generateQRCode($data)
    {
        // Implementation for QR code generation
        // Using a library like Endroid QR Code or similar
        return 'qr_code_path';
    }

    public function generateDonationReceipt($donationId)
    {
        $receiptModel = new ReceiptModel();
        $donation = $this->donationModel->find($donationId);
        
        $receiptNumber = $receiptModel->getNextReceiptNumber('donation');
        
        $receiptData = [
            'receipt_number' => $receiptNumber,
            'type' => 'donation',
            'donor_name' => $donation['donor_name'],
            'donor_email' => $donation['donor_email'],
            'amount' => $donation['amount'],
            'purpose' => $donation['purpose'],
            'receipt_path' => 'receipts/donation_' . $donationId . '.pdf'
        ];
        
        $receiptModel->save($receiptData);
        
        // Generate QR code for receipt
        $qrCode = $this->generateQRCode('receipt_' . $receiptNumber);
    }

    public function sendDonationEmail($email, $name, $amount, $purpose = '')
    {
        $emailService = \Config\Services::email();
        $emailService->setTo($email);
        $emailService->setFrom('ngo@example.com', 'NGO Management System');
        $emailService->setSubject('Donation Receipt');
        
        $message = "Hello {$name},\n\n";
        $message .= "Thank you for your donation of Rs. {$amount}.\n";
        if ($purpose) {
            $message .= "Purpose: {$purpose}\n";
        }
        $message .= "\nYour receipt is attached.\n\n";
        $message .= "Thank you.";
        
        $emailService->setMessage($message);
        $emailService->send();
    }

    public function sendEnquiryResponse($email, $name, $response)
    {
        $emailService = \Config\Services::email();
        $emailService->setTo($email);
        $emailService->setFrom('ngo@example.com', 'NGO Management System');
        $emailService->setSubject('Enquiry Response');
        
        $message = "Hello {$name},\n\n";
        $message .= "Thank you for your enquiry.\n\n";
        $message .= "Response:\n" . $response . "\n\n";
        $message .= "Thank you.";
        
        $emailService->setMessage($message);
        $emailService->send();
    }
}
