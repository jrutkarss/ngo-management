<?php
namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\EventModel;
use App\Models\NewsModel;
use App\Models\GalleryModel;
use App\Models\MemberModel;
use App\Models\DonationModel;
use App\Models\ActivityPostModel;
use App\Models\EnquiryModel;

class Home extends BaseController
{
    protected $eventModel;
    protected $newsModel;
    protected $galleryModel;
    protected $memberModel;
    protected $donationModel;
    protected $activityModel;
    protected $enquiryModel;

    public function __construct()
    {
        $this->eventModel = new EventModel();
        $this->newsModel = new NewsModel();
        $this->galleryModel = new GalleryModel();
        $this->memberModel = new MemberModel();
        $this->donationModel = new DonationModel();
        $this->activityModel = new ActivityPostModel();
        $this->enquiryModel = new EnquiryModel();
    }

    public function index()
    {
        // Get latest data for homepage
        $data['upcoming_events'] = $this->eventModel->where('status', 'upcoming')->orderBy('event_date', 'ASC')->limit(6)->findAll();
        $data['latest_news'] = $this->newsModel->where('is_published', true)->orderBy('created_at', 'DESC')->limit(3)->findAll();
        $data['gallery'] = $this->galleryModel->orderBy('created_at', 'DESC')->limit(12)->findAll();
        $data['recent_activity'] = $this->activityModel->orderBy('created_at', 'DESC')->limit(5)->findAll();
        $data['total_members'] = $this->memberModel->countAllResults();
        $data['total_donations'] = $this->donationModel->where('status', 'success')->selectSum('amount')->first();
        
        return view('home', $data);
    }

    public function donate()
    {
        session()->setFlashdata('success', 'Thank you for your donation!');
        return redirect()->to('/');
    }

    public function gallery()
    {
        $data['title'] = 'Gallery';
        $data['gallery'] = $this->galleryModel->paginate(12);
        $data['pager'] = $this->galleryModel->pager;
        return view('gallery', $data); 
    }
    
    public function about()
    {
        $data['title'] = 'About Us';
        $data['total_members'] = $this->memberModel->countAllResults();
        $data['total_donations'] = $this->donationModel->where('status', 'success')->selectSum('amount')->first();
        return view('about', $data);
    }

    public function events()
    {
        $data['title'] = 'Upcoming Events';
        $data['events'] = $this->eventModel->where('status', 'upcoming')->paginate(12);
        $data['pager'] = $this->eventModel->pager;
        return view('events', $data);
    }

    public function objectives()
    {
        $data['title'] = 'Our Objectives';
        return view('objectives', $data);
    }

    public function president()
    {
        $data['title'] = 'President Message';
        return view('president', $data);
    }

    public function team()
    {
        $data['title'] = 'Management Team';
        $data['members'] = $this->memberModel->where('designation_id !=', null)->findAll();
        return view('team', $data);
    }

    public function testimonials()
    {
        $data['title'] = 'Testimonials';
        return view('testimonials', $data);
    }

    public function donors()
    {
        $data['title'] = 'Our Donors';
        $data['donations'] = $this->donationModel->where('status', 'success')
            ->select('donor_name, donor_email, amount, created_at')
            ->orderBy('amount', 'DESC')
            ->paginate(20);
        $data['pager'] = $this->donationModel->pager;
        return view('donors', $data);
    }

    public function contact()
    {
        $data['title'] = 'Contact Us';
        return view('contact', $data);
    }

    public function submitContact()
    {
        $name = $this->request->getPost('name');
        $emailAddress = $this->request->getPost('email');
        $phone = $this->request->getPost('phone');
        $subject = $this->request->getPost('subject');
        $message = $this->request->getPost('message');

        // Save enquiry to database
        $this->enquiryModel->save([
            'name' => $name,
            'email' => $emailAddress,
            'phone' => $phone,
            'subject' => $subject,
            'message' => $message,
            'status' => 'new'
        ]);

        // Send email notification to admin
        try {
            $email = \Config\Services::email();
            $email->setTo(env('ADMIN_EMAIL', 'admin@ngo.org'));
            $email->setFrom($emailAddress, $name);
            $email->setSubject('New Contact Form Submission: ' . $subject);
            $email->setMessage("Name: {$name}\nEmail: {$emailAddress}\nPhone: {$phone}\n\n{$message}");
            $email->send();
        } catch (\Exception $e) {
            log_message('error', 'Failed to send contact email: ' . $e->getMessage());
        }

        return redirect()->back()->with('success', 'Your message has been sent. We will get back to you shortly.');
    }

    public function activity()
    {
        $data['title'] = 'Latest Activity';
        $data['activity'] = $this->activityModel->orderBy('created_at', 'DESC')->paginate(10);
        $data['pager'] = $this->activityModel->pager;
        return view('activity', $data);
    }

    public function videos()
    {
        $data['title'] = 'YouTube Videos';
        return view('videos', $data);
    }

    public function notice()
    {
        $data['title'] = 'Notice Board';
        // Get messages sent to all members
        $messageModel = new \App\Models\MemberMessageModel();
        $data['notices'] = $messageModel->where('send_to_all', true)->orderBy('created_at', 'DESC')->paginate(10);
        $data['pager'] = $messageModel->pager;
        return view('notice', $data);
    }

    public function appointment()
    {
        $data['title'] = 'Appointment Letter';
        return view('appointment', $data);
    }
}
