<?php
namespace App\Models;

use CodeIgniter\Model;

class MemberMessageModel extends Model
{
    protected $table = 'member_messages';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $allowedFields = ['title', 'message', 'sent_by_admin', 'send_to_all'];
    protected $useTimestamps = true;

    public function getMessageWithRecipients($messageId)
    {
        $db = \Config\Database::connect();
        return $db->table('member_messages m')
            ->select('m.*, COUNT(mmr.id) as recipient_count')
            ->join('member_message_recipients mmr', 'mmr.message_id = m.id', 'left')
            ->where('m.id', $messageId)
            ->groupBy('m.id')
            ->get()
            ->getRowArray();
    }
}
