<?php
namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MemberModel;

class Member extends BaseController
{
    public function dashboard()
    {
        if (! session()->get('isLoggedIn')) {
            return redirect()->to('/member/login')->with('error', 'Please login first.');
        }

        $memberModel = new MemberModel();
        $member = $memberModel->find(session()->get('member_id'));

        return view('member/dashboard', ['member' => $member]);
    }

    public function downloadIdCard()
    {
        if (! session()->get('isLoggedIn')) {
            return redirect()->to('/member/login')->with('error', 'Please login first.');
        }

        $memberModel = new MemberModel();
        $member = $memberModel->find(session()->get('member_id'));

        if (! $member || empty($member['id_card_path']) || ! is_file($member['id_card_path'])) {
            return redirect()->to('/member/dashboard')->with('error', 'ID card not available yet.');
        }

        return $this->response->download($member['id_card_path'], null)->setFileName('id_card_' . $member['id'] . '.pdf');
    }
}
