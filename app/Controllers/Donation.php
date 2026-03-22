<?php
namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DonationModel;
use Razorpay\Api\Api;

class Donation extends BaseController
{
    private $razorpay_key;
    private $razorpay_secret;

    public function __construct()
    {
        // Get from Razorpay Dashboard (Test Mode)
        $this->razorpay_key = 'rzp_test_YOUR_KEY_ID';    // Replace with your key
        $this->razorpay_secret = 'YOUR_SECRET_KEY';     // Replace with your secret
    }

    public function index()
    {
        return view('donation');
    }

    public function create()
    {
        $donationModel = new DonationModel();
        
        // Get form data
        $name = $this->request->getPost('name');
        $email = $this->request->getPost('email');
        $phone = $this->request->getPost('phone');
        $amount = $this->request->getPost('amount') == 'custom' ? 
                  $this->request->getPost('custom_amount') * 100 : 
                  $this->request->getPost('amount') * 100; // Paise
        
        // Save pending donation
        $donationData = [
            'member_id' => session()->get('member_id') ?? 0,
            'amount' => $amount / 100,
            'type' => 'online',
            'receipt_path' => 'pending'
        ];
        $donationId = $donationModel->insert($donationData);

        if ($this->request->getPost('gateway') == 'razorpay') {
            return $this->createRazorpayOrder($donationId, $amount, $name, $email, $phone);
        }
        
        return redirect()->to('/donate')->with('success', 'Cash donation recorded!');
    }

    private function createRazorpayOrder($donationId, $amount, $name, $email, $phone)
    {
        try {
            $api = new Api($this->razorpay_key, $this->razorpay_secret);
            
            $orderData = [
                'receipt' => 'donation_' . $donationId,
                'amount' => $amount,
                'currency' => 'INR',
                'notes' => [
                    'donation_id' => $donationId,
                    'donor_name' => $name,
                    'donor_email' => $email
                ]
            ];
            
            $razorpayOrder = $api->order->create($orderData);
            
            session()->set([
                'razorpay_order_id' => $razorpayOrder['id'],
                'donation_id' => $donationId,
                'donor_name' => $name,
                'donor_email' => $email
            ]);
            
            return view('razorpay_checkout', [
                'key' => $this->razorpay_key,
                'orderId' => $razorpayOrder['id'],
                'amount' => $amount / 100,
                'name' => $name,
                'email' => $email,
                'phone' => $phone
            ]);
            
        } catch (\Exception $e) {
            return redirect()->to('/donate')->with('error', 'Payment setup failed: ' . $e->getMessage());
        }
    }

    public function verify()
    {
        try {
            $api = new Api($this->razorpay_key, $this->razorpay_secret);
            
            $input = $this->request->getPost();
            $attributes = [
                'razorpay_order_id' => $input['razorpay_order_id'],
                'razorpay_payment_id' => $input['razorpay_payment_id'],
                'razorpay_signature' => $input['razorpay_signature']
            ];
            
            $api->utility->verifyPaymentSignature($attributes);
            
            // Update donation as successful
            $donationModel = new DonationModel();
            $donationId = session()->get('donation_id');
            $donationModel->update($donationId, ['receipt_path' => $input['razorpay_payment_id']]);
            
            return view('donation_success', [
                'payment_id' => $input['razorpay_payment_id'],
                'amount' => session()->get('donation_amount') ?? 0
            ]);
            
        } catch (\Exception $e) {
            return view('donation_failure', ['error' => $e->getMessage()]);
        }
    }

public function about()
{
    $data['title'] = 'About Us';
    return view('about', $data);
}
}