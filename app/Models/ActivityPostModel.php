<?php
namespace App\Models;

use CodeIgniter\Model;

class ActivityPostModel extends Model
{
    protected $table = 'activity_posts';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $allowedFields = ['caption', 'image_path', 'posted_by'];
    protected $useTimestamps = true;

    public function getAllPosts()
    {
        return $this->orderBy('created_at', 'DESC')->findAll();
    }

    public function getRecentPosts($limit = 10)
    {
        return $this->orderBy('created_at', 'DESC')->limit($limit)->findAll();
    }
}
