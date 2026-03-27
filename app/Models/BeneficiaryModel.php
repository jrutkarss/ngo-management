<?php
namespace App\Models;

use CodeIgniter\Model;

class BeneficiaryModel extends Model
{
    protected $table = 'beneficiaries';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $allowedFields = [
        'name', 'email', 'phone', 'address', 'location', 'date_of_birth',
        'category', 'assistance_details'
    ];
    protected $useTimestamps = true;

    public function search($keyword)
    {
        return $this->like('name', $keyword)
            ->orLike('location', $keyword)
            ->findAll();
    }

    public function filterByCategory($category)
    {
        return $this->where('category', $category)->findAll();
    }
}
