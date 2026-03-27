<?php
namespace App\Models;

use CodeIgniter\Model;

class InternshipApplicationModel extends Model
{
    protected $table = 'internship_applications';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $allowedFields = [
        'internship_id', 'student_name', 'student_email', 'student_phone',
        'resume_path', 'cover_letter', 'status', 'completion_certificate_path'
    ];
    protected $useTimestamps = true;

    public function getInternshipApplications($internshipId)
    {
        return $this->where('internship_id', $internshipId)->findAll();
    }

    public function getStudentApplications($studentEmail)
    {
        return $this->where('student_email', $studentEmail)->findAll();
    }
}
