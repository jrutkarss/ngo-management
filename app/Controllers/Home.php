<?php
namespace App\Controllers;

use App\Controllers\BaseController;

class Home extends BaseController
{
    public function index()
    {
        $data['gallery'] = [];
        return view('home', $data);
    }

    public function donate()
    {
        session()->setFlashdata('success', 'Thank you for your donation!');
        return redirect()->to('/');
    }

    public function gallery()
    {
        echo "Gallery coming soon!";
    }
    
    public function about()
    {
        $data['title'] = 'About Us';
        return view('about', $data);
    }

    public function events()
    {
        $data['title'] = 'Upcoming Events';
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
        $message = $this->request->getPost('message');

        // ✅ FIXED - ONE BACKSLASH
        $email = \Config\Services::email();
        $email->setTo('info@ngo.org');
        $email->setFrom($emailAddress, $name);
        $email->setSubject('Contact Form Submission');
        $email->setMessage("Name: {$name}\nEmail: {$emailAddress}\n\n{$message}");

        if ($email->send()) {
            return redirect()->back()->with('success', 'Your message has been sent. We will get back to you shortly.');
        }

        return redirect()->back()->with('error', 'Unable to send message at this time.');
    }

    public function activity()
    {
        $data['title'] = 'Latest Activity';
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
        return view('notice', $data);
    }

    public function appointment()
    {
        $data['title'] = 'Appointment Letter';
        return view('appointment', $data);
    }
}
