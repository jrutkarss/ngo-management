<?php
namespace App\Models;

use CodeIgniter\Model;

class CampaignModel extends Model
{
    protected $table = 'campaigns';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $allowedFields = [
        'title', 'description', 'goal_amount', 'start_date', 'end_date',
        'image_path', 'status'
    ];
    protected $useTimestamps = true;

    public function getActiveCampaigns()
    {
        return $this->where('status', 'active')->findAll();
    }

    public function getCampaignProgress($campaignId)
    {
        $db = \Config\Database::connect();
        $result = $db->table('campaigns c')
            ->select('c.id, c.title, c.goal_amount, COALESCE(SUM(d.amount), 0) as collected')
            ->join('donations d', 'd.campaign_id = c.id AND d.status = "success"', 'left')
            ->where('c.id', $campaignId)
            ->groupBy('c.id')
            ->get()
            ->getRowArray();
        
        if ($result) {
            $result['progress_percentage'] = ($result['collected'] / $result['goal_amount']) * 100;
        }
        return $result;
    }
}
