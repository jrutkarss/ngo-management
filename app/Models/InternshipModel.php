<?php
namespace App\Models;

use CodeIgniter\Model;

class InternshipModel extends Model
{
    protected $table = 'internships';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $allowedFields = [
        'title', 'description', 'duration_weeks', 'positions_available',
        'start_date', 'stipend', 'image_path', 'status'
    ];
    protected $useTimestamps = true;

    public function getOpenInternships()
    {
        return $this->where('status', 'open')->findAll();
    }

    public function getInternshipWithApplications($internshipId)
    {
        $db = \Config\Database::connect();
        return $db->table('internships i')
            ->select('i.*, COUNT(ia.id) as application_count')
            ->join('internship_applications ia', 'ia.internship_id = i.id', 'left')
            ->where('i.id', $internshipId)
            ->groupBy('i.id')
            ->get()
            ->getRowArray();
    }
}
