<?php
namespace App\Models;

use CodeIgniter\Model;

class ExpenseModel extends Model
{
    protected $table = 'expenses';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $allowedFields = [
        'project_id', 'category', 'description', 'amount', 'expense_date',
        'payment_method', 'receipt_path'
    ];
    protected $useTimestamps = true;

    public function getProjectExpenses($projectId)
    {
        return $this->where('project_id', $projectId)->findAll();
    }

    public function getExpensesByCategory($projectId = null)
    {
        $query = $this->select('category, SUM(amount) as total')
            ->groupBy('category');
        if ($projectId) {
            $query->where('project_id', $projectId);
        }
        return $query->findAll();
    }
}
