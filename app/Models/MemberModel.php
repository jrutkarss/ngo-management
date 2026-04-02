<?php
namespace App\Models;

use CodeIgniter\Model;

class MemberModel extends Model
{
    protected $table = 'members';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $allowedFields = [
        'designation_id', 'name', 'email', 'phone', 'address', 'date_of_birth',
        'photo_path', 'id_card_path', 'membership_fee', 'membership_status', 
        'referred_by', 'referral_link', 'membership_receipt_path',
        'appointment_letter_path', 'membership_certificate_path', 'password'
    ];
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    public function getByEmail($email)
    {
        return $this->where('email', $email)->first();
    }

    public function getActive()
    {
        return $this->where('membership_status', 'active')->findAll();
    }

    public function getByReferralLink($link)
    {
        return $this->where('referral_link', $link)->first();
    }

    public function generateReferralLink($memberId)
    {
        return substr(md5($memberId . time()), 0, 12);
    }
}

