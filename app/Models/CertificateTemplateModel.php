<?php
namespace App\Models;

use CodeIgniter\Model;

class CertificateTemplateModel extends Model
{
    protected $table = 'certificate_templates';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $allowedFields = ['name', 'image_path', 'certificate_type'];
    protected $useTimestamps = true;

    public function getByType($type)
    {
        return $this->where('certificate_type', $type)->findAll();
    }
}
