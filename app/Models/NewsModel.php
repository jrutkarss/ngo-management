<?php
namespace App\Models;

use CodeIgniter\Model;

class NewsModel extends Model
{
    protected $table = 'news';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $allowedFields = ['title', 'content', 'image_path', 'is_published'];
    protected $useTimestamps = true;

    public function getPublished()
    {
        return $this->where('is_published', true)->orderBy('created_at', 'DESC')->findAll();
    }

    public function getRecentNews($limit = 5)
    {
        return $this->getPublished()->limit($limit)->findAll();
    }
}