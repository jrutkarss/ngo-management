<?php
namespace App\Models;

use CodeIgniter\Model;

class ProjectModel extends Model
{
    protected $table = 'projects';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $allowedFields = [
        'title', 'description', 'total_funds_received', 'total_expenses',
        'start_date', 'end_date', 'status'
    ];
    protected $useTimestamps = true;

    public function getProjectSummary($projectId)
    {
        $project = $this->find($projectId);
        if ($project) {
            $db = \Config\Database::connect();
            $expenses = $db->table('expenses')
                ->where('project_id', $projectId)
                ->selectSum('amount')
                ->get()
                ->getRowArray();
            
            $project['calculated_expenses'] = $expenses['amount'] ?? 0;
            $project['balance'] = $project['total_funds_received'] - $project['calculated_expenses'];
        }
        return $project;
    }
}
