<?php
namespace App\Models;

use CodeIgniter\Model;

class CertificateModel extends Model
{
    protected $table = 'certificates';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $allowedFields = [
        'recipient_name', 'recipient_email', 'member_id', 'type',
        'template_id', 'certificate_path', 'qr_code_path',
        'verification_code', 'issue_date'
    ];
    protected $useTimestamps = true;

    public function getByVerificationCode($code)
    {
        return $this->where('verification_code', $code)->first();
    }

    public function getMemberCertificates($memberId)
    {
        return $this->where('member_id', $memberId)->orderBy('issue_date', 'DESC')->findAll();
    }

    public function generateVerificationCode()
    {
        return strtoupper(substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'), 0, 12));
    }
}
