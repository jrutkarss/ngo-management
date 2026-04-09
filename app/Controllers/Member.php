<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MemberModel;

class Member extends BaseController
{
    protected $memberModel;

    public function __construct()
    {
        helper('auth'); // or your own `isLoggedIn` helper
        $this->memberModel = new MemberModel();
    }

    /**
     * Member Dashboard
     */
    public function dashboard()
    {
        if (! session()->get('isLoggedIn') || session()->get('role') !== 'member') {
            return redirect()->to('/member/login')->with('error', 'Please login as member first.');
        }

        $member = $this->memberModel->find(session()->get('member_id'));

        if (! $member) {
            return redirect()->to('/member/login')
               ->with('error', 'Member data not found. Please contact admin.');
        }

        return view('member/dashboard', ['member' => $member]);
    }

    /**
     * Download Member ID Card (member’s own card)
     */
    public function downloadIdCard()
    {
        if (! session()->get('isLoggedIn') || session()->get('role') !== 'member') {
            return redirect()->to('/member/login')->with('error', 'Please login first.');
        }

        $member = $this->memberModel->find(session()->get('member_id'));

        if (! $member || empty($member['id_card_path']) || ! is_file($member['id_card_path'])) {
            return redirect()->to('/member/dashboard')
                ->with('error', 'ID card not available yet.');
        }

        return $this->response
            ->download($member['id_card_path'], null)
            ->setFileName('id_card_' . $member['id'] . '.pdf');
    }

    /**
     * Admin view: download member ID card by ID
     */
    public function viewIdCard(int $id)
    {
        if (! session()->get('isLoggedIn') || session()->get('role') !== 'admin') {
            return redirect()->to('/admin/login')->with('error', 'Admin login required.');
        }

        $member = $this->memberModel->find($id);

        if (! $member || empty($member['id_card_path']) || ! is_file($member['id_card_path'])) {
            return redirect()->to('/admin/members')->with('error', 'ID card not available for this member.');
        }

        return $this->response
            ->download($member['id_card_path'], null)
            ->setFileName('id_card_' . $member['id'] . '.pdf');
    }

    /**
     * Member donation history
     */
    public function viewDonations()
    {
        if (! session()->get('isLoggedIn') || session()->get('role') !== 'member') {
            return redirect()->to('/member/login')->with('error', 'Please login first.');
        }

        $memberId = session()->get('member_id');
        $member   = $this->memberModel->find($memberId);
        $donations = $this->memberModel->getDonations($memberId);

        return view('member/donations', [
            'member'    => $member,
            'donations' => $donations,
        ]);
    }

    /**
     * Member events list (registrations)
     */
    public function viewEvents()
    {
        if (! session()->get('isLoggedIn') || session()->get('role') !== 'member') {
            return redirect()->to('/member/login')->with('error', 'Please login first.');
        }

        $memberId = session()->get('member_id');
        $member   = $this->memberModel->find($memberId);
        $events   = $this->memberModel->getEvents($memberId);

        return view('member/events', [
            'member' => $member,
            'events' => $events,
        ]);
    }

    /**
     * Member profile view
     */
    public function viewProfile()
    {
        if (! session()->get('isLoggedIn') || session()->get('role') !== 'member') {
            return redirect()->to('/member/login')->with('error', 'Please login first.');
        }

        $member = $this->memberModel->find(session()->get('member_id'));

        if (! $member) {
            return redirect()->to('/member/login')
               ->with('error', 'Member data not found.');
        }

        return view('member/profile', ['member' => $member]);
    }

    /**
     * Member profile edit form
     */
    public function editProfile()
    {
        if (! session()->get('isLoggedIn') || session()->get('role') !== 'member') {
            return redirect()->to('/member/login')->with('error', 'Please login first.');
        }

        $member = $this->memberModel->find(session()->get('member_id'));

        if (! $member) {
            return redirect()->to('/member/login')
               ->with('error', 'Member data not found.');
        }

        return view('member/edit_profile', ['member' => $member]);
    }

    /**
     * Member profile update
     */
    public function updateProfile()
    {
        if (! session()->get('isLoggedIn') || session()->get('role') !== 'member') {
            return redirect()->to('/member/login')->with('error', 'Please login first.');
        }

        $memberId = session()->get('member_id');

        $rules = [
            'name'  => 'required|min_length[2]',
            'email' => 'required|valid_email',
            'phone' => 'permit_empty|min_length[8]|max_length[20]',
        ];

        $data = [
            'name'  => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
            'phone' => $this->request->getPost('phone'),
        ];

        if (! $this->validateData($data, $rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->memberModel->update($memberId, $data);

        return redirect()->to('/member/profile')
            ->with('success', 'Profile updated successfully.');
    }

    /**
     * Member certificates list
     */
    public function viewCertificates()
    {
        if (! session()->get('isLoggedIn') || session()->get('role') !== 'member') {
            return redirect()->to('/member/login')->with('error', 'Please login first.');
        }

        $memberId    = session()->get('member_id');
        $member      = $this->memberModel->find($memberId);
        $certificates = $this->memberModel->getCertificates($memberId);

        return view('member/certificates', [
            'member'     => $member,
            'certificates' => $certificates,
        ]);
    }

    /**
     * Member messages list
     */
    public function viewMessages()
    {
        if (! session()->get('isLoggedIn') || session()->get('role') !== 'member') {
            return redirect()->to('/member/login')->with('error', 'Please login first.');
        }

        $memberId  = session()->get('member_id');
        $member    = $this->memberModel->find($memberId);
        $messages  = $this->memberModel->getMessages($memberId);

        return view('member/messages', [
            'member'   => $member,
            'messages' => $messages,
        ]);
    }
}