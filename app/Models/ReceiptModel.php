<?php
namespace App\Models;

use CodeIgniter\Model;

class ReceiptModel extends Model
{
    protected $table = 'receipts';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $allowedFields = [
        'receipt_number', 'type', 'member_id', 'donor_name', 'donor_email',
        'amount', 'purpose', 'payment_method', 'receipt_path', 'qr_code_path'
    ];
    protected $useTimestamps = true;

    public function getNextReceiptNumber($type)
    {
        $date = date('Y-m-d');
        $lastReceipt = $this->where('type', $type)
            ->where('DATE(created_at)', $date)
            ->orderBy('id', 'DESC')
            ->first();
        
        if ($lastReceipt) {
            $lastNumber = intval(substr($lastReceipt['receipt_number'], -4));
            $nextNumber = $lastNumber + 1;
        } else {
            $nextNumber = 1;
        }
        
        return strtoupper(substr($type, 0, 3)) . '-' . date('Ymd') . '-' . str_pad($nextNumber, 4, '0', STR_PAD_LEFT);
    }

    public function getMemberReceipts($memberId)
    {
        return $this->where('member_id', $memberId)->orderBy('created_at', 'DESC')->findAll();
    }
}
