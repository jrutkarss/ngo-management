<?php
namespace App\Models;

use CodeIgniter\Model;

class DonationModel extends Model
{
    protected $table = 'donations';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $allowedFields = [
        'member_id', 'donor_name', 'donor_email', 'donor_phone', 'amount',
        'type', 'purpose', 'campaign_id', 'payment_gateway', 'transaction_id',
        'status', 'receipt_path', '80g_receipt_path', 'referral_member_id'
    ];
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    public function getByTransactionId($transactionId)
    {
        return $this->where('transaction_id', $transactionId)->first();
    }

    public function getByMemberId($memberId)
    {
        return $this->where('member_id', $memberId)->orderBy('created_at', 'DESC')->findAll();
    }

    public function getTotalDonations($campaignId = null)
    {
        $query = $this->where('status', 'success');
        if ($campaignId) {
            $query->where('campaign_id', $campaignId);
        }
        return $query->selectSum('amount')->first();
    }

    public function getRecentDonations($limit = 10)
    {
        return $this->where('status', 'success')
            ->orderBy('created_at', 'DESC')
            ->limit($limit)
            ->findAll();
    }
}

