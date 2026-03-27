<?php
namespace App\Models;

use CodeIgniter\Model;

class EnquiryModel extends Model
{
    protected $table = 'enquiries';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $allowedFields = [
        'name', 'email', 'phone', 'message', 'subject', 'status',
        'admin_response', 'response_date'
    ];
    protected $useTimestamps = true;

    public function getNewEnquiries()
    {
        return $this->where('status', 'new')->orderBy('created_at', 'DESC')->findAll();
    }

    public function getByStatus($status)
    {
        return $this->where('status', $status)->findAll();
    }
}
