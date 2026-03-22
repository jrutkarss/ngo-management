<?php
namespace App\Models;

use CodeIgniter\Model;

class MemberModel extends Model
{
    protected $table = 'members';
    protected $allowedFields = ['name', 'email', 'password', 'phone', 'address', 'photo', 'id_card_path', 'status'];
    protected $useTimestamps = true;
}
