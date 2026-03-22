<?php
namespace App\Models;

use CodeIgniter\Model;

class DonationModel extends Model
{
    protected $table = 'donations';
    protected $allowedFields = ['member_id', 'amount', 'type', 'receipt_path'];
    protected $useTimestamps = true;
}
