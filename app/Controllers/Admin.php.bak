<?php
namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MemberModel;
use App\Models\DonationModel;
use Dompdf\Dompdf;

class Admin extends BaseController
{
    public function dashboard()
    {
        $memberModel = new MemberModel();
        $donationModel = new DonationModel();
        $data['members'] = $memberModel->countAll();
        $data['donations'] = $donationModel->countAll();
        return view('admin/dashboard', $data);
    }

    public function members()
    {
        $memberModel = new MemberModel();
        $data['members'] = $memberModel->findAll();
        return view('admin/members', $data);
    }

    public function saveMember()
    {
        $memberModel = new MemberModel();
        $data = $this->request->getPost();
        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
        $memberModel->insert($data);
        return redirect()->to('admin/members');
    }

public function generateIdCard($memberId)
{
    $memberModel = new MemberModel();
    $member = $memberModel->find($memberId);
    
    if (!$member) {
        return redirect()->to('admin/members')->with('error', 'Member not found');
    }
    
    // Check if ID card exists
    if ($member['id_card_path']) {
        $filepath = $member['id_card_path'];
        return $this->response->download($filepath, null)->setFileName('id_card_' . $memberId . '.pdf');
    }
    
    // Generate new ID card
    $html = view('admin/id_card_template', ['member' => $member]);
    
    $dompdf = new Dompdf();
    $dompdf->loadHtml($html);
    $dompdf->setPaper('A6', 'portrait');
    $dompdf->render();
    
    $filename = 'id_card_' . $memberId . '.pdf';
    $filepath = WRITEPATH . 'uploads/id_cards/' . $filename;
    
    if (!is_dir(dirname($filepath))) {
        mkdir(dirname($filepath), 0777, true);
    }
    
    file_put_contents($filepath, $dompdf->output());
    
    // Update member with path (no timestamps)
    $db = \Config\Database::connect();
    $db->table('members')->where('id', $memberId)->update(['id_card_path' => $filepath]);
    
    return $this->response->download($filepath, null)->setFileName($filename);
}

// NEW: View ID Card (Preview)
public function viewIdCard($memberId)
{
    $memberModel = new MemberModel();
    $member = $memberModel->find($memberId);
    
    if (!$member) {
        return redirect()->to('admin/members')->with('error', 'Member not found');
    }
    
    $data['member'] = $member;
    return view('admin/id_card_view', $data);
}



    public function donations()
    {
        $donationModel = new DonationModel();
        $data['donations'] = $donationModel->findAll();
        return view('admin/donations', $data);
    }

public function about()
{
    $data['title'] = 'About Us';
    return view('about', $data);
    }
    }

