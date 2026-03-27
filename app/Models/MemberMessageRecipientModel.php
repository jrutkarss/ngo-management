<?php
namespace App\Models;

use CodeIgniter\Model;

class MemberMessageRecipientModel extends Model
{
    protected $table = 'member_message_recipients';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $allowedFields = ['message_id', 'member_id', 'is_read', 'read_at'];
    protected $useTimestamps = false;

    public function getMemberMessages($memberId)
    {
        return $this->where('member_id', $memberId)
            ->orderBy('created_at', 'DESC')
            ->findAll();
    }

    public function getUnreadCount($memberId)
    {
        return $this->where('member_id', $memberId)
            ->where('is_read', false)
            ->countAllResults();
    }

    public function markAsRead($messageId, $memberId)
    {
        return $this->where('message_id', $messageId)
            ->where('member_id', $memberId)
            ->set('is_read', true)
            ->set('read_at', date('Y-m-d H:i:s'))
            ->update();
    }
}
