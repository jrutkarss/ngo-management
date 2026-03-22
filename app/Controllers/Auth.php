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
        $memberModel = new MemberModel();

        $data = [
            'name' => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
            'phone' => $this->request->getPost('phone'),
            'address' => $this->request->getPost('address'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'status' => 'active',
        ];

        $memberModel->insert($data);

        return redirect()->to('/member/login')->with('success', 'Registration successful. Please login to continue.');
    }

    public function processLogin()
    {
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $memberModel = new MemberModel();
        $member = $memberModel->where('email', $email)->first();

        if ($member && password_verify($password, $member['password'])) {
            session()->set([ 
                'member_id' => $member['id'],
                'member_name' => $member['name'],
                'is_logged_in' => true,
            ]);

            return redirect()->to('/member/dashboard');
        }

        return redirect()->back()->with('error', 'Invalid email or password.');
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
}
